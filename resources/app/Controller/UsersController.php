<?php  

class UsersController extends AppController {

    public $components = array('RequestHandler');

    public function index() {
        $users_formatted = array();

        $users = $this->User->find('all');//echo '<pre>';print_r($users);die;
        foreach($users as $user){
            $users_formatted[] = $user['User']; 
        }

        $this->set(array(
            'users' => $users_formatted,
            '_serialize' => array('users')
        ));
    }

    public function view($id) {
        $user = $this->User->findById($id);
        $this->set(array(
            'user' => $user,
            '_serialize' => array('user')
        ));
    }

    public function add(){
        $this->User->create();
        if($this->User->save($this->request->data)){
            $message = 'User saved';
        }
        else{
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function edit($id) {
        $this->User->id = $id;
        if ($this->User->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function delete($id) {
        if ($this->User->delete($id)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

}

?>