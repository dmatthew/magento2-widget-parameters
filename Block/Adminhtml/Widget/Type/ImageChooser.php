<?php
namespace Dmatthew\WidgetParameters\Block\Adminhtml\Widget\Type;

use Magento\Backend\Block\Template;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Data\Form\Element\Factory;

/**
 * Class ImageChooser
 */
class ImageChooser extends Template
{
    /**
     * @var Factory
     */
    protected $elementFactory;

    /**
     * @param Context $context
     * @param Factory $elementFactory
     * @param array $data
     */
    public function __construct(Context $context, Factory $elementFactory, $data = [])
    {
        $this->elementFactory = $elementFactory;
        parent::__construct($context, $data);
    }

    /**
     * Prepare chooser element HTML
     *
     * @param AbstractElement $element
     * @return AbstractElement
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function prepareElementHtml(AbstractElement $element)
    {
        $config = $this->_getData('config');
        $onInsertUrl = $this->getUrl('dmatthew_widgettypes/wysiwyg_images/onInsert');
        $sourceUrl = $this->getUrl('cms/wysiwyg_images/index',
            ['target_element_id' => $element->getId(), 'on_insert_url' => $onInsertUrl]);
        /** @var \Magento\Backend\Block\Widget\Button $chooser */
        $chooser = $this->getLayout()->createBlock('Magento\Backend\Block\Widget\Button')
            ->setType('button')
            ->setClass('btn-chooser')
            ->setLabel($config['button']['open'])
            ->setOnClick('MediabrowserUtility.openDialog(\'' . $sourceUrl . '\', 0, 0, "Insert File...", {})')
            ->setDisabled($element->getReadonly());
        /** @var \Magento\Framework\Data\Form\Element\Text $input */
        $input = $this->elementFactory->create("text", ['data' => $element->getData()]);
        $input->setId($element->getId());
        $input->setForm($element->getForm());
        $input->setClass("widget-option input-text admin__control-text");
        if ($element->getRequired()) {
            $input->addClass('required-entry');
        }
        $element->setData('after_element_html', $input->getElementHtml()
            . $chooser->toHtml() . "<script>require(['mage/adminhtml/browser']);</script>");
        $element->setValue('');  // Hides the additional label that gets added.
        return $element;
    }
}
