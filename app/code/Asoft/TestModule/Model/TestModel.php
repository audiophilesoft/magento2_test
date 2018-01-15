<?php
/**
 * Created by PhpStorm.
 * User: audiophile
 * Date: 07.01.18
 * Time: 15:25
 */

namespace Asoft\TestModule\Model;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class TestModel
{

    protected $eav_setup;
    protected $object_manager;

    public function __construct(EavSetupFactory $eav_setup_factory, ModuleDataSetupInterface $setup)
    {
        $this->eav_setup = $eav_setup_factory->create(['setup' => $setup]);
        $this->object_manager = ObjectManager::getInstance();
    }

    public function createCategory(string $name)
    {
        $this->setAreaCode();

        $storeManager = $this->object_manager->get('\Magento\Store\Model\StoreManagerInterface');

        $store = $storeManager->getStore();
        $store_id = $store->getStoreId();
        echo 'storeId: ' . $store_id . " ";


        $root_cat = $this->object_manager->get('Magento\Catalog\Model\Category');
        $root_cat->load(1);

        $url = self::formatString($name);
        $category_factory = $this->object_manager->get('\Magento\Catalog\Model\CategoryFactory');
/// Add a new sub category under root category
        $categoryTmp = $category_factory->create();
        $categoryTmp->setName($name);
        $categoryTmp->setIsActive(true);
        $categoryTmp->setUrlKey($url);
        $categoryTmp->setData('description', 'Test description');
        $categoryTmp->setParentId($root_cat->getId());
        $categoryTmp->setStoreId($store_id);
        $categoryTmp->setPath($root_cat->getPath());
        $categoryTmp->save();
    }

    public function createAttribute(string $name, array $values)
    {

        $this->eav_setup->addAttribute(
            Product::ENTITY,
            $name,
            [
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'label' => ucfirst($name),
                'input' => 'select',
                'option' => ['values' => $values],
                'class' => '',
                'source' => '',
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => true,
                'user_defined' => false,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => ''
            ]
        );
    }

    public function createProduct(string $name)
    {
        $this->setAreaCode();

        $product = $this->object_manager->create('\Magento\Catalog\Model\Product');
        $product->setSku(self::formatString($name));
        $product->setName($name);
        $product->setAttributeSetId(4);
        $product->setStatus(1);
        $product->setWeight(10);
        $product->setVisibility(4);
        $product->setTaxClassId(0);
        $product->setTypeId('simple');
        $product->setPrice(100);
        $product->setStockData([
            'use_config_manage_stock' => 0,
            'manage_stock' => 1,
            'is_in_stock' => 1,
            'qty' => 999
        ]);
        $product->save();
    }


    protected function setAreaCode()
    {

        $state = $this->object_manager->get('\Magento\Framework\App\State');
        $state->setAreaCode('frontend');
    }

    // todo: Static methods SHOULD NOT be used?
    protected static function formatString(string $str)
    {
        return trim(preg_replace('/ +/', '-', preg_replace('/[^A-Za-z0-9 ]/', '', urldecode(html_entity_decode(strip_tags($str))))));
    }
}