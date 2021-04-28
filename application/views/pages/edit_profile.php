<div class="card mt-5 shadow">
<?php echo form_open('profile/update_profile');?>
    <div class="card-header">
        <h3>Update Profile</h3>
    </div>
    <div class="card-body">
    <div class="form-group mt-4 mb-4">
    <label for="usernameInput">Username:</label>
        <input type="text" name="username" class="form-control" readonly="true" id="usernameInput" readonly value="<?php echo $username?>">
    </div>
    <div class="form-group mt-4 mb-4">
        <label for="emailInput">Email:</label>
        <input type="email" id="emailInput" name="email" class="form-control" value="<?php echo $email?>">
    </div>
    <button class="btn btn-primary">Update</button>
    </div>


</div>