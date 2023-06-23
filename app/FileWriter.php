<?php

namespace Bank; 

use App\DB\DataBase;

class FileWriter implements DataBase
{
    private $data, $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
       if (!file_exists(__DIR__.'/../data/'.$fileName.'.json')) {
           $this->data = [];
       } else {
           $this->data = json_decode(file_get_contents(__DIR__.'/../data/'.$fileName.'.json'), 1);
       }
    }

    public function __destruct()
    {
        $this->data = array_values($this->data);
        file_put_contents(__DIR__.'/../data/'.$this->fileName.'.json', json_encode($this->data));
    }

    public function create(array $accountData) : void 
    {
        $id = rand(100000000, 999999999);
        $accountData['id'] = $id;
        $this->data[] = $accountData;
    }

    public function update(int $id, array $data) : void 
    {
        foreach ($this->data as $key => $account) {
            if ($account['id'] == $id) {
                $data['id'] = $id; // for security reasons
                $this->data[$key] = $data;
            }
        }
    }
    
    public function delete(int $id) : void 
    {
        foreach ($this->data as $key => $account) {
            if ($account['id'] == $id) {
                unset($this->data[$key]);
            }
        }
    }

    public function show(int $id) : array 
    {
        foreach ($this->data as $key => $account) {
            if ($account['id'] == $id) {
                return $this->data[$key];
            }
        }
        return [];
    }

    public function showAll() : array 
    {
        return $this->data;
    }
}