<?php ob_start() ?>

<p>Désolé.....</p>


<?php
$titre = "Contenu introuvable";
$content = ob_get_clean();
require_once "template.view.php";
