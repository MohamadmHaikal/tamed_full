<?php

use App\Models\Activitie;
use App\Models\Ads;
use App\Models\City;
use App\Models\Neighborhood;
use App\Models\File;
use App\Models\invoice;
use App\Models\User;
use App\Models\Products;
use App\Models\Permit;
use App\Models\Quote;
use App\Models\UserType;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

function get_ads_quotes_count($id)
{
    $quotes = Quote::where('ads_id', '=', $id)->get();
    if ($quotes != null) {
        return $quotes->count();
    }
    return 0;
}

function get_permits_count($id)
{
    $Permit = Permit::where('ads_id', '=', $id)->get();
    if ($Permit != null) {
        return $Permit->count();
    }
    return 0;
}

function get_Signed_ads($id){
    $quotes = Quote::where('ads_id', '=', $id)->where('status','=','accepted')->get();
  
    if ($quotes->count() != 0) {
       return 0;
    }
    return 1;
}
function time_elapsed_string($datetime, $full = false)
{
    date_default_timezone_set("Asia/Riyadh");

    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    // dd($now, $ago);


    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    $string = array(
        'y' => 'سنة',
        'm' => 'شهر',
        'w' => 'أسبوع',
        'd' => 'يوم',
        'h' => 'ساعة',
        'i' => 'دقيقة',
        's' => 'ثانية',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? ' منذ ' . implode(', ', $string) : 'الآن';
}
function parse_request($request, $keys)
{
    $return = [];
    foreach ($keys as $key) {
        $return[$key] = $request->get($key);
    }

    return $return;
}
function getActivityById($id)
{
    return Activitie::where('id', '=', $id)->first();
}
function getCityById($id)
{
    return City::where('id', '=', $id)->first();
}
function getNeighborhoodById($id)
{
    return Neighborhood::where('id', '=', $id)->first();
}
function getUserAddressByNeighborhoo($user)
{
    $neigh = $user->neighborhood;
    $city = City::find($user->city_id);
    if($city!=null){ $city= $city->name;}
    return 'المملكة العربية السعودية' . ' , ' . $city . ' , ' . $neigh;
}
function getUserBymobile($id)
{
    $user = User::where('phone','!=',null)->where('phone', $id)->first();
  
    return ($user == null) ? null : $user->id;
}
function getQuotesFile($id)
{
    $file = File::where('FK', '=', $id)->where('model', '=', 'quotes')->first();
    if ($file != null) {
        $file = $file->file;
    } else {
        $file = '';
    }
    return $file;
}
function getEmploymentFile($id)
{
    $file = File::where('FK', '=', $id)->where('model', '=', 'EmploymentApplications')->first();
    if ($file != null) {
        $file = $file->file;
    } else {
        $file = '';
    }
    return $file;
}
function is_dashboard()
{
    $route = Route::current();
    $prefix = $route->getPrefix();

    return !!str_replace('/', '', $prefix) == Config::get('awebooking.prefix_dashboard');
}

function getActivityItem()
{
    $activityItem = App\Models\Activitie::all();

    return  $activityItem;
}

function getArrayType()
{

    $ArrayType = App\Models\Section::all();

    // $ArrayType=[
    //    (object) [
    //         'name' => 'Project',
    //         'image' => 'icons8-crane-64.png',
    //     ],
    //    (object) [
    //         'name' => 'deals',
    //         'image' => 'icons8-deal-32.png',
    //     ],
    //    (object) [
    //         'name' => 'Material',
    //         'image' => 'icons8-factory-50.png',
    //     ],
    //     (object) [
    //         'name' => 'raw materials',
    //         'image' => 'icons8-builder-64.png',
    //     ],
    //    (object) [
    //         'name' => 'equipment',
    //         'image' => 'icons8-foundation-drilling-rig-100.png',
    //     ],
    //    (object) [
    //         'name' => 'job',
    //         'image' => 'icons8-builder-64.png',
    //     ]

    // ];

    return  (object) $ArrayType;
}

function getAdsCover($id, $model)
{
    $image = App\Models\File::where('FK', $id)->where('model', $model)->first();
    return $image;
}

function get_dashboard_folder()
{
    $folder = 'customer';
    if (Sentinel::inRole('administrator')) {
        $folder = 'administrator';
    } elseif (Sentinel::inRole('partner')) {
        $folder = 'partner';
    }

    return $folder;
}


function get_menu_dashboard()
{
    if (Sentinel::inRole('administrator')) {
        $menu = Config::get('config.admin_menu');
    } elseif (Sentinel::inRole('facility')) {
        $menu = Config::get('config.facility_menu');
    } else {
        $menu = Config::get('config.customer_menu');
    }
    return $menu;
}
function pad($num, $size)
{
    $num = strval($num);
    while (strlen($num) < $size) {
        $num = "0" . $num;
    }

    return $num;
}
function Received($date = '')
{
    $TIinvoices = null;
    $TIinvoices2 = null;
    if ($date == '') {
        $TIinvoices = invoice::where('user_id', '=', get_current_user_id())->where('type', '=', 'sales bill')
            ->get()->pluck('id')->toArray();
        $TIinvoices2 = invoice::where('TaxNumber', '=', get_current_user_data()->TaxNumber)
            ->where('type', '=', 'Purchases bill')->get()->pluck('id')->toArray();
    } else {
        $TIinvoices = invoice::where('user_id', '=', get_current_user_id())->where('type', '=', 'sales bill')
            ->whereBetween('invoice_date', [$date[0], $date[1]])->get()->pluck('id')->toArray();
        $TIinvoices2 = invoice::where('TaxNumber', '=', get_current_user_data()->TaxNumber)
            ->where('type', '=', 'Purchases bill')->whereBetween('invoice_date', [$date[0], $date[1]])->get()->pluck('id')->toArray();
    }
    $total = 0.0;
    $products = Products::whereIn('invoices_id', array_merge($TIinvoices2, $TIinvoices))->get();
    foreach ($products as $product) {

        $total += $product->Taxable_amount;
    }
    return $total;
}
function Paid($date = '')
{
    $TRinvoices = null;
    $TRinvoices2 = null;
    if ($date == '') {
        $TRinvoices = invoice::where('user_id', '=', get_current_user_id())->where('type', '=', 'Purchases bill')
            ->get()->pluck('id')->toArray();
        $TRinvoices2 = invoice::where('TaxNumber', '=', get_current_user_data()->TaxNumber)
            ->where('type', '=', 'sales bill')->get()->pluck('id')->toArray();
    } else {
        $TRinvoices = invoice::where('user_id', '=', get_current_user_id())->where('type', '=', 'Purchases bill')
            ->whereBetween('invoice_date', [$date[0], $date[1]])->get()->pluck('id')->toArray();
        $TRinvoices2 = invoice::where('TaxNumber', '=', get_current_user_data()->TaxNumber)
            ->where('type', '=', 'sales bill')->whereBetween('invoice_date', [$date[0], $date[1]])->get()->pluck('id')->toArray();
    }
    $total = 0.0;
    $products = Products::whereIn('invoices_id', array_merge($TRinvoices2, $TRinvoices))->get();

    foreach ($products as $product) {

        $total += $product->Taxable_amount;
    }
    return $total;
}
function UnPaid($date = '')
{
    $TRinvoices = null;
    $TRinvoices2 = null;
    if ($date == '') {
        $TRinvoices = invoice::where('user_id', '=', get_current_user_id())->where('type', '=', 'Purchases bill')->where('status', '=', 'un paid')
            ->get()->pluck('id')->toArray();
        $TRinvoices2 = invoice::where('TaxNumber', '=', get_current_user_data()->TaxNumber)->where('status', '=', 'un paid')
            ->where('type', '=', 'sales bill')->get()->pluck('id')->toArray();
    } else {
        $TRinvoices = invoice::where('user_id', '=', get_current_user_id())->where('type', '=', 'Purchases bill')->where('status', '=', 'un paid')
            ->whereBetween('invoice_date', [$date[0], $date[1]])->get()->pluck('id')->toArray();
        $TRinvoices2 = invoice::where('TaxNumber', '=', get_current_user_data()->TaxNumber)->where('status', '=', 'un paid')
            ->whereBetween('invoice_date', [$date[0], $date[1]])->where('type', '=', 'sales bill')->whereBetween('invoice_date', [$date[0], $date[1]])->get()->pluck('id')->toArray();
    }


    $total = 0.0;
    $products = Products::whereIn('invoices_id', array_merge($TRinvoices2, $TRinvoices))->get();

    foreach ($products as $product) {

        $total += $product->Taxable_amount;
    }
    return $total;
}
function getfileByName($name = '')
{

    return  File::where('model', '=', $name)->where('FK', '=', get_current_user_id())->first();
}
function getUserfile()
{
 $userFileName=['Commercial'=>__('backend.Commercial record'),
 'TaxCertificate'=>__('backend.value-added certificate'),
 'Saudization'=>__('backend.Saudization certificate'),
 'ChamberCommerce'=>__('backend.Chamber of Commerce certificate'),
 'insurances'=>__('backend.Social insurance certificate'),
 'Enterprise'=>__('backend.Establishment Certificate'),
 'profileFile'=>__('backend.Establishment Profile'),
 'classification'=>__('backend.rating certificate'),
];   
 $userFile=['Commercial','TaxCertificate','Saudization','ChamberCommerce','insurances','Enterprise','profileFile','classification'];
 $files=File::whereIn('model', $userFile)->where('FK', '=', get_current_user_id())->get();
 foreach($files as $item){
    $item->name=$userFileName[$item->model];
 }
 return  $files;

}
function getfileByNameByUserId($name = '',$id='')
{

    return  File::where('model', '=', $name)->where('FK', '=', $id)->first();
}
function get_user_file_By_Name($name = '', $id)
{

    return  File::where('model', '=', $name)->where('FK', '=', $id)->first();
}
function updateEnv($key = 'APP_KEY', $key_value = '')
{
    $path = base_path('.env');
    if (file_exists($path)) {
        file_put_contents($path, str_replace(
            $key . '=' . env($key),
            $key . '=' . $key_value,
            file_get_contents($path)
        ));
    }
}

function setEnvironmentValue(array $values)
{
    $envFile = app()->environmentFilePath();
    $str = file_get_contents($envFile);
    if (!empty($str)) {
        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                $str .= "\n"; // In case the searched variable is in the last line without \n
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }
            }
        }

        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) return false;
        return true;
    }
    return false;
}

