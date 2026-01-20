<?php

require_once '../app/core/Database.php';

class SignInController {

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->login();
            return;
        }

        require '../app/views/pages/signIn.php';
    }

    private function login() {
        $db = Database::getInstance()->getConnection();

        $email = $_POST['email'];
        $password = $_POST['password'];

        $buyer = $db->prepare('SELECT * FROM "Buyer" WHERE "BuyerEmail" = ?');
        $buyer->execute([$email]);
        $buyerData = $buyer->fetch();

        if ($buyerData && password_verify($password, $buyerData['BuyerPassword'])) {
            $_SESSION['userId'] = $buyerData['BuyerID'];
            $_SESSION['userType'] = 'buyer';
            header('Location: /arthienne/public/buyer/dashboard');
            exit;
        }

        $seller = $db->prepare('SELECT * FROM "Seller" WHERE "SellerEmail" = ?');
        $seller->execute([$email]);
        $sellerData = $seller->fetch();

        if ($sellerData && password_verify($password, $sellerData['SellerPassword'])) {
            $_SESSION['userId'] = $sellerData['SellerID'];
            $_SESSION['userType'] = 'seller';
            header('Location: /arthienne/public/seller/dashboard');
            exit;
        }

        $admin = $db->prepare('SELECT * FROM "SiteManager" WHERE "SMEmail" = ?');
        $admin->execute([$email]);
        $adminData = $admin->fetch();

        if ($adminData && password_verify($password, $adminData['SMPassword'])) {
            $_SESSION['userId'] = $adminData['SMID'];
            $_SESSION['userType'] = 'admin';
            header('Location: /arthienne/public/admin');
            exit;
        }

        $_SESSION['authError'] = 'Invalid credentials';
        header('Location: /arthienne/public/signin');
        exit;
    }
}
