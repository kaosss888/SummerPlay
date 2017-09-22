var xmlHttp;

function showStudent()
{
	var str1 = document.getElementById('type');
	var str2 = document.getElementById('search');

	xmlHttp = GetXmlHttpObject()

	if (xmlHttp == null) 
	{
		alert("Browser does not support HTTP Request");
		return;
	}


	if (str2.value == "") {
		location.reload();
	}
	else{
		var url = "search_stu.php?t=" + str1.value +"&q=" + str2.value;
		xmlHttp.onreadystatechange = stateChanged;
		xmlHttp.open("GET", url, true);
		xmlHttp.send(null);
	}
	

}

function stateChanged()
{
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 'complete') {}
	{
		document.getElementById("all_stu").style.display = 'none';
		document.getElementById("show").innerHTML = xmlHttp.responseText;
	}
}

function GetXmlHttpObject()
{
	var xmlHttp = null;

	try
	{
		xmlHttp = new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}
