<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\ProductsManager;

class ProductsController extends Controller
{
	public function index() 
	{
		// Instance du Manager d'articles
		$products = new ProductsManager();

		$this->show('products/index');

	}

	public function create() 
	{
		$name = null;
		$description = null;
		$image = null;
		$price = null;

		$save = true;

		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			// Récupération des données $_POST
			$name = $_POST['name'];
			$description = $_POST['description'];
			$image = $_POST['image'];
			$price = $_POST['price'];

			// Contrôle et formatage des données

			// Enregistre en BDD

			
		}

		$this->show('products/create');
	}

	public function read()
	{
		$this->show('products/read');
	}

	public function edit()
	{
		$this->show('products/edit');
	}

	public function delete()
	{
		$this->show('products/delete');
	}
}