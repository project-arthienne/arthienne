<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper create-account-page" style="padding-top:120px;">

<h1 class="page-title">Create Buyer Account</h1>

<p class="page-subtitle">
Join Arthienne as a buyer and start collecting artworks.
</p>

<section class="contact-section">

    <div class="signin-form-wrapper">
        <form class="sign-in-form" method="POST">

            <input type="text" name="firstName" placeholder="First name" required>
            <input type="text" name="lastName" placeholder="Last name" required>
            <input type="email" name="email" placeholder="Email address" required>
            <input type="text" name="phone" placeholder="Phone number" pattern="[0-9]*" inputmode="numeric" required>
            <input type="text" name="address" placeholder="Address" required>
            <input type="password" name="password" placeholder="Password (min 8 characters)" required>

            <button type="submit" class="btn-compact">Create Account</button>

        </form>
    </div>

</section>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
