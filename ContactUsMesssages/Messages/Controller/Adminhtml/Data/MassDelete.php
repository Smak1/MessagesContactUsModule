<?php

namespace ContactUsMesssages\Messages\Controller\Adminhtml\Data;

use ContactUsMesssages\Messages\Model\Data;

class MassDelete extends MassAction
{
    protected function massAction(Data $data)
    {
        $this->dataRepository->delete($data);
        return $this;
    }
}
