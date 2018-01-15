<?php
/**
 * Created by PhpStorm.
 * User: audiophile
 * Date: 07.01.18
 * Time: 14:32
 */

namespace Asoft\TestModule\Console\Command\Create;


use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class CreateAttributeCommand extends AbstractCommand
{
    const VALUES = 'values';

    protected $options;

    protected function initOptions()
    {
        parent::{__FUNCTION__}();


        $this->options[] = new InputOption(self::VALUES, null, InputOption::VALUE_REQUIRED, 'Values (separated with comma)');
    }


    protected function configure()
    {
        $this->setName('asoft:create_attribute')->setDescription('Creates named dropdown attribute.')->setDefinition($this->options);
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $values = explode(',', $input->getOption(self::VALUES));
        $name = $input->getOption(self::NAME);
        $this->model->createAttribute($name, $values);

        $this->showSuccess($output);
    }

}