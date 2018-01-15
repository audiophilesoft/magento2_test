<?php
/**
 * Created by PhpStorm.
 * User: audiophile
 * Date: 10.01.18
 * Time: 11:04
 */

namespace Asoft\TestModule\Helper;


use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    public function getUrls()
    {
        return $this->scopeConfig->getValue('web/secure');
    }


    public function getCustomValues()
    {
        return $this->scopeConfig->getValue('catalog/review');
    }

}