<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\ContactsManager;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('default/home');
	}

	public function contact()
	{
		$name = null; 
		$email = null; 
		$message = null; 

		$save = true;
		
		if ($_SERVER['REQUEST_METHOD'] === "POST") 
		{
			
		// Récupération des données du formulaire
			$name = $_POST['name'];
			$email = $_POST['email'];
			$message = $_POST['message'];

		// Vérification des données


			if ($save) {
			
		
		// Enregistrer les données dans la BDD
				$contacts_manager = new ContactsManager();
				$contacts_manager->insert([
					"name" => $name,
					"email" => $email,
					"message" => $message,
					]);


		// Rediriger l'utilisateur vers la page d'accueil


			} 
		}


		// Afficher la vue
		$this->show('default/contact', [
			"name" => $name,
			"email" => $email,
			"message" => $message,
			]);
	}

}