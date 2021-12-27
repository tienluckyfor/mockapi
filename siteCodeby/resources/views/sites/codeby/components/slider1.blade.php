@php
    if(empty($sliders))
        return;
@endphp

<section class="bg-indigo-100 flex justify-center ">
    <script>
        function carouselData(slides) {
            return {
                slides,
                activeSlide: 0,
                isPlay: true,
                goToPrevious() {
                    this.activeSlide =
                        this.activeSlide == 0 ? this.slides.length - 1 : this.activeSlide - 1;
                },
                goToNext() {
                    this.activeSlide =
                        this.activeSlide == this.slides.length - 1 ? 0 : this.activeSlide + 1;
                },
                startPlay() {
                    window.setInterval(() => {
                        if (this.isPlay) {
                            this.goToNext()
                        }
                    }, 3000);
                },
            };
        }

        const sliders = {!! json_encode($sliders) !!};
    </script>
    <div class="w-full relative">
        <div class="mx-auto relative w-full" x-data="carouselData(sliders)"
             x-init="startPlay()"
             @mouseover="isPlay=false"
             @mouseleave="isPlay=true"
        >
            <!-- Slides -->
            <template x-for="(slide, index) in slides" :key="index">
                <section
                        x-show="activeSlide == index"
                        class=" inset-0 bg-gray-800 py-32 px-6 sm:py-40 sm:px-12 lg:px-16 transform  "
                        style="height:550px;"
                >
                    <div class="absolute inset-0 overflow-hidden"
                    >
                        <img
                                x-bind:src="slide.image.media[0].file"
                                alt=""
                                class="w-full h-full object-center object-cover"/>
                    </div>
                    <div x-show="!slide.more.isLight" aria-hidden="true"
                         class="absolute inset-0 bg-gray-900 bg-opacity-0"></div>
                    <div class="relative max-w-3xl mx-auto flex flex-col items-center text-center">
                        <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl"
                            x-html="slide.name">-</h2>
                        <p class="mt-3 text-xl text-white" x-html="slide.content">-</p>
                        <a
                                x-show="slide.more.button.name"
                                href="#"
                                x-bind:href="'{{$config->base_url}}'+slide.more.button.link"
                                x-html="slide.more.button.name"
                                class="mt-8 w-full block bg-white border border-transparent rounded-md py-3 px-8 text-base font-medium text-gray-900 hover:bg-gray-100 sm:w-auto">Read
                            our story</a>
                    </div>
                </section>
            </template>

            <!-- Prev/Next Arrows -->
            <button @click="goToPrevious()"
                    class="absolute absolute-y left-0 bg-white text-gray-500 hover:text-indigo-500 font-bold hover:shadow-lg rounded-full w-12 h-12 ml-6 focus:outline-none">
                &#8592;
            </button>
            <button @click="goToNext()"
                    class="absolute absolute-y right-0 bg-white text-indigo-500 hover:text-indigo-500 font-bold hover:shadow-lg rounded-full w-12 h-12 mr-6 focus:outline-none">
                &#8594;
            </button>

            <!-- Buttons -->
            <div class="absolute w-full flex items-center justify-center px-4 bottom-2">
                <template x-for="(slide, index) in slides" :key="index">
                    <button @click="activeSlide = index"
                            :class="{ 'bg-indigo-800': activeSlide ==index, 'bg-white': activeSlide != index }"
                            class="w-4 h-2 mt-4 mx-2 mb-0 rounded-full overflow-hidden transition-colors duration-200 ease-out hover:bg-indigo-600 hover:shadow-lg focus:outline-none"></button>
                </template>
            </div>
        </div>
    </div>
</section>