@extends($config->layout.'/master')
@section('main')

    <div class="content">
        <header class="header">
            <div class="header-panel-small background-hero">
                <h2 class="header-panel-small__title">Our Work</h2>
            </div>
        </header>

        <nav class="flex flex-no-wrap justify-center overflow-x-scroll border-b-2 border-gray-200">
            <a class="pill-grey pill-grey--selected" href="/our-work" title="Tighten Products">Products</a>

            <a class="pill-grey" href="/our-work/open-source" title="Tighten Open Source Projects">Open Source</a>

            <a class="pill-grey" href="/our-work/podcasts" title="Tighten Podcasts">Podcasts</a>
        </nav>

        <div class="flex flex-col items-start xl:flex-row">
            <div class="w-full p-6 xl:w-1/3 sm:p-8">
                <h2 class="text-left title-2">Products</h2>

                <p>
                    At any given time, we're usually working on 5 or 6 products. Here's a sampling of products we've worked on, both for our clients, and for ourselves.
                </p>
            </div>

            <div class="flex flex-col flex-wrap justify-start flex-1 w-full xl:w-2/3 md:flex-row">
                <div class="justify-end border-white cursor-pointer tile-portfolio bg-adopt-a-drain" onclick="window.location.href='/our-work/adopt-a-drain'">
                    <header class="tile-portfolio__header">
                        <small>Adopt-a-Drain</small>
                        <h3 class="title-3">
                            Latitude, Longitude, <br />
                            and Laravel
                        </h3>
                    </header>

                    <a href="/our-work/adopt-a-drain" title="Adopt-a-Drain" class="mt-8 text-sm btn btn-dark">
                        Read case study
                    </a>
                </div>

                <div class="justify-end border-white cursor-pointer bb-1 tile-portfolio bg-genentech" onclick="window.location.href='/our-work/making-medicine'">
                    <header class="tile-portfolio__header">
                        <small>Genentech</small>
                        <h3 class="leading-none title-3">
                            Making<br />
                            Medicine
                        </h3>
                    </header>

                    <a href="/our-work/making-medicine" title="Making Medicine by Tighten" class="mt-8 text-sm btn btn-dark">
                        Read case study
                    </a>
                </div>

                <div class="justify-end border-white cursor-pointer bb-1 tile-portfolio bg-hmd" onclick="window.location.href='/our-work/telehealth'">
                    <header class="tile-portfolio__header">
                        <small>TeleHealth Company</small>
                        <h3 class="leading-none title-3">
                            Mobile &amp; <br />
                            Web Apps
                        </h3>
                    </header>

                    <a href="/our-work/telehealth" title="Telehealth by Tighten" class="mt-8 text-sm btn btn-dark">
                        Read case study
                    </a>
                </div>

                <div class="justify-end border-white cursor-pointer tile-portfolio bg-fieldgoal" onclick="window.location.href='https://fieldgoal.io'">
                    <header class="tile-portfolio__header">
                        <small>Form Endpoints as a Service</small>
                        <h3 class="title-3">Fieldgoal</h3>
                    </header>

                    <a href="https://fieldgoal.io" title="FieldGoal by Tighten" class="mt-8 text-sm btn btn-dark">
                        View Product
                    </a>
                </div>

                <div class="justify-end border-white cursor-pointer tile-portfolio bg-karani" onclick="window.location.href='/our-work/karani'">
                    <header class="tile-portfolio__header">
                        <small>Tighten</small>
                        <h3 class="leading-none title-3">
                            Karani for <br />
                            Fundraising
                        </h3>
                    </header>

                    <a href="/our-work/karani" title="Karani by Tighten" class="mt-8 text-sm btn btn-dark">
                        Read case study
                    </a>
                </div>

                <div class="flex flex-col justify-end border-white cursor-pointer tile-portfolio bg-novapackages" onclick="window.location.href='https://novapackages.com'">
                    <header class="tile-portfolio__header">
                        <small>
                            Package Directory for <br />
                            Laravel Nova
                        </small>
                        <h3 class="leading-none title-3">Nova Packages</h3>
                    </header>

                    <a href="https://novapackages.com" title="Nova Packages by Tighten" class="mt-8 text-sm btn btn-dark">
                        View Product
                    </a>
                </div>
            </div>
        </div>
    </div>

    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam ducimus earum esse, illo illum iure, laudantium nobis, odit pariatur quaerat quibusdam quidem voluptates. Accusantium ex laudantium nemo optio reprehenderit?
@endsection