function updateConfig($key = '', $key_value = '')
{
    $path = config_path('app.php');
    if (file_exists($path)) {
        file_put_contents($path, str_replace(
            "'" . $key . "' => '" . config('app.' . $key) . "'",
            "'" . $key . "' => '" . $key_value . "'",
            file_get_contents($path)
        ));
    }
}

function get_time_zone()
{
    $timezones = array(
        'America' => array(
            'America/Adak' => 'Adak -10:00',
            'America/Atka' => 'Atka -10:00',
            'America/Anchorage' => 'Anchorage -9:00',
            'America/Juneau' => 'Juneau -9:00',
            'America/Nome' => 'Nome -9:00',
            'America/Yakutat' => 'Yakutat -9:00',
            'America/Dawson' => 'Dawson -8:00',
            'America/Ensenada' => 'Ensenada -8:00',
            'America/Los_Angeles' => 'Los_Angeles -8:00',
            'America/Tijuana' => 'Tijuana -8:00',
            'America/Vancouver' => 'Vancouver -8:00',
            'America/Whitehorse' => 'Whitehorse -8:00',
            'America/Boise' => 'Boise -7:00',
            'America/Cambridge_Bay' => 'Cambridge_Bay -7:00',
            'America/Chihuahua' => 'Chihuahua -7:00',
            'America/Dawson_Creek' => 'Dawson_Creek -7:00',
            'America/Denver' => 'Denver -7:00',
            'America/Edmonton' => 'Edmonton -7:00',
            'America/Hermosillo' => 'Hermosillo -7:00',
            'America/Inuvik' => 'Inuvik -7:00',
            'America/Mazatlan' => 'Mazatlan -7:00',
            'America/Phoenix' => 'Phoenix -7:00',
            'America/Shiprock' => 'Shiprock -7:00',
            'America/Yellowknife' => 'Yellowknife -7:00',
            'America/Belize' => 'Belize -6:00',
            'America/Cancun' => 'Cancun -6:00',
            'America/Chicago' => 'Chicago -6:00',
            'America/Costa_Rica' => 'Costa_Rica -6:00',
            'America/El_Salvador' => 'El_Salvador -6:00',
            'America/Guatemala' => 'Guatemala -6:00',
            'America/Knox_IN' => 'Knox_IN -6:00',
            'America/Managua' => 'Managua -6:00',
            'America/Menominee' => 'Menominee -6:00',
            'America/Merida' => 'Merida -6:00',
            'America/Mexico_City' => 'Mexico_City -6:00',
            'America/Monterrey' => 'Monterrey -6:00',
            'America/Rainy_River' => 'Rainy_River -6:00',
            'America/Rankin_Inlet' => 'Rankin_Inlet -6:00',
            'America/Regina' => 'Regina -6:00',
            'America/Swift_Current' => 'Swift_Current -6:00',
            'America/Tegucigalpa' => 'Tegucigalpa -6:00',
            'America/Winnipeg' => 'Winnipeg -6:00',
            'America/Atikokan' => 'Atikokan -5:00',
            'America/Bogota' => 'Bogota -5:00',
            'America/Cayman' => 'Cayman -5:00',
            'America/Coral_Harbour' => 'Coral_Harbour -5:00',
            'America/Detroit' => 'Detroit -5:00',
            'America/Fort_Wayne' => 'Fort_Wayne -5:00',
            'America/Grand_Turk' => 'Grand_Turk -5:00',
            'America/Guayaquil' => 'Guayaquil -5:00',
            'America/Havana' => 'Havana -5:00',
            'America/Indianapolis' => 'Indianapolis -5:00',
            'America/Iqaluit' => 'Iqaluit -5:00',
            'America/Jamaica' => 'Jamaica -5:00',
            'America/Lima' => 'Lima -5:00',
            'America/Louisville' => 'Louisville -5:00',
            'America/Montreal' => 'Montreal -5:00',
            'America/Nassau' => 'Nassau -5:00',
            'America/New_York' => 'New_York -5:00',
            'America/Nipigon' => 'Nipigon -5:00',
            'America/Panama' => 'Panama -5:00',
            'America/Pangnirtung' => 'Pangnirtung -5:00',
            'America/Port-au-Prince' => 'Port-au-Prince -5:00',
            'America/Resolute' => 'Resolute -5:00',
            'America/Thunder_Bay' => 'Thunder_Bay -5:00',
            'America/Toronto' => 'Toronto -5:00',
            'America/Caracas' => 'Caracas -4:-30',
            'America/Anguilla' => 'Anguilla -4:00',
            'America/Antigua' => 'Antigua -4:00',
            'America/Aruba' => 'Aruba -4:00',
            'America/Asuncion' => 'Asuncion -4:00',
            'America/Barbados' => 'Barbados -4:00',
            'America/Blanc-Sablon' => 'Blanc-Sablon -4:00',
            'America/Boa_Vista' => 'Boa_Vista -4:00',
            'America/Campo_Grande' => 'Campo_Grande -4:00',
            'America/Cuiaba' => 'Cuiaba -4:00',
            'America/Curacao' => 'Curacao -4:00',
            'America/Dominica' => 'Dominica -4:00',
            'America/Eirunepe' => 'Eirunepe -4:00',
            'America/Glace_Bay' => 'Glace_Bay -4:00',
            'America/Goose_Bay' => 'Goose_Bay -4:00',
            'America/Grenada' => 'Grenada -4:00',
            'America/Guadeloupe' => 'Guadeloupe -4:00',
            'America/Guyana' => 'Guyana -4:00',
            'America/Halifax' => 'Halifax -4:00',
            'America/La_Paz' => 'La_Paz -4:00',
            'America/Manaus' => 'Manaus -4:00',
            'America/Marigot' => 'Marigot -4:00',
            'America/Martinique' => 'Martinique -4:00',
            'America/Moncton' => 'Moncton -4:00',
            'America/Montserrat' => 'Montserrat -4:00',
            'America/Port_of_Spain' => 'Port_of_Spain -4:00',
            'America/Porto_Acre' => 'Porto_Acre -4:00',
            'America/Porto_Velho' => 'Porto_Velho -4:00',
            'America/Puerto_Rico' => 'Puerto_Rico -4:00',
            'America/Rio_Branco' => 'Rio_Branco -4:00',
            'America/Santiago' => 'Santiago -4:00',
            'America/Santo_Domingo' => 'Santo_Domingo -4:00',
            'America/St_Barthelemy' => 'St_Barthelemy -4:00',
            'America/St_Kitts' => 'St_Kitts -4:00',
            'America/St_Lucia' => 'St_Lucia -4:00',
            'America/St_Thomas' => 'St_Thomas -4:00',
            'America/St_Vincent' => 'St_Vincent -4:00',
            'America/Thule' => 'Thule -4:00',
            'America/Tortola' => 'Tortola -4:00',
            'America/Virgin' => 'Virgin -4:00',
            'America/St_Johns' => 'St_Johns -3:-30',
            'America/Araguaina' => 'Araguaina -3:00',
            'America/Bahia' => 'Bahia -3:00',
            'America/Belem' => 'Belem -3:00',
            'America/Buenos_Aires' => 'Buenos_Aires -3:00',
            'America/Catamarca' => 'Catamarca -3:00',
            'America/Cayenne' => 'Cayenne -3:00',
            'America/Cordoba' => 'Cordoba -3:00',
            'America/Fortaleza' => 'Fortaleza -3:00',
            'America/Godthab' => 'Godthab -3:00',
            'America/Jujuy' => 'Jujuy -3:00',
            'America/Maceio' => 'Maceio -3:00',
            'America/Mendoza' => 'Mendoza -3:00',
            'America/Miquelon' => 'Miquelon -3:00',
            'America/Montevideo' => 'Montevideo -3:00',
            'America/Paramaribo' => 'Paramaribo -3:00',
            'America/Recife' => 'Recife -3:00',
            'America/Rosario' => 'Rosario -3:00',
            'America/Santarem' => 'Santarem -3:00',
            'America/Sao_Paulo' => 'Sao_Paulo -3:00',
            'America/Noronha' => 'Noronha -2:00',
            'America/Scoresbysund' => 'Scoresbysund -1:00',
            'America/Danmarkshavn' => 'Danmarkshavn +0:00',
        ),
        'Canada' => array(
            'Canada/Pacific' => 'Pacific -8:00',
            'Canada/Yukon' => 'Yukon -8:00',
            'Canada/Mountain' => 'Mountain -7:00',
            'Canada/Central' => 'Central -6:00',
            'Canada/East-Saskatchewan' => 'East-Saskatchewan -6:00',
            'Canada/Saskatchewan' => 'Saskatchewan -6:00',
            'Canada/Eastern' => 'Eastern -5:00',
            'Canada/Atlantic' => 'Atlantic -4:00',
            'Canada/Newfoundland' => 'Newfoundland -3:-30',
        ),
        'Mexico' => array(
            'Mexico/BajaNorte' => 'BajaNorte -8:00',
            'Mexico/BajaSur' => 'BajaSur -7:00',
            'Mexico/General' => 'General -6:00',
        ),
        'Chile' => array(
            'Chile/EasterIsland' => 'EasterIsland -6:00',
            'Chile/Continental' => 'Continental -4:00',
        ),
        'Antarctica' => array(
            'Antarctica/Palmer' => 'Palmer -4:00',
            'Antarctica/Rothera' => 'Rothera -3:00',
            'Antarctica/Syowa' => 'Syowa +3:00',
            'Antarctica/Mawson' => 'Mawson +6:00',
            'Antarctica/Vostok' => 'Vostok +6:00',
            'Antarctica/Davis' => 'Davis +7:00',
            'Antarctica/Casey' => 'Casey +8:00',
            'Antarctica/DumontDUrville' => 'DumontDUrville +10:00',
            'Antarctica/McMurdo' => 'McMurdo +12:00',
            'Antarctica/South_Pole' => 'South_Pole +12:00',
        ),
        'Atlantic' => array(
            'Atlantic/Bermuda' => 'Bermuda -4:00',
            'Atlantic/Stanley' => 'Stanley -4:00',
            'Atlantic/South_Georgia' => 'South_Georgia -2:00',
            'Atlantic/Azores' => 'Azores -1:00',
            'Atlantic/Cape_Verde' => 'Cape_Verde -1:00',
            'Atlantic/Canary' => 'Canary +0:00',
            'Atlantic/Faeroe' => 'Faeroe +0:00',
            'Atlantic/Faroe' => 'Faroe +0:00',
            'Atlantic/Madeira' => 'Madeira +0:00',
            'Atlantic/Reykjavik' => 'Reykjavik +0:00',
            'Atlantic/St_Helena' => 'St_Helena +0:00',
            'Atlantic/Jan_Mayen' => 'Jan_Mayen +1:00',
        ),
        'Brazil' => array(
            'Brazil/Acre' => 'Acre -4:00',
            'Brazil/West' => 'West -4:00',
            'Brazil/East' => 'East -3:00',
            'Brazil/DeNoronha' => 'DeNoronha -2:00',
        ),
        'Africa' => array(
            'Africa/Abidjan' => 'Abidjan +0:00',
            'Africa/Accra' => 'Accra +0:00',
            'Africa/Bamako' => 'Bamako +0:00',
            'Africa/Banjul' => 'Banjul +0:00',
            'Africa/Bissau' => 'Bissau +0:00',
            'Africa/Casablanca' => 'Casablanca +0:00',
            'Africa/Conakry' => 'Conakry +0:00',
            'Africa/Dakar' => 'Dakar +0:00',
            'Africa/El_Aaiun' => 'El_Aaiun +0:00',
            'Africa/Freetown' => 'Freetown +0:00',
            'Africa/Lome' => 'Lome +0:00',
            'Africa/Monrovia' => 'Monrovia +0:00',
            'Africa/Nouakchott' => 'Nouakchott +0:00',
            'Africa/Ouagadougou' => 'Ouagadougou +0:00',
            'Africa/Sao_Tome' => 'Sao_Tome +0:00',
            'Africa/Timbuktu' => 'Timbuktu +0:00',
            'Africa/Algiers' => 'Algiers +1:00',
            'Africa/Bangui' => 'Bangui +1:00',
            'Africa/Brazzaville' => 'Brazzaville +1:00',
            'Africa/Ceuta' => 'Ceuta +1:00',
            'Africa/Douala' => 'Douala +1:00',
            'Africa/Kinshasa' => 'Kinshasa +1:00',
            'Africa/Lagos' => 'Lagos +1:00',
            'Africa/Libreville' => 'Libreville +1:00',
            'Africa/Luanda' => 'Luanda +1:00',
            'Africa/Malabo' => 'Malabo +1:00',
            'Africa/Ndjamena' => 'Ndjamena +1:00',
            'Africa/Niamey' => 'Niamey +1:00',
            'Africa/Porto-Novo' => 'Porto-Novo +1:00',
            'Africa/Tunis' => 'Tunis +1:00',
            'Africa/Windhoek' => 'Windhoek +1:00',
            'Africa/Blantyre' => 'Blantyre +2:00',
            'Africa/Bujumbura' => 'Bujumbura +2:00',
            'Africa/Cairo' => 'Cairo +2:00',
            'Africa/Gaborone' => 'Gaborone +2:00',
            'Africa/Harare' => 'Harare +2:00',
            'Africa/Johannesburg' => 'Johannesburg +2:00',
            'Africa/Kigali' => 'Kigali +2:00',
            'Africa/Lubumbashi' => 'Lubumbashi +2:00',
            'Africa/Lusaka' => 'Lusaka +2:00',
            'Africa/Maputo' => 'Maputo +2:00',
            'Africa/Maseru' => 'Maseru +2:00',
            'Africa/Mbabane' => 'Mbabane +2:00',
            'Africa/Tripoli' => 'Tripoli +2:00',
            'Africa/Addis_Ababa' => 'Addis_Ababa +3:00',
            'Africa/Asmara' => 'Asmara +3:00',
            'Africa/Asmera' => 'Asmera +3:00',
            'Africa/Dar_es_Salaam' => 'Dar_es_Salaam +3:00',
            'Africa/Djibouti' => 'Djibouti +3:00',
            'Africa/Kampala' => 'Kampala +3:00',
            'Africa/Khartoum' => 'Khartoum +3:00',
            'Africa/Mogadishu' => 'Mogadishu +3:00',
            'Africa/Nairobi' => 'Nairobi +3:00',
        ),
        'Europe' => array(
            'Europe/Belfast' => 'Belfast +0:00',
            'Europe/Dublin' => 'Dublin +0:00',
            'Europe/Guernsey' => 'Guernsey +0:00',
            'Europe/Isle_of_Man' => 'Isle_of_Man +0:00',
            'Europe/Jersey' => 'Jersey +0:00',
            'Europe/Lisbon' => 'Lisbon +0:00',
            'Europe/London' => 'London +0:00',
            'Europe/Amsterdam' => 'Amsterdam +1:00',
            'Europe/Andorra' => 'Andorra +1:00',
            'Europe/Belgrade' => 'Belgrade +1:00',
            'Europe/Berlin' => 'Berlin +1:00',
            'Europe/Bratislava' => 'Bratislava +1:00',
            'Europe/Brussels' => 'Brussels +1:00',
            'Europe/Budapest' => 'Budapest +1:00',
            'Europe/Copenhagen' => 'Copenhagen +1:00',
            'Europe/Gibraltar' => 'Gibraltar +1:00',
            'Europe/Ljubljana' => 'Ljubljana +1:00',
            'Europe/Luxembourg' => 'Luxembourg +1:00',
            'Europe/Madrid' => 'Madrid +1:00',
            'Europe/Malta' => 'Malta +1:00',
            'Europe/Monaco' => 'Monaco +1:00',
            'Europe/Oslo' => 'Oslo +1:00',
            'Europe/Paris' => 'Paris +1:00',
            'Europe/Podgorica' => 'Podgorica +1:00',
            'Europe/Prague' => 'Prague +1:00',
            'Europe/Rome' => 'Rome +1:00',
            'Europe/San_Marino' => 'San_Marino +1:00',
            'Europe/Sarajevo' => 'Sarajevo +1:00',
            'Europe/Skopje' => 'Skopje +1:00',
            'Europe/Stockholm' => 'Stockholm +1:00',
            'Europe/Tirane' => 'Tirane +1:00',
            'Europe/Vaduz' => 'Vaduz +1:00',
            'Europe/Vatican' => 'Vatican +1:00',
            'Europe/Vienna' => 'Vienna +1:00',
            'Europe/Warsaw' => 'Warsaw +1:00',
            'Europe/Zagreb' => 'Zagreb +1:00',
            'Europe/Zurich' => 'Zurich +1:00',
            'Europe/Athens' => 'Athens +2:00',
            'Europe/Bucharest' => 'Bucharest +2:00',
            'Europe/Chisinau' => 'Chisinau +2:00',
            'Europe/Helsinki' => 'Helsinki +2:00',
            'Europe/Istanbul' => 'Istanbul +2:00',
            'Europe/Kaliningrad' => 'Kaliningrad +2:00',
            'Europe/Kiev' => 'Kiev +2:00',
            'Europe/Mariehamn' => 'Mariehamn +2:00',
            'Europe/Minsk' => 'Minsk +2:00',
            'Europe/Nicosia' => 'Nicosia +2:00',
            'Europe/Riga' => 'Riga +2:00',
            'Europe/Simferopol' => 'Simferopol +2:00',
            'Europe/Sofia' => 'Sofia +2:00',
            'Europe/Tallinn' => 'Tallinn +2:00',
            'Europe/Tiraspol' => 'Tiraspol +2:00',
            'Europe/Uzhgorod' => 'Uzhgorod +2:00',
            'Europe/Vilnius' => 'Vilnius +2:00',
            'Europe/Zaporozhye' => 'Zaporozhye +2:00',
            'Europe/Moscow' => 'Moscow +3:00',
            'Europe/Volgograd' => 'Volgograd +3:00',
            'Europe/Samara' => 'Samara +4:00',
        ),
        'Arctic' => array(
            'Arctic/Longyearbyen' => 'Longyearbyen +1:00',
        ),
        'Asia' => array(
            'Asia/Amman' => 'Amman +2:00',
            'Asia/Beirut' => 'Beirut +2:00',
            'Asia/Damascus' => 'Damascus +2:00',
            'Asia/Gaza' => 'Gaza +2:00',
            'Asia/Istanbul' => 'Istanbul +2:00',
            'Asia/Jerusalem' => 'Jerusalem +2:00',
            'Asia/Nicosia' => 'Nicosia +2:00',
            'Asia/Tel_Aviv' => 'Tel_Aviv +2:00',
            'Asia/Aden' => 'Aden +3:00',
            'Asia/Baghdad' => 'Baghdad +3:00',
            'Asia/Bahrain' => 'Bahrain +3:00',
            'Asia/Kuwait' => 'Kuwait +3:00',
            'Asia/Qatar' => 'Qatar +3:00',
            'Asia/Tehran' => 'Tehran +3:30',
            'Asia/Baku' => 'Baku +4:00',
            'Asia/Dubai' => 'Dubai +4:00',
            'Asia/Muscat' => 'Muscat +4:00',
            'Asia/Tbilisi' => 'Tbilisi +4:00',
            'Asia/Yerevan' => 'Yerevan +4:00',
            'Asia/Kabul' => 'Kabul +4:30',
            'Asia/Aqtau' => 'Aqtau +5:00',
            'Asia/Aqtobe' => 'Aqtobe +5:00',
            'Asia/Ashgabat' => 'Ashgabat +5:00',
            'Asia/Ashkhabad' => 'Ashkhabad +5:00',
            'Asia/Dushanbe' => 'Dushanbe +5:00',
            'Asia/Karachi' => 'Karachi +5:00',
            'Asia/Oral' => 'Oral +5:00',
            'Asia/Samarkand' => 'Samarkand +5:00',
            'Asia/Tashkent' => 'Tashkent +5:00',
            'Asia/Yekaterinburg' => 'Yekaterinburg +5:00',
            'Asia/Calcutta' => 'Calcutta +5:30',
            'Asia/Colombo' => 'Colombo +5:30',
            'Asia/Kolkata' => 'Kolkata +5:30',
            'Asia/Katmandu' => 'Katmandu +5:45',
            'Asia/Almaty' => 'Almaty +6:00',
            'Asia/Bishkek' => 'Bishkek +6:00',
            'Asia/Dacca' => 'Dacca +6:00',
            'Asia/Dhaka' => 'Dhaka +6:00',
            'Asia/Novosibirsk' => 'Novosibirsk +6:00',
            'Asia/Omsk' => 'Omsk +6:00',
            'Asia/Qyzylorda' => 'Qyzylorda +6:00',
            'Asia/Thimbu' => 'Thimbu +6:00',
            'Asia/Thimphu' => 'Thimphu +6:00',
            'Asia/Rangoon' => 'Rangoon +6:30',
            'Asia/Bangkok' => 'Bangkok +7:00',
            'Asia/Ho_Chi_Minh' => 'Ho_Chi_Minh +7:00',
            'Asia/Hovd' => 'Hovd +7:00',
            'Asia/Jakarta' => 'Jakarta +7:00',
            'Asia/Krasnoyarsk' => 'Krasnoyarsk +7:00',
            'Asia/Phnom_Penh' => 'Phnom_Penh +7:00',
            'Asia/Pontianak' => 'Pontianak +7:00',
            'Asia/Saigon' => 'Saigon +7:00',
            'Asia/Vientiane' => 'Vientiane +7:00',
            'Asia/Brunei' => 'Brunei +8:00',
            'Asia/Choibalsan' => 'Choibalsan +8:00',
            'Asia/Chongqing' => 'Chongqing +8:00',
            'Asia/Chungking' => 'Chungking +8:00',
            'Asia/Harbin' => 'Harbin +8:00',
            'Asia/Hong_Kong' => 'Hong_Kong +8:00',
            'Asia/Irkutsk' => 'Irkutsk +8:00',
            'Asia/Kashgar' => 'Kashgar +8:00',
            'Asia/Kuala_Lumpur' => 'Kuala_Lumpur +8:00',
            'Asia/Kuching' => 'Kuching +8:00',
            'Asia/Macao' => 'Macao +8:00',
            'Asia/Macau' => 'Macau +8:00',
            'Asia/Makassar' => 'Makassar +8:00',
            'Asia/Manila' => 'Manila +8:00',
            'Asia/Shanghai' => 'Shanghai +8:00',
            'Asia/Singapore' => 'Singapore +8:00',
            'Asia/Taipei' => 'Taipei +8:00',
            'Asia/Ujung_Pandang' => 'Ujung_Pandang +8:00',
            'Asia/Ulaanbaatar' => 'Ulaanbaatar +8:00',
            'Asia/Ulan_Bator' => 'Ulan_Bator +8:00',
            'Asia/Urumqi' => 'Urumqi +8:00',
            'Asia/Dili' => 'Dili +9:00',
            'Asia/Jayapura' => 'Jayapura +9:00',
            'Asia/Pyongyang' => 'Pyongyang +9:00',
            'Asia/Seoul' => 'Seoul +9:00',
            'Asia/Tokyo' => 'Tokyo +9:00',
            'Asia/Yakutsk' => 'Yakutsk +9:00',
            'Asia/Sakhalin' => 'Sakhalin +10:00',
            'Asia/Vladivostok' => 'Vladivostok +10:00',
            'Asia/Magadan' => 'Magadan +11:00',
            'Asia/Anadyr' => 'Anadyr +12:00',
            'Asia/Kamchatka' => 'Kamchatka +12:00',
        ),
        'Indian' => array(
            'Indian/Antananarivo' => 'Antananarivo +3:00',
            'Indian/Comoro' => 'Comoro +3:00',
            'Indian/Mayotte' => 'Mayotte +3:00',
            'Indian/Mahe' => 'Mahe +4:00',
            'Indian/Mauritius' => 'Mauritius +4:00',
            'Indian/Reunion' => 'Reunion +4:00',
            'Indian/Kerguelen' => 'Kerguelen +5:00',
            'Indian/Maldives' => 'Maldives +5:00',
            'Indian/Chagos' => 'Chagos +6:00',
            'Indian/Cocos' => 'Cocos +6:30',
            'Indian/Christmas' => 'Christmas +7:00',
        ),
        'Australia' => array(
            'Australia/Perth' => 'Perth +8:00',
            'Australia/West' => 'West +8:00',
            'Australia/Eucla' => 'Eucla +8:45',
            'Australia/Adelaide' => 'Adelaide +9:30',
            'Australia/Broken_Hill' => 'Broken_Hill +9:30',
            'Australia/Darwin' => 'Darwin +9:30',
            'Australia/North' => 'North +9:30',
            'Australia/South' => 'South +9:30',
            'Australia/Yancowinna' => 'Yancowinna +9:30',
            'Australia/ACT' => 'ACT +10:00',
            'Australia/Brisbane' => 'Brisbane +10:00',
            'Australia/Canberra' => 'Canberra +10:00',
            'Australia/Currie' => 'Currie +10:00',
            'Australia/Hobart' => 'Hobart +10:00',
            'Australia/Lindeman' => 'Lindeman +10:00',
            'Australia/Melbourne' => 'Melbourne +10:00',
            'Australia/NSW' => 'NSW +10:00',
            'Australia/Queensland' => 'Queensland +10:00',
            'Australia/Sydney' => 'Sydney +10:00',
            'Australia/Tasmania' => 'Tasmania +10:00',
            'Australia/Victoria' => 'Victoria +10:00',
            'Australia/LHI' => 'LHI +10:30',
            'Australia/Lord_Howe' => 'Lord_Howe +10:30',
        ),
    );

    return $timezones;
}
function get_timezone()
{
    return get_option('timezone', 'Asia/Riyadh');
}
function esc_sql($text)
{
    return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $text);
}
function _check_invalid_utf8($string, $strip = false)
{
    $string = (string)$string;

    if (0 === strlen($string)) {
        return '';
    }

    // Store the site charset as a static to avoid multiple calls to get_option()
    static $is_utf8 = null;
    if (!isset($is_utf8)) {
        $is_utf8 = in_array('utf-8', array('utf8', 'utf-8', 'UTF8', 'UTF-8'));
    }
    if (!$is_utf8) {
        return $string;
    }

    // Check for support for utf8 in the installed PCRE library once and store the result in a static
    static $utf8_pcre = null;
    if (!isset($utf8_pcre)) {
        $utf8_pcre = @preg_match('/^./u', 'a');
    }
    // We can't demand utf8 in the PCRE installation, so just return the string in those cases
    if (!$utf8_pcre) {
        return $string;
    }

    // preg_match fails when it encounters invalid UTF8 in $string
    if (1 === @preg_match('/^./us', $string)) {
        return $string;
    }

    // Attempt to strip the bad chars if requested (not recommended)
    if ($strip && function_exists('iconv')) {
        return iconv('utf-8', 'utf-8', $string);
    }

    return '';
}
function kses_normalize_entities($string)
{
    // Disarm all entities by converting & to &amp;
    $string = str_replace('&', '&amp;', $string);

    // Change back the allowed entities in our entity whitelist
    $string = preg_replace_callback('/&amp;([A-Za-z]{2,8}[0-9]{0,2});/', 'kses_named_entities', $string);
    $string = preg_replace_callback('/&amp;#(0*[0-9]{1,7});/', 'kses_normalize_entities2', $string);
    $string = preg_replace_callback('/&amp;#[Xx](0*[0-9A-Fa-f]{1,6});/', 'kses_normalize_entities3', $string);

    return $string;
}
function _specialchars($string, $quote_style = ENT_NOQUOTES, $charset = false, $double_encode = false)
{
    $string = (string)$string;

    if (0 === strlen($string)) {
        return '';
    }

    // Don't bother if there are no specialchars - saves some processing
    if (!preg_match('/[&<>"\']/', $string)) {
        return $string;
    }

    // Account for the previous behaviour of the function when the $quote_style is not an accepted value
    if (empty($quote_style)) {
        $quote_style = ENT_NOQUOTES;
    } elseif (!in_array($quote_style, array(0, 2, 3, 'single', 'double'), true)) {
        $quote_style = ENT_QUOTES;
    }

    // Store the site charset as a static to avoid multiple calls to wp_load_alloptions()
    if (!$charset) {
        static $_charset = null;
        if (!isset($_charset)) {
            $alloptions = [];
            $_charset = isset($alloptions['blog_charset']) ? $alloptions['blog_charset'] : '';
        }
        $charset = $_charset;
    }

    if (in_array($charset, array('utf8', 'utf-8', 'UTF8'))) {
        $charset = 'UTF-8';
    }

    $_quote_style = $quote_style;

    if ($quote_style === 'double') {
        $quote_style = ENT_COMPAT;
        $_quote_style = ENT_COMPAT;
    } elseif ($quote_style === 'single') {
        $quote_style = ENT_NOQUOTES;
    }

    if (!$double_encode) {
        // Guarantee every &entity; is valid, convert &garbage; into &amp;garbage;
        // This is required for PHP < 5.4.0 because ENT_HTML401 flag is unavailable.
        $string = kses_normalize_entities($string);
    }

    $string = @htmlspecialchars($string, $quote_style, $charset, $double_encode);

    // Back-compat.
    if ('single' === $_quote_style) {
        $string = str_replace("'", '&#039;', $string);
    }

    return $string;
}
function get_site_description()
{
    return get_option('site_description', __('Awesome Booking System'));
}
function get_cities()
{
    return City::all();
}
function get_users_type()
{
    return UserType::all();
}
function get_ads_by_id($id)
{
    return Ads::find($id)!=null?Ads::find($id):null;
}
function get_activity_id_by_user_type($id)
{
    return UserType::where('id','=',$id)->get();
}
function get_users_type_by_id($id)
{
    return UserType::all();
}
function get_facility_type($id)
{ $type=UserType::find($id);
    return $type==null?null:$type->name;
}
function get_facility_activity($id)
{
    return  Activitie::find($id);
}
function get_all_activity()
{
    return Activitie::all();
}
function get_ads_cover($id){
$ads=Ads::find($id);
$cover=explode(',', $ads->gallery)[0];
$file= File::find($cover);
return $file!=null? $file->file:null;

}
function get_ads_attachment($id){
    $file= File::find($id);
    return $file;
}
function page_title($is_dashboard = false)
{
    $title = get_site_name() . ' - ' . get_site_description();
    $current_route = Route::current();
    $name = $current_route->getName();
    $params = $current_route->parameters();
    foreach ($params as $key => $param) {
        if ($key !== 'page' && $key !== 'id') {
            $name .= '/' . $param;
        }
    }
    if ($is_dashboard) {
        $menu = Config::get('config.customer_menu');
        if (is_admin()) {
            $menu = Config::get('config.admin_menu');
        } elseif (is_partner()) {
            $menu = Config::get('config.partner_menu');
        }
        foreach ($menu as $item) {
            if ($item['type'] == 'item' || $item['type'] == 'hidden') {
                if ($item['route_name'] === $name) {
                    $title = __($item['label']) . ' - ' . $title;
                    break;
                }
            } elseif ($item['type'] == 'parent') {
                foreach ($item['child'] as $sub_item) {
                    if ($sub_item['route_name'] === $name) {
                        $title = __($sub_item['label']) . ' - ' . $title;
                        break;
                    }
                }
            }
        }
    } else {
        $params = $current_route->parameters();
        global $post;
        if (isset($params['home_id'])) {
            $title = get_translate($post->post_title) . ' - ' . $title;
        } elseif (isset($params['experience_id'])) {
            $title = get_translate($post->post_title) . ' - ' . $title;
        } elseif (isset($params['car_id'])) {
            $title = get_translate($post->post_title) . ' - ' . $title;
        } elseif (isset($params['post_id'])) {
            $title = get_translate($post->post_title) . ' - ' . $title;
        } elseif (isset($params['page_id'])) {
            $title = get_translate($post->post_title) . ' - ' . $title;
        } else {
            $name = $current_route->getName();
            $pages_name = Config::get('config.pages_name');
            foreach ($pages_name as $item) {
                if ($item['route_name'] === $name) {
                    $title = __($item['label']) . ' - ' . $title;
                }
            }
        }
        $title = apply_filters('awebooking_post_title', $title, $params, $post);
    }


    return apply_filters('awebooking_page_title', $title, $is_dashboard, $name);
}
function esc_attr($text)
{
    $safe_text = _check_invalid_utf8($text);
    $safe_text = _specialchars($safe_text, ENT_QUOTES);
    return $safe_text;
}
function maybe_unserialize($original)
{
    if (is_serialized($original)) {
        return @unserialize($original);
    }
    return $original;
}
function get_all_posts($post_type = 'post', $number = '-1', $status = ['publish'])
{
    // switch ($post_type) {
    //     case 'page':
    //         $page = new Page();
    //         $res = $page->getAllPages([
    //             'number' => $number,
    //             'status' => $status
    //         ]);
    //         break;
    //     case 'car':
    //         $car = new Car;
    //         $res = $car->getAllCars([
    //             'number' => $number,
    //             'status' => $status
    //         ]);
    //         break;
    //     case 'experience':
    //         $experience = new Experience();
    //         $res = $experience->getAllExperiences([
    //             'number' => $number,
    //             'status' => $status
    //         ]);
    //         break;
    //     case 'home':
    //         $home = new Home();
    //         $res = $home->getAllHomes([
    //             'number' => $number,
    //             'status' => $status
    //         ]);
    //         break;
    //     default:
    //         $post = new Post();
    //         $res = $post->getAllPosts([
    //             'number' => $number,
    //             'status' => $status
    //         ]);
    //         break;
    // }
    // return $res;
}
function maybe_serialize($data)
{
    if (is_array($data) || is_object($data)) {
        return serialize($data);
    }

    if (is_serialized($data, false)) {
        return serialize($data);
    }

    return $data;
}

