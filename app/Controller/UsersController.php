<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {

	public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc' ) 
    );
	
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'add', 'reset','forgot');
    }

	public function login() {
		//if already logged-in and accessing login page...
		if ($this->Session->check('Auth.User')){
			// if you go back a screen or enter the login url, you get logged out 
			$this->redirect($this->Auth->logout()); // stops entering a fake password along the saved email to log in

			// old redirect if logged in
			// $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
		}
		
		$this->layout='login_layout';
		$this->Session->setFlash(__('Please Login to Continue'));
		// if we get the post information, try to authenticate
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
				$this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
			} else {
				$this->Session->setFlash(__('Invalid username or password'));
			}
		} 
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

    public function index() {
		$this->paginate = array(
			'limit' => 6,
			'order' => array('User.username' => 'asc' )
		);
		$users = $this->paginate('User');
		$this->set(compact('users'));
    }
	
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

    public function add() {
        if ($this->request->is('post')) {
				
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been created'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be created. Please, try again.'));
			}	
        }
		$members = $this->User->Member->find('list');
		$this->set(compact('members'));
    }

    public function edit($id = null) {

		    if (!$id) {
				$this->Session->setFlash('Please provide a user id');
				$this->redirect(array('action'=>'index'));
			}

			$user = $this->User->findById($id);
			if (!$user) {
				$this->Session->setFlash('Invalid User ID Provided');
				$this->redirect(array('action'=>'index'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->User->id = $id;
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been updated'));
					$this->redirect(array('action' => 'edit', $id));
				}else{
					$this->Session->setFlash(__('Unable to update your user.'));
				}
			}

			if (!$this->request->data) {
				$this->request->data = $user;
			}
		$members = $this->User->Member->find('list');
		$this->set(compact('members'));
    }

    /* public function delete($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    } */
	
/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function activate($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
		
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'));
        $this->redirect(array('action' => 'index'));
    }


    public function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function reset_password($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid member'));
        }

        //create a token
        $hash = $this->randomPassword();
        $hash = AuthComponent::password($hash);

        $this->User->saveToken($id,$hash);

        //Send email for reset password
        $Email = new CakeEmail('monashSMTP');
        //set template, find the email address of the memeber

        $Email->template('forgotten_password', 'default')
            ->emailFormat('html')
            ->to($this->User->field('email')) //email address is set to the new user
            ->from(array('no-reply@u3a.org.au'=>'U3A University'))
            ->viewVars(array('token' => $hash))
            ->send();

        //Send email off
        $this->Session->setFlash('Your password has been reset and sent you to your email address');
        $this->redirect(array('controller'=>'Users','action'=>'login'));
    }

    public function reset2() {

        $this -> User -> recursive = -1;
        if (!empty($this -> data)) {
            if (empty($this -> data['User']['email'])) {
                $this -> Session -> setFlash('Please Provide Your Email Address that You used to Register with Us');
            } else {
                $email = $this -> data['User']['email'];
                $fu = $this -> User -> find('first', array('conditions' => array('User.email' => $email)));
                if ($fu) {
                    //debug($fu);
                    if ($fu['User']['email']) {
                        $key = Security::hash(String::uuid(), 'sha512', true);
                        $hash = sha1($fu['User']['username'] . rand(0, 100));
                        $url = Router::url(array('controller' => 'users', 'action' => 'reset'), true) . '/' . $key . '#' . $hash;
                        $ms = $url;
                        $ms = wordwrap($ms, 1000);
                        //debug($url);
                        $fu['User']['password'] = $key;
                        $this -> User -> id = $fu['User']['id'];
                        if ($this -> User -> saveField('password', $fu['User']['password'])) {
                            //============Email================//
                            /* SMTP Options */
                            $this -> Email -> smtpOptions = array('port' => '25', 'timeout' => '60', 'host' => 'smtp.monash.edu.au');
                            $this -> Email -> template = 'forgotten_password';
                            $this -> Email -> from = 'u3a_University@no-reply.com.au';
                            $this -> Email -> to = $fu['User']['username'] . '<' . $fu['User']['email'] . '>';
                            $this -> Email -> subject = 'Reset Your U3A.com.au Password';
                            $this -> Email -> sendAs = 'both';
                            $this -> Email -> delivery = 'smtp';
                            $this -> set('ms', $ms);
                            $this -> Email -> send();
                            $this -> set('smtp_errors', $this -> Email -> smtpError);
                            $this -> Session -> setFlash(__('Check Your Email To Reset your password', true));
                            //============EndEmail=============//
                        } else {
                            $this -> Session -> setFlash("Error Generating Reset link");
                        }
                    } else {
                        $this -> Session -> setFlash('This Account is not Active yet.Check Your mail to activate it');
                    }
                } else {
                    $this -> Session -> setFlash('Email does Not Exist');
                }
            }
        }
    }

    public function reset($token = null) {
        if($token == null){
            $this->Session->setFlash('An error has occurred');
            $this->redirect(array('controller'=>'Users','action'=>'login'));
        }

        $userID = $this->User->findTokenUserID($token);

        if($userID == null){
            $this->Session->setFlash('An error has occurred. Please try and reset password again');
            $this->redirect(array('controller'=>'Users','action'=>'login'));
        } elseif($userID == false){
            $this->Session->setFlash('Token has expired. Please reset password again');
            $this->redirect(array('controller'=>'Users','action'=>'login'));
        }
        //this set allows for view page to use the variable ex. user ID
        $this->set(compact('userID'));
        //$this->set('userID',$userID);

        //continue
        if($this->request->is('post')){
           /* if($this->User->save($this->request->data)){
                $this->Session->setFlash('Your password has been reset');
                $this->redirect(array('controller'=>'Users','action'=>'login'));
            } else {
                $this->Session->setFlash('Password could not be reset');
            }*/
            debug($this->request->data);
        }
    }

    public function forgot(){
        if($this->request->is('post') || $this->request->is('put')){
            $email = $this->request->data['User']['email'];

            $user = $this->User->find('first',array('conditions'=>array('User.email'=>$email),'contain'=>array()));

            if(empty($user)){
                $this->Session->setFlash('Could not find email address');
            } else {
                $this->reset_password($user['User']['id']);
            }
        }
    }



/*
        if ($this->request->is('post') || $this->request->is('put')) {
            debug($this->request->data['user']['password']);
            debug($this->request->data['user']['password_confirm']);
            if ($this->request->data['user']['password'] == $this->request->data['user']['password_confirm']) {
               // $this->Session->setFlash(__('The user has been updated'));
               // $this->redirect(array('action' => 'edit', $id));
            }
            else{
                $this->Session->setFlash(__('Passwords do not match, please re-enter again'));
            }

        }


} */








}

?>
