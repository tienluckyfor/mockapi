<script>
    @php
        $rand = rand();
    @endphp
    function dropdownFN_{{$rand}}() {
        return {
            show: false,
            list: {!! json_encode($list??[]) !!},
            links: {!! json_encode($links??[]) !!},
            choose: null
        }
    }
</script>
<div x-data="dropdownFN_{{$rand}}()"
     class="relative z-10 inline-block text-left">
    <div>
        <button type="button" @click="show = !show"
                class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                id="menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="text-gray-500 hidden lg:inline mr-1">
                    {{$label}}
                </span>
            <span x-text="choose ? choose : list[0]"></span>
            <!-- Heroicon name: solid/chevron-down -->
            <svg class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                 aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"/>
            </svg>
        </button>
    </div>

    <!--
      Dropdown menu, show/hide based on menu state.

      Entering: "transition ease-out duration-100"
        From: "transform opacity-0 scale-95"
        To: "transform opacity-100 scale-100"
      Leaving: "transition ease-in duration-75"
        From: "transform opacity-100 scale-100"
        To: "transform opacity-0 scale-95"
    -->
    <div x-show="show" @click.away="show = false"
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         class="{{@$isRight? 'origin-top-right right-0':'origin-top-left left-0'}} absolute  z-10 mt-2 w-40 rounded-md shadow-2xl bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
         role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
        <div class="py-1" role="none">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <template x-for="(item, key) in list">
                <button @click="choose=item;show=false"
                        :class="choose==item||!choose &&key==0 ? 'bg-gray-100':''"
                        class="block w-full px-4 py-2 text-sm font-medium text-gray-900 hover:text-gray-500 text-left"
                        role="menuitem"
                        tabindex="-1" id="menu-item-0" x-text="item"></button>
            </template>
            <template x-for="[item, key] in links">
                <a x-effect="console.log(key, item, Object.entries(links))"
                   :href="key"
                   :class="choose==item||!choose &&key==0 ? 'bg-gray-100':''"
                   class="block w-full px-4 py-2 text-sm font-medium text-gray-900 hover:text-gray-500 text-left"
                   role="menuitem"
                   tabindex="-1" id="menu-item-0" x-text="item"></a>
            </template>
        </div>
    </div>
</div>
