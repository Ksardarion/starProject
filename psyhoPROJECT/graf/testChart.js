window.addEventListener('load', windowLoaded, false);

function windowLoaded(){


    var url =  '../../pages/ajax2.php';
    getData(url);
}

var resultOfRequest;

function canvasApp() {
    var ctx = document.getElementById("myErrors").getContext('2d');
	var ctx2 = document.getElementById("myTime").getContext('2d');
    var errors = [];
    var time  = [];
	console.log(ctx);

    for (var i = 0; i < resultOfRequest.length; i++) {
        errors.push(resultOfRequest[i].error);
        time.push(resultOfRequest[i].time);
    }
    var dataTime = {
    labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: time
        }
    ]
};
	var dataErrors = {
    labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: errors
        }
    ]
};
    var myLineChart = new Chart(ctx).Line(dataErrors);
	var myLineChart2 = new Chart(ctx2).Line(dataTime);
}

function getXmlHttp(){
  var xmlhttp;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

function getData(url) {
     var id = (window.location.search).substring(4);
     console.log(id);
     var req = getXmlHttp();
     req.open('POST', url, true);
     req.onreadystatechange = function() {
         // активізується при отримані відповіді від сервера
         if (req.readyState == 4) {
             // якщо запит закінчив виконуватися
             // error.innerHTML = req.statusText;
             if (req.status == 200) {
                 // status 200 (ok)
                 // console.log(req.responseText);
                 // resultOfRequest = JSON.parse(req.responseText);
                 // console.log(resultOfRequest);

                 // var type = req.getResponseHeader('Content-Type');
                 // console.log(type);
                 try {
                 resultOfRequest = JSON.parse(req.responseText);
                 canvasApp();
             } catch(e) {
                if (e) {
                    alert('no data');
                }
             }

                 console.log(resultOfRequest);
             }
         }
     }
     req.setRequestHeader("Content-type","application/x-www-form-urlencoded");
     //req.setRequestHeader('Content-length', param.length);
     //req.setRequestHeader('Connection', 'close');
     // req.setRequestHeader('AJAX',1)
     req.send('id='+String(id)); 
}