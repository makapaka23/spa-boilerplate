<template>
	<div>
		<p>{{ index }}</p>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				index: null
			}
		},
		mounted() {
			axios.get('/api/logbook').then((response) => {
				this.index = response.data.data
			})
		}
	}

</script>