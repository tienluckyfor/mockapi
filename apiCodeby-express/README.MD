# vi /etc/nginx/sites-enabled/be-mockapi.codeby.com.conf
location /apiCodeby-express/ {
    proxy_set_header Upgrade $http_upgrade;
    proxy_set_header Connection "upgrade";
    proxy_pass   http://localhost:3002/;
}