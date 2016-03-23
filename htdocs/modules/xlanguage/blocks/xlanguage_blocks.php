<?php
/**
 * xLanguage module (eXtensible Language Management For XOOPS)
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright    XOOPS Project (http://xoops.org)
 * @license      {@link http://www.gnu.org/licenses/gpl-2.0.html GNU Public License}
 * @package      xlanguage
 * @since        2.0
 * @author       D.J.(phppp) php_pp@hotmail.com
 * @version      $Id $
 * @param $options
 * @return array
 */

function b_xlanguage_select_show($options)
{
    global $xlanguage;

    $block = array();

    $xlanguage_handler = xoops_getModuleHandler('language', 'xlanguage');
    $xlanguage_handler->loadConfig();
    $lang_list = $xlanguage_handler->getAllList();
    if (!is_array($lang_list) || count($lang_list) < 1) {
        return $block;
    }

    $languages = array();
    foreach ($lang_list as $lang_name => $lang) {
        if (!isset($lang['base'])) {
            continue;
        }
        $languages[$lang_name]['name'] = $lang_name;
        $languages[$lang_name]['desc'] = $lang['base']->getVar('lang_desc');
        $languages[$lang_name]['image'] = XOOPS_URL . '/modules/xlanguage/assets/images/' . $lang['base']->getVar('lang_image');
        if (!isset($lang['ext']) || count($lang['ext']) < 1) {
            continue;
        }
        foreach ($lang['ext'] as $ext) {
            $languages[$ext->getVar('lang_name')]['name'] = $ext->getVar('lang_name');
            $languages[$ext->getVar('lang_name')]['desc'] = $ext->getVar('lang_desc');
            $languages[$ext->getVar('lang_name')]['image'] = XOOPS_URL . '/modules/xlanguage/assets/images/' . $ext->getVar('lang_image');
        }
    }

    $QUERY_STRING_array = array_filter(explode('&', xoops_getenv('QUERY_STRING')));
    $QUERY_STRING_new = array();
    foreach ($QUERY_STRING_array as $QUERY) {
        if (substr($QUERY, 0, strlen(XLANGUAGE_LANG_TAG) + 1) != XLANGUAGE_LANG_TAG . '=') {
            $vals = explode('=', $QUERY);
            foreach (array_keys($vals) as $key) {
                if (preg_match("/^a-z0-9$/i", $vals[$key])) {
                    $vals[$key] = urlencode($vals[$key]);
                }
            }
            $QUERY_STRING_new[] = implode('=', $vals);
        }
    }

    $block['display'] = $options[0];
    $block['delimitor'] = $options[1];
    $block['number'] = $options[2];
    $block['selected'] = $xlanguage['lang'];
    if ($options[0] === 'images' || $options[0] === 'text') {
        $query_string = htmlspecialchars(implode('&', $QUERY_STRING_new));
        $query_string .= empty($query_string) ? '' : '&amp;';
    } else {
        $query_string = implode('&', array_map('htmlspecialchars', $QUERY_STRING_new));
        $query_string .= empty($query_string) ? '' : '&';
    }
    $block['url'] = xoops_getenv('PHP_SELF') . '?' . $query_string . XLANGUAGE_LANG_TAG . '=';
    $block['languages'] =& $languages;

    return $block;
}

/**
 * @param $options
 * @return string
 */
function b_xlanguage_select_edit($options)
{
    $form = _MB_XLANGUAGE_DISPLAY_METHOD . "&nbsp;<select name='options[]'>";
    $form .= "<option value='images'";
    if ($options[0] === 'images') {
        $form .= " selected='selected'";
    }
    $form .= '>' . _MB_XLANGUAGE_DISPLAY_FLAGLIST . "</option>\n";
    $form .= "<option value='text'";
    if ($options[0] === 'text') {
        $form .= " selected='selected'";
    }
    $form .= '>' . _MB_XLANGUAGE_DISPLAY_TEXTLIST . "</option>\n";
    $form .= "<option value='dropdown'";
    if ($options[0] === 'dropdown') {
        $form .= " selected='selected'";
    }
    $form .= '>' . _MB_XLANGUAGE_DISPLAY_DROPDOWNLIST . "</option>\n";
    $form .= "</select>\n";
    $form .= '<br />' . _MB_XLANGUAGE_IMAGE_SEPARATOR . ' (' . _MB_XLANGUAGE_OPTIONAL . "):&nbsp;<input type='text' name='options[]' value='" . $options[1] . "' />";
    $form .= '<br />' . _MB_XLANGUAGE_IMAGE_PERROW . ' (' . _MB_XLANGUAGE_OPTIONAL . "):&nbsp;<input type='text' name='options[]' value='" . $options[2] . "' />";

    return $form;
}
