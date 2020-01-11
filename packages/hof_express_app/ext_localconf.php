<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'TravisLykes.HofExpressApp',
            'Overview',
            [
                'Dashboard' => 'overview',
            ],
            // non-cacheable actions
            [
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'TravisLykes.HofExpressApp',
            'Restaurant',
            [
                'Food' => 'list, show, new, create, edit, update, delete',
                'OrderItems' => 'list, show, new, create, edit, update, delete',
                'Order' => 'list, show, new, create, edit, update, delete',
                'DeliveryType' => 'list, show, new, create, edit, update, delete',
                'FoodType' => 'list, show, new, create, edit, update, delete',
                'OrderStatus' => 'list, show, new, create, edit, update, delete'
            ],
            // non-cacheable actions
            [
                'Food' => 'list, show, new, create, edit, update, delete',
                'OrderItems' => 'list, show, new, create, edit, update, delete',
                'Order' => 'list, show, new, create, edit, update, delete',
                'DeliveryType' => 'list, show, new, create, edit, update, delete',
                'FoodType' => 'list, show, new, create, edit, update, delete',
                'OrderStatus' => 'list, show, new, create, edit, update, delete'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'TravisLykes.HofExpressApp',
            'Rpackage',
            [

                'Restaurant' => 'list, show, new, create, edit, update, delete',
                'Food' => 'list, show, new, create, edit, update, delete',
                'OrderItems' => 'list, show, new, create, edit, update, delete',
                'Order' => 'list, show, new, create, edit, update, delete',
                'FoodType' => 'list, show, new, create, edit, update, delete',

            ],
            // non-cacheable actions
            [

                'Restaurant' => 'list, show, new, create, edit, update, delete',
                'Food' => 'list, show, new, create, edit, update, delete',
                'OrderItems' => 'list, show, new, create, edit, update, delete',
                'Order' => 'list, show, new, create, edit, update, delete',
                'FoodType' => 'list, show, new, create, edit, update, delete',

            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        
                        overview {
                            iconIdentifier = hof_express_app-plugin-overview
                            title = Home Customization
                            description = Renders Custom Page
                            tt_content_defValues {
                                CType = list
                                list_type = hofexpressapp_overview
                            }
                        }
                        
                        restaurant {
                            iconIdentifier = hof_express_app-plugin-restaurant
                            title = LLL:EXT:hof_express_app/Resources/Private/Language/locallang_db.xlf:tx_hof_express_app_restaurant.name
                            description = LLL:EXT:hof_express_app/Resources/Private/Language/locallang_db.xlf:tx_hof_express_app_restaurant.description
                            tt_content_defValues {
                                CType = list
                                list_type = hofexpressapp_restaurant
                            }
                        }
                        
                        rpackage {
                            iconIdentifier = hof_express_app-plugin-rpackage
                            title = Restaurant List
                            description = Contents Restaurants
                            tt_content_defValues {
                                CType = list
                                list_type = hofexpressapp_rpackage
                            }
                        }
                    }
                    show = *
                }
           }'
        );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'hof_express_app-plugin-restaurant',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:hof_express_app/Resources/Public/Icons/user_plugin_restaurant.svg']
			);

            $iconRegistry->registerIcon(
               'hof_express_app-plugin-rpackage',
                \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
               ['source' => 'EXT:hof_express_app/Resources/Public/Icons/user_plugin_restaurant.svg']
            );
		
    }
);