function is_serialized($data, $strict = true)
{
    if (!is_string($data)) {
        return false;
    }
    $data = trim($data);
    if ('N;' == $data) {
        return true;
    }
    if (strlen($data) < 4) {
        return false;
    }
    if (':' !== $data[1]) {
        return false;
    }
    if ($strict) {
        $lastc = substr($data, -1);
        if (';' !== $lastc && '}' !== $lastc) {
            return false;
        }
    } else {
        $semicolon = strpos($data, ';');
        $brace = strpos($data, '}');
        // Either ; or } must exist.
        if (false === $semicolon && false === $brace) {
            return false;
        }
        // But neither must be in the first X characters.
        if (false !== $semicolon && $semicolon < 3) {
            return false;
        }
        if (false !== $brace && $brace < 4) {
            return false;
        }
    }
    $token = $data[0];
    switch ($token) {
        case 's':
            if ($strict) {
                if ('"' !== substr($data, -2, 1)) {
                    return false;
                }
            } elseif (false === strpos($data, '"')) {
                return false;
            }
        case 'a':
        case 'O':
            return (bool)preg_match("/^{$token}:[0-9]+:/s", $data);
        case 'b':
        case 'i':
        case 'd':
            $end = $strict ? '$' : '';
            return (bool)preg_match("/^{$token}:[0-9.E-]+;$end/", $data);
    }
    return false;
}
function get_site_name()
{
    return get_option('site_name', Config::get('app.name', __('Laravel App')));
}

