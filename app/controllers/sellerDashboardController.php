<?php

require_once '../app/core/Database.php';

class sellerDashboardController {

    public function dashboard() {
        if (!isset($_SESSION['userType']) || $_SESSION['userType'] !== 'seller') {
            header('Location: /arthienne/public/signin');
            exit;
        }

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT * FROM "Seller" WHERE "SellerID" = ?');
        $stmt->execute([$_SESSION['userId']]);
        $seller = $stmt->fetch();

        require '../app/views/seller/dashboard.php';
    }

    public function edit() {
        if (!isset($_SESSION['userType']) || $_SESSION['userType'] !== 'seller') exit;

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT * FROM "Seller" WHERE "SellerID" = ?');
        $stmt->execute([$_SESSION['userId']]);
        $seller = $stmt->fetch();

        require '../app/views/seller/editProfile.php';
    }

    public function update() {
        if (!isset($_SESSION['userType']) || $_SESSION['userType'] !== 'seller') exit;

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare(
            'UPDATE "Seller"
             SET "SellerFName"=?, "SellerLName"=?, "SellerEmail"=?, "SellerPhoneNo"=?, "SellerAddress"=?
             WHERE "SellerID"=?'
        );

        $stmt->execute([
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['address'],
            $_SESSION['userId']
        ]);

        header('Location: /arthienne/public/seller/dashboard');
        exit;
    }
}
