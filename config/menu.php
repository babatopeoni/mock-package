<?php

return
[
    "supervisor" => [

    ],

    "admin" => [
      [
        "name" => "settings",
        "label" => "Settings",
        "url_prefix" => "company",
        "permissions" => "view-settings",
        "route-name" => "",
        "icon" => "fa fa-cog",
        "rank" => 200,
        "parent" => null
      ],

      [
        "name" => "organisational-settings",
        "label" => "Organisational Settings",
        "url_prefix" => "setup",
        "permissions" => "view-organisational-settings",
        "route-name" => "",
        "icon" => "",
        "sub-children" => [],
        "rank" => 0,
        "parent" => "settings"
      ],
      [
        "name" => "cost-center",
        "label" => "Cost Center",
        "url_prefix" => "costcentres",
        "permissions" => "view-organisational-settings",
        "route-name" => "",
        "icon" => "",
        "sub-children" => [],
        "rank" => 6,
        "parent" => "settings"
      ],
      [
            "name" => "hmo",
            "label" => "HMO",
            "url_prefix" => "",
            "permissions" => "view-hmo-menu",
            "route-name" => "",
            "icon" => "",
            "rank" => 30,
            "parent" => "settings"
        ],
      [
            "name" => "pfa",
            "label" => "PFA",
            "url_prefix" => "",
            "permissions" => "view-pfa-menu",
            "route-name" => "",
            "icon" => "",
            "rank" => 30,
            "parent" => "settings"
        ]
    ],

    "self-service" => [

    ],

    "hod" => [

    ]
];
