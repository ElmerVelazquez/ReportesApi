<?php

namespace App\Swagger;

use OpenApi\Attributes as OA;

class Schemas {

    #[OA\Schema(
    schema: 'Company',
    type: 'object',
    required: ['name'],
    properties: [
        new OA\Property(property: 'id', type: 'integer', example: 1),
        new OA\Property(property: 'name', type: 'string', example: 'Acme Inc.')
    ]
    )]
    public $Company;
}