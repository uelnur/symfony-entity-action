<?php

namespace App\Component\Action\Event;

use App\Component\Action\ActionInterface;

class ActionPostCreateParamsEvent {
    public const NAME = 'action.post_create_params';

    public function __construct(
        public ActionInterface $action,
        public null|object|array $params = null,
    ) {}
}
