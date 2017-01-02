<?php

class Hangman
{
    const ALLOWED_ATTEMPTS = 7;
    private $secret;
    private $attempt = 0;
    private $template;
    private $guessed = [];
    private $alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i','j', 'k',
                         'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
                         'w', 'x', 'y', 'z'];


    public function __construct($secret)
    {
        $this->secret = strtolower($secret);
        $this->template = str_repeat('*', strlen($secret));
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
        return Hangman::ALLOWED_ATTEMPTS > $this->attempt;
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
                print "<span class=\"shadow\">{$character}</span>";
            }
        }
        print nl2br(PHP_EOL);
    }
}
