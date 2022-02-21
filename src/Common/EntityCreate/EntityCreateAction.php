<?php

namespace Uelnur\SymfonyEntityAction\Common\EntityCreate;

use Uelnur\SymfonyEntityAction\ActionInterface;
use Uelnur\SymfonyEntityAction\ActionStatusInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Service\Attribute\Required;

abstract class EntityCreateAction implements ActionInterface {
    protected ?EntityManagerInterface $em = null;

    #[Required]
    final public function setEntityManager(EntityManagerInterface $em): void {
        $this->em = $em;
    }

    // Should return entity or Action Status
    abstract protected function mapDataToEntity(null|array|object $data): object;

    public function createParams(): null|object|array {
        return new EntityCreateParams();
    }

    final public function handle(object|array|null $data): ActionStatusInterface {
        $entity = $this->mapDataToEntity($data);

        if ( $entity instanceof ActionStatusInterface) {
            return $entity;
        }

        $this->em->persist($entity);
        $this->em->flush();

        return new EntityCreateSuccessStatus($entity);
    }
}
