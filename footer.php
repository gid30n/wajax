<script type="text/javascript">
//ajaxwa by rsha <sidiraihan@gmail.com> below here
function getNomor(id)
{
	var URL = window.location.href;
	$.ajax({
	type: 'GET',
	url: "?link=" + id,
	success: function(data) {
	window.location= 'whatsapp://send?text=some text '+URL+'&phone='+id;
	goog_report_conversion("tel:'+id+'");
	},
	error: function() { alert("Error membuka WhatsApp"); }
	});
}
function getWaNew(){
	$.ajax({
	type: "POST",
	url: "?nomorbaru",
	success: function (response) {
	console.log(response);
	getNomor(response);
	//wajax(response);
	},
	error: function(response) { alert("Error"); }
	});
}
//end of ajaxwa
</script>