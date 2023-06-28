<?php

use Bank\Messages; ?>

<?php if (Messages::ifMessages()) : ?>
    <?php foreach (Messages::getMessages() as $message) : ?>
        <div class="w3-container w3-margin alert-<?= $message['type'] ?>" role="alert">
            <?= $message['message'] ?>
        </div>
    <?php endforeach ?>
<?php endif ?>