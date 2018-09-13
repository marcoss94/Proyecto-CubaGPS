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

use App\Entity\User;
use App\Repository\UserRepository;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
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
     * @Route("/site/users", name="users")
     */
    public function users(UserRepository $users): Response
    {
        $users = $users->findAll();
        return $this->render('users/users.html.twig', ['users' => $users]);
    }

    /**
     * @Route("/admin/create_user", name="create_user")
     */
    public function createUser()
    {
        return $this->render('users/create_user.html.twig');
    }

    /**
     * @Route("/admin/process_user", name="process_user")
     */
    public function process_user(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $fullName = $request->get('fullname');
        $userName = $request->get('username');
        $password = $request->get('password');
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $encoded = $encoder->encodePassword($user, $password);
        $user->setFullName($fullName);
        $user->setUsername($userName);
        $user->setPassword($encoded);
        $user->setRoles(($request->get('isAdmin') == 'on') ? ['ROLE_ADMIN'] : ['ROLE_USER']);
        $em->persist($user);
        $em->flush();
        return $this->redirect($this->generateUrl('users'));
    }

    /**
     * @Route("/admin/delete_user", name="delete_user")
     */
    public function delete_user(Request $request, UserRepository $users)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $users->find($request->get('userId'));
        $em->remove($user);
        $em->flush();
        return $this->redirect($this->generateUrl('users'));
    }

    /**
     * @Route("/admin/ajax_check_username", name="ajax_check_username")
     */
    public function checkUserName(Request $request, UserRepository $usersRepo)
    {
        $response = new JsonResponse();
        $users = $usersRepo->findAll();
        foreach ($users as $user) {
            if ($user->getUsername() == $request->get('username')) {
                $response->setData(['result' => false]);
                return $response;
            }
        }
        $response->setData(['result' => true]);
        return $response;
    }

}