function get_option($key = '', $default = '')
{
    return \ThemeOptions::getOption($key, $default);
}
function get_attachment($attachment_id)
{
    // $media = new Media();
    // return $media->getById($attachment_id);
}
function get_attachment_url($attachment_id, $size = 'full', $default = true)
{
    return "/image/" . $attachment_id;

    // if (is_object($attachment_id)) {
    //     $attachment = $attachment_id;
    // } else {
    //     $attachment = get_attachment($attachment_id);
    // }

    // if (is_object($attachment)) {
    //     $media_path = base_path($attachment->media_path);
    //     if (file_exists($media_path)) {
    //         $media_url = url($attachment->media_url);
    //         if (\App::environment('production_ssl')) {
    //             $media_url = str_replace('http:', 'https:', $media_url);
    //         }
    //         if ($size == 'full' || $attachment->media_type === 'svg') {
    //             return $media_url;
    //         }

    //         $url_info = pathinfo($media_url);
    //         $url = $url_info['dirname'];

    //         $path_info = pathinfo($media_path);
    //         $name = $path_info['filename'];
    //         $extension = $attachment->media_type;
    //         $path = $path_info['dirname'];

    //         switch ($size) {
    //             case 'medium':
    //                 $file = $path . '/' . $name . '-800x600' . '.' . $extension;
    //                 break;
    //             case 'small':
    //                 $file = $path . '/' . $name . '-400x300' . '.' . $extension;
    //                 break;
    //             default:
    //                 $file = $path . '/' . $name . '-' . $size[0] . 'x' . $size[1] . '.' . $extension;
    //                 break;
    //         }

    //         if (file_exists($file)) {
    //             return $url . '/' . basename($file);
    //         } else {
    //             // return 'https://e7.pngegg.com/pngimages/981/645/png-clipart-default-profile-united-states-computer-icons-desktop-free-high-quality-person-icon-miscellaneous-silhouette-thumbnail.png';

    //             // if (in_array($extension, crop_image_types())) {
    //             //     crop_image($media_path, $size);
    //             //     if (is_file($file)) {
    //             //         return $url . '/' . basename($file);
    //             //     } else {
    //             //         return placeholder_image($size);
    //             //     }
    //             // } else {
    //             //     return placeholder_image($size);
    //             // }
    //         }
    //     } else {
    //         if ($default) {
    //             //return placeholder_image($size);
    //         } else {
    //             return '';
    //         }
    //     }
    // } else {
    //     if ($default) {
    //         //  return placeholder_image($size);
    //     } else {
    //         return '';
    //     }
    // }
}
function dashboard_url($url = '', $id = '', $page = '')
{
    if (empty($id) && empty($page)) {
        return url(Config::get('awebooking.prefix_dashboard') . '/' . $url);
    } else {
        if (!empty($id) && !empty($page)) {
            return url(Config::get('awebooking.prefix_dashboard') . '/' . $url . '/' . $id . '/' . $page);
        } elseif (!empty($id)) {
            return url(Config::get('awebooking.prefix_dashboard') . '/' . $url . '/' . $id);
        } elseif (!empty($page)) {
            return url(Config::get('awebooking.prefix_dashboard') . '/' . $url . '/' . $page);
        }
    }
}

