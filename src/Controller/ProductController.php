<?php


namespace App\Controller;


use App\Entity\Category;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route ("/product/{id}", name="product")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function product($id)
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        return $this->render('product/product.html.twig', [
            'categories' => $categories,
            'product' => $product
        ]);

    }

}