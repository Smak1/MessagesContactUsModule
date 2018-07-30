<?php

namespace ContactUsMesssages\Messages\Controller\Adminhtml\Data;

use ContactUsMesssages\Messages\Model\Data;

class MassDisable extends MassAction
{
    protected function massAction(Data $data)
    {
        $data->setIsActive(false);
        $this->dataRepository->save($data);
        return $this;
    }
}
