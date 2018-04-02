<script>
	getCSRFToken = function () {
		var metas = document.getElementsByTagName('meta');
		for (var i=0; i < metas.length; i++) {
			if (metas[i].getAttribute('name') == 'csrf-token') {
				return metas[i].getAttribute('content');
			}
		}
		return '';
	}
	getCounterValue = function() {
		return document.getElementsByName('counter_value')[0].value;
	}
	setCounterValue = function(val) {
		document.getElementById('counter_value_text').innerHTML = val;
		document.getElementsByName('counter_value')[0].value = val;
	}

	successJSON = function(http) {
		var json_response = JSON.parse(http.response)
		setCounterValue(json_response.counter_value);
	}
	
	breakCounter = function(http, url) {
		var params = 'counter_value=' + getCounterValue();
		
		http.open('POST', url, true);
		http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		http.setRequestHeader('X-CSRF-TOKEN', getCSRFToken());
		http.onreadystatechange = function() {
			if (http.readyState == XMLHttpRequest.DONE) {
				if (http.status == 200) {
					successJSON(http);
					console.log('Ok');
				} else {
					console.log('Error');
				}
			}
		}
		http.send(params);
	}

	startBreaking = function(http, url) {
		var timerId = setInterval(breakCounter, 1000, http, url);
	}
	
	var http = new XMLHttpRequest();
	var url = '{{ url("/prg-problem/break") }}';

	window.onload = startBreaking(http, url);
	
</script>