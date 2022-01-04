<?php

namespace App\Controller;

<<<<<<< HEAD
use App\Service\ExperienceMaker;
=======
use App\Entity\Experience;
use App\Form\Type\ExperienceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
>>>>>>> 6af7860a41185de0398e03144eeb897e9aaa374a
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
