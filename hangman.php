<?php

class Hangman
{
    const ALLOWED_ATTEMPTS = 7;
    private $secret;
    private $attempt = 0;
    private $template;

    public function __construct($secret)
    {
        $this->secret = strtolower($secret);
        $this->template = str_repeat('-', strlen($secret));
    }

    public function guess($character)
    {
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
        return $this->attempt < Hangman::ALLOWED_ATTEMPTS;
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
        print $this->template . PHP_EOL;
    }
}