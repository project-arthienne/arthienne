<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<h1 class="page-title">Exhibitions</h1>

<div class="content-column">

<?php foreach ($exhibitions as $e): ?>
<a href="/arthienne/public/exhibitions/view?id=<?= $e['ExhibitionID'] ?>" class="exhibition-card">

    <div class="exhibition-left">
        <h3><?= htmlspecialchars($e['ExhibitionTitle']) ?></h3>
        <p><?= htmlspecialchars($e['ExhibitionDescription']) ?></p>
    </div>

    <div class="exhibition-right">
        <span><?= htmlspecialchars($e['SellerFName'].' '.$e['SellerLName']) ?></span>
        <span><?= date('d-m-Y', strtotime($e['ExhibitionDate'])) ?></span>
    </div>

</a>
<?php endforeach; ?>

</div>

</div>

<?php require '../app/views/layouts/footerExtended.php'; ?>
