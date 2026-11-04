<?php
class Personne {
    public function __construct(
        protected string $nom,
        protected string $prenom,
        protected string $dateNaissance
    ) {}

    protected function getAge(): int {
        $naissance = new DateTime($this->dateNaissance);
        $aujourdhui = new DateTime();
        return $naissance->diff($aujourdhui)->y;
    }

    public function __toString(): string {
        return "{$this->prenom} {$this->nom} ({$this->getAge()} ans)";
    }
}

class Etudiant extends Personne {
    private string $cne;

    public function __construct(string $nom, string $prenom, string $dateNaissance, string $cne) {
        parent::__construct($nom, $prenom, $dateNaissance);
        $this->cne = $cne;
    }

    public function getCne(): string {
        return $this->cne;
    }

    public function __toString(): string {
        return parent::__toString() . " - CNE: " . $this->cne;
    }
}

// 6.4 Tableau de 5 étudiants
$etudiants = [
    new Etudiant("Alami", "Youssef", "2002-01-15", "K130011223"),
    new Etudiant("Bennani", "Kenza", "2001-07-20", "G149022334"),
    new Etudiant("Chraibi", "Omar", "2003-03-10", "B135033445"),
    new Etudiant("Daoudi", "Fatima", "2002-11-05", "R120044556"),
    new Etudiant("El Idrissi", "Amine", "2001-09-30", "D110055667"),
];

foreach ($etudiants as $e) {
    echo $e . PHP_EOL;
}


//6.1.b : L'objet $c de type Chien ne peut pas appeler $c->miauler() car la méthode miauler() est propre à la classe Chat. Chien et Chat sont deux classes distinctes sans lien de parenté entre elles.

//6.2.a : Supprimer parent::__construct($nom) empêche la classe parent de s'initialiser. Ses propriétés resteront non initialisées, provoquant des erreurs lors de leur utilisation.
//6.2.b : La propriété est déclarée protected pour permettre aux classes filles d'y accéder directement tout en la masquant à l'extérieur

//6.4.a : Si getAge() est private dans Personne, la classe fille Etudiant ne peut pas l'appeler (Call to private method). Il faut changer sa visibilité en protected.
//6.4.b : Parce que dateNaissance était initialement private dans Personne.
//6.4.c : Réutiliser parent::__toString() évite la duplication de code et respecte le principe DRY (Don't Repeat Yourself).