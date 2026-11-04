<?php
class Personne {
    private string $nom = "";
    private string $prenom = "";
    private string $dateNaissance = "";

    public function __set(string $name, mixed $value): void {
        if (!property_exists($this, $name)) {
            echo "Propriété $name inexistante." . PHP_EOL;
            return;
        }

        // Validation demandée à la question 3.4
        if ($name === 'nom') {
            if (!is_string($value) || strlen(trim($value)) < 2) {
                throw new InvalidArgumentException("Le nom ne doit pas être vide et doit contenir au moins 2 caractères.");
            }
        }

        $this->$name = $value;
    }

    public function __get(string $name): mixed {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }

    public function __isset(string $name): bool {
        return property_exists($this, $name) && !empty($this->$name);
    }

    public function __unset(string $name): void {
        if (property_exists($this, $name)) {
            $this->$name = "";
        }
    }
}

// Tests
$p = new Personne();
$p->nom = "Hachimi";              
echo $p->nom . PHP_EOL;          
var_dump(isset($p->nom));        
unset($p->nom);                  
var_dump(isset($p->nom));       

$p->telephone = "0600000000"; 

//3.2 : Sans __set, écrire $p->nom = "X" lorsque nom est privé génère une erreur d'accès (Cannot access private property). Avec __set, PHP intercepte la tentative et exécute la méthode magique.
//3.3 : Oui, un __set permissif (qui accepte n'importe quelle affectation) casse le principe d'encapsulation. Pour y remédier, il faut intégrer des structures de contrôle/validation des valeurs attribuées avant d'affecter la propriété.