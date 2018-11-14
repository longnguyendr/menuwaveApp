<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        $cat1 = new Category();
        $cat1->setName('Finnish restaurant');
        $manager->persist($cat1);

        $cat2 = new Category();
        $cat2->setName('Asian restaurant');
        $manager->persist($cat2);

        $cat3 = new Category();
        $cat3->setName('Chinese restaurant');
        $manager->persist($cat3);

        $cat4 = new Category();
        $cat4->setName('Vietnamese restaurant');
        $manager->persist($cat4);

        $cat5 = new Category();
        $cat5->setName('Nordic restaurant');
        $manager->persist($cat5);

        $cat6 = new Category();
        $cat6->setName('European restaurant');
        $manager->persist($cat6);

        $cat7 = new Category();
        $cat7->setName('Thai restaurant');
        $manager->persist($cat7);

        $cat8 = new Category();
        $cat8->setName('Fastfood');
        $manager->persist($cat8);

        $cat9 = new Category();
        $cat9->setName('Pizza & Kebab');
        $manager->persist($cat9);

        $cat10 = new Category();
        $cat10->setName('Burgers');
        $manager->persist($cat10);

        $manager->flush();
    }
}
