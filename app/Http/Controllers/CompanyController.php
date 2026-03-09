<?php

namespace App\Http\Controllers;

use App\Models\Company;
use OpenApi\Attributes as OA;




#[OA\Schema(
    schema: 'Company',
    type: 'object',
    required: ['id','name'],
    properties: [
        new OA\Property(property: 'id', type: 'integer', example: 1),
        new OA\Property(property: 'name', type: 'string', example: 'Acme Inc.')
    ]
)]
class CompanyController
{
    #[OA\Get(path: '/api/data.json', operationId: 'getData')]
    #[OA\Response(response: '200', description: 'The data')]
    public function index()
    {
        return Company::paginate(10)->toResourceCollection();
    }
}
