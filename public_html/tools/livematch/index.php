<button onclick="get_data()">click</button>

<script type="text/javascript">
function get_data(){
const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': '75e0de048cmsh121e44af7a51ff0p1d1351jsna664bbbb3991',
		'X-RapidAPI-Host': 'livescore6.p.rapidapi.com'
	}
};

fetch('https://livescore6.p.rapidapi.com/matches/v2/list-live?Category=cricket&Timezone=5.5', options)
	.then(response => response.json())
	.then(response => console.log(response))
	.catch(err => console.error(err));
}

</script>
