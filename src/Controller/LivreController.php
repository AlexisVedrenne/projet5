<?php

namespace App\Controller;

use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Livre;
use App\Form\LivreType;

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

    /**
     * @Route("/add",name="add")
     */
    public function AddLivre(EntityManagerInterface $manager,Request $request){
        $livre=new Livre();
        $form=$this->createForm(LivreType::class,$livre);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $livre=$form->getData();
            $manager->persist($livre);
            $manager->flush();
        }
        return $this->render("livre/add.html.twig",['form'=>$form->createView()]);
    }


    /**
     * @Route("/voir/{id}",name="voir")
     */
    public function  getLivre(Livre $livre){
        return $this->render("livre/voir.html.twig",['livre'=>$livre]);
    }
}
