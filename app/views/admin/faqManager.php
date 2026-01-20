<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">FAQ Manager</h1>

<p class="page-subtitle">
Add, review, and manage frequently asked questions shown to users.
</p>

<section class="admin-section">

<form method="POST" action="/arthienne/public/admin/faq/create" class="admin-form">
<input name="question" placeholder="Question" required>
<textarea name="answer" placeholder="Answer" required></textarea>
<button class="btn-compact">Add FAQ</button>
</form>

<?php foreach ($faqs as $f): ?>
<div class="admin-card">
<h3><?= $f['Question'] ?></h3>
<p><?= $f['Answer'] ?></p>
</div>
<?php endforeach; ?>

</section>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
