"use strict";
(function ($) {
    var vm = new Vue({
        el: document.querySelector('#app'),
        data: {
            preset: power_handle,
            inverter_required: '',
            battery_required: '',
            total_load: '',
            battery_backup: '',
            is_show_capcity: false,
            max_size: '',
            min_size: '',
            total_load_by_selecting: 0,
            total_items: 0,
            show_battery_size: false,
            total_battery: 0,
            item_ids: [],
            result: [],
            items: [
                {
                    appl: "Incandescent Bulb",
                    id: 'ibulb',
                    types: [
                        {
                            name: 'Select',
                            value: 0
                        },
                        {
                            name: '40 W',
                            value: 40
                        },
                        {
                            name: '60 W',
                            value: 60
                        },
                        {
                            name: '100 W',
                            value: 100
                        },
                    ],
                    counts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                {
                    appl: "CFL",
                    id: 'cfl',
                    types: [
                        {
                            name: 'Select',
                            value: 0
                        },
                        {
                            name: 'CFL Heavy',
                            value: 30
                        },
                        {
                            name: 'CFL Light',
                            value: 15
                        },
                    ],
                    counts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                {
                    appl: "LED Bulb",
                    id: 'ledbulb',
                    types: [
                        {
                            name: 'Select',
                            value: 0
                        },
                        {
                            name: '5 W',
                            value: 5
                        },
                        {
                            name: '8 W',
                            value: 5
                        }
                    ],
                    counts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                {
                    appl: "Tubelight",
                    id: 'ledbulb',
                    types: [
                        {
                            name: 'Select',
                            value: 0
                        },
                        {
                            name: '40 W',
                            value: 40
                        },
                        {
                            name: '20 W',
                            value: 20
                        }
                    ],
                    counts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                {
                    appl: "Fan",
                    id: 'fan',
                    types: [
                        {
                            name: 'Select',
                            value: 0
                        },
                        {
                            name: 'Ceiling Fan',
                            value: 75
                        },
                        {
                            name: 'Table Fan',
                            value: 50
                        },
                        {
                            name: 'Wall Mounting Fan',
                            value: 55
                        },
                        {
                            name: 'Pedestal Fan',
                            value: 100
                        },
                    ],
                    counts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                {
                    appl: "Desktop Computer",
                    id: 'desktop',
                    types: [
                        {
                            name: 'Select',
                            value: 0
                        },
                        {
                            name: 'With 15" LCD Monitor',
                            value: 150
                        },
                        {
                            name: 'With 17" LCD Monitor',
                            value: 150
                        },
                        {
                            name: 'With 21" LCD Monitor',
                            value: 150
                        },
                        {
                            name: 'With 14-15" CRT Monitor',
                            value: 215
                        },
                        {
                            name: 'With 17-21" CRT Monitor',
                            value: 240
                        },
                    ],
                    counts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                {
                    appl: "Laptop",
                    id: 'laptop',
                    types: [
                        {
                            name: 'Select',
                            value: 0
                        },
                        {
                            name: 'Laptop (13\"-17\")',
                            value: 40
                        },
                        {
                            name: 'Netbook (10\"-12\")',
                            value: 30
                        },
                        {
                            name: 'Ultrabook',
                            value: 20
                        }
                    ],
                    counts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                {
                    appl: "LCD TV",
                    id: 'lcd',
                    types: [
                        {
                            name: 'Select',
                            value: 0
                        },
                        {
                            name: '22"',
                            value: 46
                        },
                        {
                            name: '26"',
                            value: 68
                        },
                        {
                            name: '32"',
                            value: 88
                        },
                        {
                            name: '40"',
                            value: 145
                        },
                        {
                            name: '42"',
                            value: 154
                        },
                        {
                            name: '46"',
                            value: 170
                        },
                    ],
                    counts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                {
                    appl: "LED TV",
                    id: 'led',
                    types: [
                        {
                            name: 'Select',
                            value: 0
                        },
                        {
                            name: '22"',
                            value: 60
                        },
                        {
                            name: '26"',
                            value: 60
                        },
                        {
                            name: '32"',
                            value: 60
                        },
                        {
                            name: '40"',
                            value: 60
                        },
                    ],
                    counts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                {
                    appl: "Plasma TV",
                    id: 'plasmatv',
                    types: [
                        {
                            name: 'Select',
                            value: 0
                        },
                        {
                            name: '43"',
                            value: 190
                        },
                        {
                            name: '51"',
                            value: 255
                        },
                        {
                            name: '55"',
                            value: 283
                        }
                    ],
                    counts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                {
                    appl: "Regular, CRT TV",
                    id: 'regulartv',
                    types: [
                        {
                            name: 'Select',
                            value: 0
                        },
                        {
                            name: '21"',
                            value: 100
                        },
                        {
                            name: '29"',
                            value: 120
                        }
                    ],
                    counts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                {
                    appl: "Set Top Box",
                    id: 'setupbox',
                    types: [
                        {
                            name: 'Select',
                            value: 0
                        },
                        {
                            name: 'Standard Definition STB',
                            value: 18
                        },
                        {
                            name: 'High Definition STB',
                            value: 20
                        },
                        {
                            name: 'HD Digital Video Recorder',
                            value: 36
                        },
                    ],
                    counts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                {
                    appl: "Printers",
                    id: 'printer',
                    types: [
                        {
                            name: 'Select',
                            value: 0
                        },
                        {
                            name: 'Inkjet Small',
                            value: 18
                        },
                        {
                            name: 'Inkjet Small All in One',
                            value: 18
                        },
                        {
                            name: 'Inkjet Big',
                            value: 25
                        },
                        {
                            name: 'Inkjet Big All in One',
                            value: 25
                        },
                        {
                            name: 'Laser B&W Small',
                            value: 320
                        },
                        {
                            name: 'Laser B&W Big',
                            value: 850
                        },
                        {
                            name: 'Laser Multi Function B&W Small',
                            value: 320
                        },
                        {
                            name: 'Laser Multi Function B&W Big',
                            value: 900
                        },
                        {
                            name: 'Laser Color',
                            value: 380
                        },
                        {
                            name: 'Laser Multi Color',
                            value: 400
                        },
                        {
                            name: 'Dot Matrix',
                            value: 85
                        },
                    ],
                    counts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                {
                    appl: "Scanner",
                    id: 'scanner',
                    types: [
                        {
                            name: 'Select',
                            value: 0
                        },
                        {
                            name: 'Flatbed Scanner (Home)',
                            value: 12
                        },
                        {
                            name: 'Sheetfed Scanner (Home)',
                            value: 12
                        },
                        {
                            name: 'Flatbed Scanner (Office)',
                            value: 65
                        },
                        {
                            name: 'Sheetfed Scanner (Office)',
                            value: 65
                        },
                    ],
                    counts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                {
                    appl: "Refrigerator",
                    id: 'refrigerator',
                    types: [
                        {
                            name: 'Select',
                            value: 0
                        },
                        {
                            name: '2500 Watts',
                            value: 2500
                        },
                        {
                            name: '3000 Watts',
                            value: 3000
                        },
                        {
                            name: '3500 Watts',
                            value: 3500
                        },
                    ],
                    counts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                {
                    appl: "Water Heater / Geaser",
                    id: 'waterheater',
                    types: [
                        {
                            name: 'Select',
                            value: 0
                        },
                        {
                            name: '1000 Watts',
                            value: 1000
                        },
                        {
                            name: '1500 Watts',
                            value: 1500
                        },
                        {
                            name: '2000 Watts',
                            value: 2000
                        },
                        {
                            name: '3000 Watts',
                            value: 3000
                        },
                    ],
                    counts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                {
                    appl: "AC",
                    id: 'ac',
                    types: [
                        {
                            name: 'Select',
                            value: 0
                        },
                        {
                            name: '0.8 Ton',
                            value: 1000
                        },
                        {
                            name: '1.0 Ton',
                            value: 1200
                        },
                        {
                            name: '1.5 Ton',
                            value: 1700
                        },
                        {
                            name: '2.0 Ton',
                            value: 2300
                        }
                    ],
                    counts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                {
                    appl: "Inverter AC",
                    id: 'inverterac',
                    types: [
                        {
                            name: 'Select',
                            value: 0
                        },
                        {
                            name: '0.8 Ton',
                            value: 900
                        },
                        {
                            name: '1.0 Ton',
                            value: 1100
                        },
                        {
                            name: '1.5 Ton',
                            value: 1600
                        },
                        {
                            name: '2.0 Ton',
                            value: 2100
                        }
                    ],
                    counts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                {
                    appl: "Water Pump",
                    id: 'waterpump',
                    types: [
                        {
                            name: 'Select',
                            value: 0
                        },
                        {
                            name: '0.5 HP Pump',
                            value: 400
                        },
                        {
                            name: '1 HP Pump',
                            value: 800
                        },
                    ],
                    counts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                }
            ],
        },
        template: `
        <div>
            <div class="dpc-power-calculation">
                <table class="table table-border table-hover">
                    <tr>
                        <th>Appliances</th>
                        <th>Type</th>
                        <th>No.</th>
                    </tr>
                    <tr v-for="item of items">
                        <td>{{item.appl}}</td>
                        <td>
                        <select class="form-input" @change="set_total_load($event.target.value, item.id)" :id="item.id">
                            <option v-for="type in item.types" :value="type.value" >{{type.name}}</option>
                        </select>
                        </td>
                        <td>
                        <select class="form-input" @change="set_count($event.target.value, item.id)">
                            <option>Quantity</option>
                            <option v-for="count in item.counts" :value="count">{{count}}</option>
                        </select>
                        </td>
                    </tr>
                </table>
                <button @click="onCalculate" class="button button-success-outline btn-block button-rounded">Calculate</button>
            </div>
            <h3 class="text-center">OR</h3>
            <div class="form-element">
                <label for="total_load">Total Load (in Watt)</label>
                <input class="form-input" v-model="total_load" type="text" id="total_load" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" @change="capcity">
            </div>
            <div class="form-element">
                <label for="battery_backup">Battery Backup (in Hours)</label>
                <input class="form-input" v-model="battery_backup" type="text" id="battery_backup" pattern="[0-9]+([\.,][0-9]+)?" 
                step="0.01" @input="onChangeBattery">
            </div>
            <div v-show="is_show_capcity" class="dpc-calculation-box">
                <p class="inverter-required"><strong>Inverter Size: </strong><br/><span v-html="inverter_required">{{inverter_required}}</span></p>
                <div v-show="show_battery_size">
                <p class="battery-required"><strong>Total Battery: </strong><br/><span v-html="battery_required">{{battery_required}}</span></p>
                </div>
            </div>
        </div>`
        ,
        mounted: function () {
            this.add_row();
        },
        methods: {
            getSize(actualValue, presets) {
                var watt = parseInt(actualValue);
                var presetValue;
                $.each(presets, (index, preset) => {
                    var preset_arr = index.split('_');
                    if (watt >= parseInt(preset_arr[1]) && watt <= parseInt(preset_arr[2])) {
                        presetValue = preset;
                        return false;
                    }
                });
                return presetValue;
            },
            capcity() {
                let total_load = this.total_load;
                if (total_load == '')
                    return;
                this.is_show_capcity = true;
                this.inverter_required = this.getSize(total_load, this.preset.watt);
            },
            set_total_load(value, id) {
                let total_count = this.items.length;
                for (let i = 0; i < total_count; i++) {
                    if (this.result[i].id == id) {
                        this.result[i].load = value;
                    }
                }
            },
            set_count(value, id) {
                let total_count = this.items.length;
                for (let i = 0; i < total_count; i++) {
                    if (this.result[i].id == id) {
                        this.result[i].count = value;
                    }
                }
            },
            add_row() {
                let total_count = this.items.length;
                for (let i = 0; i < total_count; i++) {
                    this.result.push({
                        id: this.items[i].id,
                        load: 0,
                        count: 0
                    });
                }
            },
            onCalculate() {
                let total_load_count = 0;
                let total_count = this.items.length;
                for (let i = 0; i < total_count; i++) {
                    if (this.result[i].load != 0 && this.result[i].count != 0) {
                        total_load_count += parseInt(this.result[i].load) * parseInt(this.result[i].count)
                    }
                }
                this.total_load = total_load_count;
                this.is_show_capcity = true;

                this.inverter_required = this.getSize(total_load_count, this.preset.watt);
            },
            onChangeBattery() {
                if (this.total_load == '' || this.battery_backup == '')
                    return;
                let load = this.total_load * this.battery_backup;
                let ah_battery = load / 12;
                let total_ah = ah_battery * 1.3;
                this.show_battery_size = true;

                this.battery_required = this.getSize(total_ah, this.preset.battery);
            },


        }
    });

})(jQuery);