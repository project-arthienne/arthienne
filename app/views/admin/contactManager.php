<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">Contact Requests</h1>

<p class="page-subtitle">
Messages submitted by users via the contact form.
</p>

<?php if (empty($messages)): ?>
<p>No contact requests yet.</p>
<?php else: ?>

<table class="admin-table">
<thead>
<tr>
<th>Email</th>
<th>Topic</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php foreach ($messages as $m): ?>
<tr>
<td><?= htmlspecialchars($m['Email']) ?></td>
<td><?= htmlspecialchars($m['Topic']) ?></td>
<td>
<a href="/arthienne/public/admin/contact/view?id=<?= $m['MessageID'] ?>" class="btn-compact">
Get Details
</a>
</td>
</tr>
<?php endforeach; ?>

</tbody>
</table>

<?php endif; ?>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
