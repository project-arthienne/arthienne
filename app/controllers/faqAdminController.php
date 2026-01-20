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
            'INSERT INTO "FAQ" ("Question","Answer","IsVisible") VALUES (?,?,TRUE)'
        );

        $stmt->execute([
            $_POST['question'],
            $_POST['answer']
        ]);

        header('Location: /arthienne/public/admin/faq');
        exit;
    }

    public function update() {
        if ($_SESSION['userType'] !== 'admin') exit;

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare(
            'UPDATE "FAQ" SET "Question" = ?, "Answer" = ? WHERE "FAQID" = ?'
        );

        $stmt->execute([
            $_POST['question'],
            $_POST['answer'],
            $_POST['faqId']
        ]);

        header('Location: /arthienne/public/admin/faq');
        exit;
    }

    public function toggle() {
        if ($_SESSION['userType'] !== 'admin') exit;

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare(
            'UPDATE "FAQ" SET "IsVisible" = NOT "IsVisible" WHERE "FAQID" = ?'
        );

        $stmt->execute([$_POST['faqId']]);

        header('Location: /arthienne/public/admin/faq');
        exit;
    }

    public function delete() {
        if ($_SESSION['userType'] !== 'admin') exit;

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare(
            'DELETE FROM "FAQ" WHERE "FAQID" = ?'
        );

        $stmt->execute([$_POST['faqId']]);

        header('Location: /arthienne/public/admin/faq');
        exit;
    }
}
