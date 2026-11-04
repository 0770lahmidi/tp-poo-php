<?php
class Personne {
    private string $nom;
    private string $prenom;
    private string $dateNaissance;

    public function __construct(string $nom, string $prenom, string $dateNaissance) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
    }

    private function getAge(): int {
        $naissance = new DateTime($this->dateNaissance);
        $aujourdhui = new DateTime();
        return $naissance->diff($aujourdhui)->y;
    }

    public function __toString(): string {
        return "{$this->prenom} {$this->nom} ({$this->getAge()} ans)";
    }
}

$p = new Personne("Hachimi", "Sara", "2000-05-14");
echo $p . PHP_EOL; 


//4.1 : getAge() est privée au sein de la classe Personne, mais __toString() est une méthode membre de cette même classe. Elle a donc l'autorisation d'accéder aux membres privés.
//4.2 : Si __toString() renvoie un type autre que string (par exemple un int), PHP lève une erreur fatale : Fatal error: Method Personne::__toString() must return a string type.
