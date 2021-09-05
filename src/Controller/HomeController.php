<?php

namespace App\Controller;

use App\Entity\Chapitre;
use App\Entity\Module;
use App\Entity\Niveau;
use App\Repository\ModuleRepository;
use App\Repository\NiveauRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function niveau(): Response
    {
        if(!$user = $this->getUser()){
            $this->redirectToRoute('app_login');
        }
        $repo = $this->getDoctrine()->getRepository(Niveau::class);
        $niveaux = $repo->findAll();
        //dd($niveaux);
        
        return $this->render('home/index.html.twig', [
            'niveaux' => $niveaux,
        ]);
    }

      /**
     * @Route("/modules/{id}", name="modules")
     */
    public function module(int $id): Response
    {
       // $module = 1;
        $repos = $this->getDoctrine()->getRepository(Niveau::class);
        $niveaux = $repos->find($id); 
        //dd($niveaux);
        if(!$niveaux){
            return $this->redirectToRoute('home');
        }
        $modules = $niveaux->getModule()->getValues();
       
        
        return $this->render('home/modules.html.twig',[
            'modules' => $modules,
        ]);
    }



       /**
     * @Route("/chapitres/{id}", name="chapitres")
     */
    public function chapitre(int $id): Response
    {
      
        $repos = $this->getDoctrine()->getRepository(Module::class);
        $module = $repos->find($id); 
        //dd($module);
        if(!$module){
            return $this->redirectToRoute('home');
        }
        $chapitres = $module->getChapitre()->getValues();
        //dd($chapitres);
        return $this->render('home/chapitre.html.twig',[
            'chapitres' => $chapitres,
            'module' => $module,
        ]);
    }


       /**
     * @Route("/coures/{id}", name="coures")
     */
    public function coures(int $id): Response
    {
      
        $repos = $this->getDoctrine()->getRepository(Chapitre::class);
        $chapitre = $repos->find($id); 
        //dd($module);
        if(!$chapitre){
            return $this->redirectToRoute('home');
        }
        $courses = $chapitre->getCours()->getValues();
        $tds = $chapitre->getTd()->getValues();
        $tps = $chapitre->getTp()->getValues();
       
        //dd($tds);
        return $this->render('home/course.html.twig',[
            'courses' => $courses,
            'tds' => $tds,
            'tps' => $tps,
            'chapitre' => $chapitre,
        ]);
    }
}