function auth_url($name = '')
{
    return url(Config::get('awebooking.prefix_auth') . '/' . $name);
}




function current_url()
{
    return Request::fullUrl();
}



function current_screen()
{
    return Route::currentRouteName();
}

function start_get_view()
{
    ob_start();
}

function end_get_view()
{
    return @ob_get_clean();
}
function _wp_call_all_hook($args)
{
    global $hh_filter;

    $hh_filter['all']->do_all_hook($args);
}

function apply_filters($tag, $value)
{
    global $hh_filter, $hh_current_filter;

    $args = array();

    // Do 'all' actions first.
    if (isset($hh_filter['all'])) {
        $hh_current_filter[] = $tag;
        $args = func_get_args();
        _wp_call_all_hook($args);
    }

    if (!isset($hh_filter[$tag])) {
        if (isset($hh_filter['all'])) {
            array_pop($hh_current_filter);
        }
        return $value;
    }

    if (!isset($hh_filter['all'])) {
        $hh_current_filter[] = $tag;
    }

    if (empty($args)) {
        $args = func_get_args();
    }

    // don't pass the tag name to WP_Hook
    array_shift($args);

    $filtered = $hh_filter[$tag]->apply_filters($value, $args);

    array_pop($hh_current_filter);

    return $filtered;
}


