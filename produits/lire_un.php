<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie que la méthode utilisée est correcte
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    include_once '../config/Database.php';
    include_once '../models/Produits.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les produits
    $produit = new Produits($db);

    $donnees = json_decode(file_get_contents("php://input"));

    if(!empty($donnees->id)){
        $produit->id = $donnees->id;
        $produit->lireUn();
        if($produit->nom != null){

            $prod = [
                "id" => $produit->id,
                "nom" => $produit->nom,
                "description" => $produit->description,
                "prix" => $produit->prix,
                "categories_id" => $produit->categories_id,
                "categories_nom" => $produit->categories_nom
            ];
            http_response_code(200);
            echo json_encode($prod);
        }else{
            http_response_code(404);
         
            echo json_encode(array("message" => "Le produit n'existe pas."));
        }
        
    }
}else{
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}