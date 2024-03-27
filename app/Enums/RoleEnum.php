<?php

namespace App\Enums;

enum RoleEnum: int
{
    case ADMIN = 1;

    case CLIENT = 2;

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ADMIN => 'Administrador',
            self::CLIENT => 'Cliente',
        };
    }
}
