<?php

namespace Uelnur\SymfonyEntityAction\Common\EntityRemove;

class EntityRemoveData {
    public bool $confirmed = false;

    public function __construct(private EntityRemoveParams $params) {
    }

    public function getParams(): EntityRemoveParams {
        return $this->params;
    }
}
