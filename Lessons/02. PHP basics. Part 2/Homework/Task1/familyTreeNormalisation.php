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


function normalizeFamilyTree(array &$familyTree): array
{
    //здесь должен быть твой код

    foreach ($familyTree as &$value)
    {
        if(is_array($value))
        {
            normalizeFamilyTree($value);
        }
        else
        {
            $value = mb_convert_encoding($value, 'UTF-8');
            $value = trim($value);
            $value = str_replace('  ', '', $value);
            $value = mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');
        }
    }
    return $familyTree;
}


// Раскоммментируй для отладки
var_dump(normalizeFamilyTree($familyTree));