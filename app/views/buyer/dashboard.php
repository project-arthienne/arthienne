<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">Welcome, <?= $buyer['BuyerFName'] ?> <?= $buyer['BuyerLName'] ?></h1>

<p class="page-subtitle">
Thank you for being a registered user of Arthienne.
You can now freely navigate artworks, auctions, exhibitions, and more using the header or quick links below.
</p>

<div class="dashboard-actions">
<a href="/arthienne/public/buyer/edit" class="btn-compact">Edit Profile</a>
<a href="/arthienne/public/logout" class="btn-compact">Logout</a>
</div>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
