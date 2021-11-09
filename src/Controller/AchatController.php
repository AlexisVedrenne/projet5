<?php

namespace App\Controller;

use App\Entity\Achat;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Livre;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/achat", name="achat")
 */
class AchatController extends AbstractController
{

    /**
     * @Route("/livre/{id}",name="livre")
     */
    public function buyLivre(Livre $livre){
        return $this->render('achat/recap.html.twig',['livre'=>$livre]);
    }

    /**
     * @Route("/livre/confirme/{id}",name="confirme")
     */
    public function confirmeLivre(Livre $livre,EntityManagerInterface $manager){
        $user=$this->getUser();
        if($user->getNom()&&$user->getAdresse()&&$user->getVille()&&$user->getCp()){
            $achat=new Achat();
            $achat->addUser($user);
            $achat->setLivre($livre);
            $achat->setDataAchat(new DateTime('NOW'));
            $achat->setRenvoie(null);
            $user->addAchat($achat);
            $livre->addAchat($achat);
            $manager->persist($livre);
            $manager->persist($user);
            $manager->persist($achat);
            $manager->flush();
            return $this->redirectToRoute('user_profile');
        }
        
    }
}
