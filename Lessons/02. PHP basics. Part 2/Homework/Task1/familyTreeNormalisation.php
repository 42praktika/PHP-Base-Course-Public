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
                        'name' => 'РомановА    ЕкаТЕРИНА Алексеевна',
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
    foreach ($familyTree as &$person) {
        if(is_array($person)) {
            normalizeFamilyTree($person);
        }
        else {
            $person = mb_convert_encoding(trim($person), 'UTF-8');
            $spaces = '  ';
            while (strpos($person, $spaces)) {
                $person = str_replace('  ', ' ', $person);
            }
            $person = mb_convert_case($person, MB_CASE_TITLE, 'UTF-8');
        }
    }
    return $familyTree;
}

var_dump(normalizeFamilyTree($familyTree));