<?php

/**
 * считает количество слов в предложении и возвращает ассоциативный массив
 * в котором ключи это слова (приведенные к нижнему регистру),
 * а значения — это то сколько раз слово встретилось в предложении.
 */

function countWords(string $sentence): array
{
    $sentence = mb_strtolower($sentence);
    $words = explode(" ", $sentence);
    foreach ($words as $word) {
        $result[$word] = ($result[$word] ?? 0) + 1;
    }

    return $result;
}

$text1 = 'one two three two ONE one wow';
countWords($text1);

$text2 = 'another one sentence with strange Words words';
countWords($text2);
