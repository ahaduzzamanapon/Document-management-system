<?php
namespace App\Http\Helpers;

class Converter 
{
    public static $bn = ["১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০"];
    public static $en = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];
    public static $en_months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    public static $en_short_months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    public static $bn_months = ['জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'];

    // Days
    public static $en_days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
    public static $en_short_days = ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
    public static $bn_short_days = ['শনি', 'রবি', 'সোম', 'মঙ্গল', 'বুধ', 'বৃহঃ', 'শুক্র'];
    public static $bn_days = ['শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার'];

    // Times
    public static $en_times = array('am', 'pm');
    public static $en_times_uppercase = array('AM', 'PM');
    public static $bn_times = array('পূর্বাহ্ন', 'অপরাহ্ন');


    public static function bn2en($number)
    {
        return str_replace(self::$bn, self::$en, $number);
    }

    public static function en2bn($number)
    {
        return str_replace(self::$en, self::$bn, $number);
    }
    public static function bn_date($date)
    {
        // Convert Numbers
        $date = str_replace(self::$en, self::$bn, $date);
        
        // Convert Months
        $date = str_replace(self::$en_months, self::$bn_months, $date);
        $date = str_replace(self::$en_short_months, self::$bn_months, $date);
        return $date;

        // Convert Days
        $date = str_replace(self::$en_days, self::$bn_days, $date);
        $date = str_replace(self::$en_short_days, self::$bn_short_days, $date);
        $date = str_replace(self::$en_days, self::$bn_days, $date);
    }

    // Method - English to Bengali Time
    public static function bn_time($time)
    {
        // Convert Numbers
        $time = str_replace(self::$en, self::$bn, $time);

        // Convert Time
        $time = str_replace(self::$en_times, self::$bn_times, $time);
        $time = str_replace(self::$en_times_uppercase, self::$bn_times, $time);
        return $time;
    }
}