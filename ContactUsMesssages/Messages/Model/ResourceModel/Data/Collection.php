<?php

namespace ContactUsMesssages\Messages\Model\ResourceModel\Data;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'message_id';

    protected function _construct()
    {
        $this->_init('ContactUsMesssages\Messages\Model\Data', 'ContactUsMesssages\Messages\Model\ResourceModel\Data');
    }
}
