<?php


namespace CustomModule\GridExample\Setup;


use Magento\Backend\Block\Widget\Tab;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        if (!$installer->tableExists('custommodule_gridexample_formexample'))
        {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('custommodule_gridexample_formexample')
            )
                ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary' => true,
                        'unsigned' => true
                    ],
                    'Customer Id'
                )

                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    255,
                    [
                        'nullable' => false
                    ],
                    'Customer Name'
                )

                ->addColumn(
                    'gender',
                    Table::TYPE_TEXT,
                    7,
                    [
                        'nullable' => false
                    ],
                    'Customer Gender'
                )

                ->addColumn(
                    'dateOfBirth',
                    Table::TYPE_DATE,
                    null,
                    [],
                    'Customer Date Of Birth'
                )

                ->addColumn(
                    'interestedCity',
                    Table::TYPE_TEXT,
                    255,
                    [],
                    'Intrested City of Customer for Shoping'
                )

                ->addColumn(
                    'bio',
                    Table::TYPE_TEXT,
                    '64k',
                    [],
                    'Customer Bio'
                )

                ->addColumn(
                    'createdAt',
                    Table::TYPE_TIMESTAMP,
                    null,
                    [
                        'nullable' => false,
                        'default' => Table::TIMESTAMP_INIT
                    ],
                    'Customer Created Date'
                )

                ->addColumn(
                    'updatedAt',
                    Table::TYPE_TIMESTAMP,
                    null,
                    [
                        'nullable' => false,
                        'default' => Table::TIMESTAMP_INIT_UPDATE
                    ],
                    'Customer Updated Date'
                )

                ->setComment('Customer Table');

            $installer->getConnection()->createTable($table);

            $installer->getConnection()->addIndex(
                $installer->getTable('custommodule_gridexample_formexample'),
                $setup->getIdxName(
                    $installer->getTable('custommodule_gridexample_formexample'),
                    ['name', 'bio', 'dateOfBirth'],
                    AdapterInterface::INDEX_TYPE_FULLTEXT
                ),
                ['name', 'bio', 'dateOfBirth'],
                AdapterInterface::INDEX_TYPE_FULLTEXT
            );
        }

        $installer->endSetup();
    }
}