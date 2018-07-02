/**Map Country Urls**/

var map = AmCharts.makeChart( "chartdiv1", {

  "type": "map",
  "theme": "light",
  "projection": "miller",

  "dataProvider": {
    "map": "worldIndiaLow",
    "getAreasFromMap": true,
		areas: [{
			  id: "AU",
			  url: "http://www.hcindia-au.org/",
			  urlTarget:"_blank"
			},
		{
			  id: "BD",
			  url: "http://www.hcidhaka.org/",
			  urlTarget:"_blank"
			},
		{
			  id: "BE",
			  url: "http://www.indembassy.be/",
			  urlTarget:"_blank"
			},
		{
			  id: "BR",
			  url: "http://indianembassy.org.br/",
			  urlTarget:"_blank"
			},
		{
			  id: "CA",
			  url: "http://www.hciottawa.ca/",
			  urlTarget:"_blank"
			},
		{
			  id: "CN",
			  url: "http://www.indianconsulate.org.hk/",
			  urlTarget:"_blank"
			},
		{
			  id: "JP",
			  url: "https://www.indembassy-tokyo.gov.in/",
			  urlTarget:"_blank"
			},
		{
			  id: "FR",
			  url: "http://www.ambinde.fr/",
			  urlTarget:"_blank"
			},
		{
			  id: "NZ",
			  url: "http://hciwellington.in/",
			  urlTarget:"_blank"
			},
		{
			  id: "NP",
			  url: "http://hciwellington.in/",
			  urlTarget:"_blank"
			},
		{
			  id: "US",
			  url: "https://www.indianembassy.org/",
			  urlTarget:"_blank"
			},
		{
			  id: "ZA",
			  url: "http://india.org.za/",
			  urlTarget:"_blank"
			},
		{
			  id: "CH",
			  url: "http://www.indembassybern.ch/",
			  urlTarget:"_blank"
			},
		{
			  id: "ES",
			  url: "http://www.indembassybern.ch/",
			  urlTarget:"_blank"
			},
		{
			  id: "DE",
			  url: "https://www.indianembassy.de/",
			  urlTarget:"_blank"
			},
		{
			  id: "IT",
			  url: "http://www.indembassybern.ch/",
			  urlTarget:"_blank"
			},
		{
			  id: "EG",
			  url: "http://eoicairo.in/",
			  urlTarget:"_blank"
			},
		{
			  id: "RU",
			  url: "http://www.indianembassy.ru/",
			  urlTarget:"_blank"
			},
		{
			  id: "NL",
			  url: "http://www.indianembassy.nl/",
			  urlTarget:"_blank"
			},
		{
			  id: "MR",
			  url: "http://www.indiahighcom.intnet.mu/",
			  urlTarget:"_blank"
			}],
  },
  "areasSettings": {
    "autoZoom": false,
    "selectedColor": "#CC0000"
  },
  "smallMap": {},
  "export": {
    "enabled": true,
    "position": "bottom-right"
  }
} );