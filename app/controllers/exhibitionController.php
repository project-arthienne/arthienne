<?php

require_once '../app/core/Database.php';

class ExhibitionController {

    public function index() {
        $db = Database::getInstance()->getConnection();

        $stmt = $db->query(
            'SELECT e.*, s."SellerFName", s."SellerLName"
             FROM "Exhibitions" e
             JOIN "SellerInExhibitions" sie ON sie."ExhibitionID" = e."ExhibitionID"
             JOIN "Seller" s ON s."SellerID" = sie."SellerID"
             ORDER BY e."ExhibitionDate" ASC'
        );

        $exhibitions = $stmt->fetchAll();

        require '../app/views/pages/exhibitions.php';
    }

    public function view() {
        $id = $_GET['id'] ?? null;
        if (!$id) exit;

        $db = Database::getInstance()->getConnection();

        $stmt = $db->prepare(
            'SELECT e.*, s."SellerID", s."SellerFName", s."SellerLName"
             FROM "Exhibitions" e
             JOIN "SellerInExhibitions" sie ON sie."ExhibitionID" = e."ExhibitionID"
             JOIN "Seller" s ON s."SellerID" = sie."SellerID"
             WHERE e."ExhibitionID" = ?'
        );
        $stmt->execute([$id]);
        $exhibition = $stmt->fetch();

        if (!$exhibition) exit;

        require '../app/views/pages/exhibitionView.php';
    }
}
