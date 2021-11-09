<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Livre;

/**
 * @Route("/achat", name="achat")
 */
class AchatController extends AbstractController
{


    /**
     * @Route("/livre/{id}",name="livre")
     */
    public function buyLivre(Livre $livre){

    }
}
