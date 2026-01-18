<?php
$images = glob($_SERVER['DOCUMENT_ROOT'] . "/public/assets/images/art/image-*.*");
$images = array_map(fn($img) => str_replace($_SERVER['DOCUMENT_ROOT'], '', $img), $images);
$images = array_merge($images, $images);
?>

<div class="palette-wrapper" data-palette>
<button class="palette-arrow left">&#8249;</button>
<button class="palette-arrow right">&#8250;</button>

<div class="palette-viewport">
<div class="palette-track">
<?php foreach ($images as $img): ?>
<div class="palette-item"><img src="<?= $img ?>"></div>
<?php endforeach; ?>
</div>
</div>
</div>
