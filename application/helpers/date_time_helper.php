<?php

if (! function_exists('date_time_format')) 
{
    function date_time_format($userdate){
		return date("d M 'y H:i", strtotime($userdate));
    }
}

if (! function_exists('date_formats')) 
{
    function date_formats($userdate){
		return date("d M 'y", strtotime($userdate));
    }
}

if (! function_exists('time_format')) 
{
    function time_format($userdate){
		return date("H:i", strtotime($userdate));
    }
}



function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>

