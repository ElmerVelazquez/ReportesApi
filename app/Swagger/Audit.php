<?php

namespace App\Swagger;
use OpenApi\Attributes as OA;

class Audit
{
    #[OA\Get(
        path: '/api/audits',
        operationId: 'getAudits',
        tags: ['Audits'],
        summary: 'Consultar el historial de auditoría del sistema',
        responses: [
            new OA\Response(
                response: 200,
                description: 'Lista de registros de auditoría',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(
                            property: 'data',
                            type: 'array',
                            items: new OA\Items(ref: '#/components/schemas/Audit')
                        )
                    ]
                )
            )
        ]
    )]
    public function index() {}

    #[OA\Get(
        path: '/api/audits/{id}',
        operationId: 'getAuditById',
        tags: ['Audits'],
        summary: 'Ver el detalle de un cambio específico',
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                description: 'ID del registro de auditoría',
                schema: new OA\Schema(type: 'integer')
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Detalle de la auditoría obtenido',
                content: new OA\JsonContent(ref: '#/components/schemas/Audit')
            ),
            new OA\Response(response: 404, description: 'Registro no encontrado')
        ]
    )]
    public function show() {}
}
