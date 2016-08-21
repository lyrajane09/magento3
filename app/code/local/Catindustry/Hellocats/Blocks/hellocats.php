<?php
class Catindustry_Hellocats_Block extends Mage_Core_Block_Template{
	public function myfunction(){
		echo 1; exit;
		return $this->setTemplate('hellocats/simple_page.phtml');
	}
}