<?php

namespace Uelnur\SymfonyEntityAction\Event;

use Uelnur\SymfonyEntityAction\ActionInterface;

class ActionPostCreateParamsEvent {
    public const NAME = 'action.post_create_params';

    public function __construct(
        public ActionInterface $action,
        public null|object|array $params = null,
    ) {}
}
