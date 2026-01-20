<?php

require_once '../app/core/Database.php';

class ForumController {

    public function index() {
        $db = Database::getInstance()->getConnection();
        $forums = $db->query(
            'SELECT * FROM "Forums" ORDER BY "ForumID" DESC'
        )->fetchAll();

        require '../app/views/pages/forums.php';
    }

    public function view() {
        $id = $_GET['id'] ?? null;
        if (!$id) exit;

        $db = Database::getInstance()->getConnection();

        $forumStmt = $db->prepare(
            'SELECT * FROM "Forums" WHERE "ForumID" = ?'
        );
        $forumStmt->execute([$id]);
        $forum = $forumStmt->fetch();
        if (!$forum) exit;

        $commentsStmt = $db->prepare(
            '
            SELECT
                c."CommentID",
                c."CommentText",
                c."CreatedAt",
                c."UserType",
                c."UserID",
                CASE
                    WHEN c."UserType" = \'buyer\' THEN
                        (SELECT "BuyerFName" || \' \' || "BuyerLName"
                         FROM "Buyer"
                         WHERE "BuyerID" = c."UserID")
                    WHEN c."UserType" = \'seller\' THEN
                        (SELECT "SellerFName" || \' \' || "SellerLName"
                         FROM "Seller"
                         WHERE "SellerID" = c."UserID")
                END AS "UserName"
            FROM "ForumComment" c
            WHERE c."ForumID" = ?
            ORDER BY c."CreatedAt" DESC
            '
        );
        $commentsStmt->execute([$id]);
        $comments = $commentsStmt->fetchAll();

        require '../app/views/pages/forumView.php';
    }

    public function comment() {
        if (!isset($_SESSION['userType'])) {
            header('Location: /arthienne/public/signin');
            exit;
        }

        if ($_SESSION['userType'] === 'admin') exit;

        $db = Database::getInstance()->getConnection();

        $stmt = $db->prepare(
            'INSERT INTO "ForumComment"
            ("ForumID","UserType","UserID","CommentText")
            VALUES (?,?,?,?)'
        );

        $stmt->execute([
            $_POST['forumId'],
            $_SESSION['userType'],
            $_SESSION['userId'],
            $_POST['comment']
        ]);

        header('Location: /arthienne/public/forum/view?id=' . $_POST['forumId']);
        exit;
    }
}
