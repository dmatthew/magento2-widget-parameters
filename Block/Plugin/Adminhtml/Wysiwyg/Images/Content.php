<?php

namespace Dmatthew\WidgetParameters\Block\Plugin\Adminhtml\Wysiwyg\Images;

class Content
{
    /**
     * @var \Magento\Framework\App\RequestInterface
     */
    private $request;

    /**
     * Content constructor.
     *
     * @param \Magento\Framework\App\RequestInterface $request
     */
    public function __construct(\Magento\Framework\App\RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * @param \Magento\Cms\Block\Adminhtml\Wysiwyg\Images\Content $subject
     * @param                                                     $result
     *
     * @return string
     */
    public function afterGetOnInsertUrl(\Magento\Cms\Block\Adminhtml\Wysiwyg\Images\Content $subject, $result)
    {
        $onInsertUrl = $this->request->getParam('on_insert_url');

        return $onInsertUrl ? urldecode($onInsertUrl) : $result;
    }
}
