<template>
	
	<div class="">
        <input type="text" class="add__exercise" placeholder="Add set" v-on:keyup="addSet" v-model="newSet" autofocus>
           
        <!-- <p>{{ index }} 👀</p> -->
        <!-- <div class="set__list">
        	<p>{{ set }}</p>
        </div> -->
        <div class="sets-section">
        	<div class="sets-border">
        		<ul class="sets">
		        	<li v-for="set in sets" class="exercise">
        				{{ set }}
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
