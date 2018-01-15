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


class ListUrlsCommand extends AbstractCommand
{

    protected function configure()
    {
        $this->setName('asoft:list_urls')->setDescription('Shows the list of base URLs.');
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $urls = $this->helper->getUrls();
        $output->writeln(self::prepareValues($urls));
    }

}