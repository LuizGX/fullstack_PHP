<?php
    include_once 'api/colours/read.php';

    session_start();

    if(!isset($_SESSION['login'])){
		  header('Location: login.php');
    }
    
    if(isset($_GET['id'])){
        include_once 'api/product/read.php';
        
        $id_product = $_GET['id'];
        $result = $product->read_by_id($id_product);
        $numRows = $result->num_rows;

        if($numRows > 0){
            $product_colours = array();

            while($row = mysqli_fetch_assoc($result)) {
                $product_item = array(
                    "id_product" => $row['id_product'],
                    "product_name" => $row['product_name']
                );
                $product_item['colours'] = array();
                
                $colours_names = $product->read_colours_names($row['id_product']);

                $product_item['colours'] = $colours_names;
            }
        }
    }
?>
<html>
    <head>
        <!-- Bootstrap -->
        <link href="css/index.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>
    <div class="container">
            <?php
                if(!isset($_GET['id'])){
                    echo '<form method="POST" action="api/product/create.php">';
                } else {
                    echo '<form method="POST" action="api/product/update.php?id=' . $id_product . '">';
                }
            ?>
        <div class="form-group">
            <label for="product">Nome do produto: </label>
            <input type="text" class="form-control" name="product_name" id="product" value="<?php if(isset($_GET['id'])){echo $product_item['product_name'];} ?>" required placeholder="Produto">
        </div>
        <div class="form-group">
            <label>Cores:</label>
            <?php
            foreach($colours_arr['data'] as $data){
                echo '<div class="form-group">';
                    echo '<div class="col-sm-10">';
                        echo '<div class="checkbox">';
                            echo '<label>';
                                echo '<input type="checkbox" value="' . $data["id_colour"] . '"';
                                echo 'name="product_colours[]"'; 
                                echo 'id="' . $data["id_colour"] . '"';
                                if (isset($product_item)){echo (in_array($data['colour_name'], $product_item['colours']))?'checked':'';}
                                echo '>'; 
                                echo $data["colour_name"];
                            echo '</label>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            ?>
            </div>
            <button type="submit" name="create_produto" class="btn btn-block btn-primary">Salvar</button>
            <a href="javascript:history.go(-1)" class="btn btn-block btn-danger">Voltar</a>
        </form>
    </div>
    </body>
</html>