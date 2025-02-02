<?php 

namespace App\Enum;

enum ProjectStatus: string
{
    case IDEA = 'Idée';
    case IN_PROGRESS = 'En cours';
    case FINISHED = 'Fini';
    case ABANDONED = 'Abandonné';
}
