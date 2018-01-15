<?php

namespace Asoft\TestModule\Controller\Index;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\Controller\ResultFactory;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $page_factory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $page_factory)
    {
        $this->page_factory = $page_factory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        $object_manager = ObjectManager::getInstance();
        $model = $object_manager->create('Asoft\TestModule\Model\TestDataModel');
        $model->setData($data);
        $model->save();

        return $this->redirectBack();
    }

    protected function redirectBack()
    {
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());

        return $resultRedirect;
    }
}