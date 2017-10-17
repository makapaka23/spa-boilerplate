<template>
	

	<div class="login-page">
	  <div class="form">
	    <form class="register-form" role="form" @submit.prevent="submit">
			<div class="form-group" v-bind:class="{ 'has-error': errors.name }">
	      		<input id="name" type="text" placeholder="name" autofocus v-model="name"/>
	      		<span class="help-block" v-if="errors.name">{{ errors.name[0] }}</span>
	      	</div>
	      	<div class="form-group" v-bind:class="{ 'has-error': errors.password }">
	      		<input id="password" type="password" placeholder="password" v-model="password"/>
	      		<span class="help-block" v-if="errors.password">{{ errors.password[0] }}</span>
	      	</div>
	      	<div class="form-group" v-bind:class="{ 'has-error': errors.email }">
	      		<input id="email" type="text" placeholder="email address" v-model="email"/>
	      		<span class="help-block" v-if="errors.email">{{ errors.email[0] }}</span>
	      	</div>
	      	<button>register</button>
	      	<p class="message">Already registered? <a href="#">Sign In</a></p>
	    </form>
	  </div>
	</div>
	
</template>

<script>
	import { mapActions } from 'vuex'

	export default {
		data() {
			return {
				name: null,
				email: null,
				password: null,
				errors: []
			}
		},
		methods: {
			...mapActions({
				register: 'auth/register'
			}),
			submit() {
				this.register({
					payload: {
						name: this.name,
						email: this.email,
						password: this.password
					},
					context: this
				});
			}
		}
	}
</script>