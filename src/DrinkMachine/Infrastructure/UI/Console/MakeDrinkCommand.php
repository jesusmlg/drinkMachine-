<?php

namespace GetWith\CoffeeMachine\DrinkMachine\Infrastructure\UI\Console;

use Exception;
use GetWith\CoffeeMachine\DrinkMachine\Application\GetDrinkMessageHandler;
use GetWith\CoffeeMachine\DrinkMachine\Application\Query\GetDrinkMessageQuery;
use GetWith\CoffeeMachine\DrinkMachine\Domain\Service\BuyMessageCreator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MakeDrinkCommand extends Command
{
    protected static $defaultName = 'app:order-drink';
    /** @var GetDrinkMessageHandler */
    private $get_drink_message_handler;

    public function __construct()
    {
        parent::__construct(self::$defaultName);
        $this->get_drink_message_handler = new GetDrinkMessageHandler(
            new BuyMessageCreator()
        );
    }

    protected function configure(): void
    {
        $this->addArgument(
            'drink-type',
            InputArgument::REQUIRED,
            'The type of the drink. (Tea, Coffee or Chocolate)'
        );

        $this->addArgument(
            'money',
            InputArgument::REQUIRED,
            'The amount of money given by the user'
        );

        $this->addArgument(
            'sugars',
            InputArgument::OPTIONAL,
            'The number of sugars you want. (0, 1, 2)',
            0
        );

        $this->addOption(
            'extra-hot',
            'e',
            InputOption::VALUE_NONE,
            'If the user wants to make the drink extra hot'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $message = $this->get_drink_message_handler->__invoke(
                new GetDrinkMessageQuery(
                    $input->getArgument('drink-type'),
                    $input->getArgument('money'),
                    $input->getArgument('sugars'),
                    $input->getOption('extra-hot')
                )
            );
            $output->writeln($message);
        } catch (Exception $exception) {
            $output->writeln($exception->getMessage());
        }

        return 0;
    }
}
