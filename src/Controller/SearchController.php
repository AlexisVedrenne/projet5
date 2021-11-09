<?php

namespace App\Controller;

use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function index(): Response
    {
        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }
    /**
     * @Route("search/handlesearch", name="search_handlesearch")
     */
    public function handleSearch(Request $request,LivreRepository $repo){
        $valeur= $request->request->get('form')['cherche'];
        $livres=$repo->findBySearch($valeur);
        return $this->render('livre/tous.html.twig',['livres'=>$livres]);
    }
    
    public function searchBar() {
        $form = $this->createFormBuilder()
                ->setAction($this->generateUrl("search_handlesearch"))
                ->add('cherche', TextType::class)
                ->add('Rechercher',SubmitType::class)               
                ->getForm();
        return $this->render('search/search.html.twig',['formSearch'=>$form->createView()]);
    }
}
