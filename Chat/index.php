<html>
<head>
<title>Чат</title>
<style>
     h2{
	 text-align: center;
	 }
	 #chat, table{
	 margin: 0 auto;
	 }
	 #chat{
	 border: 3px solid #0ff;
	 height: 300px;
	 margin: 0 auto;
	 overflow-x: none;
	 overflow-y: auto;
	 width: 200px
	 }
	 p {
	 margin: 0;
	 }
</style>
<script type="text/javascript">
    var array = new Array(); 
    function getXmlHttp() {
	    var xmlhttp;
		try {
		    xmlhttp = ActiveXObject("Msxml2.XMLHTTP");
		} catch (e){
		    try {
			    xmlhttp = ActiveXObject("Microsoft.XMLHTTP");
			} catch (E) {
			    xmlhttp = false;
			}   
		}
		if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
		     xmlhttp = new XMLHttpRequest();
		}
		return xmlhttp;
	}
    function chat(){
	    var xmlhttp = getXmlHttp();
		xmlhttp.open("POST", "function.php", true);
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlhttp.send("update=1");
		xmlhttp.onreadystatechange = function() {
		    if (xmlhttp.readyState == 4) {
			    if (xmlhttp.status == 200) {
				    var response = xmlhttp.responseText;
					response = JSON.parse(response);
					if (array.length == response.length) return;
                    var start = array.length;
                    array = response;
                    var messages = document.getElementById("chat").innerHTML;
                    for (i = start; i < array.length; i++) {
					    messages = messages + "<p><b>" + array[i].name + ":</b> " array[i].message "</p> ";
					}
				    document.getElementById("chat").innerHTML = message;	
				}
			}
		}
        setTimeout("chat()", 1000);		
	}
</script>
</head>
<body onload="chat ()">
    <h2>Чат</h2>
    <div id="chat">
	
	</div>
    <br />
	<table>
	     <tr>
		 <td>Ім'я:</td>
		 <td>
		     <input type="text" id="name" />
		 </td>
	     </tr>	     
		 <tr>
		 <td>Повідомлення:</td>
		 <td>
		     <input type="text" id="message" />
		 </td>
	     </tr>
		 <tr>
		 <td>
		    <input type="button" value="Надіслати" />
		 <td>
		 </tr>
	</table>
</body>
</html>