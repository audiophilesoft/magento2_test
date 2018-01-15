<?php
/**
 * Created by PhpStorm.
 * User: audiophile
 * Date: 14.01.18
 * Time: 22:50
 */

namespace Asoft\TestModule\Observer;


class ChangeCategoryName implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $cat = $observer->getData('category');
        $cat->setName('Edited by observer');
        $cat->save();

        return $this;
    }
}