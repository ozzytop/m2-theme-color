<?php

namespace Ozzytop\ThemeColor\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Store\Model\ScopeInterface;

class ChangeColor extends Command
{

    const COLOR = 'color';
    const STORE = 'store';
    const THEME_GENERAL_MAIN_COLOR = 'theme_configuration/general/main_theme_color';
        
    protected $configWriter;

    /**
     * Constructor Method
     *
     * @param WriterInterface $configWriter
     */
    public function __construct(WriterInterface $configWriter) {
        $this->configWriter = $configWriter;
        parent::__construct('ozzytop:color');
    }

    /**
     * Configures the command
     *
     * @return void
     */
    protected function configure()
    {
        $options = [
            new InputArgument('color', InputArgument::REQUIRED, 'Hexadecimal Color'),
            new InputArgument('store', InputArgument::REQUIRED, 'Store')
        ];

        $this->setDescription('Change Main color of current theme')
            ->setDefinition($options);

        parent::configure();
   }

   /**
    * Executes the command
    *
    * @param InputInterface $input
    * @param OutputInterface $output
    * @return void
    */
   protected function execute(InputInterface $input, OutputInterface $output)
   {
        if ($input->getArgument('color') && $input->getArgument('store')) {
            if(!$this->check_valid_colorhex($input->getArgument('color'))) {
                $output->writeln("color:" . 'hexa');
                return $output->writeln("Please be sure that the color is on hexadecimal format.");
            }
            $this->configWriter->save( self::THEME_GENERAL_MAIN_COLOR, $input->getArgument('color'), ScopeInterface::SCOPE_STORES, $input->getArgument('store'));

            return $output->writeln("You have changed the color successfully.");
        }

        return $output->writeln("Please check the arguments.");

   }
   
   /**
    * Check if the argument is an hexadecimal number
    *
    * @param int|string $colorCode Color Code
    * @return boolean
    */
   private function check_valid_colorhex($colorCode) {
        if ( ctype_xdigit($colorCode) &&
            (strlen($colorCode) == 6 || strlen($colorCode) == 3))
                return true;

        else return false;
    }

}