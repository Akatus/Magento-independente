<?php
class Akatustef_Akatustef_Block_Info_Pay extends Mage_Payment_Block_Info
{
	protected function _prepareSpecificInformation($transport = null)
	{
		if (null !== $this->_akatustefSpecificInformation) {
			return $this->_akatustefSpecificInformation;
		}
		$info = $this->getInfo();
		$transport = new Varien_Object();
		$transport = parent::_prepareSpecificInformation($transport);
	
	

			$array = array(

				Mage::helper('payment')->__('Bandeira') => $info->getCheckTefbandeira()

			);

		$transport->addData($array);
		return $transport;
	}
}