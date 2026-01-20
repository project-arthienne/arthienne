<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">Admin Dashboard</h1>

<p class="page-subtitle">
Manage platform content, moderation, and public-facing information.
</p>

<section class="admin-links" style="display:flex; gap:24px; justify-content:center; margin-top:48px;">
    <a href="/arthienne/public/admin/forums" class="btn-compact" style="text-decoration:none; color:inherit;">Manage Forums</a>
    <a href="/arthienne/public/admin/faq" class="btn-compact" style="text-decoration:none; color:inherit;">Manage FAQs</a>
    <a href="/arthienne/public/admin/terms" class="btn-compact" style="text-decoration:none; color:inherit;">Manage Terms</a>
    <a href="/arthienne/public/admin/contact" class="btn-compact" style="text-decoration:none; color:inherit;">View Contact Requests</a>
</section>

<div style="display:flex; justify-content:center; margin-top:40px;">
    <a href="/arthienne/public/logout" class="btn-compact" style="text-decoration:none; color:inherit;">Logout</a>
</div>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
