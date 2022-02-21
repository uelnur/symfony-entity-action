<?php

namespace App\Component\Action\Event;

use App\Component\Action\ActionInterface;
use App\Component\Action\ActionStatusInterface;

class ActionPostHandleEvent {
    public const NAME = 'action.post_handle';

    public function __construct(
        public ActionInterface $action,
        public null|object|array $data = null,
        public ?ActionStatusInterface $status = null
    ) {}
}
