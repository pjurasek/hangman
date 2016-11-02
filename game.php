<?php

include('dictionary.php');
include('hangman.php');
include('graphics.php');

class Game
{
    public function start()
    {
        $dictionary = new Dictionary();
        $hangman = new Hangman($dictionary->getRandomWord());
        $graphics = new Graphics();

        while ($hangman->isAlive()) {
            $graphics->drawPicture($hangman->state());
            $hangman->drawWord();

            if ($hangman->isGuessed()) {
                print "You win!" . PHP_EOL;
                break;
            }

            $input = readline("Guess: ");
            $hangman->guess($input);
        }

        if (!$hangman->isGuessed()) {
            print "Lose game" . PHP_EOL;
        }
    }

    public function run()
    {
        while(true) {
            $this->start();
            $input = readline("New game(y/n): ");
            if ($input == 'n') {
                break;
            }
        }
    }
}

$Game = new Game();
$Game->run();