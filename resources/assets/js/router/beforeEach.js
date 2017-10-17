import store from '../vuex'
import localforage from 'localforage'

const beforeEach = ((to, from, next) => {
	store.dispatch('auth/checkTokenExists').then(() => {
		if (to.meta.guest) {
			next({ name: 'home' })
			return
		}

		next()
	}).catch(() => {
		// if trying to access protected route, redirect to login
		if (to.meta.needsAuth) {
			// store where user was trying to go for when they login correctly
			localforage.setItem('target', to.name)
			next({ name: 'login' })
			return
		}

		next()
	})
})

export default beforeEach