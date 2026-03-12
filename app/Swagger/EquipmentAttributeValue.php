<?php

namespace App\Swagger;

use OpenApi\Attributes as OA;

class EquipmentAttributeValue {

#[OA\Get(
    path: '/api/equipment-attribute-values',
    operationId: 'getAttributeValues',
    tags: ['Equipment Attribute Values'],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Lista de valores de atributos',
            content: new OA\JsonContent(
                type: 'array',
                items: new OA\Items(ref: '#/components/schemas/EquipmentAttributeValue')
            )
        )
    ]
)]
public function index() {}

#[OA\Get(
    path: '/api/equipment-attribute-values/{id}',
    operationId: 'getAttributeValueById',
    tags: ['Equipment Attribute Values'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
    ],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Detalle del valor',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'data', ref: '#/components/schemas/EquipmentAttributeValue')
                ]
            )
        ),
        new OA\Response(response: 404, description: 'No encontrado')
    ]
)]
public function show() {}

#[OA\Post(
    path: '/api/equipment-attribute-values',
    operationId: 'storeAttributeValue',
    tags: ['Equipment Attribute Values'],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(ref: '#/components/schemas/EquipmentAttributeValue')
    ),
    responses: [
        new OA\Response(response: 201, description: 'Valor asignado correctamente'),
        new OA\Response(response: 422, description: 'Error de validación')
    ]
)]
public function store() {}

#[OA\Put(
    path: '/api/equipment-attribute-values2/{id}',
    operationId: 'updateAttributeValue',
    tags: ['Equipment Attribute Values'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
    ],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(ref: '#/components/schemas/EquipmentAttributeValue')
    ),
    responses: [
        new OA\Response(response: 200, description: 'Valor actualizado'),
        new OA\Response(response: 404, description: 'No encontrado')
    ]
)]
public function update() {}

#[OA\Delete(
    path: '/api/equipment-attribute-values/{id}',
    operationId: 'deleteAttributeValue',
    tags: ['Equipment Attribute Values'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
    ],
    responses: [
        new OA\Response(response: 204, description: 'Valor eliminado'),
        new OA\Response(response: 404, description: 'No encontrado')
    ]
)]
public function destroy() {}

}