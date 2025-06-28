<?php

namespace App\Domain\Shared\Enums;

enum TaskStatus: string
{
    case TODO = 'A Fazer';
    case IN_PROGRESS = 'Em Progresso';
    case DONE = 'Concluído';
}