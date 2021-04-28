<div class="mb-4 mt-5 card card-outline-secondary shadow">
<?php echo form_open('login/register_view');?>
<div class="card-header">
  <h3>Register your account</h3>
</div>
<div class="card-body">
<?php if (validation_errors()) : ?>
  <div class="mt-1 alert alert-danger">
    <?php echo validation_errors();?>
  </div>
<?php endif?>
  <div class="form-group mt-4 mb-4">
    <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
  </div>
  <div class="form-group mt-4 mb-4">
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
  </div>
  <div class="form-group mt-4 mb-4">
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group mt-4 mb-4">
    <input type="password" class="form-control" name="passconf" id="exampleInputPassword1" placeholder="Confirm Password">
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</div>
</form>
</div>


