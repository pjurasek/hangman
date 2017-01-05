<?php

class Configuration
{
    const MAX_BAD_ATTEMPTS_ALLOWED = 7;
    const DICTIONARY_FILENAME = __DIR__ . '/../assets/words';
    const DEFAULT_DICTIONARY_FILENAME = '/usr/share/dict/words';

    const ALPHABET = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i','j', 'k',
                          'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
                          'w', 'x', 'y', 'z'];

    const DISPLAY_SECRET_WORD_FOR_LOSER = 'yes';
}
