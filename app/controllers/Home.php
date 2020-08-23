<?php

/**
 *
 */
class Home extends Controller
{
  public function __construct($controller , $action)
  {
    parent::__construct($controller , $action);
  }

  public function indexAction()
  {

    //dnd($_SESSION);
    if (currentUser()) {

      if(currentUser()->acl == 'Doctor'){

          if($_POST){
            dnd($_POST);
          }
        $this->view->render('home/contents');

      }
      else {
          $this->view->render('home/index');
      }
    }else {
      $this->view->render('home/index');
    }



  //  $this->redirect('/home/abc/asas');

  }



}


 ?>
