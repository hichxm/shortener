<?php

use Illuminate\Database\Seeder;

class adding_default_data_to_stats extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                "name" => "stats_visit_total",
                "value" => "0"
            ],
            [
                "name" => "stats_create_total",
                "value" => "0"
            ],
            [
                "name" => "website_version",
                "value" => "1.0"
            ]
        ];

        foreach ($datas as $data){
            $item = new \App\stats();
            $item->name = $data['name'];
            $item->value = $data['value'];
            $item->save();
        }
    }
}
