<?php
$deals = [
[
'title'=>'Quiet Geometry',
'description'=>'A restrained composition built around balance, proportion, and negative space. Subtle tonal variation and careful structure invite slower viewing and thoughtful visual engagement.',
'price'=>'€420',
'image'=>'/arthienne/public/assets/images/art/image-1.jpg'
],
[
'title'=>'Soft Horizon',
'description'=>'Layered pigments form a softened landscape where distance and atmosphere dissolve gradually. The work explores calm, memory, and the quiet rhythm of open spatial depth.',
'price'=>'€395',
'image'=>'/arthienne/public/assets/images/art/image-2.jpg'
],
[
'title'=>'Stone Memory',
'description'=>'Textural surfaces and compressed forms evoke erosion, permanence, and material memory. The piece reflects on weight, stillness, and the slow passage of time.',
'price'=>'€510',
'image'=>'/arthienne/public/assets/images/art/image-3.jpg'
],
[
'title'=>'Interior Silence',
'description'=>'An abstract study focused on visual pause and inner tension. Repetition and contrast create a meditative rhythm that unfolds through close and deliberate observation.',
'price'=>'€465',
'image'=>'/arthienne/public/assets/images/art/image-4.jpg'
],
[
'title'=>'Residual Light',
'description'=>'Explores how light interacts with layered surfaces and muted tones. Depth emerges gradually through restrained color shifts and subtle material variation.',
'price'=>'€540',
'image'=>'/arthienne/public/assets/images/art/image-5.jpg'
],
[
'title'=>'Muted Structures',
'description'=>'Geometric forms intersect with softened edges to explore balance and restraint. The work emphasizes structure while maintaining a quiet and reflective presence.',
'price'=>'€430',
'image'=>'/arthienne/public/assets/images/art/image-6.jpg'
],
[
'title'=>'Still Passage',
'description'=>'A contemplative composition centered on transition and continuity. Gentle contrasts guide the eye through a measured and intentional visual progression.',
'price'=>'€455',
'image'=>'/arthienne/public/assets/images/art/image-7.jpg'
],
[
'title'=>'Eroded Calm',
'description'=>'Surface variation and layered material suggest erosion and time. The piece balances raw texture with controlled form to create a sense of grounded calm.',
'price'=>'€495',
'image'=>'/arthienne/public/assets/images/art/image-8.jpg'
],
[
'title'=>'Quiet Tension',
'description'=>'Subtle contrasts and spatial compression introduce tension without disruption. The work invites prolonged engagement through its restrained visual language.',
'price'=>'€470',
'image'=>'/arthienne/public/assets/images/art/image-9.jpg'
],
[
'title'=>'Measured Forms',
'description'=>'A study in proportion and repetition where form is reduced to its essentials. The composition reflects precision, balance, and intentional visual clarity.',
'price'=>'€445',
'image'=>'/arthienne/public/assets/images/art/image-10.jpg'
],
[
'title'=>'Soft Contours',
'description'=>'Rounded shapes and softened boundaries create a sense of flow and continuity. The work emphasizes harmony through gentle transitions and tonal balance.',
'price'=>'€460',
'image'=>'/arthienne/public/assets/images/art/image-11.jpg'
],
[
'title'=>'Silent Depth',
'description'=>'Depth is suggested through layered tones and minimal contrast. The piece encourages slow observation, revealing complexity beneath apparent simplicity.',
'price'=>'€520',
'image'=>'/arthienne/public/assets/images/art/image-12.jpg'
],
[
'title'=>'Restrained Motion',
'description'=>'Directional marks introduce movement within a controlled structure. The balance between motion and stillness defines the work’s quiet energy.',
'price'=>'€485',
'image'=>'/arthienne/public/assets/images/art/image-13.jpg'
],
[
'title'=>'Calm Fragments',
'description'=>'Fragmented forms are arranged with precision to create cohesion. The composition reflects restraint while allowing subtle visual dialogue between elements.',
'price'=>'€450',
'image'=>'/arthienne/public/assets/images/art/image-14.jpg'
],
[
'title'=>'Surface Echoes',
'description'=>'Material texture and tonal repetition create visual echoes across the surface. The work explores how repetition reinforces calm and continuity.',
'price'=>'€530',
'image'=>'/arthienne/public/assets/images/art/image-15.jpg'
]
];
?>

<div class="deal-carousel" data-deal-carousel>

<button class="deal-arrow left">&#8249;</button>
<button class="deal-arrow right">&#8250;</button>

<div class="deal-viewport">
<div class="deal-track">

<?php foreach($deals as $index => $deal): ?>
<a href="/arthienne/public/directdeals/view?id=<?= $index ?>" class="deal-link">
<div class="deal-card">
<img src="<?= $deal['image'] ?>">
<h3><?= $deal['title'] ?></h3>
<span><?= $deal['price'] ?></span>
<p><?= $deal['description'] ?></p>
</div>
</a>
<?php endforeach; ?>

</div>
</div>
</div>
