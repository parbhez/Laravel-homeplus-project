<?php

namespace App\Http;

use Image;

class Helper
{
    public static function imageUpload($insertId = null, $imageData = null, $folderPath = null, $height = null, $width = null)
    {
        $image = isset($imageData) ? $imageData : null;
        if (empty($image)) {
            $fileName = NULL;
        } else {
            if ($image->isValid()) {
                $destinationPath = public_path() . $folderPath;
                $extension = $image->getClientOriginalExtension();
                $uniqPath = substr($imageData->getPathName(),16,4);
                $fileName = $insertId . '-' . date("Ymdhis") . $uniqPath . '.' . $extension; // renameing image
            }
        }
        if ($fileName != NULL) {
            $imgSize = Image::make($image->getRealPath())->filesize() / 1024;

            if ($imgSize > 1024) {
                return "tooLarge";
            }
            if ($width && $height) {
                Image::make($image->getRealPath())
                    ->resize($width, $height)
                    ->save($destinationPath . $fileName)
                    ->destroy();
            } else {
                Image::make($image->getRealPath())
                    ->save($destinationPath . $fileName)
                    ->destroy();
            }

        }
        return $fileName;
    }

    public static function dateFormat($date)
    {
        return date("d-m-Y h:i:s A", strtotime($date));
    }

    public static function onlyDMY($date)
    {
        return date("d-m-Y", strtotime($date));
    }

    public static function onlyMY($date)
    {
        return date("F Y", strtotime($date));
    }

    public static function formatYmd($date)
    {
        $convert = str_replace('/', '-', $date);
        return date('Y-m-d', strtotime($convert));
    }

    public static function sqlYMD($date)
    {
        return date('Y-m-d', strtotime($date));
    }

    public static function carbonFormat($date)
    {
        //$convert = str_replace('/', '-', $date);
        $convertToCarbon = date('Y-m-d', strtotime($date));
        return Carbon::CreateFromFormat('Y-m-d', $convertToCarbon);
    }

    public static function publishedAt($date)
    {
        return date("d M Y", strtotime($date));
    }

    //only time
    public static function onlyTime($date)
    {
        return date("H:i A", strtotime($date));
    }

    public static function dateTime()
    {
        return date('Y-m-d H:i:s');
    }

    public static function arrayObjectToArray($obj = null)
    {
        $newArray = [];
        foreach ($obj as $key => $value) {
            $newArray[] = (array)$value;
        }
        return $newArray;
    }

    public static function convert_number($number)
    {
        if (($number < 0) || ($number > 999999999)) {
            throw new Exception("Number is out of range");
        }
        $Gn = floor($number / 100000);  /* Millions (giga) */
        $number -= $Gn * 100000;
        $kn = floor($number / 1000);     /* Thousands (kilo) */
        $number -= $kn * 1000;
        $Hn = floor($number / 100);      /* Hundreds (hecto) */
        $number -= $Hn * 100;
        $Dn = floor($number / 10);       /* Tens (deca) */
        $n = $number % 10;               /* Ones */

        $res = "";

        if ($Gn) {
            $res .= Helper::convert_number($Gn) . " Lacs";
        }

        if ($kn) {
            $res .= (empty($res) ? "" : " ") .
                Helper::convert_number($kn) . " Thousand";
        }

        if ($Hn) {
            $res .= (empty($res) ? "" : " ") .
                Helper::convert_number($Hn) . " Hundred";
        }

        $ones = array("", "One", "Two", "Three", "Four", "Five", "Six",
            "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen",
            "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen",
            "Nineteen");
        $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty",
            "Seventy", "Eigthy", "Ninety");

        if ($Dn || $n) {
            if (!empty($res)) {
                $res .= " and ";
            }
            if ($Dn < 2) {
                $res .= $ones[$Dn * 10 + $n];
            } else {
                $res .= $tens[$Dn];
                if ($n) {
                    $res .= "-" . $ones[$n];
                }
            }
        }

        if (empty($res)) {
            $res = "zero";
        }
        return $res;
    }

    //Convert Bangla Date Time
    public static function bnNum($num)
    {
        $search_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", ",");
        $replace_array = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", ",");
        // convert all en char to bn char
        return str_replace($search_array, $replace_array, $num);
    }

    public static function bnTime($date)
    {
        $enDate = date("g:i a", strtotime($date));
        $search_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "am", "pm", ":", ",");
        $replace_array = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "মিঃ", "মিঃ", ":", ",");
        // convert all en char to bn char
        return str_replace($search_array, $replace_array, $enDate);
    }

    public static function bnDate($date)
    {
        $enDate = date("j F Y", strtotime($date));
        $search_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", ":", ",");
        $replace_array = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বার", "অক্টোবার", "নভেম্বার", "ডিসেম্বার", ":", ",");
        // convert all en char to bn char
        return str_replace($search_array, $replace_array, $enDate);
    }
}