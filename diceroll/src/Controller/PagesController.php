<?php

namespace App\Controller;

use App\Entity\Experience;
use App\Form\Type\ExperienceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
