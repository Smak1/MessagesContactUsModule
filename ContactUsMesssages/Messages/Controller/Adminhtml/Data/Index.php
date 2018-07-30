<?php

namespace ContactUsMesssages\Messages\Controller\Adminhtml\Data;

use ContactUsMesssages\Messages\Controller\Adminhtml\Data;

class Index extends Data
{
    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}
