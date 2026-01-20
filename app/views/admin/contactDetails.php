<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">Contact Request Details</h1>

<p class="page-subtitle">
Read-only information submitted via the contact form.
</p>

<div class="dashboard-form">

<input value="<?= htmlspecialchars($message['Email']) ?>" readonly>
<input value="<?= htmlspecialchars($message['Topic']) ?>" readonly>

<textarea readonly><?= htmlspecialchars($message['Message']) ?></textarea>

<?php if ($user): ?>
<input value="<?= htmlspecialchars(($user['BuyerFName'] ?? $user['SellerFName']) . ' ' . ($user['BuyerLName'] ?? $user['SellerLName'])) ?>" readonly>
<input value="<?= htmlspecialchars($user['BuyerPhoneNo'] ?? $user['SellerPhoneNo']) ?>" readonly>
<input value="<?= htmlspecialchars($user['BuyerAddress'] ?? $user['SellerAddress']) ?>" readonly>
<?php endif; ?>

<a href="/arthienne/public/admin/contact" class="btn-compact">
Go Back
</a>

</div>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
