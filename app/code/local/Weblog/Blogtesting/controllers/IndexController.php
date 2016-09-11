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
	
	//model collections
	public function testAction(){
		$collection_of_products = Mage::getModel('blogtesting/readpost')->getCollection();
		var_dump($collection_of_products->getFirstItem()->getData());
	}
	
	public function test2Action(){
		$collection_of_products = Mage::getModel('blogtesting/readpost')
		->getCollection()
		->addAttributeToSelect('meta_title')
		->addAttributeToSelect('price');
	}
	
	public function test3Action
	{
		var_dump(
			(string)
			Mage::getModel('blogtesting/readpost')
				->getCollection()
				->addFieldToFilter('price',array('from'=>'10','to'=>'20'))
				->getSelect()
		);
	}
	
}