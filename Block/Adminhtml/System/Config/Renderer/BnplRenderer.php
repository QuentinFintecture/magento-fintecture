<?php

namespace Fintecture\Payment\Block\Adminhtml\System\Config\Renderer;

use Fintecture\Payment\Helper\Fintecture as FintectureHelper;

class BnplRenderer extends \Magento\Config\Block\System\Config\Form\Fieldset
{
    /** @var FintectureHelper */
    protected $fintectureHelper;

    public function __construct(
        FintectureHelper $fintectureHelper,
        \Magento\Backend\Block\Context $context,
        \Magento\Backend\Model\Auth\Session $authSession,
        \Magento\Framework\View\Helper\Js $jsHelper,
        array $data = []
    ) {
        $this->fintectureHelper = $fintectureHelper;
        parent::__construct($context, $authSession, $jsHelper, $data);
    }

    /**
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     *
     * @return string
     */
    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $isEnabled = $this->fintectureHelper->isBnplAvailable();

        if ($isEnabled) {
            $element->unsScope()->unsCanUseWebsiteValue()->unsCanUseDefaultValue();

            return parent::render($element);
        }

        return '';
    }
}
