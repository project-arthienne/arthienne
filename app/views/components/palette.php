<?php
$basePath = $_SERVER['DOCUMENT_ROOT'] . "/arthienne/public/assets/images/art/";
$images = glob($basePath . "image-*.*");
$images = array_map(fn($img) => str_replace($_SERVER['DOCUMENT_ROOT'], '', $img), $images);
$images = array_merge($images, $images);
?>

<div class="palette-shell" data-palette>
<button class="palette-nav left">&#8249;</button>
<button class="palette-nav right">&#8250;</button>

<div class="palette-wrapper">
<div class="palette-viewport">
<div class="palette-track">
<?php foreach ($images as $img): ?>
<div class="palette-item"><img src="<?= $img ?>"></div>
<?php endforeach; ?>
</div>
</div>
</div>
</div>
