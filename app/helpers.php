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

