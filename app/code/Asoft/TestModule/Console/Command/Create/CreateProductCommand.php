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

class CreateProductCommand extends AbstractCommand
{


    protected function configure()
    {
        $this->setName('asoft:create_product')->setDescription('Creates named  product.')->setDefinition($this->options);
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->model->createProduct($input->getOption(self::NAME));

        $this->showSuccess($output);
    }

}