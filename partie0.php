<?php
class Voiture {
    public $marque;

    public function setMarque($m) {
        $this->marque = $m;      // $this = l'objet qui appelle la méthode
    }

    public function afficher() {
        echo "Marque : " . $this->marque . PHP_EOL;
    }
}

$v1 = new Voiture();
$v1->setMarque("Toyota");
$v1->afficher();
$v1->afficher();

$v2 = new Voiture();
$v2->setMarque("Renault");
$v2->setCouleur("Bleue");
$v2->afficher();

// 0.3 : Non, $v1 et $v2 ne partagent pas la même valeur. Ce sont deux instances distinctes (objets différents) occupant des espaces mémoires séparés en mémoire vive.