<?php

require_once '../app/core/Database.php';

class faqAdminController {

    public function index() {
        if ($_SESSION['userType'] !== 'admin') exit;

        $db = Database::getInstance()->getConnection();
        $faqs = $db->query(
            'SELECT * FROM "FAQ" ORDER BY "FAQID" DESC'
        )->fetchAll();

        require '../app/views/admin/faqManager.php';
    }

    public function create() {
        if ($_SESSION['userType'] !== 'admin') exit;

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare(
            'INSERT INTO "FAQ" ("Question","Answer") VALUES (?,?)'
        );
        $stmt->execute([
            $_POST['question'],
            $_POST['answer']
        ]);

        header('Location: /arthienne/public/admin/faq');
        exit;
    }
}
