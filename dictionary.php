<?php

class Dictionary
{
    private $dictionary;

    /**
     * Use default the dictionary from:
     * @package sys-apps/miscfiles
     * @param string $filename
     */
    public function __construct($filename = '/usr/share/dict/words')
    {
        if (false === ($this->dictionary = file($filename, FILE_IGNORE_NEW_LINES)))
            throw Exception('Can\'t read the dictionary: ' . $filename);
    }

    public function getRandomWord()
    {
        return $this->dictionary[$this->getRandomKey()];
    }

    private function getRandomKey()
    {
        return array_rand($this->dictionary);
    }
}