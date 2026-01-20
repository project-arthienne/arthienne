<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">Edit Profile</h1>

<form method="POST" action="/arthienne/public/seller/update" class="dashboard-form">
<input name="firstName" value="<?= $seller['SellerFName'] ?>" required>
<input name="lastName" value="<?= $seller['SellerLName'] ?>" required>
<input type="email" name="email" value="<?= $seller['SellerEmail'] ?>" required>
<input name="phone" value="<?= $seller['SellerPhoneNo'] ?>">
<input name="address" value="<?= $seller['SellerAddress'] ?>">

<button class="btn-compact">Update Profile</button>
</form>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
