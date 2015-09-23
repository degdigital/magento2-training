<?php

namespace Training\Vendor\Controller\Demo;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Training\Vendor\Model\VendorFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Registry;

class View extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Training\Vendor\Model\VendorFactory
     */
    protected $vendorFactory;
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    /**
     * @var \Magento\Framework\Registry
     */
    protected $coreRegistry;
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    public function __construct(
        Context $context,
        VendorFactory $vendorFactory,
        PageFactory $resultPageFactory,
        Registry $coreRegistry,
        ScopeConfigInterface $scopeConfig
    )
    {
        $this->vendorFactory = $vendorFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->coreRegistry = $coreRegistry;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }
    /**
     * View Vendor
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $vendorId = (int) $this->getRequest()->getParam('id');
        $vendor = $this->vendorFactory->create();
        $vendor->load($vendorId);
        $this->coreRegistry->register('current_vendor', $vendor);

        $resultPage = $this->resultPageFactory->create();
        $title = $vendor->getName();
        $resultPage->getConfig()->getTitle()->set($title);
        return $resultPage;

    }
}
