<?php
/**
 * Created by PhpStorm.
 * User: audiophile
 * Date: 07.01.18
 * Time: 14:32
 */

namespace Asoft\TestModule\Console\Command\Create;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class CreateCategoryCommand extends AbstractCommand
{


    protected function configure()
    {
        $this->setName('asoft:create_category')->setDescription('Creates named category.')->setDefinition($this->options);
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->model->createCategory($input->getOption(self::NAME));

        $this->showSuccess($output);
    }

}