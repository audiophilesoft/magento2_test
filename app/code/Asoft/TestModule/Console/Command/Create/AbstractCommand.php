<?php
/**
 * Created by PhpStorm.
 * User: audiophile
 * Date: 07.01.18
 * Time: 14:32
 */

namespace Asoft\TestModule\Console\Command\Create;

use Asoft\TestModule\Model\TestModel;
use Symfony\Component\Console\Input\InputOption;


abstract class AbstractCommand extends \Asoft\TestModule\Console\Command\AbstractCommand
{
    const NAME = 'name';

    protected $options = [];
    protected $model;

    public function __construct(TestModel $model)
    {
        $this->model = $model;
        $this->initOptions();
        parent::__construct();

    }

    protected function initOptions()
    {
        $this->options[] = new InputOption(self::NAME, null, InputOption::VALUE_REQUIRED, 'Name');
    }

}