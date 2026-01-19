<?php require '../app/views/layouts/header.php'; ?>

<div class="deal-view">
<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">Quiet Geometry</h1>

<div class="exhibition-info">
<span class="tag">Direct Deal</span>
<span class="tag">Available Now</span>
</div>

<div class="gallery-outer">
<button class="gallery-arrow left" onclick="prevImage()">&#8249;</button>
<button class="gallery-arrow right" onclick="nextImage()">&#8250;</button>

<div class="gallery-wrapper">
<div class="gallery-main">
<img id="mainImage" src="/arthienne/public/assets/images/art/image-1.jpg">
</div>

<div class="gallery-thumbs">
<img src="/arthienne/public/assets/images/art/image-1.jpg" onclick="setImage(0)">
<img src="/arthienne/public/assets/images/art/image-2.jpg" onclick="setImage(1)">
<img src="/arthienne/public/assets/images/art/image-3.jpg" onclick="setImage(2)">
<img src="/arthienne/public/assets/images/art/image-4.jpg" onclick="setImage(3)">
</div>
</div>
</div>

<div class="description-box">
<p>
A restrained composition built around balance, proportion, and negative space. Subtle tonal variation and careful structure invite slower viewing and thoughtful visual engagement.
</p>
<p>
The work emphasizes stillness and clarity, allowing form and material to speak without interruption. Each element is placed with intention, reinforcing calm and cohesion.
</p>
<p>
Designed for collectors seeking understated presence, this piece offers visual longevity through refined simplicity.
</p>
</div>

<div class="exhibition-info">
<span class="tag">Artist: Studio Arthienne</span>
<span class="tag">Price: €420</span>
</div>

<button class="btn-compact">Purchase Artwork</button>

<section class="palette-section">
<div class="palette-header-row">
<h2 class="palette-header tag">Related Works</h2>
</div>

<?php include '../app/views/components/dealCarousel.php'; ?>
</section>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>

<script>
let currentIndex=0
const thumbs=document.querySelectorAll('.gallery-thumbs img')
const mainImage=document.getElementById('mainImage')

function setImage(i){
currentIndex=i
mainImage.src=thumbs[i].src
}

function prevImage(){
currentIndex=(currentIndex-1+thumbs.length)%thumbs.length
setImage(currentIndex)
}

function nextImage(){
currentIndex=(currentIndex+1)%thumbs.length
setImage(currentIndex)
}
</script>
