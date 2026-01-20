<?php

require_once '../app/core/Database.php';

class buyerDashboardController {

    public function dashboard() {
        if (!isset($_SESSION['userType']) || $_SESSION['userType'] !== 'buyer') {
            header('Location: /arthienne/public/signin');
            exit;
        }

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT * FROM "Buyer" WHERE "BuyerID" = ?');
        $stmt->execute([$_SESSION['userId']]);
        $buyer = $stmt->fetch();

        require '../app/views/buyer/dashboard.php';
    }

    public function edit() {
        if (!isset($_SESSION['userType']) || $_SESSION['userType'] !== 'buyer') exit;

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT * FROM "Buyer" WHERE "BuyerID" = ?');
        $stmt->execute([$_SESSION['userId']]);
        $buyer = $stmt->fetch();

        require '../app/views/buyer/editProfile.php';
    }

    public function update() {
        if (!isset($_SESSION['userType']) || $_SESSION['userType'] !== 'buyer') exit;

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare(
            'UPDATE "Buyer"
             SET "BuyerFName"=?, "BuyerLName"=?, "BuyerEmail"=?, "BuyerPhoneNo"=?, "BuyerAddress"=?
             WHERE "BuyerID"=?'
        );

        $stmt->execute([
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['address'],
            $_SESSION['userId']
        ]);

        header('Location: /arthienne/public/buyer/dashboard');
        exit;
    }
}
