<?php
    include_once 'api/product/read.php';
    
    session_start();

    if(!isset($_SESSION['login'])){
		  header('Location: login.php');
    }

?>
<html>

<head>
	<!-- Bootstrap -->
	<link href="css/index.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
<a class="navbar-brand" href="createProduct.php">Adicionar novo produto</a>
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <a class="navbar-nav" href="api/user/logout.php" style="color: white;">Logout</a>
    </form>
  </div>
</nav>

<div class="container">
  <div class="row">
        <?php
            if(!empty($products_arr['data'])){
                foreach($products_arr['data'] as $data){
                    echo '<div class="col-4">';
                        echo '<div class="card">';
                            echo '<div class="card-body">';
                                echo '<h3 class="card-title">' . $data['product_name'] . '</h3>';
                                echo '<h6 class="card-subtitle mb-2 text-muted">Cores: </h6>';
                                    foreach($data['colours'] as $colours){
                                        echo '<p class="card-text">'.$colours.'</p>';
                                    }
                                echo '<a href="api/product/show_by_id.php?id=' . $data["id_product"] . '" class="btn btn-primary" style="margin-right: 10px;">Alterar</a>';
                                echo '<a href="api/product/delete.php?id=' . $data["id_product"] . '" class="btn btn-primary">Deletar</a>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
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


        
    