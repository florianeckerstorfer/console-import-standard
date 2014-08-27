<?php

namespace Acme\DemoImport\Command;

use Ddeboer\DataImport\Reader\CsvReader;
use Ddeboer\DataImport\Workflow;
use Ddeboer\DataImport\Writer\ConsoleProgressWriter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * ImportCommand
 *
 * @package   Acme\DemoImport
 * @author
 * @copyright
 */
class ImportCommand extends Command
{
    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this
            ->setName('import')
            ->setDescription('Import something')
            ->addArgument('input-file', InputArgument::REQUIRED, 'File you want to import')
            ->addOption('format', 'f', InputOption::VALUE_REQUIRED, 'Output format');
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $reader = new CsvReader(new \SplFileObject($input->getArgument('input-file')));

        $workflow = new Workflow($reader);
        $workflow->addWriter(new ConsoleProgressWriter($output, $reader));

        $result = $workflow->process();

        $output->writeln("\n");
        if ($result->getErrorCount() > 0) {
            $output->writeln(sprintf('Not imported: <error>%d</error>', $result->getErrorCount()));
        }
        if ($result->getSuccessCount() > 0) {
            $output->writeln(sprintf('Imported:     <info>%d</info>', $result->getSuccessCount()));
        }
        $output->writeln(sprintf('Time spent:   <info>%s</info>s', $result->getElapsed()->s));
    }
}
