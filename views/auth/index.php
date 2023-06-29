<h1>Login</h1>
<form action="<?php '/login'?>" method= "post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">El. paštas</label>
    <input type="email" name= "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?= $old['email'] ?? '' ?>">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Slaptažodis</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Prisijungti</button>
</form>