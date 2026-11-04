<?php
class Utilisateur {
    public string $nom;
    public int $age;
    private string $motDePasse;

    public function __construct(string $nom, int $age, string $motDePasse) {
        $this->nom = $nom;
        $this->age = $age;
        $this->motDePasse = $motDePasse;
    }

    public function __serialize(): array {
        return [
            'nom' => $this->nom,
            'age' => $this->age,
        ];
    }

    public function __unserialize(array $data): void {
        $this->nom = $data['nom'];
        $this->age = $data['age'];
        $this->motDePasse = ""; 
    }
}

$u = new Utilisateur("Alice", 25, "secret123");
$serialise = serialize($u);
echo "Sérialisé : $serialise" . PHP_EOL;

$restaure = unserialize($serialise);
var_dump($restaure);


//5.1 : Non, le mot de passe ne figure pas dans la chaîne sérialisée grâce au filtre défini dans __serialize().
//5.2 : Si on commente __serialize(), PHP sérialise l'intégralité des attributs (y compris motDePasse). Risque : Exposer des clés/mots de passe en clair dans des fichiers de session ou en base de données.
//5.3 : Après désérialisation, $motDePasse vaut une chaîne vide "". Dans une vraie application, il faut recharger l'utilisateur depuis la base de données ou lui demander de se réauthentifier.
//5.4 Réflexion sécurité : Appeler unserialize() sur des données utilisateur non fiables expose au risque d me PHP Object Injection. Un attaquant peut instancier des classes arbitraires et exécuter du code malveillant via les méthodes magiques (__destruct, __toString, etc.).
