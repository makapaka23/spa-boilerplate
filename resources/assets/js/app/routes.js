import auth from './auth/routes'
import home from './home/routes'
import logbook from './logbook/routes'
import errors from './errors/routes'

// erors must be last to catch all
export default [...home, ...auth, ...logbook, ...errors]