<?php

require_once '../app/core/Database.php';

class createAccountController {

    public function role() {
        require '../app/views/pages/createAccountRole.php';
    }

    public function buyer() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleBuyer();
            return;
        }
        require '../app/views/pages/buyerCreateAccount.php';
    }

    public function seller() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleSeller();
            return;
        }
        require '../app/views/pages/sellerCreateAccount.php';
    }

    private function handleBuyer() {
        $db = Database::getInstance()->getConnection();

        $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $db->prepare(
            'INSERT INTO "Buyer"
            ("BuyerFName","BuyerLName","BuyerEmail","BuyerPhoneNo","BuyerAddress","BuyerPassword")
            VALUES (:fname,:lname,:email,:phone,:address,:password)'
        );

        $stmt->execute([
            'fname' => $_POST['firstName'],
            'lname' => $_POST['lastName'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'password' => $passwordHash
        ]);

        header('Location: /arthienne/public/signin');
        exit;
    }

    private function handleSeller() {
        $db = Database::getInstance()->getConnection();

        $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $db->prepare(
            'INSERT INTO "Seller"
            ("SellerFName","SellerLName","SellerEmail","SellerPhoneNo","SellerAddress","SellerPassword")
            VALUES (:fname,:lname,:email,:phone,:address,:password)'
        );

        $stmt->execute([
            'fname' => $_POST['firstName'],
            'lname' => $_POST['lastName'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'password' => $passwordHash
        ]);

        header('Location: /arthienne/public/signin');
        exit;
    }
}
