<!doctype html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css-webkhoinghiep/app.css') }}" rel="stylesheet">
    <script defer src="//unpkg.com/alpinejs"></script>
    <script src="{{$config->static}}/assets/scripts/base.js"></script>
    <script>
        http.initialize({
            url: '{{$config->api_url}}',
            token: '{{$config->token}}',
        });
        console.log('http', http);
        
        (async () => {
            // const get = await http.get('/test');
            // console.log('get', get);

            const post = await http.post('/test', {"a":1, "b":2});
            console.log('post', post);
        })();
    </script>
</head>
<body class="h-full">
@yield('main')
</body>
</html>