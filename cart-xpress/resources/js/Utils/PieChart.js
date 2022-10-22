'use strict';

import { GoogleCharts } from 'google-charts';

export default function PieChart(title, data, HTMLComponent) {
    this.title = title;
    this.data = data;
    this.HTMLComponent = HTMLComponent;

    this.drawChart;

    this.init = () => {

        this.drawChart = () => {

            const data = GoogleCharts.api.visualization.arrayToDataTable([
                ['Chart thing', 'Chart amount'],
                ...this.data
            ]);

            let options = {

                width: '100%',
                height: '80%',

                pieSliceTextStyle: {
                    color: 'white',
                },

                legend: {
                    position: 'left',
                    textStyle: {
                        color: 'white',
                        fontSize: 13,
                        fontName: 'EncodeSans'
                    }
                },

                titleTextStyle: {
                    color: 'white',
                    fontSize: 13,
                    fontName: 'EncodeSans'
                },

                backgroundColor: {
                    fill: '#FFF',
                    fillOpacity: 0
                },
            };

            let chart = new GoogleCharts.api.visualization.PieChart(this.HTMLComponent);
            chart.draw(data, options);
        };
    };

    this.load = () => {
        GoogleCharts.load(this.drawChart);
    };

}