<?php

namespace App\Controller;

use App\Repository\UserRepository;
use SebastianBergmann\Environment\Console;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AproposController extends AbstractController
{   
    /**
     * @Route("/apropos", name="apropos")
     */
   
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('apropos/index.html.twig', [
            'peintre' => $userRepository->getPeintre(),
            
        ]);
       
    } 
}
