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
    $nameExists = array_key_exists('name', $familyTree);
    $parentsExist = array_key_exists('parents', $familyTree) && count($familyTree['parents']) != 0;

    if ($nameExists) {
        $familyTree['name'] = normalizeName($familyTree['name']);
    }

    // если ключ parents существует и внутри что-то есть
    if ($parentsExist) {
        $motherExist = array_key_exists('mother', $familyTree['parents']);
        $fatherExist = array_key_exists('father', $familyTree['parents']);

        if (!$fatherExist && !$motherExist) {
            // случай, когда ключи mother и father лежат не в parents, а в промежуточном массиве, который лежит в parents
            $familyTree['parents'][0] = normalizeFamilyTree($familyTree['parents'][0]);
        }

        if ($motherExist) {
            $familyTree['parents']['mother'] = normalizeFamilyTree($familyTree['parents']['mother']);
        }
        if ($fatherExist) {
            $familyTree['parents']['father'] = normalizeFamilyTree($familyTree['parents']['father']);
        }
    // нормализуем данные в промежуточном массиве
    } else if (array_key_exists('mother', $familyTree) || array_key_exists('father', $familyTree)) {
        $familyTree['mother'] = normalizeFamilyTree($familyTree['mother']);
        $familyTree['father'] = normalizeFamilyTree($familyTree['father']);
    }
    return $familyTree;
}

function normalizeName(string $name) : string
{
    $name = preg_replace('/\s+/', ' ', $name);
    $name = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
    return trim($name);
}

//var_dump(normalizeFamilyTree($familyTree));