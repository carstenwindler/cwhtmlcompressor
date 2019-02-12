<?php
$EM_CONF[$_EXTKEY] = array(
    'title' => 'Html Compressor',
    'description' => 'gzip compress HTML output',
    'author' => 'Carsten Windler',
    'author_email' => 'carsten@carstenwindler.de',
    'author_company' => '',
    'category' => 'fe',
    'version' => '1.0.0',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'shy' => '',
    'dependencies' => '',
    'conflicts' => '',
    'suggests' => '',
    'priority' => '',
    'module' => '',
    'internal' => '',
    'modify_tables' => '',
    'clearCacheOnLoad' => 1,
    'lockType' => '',
    'constraints' =>
        array(
            'depends' =>
                array(),
            'conflicts' =>
                array(),
            'suggests' =>
                array(),
        ),
    'autoload' =>
        array(
            'psr-4' =>
                array(
                    'CarstenWindler\\Cwhtmlcompressor\\' => 'Classes',
                ),
        ),
);
