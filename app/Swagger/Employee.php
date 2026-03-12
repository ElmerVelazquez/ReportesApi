<?php

namespace App\Swagger;

use OpenApi\Attributes as OA;

class Employee {

#[OA\Get(
    path: '/api/employee',
    operationId: 'getEmployees',
    tags: ['Employees'],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Lista de empleados',
            content: new OA\JsonContent(
                type: 'array',
                items: new OA\Items(ref: '#/components/schemas/Employee')
            )
        )
    ]
)]
public function index() {}

#[OA\Get(
    path: '/api/employee/{id}',
    operationId: 'getEmployeeById',
    tags: ['Employees'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
    ],
    responses: [
        new OA\Response(
            response: 200, 
            description: 'Detalle del empleado',
            content: new OA\JsonContent(ref: '#/components/schemas/Employee')
        ),
        new OA\Response(response: 404, description: 'No encontrado')
    ]
)]
public function show() {}

#[OA\Post(
    path: '/api/employee',
    operationId: 'storeEmployee',
    tags: ['Employees'],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(ref: '#/components/schemas/Employee')
    ),
    responses: [
        new OA\Response(response: 201, description: 'Empleado creado'),
        new OA\Response(response: 422, description: 'Error de validación')
    ]
)]
public function store() {}

#[OA\Put(
    path: '/api/employee/{id}',
    operationId: 'updateEmployee',
    tags: ['Employees'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
    ],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(ref: '#/components/schemas/Employee')
    ),
    responses: [
        new OA\Response(response: 200, description: 'Empleado actualizado'),
        new OA\Response(response: 404, description: 'No encontrado')
    ]
)]
public function update() {}

#[OA\Delete(
    path: '/api/employee/{id}',
    operationId: 'deleteEmployee',
    tags: ['Employees'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
    ],
    responses: [
        new OA\Response(response: 204, description: 'Empleado eliminado'),
        new OA\Response(response: 404, description: 'No encontrado')
    ]
)]
public function destroy() {}

}