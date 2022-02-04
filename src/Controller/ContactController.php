<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\service\Contactservice;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, Contactservice $contactservice): Response
    {
         $contact =new Contact();
         $form = $this->createForm(ContactType::class, $contact);
          $form->handleRequest($request);
          if($form->isSubmitted() && $form->isValid()) {
              $contact= $form->getData();
              $contactservice->persistContact($contact);
              return $this->redirectToRoute('contact');

          }
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
