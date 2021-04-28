<div class="mb-4 mt-5 card card-outline-secondary shadow">
<?php echo form_open('login/check_login')?>
<div class="card-header">
  <h3>Login to your account</h3>
</div>
<div class="card-body">
<?php echo $error ?>
  <div class="form-group mt-4 mb-4">
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
  </div>
  <div class="form-group mt-4 mb-4">
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="mb-3">
  <label class="form-check-label"><input type="checkbox" name="remember"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>  

</div>
</form>
</div>