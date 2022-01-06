<?php
require("app/require.php");
$model = new Model();
$controller = new Controller($model);
$obj = $controller->getObj();

if(isset($_POST['delete-checkbox'])){
    $controller->deleteProduct($_POST['delete-checkbox']);
    header('Location:index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/styles.css">
    <title>Scandiweb test asignment</title>
</head>
<body>
<form method="post">
    <div id="header">
        <h1>Product List</h1>
        <span>
            <input type="button" onclick="document.location='addproduct.php'" value="ADD"></input>
            <input type="submit" id="delete-product-btn" value="MASS DELETE"></input> 
        </span>             
    </div>
    <hr>
    <div id="product-list">
        <?php
        foreach($obj as $row){?>
            <div class="product-container">
                <input type="checkbox" value="<?php echo $row['id']?>" name="delete-checkbox[]" class="delete-checkbox">
                <p><?php echo $row['sku'] ?></p>
                <p><?php echo $row['name'] ?></p>
                <p><?php echo $row['price'] ?>$</p>
                <p><?php echo $row['product_s'] ?></p>
            </div>
        <?php
        }
        ?>    
    </div>
    </form>
    <hr>
    <p id="footer">Scandiweb Test assignment</p>
    <script src="public/js/scriptMain.js"></script>   
</body>
</html>