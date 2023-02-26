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
    array_walk_recursive($familyTree,function(&$item)
    {
            $item = mb_convert_encoding($item,'UTF-8');
            $item = trim($item);
            $item = str_replace('   ',' ',$item);
            $item= mb_strtolower($item);
            $item = mb_convert_case($item, MB_CASE_TITLE, "UTF-8");
    });
    return $familyTree;
}



var_dump(normalizeFamilyTree($familyTree));