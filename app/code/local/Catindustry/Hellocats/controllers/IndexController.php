<?php

class Catindustry_Hellocats_IndexController extends Mage_Core_Controller_Front_Action{

	public function indexAction(){
		echo "Hello Cats!";
	}
	
	public function paramsAction(){
		echo '<dl>';
		foreach($this->getRequest()->getParams() as $key=>$value){
			echo '<dt><strong>Param: </strong>'.$key.'</dt>';
			echo '<dt><strong>Value: </strong>'.$value.'</dt>';
		}
		echo '</dl>';
	}
	
	public function viewAction(){
		$model = Mage::getModel('catalog/product')
		->getCollection()
		->addAttributeToSelect('*')
		->addFieldToFilter('price', '5.00');
		
		// foreach($model as $m){
			// echo "<pre/>";
			// print_r($m);
		// }
	}
	
	public function helperAction(){
		$helper = Mage::helper('catalog/data');
		$output = $helper->__('Magento is Great');
		echo "<pre/>";
		print_r($output);
		
	}
	
	public function layoutAction(){
		$this->loadLayout();
		$block = $this->getLayout()->createBlock('adminhtml/system_account_edit');
		$this->getLayout()->getBlock('content')->append($block);
		$this->renderLayout();
	}
}