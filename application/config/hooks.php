<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['display_override'] = array(
'class' => 'MyClass3',
'function' => 'Myfunction3',
'filename' => 'MyClass3.php',
'filepath' => 'hooks'
//'param' => array('wer','werwe','gfdfg')

);

$hook['pre_controller'][] = array(
'class' => 'MyClass3',
'function' => 'Myfunction4',
'filename' => 'MyClass3.php',
'filepath' => 'hooks',
'param' => array('wer','werwe','gfdfg')

);

$hook['post_controller_constructor'][] = array(
'class' => 'MyClass3',
'function' => 'Myfunction5',
'filename' => 'MyClass3.php',
'filepath' => 'hooks',
'param' => array('wer','werwe','gfdfg')

);

$hook['post_system'][] = array(
'class' => 'MyClass3',
'function' => 'Myfunction6',
'filename' => 'MyClass3.php',
'filepath' => 'hooks',
'param' => array('wer','werwe','gfdfg')

);

