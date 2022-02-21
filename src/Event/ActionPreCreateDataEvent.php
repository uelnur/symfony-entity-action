<?php

namespace App\Component\Action\Event;

use App\Component\Action\ActionInterface;

class ActionPreCreateDataEvent {
    public const NAME = 'action.pre_create_data';

    public function __construct(
        public ActionInterface $action,
        public null|object|array $params = null,
    ) {}
}
