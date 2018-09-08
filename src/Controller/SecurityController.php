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

use App\Entity\Sistem;
use App\Entity\User;
use App\Repository\SistemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Controller used to manage the application security.
 * See https://symfony.com/doc/current/cookbook/security/form_login_setup.html.
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="security_login")
     */
    public function login(AuthenticationUtils $helper): Response
    {
        return $this->render('security/login.html.twig', [
            // last username entered by the user (if any)
            'last_username' => $helper->getLastUsername(),
            // last authentication error (if any)
            'error' => $helper->getLastAuthenticationError(),
        ]);
    }

    /**
     * This is the route the user can use to logout.
     *
     * But, this will never be executed. Symfony will intercept this first
     * and handle the logout automatically. See logout in config/packages/security.yaml
     *
     * @Route("/logout", name="security_logout")
     */
    public function logout(): void
    {
        throw new \Exception('This should never be reached!');
    }

    /**
     * @Route("/ajax_check_registered", name="ajax_check_registered")
     */
    public function checkRegistered(SistemRepository $sistemRepository, UserPasswordEncoderInterface $encoder)
    {
        $response = new JsonResponse();
        if (count($sistemRepository->findAll())) {
            $response->setData(['registered' => true, 'first' => $sistemRepository->findAll()[0]->isFirst()]);
            return $response;
        }
        $response->setData(['registered' => false, 'first' => false]);
        $mac = exec('getmac');
        $mac = explode(' ', $mac);
        $mac = (string)$mac[0];
        $code = $this->encrypt($mac);
        $response->setData(['code' => $code]);
        return $response;
    }

    /**
     * @Route("/register_sistem", name="register_sistem")
     */
    public function registerSistem(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $em = $this->getDoctrine()->getManager();
        $mac = exec('getmac');
        $mac = explode(' ', $mac);
        $mac = (string)$mac[0];
        $codedMac = $this->encrypt($mac);
        $license = (string)$this->decrypt($codedMac);
        $input = (string)$request->get('license');
        $input = trim($input);
        if ($license == $input) {
            $sistem = new Sistem();
            $sistem->setCode($license);
            $sistem->setRegistered('1');
            $em->persist($sistem);
            $user = new User();
            $encoded = $encoder->encodePassword($user, 'admin');
            $user->setFullName('Administador');
            $user->setUsername('admin');
            $user->setPassword($encoded);
            $user->setRoles(['ROLE_ADMIN']);
            $em->persist($user);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('security_login'));
    }

    private function encrypt($string): string
    {
        $str = str_repeat($string, 2);
        $result = '';
        $str = str_replace('-', '-$', $str);
        $array = explode('-', $str);
        for ($i = count($array) - 1; $i >= 0; $i--) {
            $result = $result . $array[$i];
        }
        return $result;

    }


    private function decrypt($string): string
    {
        $str = $string;
        $str = str_replace('$', '-@', $str);
        $array = explode('@', $str);
        $result = '';
        for ($i = count($array) - 1; $i >= count($array) / 2; $i--) {
            $result = $result . $array[$i];
        }
        $result = str_replace('@', '.3', $result);
        $result = 'sy-lic:@2@3' . $result;
        return $result;
    }


}
