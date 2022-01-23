@php
    use Cknow\Money\Money;
    $theloai = $http->get('/the-loai')->data();
    $chitiet = $http->get('/san-pham/'.request()->id)->data();
@endphp
@extends($config->layout.'/master')
@section('main')

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @include($config->view.'/components/breadcrumb', ['links'=>['/', 'Trang chủ']])
    </section>
    <div class="bg-gray-50">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-3 -mx-px grid grid-cols-3 sm:mx-0 md:grid-cols-3 lg:grid-cols-6  ">
                @include($config->view.'/components/theloai', ['theloai'=>$theloai, 'notBorder'=>true])
            </div>
        </section>
    </div>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque autem blanditiis consequatur enim et expedita
        fugiat fugit, id impedit iure natus odit quasi sapiente sed sunt temporibus totam unde voluptatum?
    </section>
@endsection