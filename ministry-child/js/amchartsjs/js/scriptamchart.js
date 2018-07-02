/********************************
=================================
    GROSS DOMESTIC PRODUCT
==================================
**********************************/



var chart = AmCharts.makeChart("gdpgrowth", {
   "type": "serial",
    "theme": "light",
    "hideCredits":true,
    "marginRight": 40,
    "marginLeft": 40,
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
    "autoMarginOffset": 20,
    "mouseWheelZoomEnabled":false,
    "mouseWheelScrollEnabled": false,
    "dataDateFormat": "YYYY",
    "valueAxes": [{
        "id": "v1",
        "axisAlpha": 0,
        "position": "left",
		"axisColor": "#cccccc",
        "gridThickness": 0,
        "labelsEnabled":false,
        "ignoreAxisWidth":true,
        "minimum": 1
    }],
    "balloon": {
        "borderThickness": 1,
        "shadowAlpha": 0
    },
    "graphs": [{
        "id": "g1",
        "balloon":{
          "drop":true,
          "adjustBorderColor":false,
          "color":"#ffffff"
        },
        "bullet": "round",
        "bulletBorderAlpha": 1,
		"labelText": "[[value]]"+"%",
   		 "showBalloon": false,
        "bulletColor": "#FFFFFF",
        "bulletSize": 5,
        "hideBulletsCount": 50,
        "lineThickness": 2,
        "title": "red line",
        "useLineColorForBulletBorder": true,
        "valueField": "value",
        "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
    }],
    "chartScrollbar": {
        "graph": "g1",
        "enabled": false,
        "oppositeAxis":false,
        "offset":30,
        "scrollbarHeight": 80,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#888888",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0,
        "selectedGraphLineAlpha": 1,
        "autoGridCount":true,
        "color":"#AAAAAA"
    },
    "chartCursor": {
        "pan": true,
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "cursorAlpha":1,
        "cursorColor":"#258cbb",
        "limitToGraph":"g1",
        "valueLineAlpha":0.2,
        "valueZoomable":true
    },
    "valueScrollbar":{
        "enabled": false,
      "oppositeAxis":false,
      "offset":50,
      "scrollbarHeight":10
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": false,
        "dashLength": 1,
        "gridThickness": 0,
		"axisColor": "#cccccc",
        "minorGridEnabled": true
    },
    "export": {
        "enabled": true
    },
    "dataProvider": [{
        "date": "2012",
        "value": 5.5
    },{
        "date": "2013",
        "value": 6.4
    },{
        "date": "2014",
        "value": 7.5
    },{
        "date": "2015",
        "value": 8.0
    },{
        "date": "2016",
        "value": 7.1
    }]
});

var chart = AmCharts.makeChart("gdpgrowth1", {
   "type": "serial",
    "theme": "light",
    "hideCredits":true,
    "marginRight": 40,
    "marginLeft": 40,
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
    "autoMarginOffset": 20,
    "mouseWheelZoomEnabled":true,
    "dataDateFormat": "YYYY",
    "valueAxes": [{
        "id": "v1",
        "axisAlpha": 0,
        "position": "left",
		"axisColor": "#cccccc",
        "gridThickness": 0,
        "labelsEnabled":false,
        "ignoreAxisWidth":true,
        "minimum": 1
    }],
    "balloon": {
        "borderThickness": 1,
        "shadowAlpha": 0
    },
    "graphs": [{
        "id": "g1",
        "balloon":{
          "drop":true,
          "adjustBorderColor":false,
          "color":"#ffffff"
        },
        "bullet": "round",
        "bulletBorderAlpha": 1,
		"labelText": "[[value]]",
   		 "showBalloon": false,
        "bulletColor": "#FFFFFF",
        "bulletSize": 5,
        "hideBulletsCount": 50,
        "lineThickness": 2,
        "title": "red line",
        "useLineColorForBulletBorder": true,
        "valueField": "value",
        "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
    }],
    "chartScrollbar": {
        "graph": "g1",
        "enabled": false,
        "oppositeAxis":false,
        "offset":30,
        "scrollbarHeight": 80,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#888888",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0,
        "selectedGraphLineAlpha": 1,
        "autoGridCount":true,
        "color":"#AAAAAA"
    },
    "chartCursor": {
        "pan": true,
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "cursorAlpha":1,
        "cursorColor":"#258cbb",
        "limitToGraph":"g1",
        "valueLineAlpha":0.2,
        "valueZoomable":true
    },
    "valueScrollbar":{
        "enabled": false,
      "oppositeAxis":false,
      "offset":50,
      "scrollbarHeight":10
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": false,
        "dashLength": 1,
        "gridThickness": 0,
		"axisColor": "#cccccc",
        "minorGridEnabled": true
    },
    "export": {
        "enabled": true
    },
    "dataProvider": [{
        "date": "2012",
        "value": 5.6
    },{
        "date": "2013",
        "value": 6.6
    },{
        "date": "2014",
        "value": 7.5
    },{
        "date": "2015",
        "value": 8.0
    },{
        "date": "2016",
        "value": 7.1
    }]
});


