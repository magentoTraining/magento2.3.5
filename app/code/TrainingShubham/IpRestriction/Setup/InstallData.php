<?php


namespace TrainingShubham\IpRestriction\Setup;

use Magento\Customer\Model\ResourceModel\Attribute;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Config;
use Magento\Customer\Model\Customer;

class InstallData implements InstallDataInterface
{

    private $eavSetupFactory;
    private $attributeResource;

    public function __construct(EavSetupFactory $eavSetupFactory, Config $eavConfig, Attribute $attributeResource)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig       = $eavConfig;
        $this->attributeResource = $attributeResource;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $attributeSetId = $eavSetup->getDefaultAttributeSetId(Customer::ENTITY);
        $attributeGroupId = $eavSetup->getDefaultAttributeGroupId(Customer::ENTITY);

        $eavSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'customer_ip',
            [
                'type'         => 'varchar',
                'label'        => 'Customer\'s Ip',
                'input'        => 'text',
                'required'     => false,
                'visible'      => true,
                'user_defined' => true,
                'sort_order'   => 990,
                'position'     => 999,
                'system'       => 0,
                'is_used_in_grid' => true,
                'is_visible_in_grid' => true,
                'is_filterable_in_grid' => true,
                'is_searchable_in_grid' => false
            ]
        );
        $sampleAttribute = $this->eavConfig->getAttribute(Customer::ENTITY, 'customer_ip');

        $sampleAttribute->setData('attribute_set_id', $attributeSetId);
        $sampleAttribute->setData('attribute_group_id', $attributeGroupId);

        $sampleAttribute->setData(
            'used_in_forms',
            ['adminhtml_checkout',
             'adminhtml_customer',
             'adminhtml_customer_address',
             'customer_account_create',
             'customer_account_edit',
             'customer_address_edit',
             'customer_register_address'
            ]
        );
        $this->attributeResource->save($sampleAttribute);
    }
}