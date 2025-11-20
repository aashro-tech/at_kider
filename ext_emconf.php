<?php

$EM_CONF[$_EXTKEY] = [
    'title' => '[AASHRO] Kider TYPO3 Template',
    'description' => 'Kider theme is a colorful and engaging TYPO3 template designed for kider, preschools, and early childhood education centers.',
    'category' => 'templates',
    'author' => 'Team AASHRO',
    'author_email' => 'info@aashro.com',
    'author_company' => 'AASHRO Tech',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.0.0-12.9.9',
            'mask' => '8.3.11-9.0.5'
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
