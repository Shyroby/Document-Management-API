<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Document;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Tag;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        /**
         * @Create a fake list of Category
         */
        for ($a = 0; $a < 5; $a++){
            $category = new Category();
            $category->setName('category' .$a);
            $category->setDescription('Lorem ipsum dolor sit amet');
            
            /**
             * Create a fake list of Document
             */
            for ($b = 0; $b < 5; $b++){
                $document = new Document();
                $document->setTitle('Document' .$b);
                $document->setActive(true);
                $document->setDescription('Lorem ipsum dolor sit amet');
                
                /**
                 * Create a fake list of Tag
                 */

                for($c = 0; $c < 3; $c++){
                    $tag = new Tag();
                    $tag->setName('tag' .$b);
                }
                $document->addTag($tag);
            }
            $category->addDocument($document);


        $manager->persist($category);
        }

        $manager->flush();
    }
}
