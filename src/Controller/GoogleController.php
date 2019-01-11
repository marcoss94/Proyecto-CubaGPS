<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;

class GoogleController extends Controller
{
    /**
     * Link to this controller to start the "connect" process
     *
     * @Route("/connect/google", name="connect_google")
     * @param ClientRegistry $clientRegistry
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function connectAction(Request $request, ClientRegistry $clientRegistry)
    {
        $this->get('session')->set('redirectBack',$request->server->get('HTTP_REFERER'));
        return $clientRegistry
            ->getClient('google')
            ->redirect();
    }

    /**
     * @Route("/google_forced", name="google_forced")
     */
    public function google_forced(ClientRegistry $clientRegistry)
    {
        return $clientRegistry
            ->getClient('google')
            ->redirect();
    }

    /**
     * Facebook redirects to back here afterwards
     *
     * @Route("/connect/google/check", name="connect_google_check")
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function connectCheckAction()
    {
        if (!$this->getUser()) {
            return new JsonResponse(array('status' => false, 'message' => "User not found!"));
        } else {
            if(is_null($this->get('session')->get('redirectBack'))){
                return $this->redirectToRoute('show_confirmed_reserves');
            }
            return $this->redirect($this->get('session')->get('redirectBack'));
        }

    }
}
