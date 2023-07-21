<div class="row  justify-content-md-center table-center">
    <div class="col-lg-6 col-12">
      <h3 class = " title">Login</h3>
      <form action="<?php '/login'?>" method= "post" class = "table-form">
        <div class="table-content">
          <label for="exampleInputEmail1" class="form-label">El. paštas</label>
          <input type="email" name= "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?= $old['email'] ?? '' ?>">
          
          <label for="exampleInputPassword1" class="form-label">Slaptažodis</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        <button type="submit" class="btn onHover">Prisijungti</button>
      </form>
    </div>
</div>
