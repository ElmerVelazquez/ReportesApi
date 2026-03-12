<?php

namespace App\Swagger;

use OpenApi\Attributes as OA;

class EquipmentType {

#[OA\Get(
    path: '/api/equipment-type',
    operationId: 'getEquipmentTypes',
    tags: ['Equipment Types'],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Lista de tipos de equipo',
            content: new OA\JsonContent(
                type: 'array',
                items: new OA\Items(ref: '#/components/schemas/EquipmentType')
            )
        )
    ]
)]
public function index() {}

#[OA\Get(
    path: '/api/equipment-type/{id}',
    operationId: 'getEquipmentTypeById',
    tags: ['Equipment Types'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
    ],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Detalle del tipo de equipo',
            content: new OA\JsonContent(ref: '#/components/schemas/EquipmentType')
        ),
        new OA\Response(response: 404, description: 'No encontrado')
    ]
)]
public function show() {}

#[OA\Post(
    path: '/api/equipment-type',
    operationId: 'storeEquipmentType',
    tags: ['Equipment Types'],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(ref: '#/components/schemas/EquipmentType')
    ),
    responses: [
        new OA\Response(response: 201, description: 'Tipo de equipo creado'),
        new OA\Response(response: 422, description: 'Error de validación')
    ]
)]
public function store() {}

#[OA\Put(
    path: '/api/equipment-type/{id}',
    operationId: 'updateEquipmentType',
    tags: ['Equipment Types'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
    ],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(ref: '#/components/schemas/EquipmentType')
    ),
    responses: [
        new OA\Response(response: 200, description: 'Actualizado correctamente'),
        new OA\Response(response: 404, description: 'No encontrado')
    ]
)]
public function update() {}

#[OA\Delete(
    path: '/api/equipment-type/{id}',
    operationId: 'deleteEquipmentType',
    tags: ['Equipment Types'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
    ],
    responses: [
        new OA\Response(response: 204, description: 'Eliminado correctamente'),
        new OA\Response(response: 404, description: 'No encontrado')
    ]
)]
public function destroy() {}

}