<?php

/**
 * vars.php
 *
 * @version 1.0
 * @copyright 2008 by Chlorel for XNova
 */

if (!defined('INSIDE'))
{
  die('Hack attempt!');
}

  $sn_menu_extra = array();

  $sn_version_check_class = array(
    SNC_VER_NEVER => 'warning',

    SNC_VER_ERROR_CONNECT => 'error',
    SNC_VER_ERROR_SERVER => 'error',

    SNC_VER_EXACT => 'ok',
    SNC_VER_LESS => 'notice',
    SNC_VER_FUTURE => 'error',

    SNC_VER_RELEASE_EXACT => 'ok',
    SNC_VER_RELEASE_MINOR => 'notice',
    SNC_VER_RELEASE_MAJOR => 'warning',
    SNC_VER_RELEASE_ALPHA => 'ok',

    SNC_VER_MAINTENANCE => 'notice',
    SNC_VER_UNKNOWN_RESPONSE => 'warning',
    SNC_VER_INVALID => 'error',
    SNC_VER_STRANGE => 'error',

    SNC_VER_REGISTER_UNREGISTERED => 'warning',
    SNC_VER_REGISTER_ERROR_MULTISERVER => 'error',
    SNC_VER_REGISTER_ERROR_REGISTERED => 'error',
    SNC_VER_REGISTER_ERROR_NO_NAME => 'error',
    SNC_VER_REGISTER_ERROR_WRONG_URL => 'error',
    SNC_VER_REGISTER_REGISTERED => 'ok',

    SNC_VER_ERROR_INCOMPLETE_REQUEST => 'error',
    SNC_VER_ERROR_UNKNOWN_KEY => 'error',
    SNC_VER_ERROR_MISSMATCH_KEY_ID => 'error',
  );

  $tableList = array( 'aks', 'alliance', 'alliance_requests', 'announce', 'annonce', 'banned', 'buddy', 'chat', 'config', 'counter',
    'errors', 'fleets', 'fleet_log', 'galaxy', 'iraks', 'logs', 'log_dark_matter', 'messages', 'notes', 'planets', 'quest',
    'quest_status', 'referrals', 'rw', 'statpoints', 'users'
  );

  $functions = array(
//    'test' => 'sn_test',
  );

  $sn_message_class_list = array(
     MSG_TYPE_NEW => array(
       'name' => 'new_message',
       'switchable' => false,
       'email' => false,
     ),
     MSG_TYPE_ADMIN => array(
       'name' => 'msg_admin',
       'switchable' => false,
       'email' => true,
     ),
     MSG_TYPE_PLAYER => array(
       'name' => 'mnl_joueur',
       'switchable' => false,
       'email' => true,
     ),
     MSG_TYPE_ALLIANCE => array(
       'name' => 'mnl_alliance',
       'switchable' => false,
       'email' => true,
     ),
     MSG_TYPE_SPY => array(
       'name' => 'mnl_spy',
       'switchable' => true,
       'email' => true,
     ),
     MSG_TYPE_COMBAT => array(
       'name' => 'mnl_attaque',
       'switchable' => true,
       'email' => true,
     ),
     MSG_TYPE_TRANSPORT => array(
       'name' => 'mnl_transport',
       'switchable' => true,
       'email' => true,
     ),
     MSG_TYPE_RECYCLE => array(
       'name' => 'mnl_exploit',
       'switchable' => true,
       'email' => true,
     ),
     MSG_TYPE_EXPLORE => array(
       'name' => 'mnl_expedition',
       'switchable' => true,
       'email' => true,
     ),
     //     97 => 'mnl_general',
     MSG_TYPE_QUE => array(
       'name' => 'mnl_buildlist',
       'switchable' => true,
       'email' => true,
     ),
     MSG_TYPE_OUTBOX => array(
       'name' => 'mnl_outbox',
       'switchable' => false,
       'email' => false,
     ),
  );

  $sn_message_groups = array(
    'switchable' => array(MSG_TYPE_SPY, MSG_TYPE_COMBAT, MSG_TYPE_RECYCLE, MSG_TYPE_TRANSPORT, MSG_TYPE_EXPLORE, MSG_TYPE_QUE),
    'email' => array(MSG_TYPE_SPY, MSG_TYPE_PLAYER, MSG_TYPE_ALLIANCE, MSG_TYPE_COMBAT, MSG_TYPE_RECYCLE, MSG_TYPE_TRANSPORT,
      MSG_TYPE_ADMIN, MSG_TYPE_EXPLORE, MSG_TYPE_QUE),
  );

  // Default user option list as 'option_name' => 'option_list'
  $user_option_list = array();

  $user_option_list[OPT_MESSAGE] = array();
  foreach($sn_message_class_list as $message_class_id => $message_class_data)
  {
    if($message_class_data['switchable'])
    {
      $user_option_list[OPT_MESSAGE]["opt_{$message_class_data['name']}"] = 1;
    }

    if($message_class_data['email'])
    {
      $user_option_list[OPT_MESSAGE]["opt_email_{$message_class_data['name']}"] = 0;
    }
  }

  $user_option_list[OPT_UNIVERSE] = array(
    'opt_uni_avatar_user' => 1,
    'opt_uni_avatar_ally' => 1,
  );

  $user_option_list[OPT_INTERFACE] = array(
    'opt_int_struc_vertical' => 0,
    'opt_int_navbar_resource_force' => 0,
    'opt_int_overview_planet_columns' => 0,
    'opt_int_overview_planet_rows' => 5,
  );

  $user_option_types = array(
    'opt_int_overview_planet_columns' => 'integer',
    'opt_int_overview_planet_rows' => 'integer',
  );
