
<?php
require __DIR__.'/listHeader.php';
?>
<?php if (empty($accounts)) : ?>
<p style="margin: 8px">No accounts yet</p>
<?php endif ?>
<?php foreach ($accounts as $account) : ?>
    <div class="row info-account">
        <div class="col-2"><?= $account['name'] ?></div>
        <div class="col-2"><?= $account['surname'] ?></div>
        <div class="col-2"><?= $account['personID'] ?></div>
        <div class="col-3"><?= $account['accountNumber'] ?></div>
        <div class="col-1" style = "text-align: right"><?= $account['balance'] ?> €</div>
        <div class="col-2 edit">
         <a href="/accounts/edit/<?= $account['id'] ?>"  class='plus onHoverIcon'><i class="fa-regular fa-pen-to-square"></i></a>
         <a href="/accounts/delete/<?= $account['id'] ?>"  class='delete onHoverIcon'><i class="fa-solid fa-trash"></i></a>
        </div>
    </div>
<?php endforeach ?>