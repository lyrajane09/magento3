<?php
class Weblog_Blogtesting_IndexController extends Mage_Core_Controller_Front_Action {
    public function indexAction() {
        echo 'Setup!';
    }
	
	// get blog post
	public function getModelAction() {
        // echo 'Setup!';
	
		$params = $this->getRequest()->getParams();
		$blogpost = Mage::getModel('blogtesting/readpost');
		echo("Loading the blogpost with an ID of ".$params['id']);
		$blogpost->load($params['id']);
		$data = $blogpost->getData();
		
    }
	
	// add new blog post
	public function addModelAction(){
		$blogpost = Mage::getModel('blogtesting/readpost');
		$blogpost->setTitle('Sample Post 2');
		$blogpost->setPost('Lorem ipsum dolor sit amet');
		$blogpost->save();
		echo 'New blog post is '.$blogpost->getId().' created';
	}
	
	//update blog post
	public function updateModelAction(){
		$params = $this->getRequest()->getParams();	
		$blogpost = Mage::getModel('blogtesting/readpost');
		$blogpost->load($params['id']);
		$blogpost->setTitle('Change Title');
		$blogpost->save();
		echo 'post edited';	
	}
	
	//delete blog post
	public function deleteModelAction(){
		$params = $this->getRequest()->getParams();	
		$blogpost = Mage::getModel('blogtesting/readpost');
		$blogpost->load($params['id']);
		$blogpost->delete();
		echo 'post deleted';	
	}
	
	//show all blog post
	public function showAllBlogPostsAction(){
		$posts = Mage::getModel('blogtesting/readpost')->getCollection();
		foreach($posts as $blogpost){
			echo '<h3>'.$blogpost->getTitle().'</h3>';
			echo nl2br($blogpost->getPost());
		}

	}
	
}