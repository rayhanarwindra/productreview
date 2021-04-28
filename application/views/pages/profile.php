<div class="mt-5 card shadow">
<div class="card-header">
  <h2>Profile Page</h2>
</div>
<div class="card-body">
<?php echo $error?>
<div class="row">
    <div class="col-md-6 text-center">
        <img class="img-fluid profile-image" src="<?php echo base_url().'/uploads/'.$image?>" />
        <div>
          <?php if ($isUser): ?>
        <button class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">Change Picture</button>
        <?php endif?>
        </div>
    </div>
    <div class="col-md-6">
        <h1><?php echo $username?></h1>
        <h4 class="mt-4"><?php echo $email?></h4>
        <div class="mt-4">
          <?php if ($isUser): ?>
            <a class="btn btn-primary" href="<?php echo site_url('profile/edit_view') ?>">Edit Profile</a>
            <a class="btn btn-primary ml-2" href="<?php echo site_url('profile/view_favorites') ?>">Favorite Items</a>
          <?php endif ?>
        </div>
    </div>
</div>
</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Change Profile Picture</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo form_open_multipart('profile/upload_photo');?>
      <div class="form-group">
    <label for="exampleFormControlFile1">Input picture file</label>
    <input type="file" class="form-control-file" name="userfile" size="20">
  </div>
      <div class="modal-footer">
        <button type="submit"class="btn btn-primary">Update Picture</button>
      </div>
      </form>
    </div>
  </div>
</div>