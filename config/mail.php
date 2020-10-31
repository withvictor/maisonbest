<?php
 

return array(
    'driver' => 'smtp',
    'host' => 'smtp.gmail.com',
    'port' => 587,
    'from' => array('address' => 'minting0623@gmail.com', 'name' => 'maisonbest'),
    'encryption' => 'tls',
    'username' => 'maisonbesttw@gmail.com',
    'password' => 'maison0701',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false,
);
