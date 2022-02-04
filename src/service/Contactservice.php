<?php

namespace App\service;

use App\Entity\Contact;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Compoment\HttpFoundation\Session\Flash\FlashBagInterface;

class Contactservice
{
    private $manager;
    private $flash;

    public function __construct(EntityManagerInterface $manager,) //FlashBagInterface $flash
    {
        $this->manager = $manager;
        // $this->flash = $flash;
    }
    public function persistContact(Contact $contact): void
    {
        $contact->setIsSend(false)
            ->setCreatedAt(new DateTime('now'));
        $this->manager->persist($contact);
        $this->manager->flush();
        //  $this->flash->add('success', 'votre message est bien envoye, merci');
    }
    public function isSend(Contact $contact): void
    {
        $contact->setIsSend(true);
        $this->manager->persist($contact);
        $this->manager->flush();
    }
}
