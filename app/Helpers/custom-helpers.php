<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

function welcome_word()
{

    $return = '';
    /* This sets the $time variable to the current hour in the 24 hour clock format */
    $time = date("H");
    /* If the time is less than 1200 hours, show good morning */
    if ($time < "12") {
        $return =  "Good Morning, and have a nice day 🤗";
    } else
        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "12" && $time < "15") {
            $return =  "Good Afternoon, and have a nice day 😇";
        } else
            /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
            if ($time >= "15" && $time < "19") {
                $return = "Good Afternoon. Hope you have an afternoon as lovely as you are 🥰";
            } else
                /* Finally, show good night if the time is greater than or equal to 1900 hours */
                if ($time >= "19") {
                    $return =  "Good Evening, and keep spirit! 😆";
                }

    return ($return);
}

// Toaster
function toaster($msg, $type, $title)
{
    return array(
        'title'         => $title,
        'message'       => $msg,
        'alert-type'    => $type
    );
}

function SVGI($name)
{
    return svg($name)->contents;
}

function ButtonSED($data, $route_type, $permission_type, $show = true)
{
    $button = '';
    if ($show) {
        $button .= '<a href="' . route($route_type . '.show', $data->id) . '" class="btn btn-icon btn-warning btn-sm"  data-toggle="tooltip" title="Show">
            ' . SVGI('bi-eye') . '
        </a>';
    }
    if (auth()->user()->can($permission_type . '.edit')) {
        $button .= ' <a href="' . route($route_type . '.edit', $data->id) . '" class="btn btn-icon btn-primary btn-sm"  data-toggle="tooltip" title="Edit">
        ' . SVGI('bi-pencil-square') . '
        </a>';
    }
    if (auth()->user()->can($permission_type . '.delete')) {
        $button .= ' <button class="btn btn-icon btn-sm btn-delete btn-danger" data-remote="' . route($route_type . '.destroy', $data->id) . '" data-toggle="tooltip" title="Delete">
        ' . SVGI('bi-trash') . '
        </button>';
    }

    return $button;
}

function CreateButton($route, $permission_type)
{
    $button = '';
    // dd($permission_type);
    if (auth()->user()->can($permission_type . '.create')) {
        $button = '<div class="dt-action-buttons text-right">
            <div class="dt-buttons">
                <a href="' . route($route . '.create') . '" class="dt-button create-new btn btn-primary">
                    <i data-feather="plus"></i>
                    Add New Record
                </a>
            </div>
        </div>';
    }
    echo $button;
}

function BackButton($route = false, $submit = false, $back = true)
{
    $button = '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="dt-action-buttons text-right">
            <div class="dt-buttons">';
    if ($submit) {
        # code...

        $button .= '<button class="btn btn-primary data-submit">Submit</button>';
    }
    if ($back) {
        # code...
        // $button .= '<a href="' . route($route . '.index')  . '" class="dt-button btn btn-primary btn-warning">
        //                 <i data-feather="chevrons-left"></i>
        //                 Back
        //             </a>';
        $button .= '<button onclick="history.back()" class="dt-button create-new btn btn-warning">
                        <i data-feather="chevrons-left"></i>
                        Back
                    </button>';
    }

    $button .=  '</div>
    </div>
        </div>';
    echo $button;
}


// function membuat nested array
function makeNested($source)
{
    $nested = array();

    foreach ($source as &$s) {
        if (is_null($s['parent_id'])) {
            $nested[] = &$s;
        } else {
            $pid = $s['parent_id'];
            if (isset($source[$pid])) {

                if (!isset($source[$pid]['submenu'])) {
                    $source[$pid]['submenu'] = array();
                }

                $source[$pid]['submenu'][] = &$s;
            }
        }
    }
    return $nested;
}

// fungsi membuat avatar
function get_avatar($str)
{
    $acronym    = '';
    $word       = '';
    $words      = preg_split("/(\s|\-|\.)/", $str);
    foreach ($words as $w) {
        $acronym .= substr($w, 0, 1);
    }
    $word = $word . $acronym;
    return $word;
}

function topThree($item, $merchant)
{
    // dd($item);
    $html = '';
    if ($item->seq == '1') {
        $position   = '1st';
        $class      = 'bg-light-success';
    }
    if ($item->seq == '2') {
        $position   = '2nd';
        $class      = 'bg-light-warning';
    }
    if ($item->seq == '3') {
        $position   = '3rd';
        $class      = 'bg-light-danger';
    }
    if ($merchant == 'MERCHANT') {
        $svg = 'bi-cart3';
    } else {
        $svg = 'bi-cash-stack';
    }

    if ($item->groups == $merchant) {
        $html = '<div class="col-4">
            <div class="media">
                <div class="avatar ' . $class . ' mr-2">
                    <div class="avatar-content">
                        ' . SVGI($svg) . '
                    </div>
                </div>
                <div class="media-body my-auto">
                    <p class="card-text font-small-3 mb-0">' . $position . ' ' . ucfirst(strtolower($merchant)) . ' </p>
                    <h4 data-toggle="tooltip" data-original-title="Total Amount Rp 0" class="font-weight-bolder mb-0">
                        ' . $item->totalTransaction . ' TRX</h4>
                    <p class="card-text font-small-3 mb-0">
                        ' . Str::upper($item->detailGroup) . '</p>
                    <br>
                </div>
            </div>
        </div>';
    }
    return $html;
}

function topThreeAmt($item, $merchant)
{
    // dd($item);
    $html = '';
    if ($item->seq == '1') {
        $position   = '1st';
        $class      = 'bg-light-success';
    }
    if ($item->seq == '2') {
        $position   = '2nd';
        $class      = 'bg-light-warning';
    }
    if ($item->seq == '3') {
        $position   = '3rd';
        $class      = 'bg-light-danger';
    }
    if ($merchant == 'MERCHANT') {
        $svg = 'bi-cart3';
    } else {
        $svg = 'bi-cash-stack';
    }

    if ($item->groups == $merchant) {
        $html = '<div class="col-4">
            <div class="media">
                <div class="avatar ' . $class . ' mr-2">
                    <div class="avatar-content">
                        ' . SVGI($svg) . '
                    </div>
                </div>
                <div class="media-body my-auto">
                    <p class="card-text font-small-3 mb-0">' . $position . ' ' . ucfirst(strtolower($merchant)) . ' </p>
                    <h4 data-toggle="tooltip" data-original-title="Total Amount Rp 0" class="font-weight-bolder mb-0">
                       Rp.  ' . number_format($item->totalTransaction) . ' </h4>
                    <p class="card-text font-small-3 mb-0">
                        ' . Str::upper($item->detailGroup) . '</p>
                    <br>
                </div>
            </div>
        </div>';
    }
    return $html;
}

function createdAt($created)
{
    return date('Y-m-d H:i:s', strtotime($created));
}

function partnerReferenceNo($w)
{
    $digits = 8;
    $string = date('YmdHis');
    $string .= rand(pow(10, $digits - 1), pow(10, $digits) - 1);
    return $string;
}

function isJSON($string)
{
    return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
}