//economy growth
var chart = AmCharts.makeChart("economygrowth", {
     "type": "serial",
    "theme": "light",
    "hideCredits":true,
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
    "marginRight": 40,
    "marginLeft": 40,
    "autoMarginOffset": 20,
    "mouseWheelZoomEnabled":false,
    "mouseWheelScrollEnabled": false,
    "dataDateFormat": "YYYY",
    "valueAxes": [{
        "id": "v1",
        "axisAlpha": 0,
        "position": "left",
        "labelsEnabled":false,
        "ignoreAxisWidth":true,
		"axisColor": "#cccccc",
        "gridThickness": 0,
        "minimum": 1
    }],
    "balloon": {
        "borderThickness": 1,
        "shadowAlpha": 0
    },
    "graphs": [{
        "id": "g1",
        "balloon":{
          "drop":true,
          "adjustBorderColor":false,
          "color":"#ffffff"
        },
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
		"labelText": "[[value]]",
    	"showBalloon": false,
        "bulletSize": 5,
        "hideBulletsCount": 50,
        "lineThickness": 2,
        "title": "red line",
        "useLineColorForBulletBorder": true,
        "valueField": "value",
        "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
    }],
    "chartScrollbar": {
        "graph": "g1",
        "enabled": false,
        "oppositeAxis":false,
        "offset":30,
        "scrollbarHeight": 80,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#888888",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0,
        "selectedGraphLineAlpha": 1,
        "autoGridCount":true,
        "color":"#AAAAAA"
    },
    "chartCursor": {
        "pan": true,
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "cursorAlpha":1,
        "cursorColor":"#258cbb",
        "limitToGraph":"g1",
        "valueLineAlpha":0.2,
        "valueZoomable":true
    },
    "valueScrollbar":{
        "enabled": false,
      "oppositeAxis":false,
      "offset":50,
      "scrollbarHeight":10
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": false,
        "dashLength": 1,
		"axisColor": "#cccccc",
        "gridThickness": 0,
        "minorGridEnabled": true
    },
    "export": {
        "enabled": true
    },
    "dataProvider": [{
        "date": "2014",
        "value": 2.04
    },{
        "date": "2015",
        "value": 2.11
    },{
        "date": "2016",
        "value": 2.26
    }]
});

var chart = AmCharts.makeChart("economygrowth1", {
     "type": "serial",
    "theme": "light",
    "hideCredits":true,
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
    "marginRight": 40,
    "marginLeft": 40,
    "autoMarginOffset": 20,
    "mouseWheelZoomEnabled":false,
    "mouseWheelScrollEnabled": false,
    "dataDateFormat": "YYYY",
    "valueAxes": [{
        "id": "v1",
        "axisAlpha": 0,
        "position": "left",
        "labelsEnabled":false,
        "ignoreAxisWidth":true,
		"axisColor": "#cccccc",
        "gridThickness": 0,
        "minimum": 1
    }],
    "balloon": {
        "borderThickness": 1,
        "shadowAlpha": 0
    },
    "graphs": [{
        "id": "g1",
        "balloon":{
          "drop":true,
          "adjustBorderColor":false,
          "color":"#ffffff"
        },
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
		"labelText": "[[value]]",
    	"showBalloon": false,
        "bulletSize": 5,
        "hideBulletsCount": 50,
        "lineThickness": 2,
        "title": "red line",
        "useLineColorForBulletBorder": true,
        "valueField": "value",
        "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
    }],
    "chartScrollbar": {
        "graph": "g1",
        "enabled": false,
        "oppositeAxis":false,
        "offset":30,
        "scrollbarHeight": 80,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#888888",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0,
        "selectedGraphLineAlpha": 1,
        "autoGridCount":true,
        "color":"#AAAAAA"
    },
    "chartCursor": {
        "pan": true,
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "cursorAlpha":1,
        "cursorColor":"#258cbb",
        "limitToGraph":"g1",
        "valueLineAlpha":0.2,
        "valueZoomable":true
    },
    "valueScrollbar":{
        "enabled": false,
      "oppositeAxis":false,
      "offset":50,
      "scrollbarHeight":10
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": false,
        "dashLength": 1,
		"axisColor": "#cccccc",
        "gridThickness": 0,
        "minorGridEnabled": true
    },
    "export": {
        "enabled": true
    },
    "dataProvider": [{
        "date": "2014",
        "value": 2.04
    },{
        "date": "2015",
        "value": 2.11
    },{
        "date": "2016",
        "value": 2.26
    }]
});


//sectrol contribution to GDP

var chart = AmCharts.makeChart( "gdppie", {
  "type": "pie",
  "theme": "light",
    "hideCredits":true,
	"fontFamily":"'Open Sans', sans-serif",
  "fontSize":15,
  "balloon": {
    "enabled": false
  },
  "dataProvider": [ {
    "title": "Agriculture",
    "value": 17.5
  }, {
    "title": "Industry",
    "value": 29.6
  }, {
    "title": "Services",
    "value": 53
  }],
  "titleField": "title",
  "valueField": "value",
  "labelRadius": 5,
  "labelRadius": -20,
  "radius": "42%",
  "innerRadius": "60%",
  "labelText": "[[title]]",
  "export": {
    "enabled": true
  }
} );
//gross fiscal deficit
var chart = AmCharts.makeChart( "gdpfiscal", {
  "type": "serial",
  "theme": "light",
    "hideCredits":true,
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
  "dataProvider": [ {
    "country": "2013-14",
    "visits": 78,
      "color":"#981B1E"
  }, {
    "country": "2014-15",
    "visits": 79.2,
      "color":"#981B1E"
  }, {
    "country": "2015-16",
    "visits": 82.6,
      "color":"#981B1E"
  }, {
    "country": "2016-17",
    "visits": 82.8,
      "color":"#981B1E"
  }
  // , {
  //   "country": "2017-18",
  //   "visits": 83.5,
  //     "color":"#981B1E"
  // }
  ],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0,
        "axisAlpha": 0,
      "labelsEnabled":false,
    "dashLength": 0,
      "gridThickness": 0,
      "minimum": 1
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "showBalloon":false,
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
      "labelText":"[[visits]]",
      "colorField": "color",
    "valueField": "visits"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
	"labelFrequency":1,
	"axisColor": "#cccccc",
    "tickPosition": "start",
      "gridThickness": 0,
	"labelOffset": 0,
"autoGridCount": false,
    "gridCount": 12,
    "tickLength": 0,
	"labelRotation": 90
  },
  "export": {
    "enabled": true
  }

} );

