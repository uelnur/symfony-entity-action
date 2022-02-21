<?php

namespace Uelnur\SymfonyEntityAction\Common\EntityCreate;

use Uelnur\SymfonyEntityAction\ActionStatusInterface;

class EntityCreateSuccessStatus implements ActionStatusInterface {
    public function __construct(
        public object $entity,
    ) {}


    public function isSuccess(): bool {
        return true;
    }
}
