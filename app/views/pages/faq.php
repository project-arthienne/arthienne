<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">Frequently Asked Questions</h1>

<p class="page-subtitle">
Find clear answers to common questions about exhibitions, auctions, and using Arthienne.
</p>

<form method="GET" action="/arthienne/public/faq" class="faq-search">
    <input
        type="text"
        name="q"
        placeholder="Search FAQs"
        value="<?= htmlspecialchars($_GET['q'] ?? '') ?>"
    >
</form>

<div class="faq-container">

<?php if (empty($faqs)): ?>
<p style="text-align:center; margin-top:48px;">
No results found.
</p>
<?php endif; ?>

<?php foreach ($faqs as $index => $faq): ?>
<div class="faq-item">
    <input type="checkbox" id="q<?= $index ?>">
    <label for="q<?= $index ?>" class="faq-question">
        <?= htmlspecialchars($faq['Question']) ?>
    </label>
    <div class="faq-answer">
        <p><?= nl2br(htmlspecialchars($faq['Answer'])) ?></p>
    </div>
</div>
<?php endforeach; ?>

<div class="faq-cta">
<p>Still confused?</p>
<a href="/arthienne/public/contact">
    <button class="btn-compact">Contact Us</button>
</a>
</div>

</div>
</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
