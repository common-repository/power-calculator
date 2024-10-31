<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

delete_option('ddev_power_calculator');
