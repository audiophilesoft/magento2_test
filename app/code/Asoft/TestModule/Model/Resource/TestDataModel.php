<?php
/**
 * Created by PhpStorm.
 * User: audiophile
 * Date: 14.01.18
 * Time: 23:09
 */

namespace Asoft\TestModule\Model\Resource;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;


class TestDataModel extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('asoft_test', 'id');
    }
}
