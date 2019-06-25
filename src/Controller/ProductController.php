<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController

{

    
/**
 * affaire le détail d'un produit
 * @Route("/produit")
 * @return response
 */


public function liste():Response
{

    return $this->render('produit/liste.html.twig');
}

/**
 * affiche traite le formulaire d'ajout d'un produit
 * @Route("/produit/creation", methods={"GET", "POST"})
 * @param Request $requestHTTP
 * @return Response
 */


public function create(Request $requestHTTP):Response
{
    //Recuperation des POSTS
    dump($requestHTTP->request);
    return $this->render('produit/create.html.twig');
}







/**
 * affiche le détail d'un produit
 * @Route(
 * "/produit/{slug}")
 * @param string $slug
 * @return Response
 */


public function show(string $slug):Response
{
 
    return $this->render('produit/show.html.twig');
}

}