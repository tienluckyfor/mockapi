# setup project
cp .env.example .env;
composer install;
php artisan migrate:refresh; php artisan passport:install; 

# cache 
php artisan lighthouse:clear-cache

# graphql-playground
http://laravel-boilerplate.test/graphql-playground
```
#register
mutation {
  register(
    input: {
      name: "myemail@email.com"
      email: "myemail@email.com"
      password: "123456789qq"
      password_confirmation: "123456789qq"
    }
  ) {
    status
  }
}

#login
mutation {
  login(input: { username: "myemail@email.com", password: "123456789qq" }) {
    access_token
    refresh_token
    expires_in
    token_type
    user {
      id
      email
      name
    }
  }
}

#query
query {
  users {
    data {
      id
      name
      email
    }
  }
}
```

# copy
cp -fR /Users/phuocnguyen/Jobs/boilerplate/laravel-graphql/*  /Users/phuocnguyen/Jobs/codeby.com/mockapi/siteCodeby
