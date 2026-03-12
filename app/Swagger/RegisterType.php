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

    #[OA\Post(
        path: '/api/register-types',
        operationId: 'storeRegisterType',
        tags: ['Register Types'],
        summary: 'Crear un nuevo tipo de registro',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['name'],
                properties: [
                    new OA\Property(property: 'name', type: 'string', example: 'Mantenimiento Preventivo')
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 201,
                description: 'Tipo de registro creado',
                content: new OA\JsonContent(ref: '#/components/schemas/RegisterType')
            )
        ]
    )]
    public function store() {}

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

    #[OA\Put(
        path: '/api/register-types/{id}',
        operationId: 'updateRegisterType',
        tags: ['Register Types'],
        parameters: [
            new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
        ],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'name', type: 'string', example: 'Nombre Actualizado')
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: 'Actualizado correctamente',
                content: new OA\JsonContent(ref: '#/components/schemas/RegisterType')
            )
        ]
    )]
    public function update() {}

    #[OA\Delete(
        path: '/api/register-types/{id}',
        operationId: 'deleteRegisterType',
        tags: ['Register Types'],
        parameters: [
            new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
        ],
        responses: [
            new OA\Response(response: 204, description: 'Eliminado correctamente')
        ]
    )]
    public function destroy() {}
}
