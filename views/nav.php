<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <img class = "logo" src="/img/bank.png" alt="logo">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link onHover" aria-current="page" href="<?= URL ?>">Pagrindinis</a>
        </li>
        <li class="nav-item">
          <a class="nav-link onHover" aria-current="page" href="<?= URL .'/accounts'?>">Sąskaitos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link onHover" href="<?= URL .'/accounts/create'?>">Pridėti sąskaitą</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="collapse navbar-collapse" id="navbarNav" style = "margin-right: 8px">
    <ul class="navbar-nav">
      <li class="nav-item">
      <?php if (isset($_SESSION['email'])) : ?>
      <form action="<?= URL . '/logout' ?>" method="post" style="display: inline;">
          <button type="submit" class="w3-bar-item w3-button loginbutton onHover">Atsijungti</button>
      </form>
      <?php else: ?>
          <a href="<?= URL . '/login' ?>" class="w3-bar-item w3-button loginbutton onHover">Prisijungti</a>
      <?php endif ?>
      </li>
    </ul>
  </div>
</nav>
