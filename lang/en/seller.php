<?php


return array_merge(

    //Global
    [
        'add-new' => 'Add New',
    ],

    /*Begin::Dashboard*/
    include('seller/dashboard.php'),
    /*End::Dashboard*/

        /*Begin::Products*/
        include('seller/products.php'),
        /*End::Products*/

    /*Begin::Settings*/
    include('seller/settings.php'),
    /*End::Settings*/

    /*Begin::Buttons*/
    include('seller/buttons.php'),
    /*End::Buttons*/
);
