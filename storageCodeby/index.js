const app = require('./app')
const port = process.env.PORT || 8080
const env = require("config/env")


app.listen(port, () => {
    console.log('env.JWT_SECRET', env.JWT_SECRET)
    console.log('Server is up on port ' + port)
    console.log(`http://localhost:${port}`);
})
