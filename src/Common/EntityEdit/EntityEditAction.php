<?php

namespace Uelnur\SymfonyEntityAction\Common\EntityEdit;

use Uelnur\SymfonyEntityAction\ActionInterface;
use Uelnur\SymfonyEntityAction\ActionStatusInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Service\Attribute\Required;

abstract class EntityEditAction implements ActionInterface {
    protected ?EntityManagerInterface $em = null;

    #[Required]
    final public function setEntityManager(EntityManagerInterface $em): void {
        $this->em = $em;
    }

    public function createParams(): null|object|array {
        return new EntityEditParams();
    }

    final public function createData(null|object|array $params): null|object|array {
        assert($params instanceof EntityEditParams);

        return $this->mapEntityToData($params->getEntity());
    }

    final public function handle(object|array|null $data): ActionStatusInterface {
        $entity = $this->mapDataToEntity($data);

        if ( $entity instanceof ActionStatusInterface) {
            return $entity;
        }

        $this->em->persist($entity);
        $this->em->flush();

        return new EntityEditSuccessStatus($entity);
    }

    abstract protected function mapEntityToData(object $entity): null|array|object;
    abstract protected function mapDataToEntity(null|array|object $data): object;
}
