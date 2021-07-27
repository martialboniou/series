<?php

namespace App\Controller;

use App\Entity\Serie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/series', name: 'serie_')]
class SerieController extends AbstractController
{
    #[Route('', name: 'list')]
    public function list(): Response
    {
        // todo: aller chercher les séries en BDD
        return $this->render('serie/list.html.twig', [
        ]);
    }

    #[Route('/details/{id}', name: 'details')]
    public function details(int $id): Response {
        // todo: aller chercher les séries en BDD
        return $this->render('serie/details.html.twig');
    }

    #[Route('/create', name: 'create')]
    public function create(Request $request): Response {
        // todo: aller chercher les séries en BDD
        return $this->render('serie/create.html.twig');
    }

    #[Route('/demo', name: 'em-demo')]
    public function demo(EntityManagerInterface $em): Response {

        // création d'une instance
        $serie = new Serie;

        // hydratation de toutes les propriétés
        $serie->setName('pif');
        $serie->setBackdrop('dafsd');
        $serie->setPoster('oeuo');
        $serie->setDateCreated(new \DateTime());
        $serie->setFirstAirDate(new \DateTime('-1 year'));
        $serie->setLastAirDate(new \DateTime('-6 month'));
        $serie->setGenres('drama');
        $serie->setOverview('bla bla bla');
        $serie->setPopularity(123.00);
        $serie->setVote(8.2);
        $serie->setStatus('Cancelled');
        $serie->setTmdbId(329432);

        dump($serie);

        $em->persist($serie);
        $em->flush();

        dump($serie);

        $em->remove($serie);
        $em->flush();

        return $this->render('serie/create.html.twig');
    }
}
