<?php

class Auth
{
    public static function requireLogin()
    {
        if (empty($_SESSION['userId'])) {
            header('Location: /arthienne/public/signin');
            exit;
        }
    }

    public static function requireBuyer()
    {
        self::requireLogin();
        if ($_SESSION['userType'] !== 'buyer') {
            header('Location: /arthienne/public/');
            exit;
        }
    }

    public static function requireSeller()
    {
        self::requireLogin();
        if ($_SESSION['userType'] !== 'seller') {
            header('Location: /arthienne/public/');
            exit;
        }
    }
}
