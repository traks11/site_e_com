<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once  $path . '/init.php';


include_once ROOT . 'views/includes/header.php'; ?>
<body>
    <?php include_once ROOT . 'views/includes/navbar.php'; ?>
   
          <div class="container">
       <h4 class="mt-2 text-denter" >Ajouter une marque
       <a class="btn btn-primary m-3 float-end" href="<?= URL ?>src/Controller/MarqueController.php?param=liste"><i class="fas fa-undo-alt"></i></a> </h4>
             <form action="<?= URL ?>src/Controller/MarqueController.php?param=addMarque" method="post">

                <label for="name" class="label-control">Nom de la marque</label>

                <input type="text" value="" name="name" id="name" class="form-control">
 
                <button type="submit" class="btn btn-success m-2 w-25" value = "Enregistrer">Ok</button>


             </form>

          </div>

    <?php include_once  ROOT . 'views/includes/footer.php'; ?>
</body>

</html>