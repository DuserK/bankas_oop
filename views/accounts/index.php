
<?php
require __DIR__.'/../home/index.php';
require __DIR__.'/listHeader.php';
?>
<?php if (empty($accounts)) : ?>
<p>No accounts yet</p>
<?php endif ?>
<?php foreach ($accounts as $account) : ?>
    <div class="row info-account">
        <div class="col-2"><?= $account['name'] ?></div>
        <div class="col-2"><?= $account['surname'] ?></div>
        <div class="col-2"><?= $account['personID'] ?></div>
        <div class="col-3"><?= $account['accountNumber'] ?></div>
        <div class="col-1" style = "text-align: right"><?= $account['balance'] ?> €</div>
        <div class="col-2 edit"><?php require __DIR__ .'/editbuttons.php'?></div>
    </div>
<?php endforeach ?>