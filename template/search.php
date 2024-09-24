<?php
  //echo $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].''.strtok($_SERVER["REQUEST_URI"], '?');
  $currentPage = strtok($_SERVER["REQUEST_URI"], '?');
  $arrayCurrentPage = explode("/", $currentPage);

  foreach ($arrayCurrentPage as $valor) {
    if(isset($_GET['dir'])){
      $cleanSearch = $valor.'?dir='.$_GET['dir'];
      break;
    } else if (str_contains($valor, '.php')){
      $cleanSearch = $valor;
      break;
    }
  }
  
?>

<nav class="navbar navbar-light bg-light">
  <form class="form-inline" action="">
   
    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" name="search" 
      value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>">
    
    <!-- CHECK DIR EXISTE E PASSA SEU VALOR NO FORM -->
    <?php if(isset($_GET['dir'])): ?>
      <input type="hidden" name="dir" 
        value="<?=$_GET['dir']?>">
    <?php endif;?>
    <!-- END CHECK DIR -->

    <button class="btn btn-info my-2 my-sm-0" name="submit" type="submit">
      <i class="bi bi-search"></i>
    </button>

    <a class="btn btn-danger my-2 my-sm-0" href="<?=$cleanSearch?>">
      <i class="bi bi-trash" style="color: #fff;"></i>
    </a>

  </form>
</nav>