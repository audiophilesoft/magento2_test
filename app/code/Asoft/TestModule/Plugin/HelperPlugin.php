<?php
/**
 * Created by PhpStorm.
 * User: audiophile
 * Date: 12.01.18
 * Time: 22:39
 */

namespace Asoft\TestModule\Plugin;

class HelperPlugin
{
    public function afterGetCustomValues($subject, $result)
    {
        $result['info'] = 'This data was modified by plugin';
        return $result;
    }
}