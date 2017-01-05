<?php

include_once('Controllers/Game.php');
include_once(__DIR__ . '/../config/Configuration.php');

session_start();

if (!isset($_SESSION['game'])) {
    $game = new Game(Configuration::DICTIONARY_FILENAME);
    $_SESSION['game'] = $game;
} else {
    $game = $_SESSION['game'];
}

$game->run();
