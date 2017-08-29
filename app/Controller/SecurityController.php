<?php

namespace Controller;
use \W\Controller\Controller;
use \W\Security\AuthentificationManager;
use \W\Manager\UserManager;

class SecurityController extends Controller
{

	private $userManager;
	private $AuthManager;

	public function __construct()
	{
		$this->userManager = new UserManager;
		$this->userManager->setTable('Users');

		$this->AuthManager = new AuthentificationManager;
	}


	public function signin()
	{
		$error = null;

		// If method POST
		if ($_SERVER['REQUEST_METHOD'] === "POST") 
		{
			
		// Récupérer les données du formulaire
			$email = $_POST['user']['email'];
			$password = $_POST['user']['password'];

			

		// Vérifier les données (dans la bdd - Est ce que l'utilisateur existe ?)
		// Contrôler les identifiants (login + pwd)
			if($userId = $this->AuthManager->isValidLoginInfo($email, $password))
			{
				// Récup des données de l'utilisateur dans la bdd
				$user = $this->userManager->find($userId);

				// Ajouter l'utilisateur à la SESSION
				$this->AuthManager->logUserIn($user);

			
				// Redirige l'utilisateur vers sa page profil
				$this->redirectToRoute('profile');
			}
		// Echec de connexion
			else {
				// Message d'erreur
				$error = "Echec d'identification";
			}
		
		}
		// Affiche le formulaire d'identification
		$this->show('security/signin', [
			"title" => "Identification",
			"error" => $error,
			]);

	}

	public function signup()
	{
		$username = null;
		$email = null;
		$password = null;
		$repeat_password = null; 
		$error = null;

		// if method POST
		if ($_SERVER['REQUEST_METHOD'] === "POST") 
		{
			$save = true;
		// Récupérer les données du formulaire
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repeat_password = $_POST['repeat_password']; 

		// Contrôle des données du POST
		// Contrôle l'adresse email
		if (empty($email)) {
			$save = false;
			// message d'erreur
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$save = false;
		}

		// Contrôle des 2 MDP
		if ($password !== $repeat_password) {
			$save = false;
			// message d'erreur
		}

		// Cryptage du mot de passe
		else {
			$password = password_hash($password, PASSWORD_DEFAULT);
			
		}


		if($save) {
		// Test de l'existence de l'utilisateur (dans la bdd)
			// SI L'UTILISATEUR N'EXISTE PAS
		if (!$this->userManager->emailExists($email)) {
			
		// on enregistre les données dans la bdd
			$user = $this->userManager->insert([
				"username" => $username,
				"email" => $email,
				"password" => $password,
				]);

		// Ajoute l'utilisateur à la SESSION
			$_SESSION['user'] = array(
				"id" => $user['id'],
				"email" => $user['email'],
				"username" => $user['username'],
				);

		// On redirige l'utilisateur vers sa page de profil
			$this->redirectToRoute('profile');
		}

		// SI L'UTILISATEUR EXISTE
		else {

		// On affiche un message d'erreur
		// message dans un flashbag
			$error = "Un utilisateur existe déjà avec l'adresse email : $email";
			}
		}

	}



		// Affiche le formulaire d'inscription
		$this->show('security/signup', [
			"title" => "Inscription",
			"username" => $username,
			"email" => $email,
			"error" => $error,

			]);

	}

	public function logout()
	{
		// On détruit la SESSION
		$this->AuthManager->logUserOut();

		// On redirige vers la page d'accueil
		$this->redirectToRoute('home');
	}

	public function lostPwd()
	{
		// if method POST
		if($_SERVER['REQUEST_METHOD'] === "POST") 
		{

		// Récupération des données du POST
			$email = strip_tags(trim($_POST['email']));

		// Récupération de l'utilisateur dans la BDD (est-ce que l'utilisateur existe ?)
			if ($user = $this->userManager->getUserByUsernameOrEmail($email)) {;

		// Generation du Token
			$token = array(
				"token" => md5(\W\Security\StringUtils::randomString(10)), // Token
				"timeout" => time()+3600, // Timeout
				"user_id" => $user['id'], // ID user
				);

			$tokensManager = new \Manager\TokensManager;
			$tokensManager->insert($token);

			// Envoi du mail avec le process de renouvellement du MDP

			// Affichage le message de prise en compte de la demande
		}

			// Pas d'utilisateur en BDD -> Affiche un message d'erreur
	} else {

	}
		

		// Affichage du formulaire(adresse email)
		$this->show('security/pwd/lost', [
			"title" => "Mot de passe oublié"
			]);
	}

	public function resetPwd()
	{
		// if method POST

		// Récupération des données du POST

		// Contrôle du Token

		// Contrôle des MDP

		// Récupération de l'utilisateur dans la BDD

		// M.A.J. du MDP dans la BDD

		// Redirige l'utilisateur vers la page signIN

		// Affichage du formulaire
		$this->show('security/pwd/reset', [
			"title" => "Changer le mot de passe "
			]);
	}
}

