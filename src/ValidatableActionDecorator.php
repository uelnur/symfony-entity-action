<?php

namespace Uelnur\SymfonyEntityAction;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\Service\Attribute\Required;

class ValidatableActionDecorator implements ActionInterface {

    public function __construct(private ActionInterface $action) {}

    private ?ValidatorInterface $validator;

    #[Required]
    public function setValidator(ValidatorInterface $validator): void {
        $this->validator = $validator;
    }

    public function createParams(): null|array|object {
        return $this->action->createParams();
    }

    public function createData(null|object|array $params): null|object|array {
        return $this->action->createData($params);
    }

    public function handle(null|object|array $data): ActionStatusInterface {
        $constraintViolationList = $this->validator->validate($data);

        if (count($constraintViolationList) > 0) {
            return new ValidationErrorStatus($constraintViolationList);
        }

        return $this->action->handle($data);
    }

}
