<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<section class="terms-section">

<h1 class="page-title">Terms And Conditions</h1>

<div class="terms-content">
<?= nl2br(htmlspecialchars($terms['Content'])) ?>
</div>

</section>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
