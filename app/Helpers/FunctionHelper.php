<?php

namespace App\Helpers;

class FunctionHelper
{
    /**
     * Format a date.
     */
    public static function formatDateInfo($date, $format = 'l, F j, Y')
    {
        return \Carbon\Carbon::parse($date)->format($format);
    }
    public static function formatDate($date, $format = 'l, F j, Y H:i')
    {
        return \Carbon\Carbon::parse($date)->format($format);
    }

    /**
     * Format a mobile number.
     */
    public static function formatMobileNumber($number)
    {
        // Adjust formatting as needed
        return preg_replace('/(\d{3})(\d{3})(\d{4})/', '($1) $2-$3', $number);
    }

    /**
     * Format money.
     */
    public static function formatMoney($amount, $currency = 'USD')
    {
        return number_format($amount, 2) . ' ' . $currency;
    }

    /**
     * Convert money to words.
     */
    public static function moneyToWords($amount)
    {
        $f = new \NumberFormatter('en', \NumberFormatter::SPELLOUT);
        return ucfirst($f->format($amount));
    }

    /**
     * Calculate the difference between two dates.
     */
    public static function calculateDateDifference($startDate, $endDate)
    {
        $start = \Carbon\Carbon::parse($startDate);
        $end = \Carbon\Carbon::parse($endDate);
        return $start->diffInDays($end);
    }

    /**
     * Calculate the difference between two times in hours.
     */
    public static function calculateHoursDifference($startTime, $endTime)
    {
        $start = \Carbon\Carbon::parse($startTime);
        $end = \Carbon\Carbon::parse($endTime);
        return $start->diffInHours($end);
    }
}
