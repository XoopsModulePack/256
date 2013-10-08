<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * Contact module
 *
 * @copyright   The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author      Kazumi Ono (aka Onokazu)
 * @author      Trabis <lusopoemas@gmail.com>
 * @author      Hossein Azizabadi (AKA Voltan)
 * @version     $Id: xoops_version.php 12162 2013-10-08 02:00:11Z beckmi $
 */

if (!defined('XOOPS_ROOT_PATH')) {
    die('XOOPS root path not defined');
}

$moduleDirName = basename(dirname(__FILE__));

$modversion['name']           = _MI_CONTACT_NAME;
$modversion['version']        = 1.81;
$modversion['description']    = _MI_CONTACT_DESC;
$modversion['credits']        = 'The XOOPS Project, Mohtava Project';
$modversion['author']         = 'Kazumi Ono (Onokazu), modified by Trabis, rewritten by Voltan';
$modversion['nickname']       = '';
$modversion['help']           = 'page=help';
$modversion['license']        = 'GNU GPL 2.0';
$modversion['license_url']    = "www.gnu.org/licenses/gpl-2.0.html";
$modversion['official']       = 1;
$modversion['image']          = "images/contact_slogo.png";
$modversion['dirname']        = basename(dirname(__FILE__));
$modversion['onUpdate']       = 'include/functions_update.php';
$modversion['dirmoduleadmin'] = '/Frameworks/moduleclasses/moduleadmin';
$modversion['icons16']        = '../../Frameworks/moduleclasses/icons/16';
$modversion['icons32']        = '../../Frameworks/moduleclasses/icons/32';

// DB
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][0]        = "contact";

//about
$modversion["module_website_url"]  = "http://www.xoops.org/";
$modversion["module_website_name"] = "XOOPS";
$modversion["release_date"]        = "2013/10/07";
$modversion["module_status"]       = "Beta 1";
$modversion["author_website_url"]  = "http://www.xoops.org/";
$modversion["author_website_name"] = "XOOPS";
$modversion['min_php']             = '5.3.7';
$modversion['min_xoops']           = '2.5.6';
$modversion['min_admin']           = '1.1';

//Admin things
$modversion['hasAdmin'] = 1;

// Menu
$modversion['hasMain']    = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu']  = "admin/menu.php";

// Set to 1 if you want to display menu generated by system module
$modversion['system_menu'] = 1;

// Templates
$i                                          = 1;
$modversion['templates'][$i]['file']        = 'contact_index.html';
$modversion['templates'][$i]['description'] = '_MI_CONTACT_TEMPLATES';

// Settings
$modversion['config'][] = array(
    'name'        => 'break',
    'title'       => '_MI_CONTACT_HEAD_OPTIONS',
    'description' => '',
    'formtype'    => 'line_break',
    'valuetype'   => 'textbox',
    'default'     => 'head'
);

$modversion['config'][] = array(
    'name'        => 'captchaRegistered',
    'title'       => '_MI_CONTACT_FORM_CAPTCHA_REGISTERED',
    'description' => '_MI_CONTACT_FORM_CAPTCHA_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
);

$modversion['config'][] = array(
    'name'        => 'captchaAnonymous',
    'title'       => '_MI_CONTACT_FORM_CAPTCHA_ANONYMOUS',
    'description' => '_MI_CONTACT_FORM_CAPTCHA_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
);

$modversion['config'][] = array(
    'name'        => 'form_url',
    'title'       => '_MI_CONTACT_FORM_URL',
    'description' => '_MI_CONTACT_FORM_URL_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
);

$modversion['config'][] = array(
    'name'        => 'form_icq',
    'title'       => '_MI_CONTACT_FORM_ICQ',
    'description' => '_MI_CONTACT_FORM_ICQ_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
);

$modversion['config'][] = array(
    'name'        => 'form_company',
    'title'       => '_MI_CONTACT_FORM_COMPANY',
    'description' => '_MI_CONTACT_FORM_COMPANY_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
);

$modversion['config'][] = array(
    'name'        => 'form_location',
    'title'       => '_MI_CONTACT_FORM_LOCATION',
    'description' => '_MI_CONTACT_FORM_LOCATION_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
);

$modversion['config'][] = array(
    'name'        => 'form_phone',
    'title'       => '_MI_CONTACT_FORM_PHONE',
    'description' => '_MI_CONTACT_FORM_PHONE_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
);

$modversion['config'][] = array(
    'name'        => 'form_address',
    'title'       => '_MI_CONTACT_FORM_ADDRESS',
    'description' => '_MI_CONTACT_FORM_ADDRESS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
);

$modversion['config'][] = array(
    'name'        => 'form_dept',
    'title'       => '_MI_CONTACT_FORM_DEPT',
    'description' => '_MI_CONTACT_FORM_DEPT_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
);

$modversion['config'][] = array(
    'name'        => 'contact_dept',
    'title'       => '_MI_CONTACT_DEPT',
    'description' => '_MI_CONTACT_DEPT_DESC',
    'formtype'    => 'textarea',
    'valuetype'   => 'array',
    'default'     => ''
);

$modversion['config'][] = array(
    'name'        => 'break',
    'title'       => '_MI_CONTACT_HEAD_INFO',
    'description' => '',
    'formtype'    => 'line_break',
    'valuetype'   => 'textbox',
    'default'     => 'head'
);

$modversion['config'][] = array(
    'name'        => 'contact_info',
    'title'       => '_MI_CONTACT_TOPINFO',
    'description' => '_MI_CONTACT_TOPINFO_DESC',
    'formtype'    => 'textarea',
    'valuetype'   => 'text',
    'default'     => ''
);

$modversion['config'][] = array(
    'name'        => 'break',
    'title'       => '_MI_CONTACT_HEAD_ADMIN',
    'description' => '',
    'formtype'    => 'line_break',
    'valuetype'   => 'textbox',
    'default'     => 'head'
);

$modversion['config'][] = array(
    'name'        => 'admin_perpage',
    'title'       => '_MI_CONTACT_PERPAGE',
    'description' => '_MI_CONTACT_PERPAGE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10
);
