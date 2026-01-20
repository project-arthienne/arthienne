<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">Edit Terms & Conditions</h1>

<p class="page-subtitle">
Update the legal terms displayed across the platform.
</p>

<form method="POST" action="/arthienne/public/admin/terms/update" class="admin-form" style="max-width:720px;">
<textarea name="content"><?= $terms['Content'] ?? '' ?></textarea>
<button class="btn-compact">Save Changes</button>
</form>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
