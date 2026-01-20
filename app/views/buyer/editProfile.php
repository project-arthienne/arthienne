<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">Edit Profile</h1>

<form method="POST" action="/arthienne/public/buyer/update" class="dashboard-form">
<input name="firstName" value="<?= $buyer['BuyerFName'] ?>" required>
<input name="lastName" value="<?= $buyer['BuyerLName'] ?>" required>
<input type="email" name="email" value="<?= $buyer['BuyerEmail'] ?>" required>
<input name="phone" value="<?= $buyer['BuyerPhoneNo'] ?>">
<input name="address" value="<?= $buyer['BuyerAddress'] ?>">

<button class="btn-compact">Update Profile</button>
</form>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
