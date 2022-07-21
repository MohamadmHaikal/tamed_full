<?php
return [

    'user_roles' => [
        'administrator' => awe_lang('Administrator'),
        'partner' => awe_lang('Partner'),
        'customer' => awe_lang('Customer'),
    ],

    'prefix_dashboard' => 'dashboard',
    'prefix_auth' => 'auth',
    'key_encrypt' => 'hh',
    'date_format' => 'm-d-Y',
    'time_format' => 'h:i A',
    'media_size' => [
        'large' => [1200, 900],
        'medium' => [800, 600],
        'small' => [400, 300]
    ],

    'admin_menu' => [

        [
            'type' => 'item',
            'label' => awe_lang('dashboard'),
            'icon' => 'la-home',
            'route_name' => 'dashboard',
        ],
        [
            'type' => 'item',
            'label' => awe_lang('MyAccount'),
            'icon' => 'la-user',
            'route_name' => 'profile',

        ],
        [
            'type' => 'parent',
            'label' => awe_lang('Add Item'),
            'icon' => 'la-plus',
            'id' => 'addItem',
            'route_name' => 'Item',
            'child' => [

                // [
                //     'type' => 'item',
                //     'label' => awe_lang('MaterialType'),
                //     'route_name' => 'Item',
                //     'parameter' => 'MaterialType',
                //     'active_class' => 'Item/MaterialType'

                // ],
                // [
                //     'type' => 'item',
                //     'label' => awe_lang('ProjectType'),
                //     'route_name' => 'Item',
                //     'parameter' => 'ProjectType',
                //     'active_class' => 'Item/ProjectType'
                // ],
                // [
                //     'type' => 'item',
                //     'label' => awe_lang('TypeEmployment'),
                //     'route_name' => 'Item',
                //     'parameter' => 'TypeEmployment',
                //     'icon'=>'la-user-tie',
                //     'active_class' => 'Item/TypeEmployment'
                // ],
                [
                    'type' => 'item',
                    'label' => awe_lang('Section'),
                    'route_name' => 'Item',
                    'parameter' => 'Section',
                    'icon'=>'la-stream',
                    'active_class' => 'Item/Section'
                ],
                // [
                //     'type' => 'item',
                //     'label' => awe_lang('Activities'),
                //     'route_name' => 'Item',
                //     'parameter' => 'Activitie',
                //     'active_class' => 'Item/Activitie'
                // ],
                // [
                //     'type' => 'item',
                //     'label' => awe_lang('Additional Activitie'),
                //     'route_name' => 'Item',
                //     'parameter' => 'AdditionalActivitie',
                //     'active_class' => 'Item/AdditionalActivitie'
                // ],
                // [
                //     'type' => 'item',
                //     'label' => awe_lang('Service'),
                //     'route_name' => 'Item',
                //     'parameter' => 'Service',
                //     'active_class' => 'Item/Service'
                // ],
                [
                    'type' => 'item',
                    'label' => awe_lang('UserType'),
                    'route_name' => 'Item',
                    'parameter' => 'UserType',
                    'icon'=>'la-users-cog',
                    'active_class' => 'Item/UserType'
                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('City'),
                    'route_name' => 'Item',
                    'parameter' => 'City',
                    'icon'=>'la-city',
                    'active_class' => 'Item/City'
                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('Neighborhood'),
                    'route_name' => 'Item',
                    'parameter' => 'Neighborhood',
                    'icon'=>'la-map-marked-alt',
                    'active_class' => 'Item/Neighborhood'
                ],

            ],
        ],
        [
            'type' => 'parent',
            'label' => awe_lang('users'),
            'icon' => 'la-users',
            'id' => 'users',
            'route_name' => 'users',
            'child' =>
            [   [
                    'type' => 'item',
                    'label' => awe_lang('all users Business'),
                    'route_name' => 'users.business.all',
                    'icon' => 'la-users',
                    'active_class' => 'users/business/all'
                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('individual users'),
                    'route_name' => 'users.individual.all',
                    'icon' => 'la-user',
                    'active_class' => 'users/individual/all'
                ],
                // [
                //     'type' => 'item',
                //     'label' => awe_lang('users types'),
                //     'route_name' => 'Item',
                //     'parameter' => 'UserType',
                //     'active_class' => 'Item/UserType'
                // ],

            ],
        ],

        [
            'type' => 'parent',
            'label' => awe_lang('ads'),
            'icon' => 'la-newspaper',
            'id' => 'ads',
            'route_name' => 'ads',
            'child' =>
            [
                [
                    'type' => 'item',
                    'label' => awe_lang('Add Ads'),
                    'route_name' => 'ads.create',
                    'active_class' => 'ads/ads/create',
                    'icon'=>'la-plus'

                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('All Ads'),
                    'route_name' => 'ads.index',
                    'icon'=>'la-sticky-note',
                    'active_class' => 'ads/ads'

                ],

            ],
        ],
        [
            'type' => 'parent',
            'label' => awe_lang('Quotations'),
            'icon' => 'la-copy',
            'route_name' => 'Quotes',
            'id' => 'Quotes',
            'child' =>
            [
                [
                    'type' => 'item',
                    'label' => awe_lang('Quotes issued'),
                    'route_name' => 'Quotes',
                    'icon'=>'la-file-upload',
                    'active_class' => 'Quotes/issued',
                    'parameter' => ['source' => 'issued'],
                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('Quotes received'),
                    'route_name' => 'Quotes',
                    'icon'=>'la-file-download',
                    'active_class' => 'Quotes/received',
                    'parameter' => ['source' => 'received'],

                ],

            ],
        ],
        [
            'type' => 'parent',
            'label' => awe_lang('DealsAndAuctions'),
            'icon' => 'la-handshake',
            'route_name' => 'DealsAuctions',
            'id' => 'DealsAuctions',
            'child' =>
            [
                [
                    'type' => 'item',
                    'label' => awe_lang('IssuedealsAuctions'),
                    'route_name' => 'DealsAuctions',
                    'icon'=>'la-file-upload',
                    'active_class' => 'DealsAuctions/issued',
                    'parameter' => ['source' => 'issued'],
                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('IncomingDealsAuctions'),
                    'route_name' => 'DealsAuctions',
                    'icon'=>'la-file-download',
                    'active_class' => 'DealsAuctions/received',
                    'parameter' => ['source' => 'received'],

                ],

            ],
        ],
        [
            'type' => 'parent',
            'label' => awe_lang('electronic contracts'),
            'icon' => 'la-file-contract',
            'route_name' => 'ElectronicContracts',
            'id' => 'contracts',
            'child' =>
            [
                [
                    'type' => 'item',
                    'label' => awe_lang('issued contracts'),
                    'route_name' => 'ElectronicContracts',
                    'icon'=>'la-file-upload',
                    'active_class' => 'ElectronicContracts/all/issued',
                    'parameter' => ['source' => 'issued'],

                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('received contracts'),
                    'route_name' => 'ElectronicContracts',
                    'icon'=>'la-file-download',
                    'active_class' => 'ElectronicContracts/all/received',
                    'parameter' => ['source' => 'received'],

                ],
            ]
        ],
        [
            'type' => 'parent',
            'label' => awe_lang('eBills'),
            'icon' => 'la-receipt',
            'route_name' => 'eBills',
            'id' => 'eBills',
            'child' =>
            [
                [
                    'type' => 'item',
                    'label' => awe_lang('eBills'),
                    'route_name' => 'eBills',
                    'icon'=>'la-file-invoice',
                    'active_class' => 'eBills/all',

                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('bank accounts'),
                    'route_name' => 'bank',
                    'icon'=>'la-money-check',
                    'active_class' => 'bank/all'

                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('Invoice Settings'),
                    'route_name' => 'eBills.settings',
                    'icon'=>'la-cog',
                    'active_class' => 'eBills/settings'

                ],

            ]
        ],
        [
            'type' => 'item',
            'label' => awe_lang('EmploymentApplications'),
            'icon' => 'la-user-edit',
            'route_name' => 'employment',
        ],
        [
            'type' => 'item',
            'label' => awe_lang('FinancialAnalysis'),
            'icon' => 'la-chart-bar',
            'route_name' => 'FinancialAnalysis',
        ],
        [
            'type' => 'item',
            'label' => awe_lang('CustomerList'),
            'icon' => 'la-user-friends',
            'route_name' => 'FacilityCustomers',
        ],
        [
            'type' => 'item',
            'label' => awe_lang('FinanceRequest'),
            'icon' => 'la-file-invoice-dollar',
            'route_name' => 'SOON',
            'soon' => true,
        ],
        [
            'type' => 'item',
            'label' => awe_lang('intermediaryRequest'),
            'icon' => 'la-user-tie',
            'route_name' => 'SOON',
            'soon' => true,
        ],
       
        [
            'type' => 'parent',
            'label' => awe_lang('wallet'),
            'icon' => 'la-wallet',
            'id' => 'wallet',
            'route_name' => 'wallet',
            'child' =>
            [
                [
                    'type' => 'item',
                    'label' => awe_lang('Rcharge the balance'),
                    'route_name' => 'RchargeAccount',
                    'icon'=>'la-file-invoice-dollar',
                    'active_class' => 'wallet/RchargeAccount'

                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('Account statement'),
                    'route_name' => 'AccountStatement',
                    'icon'=>'la-receipt',
                    'active_class' => 'wallet/AccountStatement'

                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('Refund request'),
                    'route_name' => 'all-Refund',
                    'icon'=>'la-money-check-alt',
                    'active_class' => 'wallet/all-Refund'

                ],
            ],
        ],
        [
            'type' => 'item',
            'label' => awe_lang('Tasks table'),
            'icon' => 'la-calendar',
            'route_name' => 'TaskTable',
            'active_class' => 'TaskTable'
        ],
        [
            'type' => 'item',
            'label' => awe_lang('FileManger'),
            'icon' => 'la-file',
            'route_name' => 'FileManger',
        ],
        [
            'type' => 'parent',
            'label' => awe_lang('Custom Messages'),
            'icon' => 'la-envelope',
            'id' => 'Custom Messages',
            'route_name' => 'Send-message',
            'child' =>
            [
                [
                    'type' => 'item',
                    'label' => awe_lang('all users'),
                    'route_name' => 'send-message',
                    'icon'=>'la-user-friends',
                    'active_class' => 'Send-message/all-user'

                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('specific user'),
                    'icon'=>'la-user-alt',
                    'route_name' => 'send-message-specific',
                    'active_class' => 'Send-message/specific'

                ],
            ]
        ],
        [
            'type' => 'item',
            'label' => awe_lang('Translation'),
            'icon' => 'la-language',
            'route_name' => "languages.translations.index",
            'active_class' => 'languages/ar/translations',
            'parameter' => 'ar'
        ],
        [
            'type' => 'item',
            'label' => awe_lang('Disputes'),
            'icon' => 'la-gavel',
            'route_name' => "Disputes",

        ],
        [
            'type' => 'item',
            'label' => awe_lang('TechnicalSupport'),
            'icon' => 'la-user-astronaut',
            'route_name' => 'Support',
        ],
        [
            'type' => 'item',
            'label' => awe_lang('Settings'),
            'icon' => 'la-cog',
            'route_name' => 'settings',
        ],
        
    ],
    'facility_menu' => [
        [
            'type' => 'item',
            'label' => awe_lang('dashboard'),
            'icon' => 'la-home',
            'route_name' => 'dashboard',
        ],
        [
            'type' => 'item',
            'label' => awe_lang('MyAccount'),
            'icon' => 'la-user',
            'route_name' => 'profile',

        ],
        [
            'type' => 'parent',
            'label' => awe_lang('ads'),
            'icon' => 'la-newspaper',
            'id' => 'ads',
            'route_name' => 'ads',
            'child' =>
            [
                [
                    'type' => 'item',
                    'label' => awe_lang('Add Ads'),
                    'route_name' => 'ads.create',
                    'active_class' => 'ads/ads/create',
                    'icon'=>'la-plus'

                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('All Ads'),
                    'route_name' => 'ads.index',
                    'icon'=>'la-sticky-note',
                    'active_class' => 'ads/ads'

                ],

            ],
        ],
        [
            'type' => 'parent',
            'label' => awe_lang('Quotations'),
            'icon' => 'la-copy',
            'route_name' => 'Quotes',
            'id' => 'Quotes',
            'child' =>
            [
                [
                    'type' => 'item',
                    'label' => awe_lang('Quotes issued'),
                    'route_name' => 'Quotes',
                    'icon'=>'la-file-upload',
                    'active_class' => 'Quotes/issued',
                    'parameter' => ['source' => 'issued'],
                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('Quotes received'),
                    'route_name' => 'Quotes',
                    'icon'=>'la-file-download',
                    'active_class' => 'Quotes/received',
                    'parameter' => ['source' => 'received'],

                ],

            ],
        ],
        [
            'type' => 'parent',
            'label' => awe_lang('DealsAndAuctions'),
            'icon' => 'la-handshake',
            'route_name' => 'DealsAuctions',
            'id' => 'DealsAuctions',
            'child' =>
            [
                [
                    'type' => 'item',
                    'label' => awe_lang('IssuedealsAuctions'),
                    'route_name' => 'DealsAuctions',
                    'icon'=>'la-file-upload',
                    'active_class' => 'DealsAuctions/issued',
                    'parameter' => ['source' => 'issued'],
                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('IncomingDealsAuctions'),
                    'route_name' => 'DealsAuctions',
                    'icon'=>'la-file-download',
                    'active_class' => 'DealsAuctions/received',
                    'parameter' => ['source' => 'received'],

                ],

            ],
        ],
        [
            'type' => 'item',
            'label' => awe_lang('FileManger'),
            'icon' => 'la-file',
            'route_name' => 'FileManger',
        ],

        [
            'type' => 'item',
            'label' => awe_lang('Tasks table'),
            'icon' => 'la-calendar',
            'route_name' => 'TaskTable',
            'active_class' => 'TaskTable'
        ],
        [
            'type' => 'parent',
            'label' => awe_lang('electronic contracts'),
            'icon' => 'la-file-contract',
            'route_name' => 'ElectronicContracts',
            'id' => 'contracts',
            'child' =>
            [
                [
                    'type' => 'item',
                    'label' => awe_lang('issued contracts'),
                    'route_name' => 'ElectronicContracts',
                    'icon'=>'la-file-upload',
                    'active_class' => 'ElectronicContracts/all/issued',
                    'parameter' => ['source' => 'issued'],

                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('received contracts'),
                    'route_name' => 'ElectronicContracts',
                    'icon'=>'la-file-download',
                    'active_class' => 'ElectronicContracts/all/received',
                    'parameter' => ['source' => 'received'],

                ],
            ]
        ],
        [
            'type' => 'parent',
            'label' => awe_lang('eBills'),
            'icon' => 'la-receipt',
            'route_name' => 'eBills',
            'id' => 'eBills',
            'child' =>
            [
                [
                    'type' => 'item',
                    'label' => awe_lang('eBills'),
                    'route_name' => 'eBills',
                    'icon'=>'la-file-invoice',
                    'active_class' => 'eBills/all',

                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('bank accounts'),
                    'route_name' => 'bank',
                    'icon'=>'la-money-check',
                    'active_class' => 'bank/all'

                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('Invoice Settings'),
                    'route_name' => 'eBills.settings',
                    'icon'=>'la-cog',
                    'active_class' => 'eBills/settings'

                ],

            ]
        ],
        [
            'type' => 'item',
            'label' => awe_lang('FinancialAnalysis'),
            'icon' => 'la-chart-bar',
            'route_name' => 'FinancialAnalysis',
        ],
        [
            'type' => 'item',
            'label' => awe_lang('EmploymentApplications'),
            'icon' => 'la-user-edit',
            'route_name' => 'employment',
        ],
        [
            'type' => 'item',
            'label' => awe_lang('CustomerList'),
            'icon' => 'la-user-friends',
            'route_name' => 'FacilityCustomers',
            
        ],
        [
            'type' => 'item',
            'label' => awe_lang('FinanceRequest'),
            'icon' => 'la-file-invoice-dollar',
            'route_name' => 'SOON',
            'soon' => true,
        ],
        [
            'type' => 'item',
            'label' => awe_lang('intermediaryRequest'),
            'icon' => 'la-user-tie',
            'route_name' => 'SOON',
            'soon' => true,
        ],
       
        [
            'type' => 'parent',
            'label' => awe_lang('wallet'),
            'icon' => 'la-wallet',
            'id' => 'wallet',
            'route_name' => 'wallet',
            'child' =>
            [
                [
                    'type' => 'item',
                    'label' => awe_lang('Rcharge the balance'),
                    'route_name' => 'RchargeAccount',
                    'icon' =>'la-file-invoice-dollar',
                    'active_class' => 'wallet/RchargeAccount'

                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('Account statement'),
                    'route_name' => 'AccountStatement',
                    'icon'=>'la-receipt',
                    'active_class' => 'wallet/AccountStatement'

                ],

                [
                    'type' => 'item',
                    'label' => awe_lang('Refund request'),
                    'route_name' => 'all-Refund',
                    'icon'=>'la-money-check-alt',
                    'active_class' => 'wallet/all-Refund'

                ],

            ],
        ],
        [
            'type' => 'item',
            'label' => awe_lang('Disputes'),
            'icon' => 'la-gavel',
            'route_name' => "Disputes",

        ],
        [
            'type' => 'item',
            'label' => awe_lang('TechnicalSupport'),
            'icon' => 'la-user-astronaut',
            'route_name' => 'Support',
        ],
    ],
    'customer_menu' => [
        [
            'type' => 'item',
            'label' => awe_lang('myProfile'),
            'icon' => 'la-user',
            'route_name' => 'profile',

        ],
        [
            'type' => 'parent',
            'label' => awe_lang('DealsAndAuctions'),
            'icon' => 'la-handshake',
            'route_name' => 'DealsAuctions',
            'id' => 'DealsAuctions',
            'child' =>
            [
                [
                    'type' => 'item',
                    'label' => awe_lang('IssuedealsAuctions'),
                    'route_name' => 'DealsAuctions',
                    'icon'=>'la-file-upload',
                    'active_class' => 'DealsAuctions/issued',
                    'parameter' => ['source' => 'issued'],
                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('IncomingDealsAuctions'),
                    'route_name' => 'DealsAuctions',
                    'icon'=>'la-file-download',
                    'active_class' => 'DealsAuctions/received',
                    'parameter' => ['source' => 'received'],

                ],

            ],
        ],
        [
            'type' => 'parent',
            'label' => awe_lang('Quotations'),
            'icon' => 'la-copy',
            'route_name' => 'Quotes',
            'id' => 'Quotes',
            'child' =>
            [
                [
                    'type' => 'item',
                    'label' => awe_lang('Quotes issued'),
                    'route_name' => 'Quotes',
                    'icon'=>'la-file-upload',
                    'active_class' => 'Quotes/issued',
                    'parameter' => ['source' => 'issued'],
                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('Quotes received'),
                    'route_name' => 'Quotes',
                    'icon'=>'la-file-download',
                    'active_class' => 'Quotes/received',
                    'parameter' => ['source' => 'received'],

                ],

            ],
        ],
        [
            'type' => 'item',
            'label' => awe_lang('EmploymentApplications'),
            'icon' => 'la-user-edit',
            'route_name' => 'employment',
        ],
        [
            'type' => 'item',
            'label' => awe_lang('FileManger'),
            'icon' => 'la-file',
            'route_name' => 'FileManger',
        ],

        [
            'type' => 'item',
            'label' => awe_lang('Tasks table'),
            'icon' => 'la-calendar',
            'route_name' => 'TaskTable',
            'active_class' => 'TaskTable'
        ],
        [
            'type' => 'parent',
            'label' => awe_lang('electronic contracts'),
            'icon' => 'la-file-contract',
            'route_name' => 'ElectronicContracts',
            'id' => 'contracts',
            'child' =>
            [
              
                [
                    'type' => 'item',
                    'label' => awe_lang('received contracts'),
                    'route_name' => 'ElectronicContracts',
                    'icon'=>'la-file-download',
                    'active_class' => 'ElectronicContracts/all/received',
                    'parameter' => ['source' => 'received'],

                ],
            ]
        ],
        [
            'type' => 'item',
            'label' => awe_lang('eBills'),
            'icon' => 'la-receipt',
            'route_name' => 'eBills',
        ],
        [
            'type' => 'item',
            'label' => awe_lang('intermediaryRequest'),
            'icon' => 'la-user-tie',
            'route_name' => 'SOON',
            'soon' => true,
        ],
        [
            'type' => 'parent',
            'label' => awe_lang('wallet'),
            'icon' => 'la-wallet',
            'id' => 'wallet',
            'route_name' => 'wallet',
            'child' =>
            [
                [
                    'type' => 'item',
                    'label' => awe_lang('Rcharge the balance'),
                    'route_name' => 'RchargeAccount',
                    'icon' => 'la-file-invoice-dollar',
                    'active_class' => 'wallet/RchargeAccount'

                ],
                [
                    'type' => 'item',
                    'label' => awe_lang('Account statement'),
                    'route_name' => 'AccountStatement',
                    'icon'=>'la-receipt',
                    'active_class' => 'wallet/AccountStatement'

                ],

                [
                    'type' => 'item',
                    'label' => awe_lang('Refund request'),
                    'route_name' => 'all-Refund',
                    'icon'=>'la-money-check-alt',
                    'active_class' => 'wallet/all-Refund'

                ],

            ],
        ],
        [
            'type' => 'item',
            'label' => awe_lang('Disputes'),
            'icon' => 'la-gavel',
            'route_name' => "Disputes",

        ],
        [
            'type' => 'item',
            'label' => awe_lang('TechnicalSupport'),
            'icon' => 'la-user-astronaut',
            'route_name' => 'Support',
        ],

    ],

    'theme_options' => [
        'sections' => [
            [
                'id' => 'general_options',
                'label' => awe_lang('General'),
            ],
            [
                'id' => 'styling_options',
                'label' => awe_lang('Styling'),
                'translation' => false
            ],
            [
                'id' => 'page_options',
                'label' => awe_lang('Page'),
            ],
            // [
            //     'id' => 'booking_options',
            //     'label' => awe_lang('Booking'),
            // ],
            // [
            //     'id' => 'service_options',
            //     'label' => awe_lang('Services')
            // ],
            // [
            //     'id' => 'payment_options',
            //     'label' => awe_lang('Payment Gateways'),
            // ],
            // [
            //     'id' => 'review_options',
            //     'label' => awe_lang('Reviews'),
            //     'translation' => false,
            // ],
            // [
            //     'id' => 'email_options',
            //     'label' => awe_lang('Email'),
            // ],
            // [
            //     'id' => 'partner_options',
            //     'label' => awe_lang('Partner'),
            //     'translation' => false,
            // ],
            // [
            //     'id' => 'registration',
            //     'label' => awe_lang('Registration'),
            //     'translation' => false
            // ],
            // [
            //     'id' => 'footer_options',
            //     'label' => awe_lang('Footer'),
            // ],
            // [
            //     'id' => 'ical_options',
            //     'label' => awe_lang('Ical Sync'),
            // ],
            [
                'id' => 'advance_options',
                'label' => awe_lang('Advanced'),
            ],
            // [
            //     'id' => 'affiliate_options', 
            //     'label' => awe_lang('Affiliates'),
            //     'auto_hide' => true
            // ],
        ],
        'fields' => [
            [
                'id' => 'site_name',
                'label' => awe_lang('Site Name'),
                'type' => 'text',
                'layout' => 'col-12 col-md-6',
                'std' => 'AweBooking',
                'break' => true,
                'translation' => true,
                'section' => 'general_options'
            ],
            [
                'id' => 'site_description',
                'label' => awe_lang('Site Description'),
                'type' => 'text',
                'translation' => true,
                'layout' => 'col-12 col-md-6',
                'std' => 'Travel Booking System',
                'break' => true,
                'section' => 'general_options'
            ],
            [
                'id' => 'copy_right',
                'label' => awe_lang('Copy right text'),
                'type' => 'text',
                'layout' => 'col-12 col-md-6',
                'break' => true,
                'translation' => true,
                'section' => 'general_options'
            ],
            [
                'id' => 'logo',
                'label' => awe_lang('Logo'),
                'type' => 'upload',
                'section' => 'general_options',
                'translation' => false
            ],
            [
                'id' => 'dashboard_logo',
                'label' => awe_lang('Dashboard Logo'),
                'type' => 'upload',
                'layout' => 'col-12 col-md-4',
                'section' => 'general_options',
                'translation' => false
            ],
            // [
            //     'id' => 'dashboard_logo_short',
            //     'label' => awe_lang('Dashboard Small Logo'),
            //     'type' => 'upload',
            //     'layout' => 'col-12 col-md-4',
            //     'break' => true,
            //     'translation' => false,
            //     'section' => 'general_options'
            // ],
            [
                'id' => 'favicon',
                'label' => awe_lang('Favicon'),
                'type' => 'upload',
                'layout' => 'col-12 col-md-4',
                'section' => 'general_options',
                'translation' => false,
                'break' => true,
            ],

            // [
            //     'id' => 'enable_sticky',
            //     'label' => awe_lang('Sticky Header'),
            //     'type' => 'on_off',
            //     'std' => 'off',
            //     'break' => true,
            //     'section' => 'styling_options'
            // ],
            [
                'id' => 'main_color',
                'label' => awe_lang('Main Color'),
                'type' => 'colorpicker',
                'std' => '#f8546d',
                'layout' => 'col-12 col-sm-6 col-md-3',
                'break' => true,
                'section' => 'styling_options',
                'translation' => false,
            ],
            // [
            //     'id' => 'main_dark_color',
            //     'label' => awe_lang('main_dark_color'),
            //     'type' => 'colorpicker',
            //     'std' => '#f8546d',
            //     'layout' => 'col-12 col-sm-6 col-md-3',
            //     'break' => true,
            //     'section' => 'styling_options',
            //     'translation' => false,
            // ],
            [
                'id' => 'google_font',
                'label' => awe_lang("Google Font"),
                'type' => 'google_font',
                'style' => 'wide',
                'section' => 'styling_options',
                'translation' => false,
            ],
            // [
            //     'id' => 'custom_css',
            //     'label' => awe_lang('Custom CSS'),
            //     'type' => 'css',
            //     'section' => 'styling_options',
            // ],
            // [
            //     'id' => 'custom_header_code',
            //     'label' => awe_lang('Header Code'),
            //     'desc' => awe_lang('You can add some custom code: js, css. Note: Make sure your code is clean'),
            //     'type' => 'textarea',
            //     'section' => 'styling_options',
            // ],
            // [
            //     'id' => 'custom_footer_code',
            //     'label' => awe_lang('Footer Code'),
            //     'desc' => awe_lang('You can add some custom code: js, css. Note: Make sure your code is clean'),
            //     'type' => 'textarea',
            //     'section' => 'styling_options',
            // ],
            // [
            //     'id' => 'sort_search_form',
            //     'label' => awe_lang('Sort the search form'),
            //     'type' => 'list_item',
            //     'bind_from' => 'sort_search_form_label___',
            //     'items' => [
            //         [
            //             'id' => 'id',
            //             'label' => awe_lang('Name'),
            //             'type' => 'hidden',
            //             'translation' => false
            //         ],
            //         [
            //             'id' => 'only_search_form',
            //             'label' => awe_lang('Only Search Form'),
            //             'type' => 'hidden',
            //             'translation' => false
            //         ],
            //         [
            //             'id' => 'label',
            //             'label' => awe_lang('Label'),
            //             'type' => 'text',
            //             'translation' => true
            //         ]
            //     ],
            //     'std' => 'callback__convert_tab_service_to_list_item',
            //     'button_add_new_list_item' => false,
            //     'editable_list_item' => false,
            //     'compare_std_list_item' => true,
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'section' => 'page_options',
            //     'translation' => true
            // ],
            // [
            //     'id' => 'home_slider',
            //     'label' => awe_lang('Home Slider'),
            //     'type' => 'uploads',
            //     'section' => 'page_options'
            // ],
            // [
            //     'id' => 'top_destination',
            //     'label' => awe_lang('Top Destination'),
            //     'type' => 'list_item',
            //     'bind_from' => 'top_destination_name___',
            //     'items' => [
            //         [
            //             'id' => 'name',
            //             'label' => awe_lang('Destination Name'),
            //             'type' => 'text',
            //             'translation' => true,
            //         ],
            //         [
            //             'id' => 'lat',
            //             'label' => awe_lang('Destination Lat'),
            //             'type' => 'text',
            //         ],
            //         [
            //             'id' => 'lng',
            //             'label' => awe_lang('Destination Lng'),
            //             'type' => 'text',
            //         ],
            //         [
            //             'id' => 'image',
            //             'label' => awe_lang('Image'),
            //             'type' => 'upload',
            //         ],
            //         [
            //             'id' => 'service',
            //             'label' => awe_lang('Service'),
            //             'type' => 'checkbox_pro',
            //             'choices' => [
            //                 'home' => awe_lang('Home'),
            //                 // 'experience' => awe_lang('Experience'),
            //                 // 'car' => awe_lang('Car')
            //             ],
            //             'style' => 'col',
            //         ]
            //     ],
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'section' => 'page_options',
            //     'translation' => true
            // ],
            // [
            //     'id' => 'testimonial',
            //     'label' => awe_lang('Testimonial'),
            //     'type' => 'list_item',
            //     'bind_from' => 'testimonial_author_name___',
            //     'items' => [
            //         [
            //             'id' => 'author_name',
            //             'label' => awe_lang('Author Name'),
            //             'type' => 'text',
            //             'translation' => true,
            //         ],
            //         [
            //             'id' => 'author_avatar',
            //             'label' => awe_lang('Avatar'),
            //             'type' => 'upload',
            //         ],
            //         [
            //             'id' => 'author_comment',
            //             'label' => awe_lang('Comment'),
            //             'type' => 'textarea',
            //             'translation' => true
            //         ],
            //         [
            //             'id' => 'author_rate',
            //             'label' => awe_lang('Rate'),
            //             'type' => 'range',
            //             'minlength' => 1,
            //             'maxlength' => [
            //                 'max-length' => 5
            //             ],
            //             'std' => 5
            //         ],
            //         [
            //             'id' => 'date',
            //             'label' => awe_lang('Created At'),
            //             'type' => 'datepicker',
            //             'min_date' => -1
            //         ]
            //     ],
            //     'enqueue_scripts' => ['flatpickr-js', 'range-slider'],
            //     'enqueue_styles' => ['flatpickr-css', 'range-slider'],
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'section' => 'page_options',
            //     'translation' => true
            // ],
            // [
            //     'id' => 'testimonial_background',
            //     'label' => awe_lang('Testimonial Background'),
            //     'type' => 'colorpicker',
            //     'std' => '#dd556a',
            //     'layout' => 'col-12 col-md-3',
            //     'break' => true,
            //     'section' => 'page_options',
            // ],
            // [
            //     'id' => 'term_condition_page',
            //     'label' => awe_lang('Term & Condition Page'),
            //     'type' => 'select',
            //     'choices' => 'page',
            //     'layout' => 'col-12 col-12 col-md-6',
            //     'style' => 'wide',
            //     'break' => true,
            //     'section' => 'page_options'
            // ],
            // [
            //     'id' => 'call_to_action_background',
            //     'label' => awe_lang('Call To Action Background'),
            //     'type' => 'upload',
            //     'section' => 'page_options',
            //     'translation' => false
            // ],
            // [
            //     'id' => 'call_to_action_page',
            //     'label' => awe_lang('Call To Action Page'),
            //     'type' => 'select',
            //     'choices' => 'page',
            //     'layout' => 'col-12 col-sm-6',
            //     'style' => 'wide',
            //     'break' => true,
            //     'section' => 'page_options'
            // ],

            // [
            //     'id' => 'call_to_jaliat_background',
            //     'label' => awe_lang('Call To jaliat Background'),
            //     'type' => 'upload',
            //     'section' => 'page_options',
            //     'translation' => false
            // ],

            //  [
            //     'id' => 'call_to_jaliat_title',
            //     'label' => awe_lang('jaliat_title'),
            //     'type' => 'text',
            //      'section' => 'page_options',
            //     'layout' => 'col-12 col-md-6',
            //     'translation' => true,

            // ],


            // [
            //     'id' => 'call_to_jaliat_desc',
            //     'label' => awe_lang('jaliat_desc'),
            //     'type' => 'text',
            //      'section' => 'page_options',
            //     'layout' => 'col-12 col-md-6',
            //     'translation' => true,

            // ],

            // [
            //     'id' => 'call_to_jaliat_page',
            //     'label' => awe_lang('Call To jaliat Page link'),
            //     'type' => 'text',
            //     'section' => 'page_options',
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            // ],


            // [
            //     'id' => 'blog_image',
            //     'label' => awe_lang('Blog page image'),
            //     'type' => 'upload',
            //     'section' => 'page_options',
            //     'translation' => false
            // ],
            // [
            //     'id' => 'sidebar_image',
            //     'label' => awe_lang('Sidebar image'),
            //     'type' => 'upload',
            //     'section' => 'page_options',
            //     'translation' => false
            // ],
            // [
            //     'id' => 'sidebar_image_link',
            //     'label' => awe_lang('Sidebar image link'),
            //     'type' => 'text',
            //     'section' => 'page_options',
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            // ],
            // [
            //     'id' => 'contact_detail',
            //     'label' => awe_lang('Contact Detail'),
            //     'type' => 'editor',
            //     'translation' => true,
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'section' => 'page_options',
            // ],
            // [
            //     'id' => 'contact_map_lat',
            //     'label' => awe_lang('Contact Us: Map latitude'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-3',
            //     'section' => 'page_options',
            // ],
            // [
            //     'id' => 'contact_map_lng',
            //     'label' => awe_lang('Contact Us: Map longtitude'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-3',
            //     'break' => true,
            //     'section' => 'page_options',
            // ],
            // [
            //     'id' => 'currencies',
            //     'type' => 'list_item',
            //     'label' => awe_lang('Currencies'),
            //     'bind_from' => 'currencies_name___',
            //     'translation' => true,
            //     'items' => [
            //         [
            //             'id' => 'name',
            //             'label' => awe_lang('Name'),
            //             'type' => 'text',
            //             'layout' => 'col-12 col-md-6',
            //             'translation' => true
            //         ],
            //         [
            //             'id' => 'symbol',
            //             'label' => awe_lang('Symbol'),
            //             'type' => 'text',
            //             'layout' => 'col-12 col-md-6',
            //             'break' => true,
            //         ],
            //         [
            //             'id' => 'unit',
            //             'label' => awe_lang('Unit'),
            //             'type' => 'select',
            //             'choices' => '',
            //             'style' => 'wide',
            //             'layout' => 'col-12 col-sm-4',
            //         ],
            //         [
            //             'id' => 'exchange',
            //             'label' => awe_lang('Exchange Rate'),
            //             'type' => 'text',
            //             'std' => 1,
            //             'layout' => 'col-12 col-sm-4',
            //         ],
            //         [
            //             'id' => 'position',
            //             'label' => awe_lang('Position'),
            //             'type' => 'select',
            //             'choices' => [
            //                 'left' => awe_lang('Left ($99)'),
            //                 'right' => awe_lang('Right (99$)'),
            //             ],
            //             'style' => 'wide',
            //             'std' => 'left',
            //             'layout' => 'col-12 col-sm-4',
            //             'break' => true,
            //         ],
            //         [
            //             'id' => 'thousand_separator',
            //             'label' => awe_lang('Thousand Separator'),
            //             'type' => 'text',
            //             'std' => ',',
            //             'layout' => 'col-12 col-sm-4',
            //         ],
            //         [
            //             'id' => 'decimal_separator',
            //             'label' => awe_lang('Decimal Separator'),
            //             'type' => 'text',
            //             'std' => '.',
            //             'layout' => 'col-12 col-sm-4',
            //         ],
            //         [
            //             'id' => 'currency_decimal',
            //             'label' => awe_lang('Currency Decimal'),
            //             'type' => 'number',
            //             'minlength' => 0,
            //             'std' => 0,
            //             'layout' => 'col-12 col-sm-4',
            //         ],
            //     ],
            //     'std' => [
            //         [
            //             'name' => 'USD',
            //             'symbol' => '$',
            //             'unit' => 'USD',
            //             'exchange' => 1,
            //             'position' => 'left',
            //             'thousand_separator' => ',',
            //             'decimal_separator' => '.',
            //             'currency_decimal' => 2
            //         ]
            //     ],
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'section' => 'booking_options'
            // ],
            // [
            //     'id' => 'primary_currency',
            //     'label' => awe_lang('Primary Currency'),
            //     'type' => 'select',
            //     'choices' => 'hh_currencies',
            //     'std' => 'USD',
            //     'layout' => 'col-12 col-md-6',
            //     'style' => 'wide',
            //     'break' => true,
            //     'section' => 'booking_options'
            // ],
            // [
            //     'id' => 'create_user_checkout',
            //     'label' => awe_lang('Automatically create an account'),
            //     'desc' => awe_lang('The system will create an account automatically if it is not registered on the system'),
            //     'type' => 'on_off',
            //     'std' => 'off',
            //     'break' => true,
            //     'section' => 'booking_options'
            // ],
            // [
            //     'id' => 'enable_email_confirmation',
            //     'label' => awe_lang('Enable Email Confirmation'),
            //     'desc' => awe_lang('The system will send an email to confirm the account before sending booking email information.'),
            //     'type' => 'on_off',
            //     'std' => 'on',
            //     'break' => true,
            //     'section' => 'booking_options'
            // ],
            // [
            //     'id' => 'service_tabs',
            //     'label' => awe_lang('Service Tabs'),
            //     'type' => 'tab',
            //     'tab_title' => [
            //         [
            //             'id' => 'home_tab',
            //             'label' => awe_lang('Home'),
            //         ],
            //         // [
            //         //     'id' => 'experience_tab',
            //         //     'label' => awe_lang('Experience'),
            //         // ],
            //         // [
            //         //     'id' => 'car_tab',
            //         //     'label' => awe_lang('Car'),
            //         // ],
            //     ],
            //     'tab_content' => [
            //         [
            //             'id' => 'enable_home',
            //             'label' => awe_lang('Service Enable'),
            //             'type' => 'on_off',
            //             'std' => 'on',
            //             'section' => 'home_tab'
            //         ],
            //         [
            //             'id' => 'home_featured_image',
            //             'label' => awe_lang('Featured Image'),
            //             'type' => 'upload',
            //             'section' => 'home_tab',
            //             'translation' => false,
            //             'condition' => 'enable_home:is(on)',
            //         ],
            //         [
            //             'id' => 'home_search_radius',
            //             'label' => awe_lang('Search Radius'),
            //             'desc' => awe_lang('Search radius to find home by lat/lng'),
            //             'type' => 'range',
            //             'layout' => 'col-12 col-md-6',
            //             'break' => true,
            //             'section' => 'home_tab',
            //             'condition' => 'enable_home:is(on)',
            //             'minlength' => 1,
            //             'maxlength' => [
            //                 'max-length' => 500
            //             ],
            //             'std' => 25,
            //         ],
            //         [
            //             'id' => 'home_top_destination',
            //             'label' => awe_lang('Top Destination'),
            //             'type' => 'list_item',
            //             'bind_from' => 'home_top_destination_name___',
            //             'items' => [
            //                 [
            //                     'id' => 'name',
            //                     'label' => awe_lang('Destination Name'),
            //                     'type' => 'text',
            //                     'translation' => true,
            //                 ],
            //                 [
            //                     'id' => 'lat',
            //                     'label' => awe_lang('Destination Lat'),
            //                     'type' => 'text',
            //                 ],
            //                 [
            //                     'id' => 'lng',
            //                     'label' => awe_lang('Destination Lng'),
            //                     'type' => 'text',
            //                 ],
            //                 [
            //                     'id' => 'image',
            //                     'label' => awe_lang('Image'),
            //                     'type' => 'upload',
            //                 ],
            //             ],
            //             'layout' => 'col-12 col-md-6',
            //             'break' => true,
            //             'condition' => 'enable_home:is(on)',
            //             'section' => 'home_tab',
            //             'translation' => true,
            //         ],
            //         [
            //             'id' => 'home_call_to_action_background',
            //             'label' => awe_lang('Call To Action Background'),
            //             'type' => 'upload',
            //             'section' => 'home_tab',
            //             'translation' => false
            //         ],
            //         [
            //             'id' => 'home_call_to_action_page',
            //             'label' => awe_lang('Call To Action Page'),
            //             'type' => 'select',
            //             'choices' => 'page',
            //             'layout' => 'col-12 col-sm-6',
            //             'style' => 'wide',
            //             'break' => true,
            //             'section' => 'home_tab'
            //         ],
            //         [
            //             'id' => 'included_home_tax',
            //             'label' => awe_lang('Tax is included?'),
            //             'desc' => awe_lang('Tax is included in the price of the product'),
            //             'type' => 'on_off',
            //             'section' => 'home_tab'
            //         ],
            //         [
            //             'id' => 'home_tax',
            //             'label' => awe_lang('Tax (%)'),
            //             'type' => 'text',
            //             'std' => '10',
            //             'layout' => 'col-12 col-md-6',
            //             'section' => 'home_tab',
            //         ],
            //         [
            //             'id' => 'enable_experience',
            //             'label' => awe_lang('Service Enable'),
            //             'type' => 'on_off',
            //             'std' => 'on',
            //             'section' => 'experience_tab'
            //         ],
            //         [
            //             'id' => 'experience_featured_image',
            //             'label' => awe_lang('Featured Image'),
            //             'type' => 'upload',
            //             'section' => 'experience_tab',
            //             'translation' => false,
            //             'condition' => 'enable_experience:is(on)',
            //         ],
            //         [
            //             'id' => 'experience_search_radius',
            //             'label' => awe_lang('Search Radius'),
            //             'desc' => awe_lang('Search radius to find experience by lat/lng'),
            //             'type' => 'range',
            //             'layout' => 'col-12 col-md-6',
            //             'condition' => 'enable_experience:is(on)',
            //             'break' => true,
            //             'section' => 'experience_tab',
            //             'std' => 25,
            //             'minlength' => 1,
            //             'maxlength' => [
            //                 'max-length' => 500
            //             ]
            //         ],
            //         [
            //             'id' => 'experience_top_destination',
            //             'label' => awe_lang('Top Destination'),
            //             'type' => 'list_item',
            //             'bind_from' => 'experience_top_destination_name___',
            //             'items' => [
            //                 [
            //                     'id' => 'name',
            //                     'label' => awe_lang('Destination Name'),
            //                     'type' => 'text',
            //                     'translation' => true,
            //                 ],
            //                 [
            //                     'id' => 'lat',
            //                     'label' => awe_lang('Destination Lat'),
            //                     'type' => 'text',
            //                 ],
            //                 [
            //                     'id' => 'lng',
            //                     'label' => awe_lang('Destination Lng'),
            //                     'type' => 'text',
            //                 ],
            //                 [
            //                     'id' => 'image',
            //                     'label' => awe_lang('Image'),
            //                     'type' => 'upload',
            //                 ],
            //             ],
            //             'layout' => 'col-12 col-md-6',
            //             'break' => true,
            //             'section' => 'experience_tab',
            //             'translation' => true,
            //         ],
            //         [
            //             'id' => 'experience_call_to_action_background',
            //             'label' => awe_lang('Call To Action Background'),
            //             'type' => 'upload',
            //             'section' => 'experience_tab',
            //             'translation' => false
            //         ],
            //         [
            //             'id' => 'experience_call_to_action_page',
            //             'label' => awe_lang('Call To Action Page'),
            //             'type' => 'select',
            //             'choices' => 'page',
            //             'layout' => 'col-12 col-sm-6',
            //             'style' => 'wide',
            //             'break' => true,
            //             'section' => 'experience_tab'
            //         ],
            //         [
            //             'id' => 'included_experience_tax',
            //             'label' => awe_lang('Tax is included?'),
            //             'desc' => awe_lang('Tax is included in the price of the product'),
            //             'type' => 'on_off',
            //             'section' => 'experience_tab'
            //         ],
            //         [
            //             'id' => 'experience_tax',
            //             'label' => awe_lang('Tax (%)'),
            //             'type' => 'text',
            //             'std' => '10',
            //             'layout' => 'col-12 col-md-6',
            //             'section' => 'experience_tab',
            //         ],
            //         [
            //             'id' => 'enable_car',
            //             'label' => awe_lang('Service Enable'),
            //             'type' => 'on_off',
            //             'std' => 'on',
            //             'section' => 'car_tab'
            //         ],
            //         [
            //             'id' => 'car_featured_image',
            //             'label' => awe_lang('Featured Image'),
            //             'type' => 'upload',
            //             'section' => 'car_tab',
            //             'translation' => false,
            //             'condition' => 'enable_car:is(on)',
            //         ],
            //         [
            //             'id' => 'car_booking_type',
            //             'label' => awe_lang('Booking Type'),
            //             'type' => 'select',
            //             'choices' => [
            //                 'day' => awe_lang('By Day'),
            //                 'hour' => awe_lang('By Hour'),
            //             ],
            //             'std' => 'day',
            //             'layout' => 'col-6 col-md-3',
            //             'break' => true,
            //             'section' => 'car_tab'
            //         ],
            //         [
            //             'id' => 'car_search_radius',
            //             'label' => awe_lang('Search Radius'),
            //             'desc' => awe_lang('Search radius to find car by lat/lng'),
            //             'type' => 'range',
            //             'layout' => 'col-12 col-md-6',
            //             'condition' => 'enable_car:is(on)',
            //             'break' => true,
            //             'section' => 'car_tab',
            //             'minlength' => 1,
            //             'std' => 25,
            //             'maxlength' => [
            //                 'max-length' => 500
            //             ]
            //         ],
            //         [
            //             'id' => 'car_top_destination',
            //             'label' => awe_lang('Top Destination'),
            //             'type' => 'list_item',
            //             'condition' => 'enable_car:is(on)',
            //             'bind_from' => 'car_top_destination_name___',
            //             'items' => [
            //                 [
            //                     'id' => 'name',
            //                     'label' => awe_lang('Destination Name'),
            //                     'type' => 'text',
            //                     'translation' => true,
            //                 ],
            //                 [
            //                     'id' => 'lat',
            //                     'label' => awe_lang('Destination Lat'),
            //                     'type' => 'text',
            //                 ],
            //                 [
            //                     'id' => 'lng',
            //                     'label' => awe_lang('Destination Lng'),
            //                     'type' => 'text',
            //                 ],
            //                 [
            //                     'id' => 'image',
            //                     'label' => awe_lang('Image'),
            //                     'type' => 'upload',
            //                 ]
            //             ],
            //             'layout' => 'col-12 col-md-6',
            //             'break' => true,
            //             'section' => 'car_tab',
            //             'translation' => true,
            //         ],
            //         [
            //             'id' => 'car_call_to_action_background',
            //             'label' => awe_lang('Call To Action Background'),
            //             'type' => 'upload',
            //             'section' => 'car_tab',
            //             'translation' => false
            //         ],
            //         [
            //             'id' => 'car_call_to_action_page',
            //             'label' => awe_lang('Call To Action Page'),
            //             'type' => 'select',
            //             'choices' => 'page',
            //             'layout' => 'col-12 col-sm-6',
            //             'style' => 'wide',
            //             'break' => true,
            //             'section' => 'car_tab'
            //         ],
            //         [
            //             'id' => 'included_car_tax',
            //             'label' => awe_lang('Tax is included?'),
            //             'desc' => awe_lang('Tax is included in the price of the product'),
            //             'type' => 'on_off',
            //             'section' => 'car_tab'
            //         ],
            //         [
            //             'id' => 'car_tax',
            //             'label' => awe_lang('Tax (%)'),
            //             'type' => 'text',
            //             'std' => '10',
            //             'layout' => 'col-12 col-md-6',
            //             'section' => 'car_tab',
            //         ],
            //     ],
            //     'section' => 'service_options'
            // ],
            // [
            //     'id' => 'payment_tabs',
            //     'label' => awe_lang('Payment Tabs'),
            //     'type' => 'payment',
            //     'layout' => 'col-12',
            //     'section' => 'payment_options'
            // ],
            // [
            //     'id' => 'enable_review',
            //     'label' => awe_lang('Enable Review'),
            //     'type' => 'on_off',
            //     'section' => 'review_options',
            //     'std' => 'on'
            // ],
            // [
            //     'id' => 'review_approval',
            //     'label' => awe_lang('Review approval'),
            //     'desc' => awe_lang('Reviews are moderated by the admin before being published'),
            //     'type' => 'on_off',
            //     'section' => 'review_options',
            //     'std' => 'on',
            //     'condition' => 'enable_review:is(on)'
            // ],
            // [
            //     'id' => 'review_after_booking',
            //     'label' => awe_lang('Review after booking'),
            //     'desc' => awe_lang('Customers are only allowed to write a review after booking'),
            //     'type' => 'on_off',
            //     'section' => 'review_options',
            //     'std' => 'off',
            //     'condition' => 'enable_review:is(on)'
            // ],
            // [
            //     'id' => 'smtp_host',
            //     'label' => awe_lang('SMTP Host'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'section' => 'email_options'
            // ],
            // [
            //     'id' => 'type_encrytion',
            //     'label' => awe_lang('Type of Encryption'),
            //     'type' => 'radio',
            //     'choices' => [
            //         'none' => 'None',
            //         'ssl' => 'SSL',
            //         'tls' => 'TLS'
            //     ],
            //     'std' => 'ssl',
            //     'section' => 'email_options'
            // ],
            // [
            //     'id' => 'smtp_port',
            //     'label' => awe_lang('SMTP Port'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'section' => 'email_options'
            // ],
            // [
            //     'id' => 'smtp_username',
            //     'label' => awe_lang('SMTP Username'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'section' => 'email_options'
            // ],
            // [
            //     'id' => 'smtp_password',
            //     'label' => awe_lang('SMTP Password'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'section' => 'email_options'
            // ],
            // // [
            // //     'id' => 'email_alert',
            // //     'label' => awe_lang('Tips'),
            // //     'desc' => awe_lang('You can send a test email to check the configuration. Go to Tools -> Advanced -> Email Checker'),
            // //     'type' => 'alert',
            // //     'style' => 'info',
            // //     'layout' => 'col-12 col-md-6',
            // //     'break' => true,
            // //     'section' => 'email_options'
            // // ],
            // [
            //     'id' => 'send_enquire_email',
            //     'label' => awe_lang('Send Enquire Email'),
            //     'type' => 'radio',
            //     'choices' => [
            //         'admin_customer' => awe_lang('Admin & Customer'),
            //         'partner_customer' => awe_lang('Partner & Customer'),
            //         'admin_partner_customer' => awe_lang('Admin, Partner & Customer')
            //     ],
            //     'std' => 'admin_partner_customer',
            //     'section' => 'email_options'
            // ],
            // [
            //     'id' => 'email_from_address',
            //     'label' => awe_lang('Email From Address'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'section' => 'email_options'
            // ],
            // [
            //     'id' => 'email_from',
            //     'label' => awe_lang('Email From Name'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'translation' => true,
            //     'section' => 'email_options'
            // ],
            // [
            //     'id' => 'email_logo',
            //     'label' => awe_lang('Email Logo'),
            //     'type' => 'upload',
            //     'layout' => 'col-12 col-md-6',
            //     'section' => 'email_options'
            // ],
            // [
            //     'id' => 'enable_partner_registration',
            //     'label' => awe_lang('Partner Registration'),
            //     'type' => 'on_off',
            //     'std' => 'on',
            //     'section' => 'partner_options'
            // ],
            // [
            //     'id' => 'partner_commission',
            //     'label' => awe_lang('Commission (%)'),
            //     'type' => 'text',
            //     'std' => 10,
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'section' => 'partner_options'
            // ],
            // // [
            // //     'id' => 'alert_payout',
            // //     'label' => awe_lang('Note:'),
            // //     // 'desc' => awe_lang("To use <strong>Payout</strong> feature. You have to setup cron-job on your hosting. <br/>Read this document to setup: <a class='ml-1' href='https://docs.awebooking.org/faqs/how-to-setup-cron-job-for-payout' target='_blank'>Read more</a>"),
            // //     'type' => 'alert',
            // //     'style' => 'warning',
            // //     'layout' => 'col-12 col-md-6',
            // //     'break' => true,
            // //     'section' => 'partner_options'
            // // ],
            // [
            //     'id' => 'payout_date',
            //     'label' => awe_lang('Payout Date'),
            //     'desc' => awe_lang('The system will automatically payout on this date'),
            //     'type' => 'select',
            //     'choices' => 'number_range:1_31',
            //     'std' => date('d'),
            //     'style' => 'wide',
            //     'layout' => 'col-12 col-md-3',
            //     'translation' => false,
            //     'section' => 'partner_options'
            // ],
            // [
            //     'id' => 'payout_time',
            //     'label' => awe_lang('Payout Time'),
            //     'desc' => awe_lang('The system will automatically payout on this time'),
            //     'type' => 'timepicker',
            //     'std' => '15:00',
            //     'layout' => 'col-12 col-md-3',
            //     'break' => true,
            //     'translation' => false,
            //     'section' => 'partner_options'
            // ],
            // [
            //     'id' => 'min_balance',
            //     'label' => awe_lang('Minimum Balance'),
            //     'desc' => awe_lang('Minimum balance for the system to process payout'),
            //     'type' => 'text',
            //     'std' => 100,
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'section' => 'partner_options'
            // ],
            // [
            //     'id' => 'account_approval',
            //     'label' => awe_lang('Account Approval'),
            //     'desc' => awe_lang('Admin reviews the account before publishing '),
            //     'type' => 'on_off',
            //     'std' => 'off',
            //     'section' => 'registration'
            // ],
            // [
            //     'id' => 'facebook_login',
            //     'label' => awe_lang('Facebook Login'),
            //     'type' => 'on_off',
            //     'std' => 'off',
            //     'section' => 'registration'
            // ],
            // [
            //     'id' => 'facebook_api',
            //     'label' => awe_lang('Facebook API'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-3',
            //     'condition' => 'facebook_login:is(on)',
            //     'section' => 'registration'
            // ],
            // [
            //     'id' => 'facebook_secret',
            //     'label' => awe_lang('Facebook Secret'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-3',
            //     'break' => true,
            //     'condition' => 'facebook_login:is(on)',
            //     'section' => 'registration'
            // ],
            // [
            //     'id' => 'google_login',
            //     'label' => awe_lang('Google Login'),
            //     'type' => 'on_off',
            //     'std' => 'off',
            //     'section' => 'registration'
            // ],
            // [
            //     'id' => 'google_client_id',
            //     'label' => awe_lang('Google Client ID'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-3',
            //     'condition' => 'google_login:is(on)',
            //     'section' => 'registration'
            // ],
            // [
            //     'id' => 'google_client_secret',
            //     'label' => awe_lang('Google Client Secret'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-3',
            //     'break' => true,
            //     'condition' => 'google_login:is(on)',
            //     'section' => 'registration'
            // ],
            // [
            //     'id' => 'become_a_host_background',
            //     'label' => awe_lang('Become-a-host Background'),
            //     'type' => 'upload',
            //     'section' => 'page_options'
            // ],
            // [
            //     'id' => 'become_a_host_background_footer',
            //     'label' => awe_lang('Become-a-host Footer Background'),
            //     'type' => 'upload',
            //     'section' => 'page_options'
            // ],
            // [
            //     'id' => 'become_a_host_features',
            //     'label' => awe_lang('Become-a-host Features'),
            //     'type' => 'list_item',
            //     'bind_from' => 'become_a_host_features_title__',
            //     'items' => [
            //         [
            //             'id' => 'title',
            //             'label' => awe_lang('Title'),
            //             'type' => 'text',
            //             'translation' => true,
            //         ],
            //         [
            //             'id' => 'detail',
            //             'label' => awe_lang('Detail'),
            //             'type' => 'textarea',
            //             'translation' => true,
            //         ],
            //         [
            //             'id' => 'image',
            //             'label' => awe_lang('Image'),
            //             'type' => 'upload',
            //         ]
            //     ],
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'translation' => true,
            //     'section' => 'page_options'
            // ],
            // [
            //     'id' => 'coming_soon_date',
            //     'label' => awe_lang('Coming Soon Date'),
            //     'type' => 'datepicker',
            //     'layout' => 'col-12 col-md-3',
            //     'section' => 'page_options'
            // ],
            // [
            //     'id' => 'coming_soon_background',
            //     'label' => awe_lang('Coming Soon Background'),
            //     'type' => 'upload',
            //     'section' => 'page_options'
            // ],
            //Footer
            [
                'id' => 'footer_logo',
                'label' => awe_lang('Logo Footer'),
                'type' => 'upload',
                'section' => 'footer_options'
            ],
            // [
            //     'id' => 'list_social',
            //     'label' => awe_lang('List Social'),
            //     'type' => 'list_item',
            //     'bind_from' => 'list_social_social_name___',
            //     'translation' => true,
            //     'items' => [
            //         [
            //             'id' => 'social_name',
            //             'label' => awe_lang('Name'),
            //             'type' => 'text',
            //             'translation' => true,
            //         ],
            //         [
            //             'id' => 'social_icon',
            //             'label' => awe_lang('Icon'),
            //             'type' => 'icon',
            //         ],
            //         [
            //             'id' => 'social_link',
            //             'label' => awe_lang('Link'),
            //             'type' => 'text',
            //         ]
            //     ],
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'section' => 'footer_options'
            // ],
            // [
            //     'id' => 'footer_menu1_label',
            //     'label' => awe_lang('First menu label'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-3',
            //     'break' => false,
            //     'translation' => true,
            //     'section' => 'footer_options'
            // ],
            // [
            //     'id' => 'footer_menu1',
            //     'label' => awe_lang('First menu'),
            //     'type' => 'select',
            //     'style' => 'wide',
            //     'choices' => 'nav',
            //     'section' => 'footer_options',
            //     'break' => true,
            //     'layout' => 'col-12 col-md-3',
            // ],
            // [
            //     'id' => 'footer_menu2_label',
            //     'label' => awe_lang('Second menu label'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-3',
            //     'break' => false,
            //     'translation' => true,
            //     'section' => 'footer_options'
            // ],
            // [
            //     'id' => 'footer_menu2',
            //     'label' => awe_lang('Second menu'),
            //     'type' => 'select',
            //     'style' => 'wide',
            //     'choices' => 'nav',
            //     'section' => 'footer_options',
            //     'break' => true,
            //     'layout' => 'col-12 col-md-3',
            // ],
            // [
            //     'id' => 'footer_subscribe_label',
            //     'label' => awe_lang('Subscribe label'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'translation' => true,
            //     'section' => 'footer_options'
            // ],
            // [
            //     'id' => 'footer_subscribe_description',
            //     'label' => awe_lang('Subscribe description'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'translation' => true,
            //     'section' => 'footer_options'
            // ],
            // [
            //     'id' => 'copy_right',
            //     'label' => awe_lang('Copy right text'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'translation' => true,
            //     'section' => 'footer_options'
            // ],
            // //End footer
            // [
            //     'id' => 'ical_heading',
            //     'label' => awe_lang('Automatically sync every'),
            //     'desc' => awe_lang('Example: Automatically sync every 1 hour 30 minutes'),
            //     'type' => 'heading',
            //     'section' => 'ical_options'
            // ],
            // [
            //     'id' => 'ical_time_type',
            //     'label' => awe_lang('Type'),
            //     'type' => 'select',
            //     'choices' => [
            //         'hour' => awe_lang('Hour'),
            //         'minute' => awe_lang('Minute'),
            //     ],
            //     'std' => 'hour',
            //     'layout' => 'col-6 col-md-3',
            //     'section' => 'ical_options'
            // ],
            // [
            //     'id' => 'ical_hour',
            //     'label' => awe_lang('Hour'),
            //     'type' => 'select',
            //     'choices' => 'number_range:1_12',
            //     'layout' => 'col-6 col-md-3',
            //     'std' => 1,
            //     'section' => 'ical_options',
            //     'condition' => 'ical_time_type:is(hour)'
            // ],
            // [
            //     'id' => 'ical_minute',
            //     'label' => awe_lang('Minutes'),
            //     'type' => 'select',
            //     'choices' => 'number_range:1_30',
            //     'layout' => 'col-6 col-md-3',
            //     'std' => 30,
            //     'break' => true,
            //     'section' => 'ical_options',
            //     'condition' => 'ical_time_type:is(minute)'
            // ],
            // [
            //     'id' => 'ical_alert',
            //     'type' => 'alert',
            //     'label' => awe_lang('Warning'),
            //     'style' => 'warning',
            //     'desc' => awe_lang('This feature needs to be installed on Cron-job on your server.<br/>Read more: <a target="_blank" href="https://docs.awebooking.org/faqs/how-to-setup-cron-job-for-ical-sync">How to setup Cron-job for Ical Sync</a>'),
            //     'section' => 'ical_options'
            // ],
            [
                'id' => 'site_language',
                'label' => awe_lang('Site Language'),
                'type' => 'select',
                'choices' => 'language',
                'layout' => 'col-12 col-12 col-md-6',
                'style' => 'wide',
                'break' => true,
                'section' => 'advance_options'
            ],
            // [
            //     'id' => 'right_to_left',
            //     'label' => awe_lang('Right to Left'),
            //     'type' => 'on_off',
            //     'std' => 'off',
            //     'break' => true,
            //     'section' => 'advance_options'
            // ],
            [
                'id' => 'dark_mode',
                'label' => awe_lang('Enable Dark Mode'),
                'type' => 'on_off',
                'std' => 'off',
                'section' => 'advance_options',
            ],
            [
                'id' => 'multi_language',
                'label' => awe_lang('Enable multi language'),
                'type' => 'on_off',
                'std' => 'off',
                'section' => 'advance_options',
            ],
            // [
            //     'id' => 'optimize_site',
            //     'label' => awe_lang('Optimize Site'),
            //     'desc' => awe_lang('This feature allows you to compress html, cache queries'),
            //     'type' => 'on_off',
            //     'std' => 'off',
            //     'section' => 'advance_options',
            // ],
            [
                'id' => 'enable_lazyload',
                'label' => awe_lang('Enable Lazy Load'),
                'desc' => awe_lang('Elements will be loaded when scroll'),
                'type' => 'on_off',
                'std' => 'off',
                'section' => 'advance_options',
            ],
            [
                'id' => 'unit_of_measure',
                'label' => awe_lang('Unit Of Measure'),
                'type' => 'select',
                'choices' => [
                    'm2' => 'm2',
                    'ft2' => 'ft2'
                ],
                'std' => 'm2',
                'layout' => 'col-12 col-md-6',
                'style' => 'wide',
                'break' => true,
                'section' => 'advance_options'
            ],
            // [
            //     'id' => 'mailchimp_api_key',
            //     'label' => awe_lang('MailChimp API Key'),
            //     'desc' => awe_lang('This key to connect to MailChimp.'),
            //     'type' => 'text',
            //     'layout' => 'col-6 col-md-3',
            //     'section' => 'advance_options'
            // ],
            // [
            //     'id' => 'mailchimp_list',
            //     'label' => awe_lang('MailChimp List ID'),
            //     'desc' => awe_lang('The ID of the list you want to add the user to'),
            //     'type' => 'text',
            //     'layout' => 'col-6 col-md-3',
            //     'break' => true,
            //     'section' => 'advance_options'
            // ],
            // [
            //     'id' => 'mapbox_key',
            //     'label' => awe_lang('Mapbox Key'),
            //     'desc' => awe_lang('Use this key to enable Mapbox map'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'section' => 'advance_options'
            // ],
            // [
            //     'id' => 'google_font_key',
            //     'label' => awe_lang('Google Font Key'),
            //     'desc' => awe_lang('Use this key to get Google Fonts'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-6',
            //     'break' => true,
            //     'section' => 'advance_options'
            // ],
            // [
            //     'id' => 'use_google_captcha',
            //     'label' => awe_lang('Use Google Captcha?'),
            //     'desc' => awe_lang('Use Google Captcha for checkout form, review form, contact us form, ...'),
            //     'type' => 'on_off',
            //     'section' => 'advance_options',
            // ],
            // [
            //     'id' => 'google_captcha_site_key',
            //     'label' => awe_lang('Google Captcha Key'),
            //     'type' => 'text',
            //     'condition' => 'use_google_captcha:is(on)',
            //     'layout' => 'col-6 col-md-3',
            //     'section' => 'advance_options'
            // ],
            // [
            //     'id' => 'google_captcha_secret_key',
            //     'label' => awe_lang('Google Captcha Secret'),
            //     'type' => 'text',
            //     'condition' => 'use_google_captcha:is(on)',
            //     'layout' => 'col-6 col-md-3',
            //     'break' => true,
            //     'section' => 'advance_options'
            // ],
            // [
            //     'id' => 'enable_gdpr',
            //     'label' => awe_lang('Enable GDPR Cookie'),
            //     'type' => 'on_off',
            //     'std' => 'off',
            //     'section' => 'advance_options'
            // ],
            // [
            //     'id' => 'gdpr_page',
            //     'label' => awe_lang('GDPR Statement Page'),
            //     'type' => 'select',
            //     'choices' => 'page',
            //     'layout' => 'col-12 col-md-3',
            //     'break' => true,
            //     'condition' => 'enable_gdpr:is(on)',
            //     'section' => 'advance_options'
            // ],
            // [
            //     'id' => 'user_admin',
            //     'label' => awe_lang('Admin User'),
            //     'desc' => awe_lang('Choose an account to set as Administrator'),
            //     'type' => 'select',
            //     'style' => 'wide',
            //     'choices' => 'user:administrator',
            //     'section' => 'advance_options',
            //     'break' => true,
            //     'layout' => 'col-12 col-md-6',
            // ],
            // [
            //     'id' => 'featured_text',
            //     'label' => awe_lang('Featured Label'),
            //     'desc' => awe_lang('Setup featured label for home featured item'),
            //     'type' => 'text',
            //     'layout' => 'col-12 col-md-6',
            //     'std' => 'Featured',
            //     'translation' => true,
            //     'break' => true,
            //     'section' => 'advance_options'
            // ],
            // [
            //     'id' => 'use_ssl',
            //     'label' => awe_lang('Enable SSL'),
            //     'desc' => awe_lang('The page needs to reload to be applied'),
            //     'type' => 'on_off',
            //     'section' => 'advance_options'
            // ],
            // [
            //     'id' => 'enable_seo',
            //     'label' => awe_lang('Enable SEO Tools'),
            //     'desc' => awe_lang('Customize content for search engines '),
            //     'type' => 'on_off',
            //     'std' => 'off',
            //     'section' => 'advance_options'
            // ],
            [
                'id' => 'timezone',
                'label' => awe_lang('Time Zone'),
                'type' => 'select2',
                'choices' => get_time_zone(),
                'choice_group' => true,
                'std' => 'Europe/London',
                'layout' => 'col-12 col-md-6',
                'break' => true,
                'section' => 'advance_options'
            ],
            [
                'id' => 'time_format',
                'label' => awe_lang('Time Format'),
                'desc' => awe_lang('Change time format'),
                'type' => 'text',
                'std' => 'h:i A',
                'choice_group' => true,
                'layout' => 'col-12 col-md-6',
                'section' => 'advance_options'
            ],
            [
                'id' => 'date_format',
                'label' => awe_lang('Date Format'),
                'desc' => awe_lang('Change date format'),
                'type' => 'text',
                'std' => 'm-d-Y',
                'choice_group' => true,
                'break' => true,
                'layout' => 'col-12 col-md-6',
                'section' => 'advance_options'
            ],
            [
                'id' => 'affiliates_tabs',
                'label' => awe_lang('Affiliates Tabs'),
                'type' => 'tab',
                'tab_title' => [],
                'tab_content' => [],
                'section' => 'affiliate_options'
            ]
        ]
    ],
];
