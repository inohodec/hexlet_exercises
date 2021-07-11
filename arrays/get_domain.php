<?php

/**
 * Реализуйте функцию getDomainInfo(), которая принимает на вход имя сайта
 * и возвращает информацию о нем:
 */

function getDomainInfo(string $url): array
{
    $lowerUrl = mb_strtolower($url);

    if (mb_strstr($lowerUrl, "http")) {
        $splittedUri = explode(":", $lowerUrl);
        $protocol = $splittedUri[0];
        $domain = substr($splittedUri[1], 2);
    } else {
        $protocol = "http";
        $domain = $lowerUrl;
    }

    return ['scheme' => $protocol, 'name' => $domain];
}

getDomainInfo('yandex.ru');
// [
//     'scheme' => 'http',
//     'name' => 'yandex.ru'
// ]

getDomainInfo('https://hexlet.io');
// [
//     'scheme' => 'https',
//     'name' => 'hexlet.io'
// ]

getDomainInfo('http://google.com');
