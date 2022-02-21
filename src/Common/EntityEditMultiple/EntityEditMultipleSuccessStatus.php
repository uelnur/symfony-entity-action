<?php

namespace Uelnur\SymfonyEntityAction\Common\EntityEditMultiple;

use Uelnur\SymfonyEntityAction\ActionStatusInterface;

class EntityEditMultipleSuccessStatus implements ActionStatusInterface {
    public function __construct(
        public array $entitiesData,
        public array $entities,
        public ?array $oldEntities = null,
    ) {}

    public function isSuccess(): bool {
        return true;
    }
}
