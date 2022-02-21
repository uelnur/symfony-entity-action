<?php

namespace App\Component\Action\Event;

use App\Component\Action\ActionInterface;

class ActionPostCreateDataEvent {
    public const NAME = 'action.post_create_data';

    public function __construct(
        public ActionInterface $action,
        public null|object|array $params = null,
        public null|object|array $data = null,
    ) {}
}
