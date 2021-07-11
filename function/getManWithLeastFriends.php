<?php

function getManWithLeastFriends(array $users = [])
{
    if (count($users) === 0) {
        return null;
    } else {
        $leastFriendsMan = $users[0];
        foreach ($users as $user) {
            if (count($user['friends']) <= count($leastFriendsMan['friends'])) {
                $leastFriendsMan = $user;
            }
        }
    }
    return $leastFriendsMan;
}

$users = [
    ['name' => 'Tirion', 'friends' => [
        ['name' => 'Mira', 'gender' => 'female'],
        ['name' => 'Ramsey', 'gender' => 'male']
    ]],
    ['name' => 'Bronn', 'friends' => []],
    ['name' => 'Sam', 'friends' => [
        ['name' => 'Aria', 'gender' => 'female'],
        ['name' => 'Keit', 'gender' => 'female']
    ]],
    ['name' => 'Keit', 'friends' => []],
    ['name' => 'Rob', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male']
    ]],
];

$user = getManWithLeastFriends($users);
// => ['name' => 'Keit', 'friends' => []];
echo $user;
