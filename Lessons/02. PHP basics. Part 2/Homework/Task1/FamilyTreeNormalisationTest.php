<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CDFamilyTreeNormalisationTest extends TestCase
{
    /**
     * @dataProvider getTreeFromTaskProvider
     *
     */
    public function testFamilyTreeNormalisation(array $initialFamilyTree, array $expectedFamilyTree, string $message): void
    {
        $this->assertSame($expectedFamilyTree, normalizeFamilyTree($initialFamilyTree), $message);
    }

    public function getTreeFromTaskProvider(): array
    {
        return [
            [
                [
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
                ],
                [
                    'name' => 'Романов Петр Федорович',
                    'parents' => [
                        'mother' => [
                            'name' => 'Романова Анна Петровна',
                            'parents' => [
                                [
                                    'mother' => [
                                        'name' => 'Романова Екатерина Алексеевна',
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
                            'name' => 'Карл Фридрих Гольштейн-Готторпский',
                            'parents' => [
                                'mother' => [
                                    'name' => '訶額侖',
                                ],
                                'father' => [
                                    'name' => 'Frederick Jonson'
                                ]
                            ],
                        ]
                    ]
                ],
                'Tree from task'
            ],
            [
                [],
                [],
                'Empty tree'
            ],
            [
                [
                    'name' => ' Иванов Иван   иванович ',
                ],
                [
                    'name' => 'Иванов Иван Иванович',
                ],
                'Names only in tree'
            ]

        ];
    }

    public function setUp(): void
    {
        require_once 'familyTreeNormalisation.php';
    }
}