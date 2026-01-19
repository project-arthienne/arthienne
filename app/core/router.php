<?php

class Router {
    public function resolve() {
        $base = '/arthienne/public';
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = str_replace($base, '', $path);

        if ($path === '' || $path === '/') {
            require '../app/controllers/homeController.php';
            (new homeController())->index();
            return;
        }

        if ($path === '/exhibitions') {
            require '../app/controllers/exhibitionController.php';
            (new exhibitionController())->index();
            return;
        }

        if ($path === '/exhibitions/view') {
            require '../app/controllers/exhibitionController.php';
            (new exhibitionController())->view();
            return;
        }

        if ($path === '/forums') {
            require '../app/controllers/forumController.php';
            (new forumController())->index();
            return;
        }

        if ($path === '/contact') {
            require '../app/controllers/contactController.php';
            (new contactController())->index();
            return;
        }

        if ($path === '/faq') {
            require '../app/controllers/faqController.php';
            (new faqController())->index();
            return;
        }

        if ($path === '/directdeals') {
            require '../app/controllers/directDealsController.php';
            (new directDealsController())->index();
            return;
        }

        if ($path === '/directdeals/view') {
            require '../app/controllers/directDealsController.php';
            (new directDealsController())->view();
            return;
        }

        if ($path === '/signin') {
            require '../app/controllers/signinController.php';
            (new signinController())->index();
            return;
        }

        if($path==='/auctions'){
            require '../app/controllers/auctionController.php';
            (new auctionController())->index();
            return;
        }

        if(str_starts_with($path,'/auction/view')){
            require '../app/controllers/auctionController.php';
            (new auctionController())->view();
            return;
        }

        if ($path === '/terms') {
            require '../app/controllers/termsController.php';
            (new termsController())->index();
            return;
        }

        http_response_code(404);
        echo '404';
    }
}
