<?php
class Personne {
    
    public string $nom;
    public string $prenom;

    private string $dateNaissance;
    private string $villeNaissance;
    private string $cin;

   
    public function __construct(
        string $nom,
        string $prenom,
        string $dateNaissance,
        string $villeNaissance,
        string $cin
    ) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->villeNaissance = $villeNaissance;
        $this->cin = $cin;
    }
 
    public function getName(): string {
        return $this->prenom . " " . $this->nom;
    }

    private function getAge(): int {
        $naissance = new DateTime($this->dateNaissance);
        $aujourdhui = new DateTime();
        return $naissance->diff($aujourdhui)->y;
    }
}

// Test
$p = new Personne("Hachimi", "Sara", "2000-05-14", "Marrakech", "EE123456");
echo $p->getName() . PHP_EOL; 
echo $p->nom . PHP_EOL;  


//1.1 Expérimentation :echo $p->cin; $\rightarrow$ Erreur Fatal : Cannot access private property Personne::$cin.echo $p->dateNaissance; $\rightarrow$ Erreur Fatal : Cannot access private property Personne::$dateNaissance.echo $p->getAge(); $\rightarrow$ Erreur Fatal : Call to private method Personne::getAge() from global scope.
//1.2 : Le CIN est une donnée personnelle sensible. Si la propriété était publique, n'importe quelle partie du code externe pourrait modifier sa valeur directement sans validation, risquant une altération involontaire de la donnée.
//1.3 : Non, elle n'est pas inutile. Elle peut être appelée en interne par d'autres méthodes publiques de la classe Personne (ex: dans __toString()) pour encapsuler le calcul de l'âge sans exposer sa complexité.
//1.4 : Si l'on passe cin en protected, l'accès depuis l'extérieur provoque toujours une erreur fatale (Cannot access protected property). Le comportement depuis l'extérieur ne change donc pas ; cela autoriserait seulement les classes filles à y accéder.