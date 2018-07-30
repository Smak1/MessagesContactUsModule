<?php

namespace ContactUsMesssages\Messages\Controller\Adminhtml\Data;

class Send extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {

		
		$objectManager =  \Magento\Framework\App\ObjectManager::getInstance();        
		$storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
		$nameFrom = $storeManager->getStore()->getName();
		
		$post = $this->getRequest()->getPost();
			$subject  = $post['subject'];
			$to = $post['email'];
			$message = $post['message'];

			if(isset($message))
			{
				$nameTo = "To Name";
				$body = "
				<div>
					<p>".$message."</p>
				</div>";
			
				$email = new \Zend_Mail('UTF-8');
				$email->setSubject($subject); 
				$email->setBodyHtml($body);
				
				$email->setFrom($nameFrom);
				$email->addTo($to, $nameTo);
				$email->send();	
				unset($post);	

				 $this->messageManager->addSuccessMessage(__('You saved this message.'));


				
		}
		
		$this->_view->loadLayout();
		$this->_view->getLayout()->initMessages();
		$this->_view->renderLayout();
		
		
		$redirectResult = $this->resultRedirectFactory->create();
        $redirectResult->setPath('messages/data/index');
        return $redirectResult;

    }
	
}
