<?php


namespace App\Controller;


use App\Entity\Category;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CatalogController extends AbstractController
{
    /**
     * @Route ("/catalog", name="")
     * @param ProductRepository $productRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function catalog(ProductRepository $productRepository)
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        $latestProducts = $productRepository->getLatestProducts();

        return $this->render('catalog/index.html.twig', [
            'categories' => $categories,
            'latestProducts' => $latestProducts
        ]);
    }

    /**
     * @Route("category/{id}", name="category")
     */
    public function catalogItem($id, ProductRepository $productRepository)
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        $categoryProducts = $productRepository->getProductListByCategory($id);

        return $this->render('catalog/category.html.twig', [
            'categories' => $categories,
            'categoryProducts' => $categoryProducts
        ]);

    }

}