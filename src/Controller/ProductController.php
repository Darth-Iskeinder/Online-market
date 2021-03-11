<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route ("/product", name="product")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function product()
    {
        return $this->render('product/product.html.twig');

    }

}