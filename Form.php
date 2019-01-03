<?php
class TM_Testimonials_Block_Form_Test extends Mage_Core_Block_Template
{
	public function getCompany2()
    {
        if ($data = $this->_getSessionData('company 2')) {
            return $data;
        }
        return $this->helper('contacts')->getCompany2();
    }
}