<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">
<?= htmlspecialchars($seller['SellerFName'].' '.$seller['SellerLName']) ?>
</h1>

<form class="dashboard-form">

<input value="<?= htmlspecialchars($seller['SellerEmail']) ?>" readonly>
<input value="<?= htmlspecialchars($seller['SellerPhoneNo']) ?>" readonly>
<input value="<?= htmlspecialchars($seller['SellerAddress']) ?>" readonly>

<a href="javascript:history.back()" class="btn-compact">Go Back</a>

</form>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
