<?php

class Dictionary
{
    private $dictionary;

    /**
     * @param string $filename
     * @throw Exception
     */
    public function __construct($filename)
    {
        if (false === ($this->dictionary = file($filename, FILE_IGNORE_NEW_LINES))) {
            throw new Exception('Can\'t read the dictionary: ' . $filename);
        }
    }

    public function getRandomWord()
    {
        return $this->dictionary[array_rand($this->dictionary)];
    }
}
