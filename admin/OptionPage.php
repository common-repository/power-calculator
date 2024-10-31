<?php


if (!class_exists('PowCal_OptionPage')) {
    /**
     * DdevOptionPage class used to add a top-level menu.
     *
     * Used to add a top level menu named Power Calculator Settings on admin side with manage_option capability and also add some setting that user can config their own shortcode preset.
     *
     * @since 1.0.0
     */
    class PowCal_OptionPage
    {

        /**
         * used to make field on admin power calculator setting page side.
         *
         * @since 1.0.0
         * @var array $fields
         */
        protected $fields = [];
        /**
         * used to store option name that are created for setting get and set values.
         *
         * @since 1.0.0
         * @var string $option_name
         */
        protected $option_name;

        /**
         * Contsruct method used to fire action and other important methods.
         * 
         * @since 1.0.0
         * 
         */
        public function __construct()
        {
            add_action('admin_menu', [$this, 'addMenu']);
            add_action('admin_init', [$this, 'settings']);

            $this->setFields();
        }
        /**
         * Add a top-level menu page.
         *
         * @since 1.0.0
         */
        public function addMenu()
        {
            add_menu_page(
                __("Power Calculator Settings", 'ddev-power-calculator'),
                __("Power Calculator Settings", 'ddev-power-calculator'),
                'manage_options',
                'power-calculator-settings',
                [$this, 'powerCalculatorSettingPageHTML'],
                'dashicons-forms'
            );
        }
        /**
         * Callback method for top-level menu
         *
         * @since 1.0.0
         */
        public function powerCalculatorSettingPageHTML()
        {
?>
            <form action="options.php" method="post">
                <?php
                settings_fields('ddevPowerCalculator');
                do_settings_sections('ddevPowerCalculator');
                submit_button();
                ?>

            </form>
<?php
        }

        /**
         * Setting API for registering settings and section
         *
         * @since 1.0.0
         */
        public function settings()
        {
            register_setting('ddevPowerCalculator', 'ddev_power_calculator');

            $this->option_name = 'ddev_power_calculator';

            add_settings_section(
                'power_calculator_settings',
                __('Power Calculator Settings', 'ddev-power-calculator'),
                [$this, 'powerCalculatorSettingsCb'],
                'ddevPowerCalculator'
            );
            $this->fieldSetting($this->fields, 'ddevPowerCalculator', 'power_calculator_settings');

            add_option($this->option_name, '');
        }

        /**
         * used to add field setting on based of array of field
         *
         * @since 1.0.0
         * 
         * @param array $fields should be a array
         * @param string $page should be string that is defined @see register_setting()
         * @param string $section section name that is defined  @see add_setting_section()
         * 
         */
        protected function fieldSetting(array $fields, $page, $section)
        {
            foreach ($fields as $title) {
                $handle         = sanitize_key($this->createIdFromTitle($title));
                $args = [
                    'id'        => $handle,
                    'label'     => sanitize_text_field($title),
                ];
                $title = __(sprintf('%s', $title), 'ddev-power-calculator');
                add_settings_field(
                    $handle,
                    $title,
                    [$this, 'inputField'],
                    $page,
                    $section,
                    $args
                );
            }
        }
        /**
         * used to set field
         *
         * @since 1.0.0
         * 
         * 
         */
        protected function setFields()
        {
            $this->fields = [
                '0-500 Watt Preset',
                '501-1000 Watt Preset',
                '1001-1500 Watt Preset',
                '1501-2000 Watt Preset',
                '2001-2500 Watt Preset',
                '2501-3000 Watt Preset',
                '3001-3500 Watt Preset',
                '3501-4000 Watt Preset',
                '4001-4500 Watt Preset',
                '4501-5000 Watt Preset',
                '5001-6000 Watt Preset',
                '6001-8000 Watt Preset',
                '8001-10000 Watt Preset',
                '10001-12000 Watt Preset',
                '12001-15000 Watt Preset',
                '15001-20000 Watt Preset',
                '20001-25000 Watt Preset',
                '25001-30000 Watt Preset',
                '30001-40000 Watt Preset',

                '0-100 Battery Preset',
                '101-150 Battery Preset',
                '151-200 Battery Preset',
                '201-300 Battery Preset',
                '301-400 Battery Preset',
                '401-500 Battery Preset',
                '501-600 Battery Preset',
                '601-700 Battery Preset',
                '701-800 Battery Preset',
                '801-900 Battery Preset',
                '901-1000 Battery Preset',
                '1001-1200 Battery Preset',
                '1201-1500 Battery Preset',
                '1501-1800 Battery Preset',
                '1801-2000 Battery Preset',
                '2001-2500 Battery Preset',
                '2501-3000 Battery Preset',
                '3001-3500 Battery Preset',
                '3500-4000 Battery Preset',
            ];
        }

        /**
         * used to create ID from the title or text that is set by setFields() method
         * 
         * @since 1.0.0
         * 
         * @param string $text should be a string ex- 0-500 Watt Preset
         * 
         * @return string will return modified string value ex- watt_0_500
         */

        protected function createIdFromTitle(string $text): string
        {
            $text = explode(' ', $text);
            $item = $text[1];

            unset($text[2]);
            unset($text[1]);
            array_unshift($text, strtolower($item));

            $text = implode('_', $text);
            $text = explode('-', $text);
            $text = implode('_', $text);

            return $text;
        }

        /**
         * used to create textarea input for save option purpose
         * 
         * @since 1.0.0
         * 
         * @param array $args should be a array for input
         */
        public function inputField(array $args)
        {
            $id         = esc_attr($args['id']);
            $label      = esc_attr($args['label']);

            $data = get_option($this->option_name, []);
            $value = isset($data[$id]) ? esc_attr($data[$id]) : '';

            print "<textarea id='$id' name='$this->option_name[$id]'>" . $this->sanitize_data($value) . "</textarea>";
        }

        /**
         * callback function for power calculator setting
         * 
         * @since 1.0.0
         * 
         */
        public function powerCalculatorSettingsCb()
        {
            //
        }
        /**
         * used to sanitize data based on custom allowed html tag that user can store html tags to show on front page
         * 
         * @since 1.0.0
         * 
         * @return string allowed html tag includes with string
         */
        protected function sanitize_data($text)
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
    }

    $pow_cal_option_page = new PowCal_OptionPage;
}
