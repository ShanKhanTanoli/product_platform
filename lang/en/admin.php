<?php


return array_merge(

    /*Begin::Dashboard*/
    include('admin/dashboard.php'),
    /*End::Dashboard*/

    /*Begin::Business Clients*/
    include('admin/users-guests.php'),
    /*End::Business Clients*/

    /*Begin::Events*/
    include('admin/events.php'),
    /*End::Events*/

    /*Begin::Slots*/
    include('admin/slots.php'),
    /*End::Slots*/

    /*Begin::Plans*/
    include('admin/plans.php'),
    /*End::Plans*/

    /*Begin::Settings*/
    include('admin/settings.php'),
    /*End::Settings*/

    /*Begin::Notifications*/
    include('admin/notifications.php'),
    /*End::Notifications*/

    /*Begin::Buttons*/
    include('admin/buttons.php'),
    /*End::Buttons*/

    /*Begin::Modal*/
    include('admin/modal.php'),
    /*End::Modal*/
);
