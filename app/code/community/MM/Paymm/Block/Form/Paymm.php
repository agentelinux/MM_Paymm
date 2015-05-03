<?php
/**
 * MM Paymm 
 * 
 * @category     MM
 * @package      MM_Paymm 
 * @copyright    Copyright (c) 2015 MM (http://blog.meumagento.com.br/)
 * @author       MM (Thiago Caldeira de Lima)  
 * @version      Release: 0.1.0
 */
class MM_Paymm_Block_Form_Paymm extends Mage_Payment_Block_Form_Cc
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('mm/payment/form/paymm.phtml');
    }


    /**
     * Get All avaliable payment methods
     * @return array array with payment methods
     */
    public function getExpirationDays()
    {
        $path = 'payment/paymm_paymm/expiration_day';
        $expirationDays = explode(',',Mage::getStoreConfig($path) );

        return $expirationDays;
    }
}