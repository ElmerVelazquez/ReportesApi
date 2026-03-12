<?php

namespace App\Swagger;
use OpenApi\Attributes as OA;

class Letter
{
    #[OA\Get(
            path: '/api/letters',
            operationId: 'getLetters',
            tags: ['Letters'],
            summary: 'Listar todas las cartas/actas (Paginado)',
            responses: [
                new OA\Response(
                    response: 200,
                    description: 'Colección paginada de cartas',
                    content: new OA\JsonContent(
                        properties: [
                            new OA\Property(
                                property: 'data',
                                type: 'array',
                                items: new OA\Items(ref: '#/components/schemas/Letter')
                            ),
                            // Nota: Laravel paginate añade meta y links automáticamente
                            new OA\Property(property: 'meta', type: 'object'),
                            new OA\Property(property: 'links', type: 'object'),
                        ]
                    )
                )
            ]
        )]
        public function index() {}

        #[OA\Post(
            path: '/api/letters',
            operationId: 'storeLetter',
            tags: ['Letters'],
            summary: 'Crear una nueva carta o acta',
            requestBody: new OA\RequestBody(
                required: true,
                content: new OA\JsonContent(
                    required: ['register_id', 'title'],
                    properties: [
                        new OA\Property(property: 'register_id', type: 'integer'),
                        new OA\Property(property: 'title', type: 'string'),
                        new OA\Property(property: 'content', type: 'string'),
                    ]
                )
            ),
            responses: [
                new OA\Response(
                    response: 201,
                    description: 'Carta creada con éxito',
                    content: new OA\JsonContent(ref: '#/components/schemas/Letter')
                )
            ]
        )]
        public function store() {}

        #[OA\Get(
            path: '/api/letters/{id}',
            operationId: 'getLetterById',
            tags: ['Letters'],
            parameters: [
                new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
            ],
            responses: [
                new OA\Response(
                    response: 200,
                    description: 'Detalle de la carta',
                    content: new OA\JsonContent(ref: '#/components/schemas/Letter')
                ),
                new OA\Response(response: 404, description: 'No encontrado')
            ]
        )]
        public function show() {}

        #[OA\Put(
            path: '/api/letters/{id}',
            operationId: 'updateLetter',
            tags: ['Letters'],
            parameters: [
                new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))
            ],
            requestBody: new OA\RequestBody(
                required: true,
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: 'title', type: 'string'),
                        new OA\Property(property: 'content', type: 'string')
                    ]
                )
            ),
            responses: [
                new OA\Response(
                    response: 200,
                    description: 'Carta actualizada',
                    content: new OA\JsonContent(ref: '#/components/schemas/Letter')
                )
            ]
        )]
        public function update() {}

        #[OA\Delete(
            path: '/api/letters/{id}',
            operationId: 'deleteLetter',
            tags: ['Letters'],
            responses: [
                new OA\Response(response: 204, description: 'Carta eliminada')
            ]
        )]
        public function destroy() {}
}
