<?php
    include_once 'api/product/read.php';
?>
<html>

<head>
	<!-- Bootstrap -->
	<link href="css/index.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<div class="container">
  <div class="row">
        <?php
            foreach($products_arr['data'] as $data){
                echo '<div class="col-sm-4">';
                    echo '<div class="card">';
                        echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . $data['product_name'] . '</h5>';
                            echo '<h6 class="card-subtitle mb-2 text-muted">Cores: </h6>';
                            echo '<p class="card-text">cores do produto devem entrar aqui</p>';
                            echo '<a href="#" class="card-link">Alterar</a>';
                            echo '<a href="#" class="card-link">Deletar</a>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
        ?>
    </div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
</body>
</html>


        
    