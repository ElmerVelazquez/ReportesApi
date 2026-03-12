<?php

namespace App\Swagger;
use OpenApi\Attributes as OA;

class EquipmentStatus
{
    #[OA\Get(
            path: '/api/equipment-status',
            operationId: 'getEquipmentStatus',
            tags: ['Equipment Status'],
            summary: 'Obtener todos los estados posibles de los equipos',
            responses: [
                new OA\Response(
                    response: 200,
                    description: 'Lista de estados',
                    content: new OA\JsonContent(
                        properties: [
                            new OA\Property(
                                property: 'data',
                                type: 'array',
                                items: new OA\Items(ref: '#/components/schemas/EquipmentStatus')
                            )
                        ]
                    )
                )
            ]
        )]
    public function index() {}

    #[OA\Post(
        path: '/api/equipment-status',
        operationId: 'storeEquipmentStatus',
        tags: ['Equipment Status'],
        summary: 'Crear un nuevo estado (ej: En Reparación)',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['name'],
                properties: [
                    new OA\Property(property: 'name', type: 'string', example: 'Dañado'),
                    new OA\Property(property: 'description', type: 'string', example: 'Equipo que requiere baja técnica')
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 201,
                description: 'Estado creado',
                content: new OA\JsonContent(ref: '#/components/schemas/EquipmentStatus')
            )
        ]
    )]
    public function store() {}

    #[OA\Get(
        path: '/api/equipment-status/{id}',
        operationId: 'getEquipmentStatusById',
        tags: ['Equipment Status'],
        parameters: [
            new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Detalle del estado',
                content: new OA\JsonContent(ref: '#/components/schemas/EquipmentStatus')
            ),
            new OA\Response(response: 404, description: 'No encontrado')
        ]
    )]
    public function show() {}

    #[OA\Put(
        path: '/api/equipment-status/{id}',
        operationId: 'updateEquipmentStatus',
        tags: ['Equipment Status'],
        parameters: [
            new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
        ],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'name', type: 'string'),
                    new OA\Property(property: 'description', type: 'string')
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: 'Estado actualizado',
                content: new OA\JsonContent(ref: '#/components/schemas/EquipmentStatus')
            )
        ]
    )]
    public function update() {}

    #[OA\Delete(
        path: '/api/equipment-status/{id}',
        operationId: 'deleteEquipmentStatus',
        tags: ['Equipment Status'],
        parameters: [
            new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
        ],
        responses: [
            new OA\Response(response: 204, description: 'Estado eliminado')
        ]
    )]
    public function destroy() {}
}
