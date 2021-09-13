var createError = require('http-errors');
var express = require('express');
var path = require('path');
var cookieParser = require('cookie-parser');
var cors = require('cors');
const config =  require('./config.js');

var indexRouter = require('./src/routes/index');
var usersRouter = require('./src/routes/users');
var screenshotRouter = require('./src/routes/screenshot');
var imageSharpRouter = require('./src/routes/imageSharp');

var app = express();

// view engine setup
app.set('views', path.join(__dirname, './src/views'));
app.set('view engine', 'ejs');

// app.use(logger('dev'));
app.use(express.json());
app.use(express.urlencoded({extended: false}));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

app.use(
    cors({
        origin: [
            'http://localhost:8080',
            'http://localhost:3003',
            'https://mimosa.offshorly.com',
            'https://openmimosa.org',
            'https://mimosa-staging.netlify.app',
            'https://609a150cbeffec6d6fc2872a--mimosa-app.netlify.app',
            'http://127.0.0.1:3000'
        ],
        methods: ['GET', 'PUT', 'POST', 'DELETE', 'OPTIONS'],
        allowedHeaders: [
            'DNT',
            'X-CustomHeader',
            'Keep-Alive',
            'User-Agent',
            'X-Requested-With',
            'If-Modified-Since',
            'Cache-Control',
            'Content-Type',
            'Content-Range',
            'Range',
            'Authorization'
        ],
        credentials: true,
        optionsSuccessStatus: 200 // some legacy browsers (IE11, various SmartTVs) choke on 204
    })
)
app.use('/', indexRouter);
app.use('/users', usersRouter);
app.use('/screenshot', screenshotRouter);
app.use('/imageSharp', imageSharpRouter);

// catch 404 and forward to error handler
app.use(function (req, res, next) {
    next(createError(404));
});

// error handler
app.use(function (err, req, res, next) {
    // set locals, only providing error in development
    res.locals.message = err.message;
    res.locals.error = req.app.get('env') === 'development' ? err : {};

    // render the error page
    res.status(err.status || 500);
    res.render('error');
});

module.exports = app;

console.log(`${config.APP_URL}/screenshot`)

