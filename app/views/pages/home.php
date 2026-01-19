<?php require __DIR__ . '/../layouts/header.php'; ?>

<div class="landing-page">

<section class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">Arthienne</h1>
        <p class="hero-subtitle">Your Gateway to<br>Timeless Creations</p>
        <button class="btn-compact">Get Started</button>
    </div>
</section>

<div class="page-wrapper">

<section class="about-section">
    <div class="about-text">
        <span class="tag">Arthienne</span>
        <p>
        We showcase original artworks and limited prints. Every piece is hand-selected and presented with care.
        Whether you are an artist, a collector, or simply an art enthusiast, Arthienne connects you with creativity,
        discovery, and timeless expression.
        </p>
    </div>
    <?php include __DIR__ . '/../components/palette.php'; ?>
</section>

<section class="palette-section">
    <div class="palette-header-row">
        <h2 class="palette-header tag">Trending</h2>
        <a href="/arthienne/public/exhibitions">
            <button class="btn-compact">See All</button>
        </a>
    </div>
    <?php include __DIR__ . '/../components/palette.php'; ?>
</section>

<section class="palette-section">
    <div class="palette-header-row">
        <h2 class="palette-header tag">Popular</h2>
        <a href="/arthienne/public/exhibitions">
            <button class="btn-compact">See All</button>
        </a>
    </div>
    <?php include __DIR__ . '/../components/palette.php'; ?>
</section>

<?php include __DIR__ . '/../components/discount.php'; ?>

</div>
</div>

<?php require __DIR__ . '/../layouts/footerExtended.php'; ?>
