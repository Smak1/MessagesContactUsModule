<?php

namespace ContactUsMesssages\Messages\Controller\Adminhtml\Data;

use ContactUsMesssages\Messages\Controller\Adminhtml\Data;

class Edit extends Data
{
    public function execute()
    {
        $dataId = $this->getRequest()->getParam('message_id');
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('ContactUsMesssages_Messages::data')
            ->addBreadcrumb(__('Data'), __('Data'))
            ->addBreadcrumb(__('Manage Data'), __('Manage Data'));

			$mail_id = $this->dataRepository->getById($dataId)->getEmail();
			
            $resultPage->addBreadcrumb(__('Edit Data'), __('Edit Data'));
            $resultPage->getConfig()->getTitle()->prepend($mail_id);
			
        return $resultPage;
    }
	
}
