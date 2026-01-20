<?php

require_once '../app/core/Database.php';

class FaqController {

    public function index() {
        $db = Database::getInstance()->getConnection();

        $query = $_GET['q'] ?? '';

        if ($query !== '') {
            $stmt = $db->prepare(
                'SELECT * FROM "FAQ"
                 WHERE "IsVisible" = TRUE
                 AND (
                     LOWER("Question") LIKE LOWER(?)
                     OR LOWER("Answer") LIKE LOWER(?)
                 )
                 ORDER BY "FAQID" DESC'
            );

            $like = '%' . $query . '%';
            $stmt->execute([$like, $like]);
            $faqs = $stmt->fetchAll();
        } else {
            $faqs = $db->query(
                'SELECT * FROM "FAQ"
                 WHERE "IsVisible" = TRUE
                 ORDER BY "FAQID" DESC'
            )->fetchAll();
        }

        require '../app/views/pages/faq.php';
    }
}
