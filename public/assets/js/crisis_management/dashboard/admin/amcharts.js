"use strict";

// Class definition
var KTamChartsChartsDemo = function() {


    // Private functions
    var access_chart = function() {
        if ($("#kt_charts_access_services").length > 0) {
           
        
        var chart = AmCharts.makeChart("kt_charts_access_services", {
            "rtl": true,
            "type": "serial",
            "theme": "light",
            "dataProvider":window.access_services_chart_data,
            "valueAxes": [{
                "gridColor": "#FFFFFF",
                "gridAlpha": 0.2,
                "dashLength": 0
            }],
            "gridAboveGraphs": true,
            "startDuration": 1,
            "graphs": [{
                "balloonText": "[[title]]: <b>[[value]]</b>",
                "fillAlphas": 0.8,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "access",
			
            }],
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "label",
            "categoryAxis": {
                "gridPosition": "start",
                "gridAlpha": 0,
                "tickPosition": "start",
                "tickLength": 20,
				"labelRotation": 0 // Added for rotated labels
            },
            "export": {
                "enabled": false
            }

        });
    }
}

    // Private functions
    var complaints_chart = function() {
        if ($("#kt_charts_complaints_services").length > 0) {
        var chart = AmCharts.makeChart("kt_charts_complaints_services", {
            "rtl": true,
            "type": "serial",
            "theme": "light",
            "dataProvider":window.complaints_services_chart_data,
            "valueAxes": [{
                "gridColor": "#FFFFFF",
                "gridAlpha": 0.2,
                "dashLength": 0
            }],
            "gridAboveGraphs": true,
            "startDuration": 1,
            "graphs": [{
                "balloonText": "[[title]]: <b>[[value]]</b>",
                "fillAlphas": 0.8,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "complaints_count",
		
            }],
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "label",
            "categoryAxis": {
                "gridPosition": "start",
                "gridAlpha": 0,
                "tickPosition": "start",
                "tickLength": 20,
				"labelRotation": 0 // Added for rotated labels
            },
            "export": {
                "enabled": false
            }

        });
    }
    }
	// notes chart

    // Private functions
    var notes_chart = function() {
        if ($("#kt_charts_notes_services").length > 0) {
        var chart = AmCharts.makeChart("kt_charts_notes_services", {
            "rtl": KTUtil.isRTL(),
            "type": "serial",
            "theme": "light",
            "dataProvider":window.notes_services_chart_data,
            "valueAxes": [{
                "gridColor": "#FFFFFF",
                "gridAlpha": 0.2,
                "dashLength": 0
            }],
            "gridAboveGraphs": true,
            "startDuration": 1,
            "graphs": [{
                "balloonText": "[[title]]: <b>[[value]]</b>",
                "fillAlphas": 0.8,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "notes_count",
		
            }],
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "label",
            "categoryAxis": {
                "gridPosition": "start",
                "gridAlpha": 0,
                "tickPosition": "start",
                "tickLength": 20,
				"labelRotation": 0 // Added for rotated labels
            },
            "export": {
                "enabled": false
            }

        });
    }
    }



    var opinions_chart = function() {
        if ($("#kt_charts_opinions").length > 0) {
	// opinions chart
	const opinions_data=[];
	for(var count=0 ; count<window.opinions_chart_data.length ; count++){
		opinions_data[count]={
			"rating":opinions_chart_data[count].rating,
			"opinions":  window.opinions_chart_data[count].number_of_opinions,
		
		};
	}


        var chart = AmCharts.makeChart("kt_charts_opinions", {
            "type": "pie",
            "theme": "light",
            "dataProvider":opinions_data,
            "valueField": "opinions",
            "titleField": "rating",
            "balloon": {
                "fixedPosition": true
            },
            "export": {
                "enabled": false
            }
        });
    }
}

    var contributions_chart = function() {
        if ($("#kt_charts_contributions").length > 0) {

	// contributions chart
	const contributions_data=[];

	for(var count=0 ; count<window.contributions_chart_data.length ; count++){
           // Assign color based on status
    let color;
    let status=system_translation[window.contributions_chart_data[count].status];
    switch (window.contributions_chart_data[count].status.toLowerCase()) {
        case "pending":
            color = "#ffc107"; // Warning (yellow)
            
            break;
        case "rejected":
            color = "#dc3545"; // Danger (red)
            break;
        case "accepted":
            color = "#28a745"; // Success (green)
            break;
        default:
            color = "#6c757d"; // Default (gray)
    }
		contributions_data[count]={
			"status":status,
			"contributions":  window.contributions_chart_data[count].number_of_contributions,
            "color": color // Add the color field
		
		};
	}



        var chart = AmCharts.makeChart("kt_charts_contributions", {
            "type": "pie",
            "theme": "light",
            "dataProvider":contributions_data,
            "valueField": "contributions",
            "titleField": "status",
            "colorField": "color", // Use the color field
            "balloon": {
                "fixedPosition": true
            },
        
            "export": {
                "enabled": false
            }
        });
    }
}



    var news_chart = function() {
        if ($("#kt_charts_news").length > 0) {
        var chart = AmCharts.makeChart("kt_charts_news", {
            "type": "serial",
            "theme": "light",
            "marginRight": 40,
            "marginLeft": 40,
            "autoMarginOffset": 20,
            "mouseWheelZoomEnabled": true,
            "dataDateFormat": "YYYY-MM-DD",
            "valueAxes": [{
                "id": "v1",
                "axisAlpha": 0,
                "position": "left",
                "ignoreAxisWidth": true
            }],
            "balloon": {
                "borderThickness": 1,
                "shadowAlpha": 0
            },
            "graphs": [{
                "id": "g1",
                "balloon": {
                    "drop": true,
                    "adjustBorderColor": false,
                    "color": "#ffffff"
                },
                "bullet": "round",
                "bulletBorderAlpha": 1,
                "bulletColor": "#FFFFFF",
                "bulletSize": 5,
                "hideBulletsCount": 50,
                "lineThickness": 2,
                "title": "red line",
                "useLineColorForBulletBorder": true,
                "valueField": "value",
                "balloonText": "<span  style='font-size:15px;'>[[value]]</span>"
            }],
            "chartScrollbar": {
                "graph": "g1",
                "oppositeAxis": false,
                "offset": 30,
                "scrollbarHeight": 80,
                "backgroundAlpha": 0,
                "selectedBackgroundAlpha": 0.1,
                "selectedBackgroundColor": "#888888",
                "graphFillAlpha": 0,
                "graphLineAlpha": 0.5,
                "selectedGraphFillAlpha": 0,
                "selectedGraphLineAlpha": 1,
                "autoGridCount": true,
                "color": "#AAAAAA"
            },
            "chartCursor": {
                "pan": true,
                "valueLineEnabled": true,
                "valueLineBalloonEnabled": true,
                "cursorAlpha": 1,
                "cursorColor": "#258cbb",
                "limitToGraph": "g1",
                "valueLineAlpha": 0.2,
                "valueZoomable": true
            },
            "valueScrollbar": {
                "oppositeAxis": false,
                "offset": 50,
                "scrollbarHeight": 10
            },
            "categoryField": "date",
            "categoryAxis": {
                "parseDates": true,
                "dashLength": 1,
                "minorGridEnabled": true
            },
            "export": {
                "enabled": false
            },
            "dataProvider":  window.news_chart_data
        });

        chart.addListener("rendered", zoomChart);

        zoomChart();

        function zoomChart() {
            chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
        }
    }
}

    var links_chart = function() {
        if ($("#kt_charts_links").length > 0) {
        var chart = AmCharts.makeChart("kt_charts_links", {
            "rtl": KTUtil.isRTL(),
            "type": "serial",
            "theme": "light",
            "dataProvider":window.links_chart_data,
            "valueAxes": [{
                "gridColor": "#FFFFFF",
                "gridAlpha": 0.2,
                "dashLength": 0
            }],
            "gridAboveGraphs": true,
            "startDuration": 1,
            "graphs": [{
                "balloonText": "[[title]]: <b>[[copied]]</b>",
                "fillAlphas": 0.8,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "copied",
				
            }],
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "label",
            "categoryAxis": {
                "gridPosition": "start",
                "gridAlpha": 0,
                "tickPosition": "start",
                "tickLength": 20,
				"labelRotation": 0 // Added for rotated labels
            },
            "export": {
                "enabled": false
            }

        });
    }
    }
    var institutions_complaints_chart = function() {
        if ($("#kt_charts_institutions_complaints").length > 0) {
        var chart = AmCharts.makeChart("kt_charts_institutions_complaints", {
            "rtl": KTUtil.isRTL(),
            "type": "serial",
            "theme": "light",
            "dataProvider":window.institutions_complaints_chart_data,
            "valueAxes": [{
                "gridColor": "#FFFFFF",
                "gridAlpha": 0.2,
                "dashLength": 0
            }],
            "gridAboveGraphs": true,
            "startDuration": 1,
            "graphs": [{
                "balloonText": "[[label]]: <b>[[value]]</b>",
                "fillAlphas": 0.8,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "complaints_count",
			
            }],
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "label",
            "categoryAxis": {
                "gridPosition": "start",
                "gridAlpha": 0,
                "tickPosition": "start",
                "tickLength": 20,
				"labelRotation": 0 // Added for rotated labels
            },
            "export": {
                "enabled": false
            }

        });
    }
}
    return {
        // public functions
        init: function() {
            access_chart();
            complaints_chart();
            notes_chart();
            opinions_chart();
            contributions_chart();
            news_chart();
            links_chart();
            institutions_complaints_chart();

        }
    };
}();

jQuery(document).ready(function() {
    KTamChartsChartsDemo.init();
});