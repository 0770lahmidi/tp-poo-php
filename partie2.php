<?php
class Voiture {
    public string $couleur;
    public int $vitesse;

    public function __construct(string $couleur = "Blanche", int $vitesse = 0) {
        $this->couleur = $couleur;
        $this->vitesse = $vitesse;
    }

    public function afficher(): void {
        echo "Couleur : {$this->couleur} | Vitesse : {$this->vitesse} km/h" . PHP_EOL;
    }
}

$v1 = new Voiture();               // valeurs par défaut
$v2 = new Voiture("Rouge", 50);    // valeurs personnalisées
$v1->afficher();
$v2->afficher();


//2.1.a :new Voiture("Noire") attribue "Noire" à $couleur et conserve la vitesse par défaut ($0$).
//2.1.b : L'avantage de la promotion de propriétés est d'alléger la syntaxe en éliminant la répétion inutile de la déclaration des attributs et de leur affectation $this->... = $... dans le corps du constructeur.
//2.2.a Le piège des deux constructeurs : PHP ne supporte pas la surcharge de méthodes (méthodes avec le même nom et des signatures différentes). Déclarer deux __construct() provoque un bogue PHP : Fatal error: Cannot redeclare Personne::__construct().