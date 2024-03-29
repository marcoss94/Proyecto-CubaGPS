<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Entity\Comentario;
use App\Entity\Contacto;
use App\Entity\DisplayableComponent;
use App\Entity\User;
use App\Repository\ComentarioRepository;
use App\Repository\ContactoRepository;
use App\Repository\DisplayableComponentRepository;
use App\Repository\PaqueteRepository;
use App\Repository\ReservaRepository;
use App\Repository\UserRepository;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\TransactionController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class UserController
 * @package App\Controller
 *
 *
 *
 */
class UserController extends AbstractController
{
    /**
     * @Route("/admin/users", name="users")
     */
    public function users(UserRepository $users): Response
    {
        $users = $users->findAll();
        return $this->render('users/users.html.twig', ['users' => $users]);
    }

    /**
     * @Route("/admin/role_publisher", name="role_publisher")
     * @param UserRepository $userRepository
     * @param Request $request
     * @return Response
     */
    public function setRolePublisher(UserRepository $userRepository, Request $request): Response
    {
        $user = $userRepository->find($request->get('id'));
        $roles = $request->get('role') == 'user' ? ['ROLE_USER', 'ROLE_PUBLISHER'] : ['ROLE_USER'];
        $user->setRoles($roles);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        return $this->redirectToRoute('users');
    }

    /**
     * @Route("/ajax_create_comment", name="ajax_create_comment")
     */
    public function create_comment(Request $request, DisplayableComponentRepository $componentRepository, PaqueteRepository $paqueteRepository, UserRepository $userRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $comment = new Comentario();
        $type = $request->get('type');
        $comment->setComponent($componentRepository->find($request->get('targetId')));
        $comment->setType($type);
        $comment->setText($request->get('text'));
        $autor = $userRepository->find($request->get('userId'));
        $comment->setAutor($autor);
        $em->persist($comment);
        $em->flush();
        $response = new JsonResponse();
        $response->setData(['result' => true]);
        return $response;
    }

    /**
     * @Route("/ajax_contact", name="ajax_contact")
     */
    public function ajax_contact(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $contacto = new Contacto();
        $contacto->setEmail($request->get('email'));
        $contacto->setNombre($request->get('nombre'));
        $contacto->setTel((int)$request->get('tel'));
        $contacto->setTexto($request->get('text'));
        $contacto->setCreatedAt();
        $em->persist($contacto);
        $em->flush();
        $response = new JsonResponse();
        $response->setData(['result' => true]);
        return $response;
    }

    /**
     * @Route("/admin/view_contacts", name="view_contacts")
     */
    public function view_contacts(ContactoRepository $contactoRepository)
    {
        $contactos = $contactoRepository->findBy(array(), ['createdAt' => 'DESC']);
        return $this->render('admin/contactos.html.twig', [
            'contactos' => $contactos,
        ]);
    }

    /**
     * @Route("/admin/delete_contact", name="delete_contact")
     */
    public function delete_contact(Request $request, ContactoRepository $contactoRepository)
    {
        $contacto = $contactoRepository->find($request->get('id'));
        $em = $this->getDoctrine()->getManager();
        $em->remove($contacto);
        $em->flush();
        return $this->redirectToRoute('view_contacts');
    }

    /**
     * @Route("/admin/view_comments", name="view_comments")
     */
    public function view_comments(ComentarioRepository $comentarioRepository)
    {
        $comentarios = $comentarioRepository->findBy(array(), ['publishedAt' => 'DESC']);
        $em = $this->getDoctrine()->getManager();
        $em->flush();
        return $this->render('admin/comments.html.twig', [
            'comments' => $comentarios,
        ]);
    }

    /**
     * @Route("/admin/delete_comment", name="delete_comment")
     */
    public function delete_comment(Request $request, ComentarioRepository $comentarioRepository)
    {
        $comment = $comentarioRepository->find($request->get('id'));
        $em = $this->getDoctrine()->getManager();
        $em->remove($comment);
        $em->flush();
        return $this->redirectToRoute('view_comments');
    }

    /**
     * @Route("/admin/aprove_comment", name="aprove_comment")
     */
    public function aprove_comment(Request $request, ComentarioRepository $comentarioRepository)
    {
        $comment = $comentarioRepository->find($request->get('id'));
        $em = $this->getDoctrine()->getManager();
        $comment->setRevisado(!$comment->getRevisado());
        $em->persist($comment);
        $em->flush();
        return $this->redirectToRoute('view_comments');
    }

    /**
     * @Route("/admin/load_table_ajax", name="load_table_ajax")
     */
    public function load_table_ajax(Request $request, UserRepository $userRepository, ReservaRepository $reservaRepository)
    {
        $year = $request->get('year');
        $registros = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0, 12 => 0];
        $users = $userRepository->findAll();
        foreach ($users as $u) {
            if ((int)($u->getRegisteredAt()->format('Y')) == (int)$year) {
                $registros[(int)($u->getRegisteredAt()->format('m'))] += 1;
            }
        }
        $ventas = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0, 12 => 0];
        $reservas = $reservaRepository->findBy(['status' => 'payed']);
        foreach ($reservas as $u) {
            if ((int)($u->getPayedAt()->format('Y')) == (int)$year) {
                $ventas[(int)($u->getPayedAt()->format('m'))] += 1;
            }
        }
        $response = new JsonResponse();
        $response->setData(['registros' => $registros, 'ventas' => $ventas]);
        return $response;
    }

    /**
     * @Route("/admin/send_client_email", name="send_client_email")
     */
    public function send_client_email(Request $request, UserRepository $userRepository, \Swift_Mailer $mailer)
    {
        $user = $userRepository->find($request->get('clientId'));
        $asunto = $request->get('asunto');
        $mensaje = $request->get('mensaje');

        $message = (new \Swift_Message())
            ->setSubject($asunto)
            ->setTo($user->getEmail())
            ->setFrom('contact@travelcubagps.com')
            ->setBody($this->renderView(
                'email_confirmacion/send_client_email.html.twig',
                ['text' => $mensaje]
            ),
                'text/html');
        $mailer->send($message);
        return $this->redirectToRoute('users');
    }

    /**
     * @Route("/admin/client_email", name="client_email")
     */
    public function client_email(Request $request, UserRepository $userRepository, \Swift_Mailer $mailer)
    {
        $user = $userRepository->find($request->get('clientId'));
        return $this->render('users/construct_user_email.html.twig', ['user' => $user]);
    }


}
