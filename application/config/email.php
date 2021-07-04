<?php defined('BASEPATH') OR exit('No direct script access allowed.');

//$config['protocol'] = 'sendmail';
//$config['mailpath'] = '/usr/sbin/sendmail';
//$config['charset'] = 'iso-8859-1';
//$config['wordwrap'] = TRUE;


$config = array(
    'protocol' => 'mail', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'bh-ht-2.webhostbox.net', 
    'smtp_port' => 465,
    'smtp_user' => 'sendmail@webtechnomind.com',
    'smtp_pass' => 'ZM-(XPt2ie!z!',
   
'smtp_timeout' => 5,
'wordwrap' => TRUE,
'wrapchars' => 76,
'mailtype' => 'html',
'charset' => 'utf-8',
'validate' => TRUE

);

?>