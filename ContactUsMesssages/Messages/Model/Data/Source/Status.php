<?php

namespace ContactUsMesssages\Messages\Model\Data\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 1, 'label' => __('Revised')],
            ['value' => 0, 'label' => __('Not reviewed')]
        ];
    }
}
