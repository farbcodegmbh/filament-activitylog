<?php

return [
    'columns' => [
        'log_name' => [
            'label' => 'Typ',
        ],
        'event' => [
            'label' => 'Ereignis',
        ],
        'subject_type' => [
            'label'        => 'Betreff',
            'soft_deleted' => ' (Soft gelöscht)',
            'deleted'      => ' (Gelöscht)',
        ],
        'causer' => [
            'label' => 'Benutzer',
        ],
        'properties' => [
            'label' => 'Eigenschaften',
        ],
        'created_at' => [
            'label' => 'Protokolliert am',
        ],
    ],
    'filters' => [
        'created_at' => [
            'label'                   => 'Protokolliert am',
            'created_from'            => 'Erstellt ab',
            'created_from_indicator'  => 'Erstellt ab: :created_from',
            'created_until'           => 'Erstellt bis',
            'created_until_indicator' => 'Erstellt bis: :created_until',
        ],
        'event' => [
            'label' => 'Ereignis',
        ],
        'log_name' => [
            'label' => 'Log-Name',
        ],
    ],
];
