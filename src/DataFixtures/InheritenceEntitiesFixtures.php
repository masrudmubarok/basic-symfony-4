<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Author;
use App\Entity\Pdf;
use App\Entity\Video;

class InheritenceEntitiesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i =1; $i <= 2; $i++) 
        {
            $author = new Author;
            $author->setName('Author name - '. $i);
            $manager->persist($author);

            for($j = 1; $j <= 3; $j++)
            {
                $pdf = new Pdf;
                $pdf->setFilename('Pdf name of user - '. $i);
                $pdf->setDescription('Pdf description of user - '. $i);
                $pdf->setSize(256);
                $pdf->setOrientation('potrait');
                $pdf->setPagesNumber(100);
                $pdf->setAuthor($author);
                $manager->persist($pdf);
            }

            for($k = 1; $k <= 3; $k++)
            {
                $video = new Video;
                $video->setFilename('Video name of user - '. $i);
                $video->setDescription('Video description of user - '. $i);
                $video->setSize(2560);
                $video->setFormat('mp4');
                $video->setDuration(123);
                $video->setAuthor($author);
                $manager->persist($video);
            }
        }

        $manager->flush();
    }
}
