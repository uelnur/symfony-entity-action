<?php

namespace Uelnur\SymfonyEntityAction;

use Symfony\Component\Validator\ConstraintViolationListInterface;

class ValidationErrorStatus implements ActionStatusInterface {
    public function __construct(private ConstraintViolationListInterface $violationList) {}

    public function isSuccess(): bool {
        return false;
    }

    public function getViolationList(): ConstraintViolationListInterface {
        return $this->violationList;
    }
}
