<?php

namespace Bank; 

use App\DB\DataBase;
use PDO;

class Databasewriter implements DataBase
{
    private $pdo, $tableName;

    public function __construct($tableName)
    {
        $this->tableName = $tableName;

        $host = 'localhost';
        $db   = 'bank';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';
        
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        
        $this->pdo = new PDO($dsn, $user, $pass, $options);
        

    }

    // public function __destruct()
    // {
 
    // }

    public function create(array $accountData) : void 
    {
      $sql = "
      INSERT INTO {$this->tableName}
       (
        `id`,
        `name`,
        `surname`,
        `personid`,
        `accountnumber`,
        `balance`
        )
        VALUES
        (
        ?,?,?,?,?,?
        )
      ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $accountData['id'],
            $accountData['name'],
            $accountData['surname'],
            $accountData['personid'],
            $accountData['accountnumber'],
            $accountData['balance']
        ]);

    }

    public function update(int $userId, array $userData) : void 
    {
        $sql = "
        UPDATE {$this->tableName}
        SET
            `balance` = ?
        WHERE
            `id` = ?

        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $userData['balance'],
            $userId
        ]);
    }
    
    public function delete(int $userId) : void 
    {
        $sql = "
        DELETE FROM {$this->tableName}
        WHERE
            `id` = ?
        ";
        $stmt = $this-pdo->prepare($sql);
        $stmt->execute([$userId]);
    }

    public function show(int $userId) : array 
    {
        $sql = "
        SELECT *
        FROM {$this->tableName}
        WHERE
            `id` = ?
        ";

        $stmt = $this->pdo->prepare($sql); // prepared statement, nes yra kintamasis `$userId`
        $stmt->execute([$userId]);
        return $stmt->fetch(); // grazina viena pirma rezultata, galima naudoti daug kartu
    }

    public function showAll() : array 
    {
        $sql = "
        SELECT *
        FROM {$this->tableName}
        ";

        $stmt = $this->pdo->query($sql); //     query statement, nes nera kintamuju
        return $stmt->fetchAll(); //    grazina visus rezultatus
    }
}