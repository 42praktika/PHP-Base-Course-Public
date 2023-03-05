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
    foreach ($familyTree as &$item)
    {
        if(is_array($item))
        {
            normalizeFamilyTree($item);
        }
        else
        {
            $item = normalizeName($item);
        }
    }
    return $familyTree;
}

function normalizeName(string $name)
{

    $filter = ['','    ',' ', null];
    $name = preg_replace('/\d/','',$name);
    $name = str_replace('	', ' ', $name);
    $name = str_replace('   ', ' ', $name);


    $splitted = explode(' ', $name);
    $splitted = array_diff($splitted, $filter);
    foreach ($splitted as &$item)
    {

        $item = mb_convert_case($item, MB_CASE_LOWER, 'UTF-8');
        $item = mb_convert_case($item, MB_CASE_TITLE, 'UTF-8');

        $subsplitted = explode('-', $item);
        if(count($subsplitted) == 1)
        {
            continue;
        }
        foreach ($subsplitted as &$subitem)
        {
            $subitem = mb_convert_case($subitem, MB_CASE_LOWER, 'UTF-8');
            $subitem = mb_convert_case($subitem, MB_CASE_TITLE, 'UTF-8');
        }
        $item = join('-', $subsplitted);
    }

    $name = join(" ", $splitted);
    return $name;
}
// Раскоммментируй для отладки
//var_dump(normalizeFamilyTree($familyTree));
