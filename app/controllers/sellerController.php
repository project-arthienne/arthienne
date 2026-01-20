<?php

require_once '../app/core/Database.php';

class SellerController {

    public function view() {
        $id = $_GET['id'] ?? null;
        if (!$id) exit;

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT * FROM "Seller" WHERE "SellerID" = ?');
        $stmt->execute([$id]);
        $seller = $stmt->fetch();

        if (!$seller) exit;

        require '../app/views/pages/sellerPublicProfile.php';
    }
}
