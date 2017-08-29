<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Manager\UserManager;

class UsersController extends Controller
{

	private $user_m;

	public function __construct() 
	{
		$this->user_m = new UserManager;
		$this->user_m->setTable('Users');
		
	}

	public function index() 
	{
		// Contrôle de l'accès
		$user = $this->getUser();
		

		
		if (!$user) {
			$this->redirectToRoute('security_signin');
		}

		// Affichage de la vue du profil
		$this->show('users/index', [
			"title" => "Adieu " . $user['username'],
			"user" => $this->user_m->find($user['id']),
			]);
	}
}