/*
  foreach($sn_message_groups['switchable'] as $option_id)
  {
    $user_option_list[OPT_MESSAGE]["opt_{$sn_message_class_list[$option_id]['name']}"] = 1;
  }
*/
  $sn_diplomacy_relation_list = array(
    ALLY_DIPLOMACY_NEUTRAL       => array(
      'relation_id' => ALLY_DIPLOMACY_NEUTRAL,
      'enter_delay' => 0,
      'exit_delay'  => 0,
    ),
    ALLY_DIPLOMACY_WAR           => array(
      'relation_id' => ALLY_DIPLOMACY_WAR,
      'enter_delay' => $config->fleet_bashing_war_delay,
      'exit_delay'  => -1,
    ),
    ALLY_DIPLOMACY_PEACE         => array(
      'relation_id' => ALLY_DIPLOMACY_PEACE,
      'enter_delay' => -1,
      'exit_delay'  => 0,
    ),
    /*
    ALLY_DIPLOMACY_CONFEDERATION => array(
      'relation_id' => ALLY_DIPLOMACY_CONFEDERATION,
      'enter_delay' => -1,
      'exit_delay'  => $config->fleet_bashing_war_delay,
    ),
    ALLY_DIPLOMACY_FEDERATION    => array(
      'relation_id' => ALLY_DIPLOMACY_FEDERATION,
      'enter_delay' => -1,
      'exit_delay'  => $config->fleet_bashing_war_delay,
    ),
    ALLY_DIPLOMACY_UNION         => array(
      'relation_id' => ALLY_DIPLOMACY_UNION,
      'enter_delay' => -1,
      'exit_delay'  => $config->fleet_bashing_war_delay,
    ),
    ALLY_DIPLOMACY_MASTER        => array(
      'relation_id' => ALLY_DIPLOMACY_MASTER,
      'enter_delay' => -1,
      'exit_delay'  => 0,
    ),
    ALLY_DIPLOMACY_SLAVE         => array(
      'relation_id' => ALLY_DIPLOMACY_SLAVE,
      'enter_delay' => -1,
      'exit_delay'  => $config->fleet_bashing_war_delay,
    )
    */
  );

  // factor -> price_factor, perhour_factor
  $sn_data = array(
    STRUC_MINE_METAL => array(
      'name' => 'metal_mine',
      'type' => UNIT_STRUCTURE,
      'location' => LOC_PLANET,
      'cost' => array(
        RES_METAL     => 80,
        RES_CRYSTAL   => 20,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 1.5,
      ),
      'metal' => 80,
      'crystal' => 20,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 1.5,
      'production' => array(
        RES_METAL     => create_function ('$level, $production_factor, $temperature', 'return  40 * $level * pow(1.1, $level) * (0.1 * $production_factor);'),
        RES_CRYSTAL   => create_function ('$level, $production_factor, $temperature', 'return 0;'),
        RES_DEUTERIUM => create_function ('$level, $production_factor, $temperature', 'return 0;'),
        RES_ENERGY    => create_function ('$level, $production_factor, $temperature', 'return -13 * $level * pow(1.1, $level) * (0.1 * $production_factor);'),
      ),
      'metal_perhour'     => 'return   (40 * $BuildLevel * pow(1.1, $BuildLevel)) * (0.1 * $BuildLevelFactor);',
      'crystal_perhour'   => 'return 0;',
      'deuterium_perhour' => 'return 0;',
      'energy_perhour'    => 'return - (13 * $BuildLevel * pow(1.1, $BuildLevel)) * (0.1 * $BuildLevelFactor);',
    ),

    STRUC_MINE_CRYSTAL => array(
      'name' => 'crystal_mine',
      'type' => UNIT_STRUCTURE,
      'location' => LOC_PLANET,
      'cost' => array(
        RES_METAL     => 48,
        RES_CRYSTAL   => 24,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 1.6,
      ),
      'metal' => 48,
      'crystal' => 24,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 1.6,
      'production' => array(
        RES_METAL     => create_function ('$level, $production_factor, $temperature', 'return 0;'),
        RES_CRYSTAL   => create_function ('$level, $production_factor, $temperature', 'return  32 * $level * pow(1.1, $level) * (0.1 * $production_factor);'),
        RES_DEUTERIUM => create_function ('$level, $production_factor, $temperature', 'return 0;'),
        RES_ENERGY    => create_function ('$level, $production_factor, $temperature', 'return -16 * $level * pow(1.1, $level) * (0.1 * $production_factor);'),
      ),
      'metal_perhour'     => 'return 0;',
      'crystal_perhour'   => 'return   (32 * $BuildLevel * pow(1.1, $BuildLevel)) * (0.1 * $BuildLevelFactor);',
      'deuterium_perhour' => 'return 0;',
      'energy_perhour'    => 'return - (16 * $BuildLevel * pow(1.1, $BuildLevel)) * (0.1 * $BuildLevelFactor);',
    ),

    STRUC_MINE_DEUTERIUM => array(
      'name' => 'deuterium_sintetizer',
      'type' => UNIT_STRUCTURE,
      'location' => LOC_PLANET,
      'cost' => array(
        RES_METAL     => 225,
        RES_CRYSTAL   => 75,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 1.5,
      ),
      'metal' => 225,
      'crystal' => 75,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 1.5,
      'production' => array(
        RES_METAL     => create_function ('$level, $production_factor, $temperature', 'return 0;'),
        RES_CRYSTAL   => create_function ('$level, $production_factor, $temperature', 'return 0;'),
        RES_DEUTERIUM => create_function ('$level, $production_factor, $temperature', 'return  10 * $level * pow(1.1, $level) * (0.1 * $production_factor) * (-0.002 * $temperature + 1.28);'),
        RES_ENERGY    => create_function ('$level, $production_factor, $temperature', 'return -20 * $level * pow(1.1, $level) * (0.1 * $production_factor);'),
      ),
      'metal_perhour'     => 'return 0;',
      'crystal_perhour'   => 'return 0;',
      'deuterium_perhour' => 'return  ((10 * $BuildLevel * pow(1.1, $BuildLevel)) * (0.1 * $BuildLevelFactor) * (-0.002 * $BuildTemp + 1.28));',
      'energy_perhour'    => 'return - (20 * $BuildLevel * pow(1.1, $BuildLevel)) * (0.1 * $BuildLevelFactor);',
    ),

    STRUC_MINE_SOLAR => array(
      'name' => 'solar_plant',
      'type' => UNIT_STRUCTURE,
      'location' => LOC_PLANET,
      'cost' => array(
        RES_METAL     => 75,
        RES_CRYSTAL   => 30,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 1.5,
      ),
      'metal' => 75,
      'crystal' => 30,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 1.5,
      'production' => array(
        RES_METAL     => create_function ('$level, $production_factor, $temperature', 'return 0;'),
        RES_CRYSTAL   => create_function ('$level, $production_factor, $temperature', 'return 0;'),
        RES_DEUTERIUM => create_function ('$level, $production_factor, $temperature', 'return 0;'),
        RES_ENERGY    => create_function ('$level, $production_factor, $temperature', 'return  ($temperature / 5 + 15) * $level * pow(1.1, $level) * (0.1 * $production_factor);'),
      ),
      'metal_perhour'     => 'return 0;',
      'crystal_perhour'   => 'return 0;',
      'deuterium_perhour' => 'return 0;',
      'energy_perhour'    => 'return   (($BuildTemp / 5 + 15) * $BuildLevel * pow(1.1, $BuildLevel)) * (0.1 * $BuildLevelFactor);',
    ),

    STRUC_MINE_FUSION => array(
      'name' => 'fusion_plant',
      'type' => UNIT_STRUCTURE,
      'location' => LOC_PLANET,
      'require' => array(3 => 5, TECH_ENERGY => 3, UNIT_PLAN_STRUC_MINE_FUSION => 1),
      'cost' => array(
        RES_METAL     => 900,
        RES_CRYSTAL   => 360,
        RES_DEUTERIUM => 180,
        RES_ENERGY    => 0,
        'factor' => 1.8,
      ),
      'metal' => 900,
      'crystal' => 360,
      'deuterium' => 180,
      'energy' => 0,
      'factor' => 1.8,
      'production' => array(
        RES_METAL     => create_function ('$level, $production_factor, $temperature', 'return 0;'),
        RES_CRYSTAL   => create_function ('$level, $production_factor, $temperature', 'return 0;'),
        RES_DEUTERIUM => create_function ('$level, $production_factor, $temperature', 'return -10 * $level * pow(1.1, $level) * (0.1 * $production_factor);'),
        RES_ENERGY    => create_function ('$level, $production_factor, $temperature', 'return  30 * $level * pow(1.05 + 0.01 * $GLOBALS["user_tech_energy"], $level) * (0.1 * $production_factor);'),
      ),
      'metal_perhour'     => 'return 0;',
      'crystal_perhour'   => 'return 0;',
      'deuterium_perhour' => 'return - (10 * $BuildLevel * pow(1.1, $BuildLevel)) * (0.1 * $BuildLevelFactor);',
      'energy_perhour'    => 'return   (30 * $BuildLevel * pow(1.05 + 0.01 * $BuildEnergyTech, $BuildLevel)) * (0.1 * $BuildLevelFactor);',
    ),

    STRUC_FACTORY_ROBOT => array(
      'name' => 'robot_factory',
      'type' => UNIT_STRUCTURE,
      'location' => LOC_PLANET,
      'cost' => array(
        RES_METAL     => 400,
        RES_CRYSTAL   => 120,
        RES_DEUTERIUM => 200,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 400,
      'crystal' => 120,
      'deuterium' => 200,
      'energy' => 0,
      'factor' => 2,
    ),

    STRUC_FACTORY_NANO => array(
      'name' => 'nano_factory',
      'type' => UNIT_STRUCTURE,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_ROBOT => 10, TECH_COMPUTER => 10),
      'cost' => array(
        RES_METAL     => 1000000,
        RES_CRYSTAL   => 500000,
        RES_DEUTERIUM => 100000,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 1000000,
      'crystal' => 500000,
      'deuterium' => 100000,
      'energy' => 0,
      'factor' => 2,
    ),

    STRUC_FACTORY_HANGAR => array(
      'name' => 'hangar',
      'type' => UNIT_STRUCTURE,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_ROBOT => 2),
      'cost' => array(
        RES_METAL     => 400,
        RES_CRYSTAL   => 200,
        RES_DEUTERIUM => 100,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 400,
      'crystal' => 200,
      'deuterium' => 100,
      'energy' => 0,
      'factor' => 2,
    ),

    STRUC_STORE_METAL => array(
      'name' => 'metal_store',
      'type' => UNIT_STRUCTURE,
      'location' => LOC_PLANET,
      'cost' => array(
        RES_METAL     => 2000,
        RES_CRYSTAL   => 0,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 2000,
      'crystal' => 0,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 2,
    ),

    STRUC_STORE_CRYSTAL => array(
      'name' => 'crystal_store',
      'type' => UNIT_STRUCTURE,
      'location' => LOC_PLANET,
      'cost' => array(
        RES_METAL     => 2000,
        RES_CRYSTAL   => 1000,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 2000,
      'crystal' => 1000,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 2,
    ),

    STRUC_STORE_DEUTERIUM => array(
      'name' => 'deuterium_store',
      'location' => LOC_PLANET,
      'cost' => array(
        RES_METAL     => 2000,
        RES_CRYSTAL   => 2000,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 2000,
      'crystal' => 2000,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 2,
      'type' => UNIT_STRUCTURE,
    ),

    STRUC_LABORATORY => array(
      'name' => 'laboratory',
      'type' => UNIT_STRUCTURE,
      'location' => LOC_PLANET,
      'cost' => array(
        RES_METAL     => 200,
        RES_CRYSTAL   => 400,
        RES_DEUTERIUM => 200,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 200,
      'crystal' => 400,
      'deuterium' => 200,
      'energy' => 0,
      'factor' => 2,
    ),

    STRUC_TERRAFORMER => array(
      'name' => 'terraformer',
      'type' => UNIT_STRUCTURE,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_NANO => 1, TECH_ENERGY => 12),
      'cost' => array(
        RES_METAL     => 0,
        RES_CRYSTAL   => 50000,
        RES_DEUTERIUM => 100000,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 0,
      'crystal' => 50000,
      'deuterium' => 100000,
      'energy' => 0,
      'factor' => 2,
    ),

    STRUC_ALLY_DEPOSIT => array(
      'name' => 'ally_deposit',
      'type' => UNIT_STRUCTURE,
      'location' => LOC_PLANET,
      'cost' => array(
        RES_METAL     => 20000,
        RES_CRYSTAL   => 40000,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 20000,
      'crystal' => 40000,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 2,
    ),

    STRUC_LABORATORY_NANO => array(
      'name' => 'nano',
      'type' => UNIT_STRUCTURE,
      'location' => LOC_PLANET,
      'require' => array(STRUC_LABORATORY => 10, TECH_ENERGY => 10),
      'cost' => array(
        RES_METAL     => 1500000,
        RES_CRYSTAL   => 750000,
        RES_DEUTERIUM => 150000,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 1500000,
      'crystal' => 750000,
      'deuterium' => 150000,
      'energy' => 0,
      'factor' => 2,
    ),

    STRUC_MOON_STATION => array(
      'name' => 'mondbasis',
      'type' => UNIT_STRUCTURE,
      'location' => LOC_PLANET,
      'cost' => array(
        RES_METAL     => 20000,
        RES_CRYSTAL   => 40000,
        RES_DEUTERIUM => 20000,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 20000,
      'crystal' => 40000,
      'deuterium' => 20000,
      'energy' => 0,
      'factor' => 2,
    ),

    STRUC_MOON_PHALANX => array(
      'name' => 'phalanx',
      'type' => UNIT_STRUCTURE,
      'location' => LOC_PLANET,
      'require' => array(STRUC_MOON_STATION => 1),
      'cost' => array(
        RES_METAL     => 20000,
        RES_CRYSTAL   => 40000,
        RES_DEUTERIUM => 20000,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 20000,
      'crystal' => 40000,
      'deuterium' => 20000,
      'energy' => 0,
      'factor' => 2,
    ),

    STRUC_MOON_GATE => array(
      'name' => 'sprungtor',
      'type' => UNIT_STRUCTURE,
      'location' => LOC_PLANET,
      'require' => array(STRUC_MOON_STATION => 1, TECH_HYPERSPACE => 7),
      'cost' => array(
        RES_METAL     => 2000000,
        RES_CRYSTAL   => 4000000,
        RES_DEUTERIUM => 2000000,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 2000000,
      'crystal' => 4000000,
      'deuterium' => 2000000,
      'energy' => 0,
      'factor' => 2,
    ),

    STRUC_SILO => array(
      'name' => 'silo',
      'type' => UNIT_STRUCTURE,
      'location' => LOC_PLANET,
      'require' => array(TECH_ENIGNE_ION => 1),
      'cost' => array(
        RES_METAL     => 20000,
        RES_CRYSTAL   => 20000,
        RES_DEUTERIUM => 1000,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 20000,
      'crystal' => 20000,
      'deuterium' => 1000,
      'energy' => 0,
      'factor' => 2,
      'capacity' => 12,
    ),

    SHIP_CARGO_SMALL => array(
      'name' => 'small_ship_cargo',
      'type' => UNIT_SHIPS,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 2, TECH_ENGINE_CHEMICAL => 2),
      'cost' => array(
        RES_METAL     => 2000,
        RES_CRYSTAL   => 2000,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 2000,
      'crystal' => 2000,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 1,
      'capacity' => 5000,
      'engine' => array(
        array(
          'tech' => TECH_ENGINE_CHEMICAL,
          'speed' => 5000,
          'consumption' => 20,
          'min_level' => 2,
        ),
        array(
          'tech' => TECH_ENIGNE_ION,
          'speed' => 10000,
          'consumption' => 40,
          'min_level' => 5,
        ),
      ),
      'tech' => TECH_ENGINE_CHEMICAL,
      'speed' => 5000,
      'consumption' => 20,
      'tech_level' => 5,
      'tech2' => TECH_ENIGNE_ION,
      'speed2' => 10000,
      'consumption2' => 40,
      'shield' => 10,
      'attack' => 5,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 5, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 100, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 250, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'armor' => 400,
      'stackable' => true,
    ),

    SHIP_CARGO_BIG => array(
      'name' => 'big_ship_cargo',
      'type' => UNIT_SHIPS,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 4, TECH_ENGINE_CHEMICAL => 6),
      'cost' => array(
        RES_METAL     => 6000,
        RES_CRYSTAL   => 6000,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 6000,
      'crystal' => 6000,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 1,
      'capacity' => 25000,
      'engine' => array(
        array(
          'tech' => TECH_ENGINE_CHEMICAL,
          'speed' => 7500,
          'consumption' => 50,
          'min_level' => 6,
        ),
      ),
      'tech' => TECH_ENGINE_CHEMICAL,
      'speed' => 7500,
      'consumption' => 50,
      'shield' => 25,
      'attack' => 5,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 5, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 100, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 250, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'armor' => 1200,
      'stackable' => true,
    ),

    SHIP_CARGO_SUPER => array(
      'name' => 'supercargo',
      'type' => UNIT_SHIPS,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 8, TECH_ENIGNE_ION => 5, UNIT_PLAN_SHIP_CARGO_SUPER => 1),
      'cost' => array(
        RES_METAL     => 25000,
        RES_CRYSTAL   => 15000,
        RES_DEUTERIUM => 5000,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 25000,
      'crystal' => 15000,
      'deuterium' => 5000,
      'energy' => 0,
      'factor' => 1,
      'capacity' => 100000,
      'engine' => array(
        array(
          'tech' => TECH_ENIGNE_ION,
          'speed' => 5000,
          'consumption' => 100,
          'min_level' => 5,
        ),
      ),
      'tech' => TECH_ENIGNE_ION,
      'speed' => 5000,
      'consumption' => 100,
      'shield' => 50,
      'attack' => 10,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 5, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 100, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 250, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'armor' => 3000,
      'stackable' => true,
    ),

    SHIP_CARGO_HYPER => array(
      'name' => 'planet_cargo_hyper',
      'type' => UNIT_SHIPS,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 10, TECH_ENGINE_HYPER => 5, UNIT_PLAN_SHIP_CARGO_HYPER => 1),
      'cost' => array(
        RES_METAL     => 500000,
        RES_CRYSTAL   => 200000,
        RES_DEUTERIUM => 100000,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' =>     500000,
      'crystal' =>   200000,
      'deuterium' => 100000,
      'energy' => 0,
      'factor' => 1,
      'capacity' => 1000000,
      'engine' => array(
        array(
          'tech' => TECH_ENGINE_HYPER,
          'speed' => 2000,
          'consumption' => 1000,
          'min_level' => 5,
        ),
      ),
      'tech' => TECH_ENGINE_HYPER,
      'speed' => 2000,
      'consumption' => 1000,
      'shield' => 200,
      'attack' => 50,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 5, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 100, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 250, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'armor' => 70000,
      'stackable' => true,
    ),

    SHIP_FIGHTER_LIGHT => array(
      'name' => 'light_hunter',
      'type' => UNIT_SHIPS,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 1, TECH_ENGINE_CHEMICAL => 1),
      'cost' => array(
        RES_METAL     => 3000,
        RES_CRYSTAL   => 1000,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 3000,
      'crystal' => 1000,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 1,
      'capacity' => 50,
      'engine' => array(
        array(
          'tech' => TECH_ENGINE_CHEMICAL,
          'speed' => 12500,
          'consumption' => 20,
          'min_level' => 1,
        ),
      ),
      'tech' => TECH_ENGINE_CHEMICAL,
      'speed' => 12500,
      'consumption' => 20,
      'shield' => 10,
      'attack' => 50,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 2, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 5, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 16.4, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 10.001, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 21, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'armor' => 400,
      'stackable' => true,
    ),

    SHIP_FIGHTER_HEAVY => array(
      'name' => 'heavy_hunter',
      'type' => UNIT_SHIPS,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 3, TECH_ARMOR => 2, TECH_ENIGNE_ION => 2),
      'cost' => array(
        RES_METAL     => 6000,
        RES_CRYSTAL   => 4000,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 6000,
      'crystal' => 4000,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 1,
      'capacity' => 100,
      'engine' => array(
        array(
          'tech' => TECH_ENIGNE_ION,
          'speed' => 10000,
          'consumption' => 75,
          'min_level' => 2,
        ),
      ),
      'tech' => TECH_ENIGNE_ION,
      'speed' => 10000,
      'consumption' => 75,
      'shield' => 25,
      'attack' => 150,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 3, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 5, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 8.2, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 3.33367, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 7, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'armor' => 1000,
      'stackable' => true,
    ),

    SHIP_DESTROYER => array(
      'name' => 'crusher',
      'type' => UNIT_SHIPS,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 5, TECH_ENIGNE_ION => 4, TECH_ION => 2),
      'cost' => array(
        RES_METAL     => 20000,
        RES_CRYSTAL   => 7000,
        RES_DEUTERIUM => 2000,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 20000,
      'crystal' => 7000,
      'deuterium' => 2000,
      'energy' => 0,
      'factor' => 1,
      'capacity' => 800,
      'engine' => array(
        array(
          'tech' => TECH_ENIGNE_ION,
          'speed' => 15000,
          'consumption' => 300,
          'min_level' => 4,
        ),
      ),
      'tech' => TECH_ENIGNE_ION,
      'speed' => 15000,
      'consumption' => 300,
      'shield' => 50,
      'attack' => 400,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 6, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 5, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 10, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 6.15, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 1.25013, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 2.625, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 5.5, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'armor' => 2700,
      'stackable' => true,
    ),

    SHIP_CRUISER => array(
      'name' => 'battle_ship',
      'type' => UNIT_SHIPS,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 7, TECH_ENGINE_HYPER => 4),
      'cost' => array(
        RES_METAL     => 45000,
        RES_CRYSTAL   => 15000,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 45000,
      'crystal' => 15000,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 1,
      'capacity' => 1500,
      'engine' => array(
        array(
          'tech' => TECH_ENGINE_HYPER,
          'speed' => 10000,
          'consumption' => 500,
          'min_level' => 4,
        ),
      ),
      'tech' => TECH_ENGINE_HYPER,
      'speed' => 10000,
      'consumption' => 500,
      'shield' => 200,
      'attack' => 1000,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 5, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 8, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 0.50005, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 1.05, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1.76, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'armor' => 6000,
      'stackable' => true,
    ),

    SHIP_COLONIZER => array(
      'name' => 'colonizer',
      'type' => UNIT_SHIPS,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 4, TECH_ENIGNE_ION => 3, TECH_COLONIZATION => 2),
      'cost' => array(
        RES_METAL     => 10000,
        RES_CRYSTAL   => 20000,
        RES_DEUTERIUM => 10000,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 10000,
      'crystal' => 20000,
      'deuterium' => 10000,
      'energy' => 0,
      'factor' => 1,
      'capacity' => 7500,
      'engine' => array(
        array(
          'tech' => TECH_ENIGNE_ION,
          'speed' => 2500,
          'consumption' => 1000,
          'min_level' => 3,
        ),
      ),
      'tech' => TECH_ENIGNE_ION,
      'speed' => 2500,
      'consumption' => 1000,
      'shield' => 100,
      'attack' => 50,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 5, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 10.001, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 21, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'armor' => 3000,
      'stackable' => true,
    ),

    SHIP_RECYCLER => array(
      'name' => 'recycler',
      'type' => UNIT_SHIPS,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 4, TECH_ENGINE_CHEMICAL => 6, TECH_SHIELD => 2),
      'cost' => array(
        RES_METAL     => 10000,
        RES_CRYSTAL   => 6000,
        RES_DEUTERIUM => 2000,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 10000,
      'crystal' => 6000,
      'deuterium' => 2000,
      'energy' => 0,
      'factor' => 1,
      'capacity' => 20000,
      'engine' => array(
        array(
          'tech' => TECH_ENGINE_CHEMICAL,
          'speed' => 2000,
          'consumption' => 300,
          'min_level' => 6,
        ),
      ),
      'tech' => TECH_ENGINE_CHEMICAL,
      'speed' => 2000,
      'consumption' => 300,
      'shield' => 10,
      'attack' => 1,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 5, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 500.05, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 1050, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'armor' => 1600,
      'stackable' => true,
    ),

    SHIP_SPY => array(
      'name' => 'spy_sonde',
      'type' => UNIT_SHIPS,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 3, TECH_ENGINE_CHEMICAL => 3, TECH_SPY => 2),
      'cost' => array(
        RES_METAL     => 0,
        RES_CRYSTAL   => 1000,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 0,
      'crystal' => 1000,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 1,
      'capacity' => 5,
      'engine' => array(
        array(
          'tech' => TECH_ENGINE_CHEMICAL,
          'speed' => 100000000,
          'consumption' => 1,
          'min_level' => 3,
        ),
      ),
      'tech' => TECH_ENGINE_CHEMICAL,
      'speed' => 100000000,
      'consumption' => 1,
      'shield' => 0.01,
      'attack' => 0.01,
      'sd' => array(SHIP_CARGO_HYPER => 1,  SHIP_CARGO_SUPER => 0, SHIP_CARGO_SMALL => 0, SHIP_CARGO_BIG => 0, SHIP_FIGHTER_LIGHT => 0, SHIP_FIGHTER_HEAVY => 0, SHIP_DESTROYER => 0, SHIP_CRUISER => 0, SHIP_COLONIZER => 0, SHIP_RECYCLER => 0, SHIP_SPY => 0, SHIP_BOMBER => 0, SHIP_SATTELITE_SOLAR => 0, SHIP_DESTRUCTOR => 0, SHIP_DEATH_STAR => 0, SHIP_BATTLESHIP => 0, SHIP_SUPERNOVA => 0, 401 => 0, 402 => 0, 403 => 0, 404 => 0, 405 => 0, 406 => 0, 407 => 0, 408 => 0, 409 => 0),
      'amplify' => array(SHIP_CARGO_HYPER => 1,  SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 1, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 1, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'armor' => 100,
      'stackable' => true,
    ),

    SHIP_BOMBER => array(
      'name' => 'bomber_ship',
      'type' => UNIT_SHIPS,
      'location' => LOC_PLANET,
      'require' => array(TECH_ENIGNE_ION => 6, STRUC_FACTORY_HANGAR => 8, TECH_PLASMA => 5),
      'cost' => array(
        RES_METAL     => 50000,
        RES_CRYSTAL   => 25000,
        RES_DEUTERIUM => 15000,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 50000,
      'crystal' => 25000,
      'deuterium' => 15000,
      'energy' => 0,
      'factor' => 1,
      'capacity' => 500,
      'engine' => array(
        array(
          'tech' => TECH_ENIGNE_ION,
          'speed' => 4000,
          'consumption' => 1000,
          'min_level' => 6,
        ),
        array(
          'tech' => TECH_ENGINE_HYPER,
          'speed' => 5000,
          'consumption' => 1250,
          'min_level' => 8,
        ),
      ),
      'tech' => TECH_ENIGNE_ION,
      'speed' => 4000,
      'consumption' => 1000,
      'tech_level' => 8,
      'tech2' => TECH_ENGINE_HYPER,
      'speed2' => 5000,
      'consumption2' => 1250,
      'shield' => 500,
      'attack' => 1000,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 5, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 20, 402 => 20, 403 => 10, 404 => 1, 405 => 10, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 0.50005, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 1.05, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 4.4, 402 => 4.5, 403 => 9, 404 => 1, 405 => 13, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'armor' => 7500,
      'stackable' => true,
    ),

    SHIP_SATTELITE_SOLAR => array(
      'name' => 'solar_satelit',
      'type' => UNIT_SHIPS,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 1),
      'cost' => array(
        RES_METAL     => 1500,
        RES_CRYSTAL   => 2000,
        RES_DEUTERIUM => 100,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 1500,
      'crystal' => 2000,
      'deuterium' => 100,
      'energy' => 0,
      'factor' => 1,
      'capacity' => 0,
      'engine' => array(
        array(
          'tech' => TECH_ENGINE_CHEMICAL,
          'speed' => 0,
          'consumption' => 0,
          'min_level' => 0,
        ),
      ),
      'tech' => TECH_ENGINE_CHEMICAL,
      'speed' => 0,
      'consumption' => 0,
      'shield' => 10,
      'attack' => 1,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 1, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 0, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 0, 402 => 0, 403 => 0, 404 => 0, 405 => 0, 406 => 0, 407 => 0, 408 => 0, 409 => 0),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 1, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 1, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'armor' => 200,
      'production' => array(
        RES_METAL     => create_function('$level, $production_factor, $temperature', 'return 0;'),
        RES_CRYSTAL   => create_function('$level, $production_factor, $temperature', 'return 0;'),
        RES_DEUTERIUM => create_function('$level, $production_factor, $temperature', 'return 0;'),
        RES_ENERGY    => create_function('$level, $production_factor, $temperature', 'return ($temperature / 4 + 20) * $level * (0.1 * $production_factor);'),
      ),
      'metal_perhour'     => 'return 0;',
      'crystal_perhour'   => 'return 0;',
      'deuterium_perhour' => 'return 0;',
      'energy_perhour'    => 'return (($BuildTemp / 4) + 20) * $BuildLevel * (0.1 * $BuildLevelFactor);',
      'stackable' => true,
    ),

    SHIP_DESTRUCTOR => array(
      'name' => 'destructor',
      'type' => UNIT_SHIPS,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 9, TECH_HYPERSPACE => 5, TECH_ENGINE_HYPER => 6),
      'cost' => array(
        RES_METAL     => 60000,
        RES_CRYSTAL   => 50000,
        RES_DEUTERIUM => 15000,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 60000,
      'crystal' => 50000,
      'deuterium' => 15000,
      'energy' => 0,
      'factor' => 1,
      'capacity' => 2000,
      'engine' => array(
        array(
          'tech' => TECH_ENGINE_HYPER,
          'speed' => 5000,
          'consumption' => 1000,
          'min_level' => 6,
        ),
      ),
      'tech' => TECH_ENGINE_HYPER,
      'speed' => 5000,
      'consumption' => 1000,
      'shield' => 500,
      'attack' => 2000,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 5, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 2, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 10, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 0.25003, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 0.525, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 7.4, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1.125, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'armor' => 11000,
      'stackable' => true,
    ),

    SHIP_DEATH_STAR => array(
      'name' => 'dearth_star',
      'type' => UNIT_SHIPS,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 12, TECH_HYPERSPACE => 6, TECH_ENGINE_HYPER => 7, TECH_GRAVITON => 1, UNIT_PLAN_SHIP_DEATH_STAR => 1),
      'cost' => array(
        RES_METAL     => 5000000,
        RES_CRYSTAL   => 4000000,
        RES_DEUTERIUM => 1000000,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 5000000,
      'crystal' => 4000000,
      'deuterium' => 1000000,
      'energy' => 0,
      'factor' => 1,
      'capacity' => 1000000,
      'engine' => array(
        array(
          'tech' => TECH_ENGINE_HYPER,
          'speed' => 100,
          'consumption' => 1,
          'min_level' => 7,
        ),
      ),
      'tech' => TECH_ENGINE_HYPER,
      'speed' => 100,
      'consumption' => 1,
      'shield' => 50000,
      'attack' => 200000,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 100, SHIP_CARGO_SMALL => 200, SHIP_CARGO_BIG => 150, SHIP_FIGHTER_LIGHT => 200, SHIP_FIGHTER_HEAVY => 100, SHIP_DESTROYER => 33, SHIP_CRUISER => 30, SHIP_COLONIZER => 250, SHIP_RECYCLER => 250, SHIP_SPY => 1250, SHIP_BOMBER => 25, SHIP_SATTELITE_SOLAR => 1250, SHIP_DESTRUCTOR => 5, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 15, SHIP_SUPERNOVA => 1, 401 => 200, 402 => 200, 403 => 100, 404 => 50, 405 => 100, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1,  SHIP_CARGO_SUPER => 2.025, SHIP_CARGO_SMALL => 0.41, SHIP_CARGO_BIG => 0.91875, SHIP_FIGHTER_LIGHT => 0.41, SHIP_FIGHTER_HEAVY => 0.5125, SHIP_DESTROYER => 0.45375, SHIP_CRUISER => 0.93, SHIP_COLONIZER => 3.875, SHIP_RECYCLER => 2.0125, SHIP_SPY => 0.62506, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 1.3125, SHIP_DESTRUCTOR => 0.2875, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 0.03, SHIP_SUPERNOVA => 1, 401 => 0.02, 402 => 0.025, 403 => 0.05, 404 => 0.05, 405 => 0.25, 406 => 1, 407 => 1, 408 => 1, 409 => 1 ),
      'armor' => 900000,
      'stackable' => true,
    ),

    SHIP_BATTLESHIP => array(
      'name' => 'battleship',
      'type' => UNIT_SHIPS,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 8, TECH_HYPERSPACE => 5, TECH_ENGINE_HYPER => 5, TECH_LASER => 12),
      'cost' => array(
        RES_METAL     => 30000,
        RES_CRYSTAL   => 40000,
        RES_DEUTERIUM => 15000,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 30000,
      'crystal' => 40000,
      'deuterium' => 15000,
      'energy' => 0,
      'factor' => 1,
      'capacity' => 750,
      'engine' => array(
        array(
          'tech' => TECH_ENGINE_HYPER,
          'speed' => 10000,
          'consumption' => 250,
          'min_level' => 5,
        ),
      ),
      'tech' => TECH_ENGINE_HYPER,
      'speed' => 10000,
      'consumption' => 250,
      'shield' => 400,
      'attack' => 700,
      'sd' => array(SHIP_CARGO_HYPER => 1,  SHIP_CARGO_SMALL => 5, SHIP_CARGO_BIG => 3, SHIP_CARGO_SUPER => 2, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 4, SHIP_DESTROYER => 4, SHIP_CRUISER => 7, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 5, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1,  SHIP_CARGO_SUPER => 11.57143, SHIP_CARGO_SMALL => 2.92857, SHIP_CARGO_BIG => 5.25, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 5.85714, SHIP_DESTROYER => 15.71429, SHIP_CRUISER => 62, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 0.71436, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 1.5, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1, 401 => 1, 402 => 1, 403 => 1, 404 => 1, 405 => 1, 406 => 1, 407 => 1, 408 => 1, 409 => 1 ),
      'armor' => 7000,
      'stackable' => true,
    ),

    SHIP_SUPERNOVA => array(
      'name' => 'supernova',
      'type' => UNIT_SHIPS,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 15, TECH_HYPERSPACE => 7, TECH_ENGINE_HYPER => 9, TECH_GRAVITON => 1, UNIT_PLAN_SHIP_SUPERNOVA => 1),
      'cost' => array(
        RES_METAL     => 20000000,
        RES_CRYSTAL   => 15000000,
        RES_DEUTERIUM => 5000000,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 20000000,
      'crystal' => 15000000,
      'deuterium' => 5000000,
      'energy' => 0,
      'factor' => 1,
      'capacity' => 2000000,
      'engine' => array(
        array(
          'tech' => TECH_ENGINE_HYPER,
          'speed' => 150,
          'consumption' => 250,
          'min_level' => 9,
        ),
      ),
      'tech' => TECH_ENGINE_HYPER,
      'speed' => 150,
      'consumption' => 250,
      'shield' => 1000000,
      'attack' => 1000000,
      'sd' => array(SHIP_CARGO_HYPER => 1,  SHIP_CARGO_SUPER => 150, SHIP_CARGO_SMALL => 250, SHIP_CARGO_BIG => 200, SHIP_FIGHTER_LIGHT => 200, SHIP_FIGHTER_HEAVY => 100, SHIP_DESTROYER => 33, SHIP_CRUISER => 30, SHIP_COLONIZER => 250, SHIP_RECYCLER => 250, SHIP_SPY => 1250, SHIP_BOMBER => 25, SHIP_SATTELITE_SOLAR => 1250, SHIP_DESTRUCTOR => 5, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 15, SHIP_SUPERNOVA => 1, 401 => 200, 402 => 200, 403 => 100, 404 => 50, 405 => 100, 406 => 1, 407 => 1, 408 => 1, 409 => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1,  SHIP_CARGO_SUPER => 0.6075, SHIP_CARGO_SMALL => 0.1025, SHIP_CARGO_BIG => 0.245, SHIP_FIGHTER_LIGHT => 0.082, SHIP_FIGHTER_HEAVY => 0.1025, SHIP_DESTROYER => 0.09075, SHIP_CRUISER => 0.186, SHIP_COLONIZER => 0.775, SHIP_RECYCLER => 0.4025, SHIP_SPY => 0.12501, SHIP_BOMBER => 0.2, SHIP_SATTELITE_SOLAR => 0.2625, SHIP_DESTRUCTOR => 0.0575, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 0.111, SHIP_SUPERNOVA => 1, 401 => 0.004, 402 => 0.005, 403 => 0.01, 404 => 0.01, 405 => 0.05, 406 => 1, 407 => 1, 408 => 1, 409 => 1 ),
      'armor' => 3500000,
      'stackable' => true,
    ),

    SHIP_FIGHTER_ASSAULT => array(
      'name' => 'assault_ship',
      'type' => UNIT_SHIPS,
      'location' => LOC_PLANET,
    ),

    401 => array(
      'name' => 'misil_launcher',
      'type' => UNIT_DEFENCE,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 1),
      'cost' => array(
        RES_METAL     => 2000,
        RES_CRYSTAL   => 0,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 2000,
      'crystal' => 0,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 1,
      'shield' => 20,
      'attack' => 80,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 0, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 6.25063, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 1, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1),
      'armor' => 200,
      'stackable' => true,
    ),

    402 => array(
      'name' => 'small_laser',
      'type' => UNIT_DEFENCE,
      'location' => LOC_PLANET,
      'require' => array(TECH_ENERGY => 1, STRUC_FACTORY_HANGAR => 2, TECH_LASER => 3),
      'cost' => array(
        RES_METAL     => 1500,
        RES_CRYSTAL   => 500,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 1500,
      'crystal' => 500,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 1,
      'shield' => 25,
      'attack' => 100,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 0, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5.0005, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 1, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1),
      'armor' => 200,
      'stackable' => true,
    ),

    403 => array(
      'name' => 'big_laser',
      'type' => UNIT_DEFENCE,
      'location' => LOC_PLANET,
      'require' => array(TECH_ENERGY => 3, STRUC_FACTORY_HANGAR => 4, TECH_LASER => 6),
      'cost' => array(
        RES_METAL     => 6000,
        RES_CRYSTAL   => 2000,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 6000,
      'crystal' => 2000,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 1,
      'shield' => 100,
      'attack' => 250,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 0, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 2.0002, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 1, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1),
      'armor' => 800,
      'stackable' => true,
    ),

    404 => array(
      'name' => 'gauss_canyon',
      'type' => UNIT_DEFENCE,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 6, TECH_ENERGY => 6, TECH_WEAPON => 3, TECH_SHIELD => 1),
      'cost' => array(
        RES_METAL     => 20000,
        RES_CRYSTAL   => 15000,
        RES_DEUTERIUM => 2000,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 20000,
      'crystal' => 15000,
      'deuterium' => 2000,
      'energy' => 0,
      'factor' => 1,
      'shield' => 200,
      'attack' => 1100,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 0, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 0.45459, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 1, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1),
      'armor' => 3500,
      'stackable' => true,
    ),

    405 => array(
      'name' => 'ionic_canyon',
      'type' => UNIT_DEFENCE,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 4, TECH_ION => 4),
      'cost' => array(
        RES_METAL     => 2000,
        RES_CRYSTAL   => 6000,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 2000,
      'crystal' => 6000,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 1,
      'shield' => 500,
      'attack' => 150,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 0, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 3.33367, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 1, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1),
      'armor' => 800,
      'stackable' => true,
    ),

    406 => array(
      'name' => 'buster_canyon',
      'type' => UNIT_DEFENCE,
      'location' => LOC_PLANET,
      'require' => array(STRUC_FACTORY_HANGAR => 8, TECH_PLASMA => 7),
      'cost' => array(
        RES_METAL     => 50000,
        RES_CRYSTAL   => 50000,
        RES_DEUTERIUM => 30000,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 50000,
      'crystal' => 50000,
      'deuterium' => 30000,
      'energy' => 0,
      'factor' => 1,
      'shield' => 300,
      'attack' => 3000,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 0, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 0.16668, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 1, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1),
      'armor' => 10000,
      'stackable' => true,
    ),

    407 => array(
      'name' => 'small_protection_shield',
      'type' => UNIT_DEFENCE,
      'location' => LOC_PLANET,
      'require' => array(TECH_SHIELD => 2, STRUC_FACTORY_HANGAR => 1),
      'cost' => array(
        RES_METAL     => 10000,
        RES_CRYSTAL   => 10000,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 10000,
      'crystal' => 10000,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 1,
      'shield' => 2000,
      'attack' => 1,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 0, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 500.05, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 1, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1),
      'armor' => 2000,
      'stackable' => true,
      'max' => 1,
    ),

    408 => array(
      'name' => 'big_protection_shield',
      'type' => UNIT_DEFENCE,
      'location' => LOC_PLANET,
      'require' => array(TECH_SHIELD => 6, STRUC_FACTORY_HANGAR => 6),
      'cost' => array(
        RES_METAL     => 50000,
        RES_CRYSTAL   => 50000,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 50000,
      'crystal' => 50000,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 1,
      'shield' => 2000,
      'attack' => 1,
      'sd' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 5, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 0, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1),
      'amplify' => array(SHIP_CARGO_HYPER => 1, SHIP_CARGO_SUPER => 1, SHIP_CARGO_SMALL => 1, SHIP_CARGO_BIG => 1, SHIP_FIGHTER_LIGHT => 1, SHIP_FIGHTER_HEAVY => 1, SHIP_DESTROYER => 1, SHIP_CRUISER => 1, SHIP_COLONIZER => 1, SHIP_RECYCLER => 1, SHIP_SPY => 500.05, SHIP_BOMBER => 1, SHIP_SATTELITE_SOLAR => 1, SHIP_DESTRUCTOR => 1, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 1, SHIP_SUPERNOVA => 1),
      'armor' => 10000,
      'stackable' => true,
      'max' => 1,
    ),

    409 => array(
      'name'      => 'planet_protector',
      'type' => UNIT_DEFENCE,
      'location' => LOC_PLANET,
      'require'   => array(UNIT_PLAN_DEF_SHIELD_PLANET => 1),
      'cost' => array(
        RES_METAL     => 10000000,
        RES_CRYSTAL   => 5000000,
        RES_DEUTERIUM => 2500000,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal'     => 10000000,
      'crystal'   => 5000000,
      'deuterium' => 2500000,
      'energy'    => 0,
      'factor'    => 1,
      'shield'    => 1000000,
      'attack'    => 1000000,
      'sd'        => array(SHIP_CARGO_HYPER => 1,  SHIP_CARGO_SUPER => 50, SHIP_CARGO_SMALL => 100, SHIP_CARGO_BIG => 80, SHIP_FIGHTER_LIGHT => 75, SHIP_FIGHTER_HEAVY => 60, SHIP_DESTROYER => 20, SHIP_CRUISER => 20, SHIP_COLONIZER => 100, SHIP_RECYCLER => 100, SHIP_SPY => 500, SHIP_BOMBER => 10, SHIP_SATTELITE_SOLAR => 500, SHIP_DESTRUCTOR => 2, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 5, SHIP_SUPERNOVA => 1),
      'amplify'   => array(SHIP_CARGO_HYPER => 1,  SHIP_CARGO_SUPER => 0.2025, SHIP_CARGO_SMALL => 0.041, SHIP_CARGO_BIG => 0.098, SHIP_FIGHTER_LIGHT => 0.03075, SHIP_FIGHTER_HEAVY => 0.0615, SHIP_DESTROYER => 0.055, SHIP_CRUISER => 0.124, SHIP_COLONIZER => 0.31, SHIP_RECYCLER => 0.161, SHIP_SPY => 0.05001, SHIP_BOMBER => 0.08, SHIP_SATTELITE_SOLAR => 0.105, SHIP_DESTRUCTOR => 0.023, SHIP_DEATH_STAR => 1, SHIP_BATTLESHIP => 0.037, SHIP_SUPERNOVA => 1 ),
      'armor'     => 1500000,
      'stackable' => true,
      'max' => 1,
    ),

    502 => array(
      'name' => 'interceptor_misil',
      'type' => UNIT_DEFENCE,
      'location' => LOC_PLANET,
      'require' => array(STRUC_SILO => 2),
      'cost' => array(
        RES_METAL     => 8000,
        RES_CRYSTAL   => 2000,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 1,
      ),
      'metal' => 8000,
      'crystal' => 2000,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 1,
      'shield' => 1,
      'attack' => 1,
      'armor' => 1000,
      'stackable' => true,
      'size' => 1,
    ),

    503 => array(
      'name' => 'interplanetary_misil',
      'type' => UNIT_DEFENCE,
      'location' => LOC_PLANET,
      'require' => array(STRUC_SILO => 4),
      'cost' => array(
        RES_METAL     => 12500,
        RES_CRYSTAL   => 2500,
        RES_DEUTERIUM => 10000,       // 57500*70 = 4025000 - rocket    damage - 120000*70 = 8 400 000
        RES_ENERGY    => 0,           // 10000000+5000000*2+2500000*4 = 30000000    PP        defense 15 000 000
        'factor' => 1,
      ),
      'metal' => 12500,
      'crystal' => 2500,
      'deuterium' => 10000,
      'energy' => 0,
      'factor' => 1,
      'shield' => 1,
      'attack' => 120000,
      'armor' => 1500,
      'stackable' => true,
      'size' => 3,
    ),


    TECH_COMPUTER => array(
      'name' => 'computer_tech',
      'type' => UNIT_TECHNOLOGIES,
      'location' => LOC_USER,
      'require' => array(STRUC_LABORATORY => 1),
      'cost' => array(
        RES_METAL     => 0,
        RES_CRYSTAL   => 400,
        RES_DEUTERIUM => 600,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 0,
      'crystal' => 400,
      'deuterium' => 600,
      'energy' => 0,
      'factor' => 2,

      'bonus' => 1,
      'bonus_type' => BONUS_ADD,
    ),

    TECH_SPY => array(
      'name' => 'spy_tech',
      'type' => UNIT_TECHNOLOGIES,
      'location' => LOC_USER,
      'require' => array(STRUC_LABORATORY => 3),
      'cost' => array(
        RES_METAL     => 200,
        RES_CRYSTAL   => 1000,
        RES_DEUTERIUM => 200,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 200,
      'crystal' => 1000,
      'deuterium' => 200,
      'energy' => 0,
      'factor' => 2,

      'bonus' => 1,
      'bonus_type' => BONUS_ADD,
    ),

    TECH_WEAPON => array(
      'name' => 'military_tech',
      'type' => UNIT_TECHNOLOGIES,
      'location' => LOC_USER,
      'require' => array(STRUC_LABORATORY => 4),
      'cost' => array(
        RES_METAL     => 800,
        RES_CRYSTAL   => 200,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 800,
      'crystal' => 200,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 2,

      'bonus' => 10,
      'bonus_type' => BONUS_PERCENT,
    ),

    TECH_SHIELD => array(
      'name' => 'shield_tech',
      'type' => UNIT_TECHNOLOGIES,
      'location' => LOC_USER,
      'require' => array(STRUC_LABORATORY => 6, TECH_ENERGY => 3),
      'cost' => array(
        RES_METAL     => 200,
        RES_CRYSTAL   => 600,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 200,
      'crystal' => 600,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 2,

      'bonus' => 10,
      'bonus_type' => BONUS_PERCENT,
    ),

    TECH_ARMOR => array(
      'name' => 'defence_tech',
      'type' => UNIT_TECHNOLOGIES,
      'location' => LOC_USER,
      'require' => array(STRUC_LABORATORY => 2),
      'cost' => array(
        RES_METAL     => 1000,
        RES_CRYSTAL   => 0,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 1000,
      'crystal' => 0,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 2,

      'bonus' => 10,
      'bonus_type' => BONUS_PERCENT,
    ),

    TECH_ENERGY => array(
      'name' => 'energy_tech',
      'type' => UNIT_TECHNOLOGIES,
      'location' => LOC_USER,
      'require' => array(STRUC_LABORATORY => 1),
      'cost' => array(
        RES_METAL     => 0,
        RES_CRYSTAL   => 800,
        RES_DEUTERIUM => 400,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 0,
      'crystal' => 800,
      'deuterium' => 400,
      'energy' => 0,
      'factor' => 2,
//      'bonus' => 10,
//      'bonus_type' => BONUS_PERCENT,
    ),

    TECH_HYPERSPACE => array(
      'name' => 'hyperspace_tech',
      'type' => UNIT_TECHNOLOGIES,
      'location' => LOC_USER,
      'require' => array(STRUC_LABORATORY => 7, TECH_ENERGY => 10, TECH_SHIELD => 5),
      'cost' => array(
        RES_METAL     => 0,
        RES_CRYSTAL   => 4000,
        RES_DEUTERIUM => 2000,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 0,
      'crystal' => 4000,
      'deuterium' => 2000,
      'energy' => 0,
      'factor' => 2,
    ),

    TECH_ENGINE_CHEMICAL => array(
      'name' => 'combustion_tech',
      'type' => UNIT_TECHNOLOGIES,
      'location' => LOC_USER,
      'require' => array(STRUC_LABORATORY => 1, TECH_ENERGY => 1),
      'cost' => array(
        RES_METAL     => 400,
        RES_CRYSTAL   => 0,
        RES_DEUTERIUM => 600,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 400,
      'crystal' => 0,
      'deuterium' => 600,
      'energy' => 0,
      'factor' => 2,
      'bonus' => 10,
      'bonus_type' => BONUS_PERCENT,
      'speed_increase' => 0.1,
    ),

    TECH_ENIGNE_ION => array(
      'name' => 'impulse_motor_tech',
      'type' => UNIT_TECHNOLOGIES,
      'location' => LOC_USER,
      'require' => array(STRUC_LABORATORY => 4, TECH_ION => 1),
      'cost' => array(
        RES_METAL     => 2000,
        RES_CRYSTAL   => 4000,
        RES_DEUTERIUM => 600,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 2000,
      'crystal' => 4000,
      'deuterium' => 600,
      'energy' => 0,
      'factor' => 2,
      'bonus' => 20,
      'bonus_type' => BONUS_PERCENT,
      'speed_increase' => 0.2,
    ),

    TECH_ENGINE_HYPER => array(
      'name' => 'hyperspace_motor_tech',
      'type' => UNIT_TECHNOLOGIES,
      'location' => LOC_USER,
      'require' => array(STRUC_LABORATORY => 8, TECH_HYPERSPACE => 3),
      'cost' => array(
        RES_METAL     => 10000,
        RES_CRYSTAL   => 20000,
        RES_DEUTERIUM => 6000,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 10000,
      'crystal' => 20000,
      'deuterium' => 6000,
      'energy' => 0,
      'factor' => 2,
      'bonus' => 30,
      'bonus_type' => BONUS_PERCENT,
      'speed_increase' => 0.3,
    ),

    TECH_LASER => array(
      'name' => 'laser_tech',
      'type' => UNIT_TECHNOLOGIES,
      'location' => LOC_USER,
      'require' => array(STRUC_LABORATORY => 1, TECH_ENERGY => 2),
      'cost' => array(
        RES_METAL     => 200,
        RES_CRYSTAL   => 100,
        RES_DEUTERIUM => 0,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 200,
      'crystal' => 100,
      'deuterium' => 0,
      'energy' => 0,
      'factor' => 2,
    ),

    TECH_ION => array(
      'name' => 'ionic_tech',
      'type' => UNIT_TECHNOLOGIES,
      'location' => LOC_USER,
      'require' => array(STRUC_LABORATORY => 3, TECH_ENERGY => 4, TECH_LASER => 5),
      'cost' => array(
        RES_METAL     => 1000,
        RES_CRYSTAL   => 300,
        RES_DEUTERIUM => 100,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 1000,
      'crystal' => 300,
      'deuterium' => 100,
      'energy' => 0,
      'factor' => 2,
    ),

    TECH_PLASMA => array(
      'name' => 'buster_tech',
      'type' => UNIT_TECHNOLOGIES,
      'location' => LOC_USER,
      'require' => array(STRUC_LABORATORY => 5, TECH_ENERGY => 8, TECH_LASER => 10, TECH_ION => 5),
      'cost' => array(
        RES_METAL     => 2000,
        RES_CRYSTAL   => 4000,
        RES_DEUTERIUM => 1000,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 2000,
      'crystal' => 4000,
      'deuterium' => 1000,
      'energy' => 0,
      'factor' => 2,
    ),

    TECH_RESEARCH => array(
      'name' => 'intergalactic_tech',
      'type' => UNIT_TECHNOLOGIES,
      'location' => LOC_USER,
      'require' => array(STRUC_LABORATORY => 10, TECH_COMPUTER => 8, TECH_HYPERSPACE => 8),
      'cost' => array(
        RES_METAL     => 240000,
        RES_CRYSTAL   => 400000,
        RES_DEUTERIUM => 160000,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 240000,
      'crystal' => 400000,
      'deuterium' => 160000,
      'energy' => 0,
      'factor' => 2,
    ),

    TECH_EXPEDITION => array(
      'name' => 'expedition_tech',
      'type' => UNIT_TECHNOLOGIES,
      'location' => LOC_USER,
      'require' => array(STRUC_LABORATORY => 3, TECH_COMPUTER => 4, TECH_ENIGNE_ION => 3),
      'cost' => array(
        RES_METAL     => 4000,
        RES_CRYSTAL   => 8000,
        RES_DEUTERIUM => 4000,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 4000,
      'crystal' => 8000,
      'deuterium' => 4000,
      'energy' => 0,
      'factor' => 2,
    ),

    TECH_COLONIZATION => array(
      'name' => 'colonisation_tech',
      'type' => UNIT_TECHNOLOGIES,
      'location' => LOC_USER,
      'require' => array(STRUC_LABORATORY => 3, TECH_ENERGY => 5, TECH_ARMOR => 2),
      'cost' => array(
        RES_METAL     => 1000,
        RES_CRYSTAL   => 4000,
        RES_DEUTERIUM => 1000,
        RES_ENERGY    => 0,
        'factor' => 2,
      ),
      'metal' => 1000,
      'crystal' => 4000,
      'deuterium' => 1000,
      'energy' => 0,
      'factor' => 2,
    ),

    TECH_ASTROTECH => array(
      'name' => 'tech_astro',
      'type' => UNIT_TECHNOLOGIES,
      'location' => LOC_USER,
      'require' => array(STRUC_LABORATORY => 3, TECH_ENERGY => 5, TECH_ARMOR => 2),
      'cost' => array(
        RES_METAL     => 4000,
        RES_CRYSTAL   => 7000,
        RES_DEUTERIUM => 4000,
        RES_ENERGY    => 0,
        'factor'      => 1.9,
      ),
      'metal' => 4000,
      'crystal' => 7000,
      'deuterium' => 4000,
      'energy' => 0,
      'factor' => 1.9,
    ),

    TECH_GRAVITON => array(
      'name' => 'graviton_tech',
      'type' => UNIT_TECHNOLOGIES,
      'location' => LOC_USER,
      'require' => array(STRUC_LABORATORY => 12, TECH_ENERGY => 12),
      'cost' => array(
        RES_METAL     => 100000000,
        RES_CRYSTAL   => 100000000,
        RES_DEUTERIUM =>  50000000,
        //RES_ENERGY    => 300000,   // 100000 satellites
        'factor'      => 3,
      ),
      'metal' => 0,
      'crystal' => 0,
      'deuterium' => 0,
      'energy_max' => 300000,
      'factor' => 3,
    ),



    MRC_TECHNOLOGIST => array(
      'name' => 'rpg_geologue',
      'type' => UNIT_GOVERNORS,
      'location' => LOC_PLANET,
      'cost' => array(
        RES_DARK_MATTER => 800,
        'factor' => 1.06,
      ),
      'bonus' => 5,
      'bonus_type' => BONUS_PERCENT,
    ),
    MRC_ENGINEER => array(
      'name' => 'rpg_constructeur',
      'type' => UNIT_GOVERNORS,
      'location' => LOC_PLANET,
      'cost' => array(
        RES_DARK_MATTER => 500,
        'factor' => 1.65,
      ),
//      'max' => 8,
      'bonus' => 10,
      'bonus_type' => BONUS_PERCENT,
    ),
    MRC_FORTIFIER => array(
      'name' => 'rpg_defenseur',
      'type' => UNIT_GOVERNORS,
      'location' => LOC_PLANET,
      'cost' => array(
        RES_DARK_MATTER => 2000,
        'factor' => 1.25,
      ),
//      'max' => 8,
      'bonus' => 10,
      'bonus_type' => BONUS_PERCENT,
    ),



    MRC_STOCKMAN => array(
      'name' => 'rpg_stockeur',
      'type' => UNIT_MERCENARIES,
      'location' => LOC_USER,
      'cost' => array(
        RES_DARK_MATTER => 3000,
        'factor' => 1,
      ),
      'max' => 20,
      'bonus' => 20,
      'bonus_type' => BONUS_PERCENT,
    ),

    MRC_SPY => array(
      'name' => 'rpg_espion',
      'type' => UNIT_MERCENARIES,
      'location' => LOC_USER,
      'require' => array(MRC_STOCKMAN => 5),
      'cost' => array(
        RES_DARK_MATTER => 3000,
        'factor' => 1,
      ),
      'max' => 5,
      'bonus' => 1,
      'bonus_type' => BONUS_ADD,
    ),

    MRC_ACADEMIC => array(
      'name' => 'mrc_academic',
      'type' => UNIT_MERCENARIES,
      'location' => LOC_USER,
      'require' => array(MRC_STOCKMAN => 10, MRC_SPY => 5),
      'cost' => array(
        RES_DARK_MATTER => 3000,
        'factor' => 1,
      ),
      'max' => 30,
      'bonus' => 10,
      'bonus_type' => BONUS_PERCENT,
    ),

    MRC_ADMIRAL => array(
      'name' => 'rpg_amiral',
      'type' => UNIT_MERCENARIES,
      'location' => LOC_USER,
      'cost' => array(
        RES_DARK_MATTER => 3000,
        'factor' => 1,
      ),
      'max' => 20,
      'bonus' => 5,
      'bonus_type' => BONUS_PERCENT,
    ),

    MRC_COORDINATOR => array(
      'name' => 'rpg_commandant',
      'type' => UNIT_MERCENARIES,
      'location' => LOC_USER,
      'require' => array(MRC_ADMIRAL => 5),
      'cost' => array(
        RES_DARK_MATTER => 3000,
        'factor' => 1,
      ),
      'max' => 5,
      'bonus' => 1,
      'bonus_type' => BONUS_ADD,
    ),

    MRC_NAVIGATOR => array(
      'name' => 'rpg_general',
      'type' => UNIT_MERCENARIES,
      'location' => LOC_USER,
      'require' => array(MRC_ADMIRAL => 10, MRC_COORDINATOR => 5),
      'cost' => array(
        RES_DARK_MATTER => 3000,
        'factor' => 1,
      ),
      'max' => 10,
      'bonus' => 5,
      'bonus_type' => BONUS_PERCENT,
    ),


/*
    MRC_EMPEROR => array(
      'name' => 'rpg_empereur',
      'type' => UNIT_MERCENARIES,
      'location' => LOC_USER,
      'require' => array(MRC_ASSASIN => 1, MRC_DEFENDER => 1),
      'cost' => array(
        RES_DARK_MATTER => 3000,
        'factor' => 1,
      ),
      'max' => 1,
      'bonus_type' => BONUS_ABILITY,
    ),
*/
    RES_METAL => array(
      'name' => 'metal',
      'type' => UNIT_RESOURCES,
      'location' => LOC_PLANET,
      'bonus_type' => BONUS_ABILITY,
    ),
    RES_CRYSTAL => array(
      'name' => 'crystal',
      'type' => UNIT_RESOURCES,
      'location' => LOC_PLANET,
      'bonus_type' => BONUS_ABILITY,
    ),
    RES_DEUTERIUM => array(
      'name' => 'deuterium',
      'type' => UNIT_RESOURCES,
      'location' => LOC_PLANET,
      'bonus_type' => BONUS_ABILITY,
    ),
    RES_ENERGY => array(
      'name' => 'energy',
      'type' => UNIT_RESOURCES,
      'location' => LOC_PLANET,
      'bonus_type' => BONUS_ABILITY,
    ),
    RES_DARK_MATTER => array(
      'name' => 'dark_matter',
      'type' => UNIT_RESOURCES,
      'location' => LOC_USER,
      'bonus_type' => BONUS_ABILITY,
    ),

    ART_LHC => array(
      'name' => 'art_lhc',
      'type' => UNIT_ARTIFACTS,
      'location' => LOC_USER,
      'cost' => array(
        RES_DARK_MATTER => 25000,
        'factor' => 1,
      ),
      'bonus_type' => BONUS_ABILITY,
    ),
    ART_RCD_SMALL => array(
      'name' => 'art_rcd_small',
      'type' => UNIT_ARTIFACTS,
      'location' => LOC_USER,
      'cost' => array(
        RES_DARK_MATTER => 5000,
        'factor' => 1,
      ),
      'bonus_type' => BONUS_ABILITY,
      'deploy' => array(
        STRUC_MINE_METAL => 10,
        STRUC_MINE_CRYSTAL => 10,
        STRUC_MINE_DEUTERIUM => 10,
        STRUC_MINE_SOLAR => 14,
        STRUC_FACTORY_ROBOT => 4,
      ),
    ),
    ART_RCD_MEDIUM => array(
      'name' => 'art_rcd_medium',
      'type' => UNIT_ARTIFACTS,
      'location' => LOC_USER,
      'cost' => array(
        RES_DARK_MATTER => 25000,
        'factor' => 1,
      ),
      'bonus_type' => BONUS_ABILITY,
      'deploy' => array(
        STRUC_MINE_METAL => 15,
        STRUC_MINE_CRYSTAL => 15,
        STRUC_MINE_DEUTERIUM => 15,
        STRUC_MINE_SOLAR => 20,
        STRUC_FACTORY_ROBOT => 8,
      ),
    ),
    ART_RCD_LARGE => array(
      'name' => 'art_rcd_large',
      'type' => UNIT_ARTIFACTS,
      'location' => LOC_USER,
      'cost' => array(
        RES_DARK_MATTER => 60000,
        'factor' => 1,
      ),
      'bonus_type' => BONUS_ABILITY,
      'deploy' => array(
        STRUC_MINE_METAL => 20,
        STRUC_MINE_CRYSTAL => 20,
        STRUC_MINE_DEUTERIUM => 20,
        STRUC_MINE_SOLAR => 25,
        STRUC_FACTORY_ROBOT => 10,
        STRUC_FACTORY_NANO => 1,
      ),
    ),


    UNIT_PLAN_STRUC_MINE_FUSION => array(
      'name' => 'UNIT_PLAN_STRUC_MINE_FUSION',
      'type' => UNIT_PLANS,
      'location' => LOC_USER,
      'cost' => array(
        RES_DARK_MATTER => 10000,
        'factor' => 1,
      ),
      'max' => 1,
      'bonus_type' => BONUS_ABILITY,
    ),

    UNIT_PLAN_SHIP_CARGO_SUPER => array(
      'name' => 'UNIT_PLAN_SHIP_CARGO_SUPER',
      'type' => UNIT_PLANS,
      'location' => LOC_USER,
      'cost' => array(
        RES_DARK_MATTER => 10000,
        'factor' => 1,
      ),
      'max' => 1,
      'bonus_type' => BONUS_ABILITY,
    ),
    UNIT_PLAN_SHIP_CARGO_HYPER => array(
      'name' => 'UNIT_PLAN_SHIP_CARGO_HYPER',
      'type' => UNIT_PLANS,
      'location' => LOC_USER,
      'cost' => array(
        RES_DARK_MATTER => 25000,
        'factor' => 1,
      ),
      'max' => 1,
      'bonus_type' => BONUS_ABILITY,
    ),
    UNIT_PLAN_SHIP_DEATH_STAR => array(
      'name' => 'UNIT_PLAN_SHIP_DEATH_STAR',
      'type' => UNIT_PLANS,
      'location' => LOC_USER,
      'cost' => array(
        RES_DARK_MATTER => 10000,
        'factor' => 1,
      ),
      'max' => 1,
      'bonus_type' => BONUS_ABILITY,
    ),
    UNIT_PLAN_SHIP_SUPERNOVA => array(
      'name' => 'UNIT_PLAN_SHIP_SUPERNOVA',
      'type' => UNIT_PLANS,
      'location' => LOC_USER,
      'cost' => array(
        RES_DARK_MATTER => 25000,
        'factor' => 1,
      ),
      'max' => 1,
      'bonus_type' => BONUS_ABILITY,
    ),
    UNIT_PLAN_DEF_SHIELD_PLANET => array(
      'name' => 'UNIT_PLAN_DEF_SHIELD_PLANET',
      'type' => UNIT_PLANS,
      'location' => LOC_USER,
      'cost' => array(
        RES_DARK_MATTER => 25000,
        'factor' => 1,
      ),
      'max' => 1,
      'bonus_type' => BONUS_ABILITY,
    ),

    UNIT_SECTOR => array(
      'name' => 'field_max',
      'type' => UNIT_SECTOR,
      'location' => LOC_PLANET,
      'cost' => array(
        RES_DARK_MATTER => 1000,
        'factor' => 1.01,
      ),
      'bonus_type' => BONUS_ABILITY,
    ),

    'groups' => array(
      // Missions
/*
mission = array(
  'DESTINATION' => EMPTY/SAME/PLAYER/ALLY
  'ONE_WAY' => true/false, // Is it mission one-way like Transport/Colonize?
  'DURATION' => array(duration list  in  second)/false,  //  List  of  possible durations
  'AGGRESIVE' => true/false, // Should aggresive trigger rise?
);
*/
      'missions' => array(
        MT_ATTACK => array(
          'src_planet' => 1,
          'src_user'   => 1,
          'dst_planet' => 1,
          'dst_user'   => 1,
        ),

        MT_AKS => array(
          'src_planet' => 1,
          'src_user'   => 1,
          'dst_planet' => 1,
          'dst_user'   => 1,
        ),

        MT_TRANSPORT => array(
          'src_planet' => 1,
          'src_user'   => 0,
          'dst_planet' => 1,
          'dst_user'   => 0,
        ),

        MT_RELOCATE => array(
          'src_planet' => 0,
          'src_user'   => 0,
          'dst_planet' => 1,
          'dst_user'   => 0,
        ),

        MT_HOLD => array(
          'src_planet' => 0,
          'src_user'   => 0,
          'dst_planet' => 0,
          'dst_user'   => 0,
        ),

        MT_SPY => array(
          'src_planet' => 1,
          'src_user'   => 1,
          'dst_planet' => 1,
          'dst_user'   => 1,
        ),

        MT_COLONIZE => array(
          'src_planet' => 0,
          'src_user'   => 1,
          'dst_planet' => 1,
          'dst_user'   => 0,
        ),

        MT_RECYCLE => array(
          'src_planet' => 0,
          'src_user'   => 0,
          'dst_planet' => 1,
          'dst_user'   => 0,
        ),

        MT_DESTROY => array(
          'src_planet' => 1,
          'src_user'   => 1,
          'dst_planet' => 1,
          'dst_user'   => 1,
        ),

        MT_MISSILE => array(
          'src_planet' => 0,
          'src_user'   => 0,
          'dst_planet' => 0,
          'dst_user'   => 0,
        ),

        MT_EXPLORE => array(
          'src_planet' => 0,
          'src_user'   => 1,
          'dst_planet' => 0,
          'dst_user'   => 0,
        ),
      ),

      // Planet structures list
      'structures' => array(
        STRUC_MINE_METAL => STRUC_MINE_METAL, STRUC_MINE_CRYSTAL => STRUC_MINE_CRYSTAL, STRUC_MINE_DEUTERIUM => STRUC_MINE_DEUTERIUM,
        STRUC_MINE_SOLAR => STRUC_MINE_SOLAR, STRUC_MINE_FUSION => STRUC_MINE_FUSION,
        STRUC_FACTORY_ROBOT => STRUC_FACTORY_ROBOT, STRUC_FACTORY_HANGAR => STRUC_FACTORY_HANGAR, STRUC_FACTORY_NANO => STRUC_FACTORY_NANO,
        STRUC_LABORATORY => STRUC_LABORATORY, STRUC_LABORATORY_NANO => STRUC_LABORATORY_NANO,
        STRUC_SILO => STRUC_SILO,
        STRUC_STORE_METAL => STRUC_STORE_METAL, STRUC_STORE_CRYSTAL => STRUC_STORE_CRYSTAL, STRUC_STORE_DEUTERIUM => STRUC_STORE_DEUTERIUM,
        STRUC_ALLY_DEPOSIT => STRUC_ALLY_DEPOSIT,
        STRUC_TERRAFORMER => STRUC_TERRAFORMER,
        STRUC_MOON_STATION => STRUC_MOON_STATION, STRUC_MOON_PHALANX => STRUC_MOON_PHALANX, STRUC_MOON_GATE => STRUC_MOON_GATE,
      ),
      'build_allow'=> array(
        PT_PLANET => array(
          STRUC_MINE_METAL => STRUC_MINE_METAL, STRUC_MINE_CRYSTAL => STRUC_MINE_CRYSTAL, STRUC_MINE_DEUTERIUM => STRUC_MINE_DEUTERIUM,
          STRUC_MINE_SOLAR => STRUC_MINE_SOLAR, STRUC_MINE_FUSION => STRUC_MINE_FUSION,
          STRUC_FACTORY_ROBOT => STRUC_FACTORY_ROBOT, STRUC_FACTORY_HANGAR => STRUC_FACTORY_HANGAR, STRUC_FACTORY_NANO => STRUC_FACTORY_NANO,
          STRUC_LABORATORY => STRUC_LABORATORY, STRUC_LABORATORY_NANO => STRUC_LABORATORY_NANO,
          STRUC_SILO => STRUC_SILO,
          STRUC_STORE_METAL => STRUC_STORE_METAL, STRUC_STORE_CRYSTAL => STRUC_STORE_CRYSTAL, STRUC_STORE_DEUTERIUM => STRUC_STORE_DEUTERIUM,
          STRUC_ALLY_DEPOSIT => STRUC_ALLY_DEPOSIT,
          STRUC_TERRAFORMER => STRUC_TERRAFORMER,
        ),
        PT_MOON   => array(
          STRUC_FACTORY_ROBOT => STRUC_FACTORY_ROBOT, STRUC_FACTORY_HANGAR => STRUC_FACTORY_HANGAR,
          STRUC_STORE_METAL => STRUC_STORE_METAL, STRUC_STORE_CRYSTAL => STRUC_STORE_CRYSTAL, STRUC_STORE_DEUTERIUM => STRUC_STORE_DEUTERIUM,
          STRUC_ALLY_DEPOSIT => STRUC_ALLY_DEPOSIT,
          STRUC_MOON_STATION => STRUC_MOON_STATION, STRUC_MOON_PHALANX => STRUC_MOON_PHALANX, STRUC_MOON_GATE => STRUC_MOON_GATE,
        ),
      ),
      // List of units that can produce resources
      'factories' => array(
        STRUC_MINE_METAL => STRUC_MINE_METAL, STRUC_MINE_CRYSTAL => STRUC_MINE_CRYSTAL, STRUC_MINE_DEUTERIUM => STRUC_MINE_DEUTERIUM,
        STRUC_MINE_SOLAR => STRUC_MINE_SOLAR, STRUC_MINE_FUSION => STRUC_MINE_FUSION, SHIP_SATTELITE_SOLAR => SHIP_SATTELITE_SOLAR,
      ),

      // Tech list
      'tech'      => array (
        TECH_ARMOR => TECH_ARMOR, TECH_WEAPON => TECH_WEAPON, TECH_SHIELD => TECH_SHIELD,
        TECH_SPY => TECH_SPY, TECH_COMPUTER => TECH_COMPUTER,
        TECH_ENERGY => TECH_ENERGY, TECH_LASER => TECH_LASER, TECH_ION => TECH_ION, TECH_PLASMA => TECH_PLASMA, TECH_HYPERSPACE => TECH_HYPERSPACE,
        TECH_ENGINE_CHEMICAL => TECH_ENGINE_CHEMICAL, TECH_ENIGNE_ION => TECH_ENIGNE_ION, TECH_ENGINE_HYPER => TECH_ENGINE_HYPER,
        TECH_EXPEDITION => TECH_EXPEDITION, TECH_COLONIZATION => TECH_COLONIZATION, TECH_GRAVITON => TECH_GRAVITON, TECH_RESEARCH => TECH_RESEARCH,
      ),

      // Mercenaries
      'mercenaries' => array (
        MRC_STOCKMAN => MRC_STOCKMAN, MRC_SPY => MRC_SPY, MRC_ACADEMIC => MRC_ACADEMIC,
        MRC_ADMIRAL => MRC_ADMIRAL, MRC_COORDINATOR => MRC_COORDINATOR, MRC_NAVIGATOR => MRC_NAVIGATOR,
      ),
      // Governors
      'governors' => array(
        MRC_TECHNOLOGIST => MRC_TECHNOLOGIST, MRC_ENGINEER => MRC_ENGINEER, MRC_FORTIFIER => MRC_FORTIFIER
      ),
      // Plans
      'plans' => array(
        UNIT_PLAN_STRUC_MINE_FUSION => UNIT_PLAN_STRUC_MINE_FUSION,
        UNIT_PLAN_SHIP_CARGO_SUPER => UNIT_PLAN_SHIP_CARGO_SUPER, UNIT_PLAN_SHIP_CARGO_HYPER => UNIT_PLAN_SHIP_CARGO_HYPER,
        UNIT_PLAN_SHIP_DEATH_STAR => UNIT_PLAN_SHIP_DEATH_STAR, UNIT_PLAN_SHIP_SUPERNOVA => UNIT_PLAN_SHIP_SUPERNOVA,
        UNIT_PLAN_DEF_SHIELD_PLANET => UNIT_PLAN_DEF_SHIELD_PLANET,
      ),

      // Spaceships list
      'fleet'     => array(
        SHIP_FIGHTER_LIGHT => SHIP_FIGHTER_LIGHT, SHIP_FIGHTER_HEAVY => SHIP_FIGHTER_HEAVY,
        SHIP_DESTROYER => SHIP_DESTROYER, SHIP_CRUISER => SHIP_CRUISER,
        SHIP_BOMBER => SHIP_BOMBER, SHIP_BATTLESHIP => SHIP_BATTLESHIP, SHIP_DESTRUCTOR => SHIP_DESTRUCTOR,
        SHIP_DEATH_STAR => SHIP_DEATH_STAR, SHIP_SUPERNOVA => SHIP_SUPERNOVA,
        SHIP_CARGO_SMALL => SHIP_CARGO_SMALL, SHIP_CARGO_BIG => SHIP_CARGO_BIG, SHIP_CARGO_SUPER => SHIP_CARGO_SUPER, SHIP_CARGO_HYPER => SHIP_CARGO_HYPER,
        SHIP_RECYCLER => SHIP_RECYCLER, SHIP_COLONIZER => SHIP_COLONIZER, SHIP_SPY => SHIP_SPY, SHIP_SATTELITE_SOLAR => SHIP_SATTELITE_SOLAR
       ),
      // Defensive building list
      'defense'   => array (401, 402, 403, 404, 405, 406, 407, 408, 409, 502, 503 ),
      // Missiles list
      'missile'   => array (502, 503, ),

      // Combat units list
      'combat'    => array(
        SHIP_CARGO_SMALL => SHIP_CARGO_SMALL, SHIP_CARGO_BIG => SHIP_CARGO_BIG, SHIP_CARGO_SUPER => SHIP_CARGO_SUPER, SHIP_CARGO_HYPER => SHIP_CARGO_HYPER,
        SHIP_FIGHTER_LIGHT => SHIP_FIGHTER_LIGHT, SHIP_FIGHTER_HEAVY => SHIP_FIGHTER_HEAVY,
        SHIP_DESTROYER => SHIP_DESTROYER, SHIP_CRUISER => SHIP_CRUISER, SHIP_COLONIZER => SHIP_COLONIZER, SHIP_RECYCLER => SHIP_RECYCLER,
        SHIP_SPY => SHIP_SPY,
        SHIP_BOMBER => SHIP_BOMBER, SHIP_SATTELITE_SOLAR => SHIP_SATTELITE_SOLAR, SHIP_DESTRUCTOR => SHIP_DESTRUCTOR, SHIP_DEATH_STAR => SHIP_DEATH_STAR,
        SHIP_BATTLESHIP => SHIP_BATTLESHIP, SHIP_SUPERNOVA => SHIP_SUPERNOVA,
        401, 402, 403, 404, 405, 406, 407, 408, 409,
      ),
      // Planet active defense list
      'defense_active' => array(
        401, 402, 403, 404, 405, 406, 407, 408, 409,
      ),
      // Transports
      'flt_transports' => array(
        SHIP_CARGO_SMALL => SHIP_CARGO_SMALL, SHIP_CARGO_BIG => SHIP_CARGO_BIG, SHIP_CARGO_SUPER => SHIP_CARGO_SUPER, SHIP_CARGO_HYPER => SHIP_CARGO_HYPER,
      ),

      'artifacts' => array(
        ART_LHC => ART_LHC, ART_RCD_SMALL => ART_RCD_SMALL, ART_RCD_MEDIUM => ART_RCD_MEDIUM, ART_RCD_LARGE => ART_RCD_LARGE,
      ),

      // Resource list
      'resources' => array ( 0 => 'metal', 1 => 'crystal', 2 => 'deuterium', 3 => 'dark_matter'),
      // Resources all
      'resources_all' => array(RES_METAL => RES_METAL, RES_CRYSTAL => RES_CRYSTAL, RES_DEUTERIUM => RES_DEUTERIUM, RES_ENERGY => RES_ENERGY, RES_DARK_MATTER => RES_DARK_MATTER),
      // Resources can be produced on planet
      'resources_planet' => array(RES_METAL => RES_METAL, RES_CRYSTAL => RES_CRYSTAL, RES_DEUTERIUM => RES_DEUTERIUM, RES_ENERGY => RES_ENERGY),
      // Resources can be looted from planet
      'resources_loot' => array(RES_METAL => RES_METAL, RES_CRYSTAL => RES_CRYSTAL, RES_DEUTERIUM => RES_DEUTERIUM),
      // Resources that can be tradeable in market trader
      'resources_trader' => array(RES_METAL => RES_METAL, RES_CRYSTAL => RES_CRYSTAL, RES_DEUTERIUM => RES_DEUTERIUM, RES_DARK_MATTER => RES_DARK_MATTER),

      // Resources that can be tradeable in market trader AND be a quest_rewards
      'quest_rewards' => array(RES_METAL => RES_METAL, RES_CRYSTAL => RES_CRYSTAL, RES_DEUTERIUM => RES_DEUTERIUM, RES_DARK_MATTER => RES_DARK_MATTER),

//      // Ques list
//      'ques' => array(QUE_STRUCTURES, QUE_HANGAR, QUE_RESEARCH),

      'STAT_COMMON' => array(STAT_TOTAL => STAT_TOTAL, STAT_FLEET => STAT_FLEET, STAT_TECH => STAT_TECH, STAT_BUILDING => STAT_BUILDING, STAT_DEFENSE => STAT_DEFENSE, STAT_RESOURCE => STAT_RESOURCE, ),
      'STAT_PLAYER' => array(STAT_RAID_TOTAL => STAT_RAID_TOTAL, STAT_RAID_WON => STAT_RAID_WON, STAT_RAID_LOST => STAT_RAID_LOST, STAT_LVL_BUILDING => STAT_LVL_BUILDING, STAT_LVL_TECH => STAT_LVL_TECH, STAT_LVL_RAID => STAT_LVL_RAID, ),
    ),
  );

  //All resources
  $sn_data['groups']['all'] = array_merge($sn_data['groups']['structures'], $sn_data['groups']['tech'], $sn_data['groups']['fleet'], $sn_data['groups']['defense'], $sn_data['groups']['mercenaries']);

  $sn_data['groups']['ques'] = array(
    QUE_STRUCTURES => array(
      'unit_list' => $sn_data['groups']['structures'],
      'length' => 5,
      'mercenary' => MRC_ENGINEER,
      'que' => QUE_STRUCTURES,
    ),

    QUE_HANGAR => array(
      'unit_list' => array_merge($sn_data['groups']['fleet'], $sn_data['groups']['defense']),
      'length' => 10,
      'mercenary' => MRC_ENGINEER,
      'que' => QUE_HANGAR,
    ),

    QUE_RESEARCH => array(
      'unit_list' => $sn_data['groups']['tech'],
      'length' => 1,
      'mercenary' => MRC_ACADEMIC,
      'que' => QUE_RESEARCH,
    )
  );

  $sn_data['groups']['subques'] = array(
    SUBQUE_PLANET => array(
      'que' => QUE_STRUCTURES,
      'mercenary' => MRC_ENGINEER,
      'unit_list' => $sn_data['groups']['build_allow'][PT_PLANET],
    ),

    SUBQUE_MOON => array(
      'que' => QUE_STRUCTURES,
      'mercenary' => MRC_ENGINEER,
      'unit_list' => $sn_data['groups']['build_allow'][PT_MOON],
    ),

    SUBQUE_FLEET => array(
      'que' => QUE_HANGAR,
      'mercenary' => MRC_ENGINEER,
      'unit_list' => $sn_data['groups']['fleet'],
    ),

    SUBQUE_DEFENSE => array(
      'que' => QUE_HANGAR,
      'mercenary' => MRC_FORTIFIER,
      'unit_list' => $sn_data['groups']['defense'],
    ),

    SUBQUE_RESEARCH => array(
      'que' => QUE_RESEARCH,
      'mercenary' => MRC_ACADEMIC,
      'unit_list' => $sn_data['groups']['tech'],
    ),
  );

  $sn_pwr_buy_discount = array(
  //  PERIOD_MINUTE    => 1,
  //  PERIOD_MINUTE_3  => 1,
  //  PERIOD_MINUTE_5  => 1,
  //  PERIOD_MINUTE_10 => 1,
  //  PERIOD_DAY       => 3,
  //  PERIOD_DAY_3     => 2,
    PERIOD_WEEK      => 1.5,
    PERIOD_WEEK_2    => 1.2,
    PERIOD_MONTH     => 1,
    PERIOD_MONTH_2   => 0.9,
    PERIOD_MONTH_3   => 0.8,
  );

  foreach ($sn_data as $unitID => $unitData)
  {
    $sn_data[$unitID]['armor'] = ($sn_data[$unitID]['metal'] + $sn_data[$unitID]['crystal'])/10;
/*
    foreach ($unitData['sd'] as $enemyID => $SPD)
    {
      if ($SPD>1)
      {

        // $enemyArmor = ($sn_data[$enemyID]['metal'] + $sn_data[$enemyID]['crystal'])/10;
        // $a1 = ($enemyArmor + $sn_data[$enemyID]['shield']) * $SPD / $unitData['attack'];

        $a1 = ($sn_data[$enemyID]['armor'] + $sn_data[$enemyID]['shield']) * $SPD / $unitData['attack'];
        $sn_data[$unitID]['amplify'][$enemyID] = $a1;
      }
      elseif ($SPD == 1)
      {
        $sn_data[$unitID]['amplify'][$enemyID] = 1;
      }
      elseif ($SPD < 0)
      {
        $sn_data[$unitID]['amplify'][$enemyID] = -$SPD;
      }
      elseif ($SPD == 0 || $SPD<1 || !is_numeric($SPD))
      {
        $sn_data[$unitID]['amplify'][$enemyID] = 0;
      }
    }
*/
  }

/*
  // Procedure to dump new 'amplify' values delivered from rapidfire
  foreach ($sn_data as $unitID => $unitData)
  {
    print("  $"."CombatCaps[" . $unitID . "]['amplify'] = array( ");
    foreach ($unitData['amplify'] as $enemyID => $SPD)
    {
      print($enemyID . ' => ' . round($SPD, 5) . ', ');
    }
    print(" );<br>");
  }
*/

?>
