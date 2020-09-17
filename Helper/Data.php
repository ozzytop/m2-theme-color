<?php

namespace Ozzytop\ThemeColor\Helper;
use \Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{

    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
       $this->scopeConfig = $scopeConfig;
    }

    public function getThemeColor() {
        
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue(\Ozzytop\ThemeColor\Console\ChangeColor::THEME_GENERAL_MAIN_COLOR, $storeScope);

   }

}