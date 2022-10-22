'use strict';

$(document).ready(() => {

    /*---------------------------------------------------INSTANCE VARIABLE----*/

    /*---------------------------------------------------OBJECT INSTANTIATION----*/

    /*---------------------------------------------------METHOD INSTANTIATION----*/
    
    /*---------------------------------------------------INVOKE METHODS----*/
    // display the origanization chart
    $(function() {
        $("#organisation").orgChart({container: $("#main")});
    });

    // invoke if the rest is ready
    $(document).ready(() => {
        const orgChart = $('.orgChart');
        let table = $('.orgChart > table');
           
        // center element horizontally
        orgChart.scrollLeft( (table.width() - orgChart.width()) / 2);
    });

});