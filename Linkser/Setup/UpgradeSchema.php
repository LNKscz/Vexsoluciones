<?php

namespace Vexsoluciones\Linkser\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.4') < 0) {
            $table = $setup->getConnection()
                    ->newTable($setup->getTable('vex_orders_linkser'))
                    ->addColumn(
                        'id',
                        Table::TYPE_INTEGER,
                        null,
                        ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                        'Id'
                    )
                    ->addColumn(
                        'code',
                        Table::TYPE_INTEGER,
                        null,
                        ['default' => null],
                        'code'
                    )
                    ->addColumn(
                        'id_order',
                        Table::TYPE_INTEGER,
                        null,
                        ['default' => null],
                        'id_order'
                    )
                    ->addColumn(
                        'status_order',
                        Table::TYPE_TEXT,
                        null,
                        ['default' => null],
                        'status_order'
                    )
                    ->addColumn(
                        'type',
                        Table::TYPE_INTEGER,
                        null,
                        ['default' => null],
                        'type'
                    )
                    ->addColumn(
                        'status',
                        Table::TYPE_INTEGER,
                        null,
                        ['default' => null],
                        'status'
                    )->addColumn(
                        'fecha',
                        Table::TYPE_TIMESTAMP,
                        null,
                        ['default' => null],
                        'fecha'
                    );

            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }
}