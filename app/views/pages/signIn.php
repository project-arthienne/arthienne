<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">My Space</h1>

<p class="page-subtitle">
A personalised space for artists, collectors, and buyers to manage their activity within Arthienne.
</p>

<section class="contact-section signin-page">

    <?php if (!empty($_SESSION['authError'])): ?>
        <p style="color:red; margin-bottom:24px;">
            <?= $_SESSION['authError']; unset($_SESSION['authError']); ?>
        </p>
    <?php endif; ?>

    <div class="signin-form-wrapper">
        <form class="sign-in-form" method="POST" action="/arthienne/public/signin">
            <input type="email" name="email" placeholder="Email address" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn-compact">Step Inside</button>
        </form>
    </div>

    <div style="margin-top:32px; width:100%; display:flex; justify-content:center;">
        <p style="text-align:center;">
            Don’t have an account yet?
            <a href="/arthienne/public/create-account/role" class="text-link">
                Create one by clicking here.
            </a>
        </p>
    </div>


</section>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
