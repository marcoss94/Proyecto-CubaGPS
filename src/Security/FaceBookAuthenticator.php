<?php
/**
 * Created by PhpStorm.
 * User: Armando
 * Date: 17/10/2018
 * Time: 10:30
 */

namespace App\Security;


use App\Entity\User as User; // your user entity
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use KnpU\OAuth2ClientBundle\Security\Authenticator\SocialAuthenticator;
use KnpU\OAuth2ClientBundle\Client\Provider\FacebookClient;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;


class FaceBookAuthenticator extends SocialAuthenticator
{
    private $clientRegistry;
    private $em;

    public function __construct(ClientRegistry $clientRegistry, EntityManagerInterface $em)
    {
        $this->clientRegistry = $clientRegistry;
        $this->em = $em;
    }

    public function supports(Request $request)
    {
        // continue ONLY if the current ROUTE matches the check ROUTE
        return $request->attributes->get('_route') === 'connect_facebook_check';
    }

    public function getCredentials(Request $request)
    {
        // this method is only called if supports() returns true

        // For Symfony lower than 3.4 the supports method need to be called manually here:
        // if (!$this->supports($request)) {
        //     return null;
        // }

        return $this->fetchAccessToken($this->getFacebookClient());
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        /** @var FacebookUser $facebookUser */
        $facebookUser = $this->getFacebookClient()
            ->fetchUserFromToken($credentials);
        $email = $facebookUser->getEmail();
        // 1) have they logged in with Facebook before? Easy!
        $existingUser = $this->em->getRepository(User::class)
            ->findOneBy(['facebookId' => $facebookUser->getId()]);
        if ($existingUser) {
            return $existingUser;
        }
        // 2) do we have a matching user by email?
        $user = new User();
        // 3) Maybe you just want to "register" them by creating
        // a User object
        $user->setFacebookId($facebookUser->getId());
        $user->setFirstname($facebookUser->getFirstName());
        $user->setLastname($facebookUser->getLastName());
        $user->setUsername($facebookUser->getFirstName());
        $user->setPicture($facebookUser->getPictureUrl());
        $user->setEmail($facebookUser->getEmail() == null ? '' : $facebookUser->getEmail());
        $user->setRegisteredAt();
        $user->setUserOf('facebook');
        $user->setRoles(['ROLE_USER']);
        dump($_SESSION);
        if (isset($_SESSION['redirectedBy'])) {
            $publisher = $this->em->getRepository(User::class)
                ->find($_SESSION['redirectedBy']);
            $user->setRedirectedBy($publisher);
        } else {
            $langs = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
            foreach ($langs as $l) {
                $head = substr($l, 0, 2);
                if ($head == 'es') {
                    $user->setIdioma('es');
                    break;
                } elseif ($head[0] == 'en') {
                    $user->setIdioma('en');
                    break;
                }
            }
        }
        $this->em->persist($user);
        $this->em->flush();
        return $user;
    }

    /**
     * @return FacebookClient
     */
    private function getFacebookClient()
    {
        return $this->clientRegistry
            // "facebook_main" is the key used in config/packages/knpu_oauth2_client.yaml
            ->getClient('facebook_main');
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // on success, let the request continue
        return null;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $message = strtr($exception->getMessageKey(), $exception->getMessageData());

        return new Response($message, Response::HTTP_FORBIDDEN);
    }

    /**
     * Called when authentication is needed, but it's not sent.
     * This redirects to the 'login'.
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
        return new RedirectResponse(
            '/connect/auth_forced', // might be the site, where users choose their oauth provider
            Response::HTTP_TEMPORARY_REDIRECT
        );
    }


}