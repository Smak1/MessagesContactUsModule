<?php
namespace ContactUsMesssages\Messages\Controller\Extend;

class ExtendIndex extends \Magento\Contact\Controller\Index\Post
{
    public function execute($coreRoute = null)
    {
		$post = $this->getRequest()->getPostValue();
		
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
		$connection = $resource->getConnection();
		$tableName = $resource->getTableName('contact_us_messages');
		 
		$name = $post['name'];
		$email = $post['email'];
		$phone = $post['telephone'];
		$comment = $post['comment'];
				
		$sql = "Insert Into " . $tableName . " (name, email, phone, message) Values ('".$name."', '".$email."', '".$phone."', '".$comment."')";
		$connection->query($sql);
 		
        return parent::execute($coreRoute);
    }
}
