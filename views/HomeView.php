<?php
namespace App\View;

class HomeView extends View {
    public function index() {
        if(isset($_POST['nom-req']) && isset($_POST['postNom-req']) && isset($_POST['preNom-req']) && isset($_POST['telephone-req']) && isset($_POST['email-req']) && isset($_FILES['documents'])) {
            try {
                // Validation des données
                $nom = htmlspecialchars($_POST['nom-req']);
                $postNom = htmlspecialchars($_POST['postNom-req']);
                $preNom = htmlspecialchars($_POST['preNom-req']);
                $telephone = htmlspecialchars($_POST['telephone-req']);
                $email = htmlspecialchars($_POST['email-req']);;
                $numRef = "Inscription_" . time();

                // Création du dossier pour l'étudiant
                $uploadDir = "config/ista-assets/documents/";

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // Traitement des fichiers
                $uploadedFiles = [];
                $allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];
                $maxFileSize = 5 * 1024 * 1024; // 5MB

                foreach($_FILES['documents']['tmp_name'] as $key => $tmpName) {
                    $fileType = $_FILES['documents']['type'][$key];
                    $fileSize = $_FILES['documents']['size'][$key];
                    $fileName = $_FILES['documents']['name'][$key];

                    // Vérifications de sécurité
                    if (!in_array($fileType, $allowedTypes)) {
                        throw new \Exception("Type de fichier non autorisé: $fileName");
                    }
                    if ($fileSize > $maxFileSize) {
                        throw new \Exception("Fichier trop volumineux: $fileName");
                    }

                    // Upload du fichier
                    if(is_uploaded_file($tmpName)) {
                        $safeFileName = $numRef . "_" . basename($fileName);
                        $destination = $uploadDir . $safeFileName;
                        
                        if (move_uploaded_file($tmpName, $destination)) {
                            $uploadedFiles[] = $safeFileName;
                        } else {
                            throw new \Exception("Échec de l'upload pour: $fileName");
                        }
                    }
                }

                // Log de l'inscription
                $logMessage = date('Y-m-d H:i:s') . " - Nouvelle inscription: $nom ($telephone, $numRef)\n";

                return $this->render('inscription', [
                    'success' => true,
                    'nom' => $nom, 
                    'postNom' => $postNom,
                    'preNom' => $preNom,
                    'telephone' => $telephone,
                    'email' => $email,
                    'numRef' => $numRef
                ], "Inscription réussie");

            } catch (\Exception $e) {
                return $this->render('home', [
                    'error' => $e->getMessage()
                ], "Erreur d'inscription");
            }
        }

        // Render the home page view
        return $this->render('home', [], "Acceuil");
    }

    public function inscription() {
        return $this->render('inscription', [], "Inscription");
    }

    public function valves() {
        // Render the valves page view
        return $this->render('valves', [], "Actualités");
    }

    public function communique($id) {
        return $this->render('communique', ['id' => $id], "Communiqué");
    }

    public function about() {
        // Render the about page view
        return $this->render('about', [], "A Propos");
    }

    public function contact() {
        // Render the contact page view
        return $this->render('contact', [], "Nous Contacter");
    }

    public function panier() {
        // Render the panier page view
        return $this->render('panier', [], "Panier");
    }

    public function login() {
        // Render the login page view
        return $this->render('login', [], "Connexion");
    }
}