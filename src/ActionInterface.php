<?php

namespace Uelnur\SymfonyEntityAction;

interface ActionInterface {
    public function createParams(): null|object|array;
    public function createData(null|object|array $params): null|object|array;
    public function handle(null|object|array $data): ActionStatusInterface;
}
