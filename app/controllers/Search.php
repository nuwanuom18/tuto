<?php

/**
 *
 */
class Search extends Controller
{

  public function __construct($controller , $action)
  {
    parent::__construct($controller , $action);
    $this->view->setLayout('default');
  }

  public function SearchingAction()
  {
      $this->view->render('Search/Searching');
      if($_POST){
        $medical = Database::getInstance();

        if (isset($_POST['regNo'])){
          $_SESSION["regNo"] = $_POST['regNo'];
         // header("Location: ../../../controllers/PatientForms/ExistingPatient.php");
         Router::redirect('PatientForms/ExistingPatient');
    }

      }
  }
}