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
class MM_Paymm_Model_Paymm extends Mage_Payment_Model_Method_Checkmo
{
    protected $_code            = 'paymm_paymm';
    protected $_canUseInternal  = true;
    protected $_canAuthorize    = true;
    protected $_formBlockType   = 'paymm/form_paymm';
    protected $_infoBlockType   = 'paymm/info_paymm';

     /**
     * Assign data to info model instance
     *
     * @param   mixed $data
     * @return  Mage_Payment_Model_Info
     */
    public function assignData($data)
    {
        if (!($data instanceof Varien_Object)) {
            $data = new Varien_Object($data);
        }
        $info = $this->getInfoInstance();
            
        $info->setAdditionalInformation('expirationDay', $data->getData('expirationDay'));
        
        return $this;    
    }
}