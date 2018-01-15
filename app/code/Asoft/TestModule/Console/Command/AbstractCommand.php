<?php
/**
 * Created by PhpStorm.
 * User: audiophile
 * Date: 07.01.18
 * Time: 14:32
 */

namespace Asoft\TestModule\Console\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;

class AbstractCommand extends Command
{

    public function showSuccess(OutputInterface $output)
    {
        $output->writeln('success!');
    }

}