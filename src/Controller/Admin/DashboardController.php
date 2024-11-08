<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Entreprise;
use App\Entity\Offre;
use App\Entity\Statut;
use App\Entity\TypeContrat;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
         return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Shop');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home'); 
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Offre', 'fas fa-user', Offre::class);
        yield MenuItem::linkToCrud('Categories', 'fas fa-user', Category::class);
        yield MenuItem::linkToCrud('Type de Contrat', 'fas fa-user', TypeContrat::class);
        yield MenuItem::linkToCrud('Entreprise', 'fas fa-user', Entreprise::class);
        yield MenuItem::linkToCrud('Statut', 'fas fa-user', Statut::class);
        yield MenuItem::linkToRoute('Retour au site', 'fas fa-home', 'app_offre_index');
    }
}
