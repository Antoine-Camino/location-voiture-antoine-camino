<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Availability;
use App\Entity\Car;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AvailabilityFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Récupération des voitures à partir du gestionnaire d'entités
        $cars = $manager->getRepository(Car::class)->findAll();

        // Pour chaque voiture, nous créons une disponibilité fictive
        foreach ($cars as $car) {
            // Création de l'entité Availability
            $availability = new Availability();
            $availability->setLinkCar($car);
            $availability->setPrice('75.00'); // Prix fictif
            $availability->setStartDate(new \DateTime('now')); // Date de début fictive
            $availability->setEndDate(new \DateTime('+7 days')); // Date de fin fictive (une semaine à partir de maintenant)
            $availability->setAvailable(true); // Par défaut, la disponibilité est définie sur true

            // Persist et flush de l'entité Availability
            $manager->persist($availability);
        }

        // Exécution des opérations de persistance
        $manager->flush();
    }

    public function getDependencies()
    {
        return [CarFixtures::class];
    }
}
