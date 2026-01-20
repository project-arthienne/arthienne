<?php

class adminController {

    public function index() {
        if (!isset($_SESSION['userType']) || $_SESSION['userType'] !== 'admin') {
            header('Location: /arthienne/public/signin');
            exit;
        }

        require '../app/views/admin/dashboard.php';
    }
}
