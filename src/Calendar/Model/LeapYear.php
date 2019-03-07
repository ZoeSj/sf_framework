<?php
/**
 * Created by PhpStorm.
 * User: shengjia
 * Date: 2019/3/7
 * Time: 16:55
 */

namespace Calendar\Model;
class LeapYear
{

    /**
     * LeapYear constructor.
     * @param null $year
     * @return bool
     */
    public function isLeapYear($year = null)
    {
        if (null === $year) {
            $year = date('Y');
        }
        return 0 === $year % 400 || (0 === $year % 4 && 0 !== $year % 100);
    }
}