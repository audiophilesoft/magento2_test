<?php
/**
 * Created by PhpStorm.
 * User: audiophile
 * Date: 07.01.18
 * Time: 14:32
 */

namespace Asoft\TestModule\Console\Command\Show;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class ShowCustomValuesCommand extends AbstractCommand
{

    protected function configure()
    {
        $this->setName('asoft:show_custom_values')->setDescription('Shows custom values.');
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $urls = $this->helper->getCustomValues();
        $output->writeln(self::prepareValues($urls));
    }


}