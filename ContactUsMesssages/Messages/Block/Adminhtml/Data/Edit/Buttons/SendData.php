<?php

namespace ContactUsMesssages\Messages\Block\Adminhtml\Data\Edit\Buttons;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;

class SendData extends Template
{
    
    public function HiddenMail()
    {
		$dataId = $this->getRequest()->getParam('message_id');
		
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
		$connection = $resource->getConnection();
		$tableName = $resource->getTableName('contact_us_messages');
		
		$sql = "Select email FROM ".$tableName." WHERE message_id = ".$dataId." ";
		$result = $connection->fetchAll($sql);
		
			$email_id = $result[0]['email'];
		
        return $email_id;
    }

}