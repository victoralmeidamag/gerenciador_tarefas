<?php

namespace App\Domain\Shared\Enums;

enum TaskStatus: string
{
    case TODO        = 'A Fazer';
    case IN_PROGRESS = 'Em Progresso';
    case DONE        = 'Concluido';

    public static function fromCode(string $code): self
    {
        return match($code) {
            'TODO'         => self::TODO,
            'IN_PROGRESS'  => self::IN_PROGRESS,
            'DONE'         => self::DONE,
            default        => throw new \ValueError("$code não é status válido"),
        };
    }
}