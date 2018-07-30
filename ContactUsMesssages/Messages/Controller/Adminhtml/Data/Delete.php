<?php

namespace ContactUsMesssages\Messages\Controller\Adminhtml\Data;

use ContactUsMesssages\Messages\Controller\Adminhtml\Data;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

class Delete extends Data
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $dataId = $this->getRequest()->getParam('message_id');
        if ($dataId) {
            try {
                $this->dataRepository->deleteById($dataId);
                $this->messageManager->addSuccessMessage(__('The message has been deleted.'));
                $resultRedirect->setPath('messages/data/index');
                return $resultRedirect;
            } catch (NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage(__('The message no longer exists.'));
                return $resultRedirect->setPath('messages/data/index');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('messages/data/index', ['message_id' => $dataId]);
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('There was a problem deleting the message'));
                return $resultRedirect->setPath('messages/data/edit', ['message_id' => $dataId]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find the message to delete.'));
        $resultRedirect->setPath('messages/data/index');
        return $resultRedirect;
    }
}
