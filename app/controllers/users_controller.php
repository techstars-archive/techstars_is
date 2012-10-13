<?php
class UsersController extends AppController {

	/**
	 * Name
	 * @var string
	 */
	var $name = 'Users';
    var $components = array('Auth');

    function beforeFilter() {
        parent::beforeFilter();      
        $this->Auth->allow("login", "register");
        $this->Auth->authorize = 'controller';
        $this->Auth->loginRedirect = array('controller' => 'statements', 'action' => 'index');
        $this->Auth->logoutRedirect = array('controller' => 'page', 'action' => 'display', 'home');        
        $this->set('model', $this->modelClass);
    }

    function isAuthorized() {
        // Actions non-logged in users can perform
        $unauthenticated_actions = array('login', 'register', 'logout');
        $current_action = $this->params['action'];
        if (in_array($current_action, $unauthenticated_actions)) {
            return true;
        }

        $this->Session->setFlash("You don't have permission to do that.");
        return false;
    }
        
	/**
	 * Register action
	 */
	function register() {
		if(!empty($this->data)) {
			// validate & save data
			if($this->User->save($this->data)) {
				// set Flash & redirect
				$this->Session->setFlash('You have successfully registered.');
				$this->redirect(array('action'=>'login'));
			}
		}
	}

	/**
	 * Login action
	 */
    function login() {
        if (!empty($this->data)) {
            // If the username/password match
            if ($this->Auth->login($this->data)) {
            } else {
                $this->User->invalidate('username', 'Username and password combination is incorrect!');
            }
        }
    }
     
	/**
	 * Logout action
	 */
    function logout() {
            $this->Auth->logout();
            $this->Session->destroy();
            $this->redirect(array('controller' => 'pages',
                                  'action' => 'display', 'home'));
    }
	
}