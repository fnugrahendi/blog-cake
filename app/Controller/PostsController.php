<?php
class PostsController extends AppController{
	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Session');
	
	public function index(){
		$this->set('posts', $this->Post->find('all'));
	}
	
	public function view($id = null){
		if (!$id){
				throw new	NotFoudException(__('Invalid post'));
			}
		$post = $this->Post->findById($id);
		if (!$post){
				throw new	NotFoudException(__('Invalid post'));
			}
		$this->set('post',$post);
	}
	
	public function viewc($cat = null){
		if (!$cat){
				throw new	NotFoudException(__('Invalid post'));
			}
		$this->set('posts', $this->Post->find('all', array(
			'conditions'=>array('Post.category' => $cat))
		));
	}
	
	public function add(){
		if ($this->request->is('post')){
			$this->request->data['Post']['user_id']=$this->Auth->user('id');
			$this->Post->create();
			if ($this->Post->save($this->request->data)){
				$this->Session->setFlash(__('Your Post has been saved.'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Unable to add your post'));
		}
	}
	
	public function edit($id = null){
		if (!$id){
			throw new NotFoundException(__('Invalid Post'));
		}
		
		$post = $this->Post->findById($id);
		if (!$post){
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))){
			$this->Post->id = $id;
			if ($this->Post->save($this->request->data)){
				$this->Session->setFlash(__('Your post has been updated.'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Unable to update your post.'));
		}
		
		if (!$this->request->data){
			$this->request->data = $post;
		}
	}
	
	public function isAuthorized($user){
		if ($this->action=='add'){
			return true;
		}
		if (in_array($this->action, array('edit', 'delete'))){
			$postId = (int) $this->request->params['pass'][0];
			if ($this->Post->isOwnedBy($postId, $user['id'])){
				return true;
			}
		}
		return parent::isAuthorized($user);
	}
	
	public function delete($id = null){
		//$this->request->allowMethod('post');
		//$this->Post->id = $id;
		if (!$id){
			throw new NotFoundException(__('Invalid post'));
		}
		$post = $this->Post->findById($id);
		if (!$post){
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->Post->delete($id)){
			$this->Session->setFlash(__('Post has been deleted'));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Post was not deleted'));
		return $this->redirect(array('action'=>'index'));
	}
}
?>
