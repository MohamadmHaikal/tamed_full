<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Option;
use Illuminate\Http\Request;
use Sentinel;

class OptionController extends Controller
{
    private $settings_value = [];

    public function _getAvailabilityTimeSlot(Request $request)
    {
        $service_type = request()->get('service_type', 'home');

        $func = '_' . $service_type . '_availability_time_slot';
        return $this->sendJson([
            'status' => 1,
            'html' => $this->$func()
        ]);
    }

   
    public function _getInventory(Request $request)
    {
        $service_type = request()->get('service_type', 'home');
        $func = '_' . $service_type . '_inventory';
        $events = $this->$func();

        return $this->sendJson($events);
    }

    


    public function _saveQuickSetting(Request $request)
    {
        $option = new Option();
        $hasOption = $option->getOption(\ThemeOptions::getOptionID());
        $optionValue = (!is_null($hasOption)) ? unserialize($hasOption->option_value) : [];
        $all_fields = request()->get('all_fields');
        $all_fields = json_decode(base64_decode($all_fields), true);
        if ($all_fields && is_array($all_fields)) {
            foreach ($all_fields as $field) {
                $value = \ThemeOptions::fetchField($field);
                if (!empty($value)) {
                    $optionValue[$field['id']] = $value;
                } else {
                    if (isset($optionValue[$field['id']])) {
                        unset($optionValue[$field['id']]);
                    }
                }
            }
        }
        $optionValue = serialize($optionValue);
        if ($hasOption) {
            $option->updateOption(\ThemeOptions::getOptionID(), $optionValue);
        } else {
            $option->createOption(\ThemeOptions::getOptionID(), $optionValue);
        }

        return $this->sendJson([
            'status' => 1,
            'message' => __('Updated successfully')
        ]);
    }

    public function _saveSetting(Request $request)
    {
        $fields = request()->get('currentOptions', '');
        $fields = unserialize(base64_decode($fields));
        if ($fields) {
            $option = new Option();
            $hasOption = $option->getOption(\ThemeOptions::getOptionID());
            $optionValue = (!is_null($hasOption)) ? unserialize($hasOption->option_value) : [];
            foreach ($fields as $field) {
                $field = \ThemeOptions::mergeField($field);
                
                    $value = \ThemeOptions::fetchField($field);
                    $optionValue[$field['id']] = $value;
                
            }
            $optionValue = serialize($optionValue);
            if ($hasOption) {
                $updated = $option->updateOption(\ThemeOptions::getOptionID(), $optionValue);
            } else {
                $updated = $option->createOption(\ThemeOptions::getOptionID(), $optionValue);
            }
            if (!is_null($updated)) {
                return $this->sendJson([
                    'status' => 1,
                    'message' => view('common.alert', ['message' => __('Saved successfully'), 'type' => 'success'])->render(),
            
                ]);
               
            }
        }
        return $this->sendJson([
            'status' => 0,
            'message' => view('common.alert', ['message' => __('Have error when saving data'), 'type' => 'danger'])->render(),
    
        ]);
        
    }

    // private function renderSettingsValue($type, $data)
    // {
    //     $name = $data['id'];
    //     switch ($type) {
    //         case 'list_item':
    //             $post_data = request()->get($name, '');
    //             $arr_item = [];
    //             if (!empty($data['items'])) {
    //                 foreach ($data['items'] as $k => $v) {
    //                     array_push($arr_item, $v['id']);
    //                 }
    //             }

    //             if (!empty($post_data[$arr_item[0]])) {
    //                 foreach ($post_data[$arr_item[0]] as $k => $v) {
    //                     for ($j = 0; $j < count($arr_item); $j++) {
    //                         if ($j == 0) {
    //                             if (isset($arr_item[$j])) {
    //                                 $arr[$k][$arr_item[$j]] = $v;
    //                             }
    //                         } else {
    //                             if (isset($post_data[$arr_item[$j]])) {
    //                                 $arr[$k][$arr_item[$j]] = $post_data[$arr_item[$j]][$k];
    //                             }
    //                         }
    //                     }
    //                 }
    //             }

    //             $this->settings_value[$name] = $arr;
    //             break;
    //         default:
    //             $post_data = request()->get($name, '');
    //             $this->settings_value[$name] = $post_data;
    //             break;
    //     }
    // }

    public function _getSetting()
    {
        $folder = $this->getFolder();
        return view("dashboard.Settings", ['role' => $folder, 'bodyClass' => 'hh-dashboard']);
    }

    public function _getListItem(Request $request)
    {
        return \ThemeOptions::getListItem($request);
    }

}
