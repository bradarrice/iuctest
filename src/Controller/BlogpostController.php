<?php

namespace App\Controller;

use App\Entity\Blogpost;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\BlogpostRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\service\Commentaireservice;

class BlogpostController extends AbstractController
{
    #[Route('/actualites', name: 'actualites')]
    public function actualites(
        BlogpostRepository $blogpostRepository,
        PaginatorInterface $paginator,
        Request $request,


    ): Response {
        $data = $blogpostRepository->findBy([], ['id' => 'DESC']);
        $blogposts = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            6
        );
        return $this->render('blogpost/actualites.html.twig', [
            'blogposts' => $blogposts,
        ]);
    }

    #[Route('/actualites/{slug}', name: 'actualites_detail')]

    public function details(
        Blogpost $blogpost,
        Request $request,
        Commentaireservice $commentaireService
    ): Response {
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $form = $form->getData();
            $commentaireService->persistCommentaire($commentaire, $blogpost, null);

            return $this->redirectToRoute('actualites_detail', ['slug' => $blogpost->getSlug()]);
        }


        return $this->render('blogpost/detail.html.twig', [
            'blogpost' => $blogpost,
            'form'     => $form->createView(),
        ]);
    }
}
