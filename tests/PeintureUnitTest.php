<?php
namespace App\Tests;

use App\Entity\Categorie;
use App\Entity\Peinture;
use App\Entity\User;
use DateTime;

use PHPUnit\Framework\TestCase;

class PeintureUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $peinture = new Peinture();
        $datetime = new DateTime();
        $categorie = new Categorie();
        $user = new User();

        $peinture->setNom('nom')
            ->setLargeur(20.20)
            ->setHauteur(20.20)
            ->setEnvente(true)
            ->setAteRealisation($datetime)
            ->setcreatedAt($datetime)
            ->setDescription('description')
            ->setPortfolio(true)
            ->setSlug('slug')
            ->setFile('file')
            ->addCategorie($categorie)
            ->setPrix(20.20)
            ->setUser($user);

        $this->assertTrue($peinture->getNom() === 'nom');
        $this->assertTrue($peinture->getLargeur() == 20.20);
        $this->assertTrue($peinture->getHauteur() == 20.20);
        $this->assertTrue($peinture->getEnvente() === true);
        $this->assertTrue($peinture->getAteRealisation() === $datetime);
        $this->assertTrue($peinture->getcreatedAt() === $datetime);
        $this->assertTrue($peinture->getDescription() === 'description');
        $this->assertTrue($peinture->getPortfolio() === true);
        $this->assertTrue($peinture->getSlug() === 'slug');
        $this->assertTrue($peinture->getFile() === 'fil');
        $this->assertTrue($peinture->getPrix() == 20.20);
        $this->assertContains($categorie, $peinture->getCategorie());
        $this->assertTrue($peinture->getUser() === $user);
    }

    public function testIsFalse()
    {
        $peinture = new Peinture();
        $datetime = new DateTime();
        $categorie = new Categorie();
        $user = new User();

        $peinture->setNom('nom')
            ->setLargeur(20.20)
            ->setHauteur(20.20)
            ->setEnvente(true)
            ->setAteRealisation($datetime)
            ->setcreatedAt($datetime)
            ->setDescription('description')
            ->setPortfolio(true)
            ->setSlug('slug')
            ->setFile('file')
            ->addCategorie($categorie)
            ->setPrix(20.20)
            ->setUser($user);

        $this->assertTrue($peinture->getNom() === 'false');
        $this->assertTrue($peinture->getLargeur() == 22.20);
        $this->assertTrue($peinture->getHauteur() == 22.20);
        $this->assertTrue($peinture->getEnvente() === false);
        $this->assertTrue($peinture->getAteRealisation() === new  Datetime());
        $this->assertTrue($peinture->getcreatedAt() === new  Datetime());
        $this->assertTrue($peinture->getDescription() === 'false');
        $this->assertTrue($peinture->getPortfolio() === false);
        $this->assertTrue($peinture->getSlug() === 'false');
        $this->assertTrue($peinture->getFile() === 'false');
        $this->assertTrue($peinture->getPrix() == 22.20);
        $this->assertContains(new Categorie(), $peinture->getCategorie());
        $this->assertTrue($peinture->getUser() === new  User());
    }

    public function testIsEmpty()
    {
        $peinture = new Peinture();

        $this->assertEmpty($peinture->getNom());
        $this->assertEmpty($peinture->getLargeur());
        $this->assertEmpty($peinture->getHauteur());
        $this->assertEmpty($peinture->getEnvente());
        $this->assertEmpty($peinture->getAteRealisation());
        $this->assertEmpty($peinture->getcreatedAt());
        $this->assertEmpty($peinture->getDescription());
        $this->assertEmpty($peinture->getPortfolio());
        $this->assertEmpty($peinture->getSlug());
        $this->assertEmpty($peinture->getFile());
        $this->assertEmpty($peinture->getPrix());
        $this->assertEmpty($peinture->getCategorie());
        $this->assertEmpty($peinture->getUser());
    }
}
