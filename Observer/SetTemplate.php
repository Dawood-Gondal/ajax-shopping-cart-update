<?php
/**
 * @category    M2Commerce Enterprise
 * @package     M2Commerce_AjaxShoppingCartUpdate
 * @copyright   Copyright (c) 2023 M2Commerce Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

namespace M2Commerce\AjaxShoppingCartUpdate\Observer;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\View\Layout;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class SetTemplate
 */
class SetTemplate implements \Magento\Framework\Event\ObserverInterface
{
    private const CONFIG_IS_ENABLE = "ajaxShoppingCartUpdate/general/isEnableDisable";

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        StoreManagerInterface $storeManager,
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->storeManager = $storeManager;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        try {
            /** @var Layout $layout */
            $layout = $observer->getLayout();
            $changeTemplate = $this->scopeConfig->getValue(
                self::CONFIG_IS_ENABLE,
                ScopeInterface::SCOPE_STORE,
                $this->storeManager->getStore()->getCode()
            );

            if ($changeTemplate) {
                $block = $layout->getBlock('checkout.cart.form');
                if ($block) {
                    $block->setTemplate('M2Commerce_AjaxShoppingCartUpdate::cart/form.phtml');
                }

                $block = $layout->getChildBlock('checkout.cart.item.renderers', 'simple');
                if ($block) {
                    $block->setTemplate('M2Commerce_AjaxShoppingCartUpdate::cart/item/default.phtml');
                }

                $block = $layout->getChildBlock('checkout.cart.item.renderers', 'bundle');
                if ($block) {
                    $block->setTemplate('M2Commerce_AjaxShoppingCartUpdate::cart/item/default.phtml');
                }

                $block = $layout->getChildBlock('checkout.cart.item.renderers', 'virtual');
                if ($block) {
                    $block->setTemplate('M2Commerce_AjaxShoppingCartUpdate::cart/item/default.phtml');
                }

                $block = $layout->getChildBlock('checkout.cart.item.renderers', 'default');
                if ($block) {
                    $block->setTemplate('M2Commerce_AjaxShoppingCartUpdate::cart/item/default.phtml');
                }

                $block = $layout->getChildBlock('checkout.cart.item.renderers', 'configurable');
                if ($block) {
                    $block->setTemplate('M2Commerce_AjaxShoppingCartUpdate::cart/item/default.phtml');
                }

                $block = $layout->getChildBlock('checkout.cart.item.renderers', 'downloadable');
                if ($block) {
                    $block->setTemplate('M2Commerce_AjaxShoppingCartUpdate::cart/item/default.phtml');
                }

                $block = $layout->getChildBlock('checkout.cart.item.renderers', 'grouped');
                if ($block) {
                    $block->setTemplate('M2Commerce_AjaxShoppingCartUpdate::cart/item/default.phtml');
                }
            }
        } catch (\Exception $exception) {
        }
    }
}
