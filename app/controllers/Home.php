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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          // Something posted
      
          if (isset($_POST['create'])) {
           // $this->view->render('NewPatient/NewPatientForm');
           Router::redirect('NewPatient/NewPatientForm');

        } else if(isset($_POST['update'])){
         // $this->view->render('Search/Searching');
         Router::redirect('Search/Searching');
        }
        else if(isset($_POST['filter'])){
          //$this->view->render('Filtering/FilterBar');
          Router::redirect('Filtering/FilterBar');

        }
        else if(isset($_POST['view'])){
         // $this->view->render('DischargedPatient/Intermediate');
          Router::redirect('DischargedPatient/Intermediate');

        }
            
        
      }
           // header("Location: ../tuto/app/views/home/contents.php");
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
