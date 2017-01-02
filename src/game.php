<?php

include_once('dictionary.php');
include_once('hangman.php');
include_once('graphics.php');

class Game
{
    /** @var  string */
    private $dictionaryFilename;

    /** @var  Dictionary */
    private $dictionary;

    /** @var  Hangman */
    private $hangman;

    /** @var  Graphics */
    private $graphics;


    public function __construct($dictionaryFilename = '/usr/share/dict/words')
    {
        $this->dictionaryFilename = $dictionaryFilename;
    }

    private function start()
    {
        try {
            $this->dictionary = new Dictionary($this->dictionaryFilename);
        } catch(Throwable $throwable) {
            print $throwable->getMessage();
            die();
        }

        $this->hangman = new Hangman($this->dictionary->getRandomWord());
        $this->graphics = new Graphics();

        $this->guess();
    }

    private function guess()
    {
        try {
            $this->handleGuess();
        } catch (Throwable $throwable) {
            print nl2br($throwable->getMessage());
        }

        $this->hangman->drawAlphabet();
        $this->graphics->drawPicture($this->hangman->state());
        $this->hangman->drawWord();

        if ($this->hangman->isGuessed() && $this->hangman->isAlive()) {
            print nl2br("You win!" . PHP_EOL);
            $this->drawMenu();
        }

        if (!$this->hangman->isGuessed() && !$this->hangman->isAlive()) {
            print nl2br("You lose game!" . PHP_EOL);
            $this->drawMenu();
        }

        if (!$this->hangman->isGuessed() && $this->hangman->isAlive()) {
            $this->drawGuessInput();
        }
    }

    private function handleGuess()
    {
        if(isset($_GET['guess'])) {
            $input = $_GET['guess'];

            if (strlen($input) <> 1) {
                throw new Exception("The input can be only one letter!" . PHP_EOL);
            }

            $this->hangman->guess($input);
        }
    }

    public function run()
    {
        if (isset($_GET['start']) && 'y' === $_GET['start']) {
            $this->start();
        } else if(isset($_GET['guess']) && $this->hangman->isAlive()) {
            $this->guess();
        } else {
            $this->drawMenu();
        }
    }

    private function drawMenu()
    {
        print '
            <form action="/">
                <label>New game(y/n): </label>
                <input type="text" name="start" autofocus value="" maxlength="1">
            </form>
        ';
    }

    private function drawGuessInput()
    {
        print '
            <form action="/">
                <label>Guess: </label>
                <input type="text" name="guess" autofocus value="" maxlength="1">
            </form>
        ';
    }

}
