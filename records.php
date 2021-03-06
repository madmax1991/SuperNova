<?php

/**
 * records.php
 *
 * 2.0 - Full rewrite by Gorlum for http://supernova.ws
 * 1.4st - Security checks & tests by Gorlum for http://supernova.ws
 * @version 1.4
 * @copyright 2008 by Chlorel for XNova
 */

include('common.' . substr(strrchr(__FILE__, '.'), 1));

if(HIDE_BUILDING_RECORDS)
{
  return;
}

$template = gettemplate('records', true);

foreach($lang['tech'] as $unit_id => $unit_name)
{
  if($unit_name && $sn_data[$unit_id]['name'])
  {
    $data_row = false;
    if(in_array($unit_id, array_merge($sn_data['groups']['structures'], $sn_data['groups']['fleet'], $sn_data['groups']['defense'])))
    {
      $data_row = doquery ("SELECT `username`, `{$sn_data[$unit_id]['name']}` AS `current` FROM {{planets}} AS p LEFT JOIN {{users}} AS u ON u.id = p.id_owner WHERE `{$sn_data[$unit_id]['name']}` = (SELECT MAX(`{$sn_data[$unit_id]['name']}`) FROM {{planets}} WHERE `id_level` = '0' and `id_owner` != 0) AND `id_level` = '0' ORDER BY p.`id` LIMIT 1;", '', true);
    }
    elseif(in_array($unit_id, $sn_data['groups']['tech']))
    {
      $data_row = doquery ("SELECT `username`, `{$sn_data[$unit_id]['name']}` AS `current` FROM {{users}} WHERE `{$sn_data[$unit_id]['name']}` = (SELECT MAX(`{$sn_data[$unit_id]['name']}`) FROM {{users}} WHERE `authlevel` = '0' AND user_as_ally is null) AND `authlevel` = 0 AND user_as_ally is null ORDER BY `id` LIMIT 1;", '', true);
    }

    if($data_row)
    {
      $template->assign_block_vars('records', array(
        'UNIT' => $unit_name,
        'USER' => $data_row['current'] ? $data_row['username'] : $lang['rec_rien'],
        'COUNT' => $data_row['current'] ? pretty_number($data_row['current']) : $lang['rec_rien'],
      ));
    }
  }
  else
  {
    if(!in_array($unit_id, array(UNIT_MERCENARIES, UNIT_RESOURCES, UNIT_ARTIFACTS, UNIT_PLANS)))
    {
      $template->assign_block_vars('records', array(
        'UNIT' => $unit_name,
        'USER' => $lang['sys_player'],
        'COUNT' => in_array($unit_id, array(UNIT_STRUCTURES, UNIT_STRUCTURES_SPECIAL, UNIT_TECHNOLOGIES)) ? $lang['sys_level'] : $lang['sys_quantity'],
        'HEADER' => true,
      ));
    }
  }
}

display($template, $lang['rec_title']);

?>
