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

         
        $this->view->render('home/contents');

      }else if(currentUser()->acl == 'ECG Lab Assistant'){

         
        $this->view->render('home/TestRequestViewer.viewer');

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
