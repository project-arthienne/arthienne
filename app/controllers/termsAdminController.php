<?php

require_once '../app/core/Database.php';

class termsAdminController {

    public function index() {
        if ($_SESSION['userType'] !== 'admin') exit;

        $db = Database::getInstance()->getConnection();
        $terms = $db->query(
            'SELECT * FROM "Terms" ORDER BY "TermsID" DESC LIMIT 1'
        )->fetch();

        require '../app/views/admin/termsEditor.php';
    }

    public function update() {
        if ($_SESSION['userType'] !== 'admin') exit;

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare(
            'INSERT INTO "Terms" ("Content") VALUES (?)'
        );
        $stmt->execute([
            $_POST['content']
        ]);

        header('Location: /arthienne/public/admin/terms');
        exit;
    }
}
