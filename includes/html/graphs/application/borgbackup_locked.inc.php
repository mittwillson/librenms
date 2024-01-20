<?php

$name = 'borgbackup';
$unit_text = 'Repos';
$descr = 'Locked';
$ds = 'data';
$no_hourly = true;
$no_daily = true;
$no_weekly = true;
$no_percentile = true;

$name_part = 'locked';

if (isset($vars['borgrepo'])) {
    $name_part = 'repos___' . $vars['borgrepo'] . '___' . $name_part;
} else {
    $name_part = 'totals___' . $name_part;
}

$filename = Rrd::name($device['hostname'], ['app', $name, $app->app_id, $name_part]);

if (! Rrd::checkRrdExists($filename)) {
    d_echo('RRD "' . $filename . '" not found');
}

require 'includes/html/graphs/generic_stats.inc.php';
