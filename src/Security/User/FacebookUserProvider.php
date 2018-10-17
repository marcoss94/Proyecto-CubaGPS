<?php

namespace App\Security\User;
/**
 * Created by PhpStorm.
 * User: Armando
 * Date: 11/10/2018
 * Time: 21:36
 */

use App\Entity\FacebookUser;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Facebook;

class FacebookUserProvider implements UserProviderInterface
{
    public function loadUserByUsername($id)
    {
        return $this->fetchUser($id);
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof FacebookUser) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        $id = $user->getId();

        return $this->fetchUser($id);
    }

    public function supportsClass($class)
    {
        return FacebookUser::class === $class;
    }

    private function fetchUser($token)
    {
        $fb = new Facebook\Facebook([
            'app_id' => '1972869056090204',
            'app_secret' => '89f6ec558cd8454da65d64d7f7a3622e',
            'default_graph_version' => 'v2.10',
        ]);
        $res = $fb->get('/me?fields=id,email,picture,first_name,last_name', $token);
        // make a call to your webservice here
        $user = $res->getGraphUser();
        // pretend it returns an array on success, false if there is no user
        if ($user) {
            $picture = $user->getPicture()->getUrl();
            $firstname=$user->getFirstName();
            $lastname=$user->getLastName();
            $id=$user->getId();
            $fbUser=new FacebookUser($id,$firstname,$lastname,$picture);
            return $fbUser;
        }//        prueba


        throw new UsernameNotFoundException(
            sprintf('Username "%s" does not exist.', $token)
        );
    }
}