<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Audit>
 */
class AuditFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $satker_area = [
        'SOR1' => [
            'BATAM',
            'DUMAI',
            'LAMPUNG',
            'MEDAN',
            'PALEMBANG',
            'PEKANBARU',
        ],
        'SOR2' => [
            'BEKASI',
            'BOGOR',
            'CILEGON',
            'CIREBON',
            'JAKARTA',
            'KARAWANG',
            'TANGERANG',
        ],
        'SOR3' => [
            'PASURUAN',
            'SEMARANG',
            'SIDOARJO',
            'SURABAYA',
        ],
        'SOR4' => ['BALIKPAPAN', 'BANJARMASIN', 'KUTAI', 'PALU', 'SAMARINDA', 'TARAKAN'],
        'SSWJ' => [
            'AOJBB',
            'AOL',
            'AOSS',
        ]
    ];
    public function definition(): array
    {
        $years = range(2020, 2023);
        $audits = [];

        foreach ($this->satker_area as $satker => $areas) {
            foreach ($areas as $area) {
                foreach ($years as $year) {
                    for ($i = 0; $i < 2; $i++) {
                        $audits[] = [
                            'satker_area' => $satker,
                            'area' => $area,
                            'year' => $year,
                            'template' => 'iso-55001-2014',
                            'user_id' => 1,
                        ];
                    }
                }
            }
        }

        return $audits;
    }
}
