<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route ("/")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function mainPage()
    {
        return $this->render('main/index.html.twig');
    }

}