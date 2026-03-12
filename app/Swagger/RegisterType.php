<?php

namespace App\Swagger;
use OpenApi\Attributes as OA;

class RegisterType
{
#[OA\Get(
        path: '/api/register-types',
        operationId: 'getRegisterTypes',
        tags: ['Register Types'],
        summary: 'Listar todos los tipos de registros',
        responses: [
            new OA\Response(
                response: 200,
                description: 'Lista de tipos de registro',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(
                            property: 'data',
                            type: 'array',
                            items: new OA\Items(ref: '#/components/schemas/RegisterType')
                        )
                    ]
                )
            )
        ]
    )]
    public function index() {}

    #[OA\Get(
        path: '/api/register-types/{id}',
        operationId: 'getRegisterTypeById',
        tags: ['Register Types'],
        parameters: [
            new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Detalle del tipo de registro',
                content: new OA\JsonContent(ref: '#/components/schemas/RegisterType')
            ),
            new OA\Response(response: 404, description: 'No encontrado')
        ]
    )]
    public function show() {}
}
