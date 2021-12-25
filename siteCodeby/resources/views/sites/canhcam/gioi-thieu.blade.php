@extends($config->layout.'/master')

@section('main')
    <link rel="stylesheet" type="text/css" href="{{$config->static}}/bundles/site.min.css?v=1.0.1"/>
    @include($config->view.'/components/css-custom')
    <main>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, atque blanditiis consectetur, consequatur doloremque dolores dolorum explicabo facilis laborum molestiae molestias nulla pariatur quisquam quo ratione sapiente tempore ullam voluptas.
    </main>
    <script async="" defer="" src="{{$config->static}}/theme/js/about.min.js"></script>
@endsection