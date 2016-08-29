<?php
class Weblog_Blogtesting_Model_Resource_Readpost extends Mage_Core_Model_Resource_Db_Abstract{
    protected function _construct()
    {
        $this->_init('blogtesting/readpost', 'blogpost_id');
    }
}