<?php

namespace App\DataFixtures;

use App\Entity\Blogpost;
use App\Entity\Categorie;
use App\Entity\Peinture;
use App\Entity\User;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $user = new User();
        $user->setEmail('user@test.com')
            ->setPrenom($faker->firstName())
            ->setNom($faker->lastName())
            ->setTelephone($faker->phoneNumber())
            ->setAPropos($faker->text())
            ->setInstagram('instagram')
            ->setRoles(['ROLE_PEINTRE']);
        $password = $this->encoder->encodePassword($user, 'password');
        $user->setPassword($password);
        $manager->persist($user);

        for ($i = 0; $i < 20; $i++) {
            $blogpost = new Blogpost();

            $blogpost->setTitre($faker->word(3, true))
                ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                ->setContenu($faker->text(350))
                ->setSlug($faker->slug(3))
                ->setUser($user);
            $manager->persist($blogpost);
        }
        for ($k = 0; $k < 5; $k++) {
            $categorie = new Categorie();

            $categorie->setNom($faker->word())
                ->setDescription($faker->word(10, true))
                ->setSlug($faker->slug());
            $manager->persist($categorie);


            for ($j = 0; $j < 2; $j++) {
                $peinture = new Peinture();

                $peinture->setNom($faker->words(3, true))
                    ->setLargeur($faker->randomFloat(2, 20, 60))
                    ->setHauteur($faker->randomFloat(2, 20, 60))
                    ->setEnvente($faker->randomElement([true, false]))
                    ->setPrix($faker->randomElement(2, 100, 9999))
                    ->setAteRealisation($faker->dateTimeBetween('-6 month', 'now'))
                    ->setDescription($faker->text())
                    ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                    ->setSlug($faker->slug())
                    ->setPortfolio($faker->randomElement([true, false]))
                    ->setFile('photo-1.jpg')
                    ->setUser($user)
                    ->addCategorie($categorie);


                $manager->persist($peinture);
            }
        }


        $manager->flush();
    }
}
