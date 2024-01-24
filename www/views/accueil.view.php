<?php ob_start() ?>

<?php foreach ($livresAll as $livre) : ?>
    <div class="card card-livre mb-3">
        <h3 class="card-header"><?= $livre->getTitre() ?></h3>
        <div class="card-image">
            <img src="<?= SITE_URL ?>public/images/<?php echo $livre->getImage(); ?>" class="d-block mt-2 mx-auto" height="300" width="auto" alt="Livre pour <?php echo $livre->getTitre(); ?>">
        </div>
        <div class="card-body">
            <a href="#" class="card-link">Modifier</a>
        </div>
        <div class="card-footer text-muted">
            <p>Nombre de pages : <?= $livre->getNbPages() ?></p>
            <p>Uploader : <?= $livre->getUploader() ?></p>
        </div>
    </div>
<?php endforeach; ?>

<?php
$titre = "Tous vos livres";
$content = ob_get_clean();
require "template.view.php";
