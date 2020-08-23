<?php $this->setSiteTitle('Register'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="col-md-6 col-md-offset-3 well">
  <h3 class="text-center top">Register Here!</h3><hr>
  <form class="form" action="" method="post">
    <div class="alert-danger"><?= $this->displayErrors ?></div>
      <div class="form-group">
        <label for="fname">First Name</label>
        <input type="text" id = "fname" name="fname" class="form-control" value="<?=$this->post['fname']?>">
      </div>
      <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" id = "lname" name="lname" class="form-control" value="<?=$this->post['lname']?>">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id = "email" name="email" class="form-control" value="<?=$this->post['email']?>">
      </div>

      <div class="input-group mb-3 form-group">
        <div class="input-group-prepend">
          <label class="input-group-text " for="acl">Account Type</label>
        </div>
        <select class="custom-select" id="acl" name = "acl">
          <option selected>Choose...</option>
          <option  value="Doctor">Doctor</option>
          <option value="Lab Assistant">Lab Assistant</option>
          <option value="Admin">Admin</option>
        </select>
      </div>

      <div class="form-group">
        <label class = "badge badge-danger">Attention! you will provide access to specific parts of the system with this type</label>
      </div>

      <div class="form-group">
        <label for="username">Choose a username</label>
        <input type="text" id = "username" name="username" class="form-control" value="<?=$this->post['username']?>">
      </div>
      <div class="form-group">
        <label for="password">Choose a Password</label>
        <input type="password" id = "password" name="password" class="form-control" value="<?=$this->post['password']?>">
      </div>
      <div class="form-group">
        <label for="confirm">Confirm Password</label>
        <input type="password" id = "confirm" name="confirm" class="form-control" value="<?=$this->post['confirm']?>">
      </div>
      <div class="pull-right">
        <input type="submit" class="btn btn-primary btn-large" value="Register">
      </div>

  </form>
</div>
<?php $this->end(); ?>
