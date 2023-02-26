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

function normalizeName(string &$name): string {
    $name = mb_convert_case($name, MB_CASE_TITLE, 'UTF-8');
    $name = str_replace('  ','',$name);
    $name = trim($name);
    return $name;
}
function normalizeFamilyTree(array &$familyTree): array
{
    //здесь должен быть твой код
    foreach ($familyTree as $key=>&$value) {
        if (is_array($value)) {
            normalizeFamilyTree($value);
        }
        if ($key == "name") {
            normalizeName($value);
        }
    }
    return $familyTree;
}
