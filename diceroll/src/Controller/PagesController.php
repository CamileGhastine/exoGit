<?php

namespace App\Controller;

use App\Entity\Experience;
use App\Service\ExperienceMaker;
use App\Form\Type\ExperienceType;
use App\Repository\ExperienceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CombinaisonCalculator\ThreeOfAKind;
use App\Service\CombinaisonCalculator\CombinaisonCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PagesController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {

        $experience = new Experience();
        $form = $this->createForm(ExperienceType::class, $experience);

        return $this->render('pages/index.html.twig', [
            'form'  => $form->createView(),
        ]);
    }

    #[Route('/ajaxResult', name: 'ajaxResult')]
    public function ajaxResult(Request $request, ExperienceMaker $experienceMaker, ThreeOfAKind $threeOfAKind): Response
    {
        $number = $request->request->get('numberOfThrow');

        if(is_numeric($number)) {
            $number = intval($number);

            $experience = $experienceMaker->throwDices($number);

            $result = $threeOfAKind->calcul($experience, 666);    

            return $this->json([$result], 200);
        }

        return $this->json(['error' => 'Le nombre de jet doit être un entier'], 400);
    }

    #[Route('/description', name: 'description')]
    public function description(): Response
    {
        return $this->render('pages/description.html.twig', [
        ]);
    }

    #[Route('/result', name: 'result')]
    public function result(ExperienceRepository $repo, ThreeOfAKind $threeOfAKind): Response
    {  
        $result = [];

        $experiences = $repo->findAll();

        foreach($experiences as $experience) {
            $CombinaisonNumber = $threeOfAKind->calcul($experience, 666);
            $result[] = ['experience' => $experience, 'result' => $CombinaisonNumber];
        }
           
        
        return $this->render('pages/result.html.twig', [
            'experiences' => $result
        ]);
    }
}
