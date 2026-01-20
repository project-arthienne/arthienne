<?php

require_once '../app/core/Database.php';

class TermsController {

    public function index() {
        $db = Database::getInstance()->getConnection();
        $terms = $db->query('SELECT * FROM "Terms" ORDER BY "LastUpdated" DESC LIMIT 1')->fetch();
        require '../app/views/pages/terms.php';
    }
}
