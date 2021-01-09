<?php

use App\setting;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::resource('tpl','TplController');








Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


// Data table setting
 Route::resource('/setting','SettingController');


Route::get('/dataTable', function () {
    

        
    $a = '[{
        "componentDetails":{
            "title":"User List",
            "editTitle":"Edit User"
        },
        "routes":{
            "create":{
                "name":"superAdmin.users.store",
                "link":"super-admin/users"
            },
            "update":{
                "name":"superAdmin.users.update",
                "link":"super-admin/users"
            },
            "delete":{
                "name":"superAdmin.users.destroy",
                "link":"super-admin/users"
            }
        },
        "fieldList":[{
            
                "position":11,
    
                "create":"1",
                "read":"1",
                "update":"1",
                "require":"1",
    
                "name":"name",
                "input_type" : "text",
                "database_name":"name",  
                "title":"Name"
            },{
                
                "position":111,
    
                "create":"1",
                "read":"1",
                "update":"1",
                "require":"1",
    
               "input_type":"email",
               "name":"email",
               "title":"Email",
    
    
               "database_name":"email"
            },{
            
                "position":1111,
    
                "create":"1",
                "read":"1",
                "update":"1",
                "require":"1",
    
               "input_type":"dropDown",
               "name":"company",
               "database_name":"company_id",
               "title": "Company",
               "data" : "companies"
            },{
            
                "position":1111,
    
                "create":"1",
                "read":"1",
                "update":"1",
                "require":"1",
    
               "input_type":"dropDown",
               "name":"role",
               "database_name":"role_id",
               "title": "Role",
               "data" : "roles"
            },{
                
                "position":11111,
    
                "create":"1",
                "read":"1",
                "update":"1",
                "require":"1",
    
               "input_type":"password",
               "name":"password",
               "title":"Password",
    
    
               "database_name":"password"
            }
        ]
    }]' ;
    
    
            
            // $setting =new setting;
            // $setting->setting = json_encode( $a);
            // $setting->table_name = 'users';
            // $setting->save();
            // return  "Success";
        



});