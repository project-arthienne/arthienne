<?php

require_once '../app/core/Database.php';

class forumAdminController {

    public function index() {
        if ($_SESSION['userType'] !== 'admin') exit;

        $db = Database::getInstance()->getConnection();
        $forums = $db->query(
            'SELECT * FROM "Forums" ORDER BY "ForumID" DESC'
        )->fetchAll();

        require '../app/views/admin/forumManager.php';
    }

    public function create() {
        if ($_SESSION['userType'] !== 'admin') exit;

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare(
            'INSERT INTO "Forums" ("ForumTitle","ForumDescription") VALUES (?,?)'
        );

        $stmt->execute([
            $_POST['title'],
            $_POST['description']
        ]);

        header('Location: /arthienne/public/admin/forums');
        exit;
    }
}
