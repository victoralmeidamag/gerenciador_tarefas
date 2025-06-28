<?php
namespace App\Application\ViewModels;

class ProjectView
{
    public function __construct(
        public string $id,
        public string $name,
        public string $responsibleName,
    ) {}
}
