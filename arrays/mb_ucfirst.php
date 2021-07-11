<?php

function normalize(array &$person): array
{
    $name = $person['name'];
    $description = $person['description'];
    
    $lowName = mb_strtolower($name);
    
    $person["name"] = mb_strtoupper(mb_substr($lowName, 0, 1)) . mb_substr($lowName, 1);
    $person["description"] = ucfirst(mb_strtolower($description));
    
    return ["name" => $lowName, "description" => $description];
}

function mb_ucfirst(string $name): string
{
    return mb_strtoupper(mb_substr($name, 0, 1)) . mb_substr($name, 1);
}

$lesson = [
    'name' => 'ДеструКТУРИЗАЦИЯ',
    'description' => 'каК удивитЬ колек',
];

// Обратите внимание, что не используется возврат.
// Изменение переданного массива внутри отражается
// на самом ассоциативном массиве:
normalize($lesson);

print_r($lesson);
