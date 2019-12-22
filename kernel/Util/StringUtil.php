<?php

namespace Kernel\Util;

class StringUtil
{

    /**
     * Determine if a string starts with
     * @param $haystack
     * @param $needle
     * @return bool
     */
    public static function startsWith($haystack, $needle): bool
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    /**
     * Determine if a string ends with
     * @param $haystack
     * @param $needle
     * @return bool
     */
    public static function endsWith($haystack, $needle): bool
    {
        $length = strlen($needle);
        if ($length === 0) {
            return false;
        }

        return (substr($haystack, -$length) === $needle);
    }

}