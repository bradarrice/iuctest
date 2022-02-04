<?php

namespace App\Tests;

use App\Entity\User;

use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new User();
        $user->setEmail('true@test.com')
            ->setPrenom('prenom')
            ->setNom('nom')
            ->setPassword('password')
            ->setAPropos('a propos')
            ->setInstagram('instagram');
        $this->assertTrue($user->getEmail() === 'true@test.com');
        $this->assertTrue($user->getPrenom() === 'prenom');
        $this->assertTrue($user->getNom() === 'nom');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getAPropos() === 'a propos');
        $this->assertTrue($user->getInstagram() === 'instagram');
    }

    public function testIsFalse()
    {
        $user = new User();
        $user->setEmail('true@test.com')
            ->setPrenom('prenom')
            ->setNom('nom')
            ->setPassword('password')
            ->setAPropos('a propos')
            ->setInstagram('instagram');
        $this->assertTrue($user->getEmail() === 'false@test.com');
        $this->assertTrue($user->getPrenom() === 'false');
        $this->assertTrue($user->getNom() === 'false');
        $this->assertTrue($user->getPassword() === 'false');
        $this->assertTrue($user->getAPropos() === 'false');
        $this->assertTrue($user->getInstagram() === 'false');
    }


    public function testIsEmpty()
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPrenom());
        $this->assertEmpty($user->getNom());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getAPropos());
        $this->assertEmpty($user->getInstagram());
    }
}
