<?php require '../app/views/layouts/header.php'; ?>

<section class="contact-section">
    <h1 class="page-title">My Space</h1>

    <p class="page-subtitle">
        A personalised space for artists, collectors, and buyers to manage their activity within Arthienne.
    </p>

    <form class="sign-in-form" style="display:flex; flex-direction:column; gap:24px; max-width:420px; width:100%;">
        <input type="email" placeholder="Email address" required>
        <input type="password" placeholder="Password" required>

        <button type="submit">Step Inside</button>
    </form>
</section>

<?php require '../app/views/layouts/footer.php'; ?>
