<?php

namespace App\DB;

interface DataBase
{
    public function create(array $data);

    public function update(int $id, array $data);
    
    public function delete(int $id);

    public function show(int $id);

    public function showAll();
}