var chart = AmCharts.makeChart( "gdppie", {
  "type": "pie",
    "hideCredits":true,
  "theme": "light",
	"fontFamily":"'Open Sans', sans-serif",
    "fontSize":15,
  "balloon": {
    "enabled": false
  },
  "dataProvider": [ {
    "title": "Agriculture - 17.5%",
    "value": 17.5
  }, {
    "title": "Industry - 29.5%",
    "value": 29.5
  }, {
    "title": "Services - 53%",
    "value": 53
  }],
  "titleField": "title",
  "valueField": "value",
  "labelRadius": 5,
    "labelRadius": -20,
  "radius": "42%",
  "innerRadius": "60%",
"labelText": "[[title]]",
  "export": {
    "enabled": true
  }
} );
//gross fiscal deficit
var chart = AmCharts.makeChart( "gdpfiscal1", {
  "type": "serial",
  "theme": "light",
    "hideCredits":true,
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
  "dataProvider": [ {
    "country": "2013-14",
    "visits": 76.9,
      "color":"#981B1E"
  }, {
    "country": "2014-15",
    "visits": 78.1,
      "color":"#981B1E"
  }, {
    "country": "2015-16",
    "visits": 81.4,
      "color":"#981B1E"
  }, {
    "country": "2016-17",
    "visits": 81.7,
      "color":"#981B1E"
  }, {
    "country": "2017-18",
    "visits": 83.5,
      "color":"#981B1E"
  }],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0,
        "axisAlpha": 0,
      "labelsEnabled":false,
    "dashLength": 0,
      "gridThickness": 0,
      "minimum": 1
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
      "labelText":"[[visits]]",
      "colorField": "color",
    "valueField": "visits"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
	"labelFrequency":1,
	"axisColor": "#cccccc",
    "tickPosition": "start",
      "gridThickness": 0,
	"labelOffset": 0,
"autoGridCount": false,
    "gridCount": 12,
    "tickLength": 0,
	"labelRotation": 90
  },
  "export": {
    "enabled": true
  }

} );


//top 5 countries of import 
var chart = AmCharts.makeChart("topimportcountries", {
	"type": "serial",
     "theme": "light",
    "hideCredits":true,
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
    "autoMargins" : true,
	"categoryField": "year",
	"startDuration": 1,
	"trendLines": [],
	"graphs": [
		{
      "showBalloon": false,
			"balloonText": "Apr-Jul 2016:[[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-1",
			"lineAlpha": 0.2,
			"title": "Income",
			"type": "column",
			"valueField": "income"
		},
		{
      "showBalloon": false,
			"balloonText": "Apr-Jul 2017(P):[[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-2",
			"lineAlpha": 0.2,
			"title": "Expenses",
			"type": "column",
			"valueField": "expenses"
		}
	],
	"guides": [],
	"valueAxes": [
		{
        "id": "ValueAxis-1",
        "position": "bottom",
        "axisAlpha": 0,
        "minimum": 1,
        "axisColor": "#cccccc",
        "gridThickness": 0
		}
	],
    "categoryAxis": {
		"gridPosition": "start",
		"position": "left",
        "labelRotation": 90,
         "axisColor": "#cccccc",
"autoGridCount": false,
    "gridCount": 12,
//        "inside": true,
            "gridThickness": 0
	},
    valueAxesSettings: {
    "inside": true
  },
	"allLabels": [],
	"balloon": {},
	"titles": [],
	"dataProvider": [
		{
			"year": "CHINA",
			"income": 34.9,
			"expenses": 43.5

		},
		{
			"year": "UAE",
			"income": 11.6,
			"expenses": 13

		},
		{
			"year": "USA",
			"income": 12.4,
			"expenses": 14.1

		},
		{
			"year": "SWITZERLAND",
			"income": 7.9,
			"expenses": 11.3

		},
		{
			"year": "SAUDI ARAB",
			"income": 11,
			"expenses": 12

		}
	],
    "export": {
    	"enabled": true
     }

});

var chart = AmCharts.makeChart("topimportcountries1", {
	"type": "serial",
     "theme": "light",
    "hideCredits":true,
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
    "autoMargins" : true,
	"categoryField": "year",
	"startDuration": 1,
	"trendLines": [],
	"graphs": [
		{
			"balloonText": "Apr-Jul 2016:[[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-1",
			"lineAlpha": 0.2,
			"title": "Income",
			"type": "column",
			"valueField": "income"
		},
		{
			"balloonText": "Apr-Jul 2017(P):[[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-2",
			"lineAlpha": 0.2,
			"title": "Expenses",
			"type": "column",
			"valueField": "expenses"
		}
	],
	"guides": [],
	"valueAxes": [
		{
        "id": "ValueAxis-1",
        "position": "bottom",
        "axisAlpha": 0,
        "minimum": 1,
        "axisColor": "#cccccc",
        "gridThickness": 0
		}
	],
    "categoryAxis": {
		"gridPosition": "start",
		"position": "left",
        "labelRotation": 90,
         "axisColor": "#cccccc",
"autoGridCount": false,
    "gridCount": 12,
//        "inside": true,
            "gridThickness": 0
	},
    valueAxesSettings: {
    "inside": true
  },
	"allLabels": [],
	"balloon": {},
	"titles": [],
	"dataProvider": [
		{
			"year": "CHINA",
			"income": 18588.19,
			"expenses": 24114.33

		},
		{
			"year": "UAE",
			"income": 6557.54,
			"expenses": 7938.14

		},
		{
			"year": "USA",
			"income": 6268.59,
			"expenses": 7781.16

		},
		{
			"year": "SWITZERLAND",
			"income": 3750.61,
			"expenses": 7589.42

		},
		{
			"year": "SAUDI ARAB",
			"income": 6228.36,
			"expenses": 6426.99

		}
	],
    "export": {
    	"enabled": true
     }

});