function wp_parse_str($string, &$array)
{
    parse_str($string, $array);
    /**
     * Filters the array of variables derived from a parsed string.
     *
     * @param array $array The array populated with variables.
     * @since 2.3.0
     *
     */
    $array = apply_filters('wp_parse_str', $array);
}
function hh_date_format($time = false)
{
    if ($time) {
        return get_option('time_format', Config::get('config.date_format')) . ' ' . get_option('date_format', Config::get('config.time_format'));
    } else {
        return get_option('date_format', Config::get('config.date_format'));
    }
}
function wp_parse_args($args, $defaults = '')
{
    if (is_object($args)) {
        $r = get_object_vars($args);
    } elseif (is_array($args)) {
        $r = &$args;
    } else {
        wp_parse_str($args, $r);
    }

    if (is_array($defaults)) {
        foreach ($defaults as $key => $value) {
            if (isset($r[$key]) && !empty($r[$key])) {
                $defaults[$key] = $r[$key];
            }
        }
        return $defaults;
    }
    return $r;
}
function detect_link(string $value, int $img = 1, int $video = 1, array $protocols = array('http', 'mail', 'twitter', 'https'), array $attributes = array('target' => '_blank'), $video_height = 400)
{
    $links = array();
    $value = preg_replace_callback('~(<a .*?>.*?</a>|<.*?>)~i', function ($match) use (&$links) {
        return '<' . array_push($links, $match[1]) . '>';
    }, $value);
    foreach ((array)$protocols as $protocol) {
        switch ($protocol) {
            case 'http':
            case 'https':
                $value = preg_replace_callback(
                    '~(?:\(?(https?)://([^\s\!]+)(?<![?,:.\"]))~i',
                    function ($match) use ($protocol, &$links, $attributes, $img, $video, $video_height) {
                        if ($match[1]) {

                            $protocol = $match[1];
                            $str = $match[0];
                            if ($str[0] === '(') {
                                $match[2] = substr($match[2], 0, -1);
                            }
                            $link = $match[2] ?: $match[3];
                            if ($video) {
                                if (strpos($link, 'youtube.com') !== false || strpos($link, 'youtu.be') !== false) {
                                    $exp = explode('=', $link);
                                    $ht = '<iframe width="100%" height="' . $video_height . '" src="https://www.youtube.com/embed/' . end($exp) . '?rel=0&showinfo=0&color=orange&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>';
                                    return '<' . array_push($links, $ht) . '></a>';
                                }
                                if (strpos($link, 'vimeo.com') !== false) {
                                    $exp = explode('/', $link);
                                    $ht = '<iframe width="100%" height="' . $video_height . '" src="https://player.vimeo.com/video/' . end($exp) . '" frameborder="0" allowfullscreen></iframe>';
                                    return '<' . array_push($links, $ht) . '></a>';
                                }
                            }
                            if ($img) {
                                if (strpos($link, '.png') !== false || strpos($link, '.jpg') !== false || strpos($link, '.jpeg') !== false || strpos($link, '.gif') !== false || strpos($link, '.bmp') !== false || strpos($link, '.webp') !== false) {
                                    return '<' . array_push($links, "<a target='_blank' href=\"$protocol://$link\" class=\"htmllink\"><img alt=\"" . __('Attachment') . "\" src=\"$protocol://$link\" class=\"htmlimg\">") . '></a>';
                                }
                            }

                            if ($str[0] === '(') {
                                return '<' . array_push($links, "(<a target='_blank' href=\"$protocol://$link\" class=\"htmllink\">$link</a>)") . '>';
                            } else {
                                return '<' . array_push($links, "<a target='_blank' href=\"$protocol://$link\" class=\"htmllink\">$link</a>") . '>';
                            }
                        }
                    },
                    $value
                );
                break;
            case 'mail':
                $value = preg_replace_callback('~([^\s<]+?@[^\s<]+?\.[^\s<]+)(?<![\.,:])~', function ($match) use (&$links, $attributes) {
                    return '<' . array_push($links, "<a target='_blank' href=\"mailto:{$match[1]}\" class=\"htmllink\">{$match[1]}</a>") . '>';
                }, $value);
                break;
            case 'twitter':
                $value = preg_replace_callback('~(?<!\w)[@#]([\w\._]+)~', function ($match) use (&$links, $attributes) {
                    return '<' . array_push($links, "<a target='_blank' href=\"https://twitter.com/" . ($match[0][0] == '@' ? '' : 'search/%23') . $match[1] . "\" class=\"htmllink\">{$match[0]}</a>") . '>';
                }, $value);
                break;
            default:
                $value = preg_replace_callback('~' . preg_quote($protocol, '~') . '://([^\s<]+?)(?<![\.,:])~i', function ($match) use ($protocol, &$links, $attributes) {
                    return '<' . array_push($links, "<a target='_blank' href=\"$protocol://{$match[1]}\" class=\"htmllink\">{$match[1]}</a>") . '>';
                }, $value);
                break;
        }
    }
    return preg_replace_callback('/<(\d+)>/', function ($match) use (&$links) {
        return $links[$match[1] - 1];
    }, $value);
}
function force_balance_tags($text)
{
    $tagstack = array();
    $stacksize = 0;
    $tagqueue = '';
    $newtext = '';
    // Known single-entity/self-closing tags
    $single_tags = array('area', 'base', 'basefont', 'br', 'col', 'command', 'embed', 'frame', 'hr', 'img', 'input', 'isindex', 'link', 'meta', 'param', 'source');
    // Tags that can be immediately nested within themselves
    $nestable_tags = array('blockquote', 'div', 'object', 'q', 'span');

    // WP bug fix for comments - in case you REALLY meant to type '< !--'
    $text = str_replace('< !--', '<    !--', $text);
    // WP bug fix for LOVE <3 (and other situations with '<' before a number)
    $text = preg_replace('#<([0-9]{1})#', '&lt;$1', $text);

    while (preg_match('/<(\/?[\w:]*)\s*([^>]*)>/', $text, $regex)) {
        $newtext .= $tagqueue;

        $i = strpos($text, $regex[0]);
        $l = strlen($regex[0]);

        // clear the shifter
        $tagqueue = '';
        // Pop or Push
        if (isset($regex[1][0]) && '/' == $regex[1][0]) { // End Tag
            $tag = strtolower(substr($regex[1], 1));
            // if too many closing tags
            if ($stacksize <= 0) {
                $tag = '';
                // or close to be safe $tag = '/' . $tag;

                // if stacktop value = tag close value then pop
            } elseif ($tagstack[$stacksize - 1] == $tag) { // found closing tag
                $tag = '</' . $tag . '>'; // Close Tag
                // Pop
                array_pop($tagstack);
                $stacksize--;
            } else { // closing tag not at top, search for it
                for ($j = $stacksize - 1; $j >= 0; $j--) {
                    if ($tagstack[$j] == $tag) {
                        // add tag to tagqueue
                        for ($k = $stacksize - 1; $k >= $j; $k--) {
                            $tagqueue .= '</' . array_pop($tagstack) . '>';
                            $stacksize--;
                        }
                        break;
                    }
                }
                $tag = '';
            }
        } else { // Begin Tag
            $tag = strtolower($regex[1]);

            // Tag Cleaning

            // If it's an empty tag "< >", do nothing
            if ('' == $tag) {
                // do nothing
            } elseif (substr($regex[2], -1) == '/') { // ElseIf it presents itself as a self-closing tag...
                // ...but it isn't a known single-entity self-closing tag, then don't let it be treated as such and
                // immediately close it with a closing tag (the tag will encapsulate no text as a result)
                if (!in_array($tag, $single_tags)) {
                    $regex[2] = trim(substr($regex[2], 0, -1)) . "></$tag";
                }
            } elseif (in_array($tag, $single_tags)) { // ElseIf it's a known single-entity tag but it doesn't close itself, do so
                $regex[2] .= '/';
            } else { // Else it's not a single-entity tag
                // If the top of the stack is the same as the tag we want to push, close previous tag
                if ($stacksize > 0 && !in_array($tag, $nestable_tags) && $tagstack[$stacksize - 1] == $tag) {
                    $tagqueue = '</' . array_pop($tagstack) . '>';
                    $stacksize--;
                }
                $stacksize = array_push($tagstack, $tag);
            }

            // Attributes
            $attributes = $regex[2];
            if (!empty($attributes) && $attributes[0] != '>') {
                $attributes = ' ' . $attributes;
            }

            $tag = '<' . $tag . $attributes . '>';
            //If already queuing a close tag, then put this tag on, too
            if (!empty($tagqueue)) {
                $tagqueue .= $tag;
                $tag = '';
            }
        }
        $newtext .= substr($text, 0, $i) . $tag;
        $text = substr($text, $i + $l);
    }

    // Clear Tag Queue
    $newtext .= $tagqueue;

    // Add Remaining text
    $newtext .= $text;

    // Empty Stack
    while ($x = array_pop($tagstack)) {
        $newtext .= '</' . $x . '>'; // Add remaining tags to close
    }

    // WP fix for the bug with HTML comments
    $newtext = str_replace('< !--', '<!--', $newtext);
    $newtext = str_replace('<    !--', '< !--', $newtext);

    return $newtext;
}
function balanceTags($text, $force = false, $detect_link = false)
{
    $text = str_replace('<script>', '&lt;script&gt;', $text);
    $text = str_replace('</script>', '&lt;/script&gt;', $text);
    return $detect_link ? detect_link(force_balance_tags($text)) : force_balance_tags($text);
}
function dashboard_pagination($args = [])
{
    $defaults = [
        'range' => 4,
        'total' => 0,
        'previous_string' => 'Prev',
        'next_string' => 'Next',
        'before_output' => '<nav aria-label="navigation"><ul class="pagination">',
        'after_output' => '</ul></nav>',
        'posts_per_page' => 12,
    ];

    $args = wp_parse_args($args, $defaults);
    $args['range'] = (int)$args['range'] - 1;
    $posts_per_page = $args['posts_per_page'];

    $count = ceil($args['total'] / $posts_per_page);

    $current_params = \Illuminate\Support\Facades\Route::current()->parameters();
    $page = isset($current_params['page']) ? $current_params['page'] : 1;
    $ceil = ceil($args['range'] / 2);
    if ($count <= 1)
        return false;
    if (!$page)
        $page = 1;
    if ($count > $args['range']) {
        if ($page <= $args['range']) {
            $min = 1;
            $max = $args['range'] + 1;
        } elseif ($page >= ($count - $ceil)) {
            $min = $count - $args['range'];
            $max = $count;
        } elseif ($page >= $args['range'] && $page < ($count - $ceil)) {
            $min = $page - $ceil;
            $max = $page + $ceil;
        }
    } else {
        $min = 1;
        $max = $count;
    }
    $echo = '';
    $url = dashboard_url(Route::currentRouteName());
    foreach ($current_params as $key => $param) {
        if ($key !== 'page') {
            $url .= '/' . $param;
        }
    }
    $previous_num = intval($page) - 1;


    $previous = $url . '/' . $previous_num . '/';

    if ($previous && (1 == $page)) {
        $echo .= ' <a href="#" class="prev"><li>' . $args['previous_string'] . '</li></a>';
    }
    if ($previous && (1 != $page)) {
        $echo .= '<li class="page-item"><a class="page-link" data-pagination="' . $previous_num . '" href="' . $previous . '" title="previous">' . $args['previous_string'] . '</a></li>';
    }
    if (!empty($min) && !empty($max)) {
        for ($i = $min; $i <= $max; $i++) {
            if ($page == $i) {
                $echo .= '  <a class="is-active" data-pagination="' . $i . '" href="javascript:void(0);"><li>' . str_pad((int)$i, 1, '0', STR_PAD_LEFT) . '</li></a>';
            } else {
                $_url = $url . '/' . $i . '/';
                $echo .= sprintf('<li class="page-item"><a class="page-link" data-pagination="' . $i . '" href="%s">%2d</a></li>', $_url, $i);
            }
        }
    }
    $next_num = intval($page) + 1;

    $next = $url . '/' . $next_num . '/';

    if ($next && ($count == $page)) {
        $echo .= '<li class="disabled"><a class="page-link" href="javascript:void(0);" title="next">' . $args['next_string'] . '</a></li>';
    }
    if ($next && ($count != $page)) {
        $echo .= '<li class="page-item"><a class="page-link" data-pagination="' . $next_num . '" href="' . $next . '" title="next">' . $args['next_string'] . '</a></li>';
    }
    if (isset($echo))
        echo balanceTags($args['before_output'] . $echo . $args['after_output']);
}


