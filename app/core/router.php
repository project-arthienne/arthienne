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
            (new ExhibitionController())->index();
            return;
        }

        if ($path === '/exhibitions/view') {
            require '../app/controllers/exhibitionController.php';
            (new ExhibitionController())->view();
            return;
        }

        if ($path === '/seller/view') {
            require '../app/controllers/sellerController.php';
            (new SellerController())->view();
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

        if ($path === '/contact/submit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require '../app/controllers/contactController.php';
            (new ContactController())->submit();
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
        if ($path === '/create-account/role') {
            require '../app/controllers/createAccountController.php';
            (new CreateAccountController())->role();
            return;
        }

        if ($path === '/create-account/buyer') {
            require '../app/controllers/createAccountController.php';
            (new CreateAccountController())->buyer();
            return;
        }

        if ($path === '/create-account/seller') {
            require '../app/controllers/createAccountController.php';
            (new CreateAccountController())->seller();
            return;
        }
        
        if ($path === '/signin') {
            require '../app/controllers/signInController.php';
            (new SignInController())->index();
            return;
        }

        if ($path === '/signin/authenticate' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require '../app/controllers/signInController.php';
            (new SignInController())->authenticate();
            return;
        }

        if ($path === '/logout') {
            require '../app/controllers/logoutController.php';
            (new logoutController())->index();
            return;
        }

        if ($path === '/admin') {
            require '../app/controllers/adminController.php';
            (new adminController())->index();
            return;
        }

        if ($path === '/admin/faq') {
            require '../app/controllers/faqAdminController.php';
            (new faqAdminController())->index();
            return;
        }

        if ($path === '/admin/faq/create') {
            require '../app/controllers/faqAdminController.php';
            (new faqAdminController())->create();
            return;
        }

        if ($path === '/admin/faq/update') {
            require '../app/controllers/faqAdminController.php';
            (new faqAdminController())->update();
            return;
        }

        if ($path === '/admin/faq/toggle') {
            require '../app/controllers/faqAdminController.php';
            (new faqAdminController())->toggle();
            return;
        }

        if ($path === '/admin/faq/delete') {
            require '../app/controllers/faqAdminController.php';
            (new faqAdminController())->delete();
            return;
        }

        if ($path === '/admin/terms') {
            require '../app/controllers/termsAdminController.php';
            (new termsAdminController())->index();
            return;
        }

        if ($path === '/admin/terms/update') {
            require '../app/controllers/termsAdminController.php';
            (new termsAdminController())->update();
            return;
        }

        if ($path === '/admin/contact') {
            require '../app/controllers/contactAdminController.php';
            (new contactAdminController())->index();
            return;
        }

        if ($path === '/admin/contact/view') {
            require '../app/controllers/contactAdminController.php';
            (new contactAdminController())->view();
            return;
        }

        if ($path === '/buyer/dashboard') {
            require '../app/controllers/buyerDashboardController.php';
            (new buyerDashboardController())->dashboard();
            return;
        }

        if ($path === '/buyer/edit') {
            require '../app/controllers/buyerDashboardController.php';
            (new buyerDashboardController())->edit();
            return;
        }

        if ($path === '/buyer/update') {
            require '../app/controllers/buyerDashboardController.php';
            (new buyerDashboardController())->update();
            return;
        }

        if ($path === '/seller/dashboard') {
            require '../app/controllers/sellerDashboardController.php';
            (new sellerDashboardController())->dashboard();
            return;
        }

        if ($path === '/seller/edit') {
            require '../app/controllers/sellerDashboardController.php';
            (new sellerDashboardController())->edit();
            return;
        }

        if ($path === '/seller/update') {
            require '../app/controllers/sellerDashboardController.php';
            (new sellerDashboardController())->update();
            return;
        }

        if ($path === '/forums') {
            require '../app/controllers/forumController.php';
            (new ForumController())->index();
            return;
        }

        if ($path === '/forum/view') {
            require '../app/controllers/forumController.php';
            (new ForumController())->view();
            return;
        }

        if ($path === '/forum/comment' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require '../app/controllers/forumController.php';
            (new ForumController())->comment();
            return;
        }

        if ($path === '/admin/forums') {
            require '../app/controllers/forumAdminController.php';
            (new forumAdminController())->index();
            return;
        }

        if ($path === '/admin/forums/create') {
            require '../app/controllers/forumAdminController.php';
            (new forumAdminController())->create();
            return;
        }

        http_response_code(404);
        echo '404';
    }
}
