'use strict';

function PieChart(title, data, HTMLComponent) {
    this.title = title;
    this.data = data;
    this.HTMLComponent = HTMLComponent;

    this.drawChart;

    this.init = () => {
        google.charts.load('current', {'packages':['corechart']});

        this.drawChart = () => {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Pizza');
            data.addColumn('number', 'Populartiy');
            data.addRows(this.data);

            var options = {
                title: this.title,
                sliceVisibilityThreshold: .1
            };

            var chart = new google.visualization.PieChart(this.HTMLComponent);
            chart.draw(data, options);
        };
    };

    this.load = () => {
        google.charts.setOnLoadCallback(this.drawChart);
    };

}