<?php

$users = [
    ['name' => 'Darius', 'email' => 'darius@lrp.lt', 'password' => md5('123')]
];

file_put_contents(__DIR__.'/users.json', json_encode($users));

echo 'ok';