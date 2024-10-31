<?php

if (!function_exists('ddev_pc_power_calculator')) {
    function ddev_pc_power_calculator($atts = [], $content = null)
    {
        $atts = shortcode_atts([
            "1st-preset-watt"  => getValue('watt_0_500'),
            "2nd-preset-watt"  => getValue('watt_501_1000'),
            "3rd-preset-watt"  => getValue('watt_1001_1500'),
            "4th-preset-watt"  => getValue('watt_1501_2000'),
            "5th-preset-watt"  => getValue('watt_2001_2500'),
            "6th-preset-watt"  => getValue('watt_2501_3000'),
            "7th-preset-watt"  => getValue('watt_3001_3500'),
            "8th-preset-watt"  => getValue('watt_3501_4000'),
            "9th-preset-watt"  => getValue('watt_4001_4500'),
            "10th-preset-watt"  => getValue('watt_4501_5000'),
            "11th-preset-watt"  => getValue('watt_5001_6000'),
            "12th-preset-watt"  => getValue('watt_6001_8000'),
            "13th-preset-watt"  => getValue('watt_8001_10000'),
            "14th-preset-watt"  => getValue('watt_10001_12000'),
            "15th-preset-watt"  => getValue('watt_12001_15000'),
            "16th-preset-watt"  => getValue('watt_15001_20000'),
            "17th-preset-watt"  => getValue('watt_20001_25000'),
            "18th-preset-watt"  => getValue('watt_25001_30000'),
            "19th-preset-watt"  => getValue('watt_30001_40000'),

            "1st-preset-battery"    => getValue('battery_0_100'),
            "2nd-preset-battery"    => getValue('battery_101_150'),
            "3rd-preset-battery"    => getValue('battery_151_200'),
            "4th-preset-battery"    => getValue('battery_201_300'),
            "5th-preset-battery"    => getValue('battery_301_400'),
            "6th-preset-battery"    => getValue('battery_401_500'),
            "7th-preset-battery"    => getValue('battery_501_600'),
            "8th-preset-battery"    => getValue('battery_601_700'),
            "9th-preset-battery"    => getValue('battery_701_800'),
            "10th-preset-battery"   => getValue('battery_801_900'),
            "11th-preset-battery"   => getValue('battery_901_1000'),
            "12th-preset-battery"   => getValue('battery_1001_1200'),
            "13th-preset-battery"   => getValue('battery_1201_1500'),
            "14th-preset-battery"   => getValue('battery_1501_1800'),
            "15th-preset-battery"   => getValue('battery_1801_2000'),
            "16th-preset-battery"   => getValue('battery_2001_2500'),
            "17th-preset-battery"   => getValue('battery_2501_3000'),
            "18th-preset-battery"   => getValue('battery_3001_3500'),
            "19th-preset-battery"   => getValue('battery_3501_4000'),
        ], $atts);

        wp_localize_script('dpc-main-script', 'power_handle', [
            'watt' => [
                'watt_0_500'            => sanitize_field_data($atts['1st-preset-watt']),
                'watt_501_1000'         => sanitize_field_data($atts['2nd-preset-watt']),
                'watt_1001_1500'        => sanitize_field_data($atts['3rd-preset-watt']),
                'watt_1501_2000'        => sanitize_field_data($atts['4th-preset-watt']),
                'watt_2001_2500'        => sanitize_field_data($atts['5th-preset-watt']),
                'watt_2501_3000'        => sanitize_field_data($atts['6th-preset-watt']),
                'watt_3001_3500'        => sanitize_field_data($atts['7th-preset-watt']),
                'watt_3501_4000'        => sanitize_field_data($atts['8th-preset-watt']),
                'watt_4001_4500'        => sanitize_field_data($atts['9th-preset-watt']),
                'watt_4501_5000'        => sanitize_field_data($atts['10th-preset-watt']),
                'watt_5001_6000'        => sanitize_field_data($atts['11th-preset-watt']),
                'watt_6001_7000'        => sanitize_field_data($atts['12th-preset-watt']),
                'watt_7001_10000'       => sanitize_field_data($atts['13th-preset-watt']),
                'watt_10001_12000'      => sanitize_field_data($atts['14th-preset-watt']),
                'watt_12001_15000'      => sanitize_field_data($atts['15th-preset-watt']),
                'watt_15001_20000'      => sanitize_field_data($atts['16th-preset-watt']),
                'watt_20001_25000'      => sanitize_field_data($atts['17th-preset-watt']),
                'watt_25001_30000'      => sanitize_field_data($atts['18th-preset-watt']),
                'watt_30001_40000'      => sanitize_field_data($atts['19th-preset-watt']),
            ],
            'battery' => [
                'battery_0_100'         => sanitize_field_data($atts['1st-preset-battery']),
                'battery_101_150'       => sanitize_field_data($atts['2nd-preset-battery']),
                'battery_151_200'       => sanitize_field_data($atts['3rd-preset-battery']),
                'battery_201_300'       => sanitize_field_data($atts['4th-preset-battery']),
                'battery_301_400'       => sanitize_field_data($atts['5th-preset-battery']),
                'battery_401_500'       => sanitize_field_data($atts['6th-preset-battery']),
                'battery_501_600'       => sanitize_field_data($atts['7th-preset-battery']),
                'battery_601_700'       => sanitize_field_data($atts['8th-preset-battery']),
                'battery_701_800'       => sanitize_field_data($atts['9th-preset-battery']),
                'battery_801_900'       => sanitize_field_data($atts['10th-preset-battery']),
                'battery_901_1000'      => sanitize_field_data($atts['11th-preset-battery']),
                'battery_1001_1200'     => sanitize_field_data($atts['12th-preset-battery']),
                'battery_1201_1500'     => sanitize_field_data($atts['13th-preset-battery']),
                'battery_1501_1800'     => sanitize_field_data($atts['14th-preset-battery']),
                'battery_1801_2000'     => sanitize_field_data($atts['15th-preset-battery']),
                'battery_2001_2500'     => sanitize_field_data($atts['16th-preset-battery']),
                'battery_2501_3000'     => sanitize_field_data($atts['17th-preset-battery']),
                'battery_3001_3500'     => sanitize_field_data($atts['18th-preset-battery']),
                'battery_3501_4000'     => sanitize_field_data($atts['19th-preset-battery']),
            ]
        ]);

        return ddev_power_calculation();
    }
}

function ddev_pc_power_calculation_local_script()
{
    wp_enqueue_script('dpc-main-script');
}

add_action('wp_enqueue_scripts', 'ddev_pc_power_calculation_local_script');

function getValue($field_name)
{
    $option = get_option('ddev_power_calculator', []);
    $value = isset($option[$field_name]) ? sanitize_field_data($option[$field_name]) : '';
    return $value;
}

function sanitize_field_data($text)
{
    return  wp_kses($text, [
        'h1' => [],
        'h2' => [],
        'h3' => [],
        'h4' => [],
        'h5' => [],
        'h6' => [],
        'p' => [],
        'strong' => [],
    ]);
}
