<h2 class="welcome-message">Sveiki atvykę į OOP Banką,
<?php if (isset($_SESSION['email'])) : ?>
    <?php echo $_SESSION['name'] ?>
<?php else: ?>
    <a href="<?= URL . '/login' ?>" style = "color: #fff">prisijunkite</a>
<?php endif ?>
</h2>
