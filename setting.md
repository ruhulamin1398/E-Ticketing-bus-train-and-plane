
$a = '[{
    "componentDetails":{
        "title":"Category List",
        "editTitle":"Edit Category"
    },
    "routes":{
        "create":{
            "name":"categories.create",
            "link":"categories"
        },
        "update":{
            "name":"categories.update",
            "link":"categories"
        },
        "delete":{
            "name":"categories.destroy",
            "link":"categories"
        }
    },
    "fieldList":[{
        
            "position":11,

            "create":"1",
            "read":"1",
            "update":"1",
            "require":"0",

            "name":"name",
            "input_type" : "text",
            "database_name":"name",  
            "title":"Name"
        },{
            
            "position":111,

            "create":"1",
            "read":"0",
            "update":"2",
            "require":"1",

           "input_type":"text",
           "name":"products_count",
           "title":"Products",


           "database_name":"products_count"
        },{
            
            "position":1,

            "create":"1",
            "read":"1",
            "update":"1",
            "require":"1",

           "input_type":"text",
           "name":"description",
           "database_name":"description",
           "title": "Description"
        },{
            
            "position":12,

            "create":"0",
            "read":"0",
            "update":"0",
            "require":"1",

           "input_type":"date",
           "name":"date",
           "database_name":"date",
           "title": "Date"
        },{
            
            "position":12,

            "create":"0",
            "read":"0",
            "update":"0",
            "require":"1",

           "input_type":"datetime-local",
           "name":"date_time",
           "database_name":"date_time",
           "title": "Date time"
        },{
            
            "position":120,

            "create":"0",
            "read":"0",
            "update":"0",
            "require":"1",

           "input_type":"time",
           "name":"time",
           "database_name":"time",
           "title": "Time"
        },{
            
            "position":2,

            "create":"0",
            "read":"0",
            "update":"0",
            "require":"1",

           "input_type":"month",
           "name":"month",
           "database_name":"month",
           "title": "Month"
        },{
            
            "position":3,

            "create":"0",
            "read":"0",
            "update":"0",
            "require":"1",

           "input_type":"dropDown",
           "name":"product_type_name",
           "database_name":"product_type_id",
           "title": "Type",
           "data" : "product_types"
        }
    ]
}]' ;