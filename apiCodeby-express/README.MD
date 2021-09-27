forever restartall; forever start -c "npm run dev" /var/www/mockapi/apiCodeby-express

# nginx 
vi /etc/nginx/sites-enabled/be-mockapi.codeby.com.conf

location /apiCodeby-express/ {
    proxy_set_header Upgrade $http_upgrade;
    proxy_set_header Connection "upgrade";
    proxy_set_header Access-Control-Allow-Origin *;
    proxy_pass   http://localhost:3002/;
}