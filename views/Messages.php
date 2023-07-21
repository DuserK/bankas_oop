<?php

use Bank\Messages; ?>

<?php if (Messages::ifMessages()) : ?>
    <div id="hideMeAfter5Seconds" class = "messages-box">
        <?php foreach (Messages::getMessages() as $message) : ?>
            <div class="w3-container w3-margin alert alert-<?= $message['type'] ?>" role="alert">
                <?= $message['message'] ?>
            </div>
            <?php endforeach ?>
    </div>
<?php endif ?>