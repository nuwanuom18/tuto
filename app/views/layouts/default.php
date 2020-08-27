<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?=  $this->siteTitle(); ?></title>

    <link rel="stylesheet" href="<?=PROOT?>bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">




    <script src="<?=PROOT?>js/jQuery-2.2.4.min.js"></script>
    <script src="<?=PROOT?>js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
    <link rel="stylesheet" media="screen" href="<?=PROOT?>style.css">
    <link rel="stylesheet" media="screen" href="<?=PROOT?>img/test.css">


    <?=  $this->content('head'); ?>


  </head>
  <body>
      <div class="offset">
        <?php include 'main_menu.php' ?>
      </div>



      <?= $this->content('body'); ?>

    




  </body>
</html>
