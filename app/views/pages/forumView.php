<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title"><?= htmlspecialchars($forum['ForumTitle']) ?></h1>

<p class="page-subtitle">
<?= htmlspecialchars($forum['ForumDescription']) ?>
</p>

<?php if (isset($_SESSION['userType']) && $_SESSION['userType'] !== 'admin'): ?>
<form method="POST" action="/arthienne/public/forum/comment" class="dashboard-form">
<input type="hidden" name="forumId" value="<?= $forum['ForumID'] ?>">
<textarea name="comment" placeholder="Share your thoughts..." required></textarea>
<button class="btn-compact">Post Comment</button>
</form>
<?php endif; ?>

<section style="margin-top:64px;">
<?php foreach ($comments as $c): ?>
<div class="exhibition-card">
<p><strong><?= htmlspecialchars($c['UserName']) ?>:</strong></p>
<p><?= nl2br(htmlspecialchars($c['CommentText'])) ?></p>
</div>
<?php endforeach; ?>
</section>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
