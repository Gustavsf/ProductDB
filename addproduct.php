<?php
include("app/models/connect.php");
include("app/controllers/request.php");

if(isset($_POST['submit'])){
    $model = new Model();
    $controller = new Controller($model);
    $errors=$controller->validate();   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/styles.css">
    <title>Document</title>
</head>
<body>
<form id="product_form" method="post">
    <div id="header">
        <h1>Product Add</h1>
        <span>
            <input type="submit" value="Save" name="submit">
            <input type="button" value="Cancel" onClick="window.location='index.php';">
        </span>  
    </div>
    <hr>
    <div id="product-add">
            <span>
                <label for="sku">SKU</label>
                <input type="text" id="sku" name="sku">
            </span>
            <span>
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
            </span>
            <span>
                <label for="price">Price ($)</label>
                <input type="text" id="price" name="price">
            </span>
            <span>
                <label for="productType">Type Switcher</label>
                <select id="productType" name="productType">
                    <option value="" disabled selected hidden>Choose type</option>
                    <option value="DVD">DVD</option>
                    <option value="Book">Book</option>
                    <option value="Furniture">Furniture</option>
                </select>
            </span>
            <div id="dynaForm">
            <span class ="allAtr dvdAtr">
                <label for="size">Size (MB)</label>
                <input type="text" id="size" name="size">
            </span>
            <span class ="allAtr furnAtr">
                <label for="height">Height (CM)</label>
                <input type="text" id="height" name="height">
            </span>
            <span class ="allAtr furnAtr">
                <label for="width">Width (CM)</label>
                <input type="text" id="width" name="width">
            </span>
            <span class ="allAtr furnAtr">
                <label for="length">Length (CM)</label>
                <input type="text" id="length" name="length">
            </span>
            <span class ="allAtr bookAtr">
                <label for="weight">Weight (KG)</label>
                <input type="text" id="weight" name="weight">
            </span>
            <p id="type-tip"></p>
            </div>                                
    </div>
    <p id="error"><?php if(isset($errors)){echo $errors;}?></p>
</form>
<script src="public/js/scriptAdd.js"></script>
</body>
</html>