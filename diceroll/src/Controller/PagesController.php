<?php

namespace App\Controller;

use App\Service\ExperienceMaker;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CombinaisonCalculator\CombinaisonCalculator;
use App\Service\CombinaisonCalculator\ThreeOfAKind;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PagesController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(ExperienceMaker $experienceMaker, ThreeOfAKind $threeOfAKind): Response
    {
        

        // if($form->issubmitted && $form->isValide) {
        if(true) {
             $experience = $experienceMaker->throwDices(1000);

             $result = $threeOfAKind->calcul($experience, 666);    
             
             dd($result);
        }

        return $this->render('pages/home.html.twig', [
        ]);
    }

    #[Route('/description', name: 'description')]
    public function description(): Response
    {
        return $this->render('pages/description.html.twig', [
        ]);
    }

    #[Route('/result', name: 'result')]
    public function result(): Response
    {
        return $this->render('pages/result.html.twig', [
        ]);
    }
}
