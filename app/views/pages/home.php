<?php require __DIR__ . '/../layouts/header.php'; ?>

<section class="hero-section">
<div class="hero-left">
<h1 class="hero-title">Arthienne</h1>
<p class="hero-subtitle">Your Gateway to<br>Timeless Creations</p>
<button class="btn-compact">Get Started</button>
</div>

<div class="hero-right">
<img src="/arthienne/public/assets/images/landing.png">
</div>
</section>

<section class="about-section">
<div class="about-text full-width">
<span class="tag">Arthienne</span>
<p>
We showcase original artworks and limited prints. Every piece is hand-selected and presented with care.
Whether you are an artist, a collector, or simply an art enthusiast, Arthienne connects you with creativity,
discovery, and timeless expression.
</p>
<a class="about-link">More →</a>
</div>
</section>

<?php include __DIR__ . '/../components/palette.php'; ?>

<section class="palette-section">
<div class="palette-header-row">
<h2 class="palette-header tag">Trending</h2>
<button class="btn-compact">See All</button>
</div>

<?php include __DIR__ . '/../components/palette.php'; ?>
</section>

<section class="palette-section">
<div class="palette-header-row">
<h2 class="palette-header tag">Popular</h2>
<button class="btn-compact">See All</button>
</div>

<?php include __DIR__ . '/../components/palette.php'; ?>
</section>

<?php include __DIR__ . '/../components/discount.php'; ?>
<?php require __DIR__ . '/../layouts/footerExtended.php'; ?>
