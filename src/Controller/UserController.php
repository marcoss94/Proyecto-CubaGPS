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
        $roles=$request->get('role')=='user'?['ROLE_USER','ROLE_PUBLISHER']:['ROLE_USER'];
        $user->setRoles($roles);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        return $this->redirectToRoute('users');
    }


}
