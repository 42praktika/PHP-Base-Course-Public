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
    array_walk_recursive($familyTree, function (&$tree)
    {
        $tree = mb_convert_encoding($tree, 'UTF-8');
        $tree = trim($tree);
        $tree = str_ireplace('  ', '', $tree);
        $tree = mb_strtolower($tree);
        $tree = mb_convert_case($tree, MB_CASE_TITLE, 'UTF-8');
    });

    return $familyTree ;
}


// Раскоммментируй для отладки
var_dump(normalizeFamilyTree($familyTree));