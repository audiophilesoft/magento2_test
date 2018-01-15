<?php
/**
 * Created by PhpStorm.
 * User: audiophile
 * Date: 07.01.18
 * Time: 14:32
 */

namespace Asoft\TestModule\Console\Command\Show;

use Asoft\TestModule\Helper\Data;
use Symfony\Component\Console\Command\Command;

abstract class AbstractCommand extends Command
{
    protected $helper;


    public function __construct(Data $helper)
    {
        $this->helper = $helper;
        parent::__construct();
    }

    // todo: Static methods SHOULD NOT be used?
    protected static function prepareValues(array $values)
    {
        $arr = [];
        foreach ($values as $key => $value) {
            $arr[] = $key . ': ' . $value . PHP_EOL;
        }
        return $arr;
    }

}