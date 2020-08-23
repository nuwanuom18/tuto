<?php $this->setSiteTitle('Delete'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="col-md-6 col-md-offset-3 well" >
  <h3 class="text-center top">DELETE MEMBER!</h3><hr>
  <form class="form" action="" method="post">
    <div class="form-group">
      <label class = "badge badge-danger">Attention! You are going to delete a member form the system</label>
    </div>

    <div class="input-group mb-3 ">
      <div class="input-group-prepend">
        <label class="input-group-text" for="acl">Account Type</label>
      </div>
      <select class="custom-select"  id="acl" name="acl">
        <option <?php echo ($this->user['acl']=='choose')?'selected':''; ?>  value="choose">Choose...</option>
        <option <?php echo ($this->user['acl']=='Admin')?'selected':''; ?>  value="Admin">Admin</option>
        <option <?php echo ($this->user['acl']=='Doctor')?'selected':''; ?> value="Doctor">Doctor</option>
        <option <?php echo ($this->user['acl']=='Lab Assistant')?'selected':''; ?> value="Lab Assistant">Lab Assistant</option>
      </select>
    </div>


    <div class="input-group mb-3 form-group">
        <input name="username" id="username" type="text" class="form-control" value=<?php echo $this->user['username']; ?>  >

        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
      </div>

      <?php echo $this->user['message']; ?>
      <?php echo $this->user['smessage']; ?>

      <div class="form-group">
        <label for="fname">First Name</label>
        <label class="input-group-text"><?=$this->user['fname']?></label>
      </div>

      <div class="form-group">
        <label for="fname">Last Name</label>
        <label class="input-group-text"><?= $this->user['lname']?></label>
      </div>

      <div class="form-group">
        <label for="fname">Email</label>
        <label class="input-group-text"><?=$this->user['email']?></label>
      </div>


      <div class="pull-right">
        <input id="delete" name="delete" type="submit" class="btn btn-danger btn-large" value="Delete">
      </div>

  </form>
</div>
<?php $this->end(); ?>
