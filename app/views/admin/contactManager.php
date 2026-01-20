<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">Contact Requests</h1>

<p class="page-subtitle">
Messages submitted by users via the contact form.
</p>

<section class="admin-section">

<?php if (empty($messages)): ?>
<p>No contact requests yet.</p>
<?php endif; ?>

<?php foreach ($messages as $m): ?>
<div class="admin-card">
<h3><?= htmlspecialchars($m['Email']) ?></h3>
<p><strong>Topic:</strong> <?= htmlspecialchars($m['Topic']) ?></p>
<p><?= nl2br(htmlspecialchars($m['Message'])) ?></p>
</div>
<?php endforeach; ?>

</section>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
