<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">FAQ Manager</h1>

<form method="POST" action="/arthienne/public/admin/faq/create" class="dashboard-form">
<input name="question" placeholder="New Question" required>
<textarea name="answer" placeholder="New Answer" required></textarea>
<button class="btn-compact">Add FAQ</button>
</form>

<?php foreach ($faqs as $f): ?>
<form method="POST" action="/arthienne/public/admin/faq/update" class="dashboard-form" style="margin-top:48px;">
<input type="hidden" name="faqId" value="<?= $f['FAQID'] ?>">

<input name="question" value="<?= htmlspecialchars($f['Question']) ?>" required>

<textarea name="answer" required><?= htmlspecialchars($f['Answer']) ?></textarea>

<div class="dashboard-actions">

<button formaction="/arthienne/public/admin/faq/update" class="btn-compact">
Update
</button>

<button formaction="/arthienne/public/admin/faq/toggle" class="btn-compact">
<?= $f['IsVisible'] ? 'Hide' : 'Show' ?>
</button>

<button formaction="/arthienne/public/admin/faq/delete" class="btn-compact">
Delete
</button>

</div>
</form>
<?php endforeach; ?>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
