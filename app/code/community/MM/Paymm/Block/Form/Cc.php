<?php

class MM_Paymm_Block_Form_Cc extends Mage_Payment_Block_Form_Cc
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('mm/payment/form/cc.phtml');
    }


    /**
     * Get All avaliable payment methods
     * @return array array with payment methods
     */
    public function getCcAvailableTypes() 
    {

        $_types = Mage::getModel('paymm/source_cctypes')->toOptionArray();

        $types = array();
        
        $path = 'payment/paymm_creditcard/cctypes';
        $availableTypes = explode(',',Mage::getStoreConfig($path) );
        
        foreach ($_types as $data) {
            if (isset($data['label']) && isset($data['value'])) {
                if(in_array($data['value'], $availableTypes))
                    $types[$data['value']] = $data['label'];
                
            }
        }
        return $types;
    }

    public function getDateInterval()
    {
        $dateInterval = array();
        $start = new DateTime('');
        $end = new DateTime('');
        $interval = new DateInterval('P1M');
        $diff6Month = new DateInterval('P6M');
        $end->add($diff6Month);
        $period = new DatePeriod($start, $interval, $end);

        foreach ($period as $dt)
            $dateInterval[] = $dt;
        
        return $dateInterval;
    }
}