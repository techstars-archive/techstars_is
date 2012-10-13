<?php

class StatementsController extends AppController {

    var $helpers = array ('Html','Form');
  
    var $name = 'Statements';

    var $paginate = array('limit' => 25);
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->authorize = 'controller';
        $this->Auth->allow('random','add');
    }

    function isAuthorized() {
        $admin_actions  = array("index", "view", "edit", "delete", "approve");
        // User not logged in
        if (!$this->Auth->User('id')) {
            $this->Session->setFlash("You must be logged in to do that.");
            return false;
        }

        if (in_array($this->params['action'], $admin_actions)) {
            return true;
        }

        $this->Session->setFlash("You don't have permission to do that");
        return false;
    }

    function index() {
        $data = $this->paginate('Statement');
        $this->set('statements', $data);
    }

    function view($id = null) {
        $this->Statement->id = $id;
        $this->set('statement', $this->Statement->read());
    }

    function add() {
        if (!empty($this->data)) {
            if ($this->Statement->save($this->data)) {
              $this->Session->setFlash('Your submission was successful!');
              $this->redirect(array('controller' => 'pages',
                                    'action' => 'display', 'home'));
            }
        }
    }

    function edit($id = null) {
        $this->Statement->id = $id;
        if (empty($this->data)) {
            $this->data = $this->Statement->read();
        } else {
            if ($this->Statement->save($this->data)) {
                $this->Session->setFlash('Your statement has been updated.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function delete($id) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for statment', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Statement->delete($id)) {
            $this->Session->setFlash('The statement with id: ' . $id . ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }
    }

    function random() {
        $this->set('statement', $this->Statement->find('first',
                                                       array('conditions' => array('status' => Statement::STATUS_APPROVED),
                                                             'order' => array('rand()'))));
        $this->layout = 'ajax';
    }

    function approve($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for statment', true));
            $this->redirect(array('action' => 'index'));
        }

        $this->data['Statement']['status'] = Statement::STATUS_APPROVED;
        
        if ($this->Statement->save($this->data)) {
            $this->Session->setFlash(__('The statement has been saved', true));
            $this->redirect(array('action' => 'index', $id));
        } else {
            $this->Session->setFlash(__('The statement could not be approved. Please, try again.', true));
        }
        
        $this->Session->setFlash(__('Statement was not approved', true));
        $this->redirect(array('action' => 'index'));
    }
}

?>