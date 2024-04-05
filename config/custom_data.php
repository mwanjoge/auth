<?php

return [
    "modules" => [
        "Sidebar",
        "Users",
        "Roles",
        "Permissions",
        "Warehouse",
        "Requisition",
        "Purchasing Order",
        "Stock Entries",
        "Loading Order",
    ],
    "roles" => [
        "super admin",
        "admin",
        "Procurement Officer"
    ],
    "modules_and_permissions" => [
        'Sidebar' => ['view sidebar','view dashboard','view user management','view procurement'],
        'Users' => ['view user','create user','update user','delete user','view all users'],
        'Roles' => ['view role','create role','update role','delete role','view all roles'],
        'Permissions' => ['view permission','create permission','update permission','delete permission','view all permissions'],
        'Warehouse' => ['view warehouse','create warehouse','update warehouse','delete warehouse','view all warehouses'],
        'Requisition' => ['view requisition','create requisition','update requisition','delete requisition','view all requisitions'],
        'Purchasing Order' => ['view purchase order','create purchasing order','update purchasing order','delete purchasing order','view all purchasing orders'],
        'Stock Entries' => ['view stock entries','create stock entries','update stock entries','delete stock entries','view all stock entries'],
        'Loading Order' => ['view loading order','create loading order','update loading order','delete loading order','view all loading orders'],
    ]
];
