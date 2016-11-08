<?php

class Graphics
{
    private $asciiArt = [
' -------
 |/    | 
 |
 |
 |
 |
 | 
/|\
-------------',

' -------
 |/    | 
 |     o
 |
 |
 |
 | 
/|\
-------------',

' -------
 |/    | 
 |     o
 |     |
 |     |
 |
 | 
/|\
-------------',

' -------
 |/    | 
 |     o
 |     |
 |     |
 |    /
 | 
/|\
-------------',

' -------
 |/    | 
 |     o
 |     |
 |     |
 |    / \
 | 
/|\
-------------',

' -------
 |/    | 
 |     o
 |   --|
 |     |
 |    / \
 | 
/|\
-------------',

' -------
 |/    | 
 |     o
 |   --|--
 |     |
 |    / \
 | 
/|\
-------------',
    ];

    public function drawPicture($number)
    {
        if (true === array_key_exits($number, $this->asciiArt)) {
            print $this->asciiArt[$number] . PHP_EOL;
        } else {
            print 'No more pictures!' . PHP_EOL;
        }
    }
}