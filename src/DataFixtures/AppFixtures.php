<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use App\Entity\Category;
use App\Entity\Document;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\DateTime;

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

                $document = new Document();
                $document->setTitle('Document' .$a);
                $document->setActive(true);
                $document->setPath("/to/my/folder/");
                $document->setUpdated(new \DateTime("now"));
                $document->setDescription('Lorem ipsum dolor sit amet');
                
                /**
                 * Create a fake list of Tag
                 */

                    $tag = new Tag();
                    $tag->setName('tag' .$a);
            
                $document->addTag($tag);
            
            $category->addDocument($document);


        $manager->persist($category);
        }

        $manager->flush();
    }
}
