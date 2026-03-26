<?php

namespace App\Swagger;

use OpenApi\Attributes as OA;

class EquipmentBrand {

#[OA\Get(
    path: '/api/equipment-brand',
    operationId: 'getEquipmentBrand',
    tags: ['Equipment Brands'],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Lista de marcas de equipos',
            content: new OA\JsonContent(
                type: 'array',
                items: new OA\Items(ref: '#/components/schemas/EquipmentBrand')
            )
        )
    ]
)]
public function index() {}

#[OA\Get(
    path: '/api/equipment-brand/{id}',
    operationId: 'getEquipmentBrandById',
    tags: ['Equipment Brands'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
    ],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Detalle de marca de equipos',
            content: new OA\JsonContent(ref: '#/components/schemas/EquipmentBrand')
        ),
        new OA\Response(response: 404, description: 'No encontrado')
    ]
)]
public function show() {}

#[OA\Post(
    path: '/api/equipment-brand',
    operationId: 'storeEquipmentBrand',
    tags: ['Equipment Brands'],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(ref: '#/components/schemas/EquipmentBrand')
    ),
    responses: [
        new OA\Response(response: 201, description: 'Marca de equipo creada'),
        new OA\Response(response: 422, description: 'Error de validación')
    ]
)]
public function store() {}

#[OA\Put(
    path: '/api/equipment-brand/{id}',
    operationId: 'updateEquipmentBrand',
    tags: ['Equipment Brands'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
    ],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(ref: '#/components/schemas/EquipmentBrand')
    ),
    responses: [
        new OA\Response(response: 200, description: 'Actualizado correctamente'),
        new OA\Response(response: 404, description: 'No encontrado')
    ]
)]
public function update() {}

#[OA\Delete(
    path: '/api/equipment-brand/{id}',
    operationId: 'deleteEquipmentBrand',
    tags: ['Equipment Brands'],
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
