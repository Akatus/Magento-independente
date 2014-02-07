<?php

class Akatusboleto_Akatusboleto_Block_Info_Pay extends Mage_Payment_Block_Info
{

    protected function _prepareSpecificInformation($transport = null)
	{

        if (null !== $this->_akatusboletoSpecificInformation) {
			return $this->_akatusboletoSpecificInformation;
		}

		$info = $this->getInfo();

        if ( ! empty($info->getCheckBoletourl())) {

            echo ("<table>
                        <tbody>
                            <tr>
                                <td>
                                    <strong>Segunda Via: </strong><a href = '{$info->getCheckBoletourl()}' target='_blank'>Imprimir</a><br>
                                </td>
                            </tr>
                        </tbody>
                    </table>");
        }

        if ($this->isToShowRefund($info->getOrder())) {
         
            $estornoURL = $this->getEstornoURL($info->getOrder()->getId());
         
            echo ("<table>
                       <tbody>                                                                                                                                                                                
                             <tr>
                                 <td>
                                     <strong>Estorno:</strong>
                                 </td>
                             </tr>
                             <tr>
                                 <td><a href ='$estornoURL'>Solicitar estorno</a><br></td>
                             </tr>
                         </tbody>
                     </table>");
        }

		$transport = new Varien_Object();
		return parent::_prepareSpecificInformation($transport);
	}

    private function isToShowRefund($order) 
    {
        if (isset($order)) {

            $adminSession = Mage::getSingleton('admin/session', array('name' => 'adminhtml'));
            $isAdmin = $adminSession->isLoggedIn();
            $state = $order->getState();

            if ($isAdmin && ($state === Mage_Sales_Model_Order::STATE_COMPLETE || $state === Mage_Sales_Model_Order::STATE_PROCESSING)) {
                return true;
            }
        }

        return false;
    }

    private function getEstornoURL($orderId)
    {
        return Mage::helper("adminhtml")->getUrl("akatusbase/refund/index", array("order" => $orderId));
    }
}
