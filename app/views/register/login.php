<?php $this->setSiteTitle('Login'); ?>
<?php $this->start('body'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<body class = "mainbody">
  <div class="container ">
    <div class="row">
    <div class="col-md-6  ">
          <img src="../css/login.png" alt="" class ="biglogin">
        </div>
      <div class="col col-md-6 ">
        <form class="form top" action="<?=PROOT?>register/login" method="post">

            <div class=" loginContainer">
                <div class="form-group">
                  <input type="text" name="username"  placeholder ="User Name" id="username" class="form-control textboxStyle" >
                </div>

                <div class="form-group"> 
                  <input type="password" placeholder ="Password" name="password" id="password" class="form-control textboxStyle">
                </div>

                <div class="alert-danger"><?=$this->displayErrors ?></div>

                <div class="form-group">
                  <label for="remember_me" class ="remtext">Remember Me
                    <input type="checkbox" id="remember_me" name="remember_me" value="on"></label>
                </div>
                <div class="form-group">
                  <input type="submit" value="Log In" class="btn btnlogin">
                </div>

            </div>
            </form>
      </div>
    </div>
 
  </div> 

  
</body>


<?php $this->end(); ?>
