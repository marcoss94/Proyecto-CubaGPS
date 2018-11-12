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

use App\Entity\FacebookUser;
use App\Entity\Sistem;
use App\Entity\User;
use App\Repository\SistemRepository;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Facebook;

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
     * @Route("/register_with_facebook", name="register_with_facebook")
     */
    public function loginWithFacebook()
    {
        if (!session_id()) {
            session_start();
        }
        $fb = new Facebook\Facebook([
            'app_id' => '1972869056090204',
            'app_secret' => '89f6ec558cd8454da65d64d7f7a3622e',
            'default_graph_version' => 'v2.10',
        ]);
        $helper = $fb->getRedirectLoginHelper();
        if (isset($_GET['state'])) {
            $helper->getPersistentDataHandler()->set('state', $_GET['state']);
        }
        $permissions = []; // Optional permissions
        $loginUrl = $helper->getLoginUrl(('http://localhost/zxccxz/public/fb_callback'), $permissions);
        return $this->render('admin/loginWithFaceBook.html.twig', ['loginUrl' => $loginUrl]);

    }

    /**
     * @Route("/fb_callback", name="fb_callback")
     */
    public function fbCallBack(Request $request, FileUploader $fileUploader)
    {
        if (!session_id()) {
            session_start();
        }
        $fb = new Facebook\Facebook([
            'app_id' => '1972869056090204',
            'app_secret' => '89f6ec558cd8454da65d64d7f7a3622e',
            'default_graph_version' => 'v2.10',
        ]);

        $helper = $fb->getRedirectLoginHelper();
        if (isset($_GET['state'])) {
            $helper->getPersistentDataHandler()->set('state', $_GET['state']);
        }
        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issuesecho 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        if (!isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }

// Logged in
        echo '<h3>Access Token</h3>';
        var_dump($accessToken->getValue());

// The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
        echo '<h3>Metadata</h3>';
        var_dump($tokenMetadata);

// Validation (these will throw FacebookSDKException's when they fail)
        $tokenMetadata->validateAppId('1972869056090204');
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
        $tokenMetadata->validateExpiration();

        if (!$accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
                exit;
            }
            echo '<h3>Long-lived</h3>';
            var_dump($accessToken->getValue());
        }

        $res = $fb->get('/me?fields=id,email,picture,first_name,last_name', $accessToken);
        // make a call to your webservice here
        $user = $res->getGraphUser();
        // pretend it returns an array on success, false if there is no user
        if ($user) {
            $picture = $user->getPicture()->getUrl();
            $firstname=$user->getFirstName();
            $lastname=$user->getLastName();
            $id=$user->getId();
            $fbUser=new FacebookUser($id,$firstname,$lastname,$picture);
            $em=$this->getDoctrine()->getManager();
            $em->persist($fbUser);
            $em->flush();
            return $this->get('security.authentication.guard_handler')
                ->authenticateUserAndHandleSuccess(
                    $fbUser,
                    $request,
                    $this->get('app.security.token_authenticator'),
                    'api_area'
                );
        }
        $_SESSION['fb_access_token'] = (string)$accessToken;
        return $this->redirectToRoute('fb_auth',['token'=>$accessToken]);
    }

    /**
     * @Route("/fb_auth", name="fb_auth")
     */
    public function fb_auth(){
        return $this->redirectToRoute('blog');
    }

    /**
     * @Route("/fb/prueba", name="prueba")
     */
    public function prueba()
    {
       $session=$this->get('session');
        return $this->redirectToRoute('security_login', ['token' => 'reciveToken']);
    }

}
