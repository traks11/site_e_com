<?php
// $path = $_SERVER['DOCUMENT_ROOT'];
// include_once  $path . '/init.php';


include_once ROOT . 'views/includes/header.php'; ?>

<body>
    <?php include_once ROOT . 'views/includes/navbar.php'; ?>
    <div class="container">
        <h4 class="text-center mx-2 mt-2">Liste des TVA</h4>
        <hr>
        <a class="btn btn-primary m-3" href="<?= URL ?>src/Controller/TvaController.php?param=addTva">Ajouter une tva</a>
        <table class="table border">
            <thead>
                <tr class="bg-light">
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Taux</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($tvas as $tva) : ?>
                    <tr>
                      
                        <td> <?= $tva->id ?> </td>
                        <td> <?= $tva->name ?> </td>
                        <td> <?= $tva->taux ?> </td>
                        <td>
                            <a class="text-danger" href="<?= URL ?>src/Controller/TvaController.php?param=deleteTva&id=<?= $tva->id ?>"><i class="fas fa-trash ms-2"></i></a>
                            <a href="<?= URL ?>src/Controller/TvaController.php?param=showTva&id=<?= $tva->id ?>"><i class="fas fa-eye ms-2"></i></a>
                            <a href="<?= URL ?>src/Controller/TvaController.php?param=editTva&id=<?= $tva->id ?>"><i class="fas fa-edit ms-2"></i></a>
                        </td>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
    <?php include_once  ROOT . 'views/includes/footer.php'; ?>
</body>

</html>