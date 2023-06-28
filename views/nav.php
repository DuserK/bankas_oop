<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">OOP Bankas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?= URL ?>">Pagrindinis</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?= URL .'/accounts'?>">Sąskaitos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL .'/accounts/create'?>">Pridėti sąskaitą</a>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
        <?php if (isset($_SESSION['email'])) : ?>
        <form action="<?= URL . '/logout' ?>" method="post" style="display: inline;">
            <button style="background: none; border: none; color: white " type="submit" class="w3-bar-item w3-button">Atsijungti</button>
        </form>
        <?php else: ?>
            <a href="<?= URL . '/login' ?>" class="w3-bar-item w3-button">Prisijungti</a>
        <?php endif ?>
        </li>
      </ul>
    </div>
  </div>
</nav>
