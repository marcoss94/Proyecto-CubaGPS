<?php

namespace App\Controller;


use App\Repository\ReservaRepository;
use App\Repository\UserRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Payum\Core\Request\GetHumanStatus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class TransactionController extends Controller
{

    /**
     * @Route("/transaction", name="transaction")
     */
    public function index()
    {
        return $this->render('transaction/index.html.twig', [
            'controller_name' => 'TransactionController',
        ]);

    }

    /**
     * @Route("/make_payment", name="make_payment")
     */
    public function payment(Request $request)
    {
        $amount = ((int)($request->get('amount')));  // get an amount, e.g. from your cart
        $gatewayName = 'stripe';
        $storage = $this->get('payum')->getStorage('App\Entity\Payment');
        $payment = $storage->create();
        $payment->setNumber(uniqid());
        $payment->setCurrencyCode('USD');
        $payment->setTotalAmount($amount . '00'); //  1.23 EUR
        $payment->setDescription('Rent service');
        $storage->update($payment);
        $captureToken = $this->get('payum')->getTokenFactory()->createCaptureToken(
            $gatewayName,
            $payment,
            'done' // the route to redirect after capture
        );
        return $this->redirect($captureToken->getTargetUrl());
    }


    /**
     * @Route("/done", name="done")
     */
    public function doneAction(Request $request, ReservaRepository $reservaRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $token = $this->get('payum')->getHttpRequestVerifier()->verify($request);
        $gateway = $this->get('payum')->getGateway($token->getGatewayName());
        $gateway->execute($status = new GetHumanStatus($token));
        $payment = $status->getFirstModel();
        $message = [];
        $totalPrice = 0;
        if ($status->getValue() == 'captured' || $status->getValue() == 'pending') {
            $reserves = $reservaRepository->findBy(['usuario' => $this->getUser(), 'status' => 'pending']);
            foreach ($reserves as $reserva) {
                $reserva->setStatus('payed');
                $reserva->setPayedAt();
                $em->persist($reserva);
                $em->flush();
                $totalPrice += $reserva->getCosto();
            }
            $message['type'] = 'success';
            $message['head'] = ($this->getUser()->getIdioma() == 'es') ?
                'Enohorabuena' : 'Congratulations';
            $message['body'] = ($this->getUser()->getIdioma() == 'es') ?
                'Su transferencia ha sido efectuada exitosamente'
                : 'Your transfer has been successfully completed';
            return $this->redirectToRoute('blog_index', ['message' => $message]);
        } else {
            dump($payment);
            dump($status);
            die();
            $message['type'] = 'error';
            $message['head'] = ($this->getUser()->getIdioma() == 'es') ?
                'Lo sentimos' : 'Sorry';
            $message['body'] = ($this->getUser()->getIdioma() == 'es') ?
                'Ha ocurrido un error durente la transferencia'
                : 'An error occurred during the transfer';
            return $this->redirectToRoute('blog_index', ['message' => $message]);
        }
    }

    /**
     * @Route("/bautcher_test", name="bautcher_test")
     */
    public function sendBautcher(UserRepository $userRepository, \Swift_Mailer $mailer,ReservaRepository $reservaRepository)
    {
        //usuario fijo pa probar cambiar estos por parametros
        $user = $userRepository->find(20);
        $reserves = $reservaRepository->findBy(['usuario'=>$user,'status'=>'payed']);
        $totalPrice=200;
        //------------------------------------------------------
        //cambiar tambien a el correo del usuario
        //------------------------------------------------------
        $subject=$user->getIdioma()=='es'?'Factura de servicios Cuba GPS':'Cuba GPS Utility bill';
        $message = (new \Swift_Message())
            ->setSubject($subject)
            ->setTo('armando25723@travelcubagps.com')
            ->setFrom('contact@travelcubagps.com')
            ->setBody($this->renderView(
                'blog/bautcher.html.twig',
                ['user' => $user,
                    'reservas' => $reserves,
                    'folio' => uniqid(),
                    'price'=> $totalPrice,
                ]
            ),
                'text/html');
        $mailer->send($message);
        return $this->redirectToRoute('blog_index');
    }


}
