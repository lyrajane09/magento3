<?php

class Weblog_Complexworld_Model_Resource_Setup extends Mage_Eav_Model_Entity_Setup{
	 public function startSetup()
    {
        $this->getConnection()->startSetup()
        return $this;
    }

    public function endSetup()
    {
        $this->getConnection()->endSetup();
        return $this;
    }

}