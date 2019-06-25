<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController  extends AbstractController
{
    public function index() 
    {

        return $this->render('index.html.twig');
    }

    /**
     * un documen
     * @Route("/contact", name="app_contact")
     * @return void
     */
    public function contact():response
    {
        return $this->render('contact.html.twig');

    }
}

