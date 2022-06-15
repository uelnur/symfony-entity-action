<?php

namespace Uelnur\SymfonyEntityAction\Event;

use Uelnur\SymfonyEntityAction\ActionInterface;

class ActionPostCreateDataEvent {
    public const NAME = 'action.post_create_data';

    public function __construct(
        public ActionInterface $action,
        public null|object|array $params = null,
        public null|object|array $data = null,
    ) {}
}
