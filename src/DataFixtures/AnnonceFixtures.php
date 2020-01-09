<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Annonce;

class AnnonceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Générer dans la base de donnée de faut donnée allant de 0 a 100
        $faker = Factory::create('fr_FR');
        for ($i=0; $i <100 ; $i++)
        {
            $annonce = new Annonce();
            $annonce
                ->setTitle($faker->words(3, true))
                ->setPrice($faker->numberBetween(3, 750))
                ->setDescription($faker->sentences(3, true))
                
                ->setSold(false)
                ->setUpdatedAt($faker->datetime($max='now', $timezone=null));
               
            $manager->persist($annonce);
        }

        $manager->flush();
    }
}