<?php

function checkIfBalanced(string $expression): bool
{
    $opened = 0;
    $closed = 0;

    for ($i = 0; $i < strlen($expression); $i++) {
        $symbol = $expression[$i];
        if ($symbol == "(") {
            $opened++;
        } elseif ($symbol == ")") {
            $closed++;
        }
    }
    return $opened === $closed;
}

function checkIfBalancedAlt(string $expression)
{
    $stack = [];
    
    $opened = ["(", "<", "{", "["];
    $closed = [")", ">", "}", "]"];
    $rightBrackets = ["()", "[]", "{}", "<>"];
        
    $stringLength = strlen($expression);

    for ($i = 0; $i < $stringLength; $i++) {
        $char = $expression[$i];
        if (in_array($char, $opened)) {
            $stack[] = $char;
        } elseif (in_array($char, $closed)) {
            $prevChar = array_pop($stack);
            $peranthises = $prevChar . $char;
            if (!in_array($peranthises, $rightBrackets)) {
                return false;
            }
        }
    }
    return count($stack) === 0;
}

$result = checkIfBalanced("(1*1)-(5)(");
$result1 = checkIfBalancedAlt("(((1))*1)-(5)");
echo $result;
echo $result1;
