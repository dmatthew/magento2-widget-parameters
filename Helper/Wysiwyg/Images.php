<?php
namespace Dmatthew\WidgetParameters\Helper\Wysiwyg;

class Images extends \Magento\Cms\Helper\Wysiwyg\Images
{
    /**
     * Prepare Image insertion declaration for Wysiwyg or textarea(as_is mode)
     *
     * @param string $filename Filename transferred via Ajax
     * @return string
     */
    public function getImagePath($filename)
    {
        $fileurl = $this->getCurrentUrl() . $filename;
        $mediaUrl = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        $mediaPath = str_replace($mediaUrl, '', $fileurl);
        return $mediaPath;
    }
}
