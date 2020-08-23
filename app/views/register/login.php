<?php $this->setSiteTitle('Login'); ?>
<?php $this->start('body'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="col-md-6 col-md-offset-3 well ">
  <form class="form top" action="<?=PROOT?>register/login" method="post">



    <h3 class="text-center">Log IN</h3>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" class="form-control">
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" class="form-control">
    </div>

    <div class="alert-danger"><?=$this->displayErrors ?></div>

    <div class="form-group">
      <label for="remember_me">Remember Me
        <input type="checkbox" id="remember_me" name="remember_me" value="on"></label>

    </div>
    <div class="form-group">
      <input type="submit" value="Login" class="btn btn-large btn-primary">
    </div>

  </form>
</div>

<?php $this->end(); ?>
