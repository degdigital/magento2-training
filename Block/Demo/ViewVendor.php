<?php
namespace Training\Vendor\Block\Demo;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Registry;

class ViewVendor extends Template
{
    /**
     * @var \Magento\Framework\Registry
     */
    protected $coreRegistry;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        array $data = []
    )
    {
        $this->coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * get current vendor
     *
     * @return \Training\Vendor\Model\Vendor
     */
    public function getCurrentVendor()
    {
        return $this->coreRegistry->registry('current_vendor');
    }
}
