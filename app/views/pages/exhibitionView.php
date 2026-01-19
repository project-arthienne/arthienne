<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">Exhibition Title</h1>

<div class="gallery-outer">
<button class="gallery-arrow left" onclick="prevImage()">&#8249;</button>
<button class="gallery-arrow right" onclick="nextImage()">&#8250;</button>

<div class="gallery-wrapper">
<div class="gallery-main">
<img id="mainImage" src="/arthienne/public/assets/images/placeholder-image.jpg">
</div>

<div class="gallery-thumbs">
<img src="/arthienne/public/assets/images/placeholder-image.jpg" onclick="setImage(0)">
<img src="/arthienne/public/assets/images/placeholder-image.jpg" onclick="setImage(1)">
<img src="/arthienne/public/assets/images/placeholder-image.jpg" onclick="setImage(2)">
<img src="/arthienne/public/assets/images/placeholder-image.jpg" onclick="setImage(3)">
</div>
</div>
</div>

<div class="exhibition-info">
<span class="tag">Artist Name</span>
<span class="tag">Exhibition Date</span>
</div>

<div class="description-box">
<p>
This exhibition presents a thoughtfully curated selection of works that explore material depth, surface variation, and compositional restraint through a refined artistic lens. Each piece reflects a careful balance between form and intention, inviting viewers into a slower and more deliberate visual experience.
</p>
<p>
Through layered techniques and subtle tonal shifts, the artist emphasizes continuity and rhythm, allowing each work to unfold gradually while maintaining a strong sense of cohesion across the exhibition. The dialogue between light, texture, and spatial awareness becomes central to the viewing experience.
</p>
<p>
Together, these works form a unified narrative that encourages close observation and sustained engagement, reinforcing the exhibition’s commitment to timeless craftsmanship and conceptual clarity.
</p>
</div>

<button class="btn-compact">Contact Artist</button>

<section class="palette-section">
<div class="palette-header">Related Works</div>

<?php include '../app/views/components/palette.php'; ?>
</section>

</div>

<script>
let currentIndex=0;
const thumbs=document.querySelectorAll('.gallery-thumbs img');
const mainImage=document.getElementById('mainImage');

function setImage(i){
currentIndex=i;
mainImage.src=thumbs[i].src;
}

function prevImage(){
currentIndex=(currentIndex-1+thumbs.length)%thumbs.length;
setImage(currentIndex);
}

function nextImage(){
currentIndex=(currentIndex+1)%thumbs.length;
setImage(currentIndex);
}
</script>

<?php require '../app/views/layouts/footerExtended.php'; ?>
