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
		

                      /*Mage::helper('payment')->__('Check Cartaobandeira') => $info->getCheckCartaobandeira(),
			Mage::helper('payment')->__('Check Nome') => $info->getCheckNome(),
			Mage::helper('payment')->__('Check Cpf') => $info->getCheckCpf(),
			Mage::helper('payment')->__('Check Numerocartao') => $info->getCheckNumerocartao(),
			Mage::helper('payment')->__('Check Expiracaomes') => $info->getCheckExpiracaomes(),
			Mage::helper('payment')->__('Check Expiracaoano') => $info->getCheckExpiracaoano(),
			Mage::helper('payment')->__('Check Codseguranca') => $info->getCheckCodseguranca(),
			Mage::helper('payment')->__('Check Tefbandeira') => $info->getCheckTefbandeira(),*/
		$transport->addData($array);
		return $transport;
	}
}