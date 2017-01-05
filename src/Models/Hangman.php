<?php

class Hangman
{
    private $secret;
    private $attempt = 0;
    private $template;
    private $guessed = [];
    private $alphabet = [];

    public function __construct($secret)
    {
        $this->secret = strtolower($secret);
        $this->template = str_repeat('*', strlen($secret));
        $this->alphabet = Configuration::ALPHABET;
    }

    public function guess($character)
    {
        $this->guessed[] = $character;

        if (true === (empty($positions = $this->contains($character)))) {
            $this->attempt++;
        } else {
            foreach($positions as $position) {
                $this->template[$position] = $character;
            }
        }
    }

    private function contains($character)
    {
        $positions = [];
        for($i = 0; $i < strlen($this->secret); $i++) {
            if ($character === $this->secret[$i]) {
                $positions[] = $i;
            }
        }
        return $positions;
    }

    public function isAlive()
    {
        return Configuration::MAX_BAD_ATTEMPTS_ALLOWED > $this->attempt;
    }

    public function isGuessed()
    {
        return $this->secret == $this->template;
    }

    public function state()
    {
        return $this->attempt;
    }

    public function drawWord()
    {
        print nl2br("Word: {$this->template}" . PHP_EOL);
    }

    public function drawAlphabet()
    {
        print "Alphabet: ";
        foreach($this->alphabet as $character) {
            if (true === in_array($character, $this->guessed)) {
                print "<span class=\"blue\">{$character}</span>";
            } else {
                print "<span class=\"grey\">{$character}</span>";
            }
        }
        print nl2br(PHP_EOL);
    }
}
