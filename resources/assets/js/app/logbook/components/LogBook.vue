<template>
	
	<div class="log-container">
		<div class="box header">
        	<input type="text" class="exercise-input"  placeholder="Add exercise here..." v-on:keyup="addSet" v-model="newSet" autofocus>
        </div>
		<div class="box sidebar">
			Add your exercise above; hit enter<br/>
			Then go ahead and add your weights, reps <br/>
			using the button
			<img :src="'./assets/curls.jpg'" alt="curls">
		</div>
        <div class="box content">
        	<div class="content-pad">
	    		<ul class="sets">
		        	<li v-for="set in sets" class="exercise">
	    				{{ set }} <button class="btn plus" title="add a set">+</button>
	    			</li>
	    		</ul>
	    	</div>
        </div>
    </div>
</template>

<script>
	export default {
		data() {
			return {
				index: null,				
				newSet: null,
				sets: [],
			}
		},
		mounted() {
			axios.get('/api/logbook').then((response) => {
				this.index = response.data.data;
			})
		},
		methods: {
			addSet(e) {
				if (e.keyCode === 13) {
					console.log(e);
					this.sets.push(this.newSet);
					this.newSet = "";
				}
			}
		}
	}

</script>
