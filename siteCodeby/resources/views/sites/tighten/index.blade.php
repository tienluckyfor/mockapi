<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Tighten | Product Development for Web + Mobile | Laravel + Vue.js</title>

    <meta name="description"
          content="Tighten is a software development firm specializing in Laravel, Vue.js, React, and hybrid mobile development." />
    <meta property="og:title" content="Tighten | Product Development for Web + Mobile | Laravel + Vue.js" />
    <meta property="og:description"
          content="Tighten is a software development firm specializing in Laravel, Vue.js, React, and hybrid mobile development." />
    <meta property="og:image" content="/assets/img/tighten-og-cover.png" />
    <meta property="og:url" content="/" />
    <meta property="og:site_name" content="Tighten" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@TightenCo" />
    <meta name="twitter:image:alt" content="Tighten logo" />

    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-MPWPMWX"></script>
    <script async="" defer="" data-domain="tighten.co" src="https://plausible.io/js/plausible.js"></script>

    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-MPWPMWX");
    </script>
    <!-- End Google Tag Manager -->

    <link rel="home" href="/" />
    <link rel="alternate" type="application/atom+xml" title="RSS feed for the Tighten blog" href="/blog/feed.atom" />
    <link rel="preconnect" href="https://use.typekit.net/" crossorigin="" />
    <link rel="preconnect" href="https://p.typekit.net/" crossorigin="" />

    <!-- Home page critical CSS -->
    <style>
        .post-critical {
            visibility: hidden;
        }

        .leading-normal {
            line-height: 1.5 !important;
        }

        .bg-center {
            background-position: 50% !important;
        }

        .bg-yellow-600 {
            --bg-opacity: 1 !important;
            background-color: #fca52b !important;
            background-color: rgba(252, 165, 43, var(--bg-opacity)) !important;
        }

        .my-9 {
            margin-top: 2.5rem !important;
            margin-bottom: 2.5rem !important;
        }

        .pb-6 {
            padding-bottom: 1.5rem !important;
        }

        .pt-16 {
            padding-top: 4rem !important;
        }

        .pb-16 {
            padding-bottom: 4rem !important;
        }

        .px-2 {
            padding-left: 0.5rem !important;
            padding-right: 0.5rem !important;
        }

        @media (min-width: 992px) {
            .lg\:text-4xl {
                font-size: 2.25rem !important;
            }
        }

        .mt-8 {
            margin-top: 2rem !important;
        }

        .pt-8 {
            padding-top: 2rem !important;
        }

        .headline {
            width: 217px;
        }

        @media (min-width: 992px) {
            .headline {
                display: none;
            }
        }

        .headline--lg {
            display: none;
            width: 825px;
        }

        @media (min-width: 992px) {
            .headline--lg {
                display: block;
            }
        }

        .text-xl {
            font-size: 1.25rem !important;
        }

        @media (min-width: 576px) {
            .sm\:text-3xl {
                font-size: 1.75rem !important;
            }
        }

        .mb-9 {
            margin-bottom: 2.5rem !important;
        }
    </style>

    <!-- Global critical CSS -->
    <style>
        html {
            -webkit-text-size-adjust: 100%
        }

        html {
            -webkit-box-sizing: border-box;
            box-sizing: border-boxfont-family: proxima-nova, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen, Ubuntu, Cantarell, Fira Sans, Droid Sans, Helvetica Neue;
            line-height: 1.5
        }

        img {
            max-width: 100%;
        }

        *,
        :after,
        :before {
            -webkit-box-sizing: inherit;
            box-sizing: inherit;
            border: 0 solid #d7dde1;
        }

        body,
        html {
            margin: 0;
            padding: 0;
            overflow-x: hidden
        }

        blockquote,
        dd,
        dl,
        figure,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        hr,
        p,
        pre {
            margin: 0;
        }

        *,
        :after,
        :before {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        a {
            background-color: transparentcolor: inherit;
            text-decoration: inherit
        }

        audio,
        canvas,
        embed,
        iframe,
        img,
        object,
        svg,
        video {
            display: block;
            vertical-align: middle
        }

        p {
            line-height: 1.5;
            margin: 1em 0;
        }

        .block {
            display: block !important
        }

        .flex {
            display: -webkit-box !important;
            display: -ms-flexbox !important;
            display: flex !important
        }

        .hidden {
            display: none !important
        }

        .items-center {
            -webkit-box-align: center !important;
            -ms-flex-align: center !important;
            align-items: center !important
        }

        .justify-between {
            -webkit-box-pack: justify !important;
            -ms-flex-pack: justify !important;
            justify-content: space-between !important
        }

        .justify-around {
            -ms-flex-pack: distribute !important;
            justify-content: space-around !important
        }

        .flex-1 {
            -webkit-box-flex: 1 !important;
            -ms-flex: 1 1 0% !important;
            flex: 1 1 0% !important
        }

        .flex-none {
            -webkit-box-flex: 0 !important;
            -ms-flex: none !important;
            flex: none !important
        }

        .order-first {
            -webkit-box-ordinal-group: -9998 !important;
            -ms-flex-order: -9999 !important;
            order: -9999 !important
        }

        .font-sans {
            font-family: proxima-nova, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen, Ubuntu, Cantarell, Fira Sans, Droid Sans, Helvetica Neue !important
        }

        .mx-auto {
            margin-left: auto !important;
            margin-right: auto !important
        }

        .mr-3 {
            margin-right: .75rem !important
        }

        .max-w-7xl {
            max-width: 80rem !important
        }

        .min-h-screen {
            min-height: 100vh !important
        }

        .py-3 {
            padding-top: .75rem !important;
            padding-bottom: .75rem !important
        }

        .px-4 {
            padding-left: 1rem !important;
            padding-right: 1rem !important
        }

        .shadow-md {
            -webkit-box-shadow: 0 4px 10px 0 rgba(0, 0, 0, .12), 0 0 4px 0 rgba(0, 0, 0, .08) !important;
            box-shadow: 0 4px 10px 0 rgba(0, 0, 0, .12), 0 0 4px 0 rgba(0, 0, 0, .08) !important
        }

        .text-center {
            text-align: center !important
        }

        .text-right {
            text-align: right !important
        }

        .font-sans {
            letter-spacing: .025em
        }

        .content,
        .primary-footer,
        .primary-header {
            background-color: #fff;
            margin: 0 auto;
            position: relative;
            z-index: 1
        }

        .content {
            min-height: calc(100vh - 206px)
        }

        h2 {
            font-size: 1.5em;
        }

        html {
            line-height: 1.15;
            font-size: 14px;
            -webkit-font-smoothing: antialiased
        }

        body {
            font-weight: 300;
            min-width: 100%;
            --text-opacity: 1;
            color: #364349;
            color: rgba(54, 67, 73, var(--text-opacity));
            background: #f3eee8
        }

        a {
            font-weight: 600;
            color: #018482;
            color: rgba(1, 132, 130, var(--text-opacity));
            text-decoration: underline;
        }

        a,
        a:hover {
            --text-opacity: 1
        }

        @media (min-width: 768px) {
            .primary-nav__group {
                margin-bottom: .5rem;
                margin-left: 1rem;
                margin-right: 1rem;
            }
        }

        @media (min-width: 992px) {
            .primary-nav__group {
                margin-left: 1.5rem;
                margin-right: 1.5rem;
            }
        }

        @media (min-width: 1200px) {
            .primary-nav__group {
                margin-left: 2rem;
                margin-right: 2rem;
            }
        }

        .primary-nav__logo {
            display: block;
            overflow: hidden;
        }

        @media (min-width: 576px) {
            .primary-nav__logo {
                height: 30px;
                padding-top: 2px;
                width: 28px;
            }
        }

        @media (min-width: 768px) {
            .primary-nav__logo {
                height: 80px;
                width: 150px;
            }

            .content {
                min-height: calc(100vh - 253px);
            }
        }

        .primary-nav__logo svg {
            left: 50%;
            position: relative;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            color: #4a4a4a;
            fill: #ffaa30;
            height: 4em;
            margin-top: -.2em;
            width: 8em;
        }

        @media (min-width: 576px) {
            .primary-nav__logo svg {
                height: 52px;
                width: 120px;
            }
        }

        @media (min-width: 768px) {
            .primary-nav__logo svg {
                height: 77px;
                width: 150px;
            }
        }

        .primary-nav__item {
            border-bottom-width: 1px;
            border-color: transparent;
            font-family: Knockout\ 30 A, Knockout\ 30 B, 'Avenir Next Condensed';
            font-weight: 500;
            font-style: normal;
            text-decoration: none;
            padding-bottom: .5rem;
            padding-left: .25rem;
            padding-right: .25rem;
            --text-opacity: 1;
            color: #364349;
            color: rgba(54, 67, 73, var(--text-opacity));
            font-size: .875rem;
            letter-spacing: .05em;
            text-transform: uppercase
        }

        @media (min-width: 992px) {
            .primary-nav__item {
                font-size: 1.0625rem
            }
        }

        .hamburger {
            background-color: transparent;
            border: 0;
            color: inherit;
            cursor: pointer;
            display: inline-block;
            font: inherit;
            margin: 0;
            overflow: visible;
            padding: 15px;
            text-transform: none;
        }

        .hamburger-box {
            display: inline-block;
            height: 14px;
            position: relative;
            width: 25px
        }

        .hamburger-inner {
            display: block;
            margin-top: -1px;
            top: 50%
        }

        .hamburger-inner,
        .hamburger-inner:after,
        .hamburger-inner:before {
            background-color: #4a4a4a;
            border-radius: 4px;
            height: 2px;
            position: absolute;
            transition-timing-function: ease;
            width: 25px
        }

        .hamburger-inner:after,
        .hamburger-inner:before {
            content: "";
            display: block
        }

        .hamburger-inner:before {
            top: -6px
        }

        .hamburger-inner:after {
            bottom: -6px
        }

        .hamburger--squeeze .hamburger-inner {}

        .hamburger--squeeze .hamburger-inner:before {}

        .hamburger--squeeze .hamburger-inner:after {}

        .order-first {
            -webkit-box-ordinal-group: 2;
            -ms-flex-order: 1;
            order: 1
        }

        .order-second {
            -webkit-box-ordinal-group: 3;
            -ms-flex-order: 2;
            order: 2
        }

        @media (min-width: 576px) {
            .sm\:block {
                display: block !important
            }

            .sm\:flex {
                display: -webkit-box !important;
                display: -ms-flexbox !important;
                display: flex !important
            }

            .sm\:hidden {
                display: none !important
            }

            .sm\:items-end {
                -webkit-box-align: end !important;
                -ms-flex-align: end !important;
                align-items: flex-end !important
            }

            .sm\:order-first {
                -webkit-box-ordinal-group: -9998 !important;
                -ms-flex-order: -9999 !important;
                order: -9999 !important
            }

            .sm\:mx-6 {
                margin-left: 1.5rem !important;
                margin-right: 1.5rem !important
            }

            .sm\:py-5 {
                padding-top: 1.25rem !important;
                padding-bottom: 1.25rem !important
            }

            .sm\:px-8 {
                padding-left: 2rem !important;
                padding-right: 2rem !important
            }

            .sm\:order-first {
                -webkit-box-ordinal-group: 2;
                -ms-flex-order: 1;
                order: 1
            }

            .sm\:order-second {
                -webkit-box-ordinal-group: 3;
                -ms-flex-order: 2;
                order: 2
            }

            .sm\:order-third {
                -webkit-box-ordinal-group: 4;
                -ms-flex-order: 3;
                order: 3
            }
        }

        @media (min-width: 768px) {
            .md\:py-7 {
                padding-top: 1.75rem !important;
                padding-bottom: 1.75rem !important
            }
        }

        @media (min-width: 992px) {
            html {
                font-size: 17px;
            }
        }

        @media (min-width: 1200px) {
            .xl\:mx-8 {
                margin-left: 2rem !important;
                margin-right: 2rem !important;
            }
        }

        .background-hero {
            background-color: #fab951;
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 400' width='400' height='400'%3E%3Cpath fill='%23F6B459' d='M0 0h400v400H0z'/%3E%3Cpath fill='%23F4AB53' d='M276 236.9a30.03 30.03 0 0 0-4-6.16V200h4v36.9zm0 26.2V300h-4v-30.74a30.03 30.03 0 0 0 4-6.17zm-8-36.32a30.07 30.07 0 0 0-4-2.77V200h4v26.78zm0 46.44V300h-4v-24.01a30.07 30.07 0 0 0 4-2.77zm-8-51.14c-1.3-.5-2.63-.93-4-1.26V200h4v22.08zm0 55.84V300h-4v-20.82c1.37-.33 2.7-.75 4-1.26zm-8-57.77a30.36 30.36 0 0 0-4-.13V200h4v20.15zm0 59.7V300h-4v-20.02a30.55 30.55 0 0 0 4-.13zm-8-59.44c-1.37.23-2.7.56-4 .96V200h4v20.41zm0 59.18V300h-4v-21.37c1.3.4 2.63.73 4 .96zm-8-56.63c-1.4.67-2.73 1.45-4 2.32V200h4v22.96zm0 54.08V300h-4v-25.28c1.27.87 2.6 1.65 4 2.32zm-8-48.46a30.15 30.15 0 0 0-4 4.83V200h4v28.58zm0 42.84V300h-4v-33.41a30.15 30.15 0 0 0 4 4.83zm-8-29.13a30.04 30.04 0 0 0 0 15.42V300h-4V200h4v42.29zM300 200v100h-4V200h4zm-8 0v100h-4V200h4zm-8 0v100h-4V200h4zm-72 0v100h-4V200h4zm-47 170v-44h-32v44h32zm35-170c0-55.23 44.77-100 100-100s100 44.77 100 100h-35a65 65 0 1 0-130 0h-31v100h-4V200zm129.54 172a30.17 30.17 0 0 1-3.6-4h48a30.17 30.17 0 0 1-3.6 4h-40.8zm5.42 4h29.95c-4.4 2.54-9.52 4-14.98 4a29.86 29.86 0 0 1-14.97-4zm-11.57-12a29.83 29.83 0 0 1-1.75-4h56.59a29.83 29.83 0 0 1-1.76 4H323.4zm-2.86-8a30 30 0 0 1-.53-4h59.87a30 30 0 0 1-.54 4h-58.8zm-.53-8a30 30 0 0 1 .53-4h58.8a30 30 0 0 1 .54 4H320zm1.64-8a29.83 29.83 0 0 1 1.75-4h53.08a29.83 29.83 0 0 1 1.76 4h-56.59zm4.3-8a30.17 30.17 0 0 1 3.6-4h40.8a30.17 30.17 0 0 1 3.6 4h-48zm9.02-8c4.4-2.54 9.52-4 14.97-4 5.46 0 10.57 1.46 14.98 4h-29.95zM0 100l50 50-50 50V100zm50 0l50 50-50 50V100zm20 55a5 5 0 1 0 0-10 5 5 0 0 0 0 10zm-50 0a5 5 0 1 0 0-10 5 5 0 0 0 0 10zm80 45h100l-50 50-50-50zM364.14 35.86a20 20 0 1 0-28.28 28.28L300 100V0h100l-35.86 35.86zM150 50h-50l50-50v50zm0 50h-50l50-50v50zm50 0h-50l50-50v50zm0-50h-50l50-50v50zm100 250v100H200l100-100zM0 300c55.23 0 100 44.77 100 100h-4a96 96 0 0 0-96-96v-4zm0 16a84 84 0 0 1 84 84h-4a80 80 0 0 0-80-80v-4zm0 16a68 68 0 0 1 68 68h-4a64 64 0 0 0-64-64v-4zm0 16a52 52 0 0 1 52 52h-4a48 48 0 0 0-48-48v-4zm0 16a36 36 0 0 1 36 36h-4a32 32 0 0 0-32-32v-4zm0 16a20 20 0 0 1 20 20h-4a16 16 0 0 0-16-16v-4zm256-180a44 44 0 1 1 88 0h-4a40 40 0 1 0-80 0h-4zm123.4 50.01c.42.47.32.84-.45 1.05l-8.54 2.28c2.53 3.37 7.35 9.83 7.76 10.43.56.83.05 1.07-.77 1.4-.83.35-19.12 6.92-20.36 7.3-1.6.48-2.32.72-3.36-.73-.78-1.1-5-8.68-7.07-12.42-3.91 1.02-11.08 2.89-13.15 3.38-2.01.49-2.87-.72-3.2-1.46-.34-.75-12.22-26.33-12.97-28.09-.74-1.76.08-2.09.82-2.15.75-.06 11.21-.93 12.58-1 1.37-.05 1.49.26 2.09 1.15l15.08 25.18 18.97-4.54c-1.05-1.48-5.82-8.24-6.29-8.88-.51-.73.02-1.06.86-1.2.84-.15 8.1-1.37 8.72-1.46.62-.09 1.11-.3 2.13.91 1 1.22 6.74 8.39 7.15 8.85zm-3.34-.46c.42-.1.73-.24.55-.47-.19-.23-4.99-6.3-5.34-6.78-.35-.48-.6-.4-.88-.34-.28.07-6.6 1.2-6.98 1.26-.39.05-.26.27-.1.49l5.55 7.61s6.79-1.68 7.2-1.77zm-1.18 13.11c-.17-.27-5.97-8.17-6.28-8.61-.23-.33-.35-.4-.9-.22l-18.49 4.8s5.68 9.82 6.12 10.44c.43.63.7.59 1.04.44.34-.15 17.78-6.03 18.31-6.22.54-.2.37-.36.2-.63zm-29.95-5.6c.49-.12.37-.18.13-.6l-14.16-24.42c-.13-.22-.1-.3-.44-.27-.35.02-10.22.9-10.38.9-.17 0-.18.25 0 .58.17.32 12.74 26.2 12.8 26.4.07.19.07.25.63.12l11.42-2.72zM149 135.4l6.63-11.4H179l-30 51.6-30-51.6h23.37l6.63 11.4zm17.27-9.6L149 155.5l-17.27-29.7h-9.6L149 172.02l26.87-46.22h-9.6zm102.58-84.3c6.55 2.26 10.78 5.8 10.78 9.45 0 3.81-4.52 7.54-11.47 9.84l-1.13.36c.14.55.26 1.09.36 1.62 1.38 6.94.32 12.64-2.93 14.52-3.15 1.83-8.24.04-13.4-4.4-.55-.49-1.1-.99-1.63-1.5-.42.4-.85.8-1.27 1.17-5.32 4.65-10.78 6.58-14.04 4.7-3.15-1.82-4.14-7.12-2.87-13.8.14-.74.3-1.46.48-2.18-.55-.15-1.1-.32-1.64-.5-6.69-2.3-11.09-6.07-11.09-9.83 0-3.64 4.1-7.15 10.52-9.4.72-.24 1.47-.48 2.24-.7l-.45-2.01c-1.33-6.8-.39-12.24 2.77-14.07 3.3-1.91 8.78.14 14.26 5 .34.3.67.62 1 .93.5-.47 1-.93 1.51-1.38 5.23-4.55 10.4-6.46 13.56-4.63 3.3 1.9 4.27 7.68 2.8 14.86l-.31 1.34c.66.19 1.3.4 1.95.61zm-1.5 16.83c6-1.99 9.7-5.03 9.7-7.38 0-2.2-3.43-5.06-9.04-7a38.1 38.1 0 0 0-1.8-.57 60.87 60.87 0 0 1-2.95 7.58 60.9 60.9 0 0 1 3.07 7.7l1.01-.33zm-2.5 4.94c-.1-.48-.2-.97-.32-1.47-2.52.58-5.29 1.01-8.22 1.27a60.92 60.92 0 0 1-5.08 6.46c.51.5 1.02.96 1.53 1.4 4.4 3.79 8.49 5.23 10.4 4.12.9-.52 1.62-1.82 1.99-3.77.4-2.17.31-4.94-.3-8zm-25.18 11.59c2.08-.74 4.44-2.2 6.79-4.26.4-.34.78-.7 1.15-1.06a63.08 63.08 0 0 1-5.2-6.44 60.85 60.85 0 0 1-8.17-1.18c-.17.67-.32 1.34-.44 2.01-1.09 5.72-.3 9.98 1.62 11.09.9.52 2.38.5 4.25-.16zm-8.75-16.54c.5.17 1 .32 1.5.47.77-2.5 1.78-5.13 3-7.78-1.2-2.61-2.2-5.2-2.96-7.66-.7.2-1.4.41-2.09.65-5.49 1.92-8.78 4.74-8.78 6.95 0 1.04.76 2.32 2.26 3.6a21.94 21.94 0 0 0 7.07 3.77zm2.94-19.98c.12.63.26 1.25.41 1.87 2.51-.57 5.24-1 8.1-1.26 1.66-2.35 3.4-4.5 5.16-6.4-.3-.29-.6-.57-.91-.84-4.73-4.2-9.21-5.88-11.24-4.7-1.9 1.1-2.66 5.5-1.52 11.33zM260 44.81a90.4 90.4 0 0 1 1.74 3.15c.77-1.8 1.42-3.55 1.94-5.22a56.9 56.9 0 0 0-5.52-.97c.63 1 1.25 2.01 1.84 3.04zm-10.67-10.4a57.16 57.16 0 0 0-3.6 4.3 76.2 76.2 0 0 1 7.17 0 55.44 55.44 0 0 0-3.57-4.3zM238.6 44.82c.6-1.03 1.22-2.05 1.86-3.05-1.92.24-3.77.55-5.5.94.53 1.7 1.18 3.46 1.93 5.25.55-1.06 1.12-2.1 1.71-3.14zm1.91 15.5a76.64 76.64 0 0 1-3.62-6.26 58.18 58.18 0 0 0-1.96 5.36c1.73.37 3.6.68 5.58.9zm8.9 7.35a55.13 55.13 0 0 0 3.56-4.38 82.05 82.05 0 0 1-7.21.01 58.26 58.26 0 0 0 3.65 4.37zm12.36-13.7a82.4 82.4 0 0 1-3.62 6.3c2-.24 3.9-.56 5.66-.96a55.1 55.1 0 0 0-2.04-5.34zm-4 1.92c.92-1.6 1.8-3.25 2.6-4.92a85.02 85.02 0 0 0-5.53-9.53 72.84 72.84 0 0 0-11.05 0 73.59 73.59 0 0 0-5.52 9.58 72.9 72.9 0 0 0 5.55 9.59 84.92 84.92 0 0 0 11.04-.02 85.02 85.02 0 0 0 2.9-4.7zm5.34-28.96c-1.9-1.1-6.09.44-10.57 4.34-.47.42-.94.84-1.39 1.28a60.9 60.9 0 0 1 5.12 6.4 62 62 0 0 1 8.11 1.29c.1-.4.2-.8.27-1.2 1.28-6.2.49-10.93-1.54-12.1zm-13.8 18.6a5.42 5.42 0 1 1-.01 10.83 5.42 5.42 0 0 1 0-10.83zM136 317h26a5 5 0 0 1 5 5v52a5 5 0 0 1-5 5h-26a5 5 0 0 1-5-5v-52a5 5 0 0 1 5-5zm10.5 4a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm-3.5 1.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm6.5 54.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z'/%3E%3Cpath fill='%23F8BD6B' d='M235 200a65 65 0 1 1 130 0h-4a61 61 0 1 0-122 0h-4zM0 0h100v4H0V0zm0 8h100v4H0V8zm0 8h100v4H0v-4zm0 8h100v4H0v-4zm0 8h100v4H0v-4zm0 8h100v4H0v-4zm0 8h100v4H0v-4zm0 8h100v4H0v-4zm0 8h100v4H0v-4zm0 8h100v4H0v-4zm0 8h100v4H0v-4zm0 8h100v4H0v-4zm0 8h100v4H0v-4zm328.1 8c-8.92-2.6-18.35-4-28.1-4s-19.18 1.4-28.1 4H200v-4h200v4h-71.9zm-82.38 12c-1.96 1.27-3.87 2.6-5.73 4H200v-4h45.72zm108.56 0H400v4h-39.99c-1.86-1.4-3.77-2.73-5.73-4zm-127.6 16c-1.21 1.3-2.38 2.64-3.52 4H200v-4h26.68zm146.64 0H400v4h-23.16c-1.14-1.36-2.31-2.7-3.52-4zm-158.75 16a99.9 99.9 0 0 0-2.32 4H200v-4h14.57zm170.86 0H400v4h-12.25a99.9 99.9 0 0 0-2.32-4zm-178.75 16c-.51 1.32-1 2.65-1.45 4H200v-4h6.68zm75.86 0h34.92a40 40 0 0 1 6.54 4h-48a40 40 0 0 1 6.54-4zm110.78 0H400v4h-5.23a99.25 99.25 0 0 0-1.45-4zM202 180a99.6 99.6 0 0 0-.73 4H200v-4h2zm63.35 0h69.3a39.86 39.86 0 0 1 2.02 4h-73.34c.6-1.38 1.28-2.71 2.02-4zM398 180h2v4h-1.27a99.6 99.6 0 0 0-.73-4zm-197.92 16c-.05 1.33-.08 2.66-.08 4v-4h.08zm60.12 0h79.6c.13 1.32.2 2.65.2 4h-80c0-1.35.07-2.68.2-4zm139.72 0h.08v4c0-1.34-.03-2.67-.08-4zM200 200v4h-4l4-4zm-16 16h16v4h-20l4-4zm-16 16h32v4h-36l4-4zm-16 16h48v4h-52l4-4zm-16 16h64v4h-68l4-4zm-16 16h80v4h-84l4-4zm-16 16h96v4H100l4-4zm-74-56a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm40 0a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm-40 40a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm40 0a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm180 70h-50l50-50v50zm100-30a30 30 0 0 0 0 60v20h-50V300h50v20zM335.86 64.14l28.28-28.28a20 20 0 0 1-28.28 28.28zM250 260a10 10 0 1 1 0-20 10 10 0 0 1 0 20z'/%3E%3C/svg%3E")
        }

        .header-panel-small {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background-color: #ffaa30;
            background-size: 80%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            height: 100px;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            padding: 0;
        }

        .header-panel-small a {
            color: #fff;
            text-decoration: none;
        }

        @media (min-width: 576px) {
            .header-panel-small {
                background-size: 50%;
            }
        }

        @media (min-width: 768px) {
            .header-panel-small {
                background-size: 30%;
            }
        }

        .header-panel-small__title {
            font-family: Knockout\ 28 A, Knockout\ 28 B, 'Avenir Next Condensed';
            font-weight: 400;
            font-style: normal;
            color: #fff;
            font-size: 3em;
            letter-spacing: .05em;
            margin: 0;
            margin-bottom: 0;
            text-shadow: 3px 4px rgba(0, 0, 0, .3);
            text-transform: uppercase;
        }

        .uppercase {
            text-transform: uppercase !important
        }

        .font-knockout-30 {
            font-family: Knockout\ 30 A, Knockout\ 30 B, 'Avenir Next Condensed';
            font-weight: 400;
            font-style: normal;
            letter-spacing: .05em;
        }

        .flex-col {
            -webkit-box-direction: normal !important;
            -ms-flex-direction: column !important;
            flex-direction: column !important;
        }

        .flex-col,
        .flex-col-reverse {
            -webkit-box-orient: vertical !important;
        }

        .btn {
            border-width: 0;
            cursor: pointer;
            display: inline-block;
            line-height: 1;
            margin-top: .5rem;
            margin-bottom: .5rem;
            padding: 1.25rem 3rem;
            text-align: center;
            font-size: 1.25rem;
        }

        .btn,
        .btn-dark {
            font-family: Knockout\ 30 A, Knockout\ 30 B, 'Avenir Next Condensed';
            font-weight: 400;
            font-style: normal;
            letter-spacing: .05em;
            text-decoration: none;
            text-transform: uppercase
        }

        .btn-dark {
            --text-opacity: 1;
            color: #fff;
            color: rgba(255, 255, 255, var(--text-opacity));
            background: #354349
        }

        .text-2xl {
            font-size: 1.5rem !important
        }

        ol,
        ul {
            list-style: none;
        }

        fieldset,
        ol,
        ul {
            margin: 0;
            padding: 0;
        }

        .constrainer--medium {
            margin: 0 auto;
            max-width: 64em;
            padding: 0 1.5em;
        }

        @media (min-width: 768px) {
            .constrainer--medium {
                padding: 0 3em;
            }
        }

        .no-underline {
            text-decoration: none !important;
        }

        .underline {
            text-decoration: underline !important;
        }

        .font-semibold {
            font-weight: 600 !important;
        }

        .w-full {
            width: 100% !important;
        }

        h2.title-2,
        h3.title-3 {
            font-family: Knockout\ 28 A, Knockout\ 28 B, Avenir Next Condensed;
            font-weight: 400;
            font-style: normal;
            text-transform: uppercase;
        }

        h2.title-2 {
            font-size: 2.25rem;
            letter-spacing: .025em;
        }

        h3.title-3 {
            margin-bottom: .5rem;
            font-size: 1.75rem;
        }

        .knockout-later-loading .primary-nav__item,
        .knockout-later-loading .header-panel-small__title {
            visibility: hidden;
        }

        [x-cloak] {
            display: none !important
        }
    </style>
    <!-- Lazy load non-critical CSS -->
    <link rel="stylesheet" href="{{$config->static}}/assets/build/css/style.css?id=a393518fee7e66f8c34a" media="all"
          onload="this.media='all'; this.onload=null;" />
    <!-- 
    <link rel="stylesheet" id="knockout" href="//cloud.typography.com/7829512/685324/css/fonts.css" media="all"
        onload="this.media='all'; this.onload=null; sessionStorage.setItem('knockoutLoaded', true);document.getElementsByTagName('body')[0].classList.remove('knockout-later-loading')" /> -->

    <script defer="" src="/assets/build/js/alpine-app.js?id=78d9b112fc943fb4ca14"></script>

    <script defer="" src="https://cdn.jsdelivr.net/npm/lazysizes@5.2.0/lazysizes.min.js"></script>
</head>

<body class="font-sans" _c_t_common="1">
<script>
    !sessionStorage.getItem("knockoutLoaded") && document.getElementsByTagName("body")[0].classList.remove("knockout-later-loading");
</script>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MPWPMWX" height="0" width="0"
                  style="display: none; visibility: hidden;"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<svg style="display: none;">
    <symbol id="icon-tighten-logo" viewBox="0 0 100 15">
        <g class="icon">
            <path
                    d="M10.77,7.76a.28.28,0,0,1-.28.28H8.75A1.63,1.63,0,0,0,7.12,9.67h0v1.74a.28.28,0,0,1-.28.28H6.32A.28.28,0,0,1,6,11.41V9.67A1.63,1.63,0,0,0,4.41,8H2.67a.28.28,0,0,1-.28-.28h0V7.24A.28.28,0,0,1,2.67,7H4.41A1.63,1.63,0,0,0,6,5.33H6V3.59a.28.28,0,0,1,.28-.28H6.8a.28.28,0,0,1,.28.28h0V5.33A1.63,1.63,0,0,0,8.67,7h1.82a.28.28,0,0,1,.28.28Zm1.82-4.4L7.16.23A1.28,1.28,0,0,0,6,.23L.58,3.37a1.28,1.28,0,0,0-.58,1v6.26a1.29,1.29,0,0,0,.58,1L6,14.77a1.28,1.28,0,0,0,1.16,0l5.42-3.13a1.28,1.28,0,0,0,.58-1V4.37a1.28,1.28,0,0,0-.58-1">
            </path>
        </g>
        <g class="text" fill="currentColor">
            <path
                    d="M81.89,4.62H80.83V3.55h3.24V4.62H83v6.82H81.58c-.33,0-.39-.07-.53-.37L78.41,5h-.17v5.37H79.3v1.07H76V10.38h1.06V4.62H76V3.55h2.62c.33,0,.39.07.53.37l2.53,5.8h.17Z">
            </path>
            <polygon
                    points="66.63 4.62 66.63 3.55 72.81 3.55 72.81 5.93 71.62 5.93 71.62 4.62 68.89 4.62 68.89 6.83 71.01 6.83 71.01 7.87 68.89 7.87 68.89 10.38 71.71 10.38 71.71 8.9 72.9 8.9 72.9 11.45 66.63 11.45 66.63 10.38 67.69 10.38 67.69 4.62 66.63 4.62">
            </polygon>
            <polygon
                    points="61.84 10.38 61.84 11.45 58.4 11.45 58.4 10.38 59.51 10.38 59.51 4.62 57.88 4.62 57.88 6.16 56.69 6.16 56.69 3.55 63.54 3.55 63.54 6.16 62.36 6.16 62.36 4.62 60.72 4.62 60.72 10.38 61.84 10.38">
            </polygon>
            <polygon
                    points="52.54 10.38 53.6 10.38 53.6 11.45 50.27 11.45 50.27 10.38 51.34 10.38 51.34 7.87 48.13 7.87 48.13 10.38 49.19 10.38 49.19 11.45 45.87 11.45 45.87 10.38 46.92 10.38 46.92 4.62 45.87 4.62 45.87 3.55 49.19 3.55 49.19 4.62 48.13 4.62 48.13 6.83 51.34 6.83 51.34 4.62 50.27 4.62 50.27 3.55 53.6 3.55 53.6 4.62 52.54 4.62 52.54 10.38">
            </polygon>
            <path
                    d="M41.34,6c0-.94-.06-1.16-.15-1.25s-.16-.1-.5-.1h-2c-.35,0-.43,0-.51.1S38,5.22,38,7.5s0,2.61.16,2.72.16.1.51.1h2.09c.32,0,.43,0,.51-.1s.15-.44.15-1.43v-.4H39.75v-1h2.89V8.54c0,1.74-.11,2.21-.46,2.56a1.58,1.58,0,0,1-1.23.35H38.4c-.68,0-.94-.08-1.17-.32-.39-.39-.54-1-.54-3.63s.15-3.24.54-3.63c.24-.24.5-.32,1.17-.32h2.48a1.68,1.68,0,0,1,1.21.29c.36.36.45.79.47,2.19Z">
            </path>
            <polygon
                    points="33.46 10.38 33.46 11.45 30.04 11.45 30.04 10.38 31.15 10.38 31.15 4.62 30.04 4.62 30.04 3.55 33.46 3.55 33.46 4.62 32.35 4.62 32.35 10.38 33.46 10.38">
            </polygon>
            <polygon
                    points="25.22 10.38 25.22 11.45 21.78 11.45 21.78 10.38 22.9 10.38 22.9 4.62 21.26 4.62 21.26 6.16 20.07 6.16 20.07 3.55 26.92 3.55 26.92 6.16 25.74 6.16 25.74 4.62 24.1 4.62 24.1 10.38 25.22 10.38">
            </polygon>
        </g>
    </symbol>

    <symbol id="icon-tighten-logo--vertical" viewBox="0 0 179.76 117.34">
        <g class="icon">
            <path
                    d="M114.82,19.15a5.32,5.32,0,0,1,2.41,4.17v26a5.32,5.32,0,0,1-2.41,4.17l-22.53,13a5.32,5.32,0,0,1-4.82,0l-22.53-13a5.34,5.34,0,0,1-2.4-4.17v-26a5.34,5.34,0,0,1,2.4-4.17l22.53-13a5.32,5.32,0,0,1,4.82,0l22.53,13Zm-7.54,18.27V35.23a1.16,1.16,0,0,0-1.16-1.16H98.89a6.75,6.75,0,0,1-6.76-6.75V20.09A1.16,1.16,0,0,0,91,18.93H88.79a1.16,1.16,0,0,0-1.16,1.16v7.23a6.75,6.75,0,0,1-6.75,6.75H73.65a1.16,1.16,0,0,0-1.16,1.16v2.19a1.15,1.15,0,0,0,1.16,1.15h7.23a6.76,6.76,0,0,1,6.75,6.76v7.23a1.16,1.16,0,0,0,1.16,1.16H91a1.16,1.16,0,0,0,1.16-1.16V45.33a6.76,6.76,0,0,1,6.76-6.76h7.23a1.15,1.15,0,0,0,1.16-1.15Z">
            </path>
        </g>

        <g class="text" fill="currentColor">
            <path class="cls-2" d="M6.42,97.76H0V92.64H18.73v5.12H12.28v19.58H6.42Z"></path>
            <path class="cls-2" d="M28.29,92.64h5.86v24.7H28.29Z"></path>
            <path class="cls-2"
                  d="M45,112.47v-15c0-3.31,1.58-4.87,4.86-4.87H59c3.28,0,4.87,1.56,4.87,4.87v3.28H58V98.36c0-.53-.18-.67-.67-.67H51.5c-.49,0-.67.14-.67.67v13.26c0,.5.18.67.67.67h5.86c.49,0,.67-.17.67-.67v-3.45H53.87v-4.84h10v9.14c0,3.28-1.59,4.87-4.87,4.87H49.84C46.56,117.34,45,115.75,45,112.47Z">
            </path>
            <path class="cls-2" d="M74.54,92.64h5.85v9.49h7.94V92.64h5.86v24.7H88.33V107.28H80.39v10.06H74.54Z">
            </path>
            <path class="cls-2" d="M110.2,97.76h-6.42V92.64h18.73v5.12h-6.45v19.58H110.2Z"></path>
            <path class="cls-2" d="M132.07,92.64h17v5.08H137.93v4.48h8.92v5h-8.92v5.05h11.14v5.08h-17Z"></path>
            <path class="cls-2" d="M159.41,92.64h6l8.71,14.5V92.64h5.68v24.7h-5.43L165.09,102v15.31h-5.68Z"></path>
        </g>
    </symbol>

    <symbol id="icon-tighten-logo--horizontal" viewBox="0 0 260.19 66.18">
        <g class="icon">
            <path class="cls-2"
                  d="M52.7,17.44a4.89,4.89,0,0,1,2.19,3.8v23.7a4.89,4.89,0,0,1-2.19,3.8L32.17,60.59a4.91,4.91,0,0,1-4.39,0L7.26,48.74a4.89,4.89,0,0,1-2.19-3.8V21.24a4.89,4.89,0,0,1,2.19-3.8L27.78,5.59a4.85,4.85,0,0,1,4.39,0L52.7,17.44ZM45.83,34.08v-2A1.06,1.06,0,0,0,44.77,31H38.18A6.15,6.15,0,0,1,32,24.89V18.3A1.07,1.07,0,0,0,31,17.24H29a1.06,1.06,0,0,0-1.05,1.06v6.59A6.15,6.15,0,0,1,21.77,31H15.19a1.06,1.06,0,0,0-1.06,1.06v2a1.06,1.06,0,0,0,1.06,1.06h6.58a6.15,6.15,0,0,1,6.16,6.15v6.59a1,1,0,0,0,1.05,1h2a1.06,1.06,0,0,0,1.06-1V41.29a6.15,6.15,0,0,1,6.15-6.15h6.59a1.06,1.06,0,0,0,1.06-1.06Z">
            </path>
        </g>

        <g class="text" fill="currentColor">
            <path class="cls-5" d="M86.84,25.86H80.42V20.74H99.16v5.12H92.7V45.44H86.84Z"></path>
            <path class="cls-5" d="M108.71,20.74h5.86v24.7h-5.86Z"></path>
            <path class="cls-5"
                  d="M125.4,40.57v-15c0-3.31,1.59-4.87,4.87-4.87h9.13c3.29,0,4.87,1.56,4.87,4.87v3.28h-5.82V26.46c0-.53-.17-.67-.67-.67h-5.85c-.5,0-.67.14-.67.67V39.72c0,.5.17.67.67.67h5.85c.5,0,.67-.17.67-.67V36.27h-4.16V31.43h10v9.14c0,3.28-1.58,4.87-4.87,4.87h-9.13C127,45.44,125.4,43.85,125.4,40.57Z">
            </path>
            <path class="cls-5" d="M155,20.74h5.86v9.49h7.93V20.74h5.86v24.7h-5.86V35.38h-7.93V45.44H155Z"></path>
            <path class="cls-5" d="M190.62,25.86H184.2V20.74h18.74v5.12h-6.46V45.44h-5.86Z"></path>
            <path class="cls-5" d="M212.49,20.74h17v5.08H218.35V30.3h8.93v5h-8.93v5H229.5v5.08h-17Z"></path>
            <path class="cls-5" d="M239.83,20.74h6l8.72,14.5V20.74h5.68v24.7h-5.44l-9.24-15.31V45.44h-5.68Z"></path>
        </g>
    </symbol>

    <symbol id="icon-github" viewBox="0 0 20 20">
        <path fill-rule="evenodd"
              d="M9.99907916,0 C4.47773105,0 0,4.47711716 0,10.0003069 C0,14.4184904 2.86503576,18.1663034 6.83876117,19.4886276 C7.33908346,19.5807115 7.5214095,19.2719236 7.5214095,19.0067221 C7.5214095,18.7697597 7.512815,18.14052 7.50790386,17.3062402 C4.72635747,17.9103103 4.13947635,15.9654992 4.13947635,15.9654992 C3.68458209,14.8101538 3.02894503,14.5025937 3.02894503,14.5025937 C2.12099819,13.8825624 3.09770097,13.8948402 3.09770097,13.8948402 C4.10141502,13.9654379 4.62936247,14.9255655 4.62936247,14.9255655 C5.52134811,16.4535437 6.97013414,16.0121551 7.53982627,15.7561619 C7.63068234,15.1103472 7.88913104,14.6695724 8.17459099,14.4197182 C5.95414224,14.1674085 3.6195095,13.3091869 3.6195095,9.47727063 C3.6195095,8.38576997 4.00933116,7.49255655 4.64900703,6.79394702 C4.54587311,6.54102336 4.20270727,5.52380368 4.74722981,4.14745695 C4.74722981,4.14745695 5.5864207,3.87857209 7.4968538,5.17265723 C8.29430001,4.95042819 9.15006599,4.83992756 10.0003069,4.83563031 C10.849934,4.83992756 11.7050861,4.95042819 12.5037601,5.17265723 C14.4129654,3.87857209 15.2509285,4.14745695 15.2509285,4.14745695 C15.7966788,5.52380368 15.453513,6.54102336 15.350993,6.79394702 C15.9918966,7.49255655 16.3786488,8.38576997 16.3786488,9.47727063 C16.3786488,13.3190092 14.0403327,14.164339 11.8131312,14.4117376 C12.1716443,14.7205255 12.4914822,15.3307345 12.4914822,16.2638509 C12.4914822,17.6002947 12.4792044,18.6789036 12.4792044,19.0067221 C12.4792044,19.2743792 12.6596888,19.5856226 13.1667639,19.4880138 C17.1374198,18.1626201 20,14.4172627 20,10.0003069 C20,4.47711716 15.5222689,0 9.99907916,0">
        </path>
    </symbol>

    <symbol id="icon-instagram" viewBox="0 0 20 20">
        <path fill-rule="evenodd"
              d="M9.99998015,0 C12.7158369,0 13.0563809,0.0115079365 14.1229475,0.0601587302 C15.1873706,0.108730159 15.9142666,0.277698413 16.55038,0.52484127 C17.2079684,0.78031746 17.7656443,1.12214286 18.3215737,1.67789683 C18.877503,2.23365079 19.2194363,2.79115079 19.4749931,3.44853175 C19.722214,4.08444444 19.8912355,4.81111111 19.9398223,5.87519841 C19.9884884,6.94142857 20,7.28186508 20,9.99686508 C20,12.7118651 19.9884884,13.0523016 19.9398223,14.1185317 C19.8912355,15.182619 19.722214,15.9092857 19.4749931,16.5451984 C19.2194363,17.2025794 18.877503,17.7600794 18.3215737,18.3158333 C17.7656443,18.8715873 17.2079684,19.2134127 16.55038,19.4688889 C15.9142666,19.7160317 15.1873706,19.885 14.1229475,19.9335714 C13.0563809,19.9822222 12.7158369,19.9936905 9.99998015,19.9936905 C7.28412336,19.9936905 6.94361912,19.9822222 5.87701279,19.9335714 C4.81258969,19.885 4.0856937,19.7160317 3.44958032,19.4688889 C2.79199192,19.2134127 2.23431598,18.8715873 1.67838663,18.3158333 C1.12245728,17.7600794 0.780524015,17.2025397 0.524967202,16.5451984 C0.277746353,15.9092857 0.108724776,15.182619 0.0601380197,14.1185317 C0.0114718731,13.0523016 0,12.7118651 0,9.99686508 C0,7.28186508 0.0114718731,6.94142857 0.0601380197,5.87519841 C0.108724776,4.81111111 0.277746353,4.08444444 0.524967202,3.44853175 C0.780524015,2.79115079 1.12245728,2.23365079 1.67838663,1.67789683 C2.23431598,1.12214286 2.79199192,0.78031746 3.44958032,0.52484127 C4.0856937,0.277698413 4.81258969,0.108730159 5.87701279,0.0601587302 C6.94361912,0.0115079365 7.28412336,0 9.99998015,0 Z M9.99998015,1.80126984 C7.32985208,1.80126984 7.01360151,1.81142857 5.95910218,1.85952381 C4.98415175,1.90400794 4.45465931,2.06686508 4.10228624,2.20373016 C3.635512,2.38507937 3.30235134,2.60174603 2.95243936,2.95154762 C2.60252738,3.30134921 2.38579234,3.63440476 2.2044256,4.10099206 C2.06747764,4.45329365 1.9045691,4.98261905 1.86007094,5.95730159 C1.81196052,7.01142857 1.80179858,7.32757937 1.80179858,9.99686508 C1.80179858,12.6661508 1.81196052,12.9823016 1.86007094,14.0364683 C1.9045691,15.0111111 2.06747764,15.5404365 2.2044256,15.8927381 C2.38579234,16.3593254 2.60252738,16.692381 2.95243936,17.0421825 C3.30235134,17.3919841 3.635512,17.6086508 4.10228624,17.7899603 C4.45465931,17.9268651 4.98415175,18.0897222 5.95914187,18.1342063 C7.01344273,18.1823016 7.3296933,18.1924603 9.99998015,18.1924603 C12.670267,18.1924603 12.9865176,18.1823016 14.0408184,18.1342063 C15.0158086,18.0897222 15.545301,17.9268651 15.8977138,17.7899603 C16.3644483,17.6086508 16.697609,17.3919841 17.0475209,17.0421825 C17.3974329,16.692381 17.614168,16.3593254 17.7955347,15.8927381 C17.9324827,15.5404365 18.0953912,15.0111111 18.1398894,14.0364286 C18.1879998,12.9823016 18.1981617,12.6661508 18.1981617,9.99686508 C18.1981617,7.32757937 18.1879998,7.01142857 18.1398894,5.9572619 C18.0953912,4.98261905 17.9324827,4.45329365 17.7955347,4.10099206 C17.614168,3.63440476 17.3974329,3.30134921 17.0475209,2.95154762 C16.697609,2.60174603 16.3644483,2.38507937 15.8977138,2.20373016 C15.545301,2.06686508 15.0158086,1.90400794 14.0408184,1.85952381 C12.9863588,1.81142857 12.6701082,1.80126984 9.99998015,1.80126984 Z M9.99998015,4.86333333 C12.8360336,4.86333333 15.1351319,7.16170635 15.1351319,9.99686508 C15.1351319,12.8320238 12.8360336,15.1303968 9.99998015,15.1303968 C7.16392671,15.1303968 4.86482839,12.8320238 4.86482839,9.99686508 C4.86482839,7.16170635 7.16392671,4.86333333 9.99998015,4.86333333 Z M9.99998015,13.3291667 C11.8409181,13.3291667 13.3333333,11.8372222 13.3333333,9.99686508 C13.3333333,8.15650794 11.8409181,6.66456349 9.99998015,6.66456349 C8.15904224,6.66456349 6.66662697,8.15650794 6.66662697,9.99686508 C6.66662697,11.8372222 8.15904224,13.3291667 9.99998015,13.3291667 Z M16.5379951,4.66051587 C16.5379951,5.32305556 16.0007621,5.86015873 15.3380134,5.86015873 C14.6752646,5.86015873 14.1379919,5.32305556 14.1379919,4.66051587 C14.1379919,3.99797619 14.6752646,3.4609127 15.3380134,3.4609127 C16.0007621,3.4609127 16.5379951,3.99797619 16.5379951,4.66051587 Z">
        </path>
    </symbol>

    <symbol id="icon-link" viewBox="0 0 20 14">
        <path fill-rule="evenodd"
              d="M9.26162861,9.99352484 C9.09513566,9.70156222 9,9.36272069 9,9 C9,8.63061182 9.0991653,8.28461281 9.27273653,7.98767018 C10.7974476,7.84936046 12,6.56454322 12,5 C12,3.34651712 10.6567066,2 8.99967027,2 L5.00032973,2 C3.3486445,2 2,3.34314575 2,5 C2,6.65348288 3.34329338,8 5.00032973,8 L5.08272728,8 C5.02831157,8.32520847 5,8.65928779 5,9 C5,9.34060319 5.0285123,9.67469372 5.08328613,10 L4.99502908,10 C2.23635069,10 0,7.75580481 0,5 C0,2.23857625 2.23382212,0 4.99502908,0 L9.00497092,0 C11.7636493,0 14,2.24419519 14,5 C14,7.67533462 11.9032884,9.85991377 9.26162861,9.99352484 Z M10.7383714,4.00647516 C10.9048643,4.29843778 11,4.63727931 11,5 C11,5.36938818 10.9008347,5.71538719 10.7272635,6.01232982 C9.20255238,6.15063954 8,7.43545678 8,9 C8,10.6534829 9.34329338,12 11.0003297,12 L14.9996703,12 C16.6513555,12 18,10.6568542 18,9 C18,7.34651712 16.6567066,6 14.9996703,6 L14.9172727,6 C14.9716884,5.67479153 15,5.34071221 15,5 C15,4.65939681 14.9714877,4.32530628 14.9167139,4 L15.0049709,4 C17.7636493,4 20,6.24419519 20,9 C20,11.7614237 17.7661779,14 15.0049709,14 L10.9950291,14 C8.23635069,14 6,11.7558048 6,9 C6,6.32466538 8.09671158,4.14008623 10.7383714,4.00647516 Z">
        </path>
    </symbol>

    <symbol id="icon-linkedin" viewBox="0 0 20 20">
        <path fill-rule="evenodd"
              d="M0.504468485,6.41311307 L4.40263405,6.41311307 L4.40263405,19.9987194 L0.504468485,19.9987194 L0.504468485,6.41311307 Z M2.35418627,4.71379178 L2.32596425,4.71379178 C0.914863594,4.71379178 0,3.67524651 0,2.36009732 C0,1.01805609 0.94190969,0 2.38123236,0 C3.81937912,0 4.70366886,1.01549494 4.73189087,2.3562556 C4.73189087,3.67140479 3.81937912,4.71379178 2.35418627,4.71379178 L2.35418627,4.71379178 Z M20,20 L15.5797272,20 L15.5797272,12.9683698 C15.5797272,11.1281854 14.8882879,9.8732232 13.3678269,9.8732232 C12.2048448,9.8732232 11.5580903,10.7196824 11.2570555,11.537969 C11.1441675,11.8299398 11.1618062,12.2384428 11.1618062,12.6482264 L11.1618062,20 L6.7826905,20 C6.7826905,20 6.83913452,7.54514022 6.7826905,6.41311307 L11.1618062,6.41311307 L11.1618062,8.54526828 C11.420508,7.61301063 12.8198495,6.28249456 15.0529163,6.28249456 C17.8233772,6.28249456 20,8.23793059 20,12.4446152 L20,20 L20,20 Z">
        </path>
    </symbol>

    <symbol id="icon-twitter" viewBox="0 0 20 17">
        <path fill-rule="evenodd"
              d="M17.6439514,2.67547417 C18.4915185,2.14746831 19.1418677,1.31023678 19.4470858,0.312892365 C18.6535188,0.803008922 17.7766039,1.15745731 16.8409931,1.34934833 C16.0943828,0.51822798 15.0272935,0 13.8463344,0 C11.5806773,0 9.74467336,1.91279903 9.74467336,4.27171413 C9.74467336,4.60660674 9.77871691,4.9329437 9.84915185,5.24461383 C6.44010096,5.0661674 3.4172683,3.36725964 1.3922639,0.781008678 C1.0389153,1.41412682 0.83700182,2.14746831 0.83700182,2.92969922 C0.83700182,4.41104901 1.56130774,5.71884132 2.66244057,6.4864054 C1.98978693,6.46440516 1.35704643,6.27006967 0.802958267,5.95228836 L0.802958267,6.0048445 C0.802958267,8.07531195 2.21635264,9.80233114 4.09579151,10.1934466 C3.75066033,10.2936699 3.38909432,10.3437816 3.01344133,10.3437816 C2.74931032,10.3437816 2.49104889,10.3181146 2.24217879,10.268003 C2.76339731,11.9644663 4.27892235,13.2013689 6.07501321,13.2343693 C4.66983624,14.3808265 2.90074544,15.062834 0.979045607,15.062834 C0.648001409,15.062834 0.320478958,15.0445005 0,15.0041667 C1.81604743,16.2154024 3.97253038,16.9230769 6.28983976,16.9230769 C13.838117,16.9230769 17.9632564,10.413449 17.9632564,4.76794187 C17.9632564,4.58216202 17.9609086,4.39760442 17.9526912,4.21549128 C18.7544756,3.61292903 19.4517814,2.86003178 20,2.00324448 C19.2639549,2.34302603 18.4727358,2.57280636 17.6439514,2.67547417 Z">
        </path>
    </symbol>

    <symbol id="tighten-mark-lg" viewBox="0 0 90 100">
        <path fill="#FFFFFF"
              d="M90 32.82v36.36c0 4.63-2.83 9.56-6.83 11.88L51.86 99.25a14.33 14.33 0 0 1-13.73 0L6.83 81.06C2.82 78.74 0 73.81 0 69.18V32.82c0-4.63 2.83-9.57 6.83-11.89l31.3-18.18a14.31 14.31 0 0 1 13.72 0l31.32 18.18c4 2.32 6.83 7.26 6.83 11.89z">
        </path>
        <path fill="#324344"
              d="M79.66 26.99A7.46 7.46 0 0 1 83 32.82v36.36c0 2.14-1.5 4.76-3.34 5.83L48.34 93.2a7.38 7.38 0 0 1-6.7 0L10.35 75A7.48 7.48 0 0 1 7 69.18V32.82c0-2.14 1.5-4.77 3.34-5.83L41.64 8.8a7.36 7.36 0 0 1 6.7 0L79.66 27zM69.18 52.52v-3.05c0-.9-.73-1.62-1.62-1.62H57.51a9.41 9.41 0 0 1-9.39-9.44v-10.1c0-.9-.71-1.63-1.6-1.63h-3.04c-.9 0-1.6.73-1.6 1.62v10.11c0 5.21-4.2 9.44-9.4 9.44H22.44c-.9 0-1.62.73-1.62 1.62v3.05c0 .9.73 1.62 1.62 1.62h10.04a9.41 9.41 0 0 1 9.4 9.44V73.7c0 .89.7 1.62 1.6 1.62h3.03c.9 0 1.61-.73 1.61-1.62V63.58c0-5.21 4.2-9.44 9.4-9.44h10.04c.9 0 1.62-.72 1.62-1.62z">
        </path>
    </symbol>

    <symbol id="accent-line" viewBox="0 0 80 6">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity="0.601392663">
            <g transform="translate(-720.000000, -864.000000)" fill="#FFFFFF">
                <rect x="720" y="864" width="80" height="6"></rect>
            </g>
        </g>
    </symbol>

    <symbol id="working-accent-line" viewBox="0 0 40 4" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-243.000000, -2270.000000)" fill="#FFAA30">
                <rect x="243" y="2270" width="40" height="4"></rect>
            </g>
        </g>
    </symbol>

    <symbol id="headline-lg" viewBox="0 0 825 107">
        <g fill="none" fill-rule="evenodd">
            <path fill="#9A6A31"
                  d="M39.56 54.3c6.76 4.9 8.92 9.22 8.92 17.43v16.41c0 12.53-6.19 18.72-18.72 18.72H23c-12.53 0-18.58-6.19-18.58-18.57V66.98H19.4V87.7c0 3.89 1.87 5.76 5.9 5.76h2.02c4.03 0 5.9-1.87 5.9-5.76V73.9c0-4.18-1.44-6.05-4.32-8.21L13.35 54.3c-6.91-4.9-8.93-9.64-8.93-17.42V23.06c0-12.53 6.2-18.72 18.72-18.72h6.48C42 4.34 48.2 10.53 48.2 22.9V41.2H33.08V23.49c0-3.89-1.88-5.76-5.76-5.76h-1.88c-3.88 0-5.76 1.87-5.76 5.76v11.23c0 4.18 1.44 6.2 4.32 8.2L39.56 54.3zM86.55 106H71.14V19.17H57.32V5.2h43.05v13.97H86.55V106zm59.95-47.52c6.34 1.73 8.93 5.62 8.93 13.25V106h-15.41V72.02c0-4.47-2.02-6.48-6.48-6.48h-6.91V106h-15.41V5.2h25.34c12.53 0 18.72 6.2 18.72 18.72v19c0 8.94-3.16 13.26-8.78 15.56zm-6.62-33.84c0-3.89-1.88-5.76-5.76-5.76h-7.5v33.26h6.92c4.32 0 6.34-2.01 6.34-6.19V24.64zM169.16 5.2h34.27v13.97h-18.87v28.51h18.15v13.97h-18.15v30.38h19.16V106h-34.56V5.2zm79.96 62.64l-.14-62.64h13.82V106h-16.7l-15.7-67.97.15 67.97h-13.83V5.2h18l14.4 62.64zm58.08-3.6h-8.06V50.99h23.04v37.15c0 12.53-6.2 18.72-18.72 18.72h-8.2c-12.54 0-18.73-6.19-18.73-18.72V23.06c0-12.53 6.2-18.72 18.72-18.72h8.07c12.52 0 18.57 6.19 18.57 18.57v16.27h-15.12v-15.4c0-4.04-1.87-5.9-5.76-5.9h-3.17c-4.03 0-5.9 1.86-5.9 5.9v63.64c0 4.04 1.87 5.9 5.9 5.9h3.46c4.03 0 5.9-1.86 5.9-5.9V64.24zM360.68 106h-15.41V19.17h-13.83V5.2h43.06v13.97h-13.82V106zm40.08-58.32h14.83V5.2h15.4V106h-15.4V61.65h-14.83V106h-15.41V5.2h15.4v42.48zM511.59 106l-5.76-10.51c-3.46 8.06-7.49 11.37-17.71 11.37h-4.32c-11.67 0-17.57-5.9-17.57-17.56V69c0-7.06 1.58-12.54 6.77-17l5.61-4.9-3.31-6.04c-3.02-5.62-3.46-9.08-3.46-14.84v-3.74c0-12.1 6.05-18.14 18-18.14h5.33c11.95 0 18 5.9 18 17.85v14.26h-14.54V23.2c0-3.6-1.73-5.33-5.33-5.33H492c-3.6 0-5.47 1.73-5.47 5.33v3.46c0 3.45.43 6.04 2.45 9.79l15.26 28.37L510 46.24h14.7l-11.24 33.7L527.72 106h-16.13zm-22.47-12.38c3.32 0 4.61-1.73 6.05-5.76l2.16-6.05-11.8-21.89-.58.43c-3.03 2.6-4.03 4.75-4.03 9.07V88.3c0 3.6 1.72 5.33 5.18 5.33h3.02zm69.5-88.42h33.56v13.97h-18.14v29.09h17.42v13.96h-17.42V106h-15.41V5.2zm91.35 82.94c0 12.53-6.19 18.72-18.72 18.72h-8.2c-12.53 0-18.73-6.19-18.73-18.72V23.06c0-12.53 6.2-18.72 18.72-18.72h8.21c12.53 0 18.72 6.19 18.72 18.72v65.08zm-15.4-64.36c0-4.04-1.88-5.9-5.77-5.9h-3.16c-4.04 0-5.9 1.86-5.9 5.9v63.64c0 4.04 1.86 5.9 5.9 5.9h3.16c3.9 0 5.76-1.86 5.76-5.9V23.78zm58.8 40.9h15.11v23.46c0 12.53-6.19 18.72-18.72 18.72h-7.63c-12.53 0-18.72-6.19-18.72-18.72V23.06c0-12.53 6.2-18.72 18.72-18.72h7.49c12.53 0 18.58 6.04 18.58 18.57v20.6h-15.12V23.77c0-4.04-1.88-5.9-5.76-5.9h-2.6c-4.03 0-5.9 1.86-5.9 5.9v63.64c0 4.04 1.87 5.9 5.9 5.9h2.88c3.9 0 5.76-1.86 5.76-5.9V64.67zM766.7 5.2v82.94c0 12.53-6.2 18.72-18.72 18.72h-7.49c-12.53 0-18.72-6.19-18.72-18.72V5.2h15.4v82.22c0 4.04 1.88 5.9 5.91 5.9h2.45c3.89 0 5.76-1.86 5.76-5.9V5.2h15.4zm48.57 49.1c6.77 4.9 8.93 9.22 8.93 17.43v16.41c0 12.53-6.19 18.72-18.72 18.72h-6.77c-12.52 0-18.57-6.19-18.57-18.57V66.98h14.97V87.7c0 3.89 1.88 5.76 5.9 5.76h2.02c4.04 0 5.9-1.87 5.9-5.76V73.9c0-4.18-1.43-6.05-4.31-8.21L789.08 54.3c-6.92-4.9-8.93-9.64-8.93-17.42V23.06c0-12.53 6.19-18.72 18.72-18.72h6.48c12.38 0 18.57 6.19 18.57 18.57V41.2H808.8V23.49c0-3.89-1.87-5.76-5.76-5.76h-1.87c-3.89 0-5.76 1.87-5.76 5.76v11.23c0 4.18 1.44 6.2 4.32 8.2l15.55 11.38z">
            </path>
            <path fill="#FFFFFF"
                  d="M35.56 50.3c6.76 4.9 8.92 9.22 8.92 17.43v16.41c0 12.53-6.19 18.72-18.72 18.72H19C6.47 102.86.42 96.67.42 84.3V62.98H15.4V83.7c0 3.89 1.87 5.76 5.9 5.76h2.02c4.03 0 5.9-1.87 5.9-5.76V69.9c0-4.18-1.44-6.05-4.32-8.21L9.35 50.3C2.44 45.4.42 40.66.42 32.88V19.06C.42 6.53 6.62.34 19.14.34h6.48C38 .34 44.2 6.53 44.2 18.9V37.2H29.08V19.49c0-3.89-1.88-5.76-5.76-5.76h-1.88c-3.88 0-5.76 1.87-5.76 5.76v11.23c0 4.18 1.44 6.2 4.32 8.2L35.56 50.3zM82.55 102H67.14V15.17H53.32V1.2h43.05v13.97H82.55V102zm59.95-47.52c6.34 1.73 8.93 5.62 8.93 13.25V102h-15.41V68.02c0-4.47-2.02-6.48-6.48-6.48h-6.91V102h-15.41V1.2h25.34c12.53 0 18.72 6.2 18.72 18.72v19c0 8.94-3.16 13.26-8.78 15.56zm-6.62-33.84c0-3.89-1.88-5.76-5.76-5.76h-7.5v33.26h6.92c4.32 0 6.34-2.01 6.34-6.19V20.64zM165.16 1.2h34.27v13.97h-18.87v28.51h18.15v13.97h-18.15v30.38h19.16V102h-34.56V1.2zm79.96 62.64l-.14-62.64h13.82V102h-16.7l-15.7-67.97.15 67.97h-13.83V1.2h18l14.4 62.64zm58.08-3.6h-8.06V46.99h23.04v37.15c0 12.53-6.2 18.72-18.72 18.72h-8.2c-12.54 0-18.73-6.19-18.73-18.72V19.06c0-12.53 6.2-18.72 18.72-18.72h8.07c12.52 0 18.57 6.19 18.57 18.57v16.27h-15.12v-15.4c0-4.04-1.87-5.9-5.76-5.9h-3.17c-4.03 0-5.9 1.86-5.9 5.9v63.64c0 4.04 1.87 5.9 5.9 5.9h3.46c4.03 0 5.9-1.86 5.9-5.9V60.24zM356.68 102h-15.41V15.17h-13.83V1.2h43.06v13.97h-13.82V102zm40.08-58.32h14.83V1.2h15.4V102h-15.4V57.65h-14.83V102h-15.41V1.2h15.4v42.48zM507.59 102l-5.76-10.51c-3.46 8.06-7.49 11.37-17.71 11.37h-4.32c-11.67 0-17.57-5.9-17.57-17.56V65c0-7.06 1.58-12.54 6.77-17l5.61-4.9-3.31-6.04c-3.02-5.62-3.46-9.08-3.46-14.84v-3.74c0-12.1 6.05-18.14 18-18.14h5.33c11.95 0 18 5.9 18 17.85v14.26h-14.54V19.2c0-3.6-1.73-5.33-5.33-5.33H488c-3.6 0-5.47 1.73-5.47 5.33v3.46c0 3.45.43 6.04 2.45 9.79l15.26 28.37L506 42.24h14.7l-11.24 33.7L523.72 102h-16.13zm-22.47-12.38c3.32 0 4.61-1.73 6.05-5.76l2.16-6.05-11.8-21.89-.58.43c-3.03 2.6-4.03 4.75-4.03 9.07V84.3c0 3.6 1.72 5.33 5.18 5.33h3.02zm69.5-88.42h33.56v13.97h-18.14v29.09h17.42v13.96h-17.42V102h-15.41V1.2zm91.35 82.94c0 12.53-6.19 18.72-18.72 18.72h-8.2c-12.53 0-18.73-6.19-18.73-18.72V19.06c0-12.53 6.2-18.72 18.72-18.72h8.21c12.53 0 18.72 6.19 18.72 18.72v65.08zm-15.4-64.36c0-4.04-1.88-5.9-5.77-5.9h-3.16c-4.04 0-5.9 1.86-5.9 5.9v63.64c0 4.04 1.86 5.9 5.9 5.9h3.16c3.9 0 5.76-1.86 5.76-5.9V19.78zm58.8 40.9h15.11v23.46c0 12.53-6.19 18.72-18.72 18.72h-7.63c-12.53 0-18.72-6.19-18.72-18.72V19.06c0-12.53 6.2-18.72 18.72-18.72h7.49c12.53 0 18.58 6.04 18.58 18.57v20.6h-15.12V19.77c0-4.04-1.88-5.9-5.76-5.9h-2.6c-4.03 0-5.9 1.86-5.9 5.9v63.64c0 4.04 1.87 5.9 5.9 5.9h2.88c3.9 0 5.76-1.86 5.76-5.9V60.67zM762.7 1.2v82.94c0 12.53-6.2 18.72-18.72 18.72h-7.49c-12.53 0-18.72-6.19-18.72-18.72V1.2h15.4v82.22c0 4.04 1.88 5.9 5.91 5.9h2.45c3.89 0 5.76-1.86 5.76-5.9V1.2h15.4zm48.57 49.1c6.77 4.9 8.93 9.22 8.93 17.43v16.41c0 12.53-6.19 18.72-18.72 18.72h-6.77c-12.52 0-18.57-6.19-18.57-18.57V62.98h14.97V83.7c0 3.89 1.88 5.76 5.9 5.76h2.02c4.04 0 5.9-1.87 5.9-5.76V69.9c0-4.18-1.43-6.05-4.31-8.21L785.08 50.3c-6.92-4.9-8.93-9.64-8.93-17.42V19.06c0-12.53 6.19-18.72 18.72-18.72h6.48c12.38 0 18.57 6.19 18.57 18.57V37.2H804.8V19.49c0-3.89-1.87-5.76-5.76-5.76h-1.87c-3.89 0-5.76 1.87-5.76 5.76v11.23c0 4.18 1.44 6.2 4.32 8.2l15.55 11.38z">
            </path>
        </g>
    </symbol>

    <symbol id="headline-sm" viewBox="0 0 217 115">
        <g fill="none" fill-rule="evenodd">
            <path fill="#9A6A31"
                  d="M20.62 28.15c3.38 2.45 4.46 4.61 4.46 8.71v8.21c0 6.27-3.1 9.36-9.36 9.36h-3.38c-6.27 0-9.3-3.1-9.3-9.29V34.5h7.5v10.37c0 1.94.93 2.88 2.95 2.88h1c2.02 0 2.96-.94 2.96-2.88v-6.92c0-2.08-.72-3.02-2.16-4.1L7.5 28.15c-3.45-2.45-4.46-4.82-4.46-8.71v-6.91c0-6.27 3.1-9.36 9.36-9.36h3.24c6.19 0 9.29 3.1 9.29 9.29v9.14h-7.56v-8.86c0-1.94-.94-2.88-2.88-2.88h-.94c-1.94 0-2.88.94-2.88 2.88v5.62c0 2.09.72 3.1 2.16 4.1l7.78 5.7zM44.12 54H36.4V10.58H29.5V3.6h21.52v6.98h-6.9V54zm29.97-23.76c3.17.86 4.46 2.8 4.46 6.62V54h-7.7V37c0-2.22-1.01-3.23-3.24-3.23h-3.46V54h-7.7V3.6h12.67c6.26 0 9.36 3.1 9.36 9.36v9.5c0 4.47-1.58 6.63-4.4 7.78zm-3.31-16.92c0-1.94-.94-2.88-2.88-2.88h-3.75v16.63h3.46c2.16 0 3.17-1 3.17-3.1V13.33zM85.42 3.6h17.13v6.98h-9.43v14.26h9.07v6.98h-9.07v15.2h9.58V54H85.42V3.6zm39.98 31.32l-.07-31.32h6.91V54h-8.35l-7.85-33.98.07 33.98h-6.91V3.6h9l7.2 31.32zm29.04-1.8h-4.03V26.5h11.52v18.57c0 6.27-3.1 9.36-9.36 9.36h-4.1c-6.27 0-9.37-3.1-9.37-9.36V12.53c0-6.27 3.1-9.36 9.36-9.36h4.04c6.26 0 9.28 3.1 9.28 9.29v8.13h-7.56v-7.7c0-2.02-.93-2.95-2.88-2.95h-1.58c-2.02 0-2.95.93-2.95 2.95V44.7c0 2.02.93 2.95 2.95 2.95h1.73c2.01 0 2.95-.93 2.95-2.95V33.12zM181.18 54h-7.7V10.58h-6.92V3.6h21.53v6.98h-6.91V54zm20.04-29.16h7.41V3.6h7.7V54h-7.7V31.82h-7.41V54h-7.7V3.6h7.7v21.24zM42.73 114l-2.88-5.26c-1.73 4.04-3.74 5.7-8.85 5.7h-2.16c-5.84 0-8.79-2.96-8.79-8.8V95.5c0-3.53.8-6.27 3.39-8.5l2.8-2.45-1.65-3.02c-1.51-2.81-1.73-4.54-1.73-7.42v-1.87c0-6.05 3.02-9.07 9-9.07h2.66c5.98 0 9 2.95 9 8.93v7.12h-7.27V72.6c0-1.8-.86-2.66-2.66-2.66h-.65c-1.8 0-2.74.86-2.74 2.66v1.73c0 1.73.22 3.02 1.23 4.9l7.63 14.18 2.88-9.29h7.34l-5.61 16.85L50.8 114h-8.07zm-11.23-6.2c1.66 0 2.3-.86 3.02-2.87l1.08-3.03-5.9-10.94-.29.22c-1.51 1.3-2.01 2.37-2.01 4.53v9.43c0 1.8.86 2.67 2.59 2.67h1.51zm34.75-44.2h16.78v6.98h-9.07v14.55h8.7v6.98h-8.7V114h-7.7V63.6zm45.67 41.47c0 6.27-3.1 9.36-9.36 9.36h-4.1c-6.26 0-9.36-3.1-9.36-9.36V72.53c0-6.27 3.1-9.36 9.36-9.36h4.1c6.27 0 9.36 3.1 9.36 9.36v32.54zm-7.7-32.18c0-2.02-.94-2.95-2.88-2.95h-1.58c-2.02 0-2.96.93-2.96 2.95v31.82c0 2.02.94 2.95 2.96 2.95h1.58c1.94 0 2.88-.93 2.88-2.95V72.9zm29.4 20.45h7.56v11.73c0 6.27-3.1 9.36-9.36 9.36H128c-6.26 0-9.36-3.1-9.36-9.36V72.53c0-6.27 3.1-9.36 9.36-9.36h3.75c6.26 0 9.29 3.02 9.29 9.29v10.3h-7.56v-9.87c0-2.02-.94-2.95-2.88-2.95h-1.3c-2.02 0-2.95.93-2.95 2.95v31.82c0 2.02.93 2.95 2.95 2.95h1.44c1.94 0 2.88-.93 2.88-2.95V93.34zm36.67-29.74v41.47c0 6.27-3.1 9.36-9.36 9.36h-3.74c-6.27 0-9.36-3.1-9.36-9.36V63.6h7.7v41.11c0 2.02.94 2.95 2.95 2.95h1.23c1.94 0 2.88-.93 2.88-2.95V63.6h7.7zm24.29 24.55c3.38 2.45 4.46 4.61 4.46 8.71v8.21c0 6.27-3.1 9.36-9.36 9.36h-3.38c-6.26 0-9.29-3.1-9.29-9.29V94.5h7.49v10.37c0 1.94.94 2.88 2.95 2.88h1.01c2.02 0 2.95-.94 2.95-2.88v-6.92c0-2.08-.72-3.02-2.16-4.1l-7.77-5.69c-3.46-2.45-4.47-4.82-4.47-8.71v-6.91c0-6.27 3.1-9.36 9.36-9.36h3.24c6.2 0 9.29 3.1 9.29 9.29v9.14h-7.56v-8.86c0-1.94-.94-2.88-2.88-2.88h-.94c-1.94 0-2.88.94-2.88 2.88v5.62c0 2.09.72 3.1 2.16 4.1l7.78 5.7z">
            </path>
            <path fill="#FFFFFF"
                  d="M17.62 25.15c3.38 2.45 4.46 4.61 4.46 8.71v8.21c0 6.27-3.1 9.36-9.36 9.36H9.34c-6.27 0-9.3-3.1-9.3-9.29V31.5h7.5v10.37c0 1.94.93 2.88 2.95 2.88h1c2.02 0 2.96-.94 2.96-2.88v-6.92c0-2.08-.72-3.02-2.16-4.1L4.5 25.15C1.06 22.7.05 20.33.05 16.44V9.53C.05 3.26 3.15.17 9.4.17h3.24c6.19 0 9.29 3.1 9.29 9.29v9.14h-7.56V9.74c0-1.94-.94-2.88-2.88-2.88h-.94c-1.94 0-2.88.94-2.88 2.88v5.62c0 2.09.72 3.1 2.16 4.1l7.78 5.7zM41.12 51H33.4V7.58H26.5V.6h21.52v6.98h-6.9V51zm29.97-23.76c3.17.86 4.46 2.8 4.46 6.62V51h-7.7V34c0-2.22-1.01-3.23-3.24-3.23h-3.46V51h-7.7V.6h12.67c6.26 0 9.36 3.1 9.36 9.36v9.5c0 4.47-1.58 6.63-4.4 7.78zm-3.31-16.92c0-1.94-.94-2.88-2.88-2.88h-3.75v16.63h3.46c2.16 0 3.17-1 3.17-3.1V10.33zM82.42.6h17.13v6.98h-9.43v14.26h9.07v6.98h-9.07v15.2h9.58V51H82.42V.6zm39.98 31.32L122.33.6h6.91V51h-8.35l-7.85-33.98.07 33.98h-6.91V.6h9l7.2 31.32zm29.04-1.8h-4.03V23.5h11.52v18.57c0 6.27-3.1 9.36-9.36 9.36h-4.1c-6.27 0-9.37-3.1-9.37-9.36V9.53c0-6.27 3.1-9.36 9.36-9.36h4.04c6.26 0 9.28 3.1 9.28 9.29v8.13h-7.56V9.9c0-2.02-.93-2.95-2.88-2.95h-1.58c-2.02 0-2.95.93-2.95 2.95V41.7c0 2.02.93 2.95 2.95 2.95h1.73c2.01 0 2.95-.93 2.95-2.95V30.12zM178.18 51h-7.7V7.58h-6.92V.6h21.53v6.98h-6.91V51zm20.04-29.16h7.41V.6h7.7V51h-7.7V28.82h-7.41V51h-7.7V.6h7.7v21.24zM39.73 111l-2.88-5.26c-1.73 4.04-3.74 5.7-8.85 5.7h-2.16c-5.84 0-8.79-2.96-8.79-8.8V92.5c0-3.53.8-6.27 3.39-8.5l2.8-2.45-1.65-3.02c-1.51-2.81-1.73-4.54-1.73-7.42v-1.87c0-6.05 3.02-9.07 9-9.07h2.66c5.98 0 9 2.95 9 8.93v7.12h-7.27V69.6c0-1.8-.86-2.66-2.66-2.66h-.65c-1.8 0-2.74.86-2.74 2.66v1.73c0 1.73.22 3.02 1.23 4.9l7.63 14.18 2.88-9.29h7.34l-5.61 16.85L47.8 111h-8.07zm-11.23-6.2c1.66 0 2.3-.86 3.02-2.87l1.08-3.03-5.9-10.94-.29.22c-1.51 1.3-2.01 2.37-2.01 4.53v9.43c0 1.8.86 2.67 2.59 2.67h1.51zm34.75-44.2h16.78v6.98h-9.07v14.55h8.7v6.98h-8.7V111h-7.7V60.6zm45.67 41.47c0 6.27-3.1 9.36-9.36 9.36h-4.1c-6.26 0-9.36-3.1-9.36-9.36V69.53c0-6.27 3.1-9.36 9.36-9.36h4.1c6.27 0 9.36 3.1 9.36 9.36v32.54zm-7.7-32.18c0-2.02-.94-2.95-2.88-2.95h-1.58c-2.02 0-2.96.93-2.96 2.95v31.82c0 2.02.94 2.95 2.96 2.95h1.58c1.94 0 2.88-.93 2.88-2.95V69.9zm29.4 20.45h7.56v11.73c0 6.27-3.1 9.36-9.36 9.36H125c-6.26 0-9.36-3.1-9.36-9.36V69.53c0-6.27 3.1-9.36 9.36-9.36h3.75c6.26 0 9.29 3.02 9.29 9.29v10.3h-7.56v-9.87c0-2.02-.94-2.95-2.88-2.95h-1.3c-2.02 0-2.95.93-2.95 2.95v31.82c0 2.02.93 2.95 2.95 2.95h1.44c1.94 0 2.88-.93 2.88-2.95V90.34zm36.67-29.74v41.47c0 6.27-3.1 9.36-9.36 9.36h-3.74c-6.27 0-9.36-3.1-9.36-9.36V60.6h7.7v41.11c0 2.02.94 2.95 2.95 2.95h1.23c1.94 0 2.88-.93 2.88-2.95V60.6h7.7zm24.29 24.55c3.38 2.45 4.46 4.61 4.46 8.71v8.21c0 6.27-3.1 9.36-9.36 9.36h-3.38c-6.26 0-9.29-3.1-9.29-9.29V91.5h7.49v10.37c0 1.94.94 2.88 2.95 2.88h1.01c2.02 0 2.95-.94 2.95-2.88v-6.92c0-2.08-.72-3.02-2.16-4.1l-7.77-5.69c-3.46-2.45-4.47-4.82-4.47-8.71v-6.91c0-6.27 3.1-9.36 9.36-9.36h3.24c6.2 0 9.29 3.1 9.29 9.29v9.14h-7.56v-8.86c0-1.94-.94-2.88-2.88-2.88h-.94c-1.94 0-2.88.94-2.88 2.88v5.62c0 2.09.72 3.1 2.16 4.1l7.78 5.7z">
            </path>
        </g>
    </symbol>
