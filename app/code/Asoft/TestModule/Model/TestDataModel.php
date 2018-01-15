<?php
/**
 * Created by PhpStorm.
 * User: audiophile
 * Date: 14.01.18
 * Time: 23:08
 */

namespace Asoft\TestModule\Model;

use Magento\Framework\Model\AbstractModel;


class TestDataModel extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Asoft\TestModule\Model\Resource\TestDataModel');
    }
}
