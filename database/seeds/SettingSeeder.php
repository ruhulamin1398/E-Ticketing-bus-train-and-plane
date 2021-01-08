<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'table_name'=> 'companies',
                'setting'=> '"[{\n    \"componentDetails\":{\n        \"title\":\"Company List\",\n        \"editTitle\":\"Edit Company\"\n    },\n    \"routes\":{\n        \"create\":{\n            \"name\":\"superAdmin.companies.store\",\n            \"link\":\"super-admin\/companies\"\n        },\n        \"update\":{\n            \"name\":\"superAdmin.companies.update\",\n            \"link\":\"super-admin\/companies\"\n        },\n        \"delete\":{\n            \"name\":\"superAdmin.companies.destroy\",\n            \"link\":\"super-admin\/companies\"\n        }\n    },\n    \"fieldList\":[{\n        \n            \"position\":11,\n\n            \"create\":\"2\",\n            \"read\":\"1\",\n            \"update\":\"2\",\n            \"require\":\"1\",\n\n            \"name\":\"name\",\n            \"input_type\" : \"text\",\n            \"database_name\":\"name\",  \n            \"title\":\"Name\"\n        },\n        {\n            \n            \"position\":3,\n\n            \"create\":\"2\",\n            \"read\":\"1\",\n            \"update\":\"2\",\n            \"require\":\"1\",\n\n           \"input_type\":\"dropDown\",\n           \"name\":\"company_type\",\n           \"database_name\":\"company_type_id\",\n           \"title\": \"Company Type\",\n           \"data\" : \"company_types\"\n        },{\n            \n            \"position\":111,\n\n            \"create\":\"2\",\n            \"read\":\"1\",\n            \"update\":\"2\",\n            \"require\":\"0\",\n\n           \"input_type\":\"text\",\n           \"name\":\"description\",\n           \"title\":\"Description\",\n\n\n           \"database_name\":\"description\"\n        }\n    ]\n}]"',
            ],
            [
                'table_name'=> 'destinations',
                'setting'=> '"[{\n    \"componentDetails\":{\n        \"title\":\"Destination List\",\n        \"editTitle\":\"Edit Destination\"\n    },\n    \"routes\":{\n        \"create\":{\n            \"name\":\"superAdmin.destinations.store\",\n            \"link\":\"super-admin\/destinations\"\n        },\n        \"update\":{\n            \"name\":\"superAdmin.destinations.update\",\n            \"link\":\"super-admin\/destinations\"\n        },\n        \"delete\":{\n            \"name\":\"superAdmin.destinations.destroy\",\n            \"link\":\"super-admin\/destinations\"\n        }\n    },\n    \"fieldList\":[{\n        \n            \"position\":11,\n\n            \"create\":\"2\",\n            \"read\":\"1\",\n            \"update\":\"2\",\n            \"require\":\"1\",\n\n            \"name\":\"name\",\n            \"input_type\" : \"text\",\n            \"database_name\":\"name\",  \n            \"title\":\"Name\"\n        },{\n            \n            \"position\":111,\n\n            \"create\":\"2\",\n            \"read\":\"1\",\n            \"update\":\"2\",\n            \"require\":\"0\",\n\n           \"input_type\":\"text\",\n           \"name\":\"description\",\n           \"title\":\"Description\",\n\n\n           \"database_name\":\"description\"\n        }\n    ]\n}]"',
            ],
            
            
        ]);
    }
}
