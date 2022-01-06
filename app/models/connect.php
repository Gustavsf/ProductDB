<?php

class Model
{
    private $host = 'localhost';
    private $user = 'gustavs';
    private $password ='12345';
    private $dbName = 'product_list';
    private $pdo;
    public $stmt;
    // private $host = 'localhost';
    // private $user = 'gustavsf_gustvs';
    // private $password ='12345aA';
    // private $dbName = 'gustavsf_productList';
    // private $pdo;
    // public $stmt;

    public function connect_db(){
        $dsn = 'mysql:host='. $this->host .';dbname='. $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->password);
        $stmt = $pdo->prepare('SELECT * FROM products ORDER BY id');
        $stmt->execute();
        $this->pdo = $pdo;
        $this->stmt = $stmt;
    }
    public function insert_db($sku, $name, $price, $special){
        $pdo = $this->pdo;
        $sql = 'INSERT INTO products(sku, name, price, product_s) VALUES(:sku, :name, :price, :special)';
        $stmt=$pdo->prepare($sql);
        $stmt->execute(['sku'=>$sku, 'name'=>$name, 'price'=>$price, 'special'=>$special]);
    }
    public function delete_db($toDel, $delParams){
        print_r($toDel);
        $pdo = $this->pdo;
        $stmt = $pdo->prepare("DELETE FROM products WHERE id IN ($delParams)");
        $stmt->execute($toDel);
    }
}

