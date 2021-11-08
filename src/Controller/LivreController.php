<?php

namespace App\Controller;

use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/livre", name="livre_")
 */
class LivreController extends AbstractController
{


    /**
     * @Route("/tous",name="tous")
     */
    public function getAll(LivreRepository $repo){

        return $this->render('livre/tous.html.twig',['livres'=>$repo->findAll()]);
    }
}
