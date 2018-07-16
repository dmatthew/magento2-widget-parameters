<?php
namespace Dmatthew\WidgetParameters\Block\Plugin\Adminhtml\Wysiwyg\Images;

class Content
{
    /**
     * @var \Magento\Framework\App\RequestInterface
     */
    private $request;

    public function __construct(\Magento\Framework\App\RequestInterface $request)
    {
        $this->request = $request;
    }

    public function afterGetOnInsertUrl(\Magento\Cms\Block\Adminhtml\Wysiwyg\Images\Content $subject, $result)
    {
        return $this->request->getParam('on_insert_url') ?: $result;
    }
}
