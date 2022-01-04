<?php

namespace App\Controller;

use App\Service\ExperienceMaker;
use App\Entity\Experience;
use App\Form\Type\ExperienceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CombinaisonCalculator\CombinaisonCalculator;
use App\Service\CombinaisonCalculator\ThreeOfAKind;

class PagesController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(ExperienceMaker $experienceMaker, ThreeOfAKind $threeOfAKind): Response
    {

        $experience = new Experience();
        $form = $this->createForm(ExperienceType::class, $experience);

        if($form->issubmitted && $form->isValide) {
             $experience = $experienceMaker->throwDices(5);

             $result = $threeOfAKind->calcul($experience, 666);    
             
             dd($result);
        }

        return $this->render('pages/index.html.twig', [
            'form'  => $form->createView(),
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
