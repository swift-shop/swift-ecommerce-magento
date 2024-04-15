<?php

namespace Core\Help\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BuildBaseStructureCommand extends Command
{
    /**
     * Initialization of the command.
     */
    protected function configure()
    {
        $this->setName('build:base:structure');
        $this->setDescription('build base structure');
        parent::configure();
    }

    /**
     * CLI command description.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        // todo: implement CLI command logic here
    }
}
