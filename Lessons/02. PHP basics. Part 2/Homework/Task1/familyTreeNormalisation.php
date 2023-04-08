<?php

declare(strict_types=1);

$familyTree = [
    'name' => '    романов петр ФедоровиЧ',
    'parents' => [
        'mother' => [
            'name' => 'Романова анна петровна',
            'parents' => [
                [
                    'mother' => [
                        'name' => 'РомановА   ЕкаТЕРИНА Алексеевна',
                        'parents' => [
                            'mother' => [],
                            'father' => [],
                        ]
                    ],
                    'father' => [
                        'name' => 'Пётр Алексеевич Романов',
                        'parents' => [],
                    ],
                ],
            ]
        ],
        'father' => [
            'name' => 'КарЛ фриДрих гольштейн-готторпский ',
            'parents' => [
                'mother' => [
                    'name' => ' 訶額侖 ',
                ],
                'father' => [
                    'name' => '	FredericK Jonson'
                ]
            ],
        ]
    ]
];


function normalizeFamilyTree(array $familyTree): array
{
    //здесь должен быть твой код
    array_walk_recursive($familyTree, function(&$value) {
        $value = trim($value);
        $value = str_replace('  ', '', $value);
        //$value = mb_strtolower($value);
        $value = mb_convert_encoding($value, 'UTF-8');
        $value = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    });

    return $familyTree;
}

var_dump(normalizeFamilyTree($familyTree));