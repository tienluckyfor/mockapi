@extends($config->layout.'/master')

@section('main')
    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none xl:order-last">
        <!-- Breadcrumb -->
        {{-- <nav class="flex items-start px-4 py-3 sm:px-6 lg:px-8 xl:hidden" aria-label="Breadcrumb">
             <a href="#" class="inline-flex items-center space-x-3 text-sm font-medium text-gray-900">
                 <!-- Heroicon name: solid/chevron-left -->
                 <svg class="-ml-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                     <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                 </svg>
                 <span>Directory</span>
             </a>
         </nav>--}}

        <article>
            @include($config->view.'/components/profile-header')

            <!-- Description list -->
            <div class="mt-6 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Phone
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            (555) 123-4567
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Email
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            ricardocooper@example.com
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Title
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            Senior Front-End Developer
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Team
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            Product Development
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Location
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            San Francisco
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Sits
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            Oasis, 4th floor
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Salary
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            $145,000
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Birthday
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            June 8, 1990
                        </dd>
                    </div>

                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">
                            About
                        </dt>
                        <dd class="mt-1 max-w-prose text-sm text-gray-900 space-y-5">
                            Là người có niềm đam mê cháy bỏng với lập trình, đặc biệt là lập trình website.<br/>
                            Tôi là người kiên cường và tôi có kỹ năng phân tích tuyệt vời để giải quyết các vấn đề trong
                            quá trình làm việc.<br/>
                            Bên cạnh đó, tôi đã tham gia vào các dự án lớn với vai trò là nhà phát triển full-stack yêu
                            cầu phân tích hệ thống và tối ưu hóa trang web để tải nhanh hơn nhưng ít tài nguyên hơn.
                        </dd>
                    </div>
                </dl>
            </div>

            <!-- Team member list -->
            <div class="mt-8 max-w-5xl mx-auto px-4 pb-12 sm:px-6 lg:px-8">
                <h2 class="text-sm font-medium text-gray-500">Team members</h2>
                <div class="mt-1 grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-pink-500">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full"
                                 src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                 alt="">
                        </div>
                        <div class="flex-1 min-w-0">
                            <a href="#" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <p class="text-sm font-medium text-gray-900">
                                    Leslie Alexander
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    Co-Founder / CEO
                                </p>
                            </a>
                        </div>
                    </div>

                    <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-pink-500">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full"
                                 src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                 alt="">
                        </div>
                        <div class="flex-1 min-w-0">
                            <a href="#" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <p class="text-sm font-medium text-gray-900">
                                    Michael Foster
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    Co-Founder / CTO
                                </p>
                            </a>
                        </div>
                    </div>

                    <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-pink-500">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full"
                                 src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                 alt="">
                        </div>
                        <div class="flex-1 min-w-0">
                            <a href="#" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <p class="text-sm font-medium text-gray-900">
                                    Dries Vincent
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    Manager, Business Relations
                                </p>
                            </a>
                        </div>
                    </div>

                    <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-pink-500">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full"
                                 src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                 alt="">
                        </div>
                        <div class="flex-1 min-w-0">
                            <a href="#" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <p class="text-sm font-medium text-gray-900">
                                    Lindsay Walton
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    Front-end Developer
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </main>
@endsection