//Top 5 Countries of Export
var chart = AmCharts.makeChart("topexportcountries", {
	"type": "serial",
    "hideCredits":true,
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
    "theme": "light",
    "autoMargins" : true,
   "categoryField": "year",
	"startDuration": 1,
	"categoryAxis": {
		"gridPosition": "start",
		"position": "left",
        "labelRotation": 90,
"autoGridCount": false,
    "gridCount": 12,
         "axisColor": "#cccccc",
            "gridThickness": 0
	},
	"trendLines": [],
	"graphs": [
		{
      "showBalloon": false,
			"balloonText": "Apr-Jul 2016:[[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-1",
			"lineAlpha": 0.2,
			"title": "Income",
			"type": "column",
			"valueField": "income"
		},
		{
			"showBalloon": false,
      "balloonText": "Apr-Jul 2017(P):[[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-2",
			"lineAlpha": 0.2,
			"title": "Expenses",
			"type": "column",
			"valueField": "expenses"
		}
	],
	"guides": [],
	"valueAxes": [
		{
			"id": "ValueAxis-1",
			"position": "bottom",
			"axisAlpha": 0,
            "axisColor": "#cccccc",
            "gridThickness": 0,
        "minimum": 0
		}
	],
	"allLabels": [],
	"balloon": {},
	"titles": [],
	"dataProvider": [
		{
			"year": "CHINA",
			"income": 4.7,
			"expenses": 6.7

		},
		{
			"year": "HONG KONG",
			"income": 8.2,
			"expenses": 8.8

		},
		{
			"year": "SINGAPORE",
			"income": 4.8,
			"expenses": 6.3

		},
		{
			"year": "USA",
			"income": 25.1,
			"expenses": 27.2

		},
		{
			"year": "UAE",
			"income": 18.6,
			"expenses": 17.2

		}
	],
    "export": {
    	"enabled": true
     }

});

var chart = AmCharts.makeChart("topexportcountries1", {
	"type": "serial",
    "hideCredits":true,
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
     "theme": "light",
    "autoMargins" : true,
	"categoryField": "year",
	"startDuration": 1,
	"categoryAxis": {
		"gridPosition": "start",
		"position": "left",
        "labelRotation": 90,
"autoGridCount": false,
    "gridCount": 12,
         "axisColor": "#cccccc",
            "gridThickness": 0
	},
	"trendLines": [],
	"graphs": [
		{
			"balloonText": "Apr-Jul 2016:[[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-1",
			"lineAlpha": 0.2,
			"title": "Income",
			"type": "column",
			"valueField": "income"
		},
		{
			"balloonText": "Apr-Jul 2017(P):[[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-2",
			"lineAlpha": 0.2,
			"title": "Expenses",
			"type": "column",
			"valueField": "expenses"
		}
	],
	"guides": [],
	"valueAxes": [
		{
			"id": "ValueAxis-1",
			"position": "bottom",
			"axisAlpha": 0,
            "axisColor": "#cccccc",
            "gridThickness": 0,
        "minimum": 0
		}
	],
	"allLabels": [],
	"balloon": {},
	"titles": [],
	"dataProvider": [
		{
			"year": "CHINA",
			"income": 2649.54,
			"expenses": 3377.03

		},
		{
			"year": "HONG KONG",
			"income": 4298.93,
			"expenses": 5047.82

		},
		{
			"year": "SINGAPORE",
			"income": 2762.94,
			"expenses": 3488.03

		},
		{
			"year": "USA",
			"income": 13717.19,
			"expenses": 15385.00

		},
		{
			"year": "SAUDI ARAB",
			"income": 10753.01,
			"expenses": 10284.42

		}
	],
    "export": {
    	"enabled": true
     }

});

//Total Trade : Top 10 Countries 

var chart = AmCharts.makeChart( "toptradecountries", {
  "type": "serial",
  "theme": "light",
    "hideCredits":true,
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
    "rotate": true,
  "dataProvider": [ {
    "country": "China",
    "visits": 71.48

  }, {
    "country": "USA",
    "visits": 64.67
  }, {
    "country": "UAE",
    "visits": 52.80
  }, {
    "country": "Saudi Arab",
    "visits": 25.08
  }, {
    "country": "Hong Kong ",
    "visits": 22.36
  }, {
    "country": "Germany",
    "visits": 18.80
  }, {
    "country": "Switzerland",
    "visits": 18.23
  }, {
    "country": "Indonesia",
    "visits": 16.94
  }, {
    "country": "S. Korea",
    "visits": 16.84
  }, {
    "country": "Singapore",
    "visits": 16.66
  }],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0,
      "axisColor": "#cccccc",
    "dashLength": 0,
        "minimum": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
        "axisAlpha": 0,
    "tickPosition": "center",
    "tickLength": 0,
      "inside": true,
       "axisColor": "#cccccc",
      "autoGridCount" : true,
      "showLastLabel" : true
  },
  "export": {
    "enabled": true
  }

} );

var chart = AmCharts.makeChart( "toptradecountries1", {
  "type": "serial",
  "theme": "light",
    "hideCredits":true,
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
    "rotate": true,
  "dataProvider": [ {
    "country": "China",
    "visits": 71.48

  }, {
    "country": "USA",
    "visits": 64.67
  }, {
    "country": "UAE",
    "visits": 52.80
  }, {
    "country": "Saudi Arab",
    "visits": 25.08
  }, {
    "country": "Hong Kong ",
    "visits": 22.36
  }, {
    "country": "Germany",
    "visits": 18.80
  }, {
    "country": "Switzerland",
    "visits": 18.23
  }, {
    "country": "Indonesia",
    "visits": 16.94
  }, {
    "country": "S. Korea",
    "visits": 16.84
  }, {
    "country": "Singapore",
    "visits": 16.66
  }],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0,
      "axisColor": "#cccccc",
    "dashLength": 0,
        "minimum": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
        "axisAlpha": 0,
    "tickPosition": "center",
    "tickLength": 0,
      "inside": true,
       "axisColor": "#cccccc",
      "autoGridCount" : true,
      "showLastLabel" : true
  },
  "export": {
    "enabled": true
  }

} );

