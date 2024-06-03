<?php

namespace Fintecture\Payment\Block\Adminhtml\System\Config\Renderer;

use Fintecture\Payment\Helper\Fintecture as FintectureHelper;
use Magento\Backend\Block\Template\Context;

class BnplMessageRenderer extends \Magento\Config\Block\System\Config\Form\Field
{
    /** @var FintectureHelper */
    protected $fintectureHelper;

    public function __construct(
        FintectureHelper $fintectureHelper,
        Context $context,
        array $data = []
    ) {
        $this->fintectureHelper = $fintectureHelper;
        parent::__construct($context, $data);
    }

    /**
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     *
     * @return string
     */
    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $output = '<div id="row_' . $element->getHtmlId() . '" class="fintecture-admin-warning message message-warning"><span>';
        $output .= __('This payment method is currently unavailable for your configured account. For further details, please consult the Fintecture console.');
        $output .= '</span></div>';

        $isEnabled = $this->fintectureHelper->isBnplAvailable();

        if ($isEnabled) {
            return '';
        }

        return $output;
    }
}
