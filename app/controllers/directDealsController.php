<?php

class directDealsController
{
    public function index()
    {
        require '../app/views/pages/directDeals.php';
    }

    public function view()
    {
        $id = $_GET['id'] ?? null;
        require '../app/views/pages/directDealView.php';
    }
}
