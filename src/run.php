<?php

include_once('game.php');

session_start();

if (!isset($_SESSION['game'])) {
    $dictionary_filename = __DIR__ . '/../assets/words';
    $game = new Game($dictionary_filename);
    $_SESSION['game'] = $game;
} else {
    $game = $_SESSION['game'];
}

$game->run();
