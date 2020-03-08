<?php
    include_once 'api/colours/read.php';
?>
<html>
    <head>
        <!-- Bootstrap -->
        <link href="css/index.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>
    <div class="container">
        <form method="POST" action="api/product/create.php">
        <div class="form-group">
            <label for="product">Nome do produto: </label>
            <input type="text" class="form-control" name="product_name" id="product" placeholder="Produto">
        </div>
        <div class="form-group">
            <label>Cores:</label>
            <?php
            foreach($colours_arr['data'] as $data){
                echo '<div class="form-group">';
                    echo '<div class="col-sm-10">';
                        echo '<div class="checkbox">';
                            echo '<label>';
                            echo '<input type="checkbox" value="' . $data["id_colour"] . '" name="product_colours[]" id="' . $data["id_colour"] . '">' . $data["colour_name"];
                            echo '</label>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            ?>
            </div>
       
        <button type="submit" name="create_produto" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </body>
</html>