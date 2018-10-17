<?php

namespace App\Controller;
/**
 * Created by PhpStorm.
 * User: Armando
 * Date: 11/10/2018
 * Time: 12:08
 */
use Facebook\PersistentData\PersistentDataInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class SymfonyPersistentDataHandler implements PersistentDataInterface {
    protected $session;
    protected $sessionPrefix = 'FBRLH_';

    public function __construct(SessionInterface $session) {
        $this->session = $session;
    }

    public function get($key) {
        return $this->session->get($this->sessionPrefix . $key);
    }

    public function set($key, $value) {
        $this->session->set($this->sessionPrefix . $key, $value);
    }
}