function is_email($email)
{

    if (strlen($email) < 6) {
        return false;
    }

    if (strpos($email, '@', 1) === false) {
        return false;
    }

    list($local, $domain) = explode('@', $email, 2);

    if (!preg_match('/^[a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~\.-]+$/', $local)) {
        return false;
    }

    if (preg_match('/\.{2,}/', $domain)) {
        return false;
    }

    if (trim($domain, " \t\n\r\0\x0B.") !== $domain) {
        return false;
    }

    $subs = explode('.', $domain);

    if (2 > count($subs)) {
        return false;
    }

    foreach ($subs as $sub) {
        if (trim($sub, " \t\n\r\0\x0B-") !== $sub) {
            return false;
        }

        if (!preg_match('/^[a-z0-9-]+$/i', $sub)) {
            return false;
        }
    }

    return $email;
}
function hexToRGB($color)
{
    $rgb = [0, 0, 0];

    if ('#' == $color[0]) {
        $color = substr($color, 1);
    }

    if (strlen($color) == 6) {
        list($r, $g, $b) = [$color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]];
    } elseif (strlen($color) == 3) {
        list($r, $g, $b) = [$color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]];
    } else {
        return $rgb;
    }

    $rgb[0] = hexdec($r);
    $rgb[1] = hexdec($g);
    $rgb[2] = hexdec($b);

    return $rgb;
}

function _hexToRGB($hex, $name = false)
{

    if (strpos($hex, '#') === false) {
        $hex = '#' . $hex;
    }

    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");

    if ($name) {
        $rgb['red']   = $r; //hexdec( $r );
        $rgb['green'] = $g; //hexdec( $g );
        $rgb['blue']  = $b; //hexdec( $b );
    } else {
        $rgb[0] = $r; //hexdec( $r );
        $rgb[1] = $g; //hexdec( $g );
        $rgb[2] = $b; //hexdec( $b );
    }

    return $rgb;
}
function hueToRGB($m1, $m2, $h)
{
    if ($h < 0) {
        $h += 1;
    } elseif ($h > 1) {
        $h -= 1;
    }

    if ($h * 6 < 1) {
        return $m1 + ($m2 - $m1) * $h * 6;
    }

    if ($h * 2 < 1) {
        return $m2;
    }

    if ($h * 3 < 2) {
        return $m1 + ($m2 - $m1) * (2 / 3 - $h) * 6;
    }

    return $m1;
}

function HSLtoRGB($hue, $saturation, $lightness)
{
    if ($hue < 0) {
        $hue += 360;
    }

    $h = $hue / 360;

    $s = min(100, max(0, $saturation)) / 100;
    $l = min(100, max(0, $lightness)) / 100;

    $m2 = $l <= 0.5 ? $l * ($s + 1) : $l + $s - $l * $s;
    $m1 = $l * 2 - $m2;

    $r = hueToRGB($m1, $m2, $h + 1 / 3) * 255;
    $g = hueToRGB($m1, $m2, $h) * 255;
    $b = hueToRGB($m1, $m2, $h - 1 / 3) * 255;

    $out = [$r, $g, $b];

    return $out;
}

function RGBtoHSL($red, $green, $blue)
{

    $min = min($red, $green, $blue);
    $max = max($red, $green, $blue);
    $l = $min + $max;
    $d = $max - $min;

    if ((int) $d === 0) {
        $h = $s = 0;
    } else {
        if ($l < 255) {
            $s = $d / $l;
        } else {
            $s = $d / (510 - $l);
        }
        if ($red == $max) {
            $h = 60 * ($green - $blue) / $d;
        } elseif ($green == $max) {
            $h = 60 * ($blue - $red) / $d + 120;
        } elseif ($blue == $max) {
            $h = 60 * ($red - $green) / $d + 240;
        }
    }

    return [fmod($h, 360), $s * 100, $l / 5.1];
}

function adjustHsl($color, $idx, $amount)
{

    $hsl = RGBtoHSL($color[0], $color[1], $color[2]);

    $hsl[$idx] += $amount;
    $out = HSLtoRGB($hsl[0], $hsl[1], $hsl[2]);

    if (isset($color[3])) {
        $out[3] = $color[3];
    }

    return $out;
}

function darken($color, $amount)
{
    $color = hexToRGB($color);

    return adjustHsl($color, 2, -$amount);
}

function lighten($color, $amount)
{
    $color = hexToRGB($color);

    return adjustHsl($color, 2, $amount);
}

