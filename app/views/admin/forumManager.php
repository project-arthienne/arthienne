<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">Forum Manager</h1>

<form method="POST" action="/arthienne/public/admin/forums/create" class="dashboard-form">
<input name="title" placeholder="Forum Title" required>
<textarea name="description" placeholder="Forum Description" required></textarea>
<button class="btn-compact">Create Forum</button>
</form>

<table class="admin-table">
<tr>
<th>Title</th>
<th>Description</th>
</tr>
<?php foreach ($forums as $f): ?>
<tr>
<td><?= htmlspecialchars($f['ForumTitle']) ?></td>
<td><?= htmlspecialchars($f['ForumDescription']) ?></td>
</tr>
<?php endforeach; ?>
</table>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
