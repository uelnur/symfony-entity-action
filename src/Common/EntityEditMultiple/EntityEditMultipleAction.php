<?php

namespace Uelnur\SymfonyEntityAction\Common\EntityEditMultiple;

use Uelnur\SymfonyEntityAction\ActionInterface;
use Uelnur\SymfonyEntityAction\ActionStatusInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Service\Attribute\Required;

abstract class EntityEditMultipleAction implements ActionInterface {
    protected ?EntityManagerInterface $em = null;

    #[Required]
    final public function setEntityManager(EntityManagerInterface $em): void {
        $this->em = $em;
    }

    public function createParams(): null|object|array {
        return new EntityEditMultipleParams();
    }

    final public function createData(null|object|array $params): null|object|array {
        assert($params instanceof EntityEditMultipleParams);

        $entities = $params->getEntities();
        $data = $this->createDefaultData($params);

        foreach ($entities as $key => $entity) {
            $entityData = $this->mapEntityToData($entity);
            $data->setSingleEntityData($key, $entityData);
        }

        return $data;
    }

    final public function handle(object|array|null $data): ActionStatusInterface {
        assert($data instanceof EntityEditMultipleData);

        $entities = $data->getParams()->getEntities();

        foreach ($entities as $key => $entity) {
            $entityData = $data->getSingleEntityData($key);

            if ( !$entityData ) {
                continue;
            }

            $entity = $this->mapDataToEntity($entityData, $entity);
            $this->em->persist($entity);
        }

        $this->em->flush();

        return new EntityEditMultipleSuccessStatus($data->getEntitiesData(), $entities, $data->getParams()->getOldEntities());
    }

    protected function createDefaultData(null|object|array $params): EntityEditMultipleData {
        assert($params instanceof EntityEditMultipleParams);

        return new EntityEditMultipleData([], $params);
    }

    abstract protected function mapEntityToData(object $entity): null|array|object;
    abstract protected function mapDataToEntity(null|array|object $data, object $entity): object;
}
