<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAds extends Model
{
    use HasFactory;
    public function getTypeName($type)
    {

        $Activity = Activitie::where('section_id', $type)->get();
        $myvar =  [
            '1' => [
                [
                    'id' => 'Choose_type_contract',
                    'label' => __('backend.Type of Contract'),
                    'type' => 'select',
                    'choices' => 'page',
                    'name' => 'contractType',
                    'class' => 'col-md-6 mb-3',
                    'layout' => 'col-12 col-md-6',
                    'style' => 'wide',
                    'style' => 'padding: 9px 20px;font-size: 14px;',
                    'choices' =>  [
                        [
                            'option' =>  __('backend.from the owner'),
                            'value' =>  __('backend.from the owner')
                        ],
                        [
                            'option' =>  __('backend.from the executor'),
                            'value' =>  __('backend.from the executor')
                        ],
                        [
                            'option' =>  __('backend.Solidarity Contract'),
                            'value' =>  __('backend.Solidarity Contract')
                        ],
                    ]

                ],
                // [
                //     'id' => 'Pricing_with_materials',
                //     'label' => __('backend.Pricing with materials'),
                //     'name' => 'PricingWithMaterials',
                //     'type' => 'on_off',
                //     'class' => 'col-md-4',
                //     'std' => 'off',

                // ],


                //     [
                //         'id' => 'Classification_is_required',
                //         'label' => __('backend.Classification is required'),
                //         'name' => 'Classification',
                //         'type' => 'on_off',
                //         'class' => 'col-md-4',
                //         'std' => 'off',
                //     ],

                //     [
                //         'id' => 'Category_Category',
                //         'label' => __('backend.Category Category'),
                //         'name' => 'Category_Category',
                //         'type' => 'text',
                //         'class' => 'col-md-4',
                //         'style' => 'height:32px',
                //         'hidden' => 'hidden'

                //     ],

                //     [
                //         'id' => 'CodeKSA',
                //         'label' => __('backend.code ksa'),
                //         'name' => 'CodeKSA',
                //         'type' => 'on_off',
                //         'class' => 'col-md-4 mt-3',
                //         'std' => 'off',
                //     ],

                //     [
                //         'id' => 'Building_Category',
                //         'label' => __('backend.Building Category'),
                //         'name' => 'Building_Category',
                //         'type' => 'on_off',
                //         'class' => 'col-md-4',
                //         'std' => 'off',
                //     ],

                //     [
                //         'id' => 'Building_Category_choices',
                //         'label' => __('backend.select Building Category'),
                //         'name' => 'Building_Category_choices',
                //         'type' => 'radio',
                //         'class' => 'col-md-4',

                //         'hidden' => 'hidden',
                //         'choices' => [
                //             'a' => __('A'),
                //             'b' => __('B'),
                //             'c' => __('c')
                //         ],
                //     ],


                // [
                //     'h3' => __('backend.Do you provide this on the site?'),
                //     'id' => 'accommodation_available',
                //     'label' => __('backend.Is there accommodation?'),
                //     'name' => 'accommodation',
                //     'type' => 'on_off',
                //     'class' => 'col-md-4',
                //     'std' => 'off',
                // ],
                // [
                //     'id' => 'electricity_available',
                //     'label' => __('backend.Is there electricity?'),
                //     'name' => 'electricity',
                //     'type' => 'on_off',
                //     'class' => 'col-md-4',
                //     'std' => 'off',
                // ],
                // [
                //     'id' => 'transportation_available',
                //     'label' => __('backend.Is transportation available?'),
                //     'name' => 'transportation',
                //     'type' => 'on_off',
                //     'class' => 'col-md-4',
                //     'std' => 'off',
                // ],

                // [
                //     'type' => 'oo',
                // ],

            ],
            '5' => [

                // [
                //     'id' => 'Choose_material',
                //     'label' => __('backend.Choose material'),
                //     'type' => 'select',
                //     'choices' => 'page',
                //     'name' => 'materialType',
                //     'layout' => 'col-12 col-sm-6',
                //     'style' => 'wide',
                //     'choices' => 
                //     self::getSelectOption('MaterialType')

                // ],
                [
                    'id' => 'deals_or_auction',
                    'label' => __('backend.select please'),
                    'name' => 'dealsOrAuction',
                    'type' => 'radio',
                    'class' => 'col-md-6',
                    'choices' => [
                        'deals' => __('backend.Deals'),
                        'auction' => __('backend.auction')
                    ],
                ],
                [
                    'id' => 'country_of_manufacture',
                    'label' => __('backend.country of manufacture'),
                    'name' => 'countryManufacture',
                    'type' => 'text',
                    'layout' => 'col-12 col-md-6'
                ],
                [
                    'id' => 'Required_warranty_period',
                    'label' => __('backend.Required warranty period'),
                    'name' => 'warrantyPeriod',
                    'type' => 'number',
                    'layout' => 'col-12 col-md-6'
                ],
                [
                    'id' => 'Count',
                    'label' => __('backend.Count'),
                    'name' => 'Count',
                    'type' => 'text',
                    'class' => 'col-12 col-md-6'
                ],


                [
                    'id' => 'status_materials',
                    'label' => __('backend.status materials'),
                    'name' => 'materialStatus',
                    'type' => 'radio',
                    'style' => 'border: 1px solid #ced4da;border-radius: 30px;margin-bottom: 25px;padding: 10px 30px 5px 30px;',
                    'class' => 'col-md-6',
                    'choices' => [
                        'new' => __('backend.new'),
                        'old' => __('backend.old')
                    ],
                ],
                [
                    'id' => 'Choose_type_contract',
                    'label' => __('backend.Type of Contract'),
                    'type' => 'select',
                    'choices' => 'page',
                    'name' => 'contractType',
                    'class' => 'col-md-6 mb-3',
                    'layout' => 'col-12 col-md-6',
                    'style' => 'wide',
                    'style' => 'padding: 9px 20px;font-size: 14px;',
                    'choices' =>  [
                        [
                            'option' =>  __('backend.from the owner'),
                            'value' =>  __('backend.from the owner')
                        ],
                        [
                            'option' =>  __('backend.from the executor'),
                            'value' =>  __('backend.from the executor')
                        ],
                        [
                            'option' =>  __('backend.Solidarity Contract'),
                            'value' =>  __('backend.Solidarity Contract')
                        ],
                    ]

                ],
                [
                    'type' => 'oo',
                ],

            ],
            '2' => [

                // [
                //     'id' => 'Choose_material',
                //     'label' => __('backend.Choose material'),
                //     'type' => 'select',
                //     'choices' => 'page',
                //     'name' => 'materialType',
                //     'layout' => 'col-12 col-sm-6',
                //     'style' => 'wide',
                //     'choices' => 
                //     self::getSelectOption('MaterialType')

                // ],
                [
                    'id' => 'country_of_manufacture',
                    'label' => __('backend.country of manufacture'),
                    'name' => 'countryManufacture',
                    'type' => 'text',
                    'layout' => 'col-12 col-md-6'
                ],
                [
                    'id' => 'Required_warranty_period',
                    'label' => __('backend.Required warranty period'),
                    'name' => 'warrantyPeriod',
                    'type' => 'number',
                    'layout' => 'col-12 col-md-6'
                ],
                [
                    'id' => 'Available',
                    'label' => __('backend.Available'),
                    'name' => 'Available',
                    'type' => 'radio',
                    'class' => 'col-md-6',
                    'choices' => [
                        'required' => __('backend.required'),
                        'Available' => __('backend.Available')
                    ],
                ],
                [
                    'id' => 'quantity',
                    'label' => __('backend.Quantity'),
                    'name' => 'quantityMaterial',
                    'type' => 'number',
                    'class' => 'col-md-6',
                    'layout' => 'col-12 col-md-6'
                ],
                [
                    'id' => 'Choose_type_contract',
                    'label' => __('backend.Type of Contract'),
                    'type' => 'select',
                    'choices' => 'page',
                    'name' => 'contractType',
                    'class' => 'col-md-6 mb-3',
                    'layout' => 'col-12 col-md-6',
                    'style' => 'wide',
                    'style' => 'padding: 9px 20px;font-size: 14px;',
                    'choices' =>  [
                        [
                            'option' =>  __('backend.from the owner'),
                            'value' =>  __('backend.from the owner')
                        ],
                        [
                            'option' =>  __('backend.from the executor'),
                            'value' =>  __('backend.from the executor')
                        ],
                        [
                            'option' =>  __('backend.Solidarity Contract'),
                            'value' =>  __('backend.Solidarity Contract')
                        ],
                    ]

                ],
                [
                    'type' => 'oo',
                ],


            ],
            '3' => [
                [
                    'id' => 'Available',
                    'label' => __('backend.Available'),
                    'name' => 'Available',
                    'type' => 'radio',
                    'class' => 'col-md-6',
                    'choices' => [
                        'required' => __('backend.required'),
                        'Available' => __('backend.Available')
                    ],
                ],
                [
                    'id' => 'quantity',
                    'label' => __('backend.Quantity'),
                    'name' => 'quantityMaterial',
                    'type' => 'number',
                    'class' => 'col-md-6',
                    'layout' => 'col-12 col-md-6'
                ],
                [
                    'id' => 'country_of_manufacture',
                    'label' => __('backend.country of manufacture'),
                    'name' => 'countryManufacture',
                    'type' => 'text',
                    'layout' => 'col-12 col-md-6'
                ],
                [
                    'id' => 'Required_warranty_period',
                    'label' => __('backend.Required warranty period'),
                    'name' => 'warrantyPeriod',
                    'type' => 'number',
                    'layout' => 'col-12 col-md-6'
                ],
                [
                    'id' => 'Choose_type_contract',
                    'label' => __('backend.Type of Contract'),
                    'type' => 'select',
                    'choices' => 'page',
                    'name' => 'contractType',
                    'class' => 'col-md-6 mb-3',
                    'layout' => 'col-12 col-md-6',
                    'style' => 'wide',
                    'style' => 'padding: 9px 20px;font-size: 14px;',
                    'choices' =>  [
                        [
                            'option' =>  __('backend.from the owner'),
                            'value' =>  __('backend.from the owner')
                        ],
                        [
                            'option' =>  __('backend.from the executor'),
                            'value' =>  __('backend.from the executor')
                        ],
                        [
                            'option' =>  __('backend.Solidarity Contract'),
                            'value' =>  __('backend.Solidarity Contract')
                        ],
                    ]

                ],
                [
                    'type' => 'oo',
                ],




            ],
            '4' => [

                // [
                //     'id' => 'Choose_category',
                //     'label' => __('backend.Choose Category'),
                //     'type' => 'select',
                //     'choices' => 'page',
                //     'name' => 'CategoryEquipment',
                //     'layout' => 'col-12 col-sm-6',
                //     'style' => 'wide',
                //     'multiple' => 'multiple',
                //     'choices' => 
                //     self::getSelectOption('MaterialType')

                // ],

                [
                    'id' => 'status_equipment',
                    'label' => __('backend.status equipment'),
                    'name' => 'equipmentStatus',
                    'type' => 'radio',
                    'class' => 'col-md-4',
                    'choices' => [
                        'new' => __('backend.new'),
                        'old' => __('backend.old')
                    ],
                ],

                // [
                //     'id' => 'file_equipment',
                //     'label' => __('backend.file equipment'),
                //     'name' => 'file_equipment',
                //     'type' => 'file',
                // ],

                [
                    'id' => 'quantity',
                    'label' => __('backend.quantity equipment'),
                    'name' => 'quantityEquipment',
                    'type' => 'number',
                    'placeholder' => __('backend.quantity equipment'),
                    'class' => 'col-md-3 quantity',
                    'layout' => 'col-12 col-md-4'
                ],
                [
                    'id' => 'Receiving_orders',
                    'label' => __('backend.Receiving orders'),
                    'name' => 'ReceivingOrders',
                    'type' => 'checkbox',
                    'class' => 'col-md-5',
                    'choices' => [
                        [
                            'label' => __('backend.Individuals'),
                            
                        ],
                        [
                            'label' => __('backend.Institutions'),
                           
                        ]
                        
                    ],
                ],

                [
                    'id' => 'Choose_type',
                    'label' => __('backend.request type'),
                    'type' => 'select',
                    'choices' => 'page',
                    'name' => 'requestType',
                    'class' => 'col-md-6',
                    'layout' => 'col-12 col-md-6',
                    'style' => 'wide',
                    'style' => 'padding: 9px 20px;font-size: 14px;',
                    'choices' =>  [
                        [
                            'option' =>  __('backend.Leasing'),
                            'value' =>  __('backend.Leasing')
                        ],
                        [
                            'option' =>   __('backend.Buy'),
                            'value' =>  __('backend.Buy')
                        ],
                        [
                            'option' =>  __('backend.daily'),
                            'value' =>  __('backend.daily')
                        ],
                        [
                            'option' =>   __('backend.cooperative contract'),
                            'value' =>  __('backend.cooperative contract')
                        ],
                    ]

                ],

                [
                    'id' => 'Choose_type_contract',
                    'label' => __('backend.Type of Contract'),
                    'type' => 'select',
                    'choices' => 'page',
                    'name' => 'contractType',
                    'class' => 'col-md-6',
                    'layout' => 'col-12 col-md-6',
                    'style' => 'wide',
                    'style' => 'padding: 9px 20px;font-size: 14px;',
                    'choices' =>  [
                        [
                            'option' =>  __('backend.from the owner'),
                            'value' =>  __('backend.from the owner')
                        ],
                        [
                            'option' =>  __('backend.from the executor'),
                            'value' =>  __('backend.from the executor')
                        ],
                        [
                            'option' =>  __('backend.Solidarity Contract'),
                            'value' =>  __('backend.Solidarity Contract')
                        ],
                    ]

                ],
                // [
                //     'id' => 'Receiving_orders',
                //     'label' => __('backend.Receiving orders'),
                //     'name' => 'ReceivingOrders',
                //     'type' => 'radio',
                //     'class' => 'col-md-6 mt-3',
                //     'choices' => [
                //         'Individuals' => __('backend.Individuals'),
                //         'Institutions' => __('backend.Institutions'),
                //         'Both' => __('backend.Both')
                //     ],
                // ],
                [
                    'type' => 'oo',
                ],

            ],
            '6' => [
                // [
                //     'id' => 'Type_Employment',
                //     'label' => __('backend.Choose Type Employment'),
                //     'type' => 'select',
                //     'choices' => 'page',
                //     'name' => 'TypeEmployment',
                //     'layout' => 'col-12 col-sm-6',
                //     'style' => 'wide',
                //     'choices' => 
                //     self::getSelectOption('TypeEmployment')

                // ],

                // [
                //     'id' => 'salary_on_off',
                //     'label' => __('backend.salary on off'),
                //     'name' => 'salary_on_off',
                //     'type' => 'on_off',
                //     'std' => 'off',
                //     'class' => 'col-md-4',
                // ],

                // [
                //     'id' => 'salary',
                //     'label' => __('backend.salary'),
                //     'name' => 'salary',
                //     'type' => 'number',
                //     'class' => 'col-md-4',
                //     'layout' => 'col-12 col-md-6'
                // ],

                // [
                //     'id' => 'Submission_deadline',
                //     'label' => __('backend.Submission deadline'),
                //     'name' => 'Submission_deadline',
                //     'type' => 'date',
                //     'class' => 'col-md-4',
                //     'layout' => 'col-12 col-md-6'
                // ],
                [
                    'id' => 'work_hours',
                    'label' => __('backend.work hours'),
                    'name' => 'work_hours',
                    'type' => 'radio',
                    'class' => 'col-md-6',
                    'style' => 'border: 1px solid #ced4da;border-radius: 30px;margin-bottom: 25px;padding: 10px 30px 5px 30px;',
                    'choices' => [
                        'required' => __('backend.Full-time'),
                        'Available' => __('backend.part time')
                    ],
                ],

                [
                    'type' => 'oo',
                ],

            ],
            '7' => [
                [
                    'id' => 'Choose_type_contract',
                    'label' => __('backend.Type of Contract'),
                    'type' => 'select',
                    'choices' => 'page',
                    'name' => 'contractType',
                    'class' => 'col-md-6 mb-3',
                    'layout' => 'col-12 col-md-6',
                    'style' => 'wide',
                    'style' => 'padding: 9px 20px;font-size: 14px;',
                    'choices' =>  [
                        [
                            'option' =>  __('backend.from the owner'),
                            'value' =>  __('backend.from the owner')
                        ],
                        [
                            'option' =>  __('backend.from the executor'),
                            'value' =>  __('backend.from the executor')
                        ],
                        [
                            'option' =>  __('backend.Solidarity Contract'),
                            'value' =>  __('backend.Solidarity Contract')
                        ],
                    ]

                ],
            ]


        ];
        return [$myvar[$type], $Activity];
    }

    public function getSelectOption($model)
    {

        $modelName = 'App\\Models\\' . $model;
        $item = new $modelName;
        $array;
        foreach ($item->all() as $key => $value) {
            $array[]  = [
                'option' =>  $value->name,
                'value' =>  $value->id
            ];
        }
        return  $array;
    }

    public function getActivity($section)
    {

        $modelName = App\Models\Activity::where('section', $section)->get();
        $modelName;
    }
}
