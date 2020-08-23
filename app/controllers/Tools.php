
<?php

/**
 *
 */
class Tools extends Controller
{

  public function __construct($controller , $action)
  {
    parent::__construct($controller , $action);
    $this->view->setLayout('default');
  }

  public function indexAction(){
    $this->view->render('tools/index');
  }

  public function updateAction(){
    $this->view->render('tools/Update');
  }

  public function inboxAction(){
    $this->view->render('tools/inbox');
  }

  public function thirdAction(){
    $this->view->render('tools/third');
  }

  public function AddNewPatientAction(){
    $this->view->render('tools/AddNewPatient');
  }

  public function existingPatientAction(){
    $this->view->render('tools/existingPatient');
  }

  public function deleteAction(){
    //
    $posted_values = ['fname' =>'First Name', 'lname'=>'Last Name', 'username'=>'', 'email'=>'Email' , 'acl'=>'choose', 'message'=>'', 'smessage'=>''];
    if($_POST){
    //  dnd($_POST);
      $m = new Model('users');

      $user = $m->_db->findFirst('users' , ['conditions' => ['username = ?',' acl = ?'], 'bind' => [$_POST['username'],$_POST['acl']]]);
      if ($user) {
        $posted_values['fname'] = $user->fname;
        $posted_values['lname'] = $user->lname;
        $posted_values['email'] = $user->email;
        $posted_values['acl'] = $user->acl;
        $posted_values['username'] = $_POST['username'];

        $posted_values['smessage']= '<div class="alert alert-success" role="alert">
          User exists! check user details below before you delete
            </div>';

        if(isset($_POST['delete'])){
          Router::redirect('redirect/confirm/'. $posted_values['username']);
        }
      }
      else{
        $posted_values['message']=
        '<div class="alert alert-warning" role="alert">
        Invalid Username or Account type!
          </div>';

      }

    }

    $this->view->user = $posted_values;
    $this->view->render('tools/delete');
  }

}


 ?>
