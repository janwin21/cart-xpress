'use strict';

$(document).ready(() => {

    /*---------------------------------------------------INSTANCE VARIABLE----*/
    const chartContainers = $('.chart-container');

    // chart data
    const data = [
        [
            ['A', 10],
            ['B', 5],
            ['C', 12]
        ],
        [
            ['D', 1],
            ['E', 8],
            ['F', 22]
        ],
    ];

    /*---------------------------------------------------OBJECT INSTANTIATION----*/

    /*---------------------------------------------------METHOD INSTANTIATION----*/
    // loop chart containers
    chartContainers.each((i, chartContainer) => {
        const pieChart = new PieChart('Letters', data[i], chartContainer);

        pieChart.init();
        pieChart.load();
    });
    
    /*---------------------------------------------------INVOKE METHODS----*/

});