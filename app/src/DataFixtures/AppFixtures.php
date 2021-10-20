<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /** @var UserPasswordEncoderInterface */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $ryan = new User();
        $ryan->setEmail('ryan@ryan.it');
        $ryan->setPassword($this->passwordEncoder->encodePassword($ryan, 'helloworld'));
        $ryan->setFullName('Ryan');
        $ryan->setAvatar('assets/img/ryan.jpg');

        $julie = new User();
        $julie->setEmail('julie@julie.it');
        $julie->setPassword($this->passwordEncoder->encodePassword($julie, 'helloworld'));
        $julie->setFullName('Julie');
        $julie->setAvatar('assets/img/julie.jpg');

        $manager->persist($ryan);
        $manager->persist($julie);

        $manager->flush();
    }
}
