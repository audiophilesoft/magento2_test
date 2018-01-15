<?php
/**
 * Created by PhpStorm.
 * User: audiophile
 * Date: 12.01.18
 * Time: 23:32
 */

namespace Asoft\TestModule\Rewrite;


class AttributeSave extends \Magento\Catalog\Controller\Adminhtml\Product\Attribute\Save
{
    /**
     * I didn't want to copy the whole code from the parent method as
     * it's not the best way for changing just one hardcoded string
     * (I used translations for this purpose). So I just added
     * my custom success message.
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $result = parent::execute();
        $this->messageManager->addSuccess(__('My additional success message.'));

        return $result;
    }
}