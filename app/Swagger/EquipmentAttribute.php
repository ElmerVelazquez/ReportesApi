<?php

namespace App\Swagger;

use OpenApi\Attributes as OA;

class EquipmentAttribute {

#[OA\Get(
    path: '/api/equipment-attributes',
    operationId: 'getEquipmentAttributes',
    tags: ['Equipment Attributes'],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Lista de atributos de equipo',
            content: new OA\JsonContent(
                type: 'array',
                items: new OA\Items(ref: '#/components/schemas/EquipmentAttribute')
            )
        )
    ]
)]
public function index() {}

#[OA\Get(
    path: '/api/equipment-attributes/{id}',
    operationId: 'getEquipmentAttributeById',
    tags: ['Equipment Attributes'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
    ],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Detalle del atributo',
            content: new OA\JsonContent(ref: '#/components/schemas/EquipmentAttribute')
        ),
        new OA\Response(response: 404, description: 'No encontrado')
    ]
)]
public function show() {}

#[OA\Post(
    path: '/api/equipment-attributes',
    operationId: 'storeEquipmentAttribute',
    tags: ['Equipment Attributes'],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(ref: '#/components/schemas/EquipmentAttribute')
    ),
    responses: [
        new OA\Response(response: 201, description: 'Atributo creado'),
        new OA\Response(response: 422, description: 'Error de validación')
    ]
)]
public function store() {}

#[OA\Put(
    path: '/api/equipment-attributes/{id}',
    operationId: 'updateEquipmentAttribute',
    tags: ['Equipment Attributes'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
    ],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(ref: '#/components/schemas/EquipmentAttribute')
    ),
    responses: [
        new OA\Response(response: 200, description: 'Atributo actualizado'),
        new OA\Response(response: 404, description: 'No encontrado')
    ]
)]
public function update() {}

#[OA\Delete(
    path: '/api/equipment-attributes/{id}',
    operationId: 'deleteEquipmentAttribute',
    tags: ['Equipment Attributes'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
    ],
    responses: [
        new OA\Response(response: 204, description: 'Atributo eliminado'),
        new OA\Response(response: 404, description: 'No encontrado')
    ]
)]
public function destroy() {}

}