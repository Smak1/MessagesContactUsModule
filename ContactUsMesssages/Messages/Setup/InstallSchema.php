<?php

namespace ContactUsMesssages\Messages\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $tableName = $installer->getTable('contact_us_messages');

        if (!$installer->tableExists('contact_us_messages')) {
            $table = $installer->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'message_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'Message ID'
                )
                ->addColumn(
                    'email',
                    Table::TYPE_TEXT,
                    128,
                    ['nullable' => false, 'default' => ''],
                    'Email'
                )
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    32,
                    ['nullable' => false, 'default' => ''],
                    'Name'
                )
                ->addColumn(
                    'phone',
                    Table::TYPE_TEXT,
                    32,
                    ['nullable' => false, 'default' => ''],
                    'Phone number'
                )					
                ->addColumn(
                    'message',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'Message'
                )
                ->addColumn(
                    'is_active',
                    Table::TYPE_SMALLINT,
                    null,
                    ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                    'Status'
                )
                ->addColumn(
                    'created_at',
                    Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                    'Created At'
                );
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
