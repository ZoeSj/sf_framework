<?php

namespace Calendar\Controller;

use Calendar\Model\LeapYear;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
            $response = new Response('Yep,this is a leap year!'.rand());
        } else {
            $response = new Response('Nope,this is not a leap year!');
        }
        $response->setTtl(10);
        return $response;
    }


}