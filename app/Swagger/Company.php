<?php

namespace App\Swagger;

use OpenApi\Attributes as OA;

class Company {

    #[OA\Get(
        path: '/api/company',
        operationId: 'getCompanies',
        tags: ['Companies'],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Lista de empresas',
                content: new OA\JsonContent(type: 'array', items: new OA\Items(ref: '#/components/schemas/Company'))
            )
        ]
    )]
    public function index() {}

    #[OA\Get(
        path: '/api/company/{company_id}',
        operationId: 'getCompanyById',
        tags: ['Empresas'],
        parameters: [
            new OA\Parameter(name: 'company_id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Datos de la empresa',
                content: new OA\JsonContent(ref: '#/components/schemas/Company')
            ),
            new OA\Response(response: 404, description: 'No encontrado')
        ]
    )]
    public function show() {}
}