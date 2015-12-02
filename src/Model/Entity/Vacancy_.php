<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Vacancy extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
