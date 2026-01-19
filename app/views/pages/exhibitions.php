<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">Exhibitions</h1>

<?php
$exhibitions = [

['id'=>1,'title'=>'Modern Masters','desc'=>'A curated exhibition celebrating influential abstract artists of the twentieth century.','date'=>'15-09-2025','seller'=>'Diana Evans'],
['id'=>2,'title'=>'Digital Dreams','desc'=>'An immersive look into contemporary digital painting and nft culture.','date'=>'01-12-2025','seller'=>'Ethan Fisher'],
['id'=>3,'title'=>'Sculpted Silence','desc'=>'Minimalist bronze sculptures exploring form, balance, and stillness.','date'=>'10-03-2026','seller'=>'Fiona Green'],
['id'=>4,'title'=>'Echoes In Oil','desc'=>'Exploring memory and emotion through layered oil compositions.','date'=>'18-04-2026','seller'=>'Liam Turner'],
['id'=>5,'title'=>'Forms Of Stillness','desc'=>'A study of quiet geometry and restrained sculptural form.','date'=>'02-06-2026','seller'=>'Noah Reed'],
['id'=>6,'title'=>'Fragments Of Light','desc'=>'Works focused on contrast, reflection, and perception through mixed media.','date'=>'19-08-2026','seller'=>'Ava Collins'],
['id'=>7,'title'=>'Muted Horizons','desc'=>'Landscape interpretations softened by tone, texture, and restraint.','date'=>'05-10-2026','seller'=>'Oliver Hayes'],
['id'=>8,'title'=>'Temporal Lines','desc'=>'An exploration of time and repetition through linear abstraction.','date'=>'21-11-2026','seller'=>'Sophia Bennett'],
['id'=>9,'title'=>'Stone And Breath','desc'=>'Sculptural forms balancing weight, space, and quiet tension.','date'=>'14-01-2027','seller'=>'Lucas Moreau'],
['id'=>10,'title'=>'Residual Forms','desc'=>'Minimal compositions built from memory, erosion, and absence.','date'=>'03-03-2027','seller'=>'Isla Morgan'],
['id'=>11,'title'=>'Surface Studies','desc'=>'Investigations into material surfaces and tactile response.','date'=>'27-04-2027','seller'=>'Theo Walker'],
['id'=>12,'title'=>'Still Frequencies','desc'=>'Abstract works capturing silence, rhythm, and visual pause.','date'=>'09-06-2027','seller'=>'Maya Laurent']
];

foreach($exhibitions as $e){
$id=$e['id'];
$title=$e['title'];
$description=$e['desc'];
$date=$e['date'];
$seller=$e['seller'];
require '../app/views/components/exhibitionCard.php';
}
?>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
