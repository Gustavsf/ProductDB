<?php
require('typecontrol.php');

class Controller extends Model{
    private $model;
    public $dbObj;

    public function __construct($model){
        $this->model = $model;
        $model->connect_db();
    }
    public function getObj(){
        $stmt = $this->model->stmt;
        $dbObj = $stmt->fetchAll();
        return $dbObj;
    }
    public function deleteProduct($toDel){
        $model = $this->model;
        $delParams = str_repeat('?,', count($toDel) - 1) . '?';
        $model->delete_db($toDel, $delParams);
    }
    public function validate(){
        $errors = $special= "";
        if(isset($_POST['sku']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['productType'])){                  
            $tc = new TypeController;
            $special = $tc->getS($_POST['productType']);
            if($special == 'errorEmpty'){
                $errors = "Please, submit required data";
            }else if($special == 'errorType' || !is_numeric($_POST['price'])){
                $errors = "Please, provide the data of indicated type";
            }           
        } else{
            $errors = "Please, submit required data";
        }
        if(empty($errors)){
            $this->model->insert_db($_POST['sku'], $_POST['name'], $_POST['price'], $special);
            header('Location:index.php');
            exit();
        } else {
            return $errors;            
        }   
    }
}