function init_style()
{

    $main_color = get_option('main_color', '#f8546d');
    $logo_color = lighten($main_color, -10);
    $icon_background = lighten($main_color, 10);
    $dark = lighten($main_color, -5);
    $logo_color_dark = lighten($main_color, 5);
    $dark_color = "rgb($dark[0], $dark[1], $dark[2])";
    if (!empty($main_color)) {
        if ($_COOKIE['theme'] == 'lightmode') {
            echo "<style>
                    :root {
                      --pink: {$main_color};
                      --black: #2a2a2a;
                      --blue: #1abc9c;
                      --white: #FFFFFF;
                    }
                    .header-container.fixed-top {
                     background-color: {$main_color};
                    }
                    .nav-pills .nav-link.active,
                    .nav-pills .show>.nav-link {
                        background-color: {$main_color};
                    }
                    .scroll-top-arrow {
                     background:  {$main_color};
                      }
                      .responsive-msg-component p a.close-msg-component {
                      background: {$main_color};
                        }
                        .table>thead>tr>th {
                           color: {$main_color};
                           }
                           .main-container::before {
        background-color: {$main_color};
    }
    
    .header-container.fixed-top {
        background-color: {$main_color};
    }
    .navbar .navbar-item .nav-item.dropdown.message-dropdown .nav-link:hover,
    .navbar .navbar-item .nav-item.dropdown.fullscreen-dropdown .nav-link:hover {
        background:  {$main_color};
      
    }
    .sidebar-wrapper .menu-categories li.menu.active>.dropdown-toggle {
        color: {$main_color};
     
    }
    .submenu .submenu-info ul.submenu-list li a {
        color: {$main_color};
       
    }
    .sidebar-submenu .submenu .submenu-inner-info h5, .sidebar-submenu .submenu .submenu-inner-info p {
        color: {$main_color};
    }
    .sidebar-submenu span.sidebar-submenu-close {
        background: #ebeeff;
        color: {$main_color};
    
    }
    .submenu .submenu-info ul.submenu-list li>a[aria-expanded='true'] {
        font-weight: 500;
         color: {$main_color};
    }
    .navbar .navbar-item .nav-item form.form-inline input.search-form-control {
      
        background-color: {$main_color};
      
    }
    
    .responsive-msg-component p a.close-msg-component {
   
        background: {$main_color};
       
    }
    .submenu .submenu-info ul.submenu-list li.active {
        background-color: {$main_color} !important;
        border-radius: 10px;
    }
    .fixed-profile .profile-option-container .option-link-container:hover .option-link {
        background: {$main_color};
       
    }
    .navbar .navbar-item .nav-item.dropdown.message-dropdown .nav-link:hover,
.navbar .navbar-item .nav-item.dropdown.fullscreen-dropdown .nav-link:hover {
    background:  rgb($icon_background[0], $icon_background[1], $icon_background[2]);

}
.nav-item.more-dropdown .flatpickr-input {
    border-color: rgb($icon_background[0], $icon_background[1], $icon_background[2]);
    background: {$main_color};
}
.nav-item .dash-btn {
    background-color: rgb($icon_background[0], $icon_background[1], $icon_background[2]);
}
#basic-addon2 {
    border-color:rgb($icon_background[0], $icon_background[1], $icon_background[2]);
    background-color: rgb($icon_background[0], $icon_background[1], $icon_background[2]);
}
    .header-container .navbar .language-dropdown a.nav-link:hover {
        background: rgb($icon_background[0], $icon_background[1], $icon_background[2]);
       
    }
    .right-bar .nav-link {background: {$main_color};}
    .right-bar .nav-tabs .nav-link:focus,
.nav-tabs .nav-link:hover {
    background: rgb($icon_background[0], $icon_background[1], $icon_background[2]);}
    .tl-logo-area {
        
        background: rgb($logo_color[0], $logo_color[1], $logo_color[2]);
        
    }
    .sidebar-wrapper .menu-categories li.menu>.dropdown-toggle {
        color: {$main_color};
    }
    .sidebar-wrapper .menu-categories li.menu>a[data-active='true'] {
        background-image: linear-gradient(rgb($logo_color[0], $logo_color[1], $logo_color[2]), {$main_color});
        }
        .sidebar-submenu span.sidebar-submenu-close:hover {
        background: {$main_color};
       
    }
    .fixed-profile .profile-option-container .option-link {
        background:rgb($icon_background[0], $icon_background[1], $icon_background[2]);
      }
    .main-item .new-notification {
       
        background: {$main_color};
       
    }
    .navbar .navbar-item .nav-item.dropdown.notification-dropdown .nav-link:hover {
        background: rgb($icon_background[0], $icon_background[1], $icon_background[2]);
    }
    .right-bar .nav-link.active i {
        color: {$main_color};
    }
    .responsive-msg-component p a.close-msg-component {
        
        background:  {$main_color};
       
    }
    .sidebar-wrapper .fixed-profile {
            background-color:  {$main_color};
         
        }
        .switch.switch-outline-primary input:checked + .slider {
            border: 2px solid {$main_color};
        }
        .switch.switch-icons .slider {
            width: 48px;
            height: 25px;
        }
        .switch.switch-icons input:checked + .slider:before {
            -webkit-transform: translateX(23px);
            -ms-transform: translateX(23px);
            transform: translateX(23px);
        }
        .switch.switch-icons input:checked + .slider:before {
            content: url(data:image/svg+xml, <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%23fff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-check'><polyline points='20 6 9 17 4 12'></polyline></svg>);
            vertical-align: sub;
            color: #fff;
            line-height: 1.4;
        }
        .btn-warning {
            color: #fff !important;
            background-color: #c2a86d;
            border-color: #c2a86d;
        }
        .button-list .btn, .button-list .ripple-button {
            margin-bottom: 0.3rem;
            margin-right: 10px;
        }
        .switch.switch-outline-primary input:checked + .slider:before {
            border: 2px solid {$main_color};
            background-color: {$main_color};
            box-shadow: 0 1px 15px 1px rgb(52 40 104 / 34%);
        }
        .switch.switch-outline[class*='switch-outline-'] .slider:before {
            bottom: 1px;
            left: 1px;
           
            
            color: #ebedf2;
            box-shadow: 0 1px 15px 1px rgb(52 40 104 / 25%);
        }
        .switch.switch-icons .slider:before {
            vertical-align: sub;
            color: #3b3f5c;
            height: 19px;
            width: 19px;
            line-height: 1.3;
            content: url(data:image/svg+xml, <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%23e9ecef' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-x'><line x1='18' y1='6' x2='6' y2='18'></line><line x1='6' y1='6' x2='18' y2='18'></line></svg>);
        }
        .switch.switch-outline .slider {
            border: 2px solid #ebedf2;
            background-color: transparent;
            
        }
                </style>";
        } else {
            echo "<style>
        :root {
          --pink: {$dark_color};
          --black: #2a2a2a;
          --blue: #1abc9c;
          --white: #FFFFFF;
        }
        .darkmode .main-container::before {
            background-color: {$dark_color};
        }
        .btn-warning {
            color: #fff !important;
            background-color: #c2a86d;
            border-color: #c2a86d;
        }
        .button-list .btn, .button-list .ripple-button {
            margin-bottom: 0.3rem;
            margin-right: 10px;
        }
        .darkmode .sidebar-wrapper .menu-categories li.menu>.dropdown-toggle:hover {
            color: {$dark_color};
        }
        .darkmode .header-container.fixed-top {
            background-color: {$dark_color};
        }
        .darkmode .header-container {
            border-bottom: 1px solid {$dark_color};
        }
        .darkmode .right-bar .nav-tabs .nav-link.active {
            background-color: {$dark_color};
        }
        .darkmode .navbar .navbar-item .nav-item .form-inline.search .search-form-control { 
            background-color: {$dark_color} !important;
            
        }
        .submenu .submenu-info ul.submenu-list li.active {
            background-color: {$dark_color} !important;
            border-radius: 10px;
        }
        .sidebar-submenu span.sidebar-submenu-close {
            background: {$dark_color};
            color:#fff;
        }
        .sidebar-submenu span.sidebar-submenu-close:hover {
            background: {$dark_color};
           
        }
        .sidebar-wrapper .menu-categories li.menu>a[data-active='true'] {
            background-image: linear-gradient( rgb($logo_color_dark[0], $logo_color_dark[1], $logo_color_dark[2]),{$dark_color});
            }
        .darkmode .tl-logo-area {
            background:rgb($logo_color_dark[0], $logo_color_dark[1], $logo_color_dark[2]);
        }
.sidebar-wrapper .fixed-profile {
background-color:  {$dark_color};

}
.darkmode .scroll-top-arrow {
    background: {$dark_color};
}
.responsive-msg-component p a.close-msg-component {
   
    background: {$dark_color};
   
}
.main-item .new-notification {
       
    background: {$dark_color};
   
}
.fixed-profile .profile-option-container .option-link {
    background:rgb($logo_color_dark[0], $logo_color_dark[1], $logo_color_dark[2]);
  }
  .fixed-profile .profile-option-container .option-link-container:hover .option-link {
    background: {$dark_color};
   
}
.navbar .navbar-item .nav-item.dropdown.notification-dropdown .nav-link:hover {
    background: rgb($logo_color_dark[0], $logo_color_dark[1], $logo_color_dark[2]);
}
.header-container .navbar .language-dropdown a.nav-link:hover {
    background: rgb($logo_color_dark[0], $logo_color_dark[1], $logo_color_dark[2]);
   
}
.navbar .navbar-item .nav-item.dropdown.message-dropdown .nav-link:hover,
    .navbar .navbar-item .nav-item.dropdown.fullscreen-dropdown .nav-link:hover {
        background:  rgb($logo_color_dark[0], $logo_color_dark[1], $logo_color_dark[2]);
      
    }
    .right-bar .nav-link {background: {$dark_color};}
    .right-bar .nav-tabs .nav-link:focus,
.nav-tabs .nav-link:hover {
    background: rgb($logo_color_dark[0], $logo_color_dark[1], $logo_color_dark[2]);}
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background-color: {$dark_color};
    }
    .switch.switch-outline-primary input:checked + .slider {
        border: 2px solid {$dark_color};
    }
    .switch.switch-icons .slider {
        width: 48px;
        height: 25px;
    }
    .switch.switch-icons input:checked + .slider:before {
        -webkit-transform: translateX(23px);
        -ms-transform: translateX(23px);
        transform: translateX(23px);
    }
    .switch.switch-icons input:checked + .slider:before {
        content: url(data:image/svg+xml, <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%23fff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-check'><polyline points='20 6 9 17 4 12'></polyline></svg>);
        vertical-align: sub;
        color: #fff;
        line-height: 1.4;
    }
    .switch.switch-outline-primary input:checked + .slider:before {
        border: 2px solid {$dark_color};
        background-color: {$dark_color};
        box-shadow: 0 1px 15px 1px rgb(52 40 104 / 34%);
    }
    .switch.switch-outline[class*='switch-outline-'] .slider:before {
        bottom: 1px;
        left: 1px;
      
        
        color: #ebedf2;
        box-shadow: 0 1px 15px 1px rgb(52 40 104 / 25%);
    }
    .switch.switch-icons .slider:before {
        vertical-align: sub;
        color: #3b3f5c;
        height: 19px;
        width: 19px;
        line-height: 1.3;
        content: url(data:image/svg+xml, <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%23e9ecef' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-x'><line x1='18' y1='6' x2='6' y2='18'></line><line x1='6' y1='6' x2='18' y2='18'></line></svg>);
    }
    .switch.switch-outline .slider {
        border: 2px solid #ebedf2;
        background-color: transparent;
        
    }
    .nav-settings {
        color: #fff;
    }
    </style>";
        }
    }
    $google_font = get_option('google_font');
    if (!empty($google_font)) {
        $google_font = explode(';', $google_font);
        if (count($google_font) == 3 && !empty($google_font[0])) {
            $font_name = ucwords(str_replace('-', ' ', $google_font[0]));
            $font_weight = $google_font[1];
            $font_lang = $google_font[2];

            $url = 'https://fonts.googleapis.com/css?family=' . $font_name;
            if (!empty($font_weight)) {
                $url .= ':' . $font_weight;
            }
            if (!empty($font_lang)) {
                $url .= ':' . $font_lang;
            }
            echo '<link href="' . e($url) . '" rel="stylesheet">';
            echo "<style>
                        body{
                            font-family: '{$font_name}', sans-serif;
                        }
                        .awe-booking h1, .awe-booking h2, .awe-booking h3, .awe-booking h4, .awe-booking h5, .awe-booking h6{
                            font-family: '{$font_name}', sans-serif;
                        }
                    </style>";
        }
    }
    $css = get_option('custom_css');
    $css = base64_decode($css);
    if (!empty($css)) {
        echo '<style>' . balanceTags($css) . '</style>';
    }
}
