<?php

namespace App\EventSubscriber;

use App\Entity\Car;
use App\Repository\CarRepository;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EasyAdminSubscriber implements  EventSubscriberInterface
{
    private $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public static function getSubscribedEvents()
    {
        return [
            AfterEntityPersistedEvent::class => ['setIsHeader'],
            AfterEntityUpdatedEvent::class => ['setIsHeaderUpdated'],
        ];
    }

    public function setIsHeader(AfterEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Car) || !$entity->isIsHeader()) {
            return;
        }

        $this->modifyIsHeader($entity);
    }

    public function setIsHeaderUpdated(AfterEntityUpdatedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Car) || !$entity->isIsHeader()) {
            return;
        }

        $this->modifyIsHeader($entity);
    }

    private function modifyIsHeader(Car $entity)
    {
        $cars = $this->carRepository->findAll();

        foreach ($cars as $car) {
            $car->setIsHeader(false);
            $this->carRepository->save($car, true);
        }

        $entity->setIsHeader(true);
        $this->carRepository->save($entity, true);
    }
}
