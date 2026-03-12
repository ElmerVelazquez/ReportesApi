<?php

namespace App\Swagger;

use OpenApi\Attributes as OA;

class Schemas {

    #[OA\Schema(
    schema: 'Company',
    type: 'object',
    required: ['name'],
    properties: [
        new OA\Property(property: 'id', type: 'integer', example: 1),
        new OA\Property(property: 'name', type: 'string', example: 'Acme Inc.')
    ]
    )]
    public $Company;

    #[OA\Schema(
        schema: 'Employee',
        required: ['name', 'lastname', 'job_title'],
        properties: [
            new OA\Property(property: 'id', type: 'integer', example: 1),
            new OA\Property(property: 'name', type: 'string', example: 'Juan'),
            new OA\Property(property: 'lastname', type: 'string', example: 'Pérez'),
            new OA\Property(property: 'job_title', type: 'string', example: 'Software Engineer'),
            new OA\Property(property: 'status', type: 'string', enum: ['active', 'inactive'], default: 'active'),
            new OA\Property(property: 'created_at', type: 'string', format: 'date-time'),
            new OA\Property(property: 'updated_at', type: 'string', format: 'date-time'),
        ]
    )]
    public $Employee;

    #[OA\Schema(
        schema: 'EquipmentType',
        required: ['name'],
        properties: [
            new OA\Property(property: 'id', type: 'integer', example: 1),
            new OA\Property(property: 'name', type: 'string', example: 'Laptop'),
            new OA\Property(
                property: 'attributes',
                type: 'array',
                items: new OA\Items(ref: '#/components/schemas/EquipmentAttribute'),
                description: 'Lista de atributos asociados a este tipo de equipo'
            ),
            new OA\Property(property: 'created_at', type: 'string', format: 'date-time'),
            new OA\Property(property: 'updated_at', type: 'string', format: 'date-time'),
        ]
    )]
    public $Equipment_Type;

    #[OA\Schema(
        schema: 'EquipmentAttribute',
        required: ['name'],
        properties: [
            new OA\Property(property: 'id', type: 'integer', example: 1),
            new OA\Property(property: 'name', type: 'string', example: 'Color' , description: 'Nombre del atributo (ej: Marca, Modelo, Color)'),
            new OA\Property(
                property: 'attribute_values',
                type: 'array',
                items: new OA\Items(ref: '#/components/schemas/EquipmentAttributeValue'),
                example: ['Rojo', 'Azul', 'Verde'],
                description: 'Valores asociados a este atributo'
            ),
            new OA\Property(property: 'created_at', type: 'string', format: 'date-time'),
            new OA\Property(property: 'updated_at', type: 'string', format: 'date-time'),
        ]
    )]
    public $EquipmentAttribute;

    #[OA\Schema(
        schema: 'EquipmentAttributeValue',
        required: ['equipment_id', 'equipment_attribute_id', 'value'],
        properties: [
            new OA\Property(property: 'id', type: 'integer', example: 1),
            new OA\Property(property: 'equipment_id', type: 'integer', example: 10, description: 'ID del equipo al que pertenece'),
            new OA\Property(property: 'equipment_attribute_id', type: 'integer', example: 5, description: 'ID del atributo (ej: Color, RAM)'),
            new OA\Property(property: 'value', type: 'string', example: '16GB', description: 'Valor asignado'),
            new OA\Property(property: 'created_at', type: 'string', format: 'date-time'),
            new OA\Property(property: 'updated_at', type: 'string', format: 'date-time'),
        ]
    )]
    public $EquipmentAttributeValue;

    #[OA\Schema(
        schema: 'Equipment',
        properties: [
            new OA\Property(
                property: 'data',
                type: 'object', // O 'array' si es para el index, pero lo definiremos como objeto base
                properties: [
                    new OA\Property(property: 'id', type: 'integer', example: 1),
                    new OA\Property(property: 'equipment_type_id', type: 'integer', example: 1),
                    new OA\Property(property: 'brand', type: 'string', example: 'Dell'),
                    new OA\Property(property: 'model', type: 'string', example: 'Latitude 5420'),
                    new OA\Property(property: 'serial', type: 'string', example: 'SN-123456789'),
                    new OA\Property(property: 'equipment_status_id', type: 'integer', example: 2),
                    new OA\Property(property: 'comment', type: 'string', nullable: true),
                    new OA\Property(property: 'created_at', type: 'string', format: 'date-time'),
                    new OA\Property(property: 'updated_at', type: 'string', format: 'date-time'),
                ]
            )
        ]
    )]
    public $Equipment;

    #[OA\Schema(
        schema: 'EquipmentStatus',
        properties: [
            new OA\Property(
                property: 'data',
                type: 'object',
                properties: [
                    new OA\Property(property: 'id', type: 'integer', example: 1),
                    new OA\Property(property: 'name', type: 'string', example: 'Disponible'),
                    new OA\Property(property: 'description', type: 'string', example: 'El equipo está listo para ser asignado'),
                    new OA\Property(property: 'created_at', type: 'string', format: 'date-time'),
                    new OA\Property(property: 'updated_at', type: 'string', format: 'date-time'),
                ]
            )
        ]
    )]
    public $EquipmentStatus;

    #[OA\Schema(
        schema: 'Audit',
        properties: [
            new OA\Property(
                property: 'data',
                type: 'object',
                properties: [
                    new OA\Property(property: 'id', type: 'integer', example: 1),
                    new OA\Property(property: 'user_id', type: 'integer', example: 5),
                    new OA\Property(property: 'action', type: 'string', example: 'updated', description: 'Acción realizada (created, updated, deleted)'),
                    new OA\Property(property: 'auditable_type', type: 'string', example: 'App\\Models\\Equipment'),
                    new OA\Property(property: 'auditable_id', type: 'integer', example: 12),
                    new OA\Property(
                        property: 'old_values', 
                        type: 'object', 
                        nullable: true, 
                        example: ['status' => 'disponible', 'comment' => 'Ninguno']
                    ),
                    new OA\Property(
                        property: 'new_values', 
                        type: 'object', 
                        nullable: true, 
                        example: ['status' => 'reparación', 'comment' => 'Pantalla rota']
                    ),
                    new OA\Property(property: 'created_at', type: 'string', format: 'date-time'),
                    new OA\Property(property: 'updated_at', type: 'string', format: 'date-time'),
                ]
            )
        ]
    )]
    public $Audit;

    #[OA\Schema(
        schema: 'RegisterType',
        properties: [
            new OA\Property(
                property: 'data',
                type: 'object',
                properties: [
                    new OA\Property(property: 'id', type: 'integer', example: 1),
                    new OA\Property(property: 'name', type: 'string', example: 'Asignación'),
                    new OA\Property(property: 'created_at', type: 'string', format: 'date-time'),
                    new OA\Property(property: 'updated_at', type: 'string', format: 'date-time'),
                ]
            )
        ]
    )]
    public $RegisterType;

    #[OA\Schema(
        schema: 'Register',
        properties: [
            new OA\Property(
                property: 'data',
                type: 'object',
                properties: [
                    new OA\Property(property: 'id', type: 'integer', example: 1),
                    new OA\Property(property: 'type_register_id', type: 'integer', example: 2),
                    new OA\Property(property: 'company_id', type: 'integer', example: 1),
                    new OA\Property(property: 'equipment_id', type: 'integer', example: 10),
                    new OA\Property(property: 'emisor_id', type: 'integer', example: 5, description: 'ID del empleado que entrega'),
                    new OA\Property(property: 'receptor_id', type: 'integer', example: 8, description: 'ID del empleado que recibe'),
                    new OA\Property(property: 'comment', type: 'string', nullable: true, example: 'Entrega de equipo por renovación'),
                    // Relaciones (opcional si las cargas en el Resource)
                    new OA\Property(property: 'type', ref: '#/components/schemas/RegisterType'),
                    new OA\Property(property: 'equipment', ref: '#/components/schemas/Equipment'),
                    new OA\Property(property: 'emisor', ref: '#/components/schemas/Employee'),
                    new OA\Property(property: 'receptor', ref: '#/components/schemas/Employee'),
                    new OA\Property(property: 'created_at', type: 'string', format: 'date-time'),
                    new OA\Property(property: 'updated_at', type: 'string', format: 'date-time'),
                ]
            )
        ]
    )]
    public $Register;
    
    #[OA\Schema(
        schema: 'Letter',
        properties: [
            new OA\Property(
                property: 'data',
                type: 'object',
                properties: [
                    new OA\Property(property: 'id', type: 'integer', example: 1),
                    new OA\Property(property: 'register_id', type: 'integer', example: 101),
                    new OA\Property(property: 'title', type: 'string', example: 'Acta de Entrega de Equipo'),
                    new OA\Property(property: 'content', type: 'string', example: 'Por la presente se hace entrega...'),
                    new OA\Property(property: 'file_path', type: 'string', nullable: true, example: 'storage/letters/acta_001.pdf'),
                    new OA\Property(property: 'created_at', type: 'string', format: 'date-time'),
                    new OA\Property(property: 'updated_at', type: 'string', format: 'date-time'),
                ]
            )
        ]
    )]
    public $Letter;
}