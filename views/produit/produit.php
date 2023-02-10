<?php
// $path = $_SERVER['DOCUMENT_ROOT'];
// include_once  $path . '/init.php';


include_once ROOT . 'views/includes/header.php'; ?>

<body>
    <?php include_once ROOT . 'views/includes/navbar.php'; ?>
    <div class="container">
        <h4 class="text-center mx-2 mt-2">Liste des Produit</h4>
        <hr>
        <a class="btn btn-primary m-3" href="<?= URL ?>src/Controller/ProduitController.php?param=addProduit">Ajouter une tva</a>
        <table class="table border">
            <thead>
                <tr class="bg-light">
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Ref</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Marque</th>
                    <th scope="col">image</th>
                
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($produits as $produit) : ?>
                    <tr>
                      
                        <td> <?= $produit->id ?> </td>
                        <td> <?= $produit->name ?> </td>
                        <td> <?= $produit->ref ?> </td>
                        <td> <?= $produit->prix_unit ?> </td>
                        <td> <?= $produit->quantity ?> </td>
                        <td> <?= $produit->marque_id ?> </td>
                        <td> <?= $produit->image ?> </td>
                       
                        <td>
                            <a class="text-danger" href="<?= URL ?>src/Controller/ProduitController.php?param=deleteProduit&id=<?= $produit->id ?>"><i class="fas fa-trash ms-2"></i></a>
                            <a href="<?= URL ?>src/Controller/ProduitController.php?param=showProduit&id=<?= $produit->id ?>"><i class="fas fa-eye ms-2"></i></a>
                            <a href="<?= URL ?>src/Controller/ProduitController.php?param=editProduit&id=<?= $produit->id ?>"><i class="fas fa-edit ms-2"></i></a>
                        </td>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
    <?php include_once  ROOT . 'views/includes/footer.php'; ?>
</body>

</html>