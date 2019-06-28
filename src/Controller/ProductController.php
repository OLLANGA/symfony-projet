<?php
namespace App\Controller;
use App\Entity\Product;
use App\Form\ProductType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    /**
     * Liste des produits
     * @Route("/produit", name= "liste_produit")
     * @return Response
     */
    public function index(): Response
    {
        // Récupération du Repository des produits
        $repository = $this->getDoctrine()
            ->getRepository(Product::class);
        // Récupérations de tous les produits
        $products = $repository->findAll();
        // Renvoi des produits à la vue
        return $this->render('produit/liste.html.twig', [
            'products' => $products
        ]);
    }
    /**
     * Affiche et traite le formulaire d'ajout d'un produit
     * @Route("/produit/creation", methods={"GET", "POST"})
     * @param Request $requestHTTP
     * @return Response
     */
    public function create(Request $requestHTTP): Response
    {
        // Récupération du formulaire
        $product = new Product();
        $formProduct = $this->createForm(ProductType::class, $product);


        // On envoi les données au formulaire
        $formProduct->handleRequest($requestHTTP);

        // On vérifie que le formulaire est soumis et valide
        if($formProduct->isSubmitted()  && $formProduct->isValid()) {
            //On sauvegarde le produit en BDD grace au manager
           $manager = $this->getDoctrine()->getManager();
            $manager->persist($product);
            $manager->flush();
        }

        // Ajout du message flash
        $this->addFlash('success', 'le produit a bien été ajouté');

        // Rédirection
       // return $this->redirectToRoute('liste_produit');

        /*
        // On sauvegarde le produit en BDD grâce au manager
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($product);
        $manager->flush();
        */
        return $this->render('produit/create.html.twig', [
            'formProduct' => $formProduct->createView()
        ]);
    }

    /**
     * Affiche le détail d'un produit
     * @Route("/produit/{slug<[a-z0-9\-]+>}", methods={"GET", "POST"})
     * @param string $slug
     * @return Response
     */
    public function show(string $slug): Response
    {
        // Récupération du repository
        $repository = $this->getDoctrine()->getRepository(Product::class);
        // Récupération du produit lié au slug de l'URL
        $product = $repository->findOneBy([
            'slug' => $slug
        ]);
        // Renvoi du produit à la vue
        return $this->render('produit/show.html.twig', [
            'product' => $product
        ]);
 
    }
    
}
