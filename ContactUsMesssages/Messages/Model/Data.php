<?php

namespace ContactUsMesssages\Messages\Model;

use Magento\Framework\Model\AbstractModel;
use ContactUsMesssages\Messages\Api\Data\DataInterface;

class Data extends AbstractModel implements DataInterface
{
    const CACHE_TAG = 'contact_us_messages';

    protected function _construct()
    {
        $this->_init('ContactUsMesssages\Messages\Model\ResourceModel\Data');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
    	
    public function getEmail()
    {
        return $this->getData(DataInterface::EMAIL);
    }

    public function getName()
    {
        return $this->getName(DataInterface::NAME);
    }

    public function getPhone()
    {
        return $this->getPhone(DataInterface::PHONE);
    }

    public function getMessage()
    {
        return $this->getData(DataInterface::MESSAGE);
    }

    public function getIsActive()
    {
        return $this->getData(DataInterface::IS_ACTIVE);
    }
 
    public function setIsActive($isActive)
    {
        return $this->setData(DataInterface::IS_ACTIVE, $isActive);
    }
	
    public function getCreatedAt()
    {
        return $this->getData(DataInterface::CREATED_AT);
    }
}
