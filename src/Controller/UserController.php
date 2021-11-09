<?php

namespace App\Controller;

use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/user",name="user_")
 */
class UserController extends AbstractController
{

    /**
     * @Route("/profile",name="profile")
     */
    public function getProfile(Request $request,EntityManagerInterface $manager){
        $user=$this->getUser();
        $achats=$user->getAchats();
        $form=$this->createForm(UserType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('user_profile');
        }
        return $this->render('user/profile.html.twig',['form'=>$form->createView(),'achats'=>$achats]);
    }
}
