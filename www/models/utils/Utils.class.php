<?php

class Utils
{
    public static function uploadFile($file, $dir)
    {
        try {
            // récupération extension
            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            // tableau d'extensions autorisées
            $extensionsValidesTab = ["jpg", "png", "gif", "jpeg", "webp"];
            // renommage fichier
            // $random = rand(0, 99999);
            $random = time();
            $nomImage = $random . "_" . $file['name'];
            $target_file = $dir . $nomImage;

            // Vérification image
            if (!isset($file['name']) || empty($file['name'])) throw new Exception("Vous devez selectionner une image");

            // création du répertoire /images si inexistant
            if (!file_exists($dir)) mkdir($dir, 0777);

            // impossible dans notre cas
            if (file_exists($target_file)) throw new Exception("Le fichier existe déjà");

            // poids image => 2Mo maxi
            if ($file['size'] > 2097152) throw new Exception("Le fichier est trop volumineux");

            // erreur copie 
            if (!move_uploaded_file($file['tmp_name'], $target_file)) throw new Exception("L'ajout de l'image n'a pas fonctionné");

            else return $nomImage;

            if (!in_array($extension, $extensionsValidesTab)) throw new Exception("L'extension $extension n'est pas autorisée !");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
