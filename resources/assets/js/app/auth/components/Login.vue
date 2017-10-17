<template>
	

	<div class="login-page">
	  <div class="form">
	  	<div class="alert alert-danger" v-if="errors.root">
	  		{{ errors.root }}
	  	</div>
	    <form class="login-form" role="form" @submit.prevent="submit">
			<div class="form-group" v-bind:class="{ 'has-error': errors.email }">
	      		<input id="email" type="text" placeholder="email address" v-model="email"/>
	      		<span class="help-block" v-if="errors.email">{{ errors.email[0] }}</span>
	      	</div>
	      	<div class="form-group" v-bind:class="{ 'has-error': errors.password }">
	      		<input id="password" type="password" placeholder="password" v-model="password"/>
	      		<span class="help-block" v-if="errors.password">{{ errors.password[0] }}</span>
	      	</div>
	      	<button>login</button>
	      	<p class="message">Not registered? <a href="#">Register now</a></p>
	    </form>
	  </div>
	</div>
	
</template>

<script>
	import { mapActions } from 'vuex'

	export default {
		data() {
			return {
				email: null,
				password: null,
				errors: []
			}
		},
		methods: {
			...mapActions({
				login: 'auth/login'
			}),
			submit() {
				this.login({
					payload: {
						email: this.email,
						password: this.password
					},
					context: this
				});
			}
		}
	}
</script>