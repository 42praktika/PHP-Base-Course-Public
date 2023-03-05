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
    foreach ($familyTree as $key=>&$value) {
        if (is_array($value)) {
            normalizeFamilyTree($value);
        }
        if ($key === "name") {
            $value = mb_convert_case($value, MB_CASE_TITLE, 'utf8');
            $value = str_replace('  ','', $value);
            $value = trim($value);
            $value = mb_convert_encoding($value, 'utf8');
        }
    }
    return $familyTree;
}


var_dump(normalizeFamilyTree($familyTree));