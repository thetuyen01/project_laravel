const app = require('express')();
const http = require('http').createServer(app);
const io = require('socket.io')(http, {
  cors: {
    origin: "http://127.0.0.1:8000", // Thay đổi origin tùy thuộc vào địa chỉ của trang web của bạn
    methods: ["GET", "POST"]
  }
});

http.listen(3000, () => {
  console.log('Connect to port 3000');
});

io.on('error', (err) => {
  console.log('Socket.IO Error:', err);
});

io.on('connection', (socket) => {
  console.log("Có người vừa kết nối " + socket.id);
});

const Redis = require('ioredis');
const redis = new Redis({
    port: 6380, // Đổi thành cổng bạn đang sử dụng
  });

redis.psubscribe("*", function(err,count){

})
redis.on('pmessage', (partner, channel, message) => {
  message = JSON.parse(message);
  io.emit('message', message);
  console.log("Đã gửi");
});
