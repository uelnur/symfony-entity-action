<?php

namespace Uelnur\SymfonyEntityAction\Common\EntityEditMultiple;

use Symfony\Component\Security\Core\User\UserInterface;

class EntityEditMultipleParams {
    private array $entities = [];
    private array $oldEntities = [];
    public ?UserInterface $user = null;

    public function getEntity(mixed $key): ?object {
        return $this->entities[$key] ?? null;
    }

    public function setEntity(mixed $key, object $entity): void {
        $this->entities[$key] = $entity;
        $this->oldEntities[$key] = clone $entity;
    }

    public function getEntities(): array {
        return $this->entities;
    }

    public function setEntities(array $entities): void {
        $this->entities = $entities;

        foreach ( $entities as $k=> $entity ) {
            $this->oldEntities[$k] = clone $entity;
        }
    }

    public function getOldEntities(): array {
        return $this->oldEntities;
    }
}
