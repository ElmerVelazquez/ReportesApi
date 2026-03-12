<?php

namespace App\Swagger;
use OpenApi\Attributes as OA;

class Equipment
{
    #[OA\Get(
        path: '/api/equipment',
        operationId: 'getEquipment',
        tags: ['Equipment'],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Lista de equipos',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(
                            property: 'data',
                            type: 'array',
                            items: new OA\Items(ref: '#/components/schemas/Equipment')
                        )
                    ]
                )
            )
        ]
    )]
    public function index() {}

    #[OA\Get(
        path: '/api/equipment/{id}',
        operationId: 'getEquipmentById',
        tags: ['Equipment'],
        parameters: [
            new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Detalle del equipo',
                content: new OA\JsonContent(ref: '#/components/schemas/Equipment')
            )
        ]
    )]
    public function show() {}

    #[OA\Post(
        path: '/api/equipment',
        operationId: 'storeEquipment',
        tags: ['Equipment'],
        summary: 'Registrar un nuevo equipo',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['equipment_type_id', 'brand', 'model', 'equipment_status_id'],
                properties: [
                    new OA\Property(property: 'equipment_type_id', type: 'integer', example: 1),
                    new OA\Property(property: 'brand', type: 'string', example: 'HP'),
                    new OA\Property(property: 'model', type: 'string', example: 'ProBook 450 G8'),
                    new OA\Property(property: 'serial', type: 'string', example: 'CNU123456'),
                    new OA\Property(property: 'equipment_status_id', type: 'integer', example: 1),
                    new OA\Property(property: 'comment', type: 'string', example: 'Equipo nuevo de almacén')
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 201,
                description: 'Equipo creado con éxito',
                content: new OA\JsonContent(ref: '#/components/schemas/Equipment')
            ),
            new OA\Response(response: 422, description: 'Datos inválidos')
        ]
    )]
    public function store() {}

    #[OA\Put(
        path: '/api/equipment/{id}',
        operationId: 'updateEquipment',
        tags: ['Equipment'],
        summary: 'Actualizar datos de un equipo existente',
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                description: 'ID del equipo a editar',
                schema: new OA\Schema(type: 'integer')
            )
        ],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'brand', type: 'string', example: 'HP Updated'),
                    new OA\Property(property: 'equipment_status_id', type: 'integer', example: 3),
                    new OA\Property(property: 'comment', type: 'string', example: 'Cambiado a estado en reparación')
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: 'Equipo actualizado correctamente',
                content: new OA\JsonContent(ref: '#/components/schemas/Equipment')
            ),
            new OA\Response(response: 404, description: 'Equipo no encontrado'),
            new OA\Response(response: 422, description: 'Error en la validación de datos')
        ]
    )]
    public function update() {}

    #[OA\Delete(
        path: '/api/equipment/{id}',
        operationId: 'deleteEquipment',
        tags: ['Equipment'],
        summary: 'Eliminar un equipo del sistema',
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                description: 'ID del equipo a eliminar',
                schema: new OA\Schema(type: 'integer')
            )
        ],
        responses: [
            new OA\Response(
                response: 204,
                description: 'Equipo eliminado correctamente (sin contenido)'
            ),
            new OA\Response(
                response: 404,
                description: 'El ID proporcionado no existe'
            )
        ]
    )]
    public function destroy() {}
}