//India Trade : Region Wise

var chart = AmCharts.makeChart( "indiantraderegion", {
  "type": "serial",
  "theme": "light",
    "hideCredits":true,
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
    "rotate": true,
  "dataProvider": [ {
    "country": "East Asia ",
    "visits": 129.78

  }, {
    "country": "West Asia- GCC",
    "visits": 97.03
  }, {
    "country": "EU Countries",
    "visits": 89.38
  }, {
    "country": "North America ",
    "visits": 77.23
  }, {
    "country": "ASEAN ",
    "visits": 71.69
  }, {
    "country": "African Countries",
    "visits": 51.99
  }, {
    "country": "Latin America",
    "visits": 24.55
  }, {
    "country": "South Asia",
    "visits": 21.91
  }, {
    "country": "Oceania",
    "visits": 15.21
  }],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0,
      "axisColor":"#cccccc",
    "dashLength": 0,
        "minimum": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
        "axisAlpha": 0,
    "gridAlpha": 0,
      "axisColor":"#cccccc",
      "inside": true,
    "tickPosition": "center",
    "tickLength": 0
  },
  "export": {
    "enabled": true
  }

} );

var chart = AmCharts.makeChart( "indiantraderegion1", {
  "type": "serial",
  "theme": "light",
    "hideCredits":true,
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
    "rotate": true,
  "dataProvider": [ {
    "country": "East Asia ",
    "visits": 129.78

  }, {
    "country": "West Asia- GCC",
    "visits": 97.03
  }, {
    "country": "EU Countries",
    "visits": 89.38
  }, {
    "country": "North America ",
    "visits": 77.23
  }, {
    "country": "ASEAN ",
    "visits": 71.69
  }, {
    "country": "African Countries",
    "visits": 51.99
  }, {
    "country": "Latin America",
    "visits": 24.55
  }, {
    "country": "South Asia",
    "visits": 21.91
  }, {
    "country": "Oceania",
    "visits": 15.21
  }],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0,
      "axisColor":"#cccccc",
    "dashLength": 0,
        "minimum": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
        "axisAlpha": 0,
    "gridAlpha": 0,
      "axisColor":"#cccccc",
      "inside": true,
    "tickPosition": "center",
    "tickLength": 0
  },
  "export": {
    "enabled": true
  }

} );

//India Foreign Exchange reserves
var chart = AmCharts.makeChart("indianforeignexchange", {
    "type": "serial",
    "hideCredits":true,
    "theme": "light",
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
    "marginRight": 10,
    "dataProvider": [{
        "lineColor": "#FDDB35",
        "date": "2012-13",
        "duration": 292
    }, {
        "lineColor": "#FF8533",
        "date": "2013-14",
        "duration": 304
    }, {
        "lineColor": "#fbd51a",
        "date": "2014-15",
        "duration": 341
    }, {
        "lineColor": "#ffbb11",
        "date": "2015-16",
        "duration": 360
    }, {
        "lineColor": "#fbd51a",
        "date": "2016-17",
        "duration": 369
    }],
    "balloon": {
        "cornerRadius": 6,
        "horizontalPadding": 15,
        "verticalPadding": 10
    },
    "graphs": [{
        "bullet": "square",
        "bulletBorderAlpha": 1,
        "bulletBorderThickness": 1,
        "fillAlphas": 0.3,
        "labelText":"[[duration]]",
        "fillColorsField": "lineColor",
        "legendValueText": "[[value]]",
        "lineColorField": "lineColor",
        "title": "duration",
        "valueField": "duration"
    }],
    "valueAxes": [ {
        "gridThickness":0,
        "axisAlpha": 0,
        "labelsEnabled":false,
        "axisColor":"#cccccc",
    "minimum": 0
  } ],
    "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
       "gridThickness": 0,
      "axisColor":"#cccccc",
    "tickPosition": "start",
    "tickLength": 10
  },
    "chartScrollbar": {
        "enabled": false
    },
    "chartCursor": {
        "categoryBalloonDateFormat": "YYYY MMM DD",
        "cursorAlpha": 0,
        "fullWidth": true
    },
    "dataDateFormat": "YYYY",
    "categoryField": "date",

    "export": {
        "enabled": true
    }
});

var chart = AmCharts.makeChart("indianforeignexchange1", {
    "type": "serial",
    "theme": "light",
    "hideCredits":true,
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
    "marginRight": 10,
    "dataProvider": [{
        "lineColor": "#FDDB35",
        "date": "2012-13",
        "duration": 292
    }, {
        "lineColor": "#FF8533",
        "date": "2013-14",
        "duration": 304
    }, {
        "lineColor": "#fbd51a",
        "date": "2014-15",
        "duration": 341
    }, {
        "lineColor": "#ffbb11",
        "date": "2015-16",
        "duration": 360
    }, {
        "lineColor": "#fbd51a",
        "date": "2016-17",
        "duration": 369
    }],
    "balloon": {
        "cornerRadius": 6,
        "horizontalPadding": 15,
        "verticalPadding": 10
    },
    "graphs": [{
        "bullet": "square",
        "bulletBorderAlpha": 1,
        "bulletBorderThickness": 1,
        "fillAlphas": 0.3,
        "labelText":"[[duration]]",
        "fillColorsField": "lineColor",
        "legendValueText": "[[value]]",
        "lineColorField": "lineColor",
        "title": "duration",
        "valueField": "duration"
    }],
    "valueAxes": [ {
        "gridThickness":0,
        "axisAlpha": 0,
        "labelsEnabled":false,
        "axisColor":"#cccccc",
    "minimum": 0
  } ],
    "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
       "gridThickness": 0,
      "axisColor":"#cccccc",
    "tickPosition": "start",
    "tickLength": 10
  },
    "chartScrollbar": {
        "enabled": false
    },
    "chartCursor": {
        "categoryBalloonDateFormat": "YYYY MMM DD",
        "cursorAlpha": 0,
        "fullWidth": true
    },
    "dataDateFormat": "YYYY",
    "categoryField": "date",

    "export": {
        "enabled": true
    }
});


