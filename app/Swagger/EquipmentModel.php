<?php

namespace App\Swagger;

use OpenApi\Attributes as OA;

class EquipmentModel {

#[OA\Get(
    path: '/api/equipment-model',
    operationId: 'getEquipmentModel',
    tags: ['Equipment Models'],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Lista de modelos de equipos',
            content: new OA\JsonContent(
                type: 'array',
                items: new OA\Items(ref: '#/components/schemas/Equipment')
            )
        )
    ]
)]
public function index() {}

#[OA\Get(
    path: '/api/equipment-model/{id}',
    operationId: 'getEquipmentModelById',
    tags: ['Equipment Models'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
    ],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Detalle de modelo de equipo',
            content: new OA\JsonContent(ref: '#/components/schemas/EquipmentModel')
        ),
        new OA\Response(response: 404, description: 'No encontrado')
    ]
)]
public function show() {}

#[OA\Post(
    path: '/api/equipment-model',
    operationId: 'storeEquipmentModel',
    tags: ['Equipment Models'],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(ref: '#/components/schemas/EquipmentModel')
    ),
    responses: [
        new OA\Response(response: 201, description: 'Modelo de equipo creado'),
        new OA\Response(response: 422, description: 'Error de validación')
    ]
)]
public function store() {}

#[OA\Put(
    path: '/api/equipment-model/{id}',
    operationId: 'updateEquipmentmodel',
    tags: ['Equipment Models'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
    ],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(ref: '#/components/schemas/EquipmentModel')
    ),
    responses: [
        new OA\Response(response: 200, description: 'Actualizado correctamente'),
        new OA\Response(response: 404, description: 'No encontrado')
    ]
)]
public function update() {}

#[OA\Delete(
    path: '/api/equipment-model/{id}',
    operationId: 'deleteEquipmentmodel',
    tags: ['Equipment Models'],
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
