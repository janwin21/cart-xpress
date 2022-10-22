'use strict';

import PieChart from '../Utils/PieChart';

export function callShop() {

    /*---------------------------------------------------INSTANCE VARIABLE----*/

    /*---------------------------------------------------OBJECT INSTANTIATION----*/

    /*---------------------------------------------------METHOD INSTANTIATION----*/
    // loop chart containers
    function iterateChart(containers, data) {
        
        console.log(containers.length);
        containers.each((i, chartContainer) => {
            const pieChart = new PieChart('Letters', data[i], chartContainer);

            pieChart.init();
            pieChart.load();
        });
        
    }
    /*---------------------------------------------------INVOKE METHODS----*/

    return {
        iterateChart
    };

}