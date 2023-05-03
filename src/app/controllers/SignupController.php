<?php

use Phalcon\Mvc\Controller;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

session_start();

class SignupController extends Controller
{
    public function indexAction()
    {
        // Redirect to View
    }
    public function addAction()
    {
        $val = $_POST['role'];
        if (!isset($_SESSION['logins'])) {
            $_SESSION['logins'] = 'user';
        }
        $key = 'example_key';
        $payload = [
            'value'=>$val
        ];
        $jwt = JWT::encode($payload, $key, 'HS256');
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
        $_SESSION['logins'] = $decoded->value;
        $this->response->redirect('index');
    }
}
