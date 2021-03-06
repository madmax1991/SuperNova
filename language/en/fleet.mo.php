<?php

/*
#############################################################################
#  Filename: fleet.mo
#  Project: SuperNova.WS
#  Website: http://www.supernova.ws
#  Description: Massive Multiplayer Online Browser Space Startegy Game
#
#  Copyright © 2011 madmax1991 for Project "SuperNova.WS"
#  Copyright © 2009 Gorlum for Project "SuperNova.WS"
#  Copyright © 2008 Aleksandar Spasojevic <spalekg@gmail.com>
#  Copyright © 2005 - 2008 KGsystem
#############################################################################
*/

/**
*
* @package language
* @system [English]
* @version 34a15
*
*/

/**
* DO NOT CHANGE
*/

if (!defined('INSIDE')) die();


$lang = array_merge($lang, array(
  'flt_page2_title' => 'Mission selection',
  'fl_title' => 'Fleets',
  'fl_expttl' => 'Expedition',
  'fl_mission' => 'Mission',
  'fl_count' => 'Number of',
  'fl_count_short' => 'Quantity of',
  'fl_from' => 'From',
  'fl_from_t' => 'Return',
  'fl_start_t' => 'Time',
  'fl_dest' => 'Where',
  'fl_dest_t' => 'Arrival',
  'fl_back_t' => 'Return',
  'fl_back_in' => 'Left',
  'fl_order' => 'Order',
  'fl_get_to' => '(T)',
  'fl_get_to_ttl' => 'Roundtrip',
  'fl_back_to' => '(O)',
  'fl_back_to_ttl' => 'Back',
  'fl_associate' => 'Combat Union',
  'fl_noslotfree' => 'No fleet slots!',
  'fl_notback' => 'Fleet cannot return!',
  'fl_onlyyours' => 'You can only return your fleets!',
  'fl_isback' => 'Fleet returns',
  'fl_sback' => 'Ago',
  'fl_error' => 'Error',
  'fl_new_miss' => 'New task: choose ships',
  'fl_fleet_typ' => 'Ship type',
  'fl_fleet_disp' => 'Number of',
  'fl_noplanetrow' => 'System error is! ))',
  'fl_fleetspeed' => 'Speed: ',
  'fl_selmax' => 'Max.',
  'fl_sur' => 'from',
  'fl_continue' => 'Further',
  'fl_noships' => 'No ships orbiting the planet',
  'fl_unselectall' => 'unselect all',
  'fl_selectall' => 'Select all',
  'fl_orbiting' => 'In orbit',
  'fl_to_fly' => 'Send',
  'fl_no_flying_fleets' => 'No Fleets out',
  'fl_floten1_ttl' => 'Fleet destination',
  'fl_noenought' => 'Little ships!',
  'fl_speed' => 'Speed',
  'fl_planet' => 'Planet',
  'fl_ruins' => 'Field debris',
  'fl_moon' => 'Moon',
  'fl_dist' => 'Distance',
  'fl_fltime' => 'Duration(one way)',
  'fl_time_go' => 'Sent (time)',
  'fl_time_back' => 'Return (time)',
  'fl_deute_need' => 'Fuel consumption',
  'fl_speed_max' => 'Maximum speed',
  'fl_shortcut' => 'Shortcut',
  'fl_shortlnk' => 'Edit shortcuts',
  'fl_shrtcup1' => '(P)',
  'fl_shrtcup2' => '(O)',
  'fl_shrtcup3' => '(L)',
  'fl_planettype1' => 'Planet',
  'fl_planettype2' => 'Field debris',
  'fl_planettype3' => 'Moon',
  'fl_myplanets' => 'Planet(s)',
  'fl_nocolonies' => 'No Planets',
  'fl_noacss' => 'No Combat Unions',
  'fl_grattack' => 'Military Alliances',
  'fl_allressources' => 'All resource',
  'fl_space_left' => 'Space left',
  'fl_attack_error' => array(
    ATTACK_ALLOWED => 'Fleet sent successfully',
    ATTACK_NO_TARGET => 'The specified destination does not exist',
    ATTACK_OWN => 'cannnot attack own planet',
    ATTACK_WRONG_MISSION => 'The task cannot be performed in the specified destination',
    ATTACK_NO_ALLY_DEPOSIT => 'No alliance depot on planet',
    ATTACK_NO_DEBRIS => 'No debris field here',
    ATTACK_VACATION => 'You cannot attack a player in Vacation Mode',
    ATTACK_SAME_IP => 'Cannot trade with players with same IP!<br>Interaction with players with the same IP could be banned',
    ATTACK_BUFFING => 'Injection - transfer of resources from weak to strong player - is forbidden by the rules',
    ATTACK_ADMIN => 'You cannot attack the administrator',
    ATTACK_NOOB => 'This player is too weak for you.',
    ATTACK_OWN_VACATION => 'You are in Vacation Mode',
    ATTACK_NO_SILO => 'Too low of missile silo',
    ATTACK_NO_MISSILE => 'You cannot attack without missiles',
    ATTACK_NO_FLEET => 'No fleet selected',
    ATTACK_NO_SLOTS => 'No fleet slots',
    ATTACK_NO_SHIPS => 'No ships',
    ATTACK_NO_RECYCLERS => 'No recyclers',
    ATTACK_NO_SPIES => 'No spy probes',
    ATTACK_NO_COLONIZER => 'No colonyship',
    ATTACK_MISSILE_TOO_FAR => 'Your missiles cannot reach this far',
    ATTACK_WRONG_STRUCTURE => 'You can only attack defence structures',
    ATTACK_NO_FUEL => 'Not enough fuel to launch fleet',
    ATTACK_NO_RESOURCES => 'There is not enough resources for transport',
    ATTACK_NO_ACS => 'No ACS',
    ATTACK_ACS_MISSTARGET => 'Does not match the destination and the purpose of ACS',
    ATTACK_WRONG_SPEED => 'Incorrect speed',
    ATTACK_ACS_TOO_LATE => 'Fleet to slow - it will not catch with the Group ACS',
    ATTACK_BASHING => 'Bashing protection. Number of allowed attacks per day per planet already reached',
    ATTACK_BASHING_WAR_DELAY => 'Bashing protection. War to this Alliance already declared but did not started yet. Look at your Alliance page to see war begin date',
    ATTACK_ACS_WRONG_TARGET => 'Fleet destination did not equal to ACS destination',
    ATTACK_SAME => 'Source and destination planets are a same',
    ATTACK_RESOURCE_FORBIDDEN => 'It is not allowed to send fleet with resources in this mission',
    ATTACK_TRANSPORT_EMPTY => 'It is not allowed to send empty fleet to transport mission',
  ),

  'fl_fleet_err' => 'Error!',
  'fl_unknow_target' => '<li>The specified destination does not exist!</li>',
  'fl_nodebris' => '<li>No Debris!</li>',
  'fl_nomoon' => '<li>The moon does not exist!</li>',
  'fl_vacation_ttl' => 'Vacation Mode',
  'fl_vacation_pla' => 'Player is in Vacation!',
  'fl_noob_title' => 'Newbie protection',
  'fl_noob_mess_n' => 'The player is too low for you to attack!',
  'fl_bad_planet01' => '<li>This planet is already colonized!</li>',
  'fl_colonized' => '<li>Planet colonized by!</li>',
  'fl_dont_stay_here' => 'You cannot land on the enemy planet!',
  'fl_no_allydeposit' => 'No alliance depot on the planet!',
  'fl_no_self_attack' => '<li>You cannot attack your own planet!</li>',
  'fl_no_self_spy' => '<li>You cannot spy on your own planet!</li>',
  'fl_only_stay_at_home' => '<li>You cannot relocate to another players planet!</li>',
  'fl_cheat_speed' => 'Trying to cheat! Administration has been messaged!',
  'fl_cheat_origine' => 'Trying to cheat! Administration has been messaged!',
  'fl_limit_planet' => '<li>Bad planet !</li>',
  'fl_limit_system' => '<li>Incorrect system !</li>',
  'fl_limit_galaxy' => '<li>Irregular galaxy !</li>',
  'fl_ownpl_err' => '<li>You cannot attack a planet!</li>',
  'fl_no_planet_type' => '<li>Incorrect point designation!</li>',
  'fl_fleet_err_pl' => '<li>Planets destination is buged!</li>',
  'fl_bad_mission' => '<li>Setting is not specified or specified Mission is impossible!</li>',
  'fl_no_fleetarray' => '<li>Something wrong with the fleet!</li>',
  'fl_noenoughtgoods' => '<li>Attempt to send empty fleet on a mission &quot;Transport&quot;!</li>',
  'fl_expe_notech' => '<li>Fleet was not sent, no Astrophysics Technology!</li>',
  'fl_expe_max' => '<li>You cannot send another expedition. Develop Astrophysics technology</li>',
  'fl_no_deuterium' => 'Not enough deuterium! ',
  'fl_no_resources' => 'Not enough resources!',
  'fl_nostoragespa' => 'Not enough storeage space! ',
  'fl_fleet_send' => 'Fleet sent',
  'fl_expe_warning' => 'Attention, you may lose ships during the expedition!',
  'fl_expe_staytime' => 'holding time',
  'fl_expe_hours' => 'hours',
  'fl_adm_attak' => 'You cannot attack the Administrator',
  'fl_warning' => 'Warning',
  'fl_page0_hint' => '<ul><li>To create, edit, and remove something  &quot;shortcut&quot; in the left menu<li>What would join the war with the alliance, please click on the title of any available you union</ul>',
  'fl_page1_hint' => '<ul><li>Flight time includes the time for takeoff/landing fleet binding component of any flight,how near or far &quot;shortcut&quot; in the left menu <li>What would join the war with the alliance, please click on the title of any available you union</ul>',
  'fl_page5_hint' => '<ul>  <li>Check in lines colonies types of resources you want to consolidate the current planet.  <li>A check mark in the title bar allows you to place or remove flags for the specified type resources on all colonies.  <li>Checkboxes in the column to select or clear check for all resources in the colony.  <li>Checkboxes in the column TOTAL for ease of interface and <span class="negative">HAVE NO EFFECT</span> of the set of svozimyh resources  <li>Transportation resources are involved only transport ships: small transport, a large transport and Supertransport  <li>Vessels are loaded in descending size hold</ul>',
  'fl_err_no_ships' => 'No ships In the fleet. Return to the previous page and select the ships for the fleet',
  'fl_shrtcup' => array(
    PT_PLANET => '(P)',
    PT_DEBRIS => '(O)',
    PT_MOON => '(L)',
  ),

  'fl_planettype' => array(
    PT_PLANET => 'Planet',
    PT_DEBRIS => 'Field debris',
    PT_MOON => 'Moon',
  ),

  'fl_aks_invite_message_header' => 'Invitation to ACS',
  'fl_aks_invite_message' => '<font color="red">Player %s has invited you to join the ACS. you can join the ACS in the page &quot;Fleet&quot;.</font>',
  'fl_aks_player_invited' => '<font color="lime">Player %s was invited to joint attack.</font>',
  'fl_aks_player_invited_already' => '<font color="lime">Player %s already invited. Repeated invitations sent</font>',
  'fl_aks_player_error' => '<font color="red">Error. Player %s was not found.</font>',
  'fl_aks_already_in_aks' => 'Fleet in the battle group!',
  'fl_aks_adding_error' => 'Error adding party to fleet:<br>%s',
  'fl_aks_hack_wrong_fleet' => 'Hacking attempt! Manipulation of the alien fleet Message sent to Administrator!',
  'fl_aks_too_slow' => 'Fleet is too slow and could not join the war Union',
  'fl_fleet_not_exists' => 'The fleet was not found',
  'fl_multi_ip_protection' => 'Protection against multi-accounts!<br>Unable to send resources to the player with same IP!',
  'fl_load_cargo' => 'Storage',
  'fl_rest_on_planet' => 'Balance',
  'fl_none_resources' => 'Reset',
  'fl_planet_resources' => 'Resources on the planet',
  'fl_fleet_data' => 'Current fleet',
  'flt_gather_report' => 'Gathering Report',
  'flt_report' => 'Report',
  'flt_no_transports' => 'No transports',
  'flt_no_fuel' => 'No fuel',
  'fl_id' => '№',
  'fl_ressources' => 'Resources',

  'fl_fuel_on_planet' => 'Fuel on planet',

));

?>
