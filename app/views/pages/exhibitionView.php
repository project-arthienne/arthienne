<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title"><?= htmlspecialchars($exhibition['ExhibitionTitle']) ?></h1>

<div class="gallery-outer">

<div class="gallery-wrapper">
<div class="gallery-main">
<img src="/arthienne/public/assets/images/art/image-1.jpg">
</div>

<div class="gallery-thumbs">
<img src="/arthienne/public/assets/images/art/image-1.jpg">
<img src="/arthienne/public/assets/images/art/image-2.jpg">
<img src="/arthienne/public/assets/images/art/image-3.jpg">
<img src="/arthienne/public/assets/images/art/image-4.jpg">
<img src="/arthienne/public/assets/images/art/image-5.jpg">
</div>
</div>

</div>

<div class="exhibition-info">
<span class="tag">
<?= htmlspecialchars($exhibition['SellerFName'].' '.$exhibition['SellerLName']) ?>
</span>
<span class="tag">
<?= date('d-m-Y', strtotime($exhibition['ExhibitionDate'])) ?>
</span>
</div>

<div class="description-box">
<p><?= nl2br(htmlspecialchars($exhibition['ExhibitionDescription'])) ?></p>
</div>

<a href="/arthienne/public/seller/view?id=<?= $exhibition['SellerID'] ?>" class="btn-compact">
Contact Artist
</a>

<section class="palette-section">
<div class="palette-header">Related Works</div>
<?php include '../app/views/components/palette.php'; ?>
</section>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
