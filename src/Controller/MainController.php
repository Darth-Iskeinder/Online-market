<?php


namespace App\Controller;


use App\Entity\Category;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route ("/")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function mainPage(ProductRepository $productRepository, PaginatorInterface $paginator, Request $request)
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        $latestProducts = $productRepository->getLatestProducts();
        $pagination = $paginator->paginate(
            $latestProducts,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render('main/index.html.twig', [
            'categories' => $categories,
            'pagination' => $pagination
        ]);
    }


}