<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">Welcome, <?= $seller['SellerFName'] ?> <?= $seller['SellerLName'] ?></h1>

<p class="page-subtitle">
Thank you for being a registered seller on Arthienne.
You can now manage your participation across auctions, exhibitions, and forums.
</p>

<div class="dashboard-actions">
<a href="/arthienne/public/seller/edit" class="btn-compact">Edit Profile</a>
<a href="/arthienne/public/logout" class="btn-compact">Logout</a>
</div>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