/********************************
=================================
    Foreign Direct Investment
==================================
**********************************/
//FDI Equity inflows

var chart = AmCharts.makeChart( "fdiequityinflows", {
  "type": "serial",
    "hideCredits":true,
  "theme": "light",
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
   
  "dataProvider": [ {
    "country": "Oct",
    "visits": 2.7,
    "color":"#98292b"
  }, {
    "country": "Nov",
    "visits": 3.1,
      "color":"#ad1f22"
  }, {
    "country": "Dec",
    "visits": 4.8,
      "color":"#9a0a0e"
  }],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0,
        "axisAlpha": 0,
      "gridThickness": 0,
      "axisColor":"#cccccc",
    "dashLength": 0,
      "labelsEnabled":false,
      "minimum": 2
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
       "colorField" : "color",
	"labelText":"[[visits]]",
    "lineAlpha": 0.2,
    "type": "column",
    "showBalloon": false,
    "valueField": "visits"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
       "gridThickness": 0,
      "axisColor":"#cccccc",
    "tickPosition": "start",
    "tickLength": 20,
    "color": "#000000",
  },
  "export": {
    "enabled": true
  }

} );
var chart = AmCharts.makeChart( "fdiequityinflows1", {
  "type": "serial",
    "hideCredits":true,
  "theme": "light",
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
   
  "dataProvider": [ {
    "country": "April",
    "visits": 3229,
    "color":"#98292b"
  }, {
    "country": "May",
    "visits": 4060,
      "color":"#ad1f22"
  }, {
    "country": "June",
    "visits": 3119,
      "color":"#9a0a0e"
  }],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0,
        "axisAlpha": 0,
      "gridThickness": 0,
      "axisColor":"#cccccc",
    "dashLength": 0,
      "labelsEnabled":false,
      "minimum": 1
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
       "colorField" : "color",
	"labelText":"[[visits]]",
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
       "gridThickness": 0,
	"labelColorField": "color",
      "axisColor":"#cccccc",
    "tickPosition": "start",
    "tickLength": 20
  },
  "export": {
    "enabled": true
  }

} );

//Sectors attracting highest FDI inflow April, 00 - June, 17)

var chart = AmCharts.makeChart( "fdihighestinflows", {
  "type": "serial",
    "hideCredits":true,
  "theme": "light",
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
    "rotate": true,

  "dataProvider": [ {
    "country": "Telecommunication: 6.1",
    "visits": 6.1
  }, {
    "country": "Computer Software and Hardware: 5.2",
    "visits": 5.2
  }, {
    "country": "Services: 4.6",
    "visits": 4.6
  }, {
    "country": "Trading: 2.3",
    "visits": 2.3
  }, {
    "country": "Construction: 2.5",
    "visits": 2.5
  }],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0,
    "dashLength": 0,
      "axisColor":"#cccccc",
      "minimum" : 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
      "title": "In Mn US$ April '00 - June '17",
    "lineAlpha": 0.2,
    "type": "column",
    "showBalloon": false,
    "valueField": "visits"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
        "axisAlpha": 0,
      "axisColor":"#cccccc",
    "inside":true,
    //"labelRotation": 90,
    "tickPosition": "center",
    "tickLength": 0
  },
  "export": {
    "enabled": true
  }

} );

var chart = AmCharts.makeChart( "fdihighestinflows1", {
  "type": "serial",
    "hideCredits":true,
  "theme": "light",
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
    "rotate": true,
  "dataProvider": [ {
    "country": "Services",
    "visits": 61359
  }, {
    "country": "Computer and Hardware",
    "visits": 25985
  }, {
    "country": "Construction",
    "visits": 24544
  }, {
    "country": "Telecommunications",
    "visits": 24034
  }, {
    "country": "Automobile",
    "visits": 17390
  }, {
    "country": "Drugs and Pharmaceuticals",
    "visits": 14988
  }, {
    "country": "Trading",
    "visits": 14979
  }, {
    "country": "Chemicals",
    "visits": 13972
  }, {
    "country": "Power",
    "visits": 11766
  }, {
    "country": "Hotel and Tourism",
    "visits": 10477
  }],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0,
    "dashLength": 0,
      "axisColor":"#cccccc",
      "minimum" : 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
      "title": "In Mn US$ April '00 - June '17",
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
        "axisAlpha": 0,
      "axisColor":"#cccccc",
    "inside":true,
    //"labelRotation": 90,
    "tickPosition": "center",
    "tickLength": 0
  },
  "export": {
    "enabled": true
  }

} );

//Top investing countries Cumulative Inflows

