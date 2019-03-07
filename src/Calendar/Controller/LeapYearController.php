<?php

namespace Calendar\Controller;

use Calendar\Model\LeapYear;
use Symfony\Component\HttpFoundation\Request;

/**
 * Created by PhpStorm.
 * User: shengjia
 * Date: 2019/3/7
 * Time: 16:52
 */
class LeapYearController
{
    public function index(Request $request, $year)
    {
        $leapYear = new LeapYear();
        if ($leapYear->isLeapYear($year)) {
            return 'Yep, this is a leap year! ';
        }
        return 'Yep, this is a leap year! ';
    }
}