<?php
//Get product special attribute

abstract class ProductType{
    abstract protected function getProductS();
}
class DVD extends ProductType{
    public function getProductS(){
        if(!isset($_POST['size'])){
            return 'errorEmpty';
        }else if(!is_numeric($_POST['size'])){
            return 'errorType';
        }
        if(isset($_POST['size'])){
            return 'Size: ' . $_POST['size'] . 'MB';
        }
    }
}
class Book extends ProductType{
    public function getProductS(){
        if(!isset($_POST['weight'])){
            return 'errorEmpty';
        }else if(!is_numeric($_POST['weight'])){
            return 'errorType';
        }else if(isset($_POST['weight'])){
            return 'Weight: ' . $_POST['weight'] . 'KG';
        }
    }
}
class Furniture extends ProductType{
    public function getProductS(){
        if(!isset($_POST['height']) || !isset($_POST['width']) || !isset($_POST['length'])){
            return 'errorEmpty';
        }else if(!is_numeric($_POST['height']) || !is_numeric($_POST['width']) || !is_numeric($_POST['length'])){
            return 'errorType';
        }else if(isset($_POST['height']) && isset($_POST['width']) && isset($_POST['length'])){
            return 'Dimensions: ' . $_POST['height'] . "x" . $_POST['width'] . "x" . $_POST['length'];
        }
    }
}
class TypeController{
    public function getS($product){
        $product = new $product();
        $result = $product->getProductS();
        return $result;
    }
}