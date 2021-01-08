<?php

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
                "name":"superAdmin.user.store",
                "link":"super-admin/user"
            },
            "update":{
                "name":"superAdmin.user.update",
                "link":"super-admin/user"
            },
            "delete":{
                "name":"superAdmin.user.destroy",
                "link":"super-admin/user"
            }
        },
        "fieldList":[{
            
                "position":11,
    
                "create":"2",
                "read":"1",
                "update":"2",
                "require":"1",
    
                "name":"name",
                "input_type" : "text",
                "database_name":"name",  
                "title":"Name"
            },{
                
                "position":111,
    
                "create":"2",
                "read":"1",
                "update":"2",
                "require":"0",
    
               "input_type":"text",
               "name":"description",
               "title":"Description",
    
    
               "database_name":"description"
            }
        ]
    }]' ;
    
    
            
            // $setting =new setting;
            // $setting->setting = json_encode( $a);
            // $setting->table_name = 'destinations';
            // $setting->save();
            // return  "Success";
        



});