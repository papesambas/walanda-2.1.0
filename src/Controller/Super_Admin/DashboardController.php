<?php

namespace App\Controller\Super_Admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use App\Controller\Super_Admin\EtablissementsCrudController;
use App\Entity\Etablissements;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
    }
    #[Route('/super/admin', name: 'super_admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(EtablissementsCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
        //$adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        //return $this->redirect($adminUrlGenerator->setController(EtablissementsCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Walanda');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        //yield MenuItem::linkToCrud('Etablissements', 'fas fa-list', Etablissements::class);
        yield MenuItem::subMenu('Etablissement', 'fas fa-university')->setSubItems([
            MenuItem::linkToCrud('Liste', 'fas fa-list', Etablissements::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Ajout', 'fas fa-plus', Etablissements::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Détail', 'fas fa-glasses', Etablissements::class)->setAction(Crud::PAGE_DETAIL)

        ]);
        yield MenuItem::subMenu('Utilisateurs', 'fas fa-users')->setSubItems([
            MenuItem::linkToCrud('Liste', 'fas fa-list', Users::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Ajout', 'fas fa-plus', Users::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Détail', 'fas fa-glasses', Users::class)->setAction(Crud::PAGE_DETAIL)

        ]);
    }
}
