<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 id="filter-heading" class="sr-only">Product filters</h2>
    <div class="flex items-center justify-between">
        @include($config->view.'/components/dropdown', [
        'links'=>[
            ['Phù hợp nhất', $config->base_url.'/kho-giao-dien?sort=Phù hợp nhất'],
            ['Giá từ thấp tới cao', $config->base_url.'/kho-giao-dien?sort=Giá từ thấp tới cao'],
            ['Giá từ cao xuống thấp', $config->base_url.'/kho-giao-dien?sort=Giá từ cao xuống thấp'],
        ],
        'label'=>'Sắp xếp theo:'
        ])
        <div class=" sm:flex sm:items-baseline sm:space-x-8">
            @include($config->view.'/components/dropdown', [
            'links'=> collect($theloai)->map(function($item) use ($config){
                return [$item['name'], $config->base_url.'/kho-giao-dien?id='.$item['id']];
            }),
            'label'=>'Thể loại:',
            'isRight'=>true
            ])
        </div>
    </div>
</section>