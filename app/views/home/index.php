<?php $this->setSiteTitle('Home'); ?>

<?php $this->start('body'); ?>



<div class="landing">
  <div class="home-wrap">
    <div  class="home-inner">

    </div>

  </div>

</div>


<div class="caption text-center">
	<h1><?php if (currentUser()) {
    echo currentUser()->username;
  }else {
    echo "";
  }

  ?>
  Welcome to the website</h1>

</div>

<?php $this->end(); ?>