var chart = AmCharts.makeChart( "fdicumulativeinflows", {
  "type": "serial",
    "hideCredits":true,
  "theme": "light",
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
    "rotate": true,
  "dataProvider": [{
    "country": "Mauritius - 13.3",
    "visits": 13.3
  }, {
    "country": "Singapore - 9.2",
    "visits": 9.2
  },//, {
  //   "country": "Japan",
  //   "visits": 26125
  // }, {
  //   "country": "UK",
  //   "visits": 24731
  // },
   {
    "country": "Netherlands - 2.4",
    "visits": 2.4
  }, {
    "country": "USA - 1.7",
    "visits": 1.7
  }, {
    "country": "Japan - 1.3",
    "visits": 1.3
  }
  // , {
  //   "country": "Cyprus",
  //   "visits": 9279
  // }, {
  //   "country": "France",
  //   "visits": 5824
  // }, {
  //   "country": "UAE",
  //   "visits": 4765
  // }
  ],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0,
      "axisColor":"#cccccc",
    "dashLength": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "showBalloon": false,
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
        "axisAlpha": 0,
    "inside":true,
       "axisColor":"#cccccc",
    //"labelRotation": 90,
    "tickPosition": "center",
    "tickLength": 0
  },
  "export": {
    "enabled": true
  }

} );

var chart = AmCharts.makeChart( "fdicumulativeinflows1", {
  "type": "serial",
    "hideCredits":true,
  "theme": "light",
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
    "rotate": true,
  "dataProvider": [ {
    "country": "Mauritius",
    "visits": 114931
  }, {
    "country": "Singapore",
    "visits": 57600
  }, {
    "country": "Japan",
    "visits": 26125
  }, {
    "country": "UK",
    "visits": 24731
  }, {
    "country": "Netherlands",
    "visits": 21266
  }, {
    "country": "USA",
    "visits": 20983
  }, {
    "country": "Germany",
    "visits": 10496
  }, {
    "country": "Cyprus",
    "visits": 9279
  }, {
    "country": "France",
    "visits": 5824
  }, {
    "country": "UAE",
    "visits": 4765
  }],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0,
      "axisColor":"#cccccc",
    "dashLength": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
        "axisAlpha": 0,
    "inside":true,
       "axisColor":"#cccccc",
    //"labelRotation": 90,
    "tickPosition": "center",
    "tickLength": 0
  },
  "export": {
    "enabled": true
  }

} );

/********************************
=================================
        Other indicators
==================================
**********************************/

//Average age in 2030
var chart = AmCharts.makeChart( "averageage", {
 "type": "serial",
    "hideCredits":true,
  "addClassNames": true,
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
  "theme": "light",
  "autoMargins": false,
  "marginLeft": 30,
  "marginRight": 8,
  "marginTop": 10,
  "marginBottom": 26,
  "balloon": {
    "adjustBorderColor": false,
    "horizontalPadding": 10,
    "verticalPadding": 8,
    "color": "#ffffff"
  },

  "dataProvider": [ {
    "country": "India",
    "average age": 32
  }, {
    "country": "China",
    "average age": 43,
    "dashLengthLine": 5
  }, {
    "country": "USA",
    "average age": 39
    
  } ],
     
  "valueAxes": [ {
    "axisAlpha": 1,
        "axisAlpha": 0,
    "position": "left",
      "axisColor" : "#cccccc",
      "gridThickness": 0,
      "labelsEnabled":false,
    "minimum" : 0
  }],
  
  "startDuration": 1,
  "graphs": [ {
    "showBalloon": false,
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
    "fillAlphas": 1,
    "title": "Average Age",
    "type": "column",
    "labelText": "[[average age]]",
    "valueField": "average age",
    "dashLengthField": "dashLengthColumn",
      
  }, {
    "id": "graph2",
    "lineThickness":0,
    "bulletBorderThickness": 0,
    "fillAlphas": 0,
    "title": "Average Age",
    "valueField": "average age",
    "dashLengthField": "dashLengthLine"
  } ],
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "middle",
	//"parseDates" : true,
    "axisAlpha": 0,
     "gridThickness": 0,
    "axisColor" : "#cccccc",
    "tickLength": 0
  },
  "export": {
    "enabled": true
  }
} );
//labour surplus in 2020
var chart = AmCharts.makeChart( "labourSurplus", {
"type": "serial",
    "hideCredits":true,
  "theme": "light",
  "marginBottom": 50,
  "dataProvider": [{
    "age": "India",
    "male": 47,
    "rate": "47",
    // "female": 0.3
  }, {
    "age": "China",
    "male": -10,
    "rate": "-10",
    // "female": 0.3
  }, {
    "age": "USA",
    "male": -17,
    "rate":"-17",
    // "female": 0.6
  }],
  "startDuration": 1,
  "graphs": [{
    "fillAlphas": 0.8,
    "fillColors": "#FF6600",
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "male",
    "title": "Male",
    "labelText": "[[rate]]",
    "clustered": false,
    
    "balloonFunction": function(item) {
      return item.category + ": " + Math.abs(item.values.value) + "%";
    }
  }],
  // "graphs": [{
  //   "fillAlphas": 0.8,
  //   "fillColors": "#FF6600",
  //   "lineAlpha": 0.2,
  //   "type": "column",
  //   "valueField": "male",
  //   "title": "Male",
  //   "labelText": "[[value]]",
  //   "clustered": false,
  //   "labelFunction": function(item) {
  //     return Math.abs(item.values.value);
  //   },
  //   "balloonFunction": function(item) {
  //     return item.category + ": " + Math.abs(item.values.value) + "%";
  //   }
  // }],
  "categoryField": "age",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "axisAlpha": 0
  },
  "valueAxes": [{
    "gridAlpha": 0,
    "position": "left",
    "axisAlpha": 1,
    "axisAlpha": 0,
    "ignoreAxisWidth": true,
    "labelsEnabled":false,
    "guides": [{
      "value": 0,
      "lineAlpha": 0.2
    }]
  }],
  "balloon": {
    "enabled": false
  },
  "chartCursor": {
    "valueBalloonsEnabled": false,
    "cursorAlpha": 0.05,
    "fullWidth": true
  },
 "export": {
    "enabled": true
  }

} );



