<?php

namespace ContactUsMesssages\Messages\Setup;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UninstallInterface;
use Magento\Config\Model\ResourceModel\Config\Data;
use Magento\Config\Model\ResourceModel\Config\Data\CollectionFactory;

class Uninstall implements UninstallInterface
{
    protected $collectionFactory;

    protected $configResource;

    public function __construct(
        CollectionFactory $collectionFactory,
        Data $configResource
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->configResource    = $configResource;
    }

    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if ($setup->tableExists('contact_us_messages')) {
            $setup->getConnection()->dropTable('contact_us_messages');
        }
        $collection = $this->collectionFactory->create()
            ->addPathFilter('contactusmesssages_messages');
        foreach ($collection as $config) {
            $this->deleteConfig($config);
        }
    }

    protected function deleteConfig(AbstractModel $config)
    {
        $this->configResource->delete($config);
    }
}
