@php
   use Cknow\Money\Money;
@endphp
<p class="space-x-2 {{@$css}}">
    @if(empty($item['price']) || empty($item['sale-price']))
        @php
        if(empty($item['price'])) $min = Money::VND($item['sale-price']);
        else $min = Money::VND($item['price']);
        @endphp
        <span class="font-bold text-red-500" x-ref="price" data-price="{{$min->formatByDecimal()}}">{{$min}}</span>
    @else
        @php
        $max = Money::max(Money::VND($item['price']), Money::VND($item['sale-price']));
        $min = Money::min(Money::VND($item['price']), Money::VND($item['sale-price']));
        @endphp
        <span class="line-through text-red-300">{{$max}}</span>
        <span class="font-bold text-red-500" x-ref="price" data-price="{{$min->formatByDecimal()}}">{{$min}}</span>
    @endif
</p>