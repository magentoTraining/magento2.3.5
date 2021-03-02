<?php


namespace CustomModule\News\Setup;


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
        $newsTableName = $setup->getTable('custommodule_news');

        $setup->startSetup();

        if ($setup->getConnection()->isTableExists($newsTableName) != true)
        {
            $newsTable = $setup->getConnection()->newTable($newsTableName)
                ->addColumn(
                    'news_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'News Id'
                )

                ->addColumn(
                    'title',
                    Table::TYPE_TEXT,
                    255,
                    [
                        'nullable' => false,
                        'default' => ''
                    ],
                    'Title'
                )

                ->addColumn(
                    'description',
                    Table::TYPE_TEXT,
                    null,
                    [
                        'nullable' => false,
                        'default' => ''
                    ],
                    'Description'
                )

                ->addColumn(
                    'status',
                    Table::TYPE_BOOLEAN,
                    null,
                    [
                        'nullable' => false,
                        'unsigned' => true
                    ],
                    'Status'
                )

                ->addColumn(
                    'created_at',
                    Table::TYPE_TIMESTAMP,
                    null,
                    [
                        'nullable' => false,
                        'default' => Table::TIMESTAMP_INIT
                    ],
                    'Created At'
                )

                ->addColumn(
                    'updated_at',
                    Table::TYPE_TIMESTAMP,
                    null,
                    [
                        'nullable' => false,
                        'default' => Table::TIMESTAMP_INIT_UPDATE
                    ],
                    'Updated At'
                )

                ->addIndex(
                    $setup->getIdxName('custommodule_news', ['title']),
                    ['title']
                )

                ->setComment("News Table");

            $setup->getConnection()->createTable($newsTable);
        }

        $setup->endSetup();
    }
}