var chart = AmCharts.makeChart( "averageage1", {
 "type": "serial",
    "hideCredits":true,
  "addClassNames": true,
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
  "theme": "light",
  "autoMargins": false,
  "marginLeft": 30,
  "marginRight": 8,
  "marginTop": 10,
  "marginBottom": 26,
  "balloon": {
    "adjustBorderColor": false,
    "horizontalPadding": 10,
    "verticalPadding": 8,
    "color": "#ffffff"
  },

  "dataProvider": [ {
    "country": "India",
    "average age": 32
  }, {
    "country": "China",
    "average age": 43,
    "dashLengthLine": 5
  }, {
    "country": "USA",
    "average age": 39
    
  } ],
     
  "valueAxes": [ {
    "axisAlpha": 1,
        "axisAlpha": 0,
    "position": "left",
      "axisColor" : "#cccccc",
      "gridThickness": 0,
      "labelsEnabled":false,
    "minimum" : 0
  }],
  
  "startDuration": 1,
  "graphs": [ {
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
    "fillAlphas": 1,
    "title": "Average Age",
    "type": "column",
	"labelText": "[[average age]]",
    "valueField": "average age",
    "dashLengthField": "dashLengthColumn",
      
  }, {
    "id": "graph2",
    "lineThickness":0,
    "bulletBorderThickness": 0,
    "fillAlphas": 0,
    "title": "Average Age",
    "valueField": "average age",
    "dashLengthField": "dashLengthLine"
  } ],
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "middle",
	//"parseDates" : true,
    "axisAlpha": 0,
     "gridThickness": 0,
    "axisColor" : "#cccccc",
    "tickLength": 0
  },
  "export": {
    "enabled": true
  }
} );

/*****************************************************
======================================================
INTERNATIONAL NETWORK PAGE WORLD MAP
======================================================
*****************************************************/
/**
 * This example uses pulsating circles CSS by Kevin Urrutia
 * http://kevinurrutia.tumblr.com/post/16411271583/creating-a-css3-pulsating-circle
 */

var map = AmCharts.makeChart( "internationalworldmap1", {
  "type": "map",
  "theme": "light",
    "hideCredits":true,
    "fontFamily":"'Open Sans', sans-serif",
    "fontSize":14,
  "projection": "miller",

  "imagesSettings": {
    "rollOverColor": "#089282",
    "rollOverScale": 3,
    "selectedScale": 3,
    "selectedColor": "#089282",
    "color": "#13564e"
  },

  "areasSettings": {
    "unlistedAreasColor": "#15A892"
  },

  "dataProvider": {
    "map": "worldLow",
    "images": [ {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Brussels",
      "latitude": 50.8371,
      "longitude": 4.3676
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Copenhagen",
      "latitude": 55.6763,
      "longitude": 12.5681
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Paris",
      "latitude": 48.8567,
      "longitude": 2.3510
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Reykjavik",
      "latitude": 64.1353,
      "longitude": -21.8952
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Moscow",
      "latitude": 55.7558,
      "longitude": 37.6176
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Madrid",
      "latitude": 40.4167,
      "longitude": -3.7033
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "London",
      "latitude": 51.5002,
      "longitude": -0.1262,
      "url": "http://www.google.co.uk"
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Peking",
      "latitude": 39.9056,
      "longitude": 116.3958
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "New Delhi",
      "latitude": 28.6353,
      "longitude": 77.2250
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Tokyo",
      "latitude": 35.6785,
      "longitude": 139.6823,
      "url": "http://www.google.co.jp"
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Ankara",
      "latitude": 39.9439,
      "longitude": 32.8560
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Buenos Aires",
      "latitude": -34.6118,
      "longitude": -58.4173
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Brasilia",
      "latitude": -15.7801,
      "longitude": -47.9292
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Ottawa",
      "latitude": 45.4235,
      "longitude": -75.6979
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Washington",
      "latitude": 38.8921,
      "longitude": -77.0241
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Kinshasa",
      "latitude": -4.3369,
      "longitude": 15.3271
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Cairo",
      "latitude": 30.0571,
      "longitude": 31.2272
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Pretoria",
      "latitude": -25.7463,
      "longitude": 28.1876
    } ]
  }
} );

// add events to recalculate map position when the map is moved or zoomed
map.addListener( "positionChanged", updateCustomMarkers );

// this function will take current images on the map and create HTML elements for them
function updateCustomMarkers( event ) {
  // get map object
  var map = event.chart;

  // go through all of the images
  for ( var x in map.dataProvider.images ) {
    // get MapImage object
    var image = map.dataProvider.images[ x ];

    // check if it has corresponding HTML element
    if ( 'undefined' == typeof image.externalElement )
      image.externalElement = createCustomMarker( image );

    // reposition the element accoridng to coordinates
    var xy = map.coordinatesToStageXY( image.longitude, image.latitude );
    image.externalElement.style.top = xy.y + 'px';
    image.externalElement.style.left = xy.x + 'px';
  }
}

// this function creates and returns a new marker element
function createCustomMarker( image ) {
  // create holder
  var holder = document.createElement( 'div' );
  holder.className = 'map-marker';
  holder.title = image.title;
  holder.style.position = 'absolute';

  // maybe add a link to it?
  if ( undefined != image.url ) {
    holder.onclick = function() {
      window.location.href = image.url;
    };
    holder.className += ' map-clickable';
  }

  // create dot
  var dot = document.createElement( 'div' );
  dot.className = 'dot';
  holder.appendChild( dot );

  // create pulse
  var pulse = document.createElement( 'div' );
  pulse.className = 'pulse';
  holder.appendChild( pulse );

  // append the marker to the map container
  image.chart.chartDiv.appendChild( holder );

  return holder;
}


