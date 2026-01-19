<?php require '../app/views/layouts/header.php'; ?>

<div class="deal-view">
<div class="page-wrapper" style="padding-top:120px;">

<section class="auction-top">
<div class="product-title-box">
<h1>Echoes In Oil</h1>
</div>

<div class="date-container">
<div class="date-box">Start: 12-10-2025</div>
<div class="date-box">End: 18-10-2025</div>
</div>
</section>

<section class="main-display">
<div class="big-placeholder">
<img src="/arthienne/public/assets/images/art/image-1.jpg">
</div>

<div class="mini-grid">
<img src="/arthienne/public/assets/images/art/image-2.jpg">
<img src="/arthienne/public/assets/images/art/image-3.jpg">
<img src="/arthienne/public/assets/images/art/image-4.jpg">
<img src="/arthienne/public/assets/images/art/image-5.jpg">
</div>
</section>

<div class="content-area">

<section class="artwork-details">
<div class="description-box">
<p>
A refined collection of oil paintings exploring layered memory, subtle motion, and emotional depth through controlled composition.
</p>
<p>
Each piece balances expressive surface treatment with structural clarity, encouraging slow observation and contemplation.
</p>
</div>

<div class="exhibition-info">
<span class="tag">Seller: Liam Turner</span>
<span class="tag">Time Left: 02:14:36</span>
<span class="tag">Base Price: $450</span>
</div>

<aside class="bidding-side">
<div class="bid-card">

<p>
Enter your bid amount below. All bids are final and legally binding.
</p>

<div class="bid-form">
<input class="bid-input" type="text" placeholder="Your Bid">
<button class="btn-compact">Place Bid</button>
</div>

<p class="small-label">Current Top Bids</p>

<div class="quick-bids">
<button class="chip">$520</button>
<button class="chip">$560</button>
<button class="chip">$600</button>
</div>

</div>
</aside>

</div>

<section class="palette-section">
<div class="palette-header-row">
<h2 class="palette-header tag">Related Auctions</h2>
</div>

<?php include '../app/views/components/auctionCarousel.php'; ?>
</section>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
