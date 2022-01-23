@php
   use Cknow\Money\Money;
@endphp
<p class="space-x-2 {{@$css}}">
    @if(empty($item['price']) || empty($item['sale-price']))
        <span class="font-bold text-red-500">
            @if(empty($item['price']))
                @money($item['sale-price'])
            @else
                @money($item['price'])
            @endif
        </span>
    @else
        <span class="line-through text-red-300">{{Money::min(Money::VND($item['price']), Money::VND($item['sale-price']))}}</span>
        <span class="font-bold text-red-500">{{Money::max(Money::VND($item['price']), Money::VND($item['sale-price']))}}</span>
    @endif
</p>