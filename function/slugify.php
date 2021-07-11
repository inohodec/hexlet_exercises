<?php

require_once "../vendor/autoload.php";

use Funct\Strings as fStr;

echo fStr\slugify("O la      lu");

function slugy(string $sentence): string
{
    $slugyString = "";
    
    $sentence = strtolower($sentence);
    $sentence = trim($sentence);

    if (strlen($sentence) > 0) {
        $words = separateWords($sentence);
        $slugyString = implode("-", $words);
    }

    return $slugyString;
}

function separateWords(string $sentence): array
{

    $words = explode(" ", $sentence);

    $isPreviousSpace = false;

    foreach ($words as $word) {
        if ($word !== "") {
            $filteredWords[] = $word;
        }
    }
    return $filteredWords;
}

slugy(''); // ''
slugy('test'); // 'test'
slugy('test me'); // 'test-me'
slugy('La La la LA'); // 'la-la-la-la'
slugy('O la      lu'); // 'o-la-lu'
slugy(' yOu   '); // 'you'