</svg>

<div id="app" class="min-h-screen">
    <div class="mx-auto shadow-md max-w-7xl">
        <header class="primary-header" role="banner">
            <div class="flex items-center justify-between px-4 py-3 sm:px-8 sm:py-5 md:py-7 sm:items-end">
                <div class="justify-around flex-1 hidden text-center sm:flex primary-nav__group sm:order-first">
                    <a class="primary-nav__item" href="/our-work" title-="Our Work">Our Work</a>

                    <a class="primary-nav__item" href="/our-company" title="Our Company">Our Company</a>
                </div>

                <div class="flex-none order-first mr-3 sm:mx-6 xl:mx-8 sm:order-second">
                    <a class="primary-nav__logo" href="/" title="Tighten">
                        <svg class="hidden sm:block">
                            <use xlink:href="#icon-tighten-logo--vertical"></use>
                        </svg>
                        <svg class="block sm:hidden">
                            <use xlink:href="#icon-tighten-logo--horizontal"></use>
                        </svg>
                    </a>
                </div>

                <div class="justify-around flex-1 hidden text-center sm:flex primary-nav__group sm:order-third">
                    <a class="primary-nav__item" href="/work-with-us" title="Work with us">Work With Us</a>

                    <a class="primary-nav__item" href="/blog" title="Tighten Blog">Blog</a>

                    <a class="primary-nav__item" x-data="{}" @click="$dispatch('open-contact-modal')" href="#"
                       title="Contact Tighten">Contact</a>
                </div>

                <div class="block text-right sm:hidden order-second">
                    <button type="button" :class="{ 'is-active' : mobile_nav_open }"
                            class="hamburger hamburger--squeeze" x-data="{ mobile_nav_open: false }"
                            @click="$dispatch('toggle-mobile-nav')"
                            x-on:mobile-nav-toggled.window="mobile_nav_open = !mobile_nav_open"
                            x-on:mobile-nav-closed.window="mobile_nav_open = false"
                            x-on:mobile-nav-opened.window="mobile_nav_open = true" aria-label="Navigation">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </header>

        <div class="content">
            <div class="content home-page">
                <div class="flex flex-col items-center pt-16 pb-16 bg-yellow-600 bg-center background-hero">
                    <h1 class="pt-8 mt-8 text-2xl text-center uppercase lg:text-4xl font-knockout-30">
                        Software for
                    </h1>

                    <svg class="headline headline--lg">
                        <use xlink:href="#headline-lg"></use>
                    </svg>
                    <svg class="headline">
                        <use xlink:href="#headline-sm"></use>
                    </svg>

                    <div
                            class="px-2 pb-6 font-sans text-xl leading-normal text-center sm:text-3xl text-grey-darkeset my-9">
                        We help companies turn great ideas <br />
                        into amazing apps, products, and services.
                    </div>

                    <div class="mb-9">
                        <button class="btn btn-dark" x-data="{}" @click="$dispatch('open-contact-modal')">How can we
                            help you?</button>
                    </div>
                </div>
                <div class="post-critical">
                    <div class="flex flex-col pt-8 mt-2 bg-green-400 bg-center area-of-expertise">
                        <svg class="area-of-expertise__tighten-mark">
                            <use xlink:href="#tighten-mark-lg"></use>
                        </svg>
                    </div>

                    <div class="py-10 text-center bg-green-400">
                        <h2 class="text-4xl uppercase font-knockout-30">
                            Tools of the Trade
                        </h2>

                        <p class="px-2 my-3 text-xl">
                            We've got plenty of tools in our shed. <br />
                            These are the sharpest:
                        </p>
                    </div>

                    <div class="tile__container">
                        <a href="/laravel" class="tile a-reset" title="Laravel">
                            <div class="tile__image tile__image-laravel">
                                <div class="relative z-10 w-4/5 m-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240 240">
                                        <g transform="translate(17 17)">
                                            <g transform="translate(32 64)">
                                                <path fill="#FFFFFF"
                                                      d="M132.22 43.44c-.9.2-15.64 3.85-15.64 3.85l-12.05-16.53c-.34-.47-.62-.95.22-1.06.84-.12 14.54-2.59 15.16-2.73.62-.14 1.16-.3 1.92.73.75 1.04 11.18 14.22 11.57 14.72.4.51-.28.82-1.18 1.02m-2.57 28.47c.37.57.73.94-.42 1.36-1.16.42-39.03 13.19-39.77 13.5-.73.32-1.31.42-2.26-.94-.94-1.37-13.26-22.67-13.26-22.67l40.14-10.43c1.18-.37 1.45-.24 1.95.47.67.97 13.25 18.13 13.62 18.7M64.63 59.74c-.49.12-23.55 5.62-24.78 5.9-1.23.28-1.23.14-1.37-.28-.14-.42-27.42-56.6-27.8-57.3-.37-.7-.35-1.26 0-1.26.36 0 21.78-1.91 22.54-1.95.76-.04.68.12.96.6l30.73 53c.53.9.78 1.04-.28 1.3m74.85-15.3c-.9-1-13.35-16.57-15.55-19.21-2.19-2.64-3.26-2.17-4.6-1.97-1.36.2-17.11 2.84-18.94 3.15-1.83.3-2.98 1.04-1.86 2.61l13.64 19.3L71 58.17 38.26 3.49c-1.3-1.93-1.58-2.6-4.54-2.47-2.97.13-25.69 2.02-27.3 2.15-1.62.14-3.4.86-1.78 4.67 1.62 3.82 27.42 59.36 28.14 60.97.72 1.62 2.59 4.24 6.96 3.19 4.49-1.08 20.04-5.13 28.54-7.36 4.5 8.13 13.65 24.6 15.35 26.97 2.26 3.15 3.81 2.63 7.29 1.58 2.7-.82 42.4-15.08 44.2-15.82 1.79-.74 2.89-1.26 1.68-3.05-.89-1.31-11.36-15.33-16.85-22.66 3.76-1 17.12-4.55 18.54-4.94 1.66-.45 1.89-1.26.99-2.27">
                                                </path>
                                                <path fill="#FFAA30" class="color-key"
                                                      d="M128.22 47.44c-.9.2-15.64 3.85-15.64 3.85l-12.05-16.53c-.34-.47-.62-.95.22-1.06.84-.12 14.54-2.59 15.16-2.73.62-.14 1.16-.3 1.92.73.75 1.04 11.18 14.22 11.57 14.72.4.51-.28.82-1.18 1.02m-2.57 28.47c.37.57.73.94-.42 1.36-1.16.42-39.03 13.19-39.77 13.5-.73.32-1.31.42-2.26-.94-.94-1.37-13.26-22.67-13.26-22.67l40.14-10.43c1.18-.37 1.45-.24 1.95.47.67.97 13.25 18.13 13.62 18.7M60.63 63.74c-.49.12-23.55 5.62-24.78 5.9-1.23.28-1.23.14-1.37-.28-.14-.42-27.42-56.6-27.8-57.3-.37-.7-.35-1.26 0-1.26.36 0 21.78-1.91 22.54-1.95.76-.04.68.12.96.6l30.73 53c.53.9.78 1.04-.28 1.3m74.85-15.3c-.9-1-13.35-16.57-15.55-19.21-2.19-2.64-3.26-2.17-4.6-1.97-1.36.2-17.11 2.84-18.94 3.15-1.83.3-2.98 1.04-1.86 2.61l13.64 19.3L67 62.17 34.26 7.49c-1.3-1.93-1.58-2.6-4.54-2.47-2.97.13-25.69 2.02-27.3 2.15-1.62.14-3.4.86-1.78 4.67 1.62 3.82 27.42 59.36 28.14 60.97.72 1.62 2.59 4.24 6.96 3.19 4.49-1.08 20.04-5.13 28.54-7.36 4.5 8.13 13.65 24.6 15.35 26.97 2.26 3.15 3.81 2.63 7.29 1.58 2.7-.82 42.4-15.08 44.2-15.82 1.79-.74 2.89-1.26 1.68-3.05-.89-1.31-11.36-15.33-16.85-22.66 3.76-1 17.12-4.55 18.54-4.94 1.66-.45 1.89-1.26.99-2.27">
                                                </path>
                                                <path fill="#575451" fill-rule="nonzero"
                                                      d="M108.69 45.1a49667.87 49667.87 0 0 0-10.97-15.5c-.79-1.1-.87-2.2-.11-3.04.54-.6 1.42-.95 2.61-1.15a3459.5 3459.5 0 0 1 19.75-3.27c1.7-.23 3 .36 4.73 2.44.87 1.04 2.7 3.31 7.64 9.45 5.53 6.87 7.5 9.31 7.88 9.74l-.75.66.75-.66c1.46 1.64.81 3.28-1.47 3.9a11312 11312 0 0 1-17.12 4.56 2019.38 2019.38 0 0 1 16 21.5c.79 1.18.92 2.23.24 3.1-.45.58-1 .88-2.38 1.44-2.08.86-41.8 15.1-44.29 15.84-3.66 1.11-4.76 1.22-6.41.1a8.13 8.13 0 0 1-1.98-2.05c-1.39-1.94-7.32-12.43-15.03-26.37-13.52 3.53-24.18 6.29-27.8 7.16-4.13.99-6.78-.75-8.12-3.75-.23-.54-13.44-29.03-14.1-30.44A3083.85 3083.85 0 0 1 3.73 8.23c-.87-2.04-.96-3.57-.24-4.66.6-.9 1.57-1.29 2.85-1.4A5137.64 5137.64 0 0 1 19.48 1.1C27.21.47 32.35.08 33.68.02 36-.08 37.1.28 38.1 1.54c.15.18.3.38.48.65l.53.78L71.48 57l39.02-9.33-1.81-2.57zm30.04 0c-.42-.47-2.3-2.8-7.95-9.81a1198 1198 0 0 0-7.62-9.43c-1.3-1.58-1.95-1.87-2.92-1.74l-.43.07c-1.4.2-14.44 2.38-19.26 3.2-.78.13-1.3.33-1.45.51 0 .1.07.28.24.53a5212.72 5212.72 0 0 1 13.64 19.3l.86 1.2-43.32 10.36-.38-.63L37.43 4.04l-.49-.72c-.16-.23-.28-.4-.39-.53-.55-.7-1.03-.86-2.79-.78-1.28.06-6.44.46-14.12 1.08A5758.83 5758.83 0 0 0 6.5 4.17c-.73.06-1.17.23-1.35.5-.27.42-.22 1.3.41 2.78.68 1.6 5.6 12.3 13.97 30.36L33.7 68.38c.98 2.2 2.74 3.36 5.82 2.62 3.67-.88 14.66-3.72 28.52-7.34l.75-.2.38.68C76.93 78.2 83.1 89.13 84.44 90.99a6.27 6.27 0 0 0 1.47 1.57c.94.64 1.65.57 4.71-.36 2.43-.73 42.08-14.95 44.11-15.78 1-.41 1.41-.63 1.56-.82.06-.07.04-.21-.32-.74-.71-1.05-7.6-10.3-16.82-22.62l-.89-1.18 1.43-.38c9.25-2.46 17.42-4.63 18.54-4.94.93-.25.9-.19.5-.64l.74-.67-.74.67zm-33.11-14.55C113.2 40.95 117 46.13 117 46.13a10898.59 10898.59 0 0 1 15-3.69l.42 1.96c-.37.08-3.26.79-7.82 1.91a9733.25 9733.25 0 0 0-7.12 1.76l-.67.17-.65.16-.4-.54-12.06-16.53c-.35-.49-.5-.77-.52-1.21-.03-.84.58-1.31 1.43-1.43a1184.82 1184.82 0 0 0 15.68-2.82c.89-.1 1.64.28 2.33 1.23.31.43 2.4 3.08 5.75 7.34l5.8 7.36c.56.7.38 1.56-.3 2.05-.36.25-.83.41-1.45.55l-.43-1.96.13-.02-5.35-6.78c-3.38-4.28-5.43-6.9-5.77-7.36-.29-.4-.36-.44-.5-.42-.07 0-.13.02-.38.08-.63.14-11.5 2.1-14.51 2.61zm23.4 42.2c0 .02.05.1-.22-.33l1.69-1.08.22.35c.11.18.19.35.24.54.18.63-.08 1.22-.65 1.6-.2.13-.44.25-.74.36l-6.55 2.22-13.34 4.52a2594.65 2594.65 0 0 0-19.81 6.73c-1.37.59-2.39.29-3.48-1.3-.43-.6-2.82-4.66-6.65-11.24l-.06-.11a4840.88 4840.88 0 0 1-6.04-10.39l-.41-.72-.15-.26-.66-1.13 1.27-.34 40.1-10.41c1.51-.48 2.28-.28 3.06.85.26.38 1.13 1.56 6.79 9.3 4.75 6.5 6.68 9.16 6.86 9.43l-1.32.84c-.1.09-.21.35-.15.58zm-7-9.64l-6.82-9.35c-.25-.37-.1-.33-.87-.08l-38.87 10.1A5562.47 5562.47 0 0 0 81.39 74l.07.11a511.94 511.94 0 0 0 6.56 11.12c.56.8.56.8 1.05.6.36-.16 6.55-2.26 19.92-6.78l13.38-4.53c3.72-1.26 5.83-1.97 6.38-2.17-.35-.5-2.5-3.47-6.73-9.24zm-57.16-2.42a69010.81 69010.81 0 0 1-24.79 5.9c-1.46.33-2.14.21-2.5-.81-.14-.44-27.35-56.49-27.76-57.26-.68-1.26-.67-2.73.88-2.73l11.18-.98c8.58-.75 10.97-.96 11.3-.97.83-.05 1.33.13 1.69.75l.18.34 1.32 2.28 3.48 6a2071015.72 2071015.72 0 0 1 25.94 44.7l.3.5c.13.23.2.4.25.6.19.82-.3 1.32-1.04 1.56l-.43.12-.23-.98.23.98zM48.68 32.43L38.11 14.21l-3.48-6-1.32-2.28c-.41-.08-3.08.16-11.25.88l-10.42.9c1.56 3.13 25.59 52.63 27.65 57l.34-.07A5035.56 5035.56 0 0 0 64 58.84L48.68 32.43z">
                                                </path>
                                            </g>
                                            <g transform="translate(87)">
                                                <g transform="translate(7)">
                                                    <rect width="38" height="28" x="3" y="3" fill="#FFFFFF"></rect>
                                                    <path stroke="#575451"
                                                          d="M43.5 3.5v-1h-21v-2h-1v2H.5v1h2v27h-2v1h21v4.3l-6.57 6.56.7.71 5.87-5.86v4.29h1v-4.3l5.86 5.87.71-.7-6.57-6.58V31.5h21v-1h-2v-27h2zm-40 27v-27h37v27h-37zm30-13h-7v-7H26a7.5 7.5 0 1 0 7.5 7.5v-.5zm-8 1h7l-.09.58a6.5 6.5 0 1 1-7.5-7.49l.59-.1v7.01z">
                                                    </path>
                                                    <path fill="#FFAA30" class="color-key" fill-rule="nonzero"
                                                          d="M37 15v1h-9V7h1a8 8 0 0 1 8 8zm-7-5.92V14h4.92A6 6 0 0 0 30 9.08z">
                                                    </path>
                                                </g>
                                                <g fill-rule="nonzero" transform="translate(0 9)">
                                                    <path fill="#FFFFFF"
                                                          d="M24 17.18l-7.77 1.55L13.18 34H6.82l-2-10h-2l-1.6-7.98A19.91 19.91 0 0 1 10 14h14v3.18zM10 11a5 5 0 1 1 0-10 5 5 0 0 1 0 10z">
                                                    </path>
                                                    <path fill="#FFAA30" class="color-key"
                                                          d="M10 12a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm7.08 9.58L14 35H6L4 25H2L.1 15.48A20.9 20.9 0 0 1 10 13h15v5l-7.92 1.58zM23 15H10c-2.67 0-5.26.55-7.64 1.6L3.64 23h2l2 10h4.72l3.02-15.12L23 16.36V15z">
                                                    </path>
                                                </g>
                                            </g>
                                            <g transform="translate(160 168)">
                                                <rect width="44" height="36" x="1" y="1" fill="#FFFFFF"></rect>
                                                <path fill="#575451"
                                                      d="M22 12V8h2v4h20V7h2v31H0V7h2v5h20zm0 14H2v4h20v-4zm2 0v4h20v-4H24zm-2 6H2v4h20v-4zm2 0v4h20v-4H24zm-2-12H2v4h20v-4zm2 0v4h20v-4H24zm-2-6H2v4h20v-4zm2 0v4h20v-4H24z">
                                                </path>
                                                <path fill="#FFAA30" class="color-key" fill-rule="nonzero"
                                                      d="M2 2v4h42V2H2zM0 0h46v8H0V0z"></path>
                                            </g>
                                            <g transform="translate(0 158)">
                                                <path fill="#FFFFFF"
                                                      d="M4 1h40a3 3 0 0 1 3 3v33H1V4a3 3 0 0 1 3-3z"></path>
                                                <path fill="#575451" fill-rule="nonzero"
                                                      d="M39.6 36c.25.68.64 1.31 1.18 1.85l.15.15H0V4.22C0 1.9 1.8 0 4 0h40c2.2 0 4 1.89 4 4.22v26.7l-.15-.14A4.99 4.99 0 0 0 46 29.6V10H2v26h37.6zM2 8h44V4.11C46 2.95 45.1 2 44 2H4c-1.1 0-2 .95-2 2.11V8zm2-4h2v2H4V4zm4 0h2v2H8V4zm4 0h2v2h-2V4z">
                                                </path>
                                                <path fill="#FFAA30" class="color-key" fill-rule="nonzero"
                                                      d="M43.02 31.6a3 3 0 0 1 3.42.6l5.65 5.65a3 3 0 1 1-4.24 4.24l-5.66-5.65a3 3 0 0 1-.58-3.42l-1.57-1.57a11 11 0 1 1 1.41-1.41l1.57 1.57zm-3.66-2.24a9 9 0 1 0-12.72-12.72 9 9 0 0 0 12.72 12.72zm-1.41-1.41a7 7 0 1 1-9.9-9.9 7 7 0 0 1 9.9 9.9zm-1.41-1.41a5 5 0 1 0-7.08-7.08 5 5 0 0 0 7.08 7.08zm7.07 7.07a1 1 0 0 0 0 1.41l5.65 5.66a1 1 0 1 0 1.42-1.42l-5.66-5.65a1 1 0 0 0-1.41 0zM11.7 18.7L8.4 22l3.3 3.3-1.42 1.4L5.6 22l4.7-4.7 1.42 1.4zm2.58 6.58L17.6 22l-3.3-3.3 1.42-1.4 4.7 4.7-4.7 4.7-1.42-1.4z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>

                                <div class="tile__image-path">
                                    <svg viewBox="0 0 310 310" xmlns="http://www.w3.org/2000/svg">
                                        <g stroke="none" fill="none" transform="translate(2, 34)">
                                            <path class="path-background" stroke="#BDBDBD" stroke-width="2"
                                                  d="M67,60 C72.5228475,60 77,55.5228475 77,50 C77,44.4771525 72.5228475,40 67,40 L62,40 C50.954305,40 42,31.045695 42,20 C42,8.954305 50.954305,0 62,0 L254,0 L254,0.0987504852 C264.106645,1.10219934 272,9.6293038 272,20 C272,29.3191971 265.626136,37.1496986 257,39.3699126 L257,40 C243.192881,40 232,51.1928813 232,65 C232,78.8071187 243.192881,90 257,90 L275,90 C291.568542,90 305,103.431458 305,120 C305,136.568542 291.568542,150 275,150 L207,150 C198.715729,150 192,156.715729 192,165 C192,173.284271 198.715729,180 207,180 L232,180 C243.045695,180 252,188.954305 252,200 C252,211.045695 243.045695,220 232,220 L207,220 L57,220 C43.1928813,220 32,208.807119 32,195 C32,181.192881 43.1928813,170 57,170 L82,170 C93.045695,170 102,161.045695 102,150 C102,138.954305 93.045695,130 82,130 L35,130 C15.6700338,130 0,114.329966 0,95 C0,75.6700338 15.6700338,60 35,60 L67,60 Z">
                                            </path>
                                            <path class="path-foreground" stroke="#FFFFFF" stroke-width="3"
                                                  stroke-dasharray="3,2"
                                                  d="M67,60 C72.5228475,60 77,55.5228475 77,50 C77,44.4771525 72.5228475,40 67,40 L62,40 C50.954305,40 42,31.045695 42,20 C42,8.954305 50.954305,0 62,0 L254,0 L254,0.0987504852 C264.106645,1.10219934 272,9.6293038 272,20 C272,29.3191971 265.626136,37.1496986 257,39.3699126 L257,40 C243.192881,40 232,51.1928813 232,65 C232,78.8071187 243.192881,90 257,90 L275,90 C291.568542,90 305,103.431458 305,120 C305,136.568542 291.568542,150 275,150 L207,150 C198.715729,150 192,156.715729 192,165 C192,173.284271 198.715729,180 207,180 L232,180 C243.045695,180 252,188.954305 252,200 C252,211.045695 243.045695,220 232,220 L207,220 L57,220 C43.1928813,220 32,208.807119 32,195 C32,181.192881 43.1928813,170 57,170 L82,170 C93.045695,170 102,161.045695 102,150 C102,138.954305 93.045695,130 82,130 L35,130 C15.6700338,130 0,114.329966 0,95 C0,75.6700338 15.6700338,60 35,60 L67,60 Z">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                            </div>

                            <h3 class="my-3 text-2xl uppercase font-knockout-29 tracking-3x-wide">
                                Laravel
                            </h3>

                            <p class="font-normal leading-normal text-md">
                                The present and future of backend development. We wrote the book.
                            </p>
                        </a>

                        <a href="/vue" class="tile a-reset" title="Vue.js">
                            <div class="tile__image tile__image-vue">
                                <div class="relative z-10 w-4/5 m-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240 240">
                                        <g transform="translate(10 12)">
                                            <g transform="translate(89)">
                                                <polygon fill="#FFFFFF" fill-rule="nonzero"
                                                         points="3 12.618 3 39.382 26 50.882 49 39.382 49 12.618 26 1.118">
                                                </polygon>
                                                <path fill="#575451" fill-rule="nonzero"
                                                      d="M25 33v16.26L4 38.76V30H2v10l24 12 24-12V30h-2v8.76l-21 10.5V33h-2zm12.06-15.77l9.47-4.73L26 2.24 5.47 12.5l9.47 4.73-1.5 1.5L4 14v10H2V12L26 0l24 12v12h-2V14l-9.45 4.72-1.49-1.49z">
                                                </path>
                                                <path fill="#FFAA30" class="color-key"
                                                      d="M22 29h4v2h-4v4h-6l-4-4H8v-3H0v-2h8v-3h4l4-4h6v4h4v2h-4v4zm22-3h8v2h-8v3h-4l-4 4h-6V19h6l4 4h4v3zm-34-1v4h2.83l4 4H20V21h-3.17l-4 4H10zm29.17 0l-4-4H32v12h3.17l4-4H42v-4h-2.83z">
                                                </path>
                                            </g>
                                            <g transform="translate(45 74)">
                                                <polygon fill="#FFFFFF"
                                                         points="88.1 1 72 28.801 55.55 1 2 1 72 120.891 142 1">
                                                </polygon>
                                                <polygon fill="#FFAA30" class="color-key"
                                                         points="25.65 5 68 77.282 110 5 84.1 5 68 32.801 51.55 5">
                                                </polygon>
                                                <path fill="#575451"
                                                      d="M112.26 2H88.68L72 30.78 54.98 2H31.39L72 71.3 112.27 2zm2.32 0L72 75.27 29.08 2H3.74L72 118.9 140.26 2h-25.68zM71.99 26.82L87.52 0h56.22L72 122.87.26 0h55.86l15.87 26.82z">
                                                </path>
                                            </g>
                                            <g transform="translate(0 159)">
                                                <path fill="#FFAA30" class="color-key"
                                                      d="M26 19.1V12h6v7.1a6.98 6.98 0 0 1 5-2.1h8a1 1 0 0 0 1-1v-4h6v4a7 7 0 0 1-7 7h-8a1 1 0 0 0-1 1v4H22v-4a1 1 0 0 0-1-1h-8a7 7 0 0 1-7-7v-4h6v4a1 1 0 0 0 1 1h8c1.96 0 3.73.8 5 2.1zM8 14v2a5 5 0 0 0 5 5h8a3 3 0 0 1 3 3v2h2v-2a5 5 0 0 0-5-5h-8a3 3 0 0 1-3-3v-2H8zm40 0v2a3 3 0 0 1-3 3h-8a5 5 0 0 0-5 5v2h2v-2a3 3 0 0 1 3-3h8a5 5 0 0 0 5-5v-2h-2zM28 26h2V14h-2v12z">
                                                </path>
                                                <path fill="#575451"
                                                      d="M20 26h18v14H20V26zm2 2v10h14V28H22zM0 0h18v14H0V0zm2 2v10h14V2H2zm18-2h18v14H20V0zm2 2v10h14V2H22zm18-2h18v14H40V0zm2 2v10h14V2H42z">
                                                </path>
                                            </g>
                                            <g transform="translate(172 167)">
                                                <path fill="#FFFFFF"
                                                      d="M12 1h38a3 3 0 0 1 3 3v29H9V4a3 3 0 0 1 3-3z"></path>
                                                <path fill="#575451" fill-rule="nonzero"
                                                      d="M10 9H8V4a4 4 0 0 1 4-4h38a4 4 0 0 1 4 4v30H8v-3h2v1h42V8H10v1zm0-3h42V4a2 2 0 0 0-2-2H12a2 2 0 0 0-2 2v2z">
                                                </path>
                                                <rect width="2" height="6" x="22" y="33" fill="#575451"></rect>
                                                <rect width="26" height="2" x="18" y="38" fill="#575451"></rect>
                                                <rect width="2" height="6" x="38" y="33" fill="#575451"></rect>
                                                <path fill="#FFFFFF"
                                                      d="M5.1 15.44a6 6 0 0 1 1.9-1.1V12h4v2.34a6 6 0 0 1 1.9 1.1l2.03-1.17 2 3.46-2.03 1.17a6.03 6.03 0 0 1 0 2.2l2.03 1.17-2 3.46-2.03-1.17a6 6 0 0 1-1.9 1.1V28H7v-2.34a6 6 0 0 1-1.9-1.1l-2.03 1.17-2-3.46L3.1 21.1a6.03 6.03 0 0 1 0-2.2l-2.03-1.17 2-3.46 2.03 1.17z">
                                                </path>
                                                <path fill="#FFAA30" class="color-key" fill-rule="nonzero"
                                                      d="M6 13.67V13c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v.67a7 7 0 0 1 .98.57l.58-.34a2 2 0 0 1 2.73.73l1 1.74a2 2 0 0 1-.73 2.73l-.58.34a7.1 7.1 0 0 1 0 1.12l.58.34a2 2 0 0 1 .73 2.73l-1 1.74a2 2 0 0 1-2.73.73l-.58-.34a7 7 0 0 1-.98.57V27a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-.67a7 7 0 0 1-.98-.57l-.58.34a2 2 0 0 1-2.73-.73l-1-1.74a2 2 0 0 1 .73-2.73l.58-.34a7.1 7.1 0 0 1 0-1.12l-.58-.34a2 2 0 0 1-.73-2.73l1-1.74a2 2 0 0 1 2.73-.73l.58.34a7 7 0 0 1 .98-.57zm.16 2.21l-1.04.72-1.68-.97-1 1.74 1.68.97-.1 1.25a5.1 5.1 0 0 0 0 .82l.1 1.25-1.68.97 1 1.74 1.68-.97 1.04.72a5 5 0 0 0 .7.4l1.14.54V27h2v-1.94l1.14-.54a5 5 0 0 0 .7-.4l1.04-.72 1.68.97 1-1.74-1.68-.97.1-1.25a5.1 5.1 0 0 0 0-.82l-.1-1.25 1.68-.97-1-1.74-1.68.97-1.04-.72a5 5 0 0 0-.7-.4L10 14.94V13H8v1.94l-1.14.54a5 5 0 0 0-.7.4z">
                                                </path>
                                                <path fill="#FFAA30" class="color-key"
                                                      d="M9 23a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm21-10h16v18H30V11zm2 16h12V13H32v14z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>

                                <div class="tile__image-path">
                                    <svg viewBox="0 0 310 310" xmlns="http://www.w3.org/2000/svg">
                                        <g stroke="none" fill="none" transform="translate(2, 34)">
                                            <path class="path-background" stroke="#BDBDBD" stroke-width="2"
                                                  d="M67,60 C72.5228475,60 77,55.5228475 77,50 C77,44.4771525 72.5228475,40 67,40 L62,40 C50.954305,40 42,31.045695 42,20 C42,8.954305 50.954305,0 62,0 L254,0 L254,0.0987504852 C264.106645,1.10219934 272,9.6293038 272,20 C272,29.3191971 265.626136,37.1496986 257,39.3699126 L257,40 C243.192881,40 232,51.1928813 232,65 C232,78.8071187 243.192881,90 257,90 L275,90 C291.568542,90 305,103.431458 305,120 C305,136.568542 291.568542,150 275,150 L207,150 C198.715729,150 192,156.715729 192,165 C192,173.284271 198.715729,180 207,180 L232,180 C243.045695,180 252,188.954305 252,200 C252,211.045695 243.045695,220 232,220 L207,220 L57,220 C43.1928813,220 32,208.807119 32,195 C32,181.192881 43.1928813,170 57,170 L82,170 C93.045695,170 102,161.045695 102,150 C102,138.954305 93.045695,130 82,130 L35,130 C15.6700338,130 0,114.329966 0,95 C0,75.6700338 15.6700338,60 35,60 L67,60 Z">
                                            </path>
                                            <path class="path-foreground" stroke="#FFFFFF" stroke-width="3"
                                                  stroke-dasharray="3,2"
                                                  d="M67,60 C72.5228475,60 77,55.5228475 77,50 C77,44.4771525 72.5228475,40 67,40 L62,40 C50.954305,40 42,31.045695 42,20 C42,8.954305 50.954305,0 62,0 L254,0 L254,0.0987504852 C264.106645,1.10219934 272,9.6293038 272,20 C272,29.3191971 265.626136,37.1496986 257,39.3699126 L257,40 C243.192881,40 232,51.1928813 232,65 C232,78.8071187 243.192881,90 257,90 L275,90 C291.568542,90 305,103.431458 305,120 C305,136.568542 291.568542,150 275,150 L207,150 C198.715729,150 192,156.715729 192,165 C192,173.284271 198.715729,180 207,180 L232,180 C243.045695,180 252,188.954305 252,200 C252,211.045695 243.045695,220 232,220 L207,220 L57,220 C43.1928813,220 32,208.807119 32,195 C32,181.192881 43.1928813,170 57,170 L82,170 C93.045695,170 102,161.045695 102,150 C102,138.954305 93.045695,130 82,130 L35,130 C15.6700338,130 0,114.329966 0,95 C0,75.6700338 15.6700338,60 35,60 L67,60 Z">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                            </div>

                            <h3 class="my-3 text-2xl uppercase font-knockout-29 tracking-3x-wide">
                                Vue
                            </h3>

                            <p class="font-normal leading-normal text-md">
                                The progressive JavaScript framework. Pairs well with Laravel.
                            </p>
                        </a>

                        <a href="/react" class="tile a-reset" title="React">
                            <div class="tile__image tile__image-react">
                                <div class="relative z-10 w-4/5 m-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240 240">
                                        <g transform="translate(4 12)">
                                            <g transform="translate(0 160)">
                                                <path fill="#FFFFFF"
                                                      d="M12 1h21a3 3 0 0 1 3 3v45H9V4a3 3 0 0 1 3-3z"></path>
                                                <path fill="#FFAA30" class="color-key"
                                                      d="M36 13.67c.33-.15.67-.28 1.02-.39a2 2 0 0 0 3.96 0 7 7 0 0 1 2.84 1.65 2 2 0 0 0 1.99 3.43 7.02 7.02 0 0 1 0 3.28 2 2 0 0 0-1.99 3.43 7 7 0 0 1-2.84 1.65 2 2 0 0 0-3.96 0c-.35-.1-.7-.24-1.02-.4V13.68zM39 23a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM6 24.67V24c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v.67a7 7 0 0 1 .98.57l.58-.34a2 2 0 0 1 2.73.73l1 1.74a2 2 0 0 1-.73 2.73l-.58.34a7.1 7.1 0 0 1 0 1.12l.58.34a2 2 0 0 1 .73 2.73l-1 1.74a2 2 0 0 1-2.73.73l-.58-.34a7 7 0 0 1-.98.57V38a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-.67a7 7 0 0 1-.98-.57l-.58.34a2 2 0 0 1-2.73-.73l-1-1.74a2 2 0 0 1 .73-2.73l.58-.34a7.1 7.1 0 0 1 0-1.12l-.58-.34a2 2 0 0 1-.73-2.73l1-1.74a2 2 0 0 1 2.73-.73l.58.34a7 7 0 0 1 .98-.57zm.16 2.21l-1.04.72-1.68-.97-1 1.74 1.68.97-.1 1.25a5.1 5.1 0 0 0 0 .82l.1 1.25-1.68.97 1 1.74 1.68-.97 1.04.72a5 5 0 0 0 .7.4l1.14.54V38h2v-1.94l1.14-.54a5 5 0 0 0 .7-.4l1.04-.72 1.68.97 1-1.74-1.68-.97.1-1.25a5.1 5.1 0 0 0 0-.82l-.1-1.25 1.68-.97-1-1.74-1.68.97-1.04-.72a5 5 0 0 0-.7-.4L10 25.94V24H8v1.94l-1.14.54a5 5 0 0 0-.7.4zM9 34a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2z">
                                                </path>
                                                <path fill="#575451" fill-rule="nonzero"
                                                      d="M35 10H10v10H8V4a4 4 0 0 1 4-4h21a4 4 0 0 1 4 4v46H8v-8h2v6h25V10zm0-2V4a2 2 0 0 0-2-2H12a2 2 0 0 0-2 2v4h25zm-12 6h8v2h-8v-2zm0 4h8v2h-8v-2zm0 4h8v2h-8v-2z">
                                                </path>
                                            </g>
                                            <g transform="translate(46 67)">
                                                <path fill="#FFFFFF"
                                                      d="M109.24 37.95C123.07 42.7 132 50.18 132 57.89c0 8.05-9.55 15.92-24.22 20.78-.78.26-1.57.5-2.38.75.29 1.16.55 2.3.77 3.42 2.9 14.65.66 26.69-6.2 30.67-6.65 3.85-17.4.07-28.27-9.3a84.06 84.06 0 0 1-3.46-3.16c-.9.86-1.79 1.68-2.67 2.46-11.24 9.83-22.77 13.9-29.64 9.94-6.65-3.84-8.75-15.05-6.07-29.17.3-1.53.63-3.05 1-4.57a72.7 72.7 0 0 1-3.45-1.08C13.29 73.8 4 65.83 4 57.89c0-7.69 8.65-15.1 22.2-19.83 1.52-.53 3.1-1.02 4.74-1.49-.35-1.4-.66-2.82-.94-4.24-2.81-14.37-.83-25.85 5.84-29.71 6.95-4.03 18.54.3 30.1 10.57.72.64 1.42 1.3 2.12 1.96 1.04-1 2.1-1.98 3.19-2.93C82.28 2.62 93.2-1.4 99.87 2.45c6.97 4.02 9 16.23 5.89 31.39-.2.94-.4 1.88-.64 2.81 1.39.4 2.76.83 4.12 1.3zm-3.18 35.53c12.67-4.2 20.47-10.63 20.47-15.59 0-4.65-7.22-10.68-19.07-14.76-1.22-.43-2.5-.83-3.8-1.2a128.5 128.5 0 0 1-6.23 15.99c2.67 5.64 4.86 11.1 6.48 16.23.73-.22 1.45-.44 2.15-.67zM100.8 83.9c-.2-1.02-.43-2.05-.7-3.1a127.53 127.53 0 0 1-17.33 2.67 128.6 128.6 0 0 1-10.73 13.64 78.42 78.42 0 0 0 3.22 2.94c9.3 8.01 17.93 11.05 21.97 8.71 1.9-1.1 3.42-3.84 4.19-7.95.85-4.58.66-10.44-.62-16.91zm-53.16 24.46c4.38-1.55 9.36-4.64 14.33-8.98.83-.73 1.64-1.48 2.44-2.25-3.74-4.02-7.45-8.6-11-13.59-6.2-.5-12-1.34-17.24-2.5-.35 1.41-.66 2.83-.94 4.26-2.29 12.07-.6 21.06 3.43 23.4 1.9 1.09 5.04 1.05 8.98-.34zM29.17 73.45c1.05.35 2.1.68 3.16.99a133.35 133.35 0 0 1 6.32-16.41 131.36 131.36 0 0 1-6.24-16.19c-1.48.42-2.95.88-4.4 1.39-11.6 4.05-18.54 10-18.54 14.66 0 2.2 1.6 4.9 4.78 7.62 3.53 3.03 8.68 5.8 14.92 7.94zm6.2-42.17c.25 1.32.55 2.63.87 3.94 5.3-1.2 11.06-2.1 17.08-2.65 3.51-4.96 7.19-9.52 10.9-13.51-.63-.62-1.27-1.21-1.91-1.78-9.98-8.87-19.45-12.4-23.73-9.92-4.02 2.32-5.62 11.6-3.22 23.92zm55.2 13.64c1.28 2.2 2.5 4.42 3.69 6.67 1.62-3.8 3-7.5 4.1-11.03-3.68-.84-7.6-1.53-11.68-2.05 1.35 2.11 2.65 4.25 3.9 6.41zm-22.5-21.95c-2.57 2.77-5.12 5.82-7.6 9.1 5.04-.24 10.08-.24 15.12 0a117.03 117.03 0 0 0-7.53-9.1zM45.4 44.96c1.26-2.18 2.57-4.33 3.92-6.46-4.05.51-7.95 1.18-11.6 2 1.11 3.59 2.48 7.3 4.07 11.09a161.8 161.8 0 0 1 3.61-6.63zm4.04 32.71a161.8 161.8 0 0 1-7.65-13.21 122.82 122.82 0 0 0-4.14 11.31c3.65.8 7.6 1.43 11.8 1.9zM68.21 93.2c2.5-2.76 5.02-5.86 7.52-9.25a173.22 173.22 0 0 1-15.22.02 123 123 0 0 0 7.7 9.23zm26.1-28.94a173.93 173.93 0 0 1-7.64 13.31c4.22-.5 8.23-1.19 11.94-2.04-1.15-3.59-2.59-7.36-4.3-11.27zm-8.45 4.06c1.96-3.4 3.8-6.85 5.5-10.37A179.49 179.49 0 0 0 79.68 37.8a153.76 153.76 0 0 0-23.33 0A155.35 155.35 0 0 0 44.7 58.02 153.92 153.92 0 0 0 56.4 78.27a179.29 179.29 0 0 0 23.31-.04 179.5 179.5 0 0 0 6.14-9.92zM97.14 7.19c-4.02-2.32-12.85.93-22.3 9.16-1 .88-1.99 1.78-2.95 2.7 3.66 3.95 7.3 8.5 10.82 13.52 6.04.57 11.8 1.48 17.12 2.7.2-.84.4-1.69.57-2.54 2.7-13.08 1.03-23.06-3.26-25.54zM68 46.45a11.44 11.44 0 1 1-.01 22.87A11.44 11.44 0 0 1 68 46.45z">
                                                </path>
                                                <path fill="#FFAA30" class="color-key"
                                                      d="M105.24 41.95C119.07 46.7 128 54.18 128 61.89c0 8.05-9.55 15.92-24.22 20.78-.78.26-1.57.5-2.38.75.29 1.16.55 2.3.77 3.42 2.9 14.65.66 26.69-6.2 30.67-6.65 3.85-17.4.07-28.27-9.3a84.06 84.06 0 0 1-3.46-3.16c-.9.86-1.79 1.68-2.67 2.46-11.24 9.83-22.77 13.9-29.64 9.94-6.65-3.84-8.75-15.05-6.07-29.17.3-1.53.63-3.05 1-4.57a72.7 72.7 0 0 1-3.45-1.08C9.29 77.8 0 69.83 0 61.89c0-7.69 8.65-15.1 22.2-19.83 1.52-.53 3.1-1.02 4.74-1.49-.35-1.4-.66-2.82-.94-4.24-2.81-14.37-.83-25.85 5.84-29.71 6.95-4.03 18.54.3 30.1 10.57.72.64 1.42 1.3 2.12 1.96 1.04-1 2.1-1.98 3.19-2.93C78.28 6.62 89.2 2.6 95.87 6.45c6.97 4.02 9 16.23 5.89 31.39-.2.94-.4 1.88-.64 2.81 1.39.4 2.76.83 4.12 1.3zm-3.18 35.53c12.67-4.2 20.47-10.63 20.47-15.59 0-4.65-7.22-10.68-19.07-14.76-1.22-.43-2.5-.83-3.8-1.2a128.5 128.5 0 0 1-6.23 15.99c2.67 5.64 4.86 11.1 6.48 16.23.73-.22 1.45-.44 2.15-.67zM96.8 87.9c-.2-1.02-.43-2.05-.7-3.1a127.53 127.53 0 0 1-17.33 2.67 128.6 128.6 0 0 1-10.73 13.64 78.42 78.42 0 0 0 3.22 2.94c9.3 8.01 17.93 11.05 21.97 8.71 1.9-1.1 3.42-3.84 4.19-7.95.85-4.58.66-10.44-.62-16.91zm-53.16 24.46c4.38-1.55 9.36-4.64 14.33-8.98.83-.73 1.64-1.48 2.44-2.25-3.74-4.02-7.45-8.6-11-13.59-6.2-.5-12-1.34-17.24-2.5-.35 1.41-.66 2.83-.94 4.26-2.29 12.07-.6 21.06 3.43 23.4 1.9 1.09 5.04 1.05 8.98-.34zM25.17 77.45c1.05.35 2.1.68 3.16.99a133.35 133.35 0 0 1 6.32-16.41 131.36 131.36 0 0 1-6.24-16.19c-1.48.42-2.95.88-4.4 1.39-11.6 4.05-18.54 10-18.54 14.66 0 2.2 1.6 4.9 4.78 7.62 3.53 3.03 8.68 5.8 14.92 7.94zm6.2-42.17c.25 1.32.55 2.63.87 3.94 5.3-1.2 11.06-2.1 17.08-2.65 3.51-4.96 7.19-9.52 10.9-13.51-.63-.62-1.27-1.21-1.91-1.78-9.98-8.87-19.45-12.4-23.73-9.92-4.02 2.32-5.62 11.6-3.22 23.92zm55.2 13.64c1.28 2.2 2.5 4.42 3.69 6.67 1.62-3.8 3-7.5 4.1-11.03-3.68-.84-7.6-1.53-11.68-2.05 1.35 2.11 2.65 4.25 3.9 6.41zm-22.5-21.95c-2.57 2.77-5.12 5.82-7.6 9.1 5.04-.24 10.08-.24 15.12 0a117.03 117.03 0 0 0-7.53-9.1zM41.4 48.96c1.26-2.18 2.57-4.33 3.92-6.46-4.05.51-7.95 1.18-11.6 2 1.11 3.59 2.48 7.3 4.07 11.09a161.8 161.8 0 0 1 3.61-6.63zm4.04 32.71a161.8 161.8 0 0 1-7.65-13.21 122.82 122.82 0 0 0-4.14 11.31c3.65.8 7.6 1.43 11.8 1.9zM64.21 97.2c2.5-2.76 5.02-5.86 7.52-9.25a173.22 173.22 0 0 1-15.22.02 123 123 0 0 0 7.7 9.23zm26.1-28.94a173.93 173.93 0 0 1-7.64 13.31c4.22-.5 8.23-1.19 11.94-2.04-1.15-3.59-2.59-7.36-4.3-11.27zm-8.45 4.06c1.96-3.4 3.8-6.85 5.5-10.37A179.49 179.49 0 0 0 75.68 41.8a153.76 153.76 0 0 0-23.33 0A155.35 155.35 0 0 0 40.7 62.02 153.92 153.92 0 0 0 52.4 82.27a179.29 179.29 0 0 0 23.31-.04 179.5 179.5 0 0 0 6.14-9.92zm11.28-61.13c-4.02-2.32-12.85.93-22.3 9.16-1 .88-1.99 1.78-2.95 2.7 3.66 3.95 7.3 8.5 10.82 13.52 6.04.57 11.8 1.48 17.12 2.7.2-.84.4-1.69.57-2.54 2.7-13.08 1.03-23.06-3.26-25.54zM64 50.45a11.44 11.44 0 1 1-.01 22.87A11.44 11.44 0 0 1 64 50.45z">
                                                </path>
                                                <path fill="#575451"
                                                      d="M109.57 37C124 41.98 133 49.76 133 57.9c0 8.48-9.64 16.66-24.9 21.72l-1.5.48.55 2.55c3 15.2.57 27.52-6.68 31.72-7.02 4.07-18.09.36-29.43-9.4a85.06 85.06 0 0 1-2.8-2.54c-.68.64-1.35 1.25-2.02 1.83-11.65 10.2-23.53 14.25-30.8 10.05-7.02-4.05-9.33-15.5-6.54-30.21.24-1.24.5-2.47.79-3.7-.87-.26-1.73-.53-2.59-.83C12.43 74.56 3 66.28 3 57.9c0-8.12 8.76-15.84 22.88-20.77 1.23-.43 2.52-.85 3.87-1.24-.27-1.12-.51-2.24-.73-3.36-2.94-15-.72-26.7 6.31-30.77 7.34-4.25 19.25 0 31.27 10.7.5.43.98.87 1.46 1.32.83-.78 1.67-1.55 2.53-2.3C82.11 1.44 93.33-2.48 100.37 1.58c7.35 4.24 9.61 16.7 6.37 32.46l-.42 1.92c1.09.33 2.17.67 3.25 1.04zm-.65 1.9c-1.35-.47-2.7-.9-4.08-1.29l-.92-.27.23-.93c.23-.92.44-1.85.63-2.78 3.09-15 .98-26.63-5.4-30.31-6.1-3.52-16.53.12-27.48 9.66-1.07.93-2.12 1.9-3.15 2.89l-.69.67-.7-.67c-.68-.66-1.38-1.3-2.09-1.93C53.83 3.76 42.71-.21 36.34 3.48c-6.08 3.53-8.15 14.4-5.36 28.65.27 1.41.59 2.8.93 4.2l.24.94-.93.26c-1.64.47-3.2.96-4.68 1.48C13.13 43.68 5 50.86 5 57.89c0 7.3 8.8 15.02 22.73 19.79 1.13.38 2.27.74 3.41 1.07l.93.26-.23.94c-.38 1.5-.7 3-1 4.52-2.64 13.97-.5 24.6 5.59 28.11 6.32 3.65 17.4-.12 28.48-9.82.86-.76 1.74-1.57 2.63-2.43l.7-.68.7.68a83.05 83.05 0 0 0 3.4 3.12c10.77 9.27 21.05 12.72 27.13 9.2 6.3-3.66 8.57-15.15 5.72-29.61a71.6 71.6 0 0 0-.76-3.38l-.23-.93.92-.27c.82-.25 1.6-.49 2.34-.74C122 72.9 131 65.27 131 57.9c0-7.03-8.37-14.27-22.08-19zm-4.73 36.21l-.94.28-.3-.94a127.53 127.53 0 0 0-6.43-16.1l-.2-.43.2-.42a127.5 127.5 0 0 0 6.18-15.87l.3-.94.94.27c1.35.4 2.63.8 3.85 1.22 11.85 4.08 19.74 10.33 19.74 15.71 0 5.71-8.51 12.34-21.16 16.54l-.15.05-2.03.63zm21.34-17.22c0-4.23-7.27-9.99-18.4-13.82-.9-.31-1.83-.61-2.81-.9-1.51 4.71-3.46 9.67-5.79 14.74a130.74 130.74 0 0 1 6.03 15l1.18-.38.14-.05c11.83-3.95 19.65-10.06 19.65-14.59zm-23.75 25.82c1.3 6.53 1.5 12.52.62 17.29-.8 4.28-2.43 7.34-4.67 8.64-4.67 2.7-13.81-.8-23.12-8.83a79.42 79.42 0 0 1-3.26-2.97l-.7-.68.66-.72c3.55-3.89 7.13-8.44 10.64-13.53l.27-.38.46-.05c6.17-.54 11.96-1.44 17.2-2.65l.96-.22.24.96c.27 1.09.5 2.13.7 3.14zM75.92 99.3c8.72 7.51 17.12 10.74 20.8 8.6 1.65-.95 3.02-3.5 3.71-7.27.84-4.49.64-10.24-.6-16.53l-.46-2.1a129.56 129.56 0 0 1-16.04 2.43c-3.26 4.7-6.58 8.94-9.89 12.64.83.78 1.66 1.52 2.48 2.23zm-37.76 10.27c-4.67-2.7-6.2-12.38-3.9-24.45.27-1.45.58-2.88.94-4.31l.23-.95.95.21a127.44 127.44 0 0 0 17.12 2.48l.46.04.27.38c3.52 4.95 7.2 9.5 10.9 13.49l.68.72-.7.68c-.81.78-1.64 1.54-2.48 2.28-5 4.38-10.1 7.56-14.66 9.17l-.16.06c-4.03 1.4-7.43 1.48-9.65.2zm23.15-10.93c.57-.5 1.14-1.02 1.7-1.54a135.01 135.01 0 0 1-10.14-12.6 130.63 130.63 0 0 1-15.96-2.27 77.59 77.59 0 0 0-.7 3.26c-2.14 11.32-.74 20.22 2.95 22.35 1.65.95 4.54.86 8.14-.42l.1-.03c4.28-1.53 9.12-4.56 13.9-8.75zM28.85 74.39c-6.29-2.15-11.58-4.97-15.26-8.12-3.3-2.83-5.12-5.78-5.12-8.38 0-5.4 7.61-11.56 19.2-15.6 1.48-.52 2.97-.98 4.47-1.4l.94-.28.29.94a130.36 130.36 0 0 0 6.19 16.06l.2.41-.2.42a132.36 132.36 0 0 0-6.27 16.29l-.29.94-.94-.27a68.3 68.3 0 0 1-3.2-1zm-.51-30.22c-10.87 3.8-17.87 9.46-17.87 13.72 0 1.9 1.52 4.37 4.43 6.86 3.46 2.97 8.54 5.68 14.6 7.75.72.25 1.44.48 2.17.7a135.2 135.2 0 0 1 5.88-15.17 133.16 133.16 0 0 1-5.8-14.95c-1.15.34-2.29.7-3.41 1.1zM38.07 6.5c4.95-2.86 14.94 1.2 24.9 10.05.63.56 1.28 1.16 1.95 1.8l.71.68-.67.72c-3.7 3.97-7.34 8.48-10.82 13.4l-.27.38-.45.04c-5.98.56-11.7 1.45-16.96 2.64l-.95.21-.24-.95a81.32 81.32 0 0 1-.89-4c-2.4-12.31-.96-22.27 3.7-24.97zm-1.73 24.6c.2.98.41 1.96.64 2.94 4.94-1.07 10.26-1.89 15.8-2.42 3.23-4.55 6.61-8.75 10.04-12.5-.4-.38-.8-.74-1.18-1.08-9.37-8.33-18.63-12.09-22.56-9.8-3.66 2.11-5 11.3-2.74 22.85zm53.37 14.33a173.11 173.11 0 0 0-3.87-6.37l-1.14-1.8 2.11.27c4.1.52 8.05 1.21 11.77 2.06l1.05.24-.32 1.03c-1.11 3.57-2.5 7.3-4.13 11.13l-.83 1.94-.98-1.86c-1.17-2.24-2.4-4.45-3.66-6.64zm1.73-1c.93 1.6 1.83 3.21 2.7 4.84 1.12-2.72 2.1-5.39 2.93-7.97-2.69-.58-5.5-1.08-8.4-1.5.95 1.53 1.87 3.07 2.77 4.63zM67.33 22.3l.73-.8.74.8c2.54 2.76 5.08 5.84 7.6 9.18l1.27 1.7-2.12-.1c-5.01-.24-10.03-.24-15.04 0l-2.13.1 1.29-1.7c2.5-3.3 5.07-6.38 7.66-9.18zm-4.77 8.7c3.65-.13 7.3-.13 10.95 0-1.81-2.34-3.63-4.52-5.45-6.54a118.67 118.67 0 0 0-5.5 6.53zm-16.3 14.47a160.8 160.8 0 0 0-3.58 6.58l-.98 1.9-.83-1.97c-1.6-3.8-2.98-7.55-4.1-11.18l-.33-1.03 1.06-.24c3.68-.82 7.6-1.5 11.7-2l2.12-.27-1.15 1.8c-1.35 2.1-2.65 4.24-3.9 6.4zm-1.73-1c.91-1.58 1.85-3.14 2.8-4.68-2.88.4-5.66.9-8.33 1.46.84 2.61 1.8 5.28 2.9 7.98.85-1.6 1.73-3.19 2.63-4.76zm5.75 32.67l1.14 1.77-2.09-.24a117.3 117.3 0 0 1-11.9-1.91l-1.06-.23.32-1.04c1.14-3.7 2.54-7.52 4.18-11.4l.83-1.98.98 1.9a159.8 159.8 0 0 0 7.6 13.13zm-5.72-5.54a161.8 161.8 0 0 1-2.66-4.77 120.74 120.74 0 0 0-2.97 8.2c2.69.55 5.54 1.02 8.54 1.4-1-1.59-1.97-3.2-2.91-4.83zm24.4 22.28l-.74.81-.74-.8a124 124 0 0 1-7.77-9.3l-1.27-1.69 2.11.09a189.63 189.63 0 0 0 15.13-.03l2.1-.1-1.25 1.69a117.37 117.37 0 0 1-7.58 9.33zm4.7-8.83a222.4 222.4 0 0 1-11.06 0c1.85 2.37 3.72 4.6 5.6 6.67 1.82-2.05 3.64-4.28 5.46-6.67zM93.42 63.8l.97-1.86.84 1.92a117.3 117.3 0 0 1 4.33 11.37l.33 1.04-1.06.24c-3.74.85-7.78 1.54-12.04 2.05l-2.09.25 1.12-1.77a190.44 190.44 0 0 0 7.6-13.24zm-1.95 7.75c-.93 1.6-1.87 3.19-2.84 4.76 3.04-.41 5.94-.92 8.69-1.51a113.9 113.9 0 0 0-3.1-8.21c-.9 1.67-1.8 3.32-2.75 4.96zM80.55 78.8l-.27.4-.49.04c-3.84.28-7.8.42-11.79.42-3.98 0-7.88-.13-11.65-.37l-.49-.03-.27-.4a156.28 156.28 0 0 1-11.8-20.4l-.2-.43.2-.43c1.7-3.53 3.53-7 5.48-10.4l1.87-3.24c1.4-2.21 2.86-4.48 4.38-6.7l.27-.4.48-.04a155.77 155.77 0 0 1 23.48 0l.49.04.27.4A180.49 180.49 0 0 1 92.26 57.5l.22.44-.22.44a165.96 165.96 0 0 1-5.53 10.44l-.29.5a181.02 181.02 0 0 1-5.89 9.47zm9.7-20.84a178.5 178.5 0 0 0-11.13-19.18 152.89 152.89 0 0 0-22.22 0 152.84 152.84 0 0 0-5.9 9.42l-.22.4a154.35 154.35 0 0 0-4.98 9.43 152.92 152.92 0 0 0 11.16 19.3 178.9 178.9 0 0 0 22.2-.05A178.5 178.5 0 0 0 85 67.82l.28-.5a163.8 163.8 0 0 0 4.97-9.37zm7.4-51.62c4.94 2.85 6.42 13.54 3.73 26.6-.18.87-.37 1.73-.58 2.59l-.24.96-.96-.23c-5.27-1.21-11-2.12-16.98-2.68l-.46-.05-.27-.37c-3.5-5-7.12-9.52-10.73-13.42l-.67-.71.7-.68c.98-.94 1.97-1.85 2.99-2.74 9.46-8.24 18.8-11.97 23.46-9.27zm1.77 26.2c2.53-12.29 1.16-22.2-2.78-24.47-3.66-2.12-12.28 1.32-21.15 9.05-.74.65-1.48 1.31-2.2 2 3.37 3.69 6.72 7.9 9.98 12.51 5.54.54 10.86 1.37 15.81 2.47.12-.52.24-1.04.34-1.56zM68 45.45a12.44 12.44 0 1 1-.01 24.87A12.44 12.44 0 0 1 68 45.45zm0 2a10.44 10.44 0 1 0 .01 20.87A10.44 10.44 0 0 0 68 47.45z">
                                                </path>
                                            </g>
                                            <g transform="translate(179 174)">
                                                <path fill="#FFFFFF"
                                                      d="M4 1h40a3 3 0 0 1 3 3v33H1V4a3 3 0 0 1 3-3z"></path>
                                                <path fill="#575451" fill-rule="nonzero"
                                                      d="M39.6 36c.25.68.64 1.31 1.18 1.85l.15.15H0V4.22C0 1.9 1.8 0 4 0h40c2.2 0 4 1.89 4 4.22v26.7l-.15-.14A4.99 4.99 0 0 0 46 29.6V10H2v26h37.6zM2 8h44V4.11C46 2.95 45.1 2 44 2H4c-1.1 0-2 .95-2 2.11V8zm2-4h2v2H4V4zm4 0h2v2H8V4zm4 0h2v2h-2V4z">
                                                </path>
                                                <path fill="#FFAA30" class="color-key" fill-rule="nonzero"
                                                      d="M43.02 31.6a3 3 0 0 1 3.42.6l5.65 5.65a3 3 0 1 1-4.24 4.24l-5.66-5.65a3 3 0 0 1-.58-3.42l-1.57-1.57a11 11 0 1 1 1.41-1.41l1.57 1.57zm-3.66-2.24a9 9 0 1 0-12.72-12.72 9 9 0 0 0 12.72 12.72zm-1.41-1.41a7 7 0 1 1-9.9-9.9 7 7 0 0 1 9.9 9.9zm-1.41-1.41a5 5 0 1 0-7.08-7.08 5 5 0 0 0 7.08 7.08zm7.07 7.07a1 1 0 0 0 0 1.41l5.65 5.66a1 1 0 1 0 1.42-1.42l-5.66-5.65a1 1 0 0 0-1.41 0zM11.7 18.7L8.4 22l3.3 3.3-1.42 1.4L5.6 22l4.7-4.7 1.42 1.4zm2.58 6.58L17.6 22l-3.3-3.3 1.42-1.4 4.7 4.7-4.7 4.7-1.42-1.4z">
                                                </path>
                                            </g>
                                            <g transform="translate(94)">
                                                <rect width="44" height="44" x="1" y="1" fill="#FFFFFF" rx="4">
                                                </rect>
                                                <path fill="#575451" fill-rule="nonzero"
                                                      d="M46 23v18a5 5 0 0 1-5 5H23v-2h18a3 3 0 0 0 3-3V23h2zM23 0H5a5 5 0 0 0-5 5v18h2V5a3 3 0 0 1 3-3h18V0z">
                                                </path>
                                                <path fill="#FFAA30" class="color-key" fill-rule="nonzero"
                                                      d="M24 24v5.88a2.8 2.8 0 0 1-1.55 2.51c-.98.5-2.17.3-2.95-.47l-.62-.63a1 1 0 0 0-.7-.29H18a3 3 0 0 0 0 6h.17a1 1 0 0 0 .7-.3l.63-.62a2.55 2.55 0 0 1 2.95-.47A2.8 2.8 0 0 1 24 38.1V46H5a5 5 0 0 1-5-5V22h7.88a.8.8 0 0 0 .73-.45.55.55 0 0 0-.1-.63l-.63-.63A3 3 0 0 1 7 18.17V18a5 5 0 0 1 10 0v.17a3 3 0 0 1-.88 2.12l-.62.63a.55.55 0 0 0-.1.63.8.8 0 0 0 .72.45H22v-5.88c0-1.07.6-2.04 1.55-2.51.98-.5 2.17-.3 2.95.47l.62.63a1 1 0 0 0 .7.29H28a3 3 0 0 0 0-6h-.17a1 1 0 0 0-.7.3l-.63.62c-.78.77-1.97.97-2.95.47A2.8 2.8 0 0 1 22 7.9V0h19a5 5 0 0 1 5 5v19h-7.88a.8.8 0 0 0-.73.45c-.1.2-.06.47.1.63l.63.63a3 3 0 0 1 .88 2.12V28a5 5 0 0 1-10 0v-.17a3 3 0 0 1 .88-2.12l.62-.63c.17-.16.21-.42.1-.63a.8.8 0 0 0-.72-.45H24zm0-22v5.88c0 .3.17.59.45.73.2.1.47.06.63-.1l.63-.63A3 3 0 0 1 27.83 7H28a5 5 0 0 1 0 10h-.17a3 3 0 0 1-2.12-.88l-.63-.62a.55.55 0 0 0-.63-.1.8.8 0 0 0-.45.72V22h5.88c1.07 0 2.04.6 2.51 1.55.5.98.3 2.17-.47 2.95l-.63.62a1 1 0 0 0-.29.7V28a3 3 0 0 0 6 0v-.17a1 1 0 0 0-.3-.7l-.62-.63a2.55 2.55 0 0 1-.47-2.95A2.8 2.8 0 0 1 38.1 22H44V5a3 3 0 0 0-3-3H24zm-2 36.12a.8.8 0 0 0-.45-.73.55.55 0 0 0-.63.1l-.63.63a3 3 0 0 1-2.12.88H18a5 5 0 0 1 0-10h.17a3 3 0 0 1 2.12.88l.63.62c.16.17.42.21.63.1a.8.8 0 0 0 .45-.72V24h-5.88a2.8 2.8 0 0 1-2.51-1.55c-.5-.98-.3-2.17.47-2.95l.63-.62a1 1 0 0 0 .29-.7V18a3 3 0 0 0-6 0v.17c0 .27.1.52.3.7l.62.63c.77.78.97 1.97.47 2.95A2.8 2.8 0 0 1 7.9 24H2v17a3 3 0 0 0 3 3h17v-5.88z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>

                                <div class="tile__image-path">
                                    <svg viewBox="0 0 310 310" xmlns="http://www.w3.org/2000/svg">
                                        <g stroke="none" fill="none" transform="translate(2, 34)">
                                            <path class="path-background" stroke="#BDBDBD" stroke-width="2"
                                                  d="M67,60 C72.5228475,60 77,55.5228475 77,50 C77,44.4771525 72.5228475,40 67,40 L62,40 C50.954305,40 42,31.045695 42,20 C42,8.954305 50.954305,0 62,0 L254,0 L254,0.0987504852 C264.106645,1.10219934 272,9.6293038 272,20 C272,29.3191971 265.626136,37.1496986 257,39.3699126 L257,40 C243.192881,40 232,51.1928813 232,65 C232,78.8071187 243.192881,90 257,90 L275,90 C291.568542,90 305,103.431458 305,120 C305,136.568542 291.568542,150 275,150 L207,150 C198.715729,150 192,156.715729 192,165 C192,173.284271 198.715729,180 207,180 L232,180 C243.045695,180 252,188.954305 252,200 C252,211.045695 243.045695,220 232,220 L207,220 L57,220 C43.1928813,220 32,208.807119 32,195 C32,181.192881 43.1928813,170 57,170 L82,170 C93.045695,170 102,161.045695 102,150 C102,138.954305 93.045695,130 82,130 L35,130 C15.6700338,130 0,114.329966 0,95 C0,75.6700338 15.6700338,60 35,60 L67,60 Z">
                                            </path>
                                            <path class="path-foreground" stroke="#FFFFFF" stroke-width="3"
                                                  stroke-dasharray="3,2"
                                                  d="M67,60 C72.5228475,60 77,55.5228475 77,50 C77,44.4771525 72.5228475,40 67,40 L62,40 C50.954305,40 42,31.045695 42,20 C42,8.954305 50.954305,0 62,0 L254,0 L254,0.0987504852 C264.106645,1.10219934 272,9.6293038 272,20 C272,29.3191971 265.626136,37.1496986 257,39.3699126 L257,40 C243.192881,40 232,51.1928813 232,65 C232,78.8071187 243.192881,90 257,90 L275,90 C291.568542,90 305,103.431458 305,120 C305,136.568542 291.568542,150 275,150 L207,150 C198.715729,150 192,156.715729 192,165 C192,173.284271 198.715729,180 207,180 L232,180 C243.045695,180 252,188.954305 252,200 C252,211.045695 243.045695,220 232,220 L207,220 L57,220 C43.1928813,220 32,208.807119 32,195 C32,181.192881 43.1928813,170 57,170 L82,170 C93.045695,170 102,161.045695 102,150 C102,138.954305 93.045695,130 82,130 L35,130 C15.6700338,130 0,114.329966 0,95 C0,75.6700338 15.6700338,60 35,60 L67,60 Z">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                            </div>

                            <h3 class="my-3 text-2xl uppercase font-knockout-29 tracking-3x-wide">
                                React
                            </h3>

                            <p class="font-normal leading-normal text-md">
                                The advanced JavaScript library for building modern user interfaces.
                            </p>
                        </a>
                    </div>
                    <div class="py-8 working-with-tighten lg:px-10">
                        <div class="lg:flex">
                            <div class="lg:flex-1 lg:mx-0 xs:mx-6">
                                <h2 class="my-3 text-4xl text-center text-white uppercase font-knockout-30">
                                    Engage with us
                                </h2>
                            </div>
                        </div>

                        <div class="font-sans working-with-tighten__blurb">
                            We play three primary roles for our clients. Every project is different, so mixing and
                            matching is encouraged. Give it a try:
                        </div>

                        <!-- Copy Only Sm and down -->
                        <div class="px-6 pt-6 text-left lg:hidden lg:mx-0 xs:mx-6">
                            <div class="my-9">
                                <h3
                                        class="text-xl text-white font-knockout-30 tracking-2x-wide uppercase mt-2 mb-1">
                                    Agency Partner
                                </h3>

                                <p class="text-green-300">
                                    You need a technical partner for a specific discipline. We work closely with
                                    your team to help you deliver maximum value for your client.
                                </p>
                            </div>
                            <div class="my-9">
                                <h3
                                        class="text-xl text-white font-knockout-30 tracking-2x-wide uppercase mt-2 mb-1">
                                    Technical Advisor
                                </h3>

                                <p class="text-green-300">
                                    You've got a codebase and you're not sure if you're doing it right. We work with
                                    your team to level up your development processes.
                                </p>
                            </div>
                            <div class="my-9">
                                <h3
                                        class="text-xl text-white font-knockout-30 tracking-2x-wide uppercase mt-2 mb-1">
                                    Embedded Team
                                </h3>

                                <p class="text-green-300">
                                    You've got an idea and you've got some funding, but hiring developers is arduous
                                    and expensive. Let Tighten be your dev team.
                                </p>
                            </div>
                        </div>

                        <!-- Venn Diagram Lg and up -->
                        <div class="relative hidden pt-6 text-left lg:flex lg:flex-wrap lg:mx-0 xs:mx-6">
                            <div class="venn-diagram-content-top-js" style="display: none;">
                                <h3
                                        class="text-xl text-white font-knockout-30 tracking-2x-wide uppercase mt-2 mb-1">
                                    Agency Partner
                                </h3>

                                <p class="text-green-300">
                                    You need a technical partner for a specific discipline. We work closely with
                                    your team to help you deliver maximum value for your client.
                                </p>
                            </div>

                            <div class="venn-diagram-content-left-js" style="display: none;">
                                <h3
                                        class="text-xl text-white font-knockout-30 tracking-2x-wide uppercase mt-2 mb-1">
                                    Embedded Team
                                </h3>

                                <p class="text-green-300">
                                    You've got an idea and you've got some funding, but hiring developers is arduous
                                    and expensive. Let Tighten be your dev team.
                                </p>
                            </div>

                            <div class="venn-diagram-content-right-js" style="display: none;">
                                <h3
                                        class="text-xl text-white font-knockout-30 tracking-2x-wide uppercase mt-2 mb-1">
                                    Technical Advisor
                                </h3>

                                <p class="text-green-300">
                                    You've got a codebase and you're not sure if you're doing it right. We work with
                                    your team to level up your development processes.
                                </p>
                            </div>

                            <div class="venn-diagram-content-middle-js" style="display: none;">
                                <h3
                                        class="text-xl text-white font-knockout-30 tracking-2x-wide uppercase mt-2 mb-1">
                                    Tighten All of the things!
                                </h3>

                                <p class="text-green-300">
                                    In partnership with your team, we own a portion of the technical scope, while
                                    consulting on the bigger picture. The whole enchilada.
                                </p>
                            </div>

                            <div class="venn-diagram-content-middle-left-js" style="display: none;">
                                <h3
                                        class="text-xl text-white font-knockout-30 tracking-2x-wide uppercase mt-2 mb-1">
                                    Embedded Partner
                                </h3>

                                <p class="text-green-300">
                                    We take ownership of a specific part of a broader project for your client. We
                                    stay in our lane, but keep our eyes on the road.
                                </p>
                            </div>

                            <div class="venn-diagram-content-middle-right-js" style="display: none;">
                                <h3
                                        class="text-xl text-white font-knockout-30 tracking-2x-wide uppercase mt-2 mb-1">
                                    Partner + Advisor
                                </h3>

                                <p class="text-green-300">
                                    We handle one aspect of your project while consulting on a wider technical
                                    scope. Your client is happy, you look great, and everyone wins.
                                </p>
                            </div>

                            <div class="venn-diagram-content-middle-bottom-js" style="display: none;">
                                <h3
                                        class="text-xl text-white font-knockout-30 tracking-2x-wide uppercase mt-2 mb-1">
                                    Embedded Team + Advisor
                                </h3>

                                <p class="text-green-300">
                                    We act as the primary developer on your project, while setting your internal
                                    team on a path to self-sufficiency and future success.
                                </p>
                            </div>

                            <div class="flex-1 text-center text-white venn-diagrams">
                                <svg xmlns="http://www.w3.org/2000/svg" height="0" width="0"
                                     style="position: absolute;">
                                    <defs>
                                        <linearGradient id="venn-hatch" x2="100%" y2="25%">
                                            <stop offset="0%" style="stop-color: #405a5b; stop-opacity: 0.7;">
                                            </stop>
                                            <stop offset="100%" style="stop-color: #cffef4; stop-opacity: 0.7;">
                                            </stop>
                                        </linearGradient>
                                    </defs>
                                </svg>

                                <div class="venn-diagrams">
                                    <!-- Background -->
                                    <svg class="venn-diagrams__diagram venn-diagrams__diagram--backward"
                                         viewBox="0 0 372 368">
                                        <g fill="none" fill-rule="evenodd">
                                            <!-- Circles -->
                                            <!-- Right Circle -->
                                            <circle cx="231" cy="237" r="90" stroke="transparent" stroke-width="2">
                                            </circle>
                                            <!-- Left Circle -->
                                            <circle cx="131" cy="237" r="90" stroke="transparent" stroke-width="2">
                                            </circle>
                                            <!-- Top Circle -->
                                            <circle cx="181" cy="150" r="90" stroke="transparent" stroke-width="2">
                                            </circle>

                                            <!-- Labels -->
                                            <path fill="#FFFFFF"
                                                  d="M133.3 20h-1.5l-.6-2.4h-2.4l-.57 2.4h-1.45l2.46-9.32h1.57l2.5 9.32zm-2.4-3.64l-.92-3.67-.88 3.67h1.8zM141.54 20h-.77l-.24-.78c-.38.67-1.13 1.02-2.11 1.02-1.99 0-2.82-1.36-2.82-2.87V13.3c0-1.51.93-2.86 3.01-2.86 2.1 0 2.89 1.18 2.89 2.86v.2h-1.43v-.34c0-.74-.4-1.43-1.46-1.43-1.05 0-1.52.73-1.52 1.47v4.27c0 .73.47 1.46 1.52 1.46s1.53-.73 1.53-1.46v-1.1h-1.48v-1.25h2.88V20zm8.12 0h-5.04v-9.32h5.04V12h-3.55v2.45h2.56v1.26h-2.56v2.95h3.55V20zm8.95 0h-1.04l-2.67-4.45-.95-1.71V20h-1.4v-9.32h1.14l2.6 4.53.92 1.71v-6.24h1.4V20zm9.11-2.5c0 1.5-.85 2.74-2.95 2.74-2.09 0-3.01-1.4-3.01-2.91v-3.98c0-1.51.92-2.9 3.01-2.9 2.1 0 2.95 1.23 2.95 2.73v.76h-1.34v-.66c0-.95-.52-1.54-1.57-1.54s-1.57.62-1.57 1.47v4.27c0 .84.52 1.46 1.57 1.46s1.57-.6 1.57-1.54v-.66h1.34v.75zm8.71-6.82l-2.59 5.54V20h-1.48v-3.78l-2.66-5.54h1.64l1.79 4.27 1.8-4.27h1.5zm12.15 3.31c0 1.38-.68 2.37-2.51 2.37h-1.65V20h-1.49v-9.32h3.14c1.83 0 2.5.99 2.5 2.38v.93zm-1.5.02v-.98c0-.69-.24-1.1-1-1.1h-1.66v3.2h1.66c.76 0 1-.44 1-1.12zm9.69 5.99h-1.5l-.6-2.4h-2.4l-.57 2.4h-1.46l2.47-9.32h1.56l2.5 9.32zm-2.41-3.64l-.91-3.67-.88 3.67h1.79zm11.07 3.75h-.29c-1.23 0-1.65-.33-1.65-1.4V17.2c0-.73-.32-1.22-1.12-1.22h-1.6V20h-1.48v-9.32h3.13c1.84 0 2.51.9 2.51 2.3v.62c0 1.04-.38 1.63-1.43 1.8 1.04.12 1.47.96 1.47 1.77v1.43c0 .25.14.36.46.36v1.15zm-2-6.42v-.73c0-.59-.24-1.04-1-1.04h-1.66v2.97h1.5c.76 0 1.16-.4 1.16-1.2zm10.03-1.67h-2.27V20h-1.48v-7.98h-2.27v-1.34h6.02v1.34zm8.67 7.98h-1.04l-2.67-4.45-.96-1.71V20h-1.4v-9.32h1.15l2.6 4.53.92 1.71v-6.24h1.4V20zm8.33 0h-5.04v-9.32h5.04V12h-3.56v2.45h2.56v1.26h-2.56v2.95h3.56V20zm9.03.11h-.3c-1.23 0-1.65-.33-1.65-1.4V17.2c0-.73-.32-1.22-1.12-1.22h-1.6V20h-1.48v-9.32h3.14c1.83 0 2.5.9 2.5 2.3v.62c0 1.04-.37 1.63-1.42 1.8 1.03.12 1.47.96 1.47 1.77v1.43c0 .25.14.36.46.36v1.15zm-2-6.42v-.73c0-.59-.24-1.04-1.01-1.04h-1.65v2.97h1.5c.75 0 1.16-.4 1.16-1.2zm3.35 334.33h-2.27V356h-1.49v-7.98h-2.26v-1.34h6.02v1.34zm7.64 7.98h-5.04v-9.32h5.04V348h-3.55v2.45h2.56v1.26h-2.56v2.95h3.55V356zm8.71-2.5c0 1.5-.85 2.74-2.95 2.74-2.09 0-3.01-1.4-3.01-2.91v-3.98c0-1.51.92-2.9 3-2.9 2.1 0 2.96 1.23 2.96 2.73v.76h-1.34v-.66c0-.95-.52-1.54-1.57-1.54s-1.57.62-1.57 1.47v4.27c0 .84.52 1.46 1.57 1.46s1.57-.6 1.57-1.54v-.66h1.34v.75zm9.06 2.5h-1.48v-4.06h-3.18V356h-1.49v-9.32h1.49v3.94h3.18v-3.94h1.48V356zm9.35 0h-1.03l-2.68-4.45-.95-1.71V356h-1.4v-9.32h1.15l2.6 4.53.91 1.71v-6.24h1.4V356zm4.78 0h-1.48v-9.32h1.48V356zm9.12-2.5c0 1.5-.86 2.74-2.96 2.74-2.08 0-3-1.4-3-2.91v-3.98c0-1.51.92-2.9 3-2.9 2.1 0 2.96 1.23 2.96 2.73v.76h-1.35v-.66c0-.95-.52-1.54-1.57-1.54s-1.56.62-1.56 1.47v4.27c0 .84.51 1.46 1.56 1.46s1.57-.6 1.57-1.54v-.66h1.35v.75zm8.66 2.5h-1.5l-.6-2.4h-2.4l-.57 2.4h-1.45l2.46-9.32h1.57l2.5 9.32zm-2.4-3.64l-.92-3.67-.88 3.67h1.8zm9.88 3.64h-4.96v-9.32h1.49v7.99h3.47V356zm12.58 0h-1.5l-.6-2.4h-2.4l-.57 2.4h-1.46l2.47-9.32h1.56l2.5 9.32zm-2.41-3.64l-.91-3.67-.88 3.67h1.79zm10.86.9c0 1.5-.9 2.74-2.88 2.74h-3.05v-9.32h3.05c1.99 0 2.88 1.23 2.88 2.74v3.84zm-1.48-.14v-3.55c0-.98-.48-1.56-1.53-1.56h-1.44v6.66h1.44c1.05 0 1.53-.59 1.53-1.55zm10.4-6.44l-2.66 9.32h-1.4l-2.62-9.32h1.57l1.8 7.25 1.79-7.25h1.52zm4.02 9.32h-1.48v-9.32h1.48V356zm8.82-2.53c0 1.56-1.19 2.77-2.96 2.77s-2.94-1.12-2.94-2.62v-.45H344v.16c0 1.12.51 1.65 1.5 1.65.95 0 1.44-.56 1.44-1.35 0-.78-.38-1.19-1.78-1.83-1.25-.57-2.5-1.32-2.5-2.8 0-1.4 1.01-2.55 2.8-2.55 1.76 0 2.89 1.1 2.89 2.62v.36h-1.43v-.15c0-.85-.43-1.58-1.51-1.58-.85 0-1.27.5-1.27 1.16 0 .74.39 1.08 1.98 1.85 1.64.78 2.31 1.48 2.31 2.76zm8.8-.26c0 1.73-.91 3.03-3.01 3.03-2.09 0-3.01-1.3-3.01-3.03v-3.75c0-1.7.92-3 3-3 2.1 0 3.02 1.3 3.02 3v3.75zm-1.49.1v-3.95c0-.95-.47-1.62-1.52-1.62-1.04 0-1.51.67-1.51 1.62v3.95c0 .95.47 1.63 1.5 1.63 1.06 0 1.53-.68 1.53-1.63zm10.78 2.8h-.29c-1.23 0-1.65-.33-1.65-1.4v-1.52c0-.73-.32-1.22-1.12-1.22h-1.6V356h-1.48v-9.32h3.13c1.84 0 2.51.9 2.51 2.3v.62c0 1.04-.38 1.63-1.43 1.8 1.04.12 1.47.96 1.47 1.77v1.43c0 .25.14.36.46.36v1.15zm-2-6.42v-.73c0-.59-.24-1.04-1-1.04h-1.66v2.97h1.5c.76 0 1.16-.4 1.16-1.2zM11.58 356H6.54v-9.32h5.04V348H8.02v2.45h2.56v1.26H8.02v2.95h3.56V356zm10.86 0h-1.33v-7.36l-.46 1.84-1.48 5.52H17.7l-1.45-5.52-.46-1.84V356h-1.33v-9.32h2.06l1.5 5.85.45 1.86.44-1.88 1.47-5.83h2.06V356zm9.02-2.3c0 1.39-.67 2.3-2.5 2.3h-3.23v-9.32h3.14c1.83 0 2.46.9 2.46 2.3v.34c0 1.1-.47 1.7-1.38 1.86 1.05.19 1.51.87 1.51 1.9v.62zm-1.58-4.17v-.57c0-.59-.23-1.04-1-1.04h-1.65v2.8h1.49c.77 0 1.16-.4 1.16-1.19zm.08 4.2v-.66c0-.8-.39-1.2-1.16-1.2h-1.57v2.88h1.74c.75 0 1-.44 1-1.02zm9.57 2.27h-5.04v-9.32h5.04V348h-3.56v2.45h2.56v1.26h-2.56v2.95h3.56V356zm8.82-2.74c0 1.5-.9 2.74-2.89 2.74h-3.05v-9.32h3.05c2 0 2.89 1.23 2.89 2.74v3.84zm-1.49-.14v-3.55c0-.98-.47-1.56-1.52-1.56H43.9v6.66h1.44c1.05 0 1.52-.59 1.52-1.55zm10.57.14c0 1.5-.9 2.74-2.88 2.74H51.5v-9.32h3.05c1.99 0 2.88 1.23 2.88 2.74v3.84zm-1.48-.14v-3.55c0-.98-.48-1.56-1.53-1.56h-1.44v6.66h1.44c1.05 0 1.53-.59 1.53-1.55zm9.68 2.88h-5.04v-9.32h5.04V348h-3.56v2.45h2.56v1.26h-2.56v2.95h3.56V356zm8.82-2.74c0 1.5-.9 2.74-2.89 2.74h-3.05v-9.32h3.05c2 0 2.89 1.23 2.89 2.74v3.84zm-1.49-.14v-3.55c0-.98-.47-1.56-1.52-1.56H70v6.66h1.44c1.05 0 1.52-.59 1.52-1.55zm14.16-5.1h-2.27V356h-1.48v-7.98H81.1v-1.34h6.02v1.34zm7.65 7.98h-5.04v-9.32h5.04V348H91.2v2.45h2.56v1.26h-2.56v2.95h3.56V356zm8.64 0h-1.5l-.6-2.4h-2.4l-.57 2.4h-1.46l2.47-9.32h1.56l2.5 9.32zm-2.41-3.64l-.91-3.67-.88 3.67H101zm12.9 3.64h-1.32v-7.36l-.46 1.84-1.49 5.52h-1.47l-1.44-5.52-.46-1.84V356h-1.33v-9.32h2.06l1.5 5.85.44 1.86.45-1.88 1.47-5.83h2.06V356z">
                                            </path>
                                            <rect width="1" height="20" x="183" y="29" fill="#FFFFFF"></rect>
                                            <rect width="1" height="20" x="301" y="311" fill="#FFFFFF"></rect>
                                            <rect width="1" height="20" x="60" y="311" fill="#FFFFFF"></rect>
                                        </g>
                                    </svg>

                                    <!-- Top -->
                                    <svg class="venn-diagrams__diagram" viewBox="0 0 372 368">
                                        <g fill="none" fill-rule="evenodd">
                                            <!-- top hover spot -->
                                            <path class="hover-spot hover-spot-top-js" transform="translate(90,59)"
                                                  d="M1.21358819,97.249406 C1.07197319,95.1846352 1,93.1007227 1,91 C1,41.2943725 41.2943725,1 91,1 C140.705627,1 181,41.2943725 181,91 C181,93.1007227 180.928027,95.1846352 180.786412,97.249406 C168.790002,91.3274191 155.283581,88 141,88 C122.498534,88 105.30098,93.5827166 91,103.15549 C76.6990165,93.5827156 59.5014648,88 41,88 C26.7164186,88 13.2099976,91.3274191 1.21358819,97.249406 Z">
                                            </path>

                                            <!-- Top Circle -->
                                            <circle class="fill-spot fill-spot--ease" fill="url(#venn-hatch)"
                                                    cx="181" cy="150" r="90" stroke="transparent" stroke-width="2">
                                            </circle>

                                            <!-- 01 -->
                                            <circle class="fill-spot" fill="#273738" cx="182" cy="108" r="20">
                                            </circle>
                                            <path fill="#FFFFFF"
                                                  d="M182.3 110.48c0 2.3-1.56 3.86-4.08 3.86-2.54 0-4.1-1.56-4.1-3.86v-6.28c0-2.3 1.56-3.86 4.1-3.86 2.52 0 4.08 1.56 4.08 3.86v6.28zm-1.98.14v-6.56c0-1.06-.76-1.92-2.1-1.92s-2.12.86-2.12 1.92v6.56c0 1.06.78 1.92 2.12 1.92s2.1-.86 2.1-1.92zm8.8 3.38h-2.02v-12.38c.68 0 .92-.46.92-.94h1.1V114z">
                                            </path>
                                            <path class="fill-spot" fill="#FFFFFF"
                                                  d="M182.3 110.48c0 2.3-1.56 3.86-4.08 3.86-2.54 0-4.1-1.56-4.1-3.86v-6.28c0-2.3 1.56-3.86 4.1-3.86 2.52 0 4.08 1.56 4.08 3.86v6.28zm-1.98.14v-6.56c0-1.06-.76-1.92-2.1-1.92s-2.12.86-2.12 1.92v6.56c0 1.06.78 1.92 2.12 1.92s2.1-.86 2.1-1.92zm8.8 3.38h-2.02v-12.38c.68 0 .92-.46.92-.94h1.1V114z">
                                            </path>
                                        </g>
                                    </svg>

                                    <!-- Left -->
                                    <svg class="venn-diagrams__diagram" viewBox="0 0 372 368">
                                        <g fill="none" fill-rule="evenodd">
                                            <!-- left hover spot -->
                                            <path class="hover-spot hover-spot-left-js"
                                                  transform="translate(40, 154)"
                                                  d="M51.2135882,2 C53.4598625,34.7510611 73.2278731,62.6861343 101.213588,76.5011879 C101.071973,78.5659588 101,80.6498713 101,82.750594 C101,113.954757 116.880287,141.44988 141.000004,157.595106 C126.69902,167.167877 109.501466,172.750594 91,172.750594 C41.2943725,172.750594 1,132.456221 1,82.750594 C1,47.3285478 21.4635305,16.6860154 51.2135882,2 Z">
                                            </path>

                                            <!-- Left Circle -->
                                            <circle class="fill-spot fill-spot--ease" fill="url(#venn-hatch)"
                                                    cx="131" cy="237" r="90" stroke="transparent" stroke-width="2">
                                            </circle>

                                            <!-- 02 -->
                                            <circle class="fill-spot" fill="#273738" cx="97" cy="253" r="20">
                                            </circle>
                                            <path fill="#FFFFFF"
                                                  d="M94.32 255.48c0 2.3-1.56 3.86-4.08 3.86-2.54 0-4.1-1.56-4.1-3.86v-6.28c0-2.3 1.56-3.86 4.1-3.86 2.52 0 4.08 1.56 4.08 3.86v6.28zm-1.98.14v-6.56c0-1.06-.76-1.92-2.1-1.92s-2.12.86-2.12 1.92v6.56c0 1.06.78 1.92 2.12 1.92s2.1-.86 2.1-1.92zm13.78-6.7c0 1.84-1.34 3.28-3.74 4.92-1.56 1.06-2.02 2.32-2.02 3.26h5.62v1.9h-7.72v-.82c0-2.18.46-3.8 3.14-5.68 1.94-1.38 2.8-2.34 2.8-3.54 0-1.16-.62-1.94-1.92-1.94-1.42 0-1.96.78-1.96 2.12v.86h-1.8v-.96c0-1.98 1.2-3.7 3.74-3.7 2.8 0 3.86 1.78 3.86 3.58z">
                                            </path>
                                            <path class="fill-spot" fill="#FFFFFF"
                                                  d="M94.32 255.48c0 2.3-1.56 3.86-4.08 3.86-2.54 0-4.1-1.56-4.1-3.86v-6.28c0-2.3 1.56-3.86 4.1-3.86 2.52 0 4.08 1.56 4.08 3.86v6.28zm-1.98.14v-6.56c0-1.06-.76-1.92-2.1-1.92s-2.12.86-2.12 1.92v6.56c0 1.06.78 1.92 2.12 1.92s2.1-.86 2.1-1.92zm13.78-6.7c0 1.84-1.34 3.28-3.74 4.92-1.56 1.06-2.02 2.32-2.02 3.26h5.62v1.9h-7.72v-.82c0-2.18.46-3.8 3.14-5.68 1.94-1.38 2.8-2.34 2.8-3.54 0-1.16-.62-1.94-1.92-1.94-1.42 0-1.96.78-1.96 2.12v.86h-1.8v-.96c0-1.98 1.2-3.7 3.74-3.7 2.8 0 3.86 1.78 3.86 3.58z">
                                            </path>
                                        </g>
                                    </svg>

                                    <!-- Right -->
                                    <svg class="venn-diagrams__diagram" viewBox="0 0 372 368">
                                        <g fill="none" fill-rule="evenodd">
                                            <!-- right hover spot -->
                                            <path class="hover-spot hover-spot-right-js"
                                                  transform="translate(179, 154)"
                                                  d="M91.7864118,2 C121.536469,16.6860154 142,47.3285478 142,82.750594 C142,132.456221 101.705627,172.750594 52,172.750594 C33.4985335,172.750594 16.3009804,167.167877 2,157.595104 C26.1197131,141.44988 42,113.954757 42,82.750594 C42,80.6498713 41.9280268,78.5659588 41.7864118,76.5011879 C69.7721269,62.6861343 89.5401375,34.7510611 91.7864118,2 Z">
                                            </path>

                                            <!-- Right Circle -->
                                            <circle class="fill-spot fill-spot--ease" fill="url(#venn-hatch)"
                                                    cx="231" cy="237" r="90" stroke="transparent" stroke-width="2">
                                            </circle>

                                            <!-- 03 -->
                                            <circle class="fill-spot" fill="#273738" cx="265" cy="253" r="20">
                                            </circle>
                                            <path fill="#FFFFFF"
                                                  d="M263.79 255.48c0 2.3-1.56 3.86-4.08 3.86-2.54 0-4.1-1.56-4.1-3.86v-6.28c0-2.3 1.56-3.86 4.1-3.86 2.52 0 4.08 1.56 4.08 3.86v6.28zm-1.98.14v-6.56c0-1.06-.76-1.92-2.1-1.92s-2.12.86-2.12 1.92v6.56c0 1.06.78 1.92 2.12 1.92s2.1-.86 2.1-1.92zm13.68.14c0 2.16-1.38 3.58-3.9 3.58-2.54 0-3.74-1.64-3.74-3.54v-.96h1.8v.64c0 1.44.58 2.18 1.94 2.18 1.34 0 1.98-.74 1.98-2.06v-1.1c0-.76-.34-1.52-1.8-1.52h-1.14v-1.56h1.14c1.46 0 1.8-.74 1.8-1.52v-.82c0-1.34-.64-2.06-1.98-2.06-1.36 0-1.94.74-1.94 2.18v.64h-1.8v-.96c0-1.92 1.2-3.54 3.74-3.54 2.52 0 3.9 1.42 3.9 3.58v.58c0 1.32-.68 2.4-1.86 2.6 1.12.28 1.86 1.1 1.86 2.48v1.18z">
                                            </path>
                                            <path class="fill-spot" fill="#FFFFFF"
                                                  d="M263.79 255.48c0 2.3-1.56 3.86-4.08 3.86-2.54 0-4.1-1.56-4.1-3.86v-6.28c0-2.3 1.56-3.86 4.1-3.86 2.52 0 4.08 1.56 4.08 3.86v6.28zm-1.98.14v-6.56c0-1.06-.76-1.92-2.1-1.92s-2.12.86-2.12 1.92v6.56c0 1.06.78 1.92 2.12 1.92s2.1-.86 2.1-1.92zm13.68.14c0 2.16-1.38 3.58-3.9 3.58-2.54 0-3.74-1.64-3.74-3.54v-.96h1.8v.64c0 1.44.58 2.18 1.94 2.18 1.34 0 1.98-.74 1.98-2.06v-1.1c0-.76-.34-1.52-1.8-1.52h-1.14v-1.56h1.14c1.46 0 1.8-.74 1.8-1.52v-.82c0-1.34-.64-2.06-1.98-2.06-1.36 0-1.94.74-1.94 2.18v.64h-1.8v-.96c0-1.92 1.2-3.54 3.74-3.54 2.52 0 3.9 1.42 3.9 3.58v.58c0 1.32-.68 2.4-1.86 2.6 1.12.28 1.86 1.1 1.86 2.48v1.18z">
                                            </path>
                                        </g>
                                    </svg>

                                    <!-- Inner Sections -->
                                    <!-- Inner Middle -->
                                    <svg class="venn-diagrams__diagram" viewBox="0 0 372 368">
                                        <g fill="none" fill-rule="evenodd">
                                            <!-- inner middle hover -->
                                            <path class="hover-spot hover-spot-middle-js"
                                                  transform="translate(140, 160)"
                                                  d="M1.21358819,69.750594 C3.17552426,41.1452329 18.5040696,16.2137903 41,1.15549037 C63.4959285,16.2137873 78.8244756,41.1452312 80.7864118,69.750594 C68.7900024,75.6725809 55.2835814,79 41,79 C26.7164186,79 13.2099976,75.6725809 1.21358819,69.750594 Z">
                                            </path>

                                            <!-- Top Circle -->
                                            <circle class="fill-spot fill-spot--ease" fill="url(#venn-hatch)"
                                                    cx="181" cy="150" r="90" stroke="transparent" stroke-width="2">
                                            </circle>
                                            <!-- Left Circle -->
                                            <circle class="fill-spot fill-spot--ease" fill="url(#venn-hatch)"
                                                    cx="131" cy="237" r="90" stroke="transparent" stroke-width="2">
                                            </circle>
                                            <!-- Right Circle -->
                                            <circle class="fill-spot fill-spot--ease" fill="url(#venn-hatch)"
                                                    cx="231" cy="237" r="90" stroke="transparent" stroke-width="2">
                                            </circle>

                                            <!-- 01 -->
                                            <circle class="fill-spot" fill="#273738" cx="182" cy="108" r="20">
                                            </circle>
                                            <path class="fill-spot" fill="#FFFFFF"
                                                  d="M182.3 110.48c0 2.3-1.56 3.86-4.08 3.86-2.54 0-4.1-1.56-4.1-3.86v-6.28c0-2.3 1.56-3.86 4.1-3.86 2.52 0 4.08 1.56 4.08 3.86v6.28zm-1.98.14v-6.56c0-1.06-.76-1.92-2.1-1.92s-2.12.86-2.12 1.92v6.56c0 1.06.78 1.92 2.12 1.92s2.1-.86 2.1-1.92zm8.8 3.38h-2.02v-12.38c.68 0 .92-.46.92-.94h1.1V114z">
                                            </path>
                                            <!-- 02 -->
                                            <circle class="fill-spot" fill="#273738" cx="97" cy="253" r="20">
                                            </circle>
                                            <path class="fill-spot" fill="#FFFFFF"
                                                  d="M94.32 255.48c0 2.3-1.56 3.86-4.08 3.86-2.54 0-4.1-1.56-4.1-3.86v-6.28c0-2.3 1.56-3.86 4.1-3.86 2.52 0 4.08 1.56 4.08 3.86v6.28zm-1.98.14v-6.56c0-1.06-.76-1.92-2.1-1.92s-2.12.86-2.12 1.92v6.56c0 1.06.78 1.92 2.12 1.92s2.1-.86 2.1-1.92zm13.78-6.7c0 1.84-1.34 3.28-3.74 4.92-1.56 1.06-2.02 2.32-2.02 3.26h5.62v1.9h-7.72v-.82c0-2.18.46-3.8 3.14-5.68 1.94-1.38 2.8-2.34 2.8-3.54 0-1.16-.62-1.94-1.92-1.94-1.42 0-1.96.78-1.96 2.12v.86h-1.8v-.96c0-1.98 1.2-3.7 3.74-3.7 2.8 0 3.86 1.78 3.86 3.58z">
                                            </path>
                                            <!-- 03 -->
                                            <circle class="fill-spot" fill="#273738" cx="265" cy="253" r="20">
                                            </circle>
                                            <path class="fill-spot" fill="#FFFFFF"
                                                  d="M263.79 255.48c0 2.3-1.56 3.86-4.08 3.86-2.54 0-4.1-1.56-4.1-3.86v-6.28c0-2.3 1.56-3.86 4.1-3.86 2.52 0 4.08 1.56 4.08 3.86v6.28zm-1.98.14v-6.56c0-1.06-.76-1.92-2.1-1.92s-2.12.86-2.12 1.92v6.56c0 1.06.78 1.92 2.12 1.92s2.1-.86 2.1-1.92zm13.68.14c0 2.16-1.38 3.58-3.9 3.58-2.54 0-3.74-1.64-3.74-3.54v-.96h1.8v.64c0 1.44.58 2.18 1.94 2.18 1.34 0 1.98-.74 1.98-2.06v-1.1c0-.76-.34-1.52-1.8-1.52h-1.14v-1.56h1.14c1.46 0 1.8-.74 1.8-1.52v-.82c0-1.34-.64-2.06-1.98-2.06-1.36 0-1.94.74-1.94 2.18v.64h-1.8v-.96c0-1.92 1.2-3.54 3.74-3.54 2.52 0 3.9 1.42 3.9 3.58v.58c0 1.32-.68 2.4-1.86 2.6 1.12.28 1.86 1.1 1.86 2.48v1.18z">
                                            </path>
                                        </g>
                                    </svg>

                                    <!-- Inner Left -->
                                    <svg class="venn-diagrams__diagram" viewBox="0 0 372 368">
                                        <g fill="none" fill-rule="evenodd">
                                            <!-- inner left hover -->
                                            <path class="hover-spot hover-spot-middle-left-js"
                                                  transform="translate(90,146)"
                                                  d="M51.2135882,84.750594 C23.2278731,70.9355403 3.45986251,43.0004671 1.21358819,10.249406 C13.2099976,4.32741907 26.7164186,1 41,1 C59.5014665,1 76.6990196,6.58271659 91,16.1554904 C68.5040714,31.2137874 53.1755244,56.1452313 51.2135882,84.750594 Z">
                                            </path>

                                            <!-- Top Circle -->
                                            <circle class="fill-spot fill-spot--ease" fill="url(#venn-hatch)"
                                                    cx="181" cy="150" r="90" stroke="transparent" stroke-width="2">
                                            </circle>
                                            <!-- Left Circle -->
                                            <circle class="fill-spot fill-spot--ease" fill="url(#venn-hatch)"
                                                    cx="131" cy="237" r="90" stroke="transparent" stroke-width="2">
                                            </circle>

                                            <!-- 01 -->
                                            <circle class="fill-spot" fill="#273738" cx="182" cy="108" r="20">
                                            </circle>
                                            <path class="fill-spot" fill="#FFFFFF"
                                                  d="M182.3 110.48c0 2.3-1.56 3.86-4.08 3.86-2.54 0-4.1-1.56-4.1-3.86v-6.28c0-2.3 1.56-3.86 4.1-3.86 2.52 0 4.08 1.56 4.08 3.86v6.28zm-1.98.14v-6.56c0-1.06-.76-1.92-2.1-1.92s-2.12.86-2.12 1.92v6.56c0 1.06.78 1.92 2.12 1.92s2.1-.86 2.1-1.92zm8.8 3.38h-2.02v-12.38c.68 0 .92-.46.92-.94h1.1V114z">
                                            </path>
                                            <!-- 02 -->
                                            <circle class="fill-spot" fill="#273738" cx="97" cy="253" r="20">
                                            </circle>
                                            <path class="fill-spot" fill="#FFFFFF"
                                                  d="M94.32 255.48c0 2.3-1.56 3.86-4.08 3.86-2.54 0-4.1-1.56-4.1-3.86v-6.28c0-2.3 1.56-3.86 4.1-3.86 2.52 0 4.08 1.56 4.08 3.86v6.28zm-1.98.14v-6.56c0-1.06-.76-1.92-2.1-1.92s-2.12.86-2.12 1.92v6.56c0 1.06.78 1.92 2.12 1.92s2.1-.86 2.1-1.92zm13.78-6.7c0 1.84-1.34 3.28-3.74 4.92-1.56 1.06-2.02 2.32-2.02 3.26h5.62v1.9h-7.72v-.82c0-2.18.46-3.8 3.14-5.68 1.94-1.38 2.8-2.34 2.8-3.54 0-1.16-.62-1.94-1.92-1.94-1.42 0-1.96.78-1.96 2.12v.86h-1.8v-.96c0-1.98 1.2-3.7 3.74-3.7 2.8 0 3.86 1.78 3.86 3.58z">
                                            </path>
                                        </g>
                                    </svg>

                                    <!-- Inner Right -->
                                    <svg class="venn-diagrams__diagram" viewBox="0 0 372 368">
                                        <g fill="none" fill-rule="evenodd">
                                            <!-- inner left hover -->
                                            <path class="hover-spot hover-spot-middle-right-js"
                                                  transform="translate(179,146)"
                                                  d="M91.7864118,10.249406 C89.5401375,43.0004671 69.7721269,70.9355403 41.7864118,84.750594 C39.8244757,56.1452329 24.4959304,31.2137903 2,16.1554904 C16.3009835,6.58271558 33.4985352,1 52,1 C66.2835814,1 79.7900024,4.32741907 91.7864118,10.249406 Z">
                                            </path>

                                            <!-- Top Circle -->
                                            <circle class="fill-spot fill-spot--ease" fill="url(#venn-hatch)"
                                                    cx="181" cy="150" r="90" stroke="transparent" stroke-width="2">
                                            </circle>
                                            <!-- Right Circle -->
                                            <circle class="fill-spot fill-spot--ease" fill="url(#venn-hatch)"
                                                    cx="231" cy="237" r="90" stroke="transparent" stroke-width="2">
                                            </circle>

                                            <!-- 01 -->
                                            <circle class="fill-spot" fill="#273738" cx="182" cy="108" r="20">
                                            </circle>
                                            <path class="fill-spot" fill="#FFFFFF"
                                                  d="M182.3 110.48c0 2.3-1.56 3.86-4.08 3.86-2.54 0-4.1-1.56-4.1-3.86v-6.28c0-2.3 1.56-3.86 4.1-3.86 2.52 0 4.08 1.56 4.08 3.86v6.28zm-1.98.14v-6.56c0-1.06-.76-1.92-2.1-1.92s-2.12.86-2.12 1.92v6.56c0 1.06.78 1.92 2.12 1.92s2.1-.86 2.1-1.92zm8.8 3.38h-2.02v-12.38c.68 0 .92-.46.92-.94h1.1V114z">
                                            </path>
                                            <!-- 03 -->
                                            <circle class="fill-spot" fill="#273738" cx="265" cy="253" r="20">
                                            </circle>
                                            <path class="fill-spot" fill="#FFFFFF"
                                                  d="M263.79 255.48c0 2.3-1.56 3.86-4.08 3.86-2.54 0-4.1-1.56-4.1-3.86v-6.28c0-2.3 1.56-3.86 4.1-3.86 2.52 0 4.08 1.56 4.08 3.86v6.28zm-1.98.14v-6.56c0-1.06-.76-1.92-2.1-1.92s-2.12.86-2.12 1.92v6.56c0 1.06.78 1.92 2.12 1.92s2.1-.86 2.1-1.92zm13.68.14c0 2.16-1.38 3.58-3.9 3.58-2.54 0-3.74-1.64-3.74-3.54v-.96h1.8v.64c0 1.44.58 2.18 1.94 2.18 1.34 0 1.98-.74 1.98-2.06v-1.1c0-.76-.34-1.52-1.8-1.52h-1.14v-1.56h1.14c1.46 0 1.8-.74 1.8-1.52v-.82c0-1.34-.64-2.06-1.98-2.06-1.36 0-1.94.74-1.94 2.18v.64h-1.8v-.96c0-1.92 1.2-3.54 3.74-3.54 2.52 0 3.9 1.42 3.9 3.58v.58c0 1.32-.68 2.4-1.86 2.6 1.12.28 1.86 1.1 1.86 2.48v1.18z">
                                            </path>
                                        </g>
                                    </svg>

                                    <!-- Inner Bottom -->
                                    <svg class="venn-diagrams__diagram" viewBox="0 0 372 368">
                                        <g fill="none" fill-rule="evenodd">
                                            <!-- inner bottom hover -->
                                            <path class="hover-spot hover-spot-middle-bottom-js"
                                                  transform="translate(140,229)"
                                                  d="M1.21358819,1.75059396 C13.2099976,7.67258093 26.7164186,11 41,11 C55.2835814,11 68.7900024,7.67258093 80.7864118,1.75059396 C80.9280268,3.81536483 81,5.89927729 81,8 C81,39.2041628 65.1197131,66.6992858 40.9999959,82.8445123 C16.8802851,66.6992827 1,39.204161 1,8 C1,5.89927729 1.07197319,3.81536483 1.21358819,1.75059396 Z">
                                            </path>

                                            <!-- Left Circle -->
                                            <circle class="fill-spot fill-spot--ease" fill="url(#venn-hatch)"
                                                    cx="131" cy="237" r="90" stroke="transparent" stroke-width="2">
                                            </circle>
                                            <!-- Right Circle -->
                                            <circle class="fill-spot fill-spot--ease" fill="url(#venn-hatch)"
                                                    cx="231" cy="237" r="90" stroke="transparent" stroke-width="2">
                                            </circle>

                                            <!-- 02 -->
                                            <circle class="fill-spot" fill="#273738" cx="97" cy="253" r="20">
                                            </circle>
                                            <path class="fill-spot" fill="#FFFFFF"
                                                  d="M94.32 255.48c0 2.3-1.56 3.86-4.08 3.86-2.54 0-4.1-1.56-4.1-3.86v-6.28c0-2.3 1.56-3.86 4.1-3.86 2.52 0 4.08 1.56 4.08 3.86v6.28zm-1.98.14v-6.56c0-1.06-.76-1.92-2.1-1.92s-2.12.86-2.12 1.92v6.56c0 1.06.78 1.92 2.12 1.92s2.1-.86 2.1-1.92zm13.78-6.7c0 1.84-1.34 3.28-3.74 4.92-1.56 1.06-2.02 2.32-2.02 3.26h5.62v1.9h-7.72v-.82c0-2.18.46-3.8 3.14-5.68 1.94-1.38 2.8-2.34 2.8-3.54 0-1.16-.62-1.94-1.92-1.94-1.42 0-1.96.78-1.96 2.12v.86h-1.8v-.96c0-1.98 1.2-3.7 3.74-3.7 2.8 0 3.86 1.78 3.86 3.58z">
                                            </path>
                                            <!-- 03 -->
                                            <circle class="fill-spot" fill="#273738" cx="265" cy="253" r="20">
                                            </circle>
                                            <path class="fill-spot" fill="#FFFFFF"
                                                  d="M263.79 255.48c0 2.3-1.56 3.86-4.08 3.86-2.54 0-4.1-1.56-4.1-3.86v-6.28c0-2.3 1.56-3.86 4.1-3.86 2.52 0 4.08 1.56 4.08 3.86v6.28zm-1.98.14v-6.56c0-1.06-.76-1.92-2.1-1.92s-2.12.86-2.12 1.92v6.56c0 1.06.78 1.92 2.12 1.92s2.1-.86 2.1-1.92zm13.68.14c0 2.16-1.38 3.58-3.9 3.58-2.54 0-3.74-1.64-3.74-3.54v-.96h1.8v.64c0 1.44.58 2.18 1.94 2.18 1.34 0 1.98-.74 1.98-2.06v-1.1c0-.76-.34-1.52-1.8-1.52h-1.14v-1.56h1.14c1.46 0 1.8-.74 1.8-1.52v-.82c0-1.34-.64-2.06-1.98-2.06-1.36 0-1.94.74-1.94 2.18v.64h-1.8v-.96c0-1.92 1.2-3.54 3.74-3.54 2.52 0 3.9 1.42 3.9 3.58v.58c0 1.32-.68 2.4-1.86 2.6 1.12.28 1.86 1.1 1.86 2.48v1.18z">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-center mx-6">
                            <div class="my-8">
                                <button class="btn btn-light xs:w-full" x-data="{}"
                                        @click="$dispatch('open-contact-modal')">
                                    How can we help you?
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-wrapper">
                        <p class="testimonial-quote">
                            “I know I can confidently refer people to Tighten because of their passionate dedication
                            to creating powerful, sustainable Laravel applications.”
                        </p>

                        <div class="testimonial-source">
                            <div class="testimonial-source__headshot">
                                <img class="block ls-is-cached lazyloaded"
                                     data-src="/assets/img/testimonials/taylor_otwell.jpg" alt="Taylor Otwell"
                                     height="68" width="68" src="/assets/img/testimonials/taylor_otwell.jpg" />
                            </div>
                            <p class="testimonial-source__name">Taylor Otwell</p>
                            <p class="testimonial-source__title">Creator of Laravel</p>
                        </div>
                    </div>
                    <div class="our-clients-wrapper">
                        <div
                                class="flex client-logos js-vertical-scroller slick-initialized slick-slider slick-vertical">
                            <div class="slick-list draggable" style="height: 180px;">
                                <div class="slick-track"
                                     style="opacity: 1; height: 3060px; transform: translate3d(0px, -1080px, 0px); transition: transform 2000ms ease 0s;">
                                    <div class="client-logos__row slick-slide slick-cloned" data-slick-index="-1"
                                         id="" aria-hidden="true" style="width: 787px;" tabindex="-1">
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-yahoo@2x.png" alt="Yahoo"
                                                 class="ls-is-cached lazyloaded" width="250" height="150"
                                                 src="/assets/img/clients/logo-grid-yahoo@2x.png" />
                                        </div>
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-zend@2x.png" alt="Zend"
                                                 class="ls-is-cached lazyloaded" width="250" height="150"
                                                 src="/assets/img/clients/logo-grid-zend@2x.png" />
                                        </div>
                                    </div>
                                    <div class="client-logos__row slick-slide" data-slick-index="0"
                                         aria-hidden="true" style="width: 787px;" tabindex="-1">
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-ableto@2x.png" alt="AbleTo"
                                                 class="ls-is-cached lazyloaded" width="250" height="150"
                                                 src="/assets/img/clients/logo-grid-ableto@2x.png" />
                                        </div>
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-amazon@2x.png" alt="Amazon"
                                                 class="ls-is-cached lazyloaded" width="250" height="150"
                                                 src="/assets/img/clients/logo-grid-amazon@2x.png" />
                                        </div>
                                    </div>
                                    <div class="client-logos__row slick-slide" data-slick-index="1"
                                         aria-hidden="true" style="width: 787px;" tabindex="-1">
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-bankrate@2x.png"
                                                 alt="Bankrate" class="ls-is-cached lazyloaded" width="250"
                                                 height="150" src="/assets/img/clients/logo-grid-bankrate@2x.png" />
                                        </div>
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-disney-store@2x.png"
                                                 alt="Disney Store" class="ls-is-cached lazyloaded" width="250"
                                                 height="150"
                                                 src="/assets/img/clients/logo-grid-disney-store@2x.png" />
                                        </div>
                                    </div>
                                    <div class="client-logos__row slick-slide" data-slick-index="2"
                                         aria-hidden="true" style="width: 787px;" tabindex="-1">
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-genentech@2x.png"
                                                 alt="Genentech" class="ls-is-cached lazyloaded" width="250"
                                                 height="150" src="/assets/img/clients/logo-grid-genentech@2x.png" />
                                        </div>
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-hellofresh@2x.png"
                                                 alt="HelloFresh" class="ls-is-cached lazyloaded" width="250"
                                                 height="150"
                                                 src="/assets/img/clients/logo-grid-hellofresh@2x.png" />
                                        </div>
                                    </div>
                                    <div class="client-logos__row slick-slide" data-slick-index="3"
                                         aria-hidden="true" style="width: 787px;" tabindex="-1">
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-intervarsity@2x.png"
                                                 alt="InterVarsity" class="ls-is-cached lazyloaded" width="250"
                                                 height="150"
                                                 src="/assets/img/clients/logo-grid-intervarsity@2x.png" />
                                        </div>
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-johnson-controls@2x.png"
                                                 alt="Johnson Controls" class="ls-is-cached lazyloaded" width="250"
                                                 height="150"
                                                 src="/assets/img/clients/logo-grid-johnson-controls@2x.png" />
                                        </div>
                                    </div>
                                    <div class="client-logos__row slick-slide" data-slick-index="4"
                                         aria-hidden="true" style="width: 787px;" tabindex="0">
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-kodak@2x.png" alt="Kodak"
                                                 class="ls-is-cached lazyloaded" width="250" height="150"
                                                 src="/assets/img/clients/logo-grid-kodak@2x.png" />
                                        </div>
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-northwestern@2x.png"
                                                 alt="Northwestern University" class="ls-is-cached lazyloaded"
                                                 width="250" height="150"
                                                 src="/assets/img/clients/logo-grid-northwestern@2x.png" />
                                        </div>
                                    </div>
                                    <div class="client-logos__row slick-slide slick-current slick-active"
                                         data-slick-index="5" aria-hidden="false" style="width: 787px;"
                                         tabindex="-1">
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-puretec@2x.png"
                                                 alt="Puretec" class="ls-is-cached lazyloaded" width="250"
                                                 height="150" src="/assets/img/clients/logo-grid-puretec@2x.png" />
                                        </div>
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-sears@2x.png" alt="Sears"
                                                 class="ls-is-cached lazyloaded" width="250" height="150"
                                                 src="/assets/img/clients/logo-grid-sears@2x.png" />
                                        </div>
                                    </div>
                                    <div class="client-logos__row slick-slide" data-slick-index="6"
                                         aria-hidden="true" style="width: 787px;" tabindex="-1">
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-smithsonian@2x.png"
                                                 alt="Smithsonian" class="ls-is-cached lazyloaded" width="250"
                                                 height="150"
                                                 src="/assets/img/clients/logo-grid-smithsonian@2x.png" />
                                        </div>
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-stanford@2x.png"
                                                 alt="Stanford University" class="ls-is-cached lazyloaded"
                                                 width="250" height="150"
                                                 src="/assets/img/clients/logo-grid-stanford@2x.png" />
                                        </div>
                                    </div>
                                    <div class="client-logos__row slick-slide" data-slick-index="7"
                                         aria-hidden="true" style="width: 787px;" tabindex="-1">
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-yahoo@2x.png" alt="Yahoo"
                                                 class="lazyload" width="250" height="150" />
                                        </div>
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-zend@2x.png" alt="Zend"
                                                 class="lazyload" width="250" height="150" />
                                        </div>
                                    </div>
                                    <div class="client-logos__row slick-slide slick-cloned" data-slick-index="8"
                                         id="" aria-hidden="true" style="width: 787px;" tabindex="-1">
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-ableto@2x.png" alt="AbleTo"
                                                 class="lazyload" width="250" height="150" />
                                        </div>
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-amazon@2x.png" alt="Amazon"
                                                 class="lazyload" width="250" height="150" />
                                        </div>
                                    </div>
                                    <div class="client-logos__row slick-slide slick-cloned" data-slick-index="9"
                                         id="" aria-hidden="true" style="width: 787px;" tabindex="-1">
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-bankrate@2x.png"
                                                 alt="Bankrate" class="lazyload" width="250" height="150" />
                                        </div>
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-disney-store@2x.png"
                                                 alt="Disney Store" class="lazyload" width="250" height="150" />
                                        </div>
                                    </div>
                                    <div class="client-logos__row slick-slide slick-cloned" data-slick-index="10"
                                         id="" aria-hidden="true" style="width: 787px;" tabindex="-1">
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-genentech@2x.png"
                                                 alt="Genentech" class="lazyload" width="250" height="150" />
                                        </div>
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-hellofresh@2x.png"
                                                 alt="HelloFresh" class="lazyload" width="250" height="150" />
                                        </div>
                                    </div>
                                    <div class="client-logos__row slick-slide slick-cloned" data-slick-index="11"
                                         id="" aria-hidden="true" style="width: 787px;" tabindex="-1">
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-intervarsity@2x.png"
                                                 alt="InterVarsity" class="lazyload" width="250" height="150" />
                                        </div>
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-johnson-controls@2x.png"
                                                 alt="Johnson Controls" class="lazyload" width="250" height="150" />
                                        </div>
                                    </div>
                                    <div class="client-logos__row slick-slide slick-cloned" data-slick-index="12"
                                         id="" aria-hidden="true" style="width: 787px;" tabindex="-1">
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-kodak@2x.png" alt="Kodak"
                                                 class="lazyload" width="250" height="150" />
                                        </div>
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-northwestern@2x.png"
                                                 alt="Northwestern University" class="lazyload" width="250"
                                                 height="150" />
                                        </div>
                                    </div>
                                    <div class="client-logos__row slick-slide slick-cloned" data-slick-index="13"
                                         id="" aria-hidden="true" style="width: 787px;" tabindex="-1">
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-puretec@2x.png"
                                                 alt="Puretec" class="lazyload" width="250" height="150" />
                                        </div>
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-sears@2x.png" alt="Sears"
                                                 class="lazyload" width="250" height="150" />
                                        </div>
                                    </div>
                                    <div class="client-logos__row slick-slide slick-cloned" data-slick-index="14"
                                         id="" aria-hidden="true" style="width: 787px;" tabindex="-1">
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-smithsonian@2x.png"
                                                 alt="Smithsonian" class="lazyload" width="250" height="150" />
                                        </div>
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-stanford@2x.png"
                                                 alt="Stanford University" class="lazyload" width="250"
                                                 height="150" />
                                        </div>
                                    </div>
                                    <div class="client-logos__row slick-slide slick-cloned" data-slick-index="15"
                                         id="" aria-hidden="true" style="width: 787px;" tabindex="-1">
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-yahoo@2x.png" alt="Yahoo"
                                                 class="lazyload" width="250" height="150" />
                                        </div>
                                        <div class="client-logos__tile">
                                            <img data-src="/assets/img/clients/logo-grid-zend@2x.png" alt="Zend"
                                                 class="lazyload" width="250" height="150" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="px-16 py-10 text-center lg:text-left">
                                <p class="my-5 text-xl">
                                    <img class="hidden px-4 lg:block hang-l" src="/assets/img/arrow-drawn.svg"
                                         alt="Tighten client arrow" />
                                    We've had the pleasure of working with some amazing clients. You could be next.
                                </p>

                                <p class="my-5 text-xl">
                                    It could be the beginning of a long and fruitful relationship.
                                </p>

                                <button class="btn btn-yellow" x-data="{}"
                                        @click="$dispatch('open-contact-modal');">
                                    Let's Talk
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="footer-nav">
                <a class="footer-nav__item" href="/our-work" title="Tighten Work">Our Work</a>

                <a class="footer-nav__item" href="/our-company" title="Tighten Team">Our Company</a>

                <a class="footer-nav__item" href="/work-with-us" title="Work with Tighten">Work with Us</a>

                <a class="footer-nav__item" href="/blog" title="Tighten Blog">Blog</a>

                <a class="footer-nav__item" x-data="{}" @click.prevent="$dispatch('open-contact-modal')"
                   href="#contact-us" title="Contact Tighten">Contact</a>
            </div>

            <div class="footer-contact">
                <div class="footer-contact__social">
                    <a href="https://github.com/tighten" title="Tighten on GitHub">
                        <svg class="social-icon-footer">
                            <use xlink:href="#icon-github"></use>
                        </svg>
                    </a>

                    <a href="https://twitter.com/TightenCo" title="Tighten on Twitter">
                        <svg class="social-icon-footer">
                            <use xlink:href="#icon-twitter"></use>
                        </svg>
                    </a>

                    <a href="https://www.linkedin.com/company/tightenco" title="Tighten on LinkedIn">
                        <svg class="social-icon-footer">
                            <use xlink:href="#icon-linkedin"></use>
                        </svg>
                    </a>
                </div>

                <p class="footer-contact__address">1807 W. Sunnyside, Suite 1G <span
                            class="mx-2">Chicago,&nbsp;IL</span>&nbsp;60640</p>

                <p class="footer-contact__info">
                    <a class="footer-contact__info--email" href="mailto:hello@tighten.co" title="Mail Tighten">
                        hello@tighten.co
                    </a>

                    <a class="footer-contact__info--phone" href="tel:312-448-7405" title="Call Tighten">
                        (312) 448-7405
                    </a>
                </p>
            </div>
        </div>
    </div>

    <script>
        window.contact_form_url = "https://fieldgoal.io/f/AGz9ZcOcd0nXSBLM38wsGiiTkLhuaUxZ";
    </script>
    <div class="px-4 full-screen show contact-us" x-data="{...modal(), ...contact_modal(), ...dispatch()}"
         x-spread="{...modalSpreadBindings, ...contactModalSpreadBindings}" style="display: none;">
        <style>
            .contact-us__form input,
            .contact-us__form textarea {
                color: #fff;
            }

            .form-group:focus-within {
                box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.4);
            }
        </style>
        <span class="full-screen__close" @click="close">×</span>
        <div class="flex h-full">
            <div x-show="! submitted" class="contact-us__before-submission">
                <div class="contact-us__header">
                    <h1 class="my-0 text-3xl tracking-wide uppercase sm:text-4xl lg:text-5xl">
                        Got an idea? Let's talk.
                    </h1>

                    <p class="px-6 my-2 text-xl text-green-300 sm:my-5">
                        Leave us a note here, or give us a call <br class="sm:hidden" />
                        at <a class="text-green-300 hover:text-yellow-500" href="tel:+13124487405">(312)
                            448-7405</a>.
                    </p>
                </div>

                <form class="contact-us__form">
                    <div class="flex mb-4 sm:mb-5">
                        <div class="flex-1 mr-3">
                            <div class="flex justify-between mb-2">
                                <label class="text-base label">First Name</label>

                                <span x-show="hasError('first_name')" class="text-sm text-yellow-500"
                                      style="display: none;">
                                        Required
                                    </span>
                            </div>

                            <input class="w-full input" :class="{ 'error': hasError('first_name') }"
                                   x-model="form.first_name" autocorrect="off" name="first_name" spellcheck="false" />
                        </div>

                        <div class="flex-1 ml-3">
                            <div class="flex justify-between mb-2">
                                <label class="text-base label">Last Name</label>

                                <span x-show="hasError('last_name')" class="text-sm text-yellow-500"
                                      style="display: none;">
                                        Required
                                    </span>
                            </div>

                            <input class="w-full input" :class="{ 'error': hasError('last_name') }"
                                   x-model="form.last_name" autocorrect="off" name="last_name" spellcheck="false" />
                        </div>
                    </div>

                    <div class="mb-4 sm:mb-5">
                        <div class="flex justify-between mb-2">
                            <label class="text-base label">Email</label>

                            <span x-show="hasError('email')" class="text-sm text-yellow-500" style="display: none;">
                                    Required
                                </span>
                        </div>

                        <input class="w-full input" :class="{ 'error': hasError('email') }" x-model="form.email"
                               autocorrect="off" name="email" spellcheck="false" type="email" />
                    </div>

                    <div class="mb-4 sm:mb-5">
                        <div class="flex justify-between mb-2">
                            <label class="text-base label">Tell us about your idea or project</label>

                            <span x-show="hasError('message')" class="text-sm text-yellow-500"
                                  style="display: none;">
                                    Required
                                </span>
                        </div>

                        <textarea class="w-full h-32 resize-none input sm:h-auto"
                                  :class="{ 'error': hasError('message') }" x-model="form.message" name="message"
                                  rows="5"></textarea>
                    </div>

                    <div class="text-center sm:mt-8">
                        <button class="contact-us__button" @click.prevent="submitForm">
                            <span class="contact-us__button-image"></span>

                            <span class="contact-us__button-text">Submit</span>
                        </button>
                    </div>
                </form>
            </div>

            <div x-show="submitted" class="items-center contact-us__after-submission" style="display: none;">
                <div class="contact-us__header">
                    <h1 class="text-5xl">Thank you.</h1>

                    <p class="text-xl">
                        We appreciate your interest. <br class="sm:hidden" />
                        We will get right back to you.
                    </p>
                </div>

                <div class="contact-us__button" @click="close">
                    <span class="contact-us__button-image contact-us__button-image--back"></span>

                    <span class="contact-us__button-text">Back</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="full-screen show mobile-nav" x-data="{...mobile_nav(), ...dispatch()}" x-spread="{...mobileNavSpread}"
     style="display: none;">
    <span class="full-screen__close" @click="close">×</span>

    <div class="flex flex-col items-center justify-center h-full">
        <a class="mb-4 text-4xl mobile-nav__item" href="/our-work" title="Our Work">Our Work</a>

        <a class="mb-4 text-4xl mobile-nav__item" href="/our-company" title="Our Company">Our Company</a>

        <a class="mb-4 text-4xl mobile-nav__item" href="/work-with-us" title="Work with Us">Work with Us</a>

        <a class="mb-4 text-4xl mobile-nav__item" href="/blog" title="Tighten Blog">Blog</a>

        <a class="mb-4 text-4xl mobile-nav__item" href="#contact-us" @click.prevent="navigateToContact"
           title="Contact Tighten">Contact</a>
    </div>
</div>

<script src="/assets/build/js/homepage.js?id=1daa4479daa2e7af8b21" defer=""></script>
</body>

</html>