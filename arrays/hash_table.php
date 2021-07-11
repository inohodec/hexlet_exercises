<?php

interface AssocArray
{
    public function make();
    public function set($key, $value);
    public function get($key, $defaltValue);
}

class Map implements AssocArray
{
    private $hashTable;

    public function make()
    {
        $this->hashTable = [];
    }

    public function set($key, $value)
    {
        $index = $this->getIndex($key);
        if (array_key_exists($index, $this->hashTable)) {
            if ($this->checkCollision($index, $key)) {
                $this->hashTable[$index][1] = $value;
                echo "value was written";
            } else {
                echo "The collision was founded error!!!";
            }
        } else {
            $this->hashTable[$index] = ["$key", "$value"];
        }
    }

    public function get($key, $defaltValue = "null")
    {
        $index = crc32($key) % 1000;
        if (array_key_exists($index, $this->hashTable)) {
            return $this->hashTable[$index][1];
        } else {
            return $defaltValue;
        }
    }

    private function getIndex($key): int
    {
        return crc32($key) % 1000;
    }

    private function checkCollision($index, $key): bool
    {
        return "$key" === "{$this->hashTable[$index][0]}" ? true : false;
    }
}

$map = new Map();
$map->make();
print_r($map->get('key'));

print_r($map->get('key', "value"));

print_r($map->set('key2', "value3"));
print_r($map->get("key2"));

print_r($map->set('key2', "value3"));
print_r($map->get("key2"));
