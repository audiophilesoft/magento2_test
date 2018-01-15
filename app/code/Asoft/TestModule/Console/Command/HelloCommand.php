<?php
/**
 * Created by PhpStorm.
 * User: audiophile
 * Date: 07.01.18
 * Time: 14:32
 */

namespace Asoft\TestModule\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class HelloCommand extends Command
{
    const NAME = 'name';

    protected $options;

    protected function getOptions(): array
    {
        if (null === $this->options) {
            $this->options = [
                new InputOption(self::NAME, null, InputOption::VALUE_REQUIRED, 'Name')
            ];
        }

        return $this->options;
    }


    protected function configure()
    {
        $this->setName('asoft:hello')->setDescription('Prints hello.')->setDefinition($this->getOptions());
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $text = 'Hello from Magento 2';

        if ($name = $input->getOption((self::NAME))) {
            $text .= ', ' . $name;
        }


        $output->writeln($text . '!');
    }

}