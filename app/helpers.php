<?php

use Carbon\Carbon;
use App\Models\Account;
use App\Models\Supervisor;
use App\Models\Telecaller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Laravolt\Avatar\Facade as Avatar;

if (!function_exists('createAvatar')) {
    function createAvatar($name = null, $path = 'uploads/images'): string
    {
        if (!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $name = $name ? $name . '_' . time() . '_' . uniqid() : time() . '_' . uniqid();
        Avatar::create($name)->save("{$path}/{$name}.png");

        return "{$path}/{$name}.png";
    }
}

if (!function_exists('uploadImage')) {
    function uploadImage($file, $path)
    {
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('/uploads/' . $path . '/'), $fileName);

        return "uploads/$path/" . $fileName;
    }
}

if (!function_exists('flashSuccess')) {
    function flashSuccess(string $msg)
    {
        session()->flash('success', $msg);
    }
}


/**
 * Response error flash message.
 *
 * @param string $msg
 * @return \Illuminate\Http\Response
 */
if (!function_exists('flashError')) {
    function flashError(string $message = null)
    {
        if (!$message) {
            $message = __('something_went_wrong');
        }

        return session()->flash('error', $message);
    }
}

/**
 * Response warning flash message.
 *
 * @param string $msg
 * @return \Illuminate\Http\Response
 */
if (!function_exists('flashWarning')) {
    function flashWarning(string $message = null, bool $custom = false)
    {
        if (!$message) {
            $message = __('something_went_wrong');
        }

        if ($custom) {
            return session()->flash('warning', $message);
        } else {
            return session()->flash('warning', $message);
        }
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date, $formatFrom = 'Y-m-d H:i:s', $formatTo = 'M j, Y')
    {
        if (!$date instanceof Carbon) {
            $date = new Carbon($date, 'UTC'); // Assume UTC timezone, adjust as needed
        }

        return $date->format($formatTo);
    }
}

if (!function_exists('AmountInWords')) {
    
function AmountInWords(float $amount)
{
    $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;

    // Check if there is any number after decimal
    $amt_hundred = null;
    $count_length = strlen($num);
    $x = 0;
    $string = array();
    $change_words = array(
        0 => 'Zero', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Fourty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety'
    );
    $here_digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($x < $count_length) {
        $get_divider = ($x == 2) ? 10 : 100;
        $amount = floor($num % $get_divider);
        $num = floor($num / $get_divider);
        $x += $get_divider == 10 ? 1 : 2;
        if ($amount) {
            $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
            $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
            $string[] = ($amount < 21) ? $change_words[$amount] . ' ' . $here_digits[$counter] . $add_plural . '
       ' . $amt_hundred : $change_words[floor($amount / 10) * 10] . ' ' . $change_words[$amount % 10] . '
       ' . $here_digits[$counter] . $add_plural . ' ' . $amt_hundred;
        } else $string[] = null;
    }
    $implode_to_Rupees = implode('', array_reverse($string));
    $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . "
   " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
    return ($implode_to_Rupees ? $implode_to_Rupees . 'Rupees ' : '') . $get_paise;
}

$amount_to_be_convert = 1200.85;

if (isset($_POST['submit'])) {
    $amount_to_be_convert = $_POST['amount'];
}
$paid_ammount = round($amount_to_be_convert);
$get_round_amount = AmountInWords($paid_ammount);
$get_exact_amount = AmountInWords($amount_to_be_convert);
}


if (!function_exists('moneyFormatIndia')) {
    function moneyFormatIndia($num) {
    $explrestunits = "" ;
    if(strlen($num)>3) {
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end
            if($i==0) {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            } else {
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash; // writes the final format where $currency is the currency symbol.
}
}