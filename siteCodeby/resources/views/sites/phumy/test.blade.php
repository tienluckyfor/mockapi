<html>

<head>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('tabs', {
                current: 'first',

                items: ['first', 'second', 'third'],
            })
        })
    </script>
</head>

<body>
<p x-data x-text="$store.tabs.current"></p>

<div x-data>
    <template x-for="tab in $store.tabs.items">
        <button @click="$store.tabs.current = tab" x-text="tab + ' tab'"></button>
    </template>
</div>

</body>

</html>