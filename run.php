<?php

include_once('game.php');

$dictionary_filename = 'words';
$game = new Game($dictionary_filename);
$game->run();