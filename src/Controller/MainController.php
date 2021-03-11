<?php


namespace App\Controller;


use App\Entity\Category;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route ("/")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function mainPage(ProductRepository $productRepository)
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        $latestProducts = $productRepository->getLatestProducts();

        return $this->render('main/index.html.twig', [
            'categories' => $categories,
            'latestProducts' => $latestProducts
        ]);
    }


}