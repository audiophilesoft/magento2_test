<?php
/**
 * Created by PhpStorm.
 * User: audiophile
 * Date: 14.01.18
 * Time: 23:11
 */

namespace Asoft\TestModule\Model\Resource\TestDataModel;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Asoft\TestModule\Model\TestDataModel',
            'Asoft\TestModule\Model\Resource\TestDataModel'
        );
    }
}

{

}