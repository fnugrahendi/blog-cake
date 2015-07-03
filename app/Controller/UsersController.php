<?php
App::uses('AppController' , 'Controller');

class UsersController extends AppController{
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('add','logout');
	}
	
	public function login(){
		$this->layout = 'login';
		//if ($this->request->is('page')){
			if ($this->Auth->login()){
				return $this->redirect($this->Auth->redirectUrl());
			}
			//$this->Session->setFlash(__('Invalid username or password, try again'));
		//}
	}
	
	public function logout(){
		return $this->redirect($this->Auth->logout());
	}
	
	public function index(){
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
		$this->set('users', $this->User->find('all'));
	}
	
	public function view($id = null){
		$this->User->id = $id;
		if(!$this->User->exists()){
			throw new NotFoundException(__('Invalid User'));
		}
		$this->set('user', $this->User->read(null, $id));
	}
	
	public function add(){
		if ($this->request->is('post')){
			$this->User->create();
			if ($this->User->save($this->request->data)){
				$this->Session->setFlash(__('The user has been saved'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(
				__('Failed to create user. Try again, please')
			);
		}
	}
	
	public function edit($id = null){
		$this->User->id = $id;
		if (!$this->User->exists()){
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')){
			if ($this->User->save($this->request->data)){
				$this->Session->setFlash(__('The user has been saved'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(
				__('The user could not be saved. Please try again')
			);
		} else {
			$this->request->data = 	$this->User->read(null, $id);
			unset ($this->request->data['User']['password']);
		}
	}
	
	public function delete($id = null){
		$this->request->allowMethod('post');
		
		$this->User->id = $id;
		if (!$this->User->exists()){
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()){
			$this->Session->setFlash(__('User has been deleted'));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		return $this->redirect(array('action'=>'index'));
	}
}

?>
