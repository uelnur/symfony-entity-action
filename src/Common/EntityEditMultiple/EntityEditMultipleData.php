<?php

namespace Uelnur\SymfonyEntityAction\Common\EntityEditMultiple;

class EntityEditMultipleData {
    public function __construct(
        private array $entitiesData,
        private EntityEditMultipleParams $params,
    ) {}

    public function getSingleEntityData(mixed $key): ?object {
        return $this->entitiesData[$key] ?? null;
    }

    public function setSingleEntityData(mixed $key, object $data): void {
        $this->entitiesData[$key] = $data;
    }

    public function getEntitiesData(): array {
        return $this->entitiesData;
    }

    public function setEntitiesData(array $entitiesData): void {
        $this->entitiesData = $entitiesData;
    }

    public function getParams(): EntityEditMultipleParams {
        return $this->params;
    }
}
