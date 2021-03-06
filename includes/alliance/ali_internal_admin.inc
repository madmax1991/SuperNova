<?php

if(!defined('SN_IN_ALLY') || SN_IN_ALLY !== true)
{
  $debug->error("Attempt to call ALLIANCE page mode {$mode} directly - not from alliance.php", 'Forbidden', 403);
}

if(!$user_admin)
{
  message($lang['Denied_access'], $lang['ally_admin']);
}

$parse = $lang;

$text_list = array(
  1 => array ('db_field' => 'ally_description', 'text_type' => 'Public_text_of_alliance'),
  2 => array ('db_field' => 'ally_text', 'text_type' => 'Internal_text'),
  3 => array ('db_field' => 'ally_request', 'text_type' => 'Show_of_request_text'),
);

$allyTextID = sys_get_param_int('t', 1);
$allyTextID = ($allyTextID<1 || $allyTextID>3) ? 1 : $allyTextID;

if(sys_get_param_str('isSaveOptions'))
{
  require_once('includes/includes/sys_avatar.php');

  $avatar_upload_result = sys_avatar_upload($ally['id'], $ally['ally_image'], 'ally');
  $parse['AVATAR_UPLOAD_STATUS'] = $avatar_upload_result['STATUS'];
  $parse['AVATAR_UPLOAD_MESSAGE'] = $avatar_upload_result['MESSAGE'];
//  $template->assign_block_vars('result', $avatar_upload_result);

  $old_tag = $ally['ally_tag'];

  $ally['ally_name'] = sys_get_param_str('name');
  $ally['ally_tag']  = sys_get_param_str('tag');
  $ally['ally_owner_range'] = sys_get_param_str('owner_range');
  $ally['ally_web'] = strip_tags(sys_get_param_str('web'));
  $ally['ally_request_notallow'] = sys_get_param_str('request_notallow');

  doquery("START TRANSACTION;");
  doquery("UPDATE {{alliance}} SET
      `ally_name`='{$ally['ally_name']}',
      `ally_tag`='{$ally['ally_tag']}',
      `ally_owner_range`='{$ally['ally_owner_range']}',
      `ally_image`='{$ally['ally_image']}',
      `ally_web`='{$ally['ally_web']}',
      `ally_request_notallow`='{$ally['ally_request_notallow']}'
    WHERE `id`='{$ally['id']}' LIMIT 1;");

  if($ally['ally_tag'] != mysql_real_escape_string($old_tag))
  {
    doquery("UPDATE {{users}} SET `username`='[{$ally['ally_tag']}]' WHERE `id` = {$ally['ally_user_id']};");
  }
  doquery("COMMIT;");

//  $ally = doquery("SELECT * FROM {{alliance}} WHERE `id` ='{$user['ally_id']}';", '', true);
}
elseif(sys_get_param_str('isSaveText'))
{
  $text = sys_get_param_str_both('text');
  doquery("UPDATE {{alliance}} SET `{$text_list[$allyTextID]['db_field']}`='{$text['str']}' WHERE `id`='{$ally['id']}';");
  $ally[$text_list[$allyTextID]['db_field']] = $text['raw'];
}
elseif(sys_get_param_str('isTransfer') && $idNewLeader = sys_get_param_id('idNewLeader'))
{
  if(!$isAllyOwner)
  {
    message($lang['Denied_access'], $lang['ally_admin']);
  }

  $newLeader = doquery("SELECT `ally_id` FROM {{users}} WHERE `id` = '$idNewLeader' LIMIT 1;", true);
  if($newLeader['ally_id'] == $user['ally_id'])
  {
    doquery("START TRANSACTION;");
    doquery("UPDATE {{users}} SET `ally_rank_id`='0' WHERE `id`={$user['id']} LIMIT 1;");
    doquery("UPDATE {{alliance}} SET `ally_owner`='{$idNewLeader}' WHERE `id`={$user['ally_id']};");
    doquery("UPDATE {{users}} SET `ally_rank_id`='0' WHERE `id`='{$idNewLeader}';");
    doquery("COMMIT;");
    sys_redirect('alliance.php');
  }
}
elseif(sys_get_param_str('isDisband') && sys_get_param_str('isConfirmDisband'))
{
  if(!$isAllyOwner)
  {
    message($lang['Denied_access'], $lang['ally_admin']);
  }
  doquery("START TRANSACTION;");
  doquery("DELETE FROM {{alliance}} WHERE id='{$ally['id']}';");
  doquery("UPDATE {{users}} SET `ally_id` = null, `ally_name` = null, `ally_rank_id` = 0, `ally_register_time` = 0 WHERE ally_id='{$ally['id']}';");
  doquery("COMMIT;");
  sys_redirect('alliance.php');
};

$parse['text']         = $ally[$text_list[$allyTextID]['db_field']];
$parse['request_type'] = $lang[$text_list[$allyTextID]['text_type']];

$parse['t'] = $allyTextID;

$request = doquery("SELECT COUNT(*) AS request_count FROM {{alliance_requests}} WHERE `id_ally` ='{$ally['id']}'", '', true);
$parse['request_count'] = $request['request_count'] ? $lang['ali_req_requestCount'] . ': ' . intval($request['request_count']) . '. ' . $lang['ali_req_check'] : $lang['ali_req_emptyList'];

$parse['ALLY_ID'] = $ally['id'];
$parse['ALLY_IMAGE'] = $ally['ally_image'];

$parse['ally_name'] = htmlspecialchars($ally['ally_name']);
$parse['ally_tag'] = htmlspecialchars($ally['ally_tag']);
$parse['ally_web'] = htmlspecialchars($ally['ally_web']);
$parse['ally_request_notallow_0'] = (( $ally['ally_request_notallow']) ? ' SELECTED' : '');
$parse['ally_request_notallow_1'] = ((!$ally['ally_request_notallow']) ? ' SELECTED' : '');
$parse['ally_owner_range'] = htmlspecialchars($ally['ally_owner_range']);
$parse['hideNotOwner'] = $ally['ally_owner'] != $user['id'] ? ' style="hide"' : '';

unset($tmp);
foreach($ranks as $rankID => $rank)
{
  if($rank['admin'])
  {
    $tmp .= "`ally_rank_id` = {$rankID} OR ";
  }
}
$tmp = substr($tmp, 0, -4);

if(!empty($tmp))
{
  $userAllyAdmins = doquery("SELECT `id`, `username` FROM {{users}} WHERE ({$tmp}) AND `ally_id` = {$ally['id']};");
  unset($tmp);
  while ($userAllyAdmin = mysql_fetch_assoc($userAllyAdmins))
  {
    $tmp .= "<option value={$userAllyAdmin['id']}>{$userAllyAdmin['username']}</option>";
  }

  $parse['adminMembers'] = $tmp;
}

$template = gettemplate('ali_admin', true);

$sn_ali_admin_actions = isset($sn_ali_admin_actions) ? $sn_ali_admin_actions : array();
$sn_ali_admin_actions = array_merge($sn_ali_admin_actions, array(
//  'members' => 'members_admin',
  'rights' => 'ali_adm_rights_title',
));

foreach($sn_ali_admin_actions as $sn_ali_admin_action => $sn_ali_admin_action_locale)
{
  $template->assign_block_vars('admin_actions', array(
    'ACTION' => $sn_ali_admin_action,
    'LOCALE' => $lang[$sn_ali_admin_action_locale],
  ));
}

display(parsetemplate($template, $parse), $lang['ally_admin']);

?>
