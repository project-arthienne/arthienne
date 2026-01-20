<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">Discussion Forums</h1>

<p class="page-subtitle">
Exchange perspectives, share opinions, and explore diverse artistic discussions.
</p>

<div class="forum-grid">
<?php foreach ($forums as $f): ?>
<a href="/arthienne/public/forum/view?id=<?= $f['ForumID'] ?>" class="forum-card forum-link">
<h3 class="card-title"><?= htmlspecialchars($f['ForumTitle']) ?></h3>
<p><?= htmlspecialchars($f['ForumDescription']) ?></p>
</a>
<?php endforeach; ?>
</div>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
