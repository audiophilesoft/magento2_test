<?php

namespace Asoft\TestModule\Block;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\View\Element\Template;

class Index extends Template
{
    public function getSomeText()
    {
        return 'Any text';
    }

    public function drawData()
    {
        $object_manager = ObjectManager::getInstance();
        $model = $object_manager->create('Asoft\TestModule\Model\TestDataModel');
        $collection = $model->getCollection();
        foreach ($collection as $item) {
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
    }

}