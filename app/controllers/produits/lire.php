<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");//définie le contenu de la réponse (reponse en json)
header("Access-Control-Allow-Methods: GET");//  get pour lire
header("Access-Control-Max-Age: 3600");// la durée de vie de la requete
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie que la méthode utilisée est correcte
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // On inclut les fichiers de configuration et d'accès aux données
    include_once '../config/Database.php';
    include_once '../models/Produits.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les produits
    $produit = new Produits($db);

    // On récupère les données
    $stmt = $produit->lire();//$stmt stocker un objet de déclaration lié à une requête préparée (pas fetch)

    // On vérifie si on a au moins 1 produit
    if($stmt->rowCount() > 0){
        // On initialise un tableau associatif
        $tableauProduits = [];
        $tableauProduits['produits'] = [];

        // On parcourt les produits
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $prod = [
                "id" => $id,
                "nom" => $nom,
                "description" => $description,
                "prix" => $prix,
                "categories_id" => $categories_id,
                "categories_nom" => $categories_nom
            ];

            $tableauProduits['produits'][] = $prod;
        }
        
        http_response_code(200);
        echo json_encode($tableauProduits);
    }

}else{
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}