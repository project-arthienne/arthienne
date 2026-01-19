<?php
$auctions = [
['id'=>1,'title'=>'Echoes In Oil','desc'=>'Layered oil works exploring memory and emotion through texture and tone.','price'=>'Starting $450'],
['id'=>2,'title'=>'Sculpted Silence','desc'=>'Minimal bronze sculptures emphasizing balance and restraint.','price'=>'Starting $600'],
['id'=>3,'title'=>'Muted Horizons','desc'=>'Soft landscapes rendered with tonal depth and quiet movement.','price'=>'Starting $380'],
['id'=>4,'title'=>'Fragments Of Light','desc'=>'Mixed media works examining reflection and contrast.','price'=>'Starting $520'],
['id'=>5,'title'=>'Residual Forms','desc'=>'Abstract compositions built from erosion and absence.','price'=>'Starting $410'],
['id'=>6,'title'=>'Still Frequencies','desc'=>'Visual rhythms capturing silence and repetition.','price'=>'Starting $470'],
];
?>

<div class="auction-carousel" data-auction-carousel>
  <button class="auction-arrow left">&#8249;</button>
  <button class="auction-arrow right">&#8250;</button>

  <div class="auction-viewport">
    <div class="auction-track">
      <?php foreach($auctions as $a): ?>
        <a href="/arthienne/public/auction/view/<?= $a['id'] ?>" class="auction-link">
          <div class="auction-card">
            <img src="/arthienne/public/assets/images/art/image-<?= $a['id'] ?>.jpg">
            <h3><?= $a['title'] ?></h3>
            <span><?= $a['price'] ?></span>
            <p><?= $a['desc'] ?></p>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</div>
