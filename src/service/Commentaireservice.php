<?php

namespace App\service;

use App\Entity\Blogpost;
use App\Entity\Commentaire;
use App\Entity\Contact;
use App\Entity\Peinture;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Compoment\HttpFoundation\Session\Flash\FlashBagInterface;

class Commentaireservice
{
    private $manager;
    private $flash;

    public function __construct(EntityManagerInterface $manager,) //FlashBagInterface $flash
    {
        $this->manager = $manager;
        // $this->flash = $flash;
    }
    public function persistCommentaire(Commentaire $commentaire, Blogpost $blogpost = null, Peinture $peinture = null): void
    {
        $commentaire->setIsPublished(false)
            ->setBlogpost($blogpost)
            ->setPeinture($peinture)
            ->setCreatedAt(new DateTime('now'));
        $this->manager->persist($commentaire);
        $this->manager->flush();
        $this->flash->add('success', 'votre message est bien envoye, merci');
    }
}
