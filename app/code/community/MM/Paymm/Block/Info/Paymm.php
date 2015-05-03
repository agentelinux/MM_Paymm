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
class MM_Paymm_Block_Info_Paymm extends Mage_Payment_Block_Info
{
   /**
     * Prepare credit card related payment info
     *
     * @param Varien_Object|array $transport
     * @return Varien_Object
     */
    protected function _prepareSpecificInformation($transport = null)
    {
        if (null !== $this->_paymentSpecificInformation) {
            return $this->_paymentSpecificInformation;
        }

        $transport = parent::_prepareSpecificInformation($transport);
        $data = array();

        $expirationDay = $this->getInfo()->getAdditionalInformation('expirationDay');
        if ($expirationDay) {

            $data[Mage::helper('paymm')->__('Expiration Day')] = $expirationDay;
        }

        return $transport->setData(array_merge($data, $transport->getData()));
    }
}