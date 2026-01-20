<?php

require_once '../app/core/Database.php';

class contactAdminController {

    public function index() {
        if ($_SESSION['userType'] !== 'admin') exit;

        $db = Database::getInstance()->getConnection();
        $messages = $db->query(
            'SELECT * FROM "ContactMessage" ORDER BY "CreatedAt" DESC'
        )->fetchAll();

        require '../app/views/admin/contactManager.php';
    }

    public function view() {
        if ($_SESSION['userType'] !== 'admin') exit;

        if (!isset($_GET['id'])) exit;

        $db = Database::getInstance()->getConnection();

        $stmt = $db->prepare(
            'SELECT * FROM "ContactMessage" WHERE "MessageID" = ?'
        );
        $stmt->execute([$_GET['id']]);
        $message = $stmt->fetch();

        if (!$message) exit;

        $user = null;

        $buyer = $db->prepare(
            'SELECT * FROM "Buyer" WHERE "BuyerEmail" = ?'
        );
        $buyer->execute([$message['Email']]);
        $user = $buyer->fetch();

        if (!$user) {
            $seller = $db->prepare(
                'SELECT * FROM "Seller" WHERE "SellerEmail" = ?'
            );
            $seller->execute([$message['Email']]);
            $user = $seller->fetch();
        }

        require '../app/views/admin/contactDetails.php';
    }
}
