<?php

public class Element {
    public int $pos_x, $pos_y;
    public $date_creation, $date_modification;

    public function display() {
    }
}

public class Article() extends Element {
    public $titre, $chapeau, $texte;
}

public class Photo() extends Element {
    public $titre, $fichier, $commentaire;
}

public class Lien() extends Element {
    public $titre, $href, $target;
}
?>
