<?php
/**
 * Created by PhpStorm.
 * User: stephen
 * Date: 29/05/2016
 * Time: 17:43
 */

namespace Framework;


class ArrayMethods {

    private function __construct() {
        //do nothing
    }

    private function __clone() {
        //do nothing
    }

    public static function clean($array) {
        return array_filter($array, function($item) {
            return !empty($item);
        });
    }

    public static function trim($array) {
        return array_map(function($item) {
            return trim($item);
        }, $array);
    }
}
