<?php $this->setSiteTitle('Confirm'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<h1 class="text-center top">Confirm !</h1>
<div class="col-md-6 col-md-offset-3 well" >
  <form class="form" action="" method="post">
    <div class="form-group">
      <label class = "badge badge-danger">Attention! You are going to delete a member form the system</label>
    </div>

    <div class="form-group">
    <label for="password">Enter your password</label>
    </div>



    <div class="input-group mb-3 form-group">

        <input name="password" id="password" type="password" class="form-control" value=<?php echo $this->post['password'] ?> >

        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit">Submit</button>
        </div>
      </div>

      <?php echo $this->post['message'] ?>
      <?php echo $this->post['button'] ?>
      <?php echo $this->post['smessage'] ?>



  </form>
</div>
<?php $this->end(); ?>
