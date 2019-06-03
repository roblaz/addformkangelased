<?php



$CFG = array();

switch ($_SERVER['HTTP_HOST']) {
    case 'site.local':
        $CFG = array(
            'dir_of_site' => '/sandbox/invest',
            'mysql' => array(
                'host' => '127.0.0.1',
                'user' => 'kolsha',
                'pass' => 'kolsha',
                'db' => 'crm'

            )


        );
        break;
    default:
        $CFG = array(
            'dir_of_site' => '/sandbox/invest',
            'mysql' => array(
                'host' => 'localhost',
                'user' => 'kol-sha',
                'pass' => 'pass',
                'db' => 'db'

            ),

        );


}


define('DIR_OF_SITE', $CFG['dir_of_site']);