<?php

require_once '../app/core/Database.php';

class faqController {

    public function index() {
        $db = Database::getInstance()->getConnection();
        $faqs = $db->query('SELECT * FROM "FAQ" WHERE "IsVisible" = TRUE')->fetchAll();
        require '../app/views/pages/faq.php';
    }
}
