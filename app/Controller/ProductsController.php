<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\ProductsManager;

class ProductsController extends Controller
{

	private $ProductsManager;

	public function __construct() 
	{
		$this->ProductsManager = new ProductsManager;
	}

	public function index() 
	{
		
		$products = $this->ProductsManager->findAll();

		$this->show('products/index', [
			"products" => $products
			]);

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
			if ($save) {
				// Instance du Manager d'articles
				

				$products = $this->ProductsManager->insert(
					[
					"name" => $name,
					"description" => $description,
					"image" => $image,
					"price" => $price,
					]);

				// Recup du dernier ID
				$productID = $products['id'];

				// Redirige vers la page du produit
				$this->redirectToRoute('product_read', ['id' => $productID]);
			}
			
		}

		$this->show('products/create', [
			"name" => $name,
			"description" => $description,
			"image" => $image,
			"price" => $price,
			]);
	}

	public function read($id)
	{
		// Instance du Manager et Récupération de l'article
		$products = $this->ProductsManager->find($id);

		$this->show('products/read', [
			"id" => $id,
			"name" => $products['name'],
			"description" => $products['description'],
			"image" => $products['image'],
			"price" => $products['price'],
			]);
	}

	public function update($id)
	{

		$product = $this->ProductsManager->find($id);

		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			$save = true;

			// Récupération des données $_POST
			$name = $_POST['name'];
			$description = $_POST['description'];
			$image = $_POST['image'];
			$price = $_POST['price'];

			// Contrôle et formatage des données

			// Enregistre en BDD
			if ($save) {
				// Instance du Manager d'articles
				

				$this->ProductsManager->update(
					[
					"name" => $name,
					"description" => $description,
					"image" => $image,
					"price" => $price,
					], $product['id']);

				

				// Redirige vers la page du produit
				$this->redirectToRoute('product_read', ['id' => $product['id']]);
			}
			
		}

		// Récupération des données de POST. 

		$this->show('products/update', [
			"title" => "Modifier :".$product['name'],
			"name" => $product['name'],
			"description" => $product['description'],
			"image" => $product['image'],
			"price" => $product['price'],
			]);
	}

	public function delete($id)
	{
		$product = $this->ProductsManager->find($id);

		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			
			$this->ProductsManager->delete($id);
			$this->redirectToRoute('products_index');
		}
	

		$this->show('products/delete', [
			"title" => "Suppression du produit : ".$product['name'],
			"product" => $product,
			]);
	}

	public function ajaxIndex()
	{
		$data = $this->ProductsManager->findAll();
		$this->showJson($data);
	}
}