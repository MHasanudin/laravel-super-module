<?php

return [
    /*
    |--------------------------------------------------------------------------
    | DocTypes Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration file contains settings for the DocTypes package.
    | You can customize various aspects of the package behavior here.
    |
    */

    /**
     * Enable or disable the DocTypes package
     */
    'enabled' => true,

    /**
     * Middleware to be applied to DocTypes routes
     */
    'middleware' => [
        'api',
        // 'auth:sanctum', // Uncomment if you want authentication
    ],

    /**
     * Route prefix for DocTypes API endpoints
     */
    'route_prefix' => 'doctypes',

    /**
     * Supported field types
     */
    'field_types' => [
        'text',
        'textarea',
        'number',
        'email',
        'password',
        'select',
        'checkbox',
        'radio',
        'date',
        'datetime',
        'time',
        'file',
        'image',
        'url',
        'tel',
        'json',
        'link',
        'table',
    ],

    /**
     * Default settings for DocTypes
     */
    'defaults' => [
        'color' => '#3b82f6',
        'icon' => 'document',
        'per_page' => 15,
        'show_title_field' => true,
        'enable_comments' => false,
        'enable_likes' => false,
        'enable_tags' => false,
        'track_changes' => true,
        'track_seen' => false,
    ],

    /**
     * Code generation settings
     */
    'generator' => [
        'enabled' => true,
        'output_path' => 'modules', // <--- arahkan ke folder modules
        'namespace' => 'Modules',   // <--- namespace module
        'create_migration' => true,
        'create_controller' => true,
        'create_model' => true,
        'create_request' => true,
        'create_resource' => true,
    ],

    /**
     * Database table names
     */
    'tables' => [
        'doctypes' => 'doctypes',
        'doctype_fields' => 'doctype_fields',
    ],

    /**
     * Permissions settings
     */
    'permissions' => [
        'enabled' => false,
        'default_permissions' => [
            'read' => ['*'],
            'write' => ['*'],
            'create' => ['*'],
            'delete' => ['*'],
        ],
    ],

    /**
     * Cache settings
     */
    'cache' => [
        'enabled' => true,
        'ttl' => 3600, // 1 hour
        'key_prefix' => 'doctypes',
    ],

    /**
     * Validation settings
     */
    'validation' => [
        'strict_mode' => false,
        'custom_rules' => [],
    ],

    'prefix' => 'doctypes',

    'middleware' => ['web'],

    'components' => [
        'form' => 'DoctypeForm',
        'list' => 'DoctypeList',
        'view' => 'DoctypeView'
    ],

    'field_types' => [
        'Data' => 'text',
        'Int' => 'number',
        'Float' => 'number',
        'Currency' => 'currency',
        'Check' => 'checkbox',
        'Select' => 'select',
        'Link' => 'link',
        'Text' => 'textarea',
        'Text Editor' => 'editor',
        'Date' => 'date',
        'Datetime' => 'datetime',
        'Time' => 'time',
        'Table' => 'table',
        'Attach' => 'file',
        'Attach Image' => 'image'
    ],

    'permissions' => [
        'read' => 1,
        'write' => 1,
        'create' => 1,
        'delete' => 1,
        'submit' => 1,
        'cancel' => 1,
        'amend' => 1
    ]
];
