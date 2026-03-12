<?php

namespace App\Swagger;
use OpenApi\Attributes as OA;

class Register
{
#[OA\Get(
        path: '/api/registers',
        operationId: 'getRegisters',
        tags: ['Registers'],
        summary: 'Listar todos los movimientos/registros',
        responses: [
            new OA\Response(
                response: 200,
                description: 'Lista de registros',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(
                            property: 'data',
                            type: 'array',
                            items: new OA\Items(ref: '#/components/schemas/Register')
                        )
                    ]
                )
            )
        ]
    )]
    public function index() {}

    #[OA\Post(
        path: '/api/registers',
        operationId: 'storeRegister',
        tags: ['Registers'],
        summary: 'Crear un nuevo movimiento de equipo',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['type_register_id', 'company_id', 'equipment_id', 'emisor_id', 'receptor_id'],
                properties: [
                    new OA\Property(property: 'type_register_id', type: 'integer'),
                    new OA\Property(property: 'company_id', type: 'integer'),
                    new OA\Property(property: 'equipment_id', type: 'integer'),
                    new OA\Property(property: 'emisor_id', type: 'integer'),
                    new OA\Property(property: 'receptor_id', type: 'integer'),
                    new OA\Property(property: 'comment', type: 'string')
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 201,
                description: 'Movimiento registrado',
                content: new OA\JsonContent(ref: '#/components/schemas/Register')
            )
        ]
    )]
    public function store() {}

    #[OA\Get(
        path: '/api/registers/{id}',
        operationId: 'getRegisterById',
        tags: ['Registers'],
        parameters: [
            new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Detalle del registro',
                content: new OA\JsonContent(ref: '#/components/schemas/Register')
            ),
            new OA\Response(response: 404, description: 'No encontrado')
        ]
    )]
    public function show() {}

    #[OA\Delete(
        path: '/api/registers/{id}',
        operationId: 'deleteRegister',
        tags: ['Registers'],
        summary: 'Eliminar un registro (usar con precaución)',
        parameters: [
            new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
        ],
        responses: [
            new OA\Response(response: 204, description: 'Eliminado correctamente')
        ]
    )]
    public function destroy() {}
}
