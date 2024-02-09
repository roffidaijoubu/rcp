<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AuditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $satker_area = [
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

        // get $defaultAssessment from file \resources\templates\iso-55001-2014.json
        $defaultAssessment = file_get_contents(resource_path('templates/iso-55001-2014.json'));
        // convert $defaultAssessment from json string to array
        $template = json_decode($defaultAssessment, true);

        $years = range(2020, 2023);



        foreach ($satker_area as $satker => $areas) {
            foreach ($areas as $area) {
                foreach ($years as $year) {
                    for ($i = 0; $i < 2; $i++) {
                        // deep copy $ass to $assessment
                        $assessment = json_decode(json_encode($template), true);

                        // randomize $assessment[x]['items'][y]['score'] between 1 to 5, not 0
                        $assessmentLength = count($assessment);
                        for ($x = 0; $x < $assessmentLength; $x++) {
                            $itemsLength = count($assessment[$x]['items']);
                            for ($y = 0; $y < $itemsLength; $y++) {
                                $assessment[$x]['items'][$y]['score'] = rand(1, 5);
                            }
                        }
                        // dump array $assessment to json
                        $assessmentJSON = json_encode($assessment);

                        $user_id = 1;

                        DB::table('audits')->insert([
                            'satker' => $satker,
                            'area' => $area,
                            'year' => $year,
                            'template' => 'iso-55001-2014',
                            'user_id' => $user_id,
                            'assessment' => $assessmentJSON,
                        ]);
                    }
                }
            }
        }
    }
}
