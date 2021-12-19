docker-compose exec workspace bash
cd /var/www/boilerplate/express;
node server.js


# sequelize
npx sequelize-cli init
npx sequelize-cli model:generate --force --name User --attributes firstName:string,lastName:string,email:string,username:string,password:string,phone:string,token:text
npx sequelize-cli model:generate --force --name Post --attributes user_id:string,title:string,description:string
npx sequelize-cli model:generate --force --name File --attributes app_id:integer,name:string,type:string,path:string
npx sequelize-cli model:generate --force --name App --attributes app_id:integer,platform:string,keys:json
npx sequelize-cli db:migrate
npx sequelize-cli db:migrate:undo:all

npx sequelize-cli seed:generate --name demo-user
npx sequelize-cli seed:generate --name app
npx sequelize-cli db:seed:all

# copy
cp -fR /Users/phuocnguyen/Jobs/boilerplate/express/*  /Users/phuocnguyen/Jobs/codeby.com/mockapi/storageCodeby

# run dev
cd /var/www/mockapi/storageCodeby
npm run migrate-dev

# nginx
vi /etc/nginx/sites-enabled/be-mockapi.codeby.com.conf
http://be-mockapi.codeby.com/storageCodeby
location /storageCodeby/ {
    proxy_set_header Upgrade $http_upgrade;
    proxy_set_header Connection "upgrade";
    proxy_pass   http://localhost:3002/;
}

# forever
- update
cd /var/www/mockapi/storageCodeby; git pull; forever restartall;
- new
cd /var/www/mockapi/storageCodeby; git pull; sudo kill -9 `sudo lsof -t -i:3002`; forever start -c "npm run nodemon-dev" ./
