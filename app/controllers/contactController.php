<?php

require_once '../app/core/Database.php';

class contactController {

    public function submit() {
        $db = Database::getInstance()->getConnection();

        $stmt = $db->prepare(
            'INSERT INTO "ContactMessage" ("Email", "Topic", "Message")
             VALUES (?, ?, ?)'
        );

        $stmt->execute([
            $_POST['email'],
            $_POST['topic'],
            $_POST['message'] ?? null
        ]);

        header('Location: /arthienne/public/contact');
        exit;
    }
}
