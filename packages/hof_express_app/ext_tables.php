<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'TravisLykes.HofExpressApp',
            'Restaurant',
            'Restaurant'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'TravisLykes.HofExpressApp',
            'Rpackage',
            'Restaurant Content Ankasa'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'TravisLykes.HofExpressApp',
            'Overview',
            'Home Page Customization'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('hof_express_app', 'Configuration/TypoScript', 'Hof Express App');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_hofexpressapp_domain_model_food', 'EXT:hof_express_app/Resources/Private/Language/locallang_csh_tx_hofexpressapp_domain_model_food.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_hofexpressapp_domain_model_food');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_hofexpressapp_domain_model_restaurant', 'EXT:hof_express_app/Resources/Private/Language/locallang_csh_tx_hofexpressapp_domain_model_restaurant.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_hofexpressapp_domain_model_restaurant');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_hofexpressapp_domain_model_orderitems', 'EXT:hof_express_app/Resources/Private/Language/locallang_csh_tx_hofexpressapp_domain_model_orderitems.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_hofexpressapp_domain_model_orderitems');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_hofexpressapp_domain_model_order', 'EXT:hof_express_app/Resources/Private/Language/locallang_csh_tx_hofexpressapp_domain_model_order.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_hofexpressapp_domain_model_order');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_hofexpressapp_domain_model_address', 'EXT:hof_express_app/Resources/Private/Language/locallang_csh_tx_hofexpressapp_domain_model_address.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_hofexpressapp_domain_model_address');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_hofexpressapp_domain_model_customer', 'EXT:hof_express_app/Resources/Private/Language/locallang_csh_tx_hofexpressapp_domain_model_customer.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_hofexpressapp_domain_model_customer');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_hofexpressapp_domain_model_menu', 'EXT:hof_express_app/Resources/Private/Language/locallang_csh_tx_hofexpressapp_domain_model_menu.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_hofexpressapp_domain_model_menu');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_hofexpressapp_domain_model_deliverytype', 'EXT:hof_express_app/Resources/Private/Language/locallang_csh_tx_hofexpressapp_domain_model_deliverytype.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_hofexpressapp_domain_model_deliverytype');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_hofexpressapp_domain_model_foodtype', 'EXT:hof_express_app/Resources/Private/Language/locallang_csh_tx_hofexpressapp_domain_model_foodtype.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_hofexpressapp_domain_model_foodtype');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_hofexpressapp_domain_model_orderstatus', 'EXT:hof_express_app/Resources/Private/Language/locallang_csh_tx_hofexpressapp_domain_model_orderstatus.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_hofexpressapp_domain_model_orderstatus');

    }
);
