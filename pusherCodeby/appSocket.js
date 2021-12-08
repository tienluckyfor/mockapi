const express = require('express')
const http = require('http')
const app = express()
const httpServer = http.createServer(app)
const config = require('./config.js');
require('log-timestamp');

const io = (require("socket.io"))(httpServer, {
    allowRequest: (req, callback) => {
        const isOriginValid = true;//check(req);
        callback(null, isOriginValid);
    },
    cors: {
        origin: "*",
        methods: ["GET", "POST"]
    }
});

io.use((socket, next) => {
    if (socket.request.headers && socket.request.headers.authorization) {
        let token = socket.request.headers.authorization.substring(7);
        // console.log('socket.request.headers', token)
        next();
        // admin
        //     .auth()
        //     .verifyIdToken(token)
        //     .then(function (response) {
        //         socket.user = response;
        //         next();
        //     })
        //     .catch(function (error) {
        //         next(new Error("invalid"));
        //     });
    } else {
        const err = new Error("not authorized");
        err.data = {content: "Please retry later"}; // additional details
        next(err);
        // next(new Error("invalid token"));
    }

    // if (isValid(socket.request)) {
    //   next();
    // } else {
    //   next(new Error("invalid"));
    // }
})

app.get('/', (req, res) => {
    res.send("server is up and running");
    room = "room_1";
    emit = io.sockets.in(room).emit('message', {'aaa':'what is going on, party people?'});
})

// handle incoming connections from clients
io.sockets.on('connection', function (socket) {
    socket.on("disconnect", (reason) => {
        console.log('disconnect', reason)
    })
    socket.on('room', function (room) {
        socket.join(room);
    });
    // socket.on('leave', function (room) {
    //     socket.leave(room);
    // });
    socket.on('castRoom', function ({event, data, room}) {
        console.log('castRoom', {event, data, room})
        // io.sockets.in(room).emit(event, data)
        socket.broadcast.to(room).emit(event, data)
        socket.leave(room);
    })
    socket.on('cast', function ({event, data}) {
        io.sockets.broadcast.emit(event, data)
    })
    socket.on('emitRoom', function ({event, data, room}) {
        console.log('emitRoom', {event, data, room})
        io.sockets.in(room).emit(event, data)
        // socket.broadcast.to(room).emit(event, data)
        socket.leave(room);
    })
    socket.on('emit', function ({event, data}) {
        io.sockets.emit(event, data)
    })
    const rooms = io.of("/").adapter.rooms;
    const sids = io.of("/").adapter.sids;
    console.log('rooms', rooms)
    console.log('sids', sids)
});

io.of("/").adapter.on("create-room", (room) => {
    console.log(`room ${room} was created`);
});
io.of("/").adapter.on("join-room", (room, id) => {
    console.log(`socket ${id} has joined room ${room}`);
});
io.of("/").adapter.on("leave-room", (room, id) => {
    console.log(`socket ${id} has leave room ${room}`);
});

httpServer.listen(config.PORT, () => {
    console.log(`${config.APP_URL}`)
})
