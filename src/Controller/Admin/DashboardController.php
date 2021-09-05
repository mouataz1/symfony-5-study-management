<?php

namespace App\Controller\Admin;

use App\Entity\Chapitre;
use App\Entity\Cours;
use App\Entity\Module;
use App\Entity\Niveau;
use App\Entity\Td;
use App\Entity\Tp;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(NiveauCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Studies Management');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Niveau', 'fas fa-user-graduate', Niveau::class);
        yield MenuItem::linkToCrud('Modules', 'fas fa-archive', Module::class);
        yield MenuItem::linkToCrud('Chapitres', 'fas fa-bookmark', Chapitre::class);
        yield MenuItem::linkToCrud('Courses', 'fas fa-book', Cours::class);
        yield MenuItem::linkToCrud('TDs', 'fas fa-list', Td::class);
        yield MenuItem::linkToCrud('TPs', 'fas fa-clipboard-list', Tp::class);
    }
}
