<?php

namespace Uelnur\SymfonyEntityAction\Common\EntityChange;

class EntityChangeData {
    public bool $confirmed = false;

    public function __construct(private EntityChangeParams $params) {
    }

    public function getParams(): EntityChangeParams {
        return $this->params;
    }
}
