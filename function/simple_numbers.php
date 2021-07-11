<?php

function isPrime(int $value): bool
{
    if ($value > 3) {
        for ($i = 2; $i <= sqrt($value); $i++) {
            if ($value % $i === 0) {
                return false;
            }
        }
    } elseif ($value >= 1) {
        return true;
    }
    return true;
}

function sayPrimeOrNot(int $value)
{
    echo isPrime($value) ? "yes" : "no";
}

sayPrimeOrNot(121);
