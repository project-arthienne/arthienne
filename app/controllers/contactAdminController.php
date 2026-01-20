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
}
