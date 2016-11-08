<?php

include_once('dictionary.php');
include_once('hangman.php');
include_once('graphics.php');

class Game
{
    private function start()
    {
        $dictionary = new Dictionary('/usr/share/dict/words');
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
            if ('n' == $input) {
                break;
            }
        }
    }
}