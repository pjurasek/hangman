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

    /** @var int */
    private $count;


    public function __construct($dictionaryFilename = '/usr/share/dict/words')
    {
        $this->dictionaryFilename = $dictionaryFilename;
    }

    private function start()
    {
        $this->dictionary = new Dictionary($this->dictionaryFilename);
        $this->hangman = new Hangman($this->dictionary->getRandomWord());
        $this->graphics = new Graphics();
        $this->count = 0;

        $this->guess();
    }

    private function guess()
    {
        $this->graphics->drawPicture($this->hangman->state());
        $this->hangman->drawWord();
        print "{$this->count}<br>";
        var_dump('Guessed: ',$this->hangman->isGuessed(),'Alive: ', $this->hangman->isAlive());
        $this->count++;

        if ($this->hangman->isGuessed() && $this->hangman->isAlive()) {
            print "You win!<br>";
        }

        if (!$this->hangman->isGuessed() && !$this->hangman->isAlive()) {
            print "You lose game!<br>";
        }

        if (!$this->hangman->isGuessed() && $this->hangman->isAlive()) {
            $this->drawGuessInput();
            $this->handleGuess();
        }
    }

    private function handleGuess()
    {
        if(isset($_GET['guess'])) {
            $input = $_GET['guess'];
            $this->hangman->guess($input);
        }
    }

    public function run()
    {
        if (isset($_GET['newGame']) && 'y' === $_GET['newGame']) {
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
                <input type="text" name="newGame" autofocus value="">
            </form>
        ';
    }

    private function drawGuessInput()
    {
        print '
            <form action="/">
                <label>Guess: </label>
                <input type="text" name="guess" autofocus value="">
            </form>
        ';
    }

}
