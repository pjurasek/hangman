<?php

class Graphics
{
    private $asciiArt = [
' -------
 |/    
 |
 |
 |
 |
 |
/|\
-------------',

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
-------------
 Dead man on the tree!',
    ];

    public function drawPicture($number)
    {
        if (true === array_key_exists($number, $this->asciiArt)) {
            print nl2br(str_replace(' ','&nbsp;', $this->asciiArt[$number])  . PHP_EOL);
        } else {
            print nl2br('No more pictures!' . PHP_EOL);
        }
    }
}
