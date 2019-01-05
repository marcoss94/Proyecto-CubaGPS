<?php

namespace App\Controller;

use App\Repository\ReservaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Transaction;
use Beelab\PaypalBundle\Paypal\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class TransactionController extends AbstractController
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
        $amount = $request->get('amount');  // get an amount, e.g. from your cart
        $transaction = new Transaction($amount);
        try {
            $response = $this->get('beelab_paypal.service')->setTransaction($transaction)->start();
            $this->getDoctrine()->getManager()->persist($transaction);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirect($response->getRedirectUrl());
        } catch (Exception $e) {
            throw new HttpException(503, 'Payment error', $e);
        }
    }

    /**
     * @Route("/cancel_transaction", name="cancel_transaction")
     */
    public function canceledPayment(Request $request)
    {
        $token = $request->query->get('token');
        $transaction = $this->getDoctrine()->getRepository('App:Transaction')->findOneByToken($token);
        if (is_null($transaction)) {
            throw $this->createNotFoundException(sprintf('Transaction with token %s not found.', $token));
        }
        $transaction->cancel(null);
        $this->getDoctrine()->getManager()->remove($transaction);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('blog_index');
    }

    /**
     * @Route("/keep_transaction", name="keep_transaction")
     */
    public function completedPayment(Request $request,ReservaRepository $reservaRepository)
    {
        $em=$this->getDoctrine()->getManager();
        $token = $request->query->get('token');
        $transaction = $this->getDoctrine()->getRepository('App:Transaction')->findOneByToken($token);
        if (is_null($transaction)) {
            throw $this->createNotFoundException(sprintf('Transaction with token %s not found.', $token));
        }
        $this->get('beelab_paypal.service')->setTransaction($transaction)->complete();
        $em->remove($transaction);
        $em->flush();
        if (!$transaction->isOk()) {
            $message['type'] = 'error';
            $message['head'] = ($this->getUser()->getIdioma() == 'es') ?
                'Lo sentimos' : 'Sorry';
            $message['body'] = ($this->getUser()->getIdioma() == 'es') ?
                'Ocurrió un error durante la transacción'
                : 'Somthing went wrong during the transaction';
            return $this->redirectToRoute('blog_index', ['message' => $message]);// or a Response (in case of error)
        }
        $user=$this->getUser();
        $reserves=$reservaRepository->findBy(['usuario'=>$user,'status'=>'pending']);
        foreach ($reserves as $reserve){
            $reserve->setStatus('payed');
            $em->persist($reserve);
        }
        $em->flush();
        $message['type'] = 'success';
        $message['head'] = ($this->getUser()->getIdioma() == 'es') ?
            'Gracias por elegirnos' : 'Thanks';
        $message['body'] = ($this->getUser()->getIdioma() == 'es') ?
            'Transacción completada'
            : 'Transaction completed successfully';

        return $this->redirectToRoute('blog_index', ['message' => $message]); // or a Response (in case of success)
    }


}
