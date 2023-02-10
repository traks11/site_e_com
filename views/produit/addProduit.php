<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once  $path . '/init.php';


include_once ROOT . 'views/includes/header.php'; ?>

<body>
    <?php include_once ROOT . 'views/includes/navbar.php'; ?>

    <div class="container">
        <h4 class="mt-2 text-denter">Ajouter un Produit
            <a class="btn btn-primary m-3 float-end" href="<?= URL ?>src/Controller/ProduitController.php?param=liste"><i class="fas fa-undo-alt"></i></a>
        </h4>
        <form action="<?= URL ?>src/Controller/ProduitController.php?param=addProduit" method="post" enctype="multipart/form-data">
            <?php if ($error) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php endif ?>

            <label for="name" class="label-control">Nom du tel</label>

            <input required type="text" value="<?php if (isset($name)) {
                                            echo $name;
                                        } ?>" name="name" id="name" class="form-control">

            <label for="ref" class="label-control">Nom de la ref</label>

            <input required type="text" value="<?php if (isset($ref)) {
                                            echo $ref;
                                        } ?>" name="ref" id="ref" class="form-control">

            <label for="description" class="label-control">déscription</label>

            <textarea required class="form-control" name="description" id="description" cols="30" rows="10"><?php if (isset($description)) {
                                                                                                        echo $description;
                                                                                                    } ?></textarea>

            <label for="image" class="label-control">image principale du tel</label>

            <input type="file" name="image" id="image" class="form-control">

            <label for="marque" class="label-control">Marque</label>

            <select name="marque_id" id="marque" class="form-control">
                <?php if (isset($curenMarque)) : ?>
                    <option value="<?= $curenMarque->id ?>"><?= $curenMarque->name ?></option>
                <?php endif ?>
                <?php foreach ($marques as $marque) : ?>
                    <option value="<?= $marque->id ?>"><?= $marque->name;  ?></option>
                <?php endforeach ?>
            </select>

            <label for="tva" class="label-control">Tva</label>

            <select name="tva_id" id="tva" class="form-control">
                <?php foreach ($tvas as $tva) : ?>
                    <option value="<?= $tva->id ?>"><?= $tva->name ?></option>
                <?php endforeach ?>
            </select>

            <label for="prix" class="label-control">Prix </label>

            <input required type="number" step="0.01" name="prix_unit" id="prix" class="form-control" value="<?php if (isset($prix_unit)) {
                                                                                                        echo $prix_unit;
                                                                                                    } ?>">

            <label for="quantity" class="label-control">Quantité </label>

            <input required type="number" name="quantity" id="quantity" class="form-control" value="<?php if (isset($quantity)) {
                                                                                                echo $quantity;
                                                                                            } ?>">

            <label for="ram" class="label-control">Ram</label>

            <input type="text" value="<?php if (isset($ram)) {
                                            echo $ram;
                                        } ?>" name="ram" id="ram" class="form-control">


            <button type="submit" class="btn btn-success m-2 w-25" value="Enregistrer">Ok</button>


        </form>

    </div>

    <?php include_once  ROOT . 'views/includes/footer.php'; ?>
</body>

</html>