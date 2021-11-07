# test socket 
curl "http://localhost:3003/socket.io/?EIO=4&transport=polling"
curl "https://be-mockapi.codeby.com/pusherCodeby/"
curl "https://be-mockapi.codeby.com/pusherCodeby/socket.io/?EIO=4&transport=polling"

# forever
cd /var/www/mockapi/pusherCodeby;forever restartall;forever start -c "npm run dev-socket" ./

# nginx 
vi /etc/nginx/sites-enabled/be-mockapi.codeby.com.conf

location /pusherCodeby/socket.io/ {
    proxy_set_header Upgrade $http_upgrade;
    proxy_set_header Connection "upgrade";
    proxy_pass   http://localhost:3003/socket.io/;
}

sudo nginx -s reload
