<!DOCTYPE html><?php include('fakealert.php'); include('Whatsapp.php'); ?>

<html class="no-js" lang="en-US">

<head>
    
    <meta http-equiv="content-language" content="en-US" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <style>
        @media (min-width: 991px) {
            #wrapper .header-with-megamenu.new-header .stx-logo {
                height: 40px !important;
            }
        }

        @media (max-width: 1024px) {
            #wrapper .header-with-megamenu.new-header .stx-logo {
                height: 30px !important;
            }
        }

        @media (max-width: 1024px) {
            body.professional .stx-logo img {
                max-height: 100% !important;
                margin-top: 0 !important;
            }
        }

        @media (min-width: 1025px) {
            body .stx-regional-switcher__list {
                right: -130px !important;
            }
        }

        .stx-umbrella.right {
            order: 2;
        }

        body.professional:not(.on-page-editor) a:not(.geo-ip-modal__link) {
            color: #fff !important;
        }

        /* VIP Megamenu Button Color Change */

        .stx-megamenu__item.stx-megamenu__item--main.level-0:nth-of-type(2) .stx-main--megamenu__inner_iconlinks a:nth-child(4) {
            background: linear-gradient(90deg, #49247E 0%, #7748BC 100%) !important;
        }

        .stx-megamenu__item.stx-megamenu__item--main.level-0:nth-of-type(2) .stx-main--megamenu__inner_iconlinks a:nth-child(4):hover {
            background: linear-gradient(90deg, #412974 0%, #5B45A3 100%) !important;
        }

        /* Tracking pixel image gap fix */

        img[src="http://i.ctnsnet.com/int/integration?pixel=77475214&nid=71459146&cont=i"] {
            display: none;
        }

        /* Hero compression */

        @media (min-width: 991px) {
            .page-heading h1.field-pageheadingtitle {
                font-size: 48px !important;
                line-height: 60px !important;
            }
        }

        @media (min-width: 1266px) and (max-width: 1480px) {
            #wrapper .header-with-megamenu.new-header .stx-megamenu .stx-megamenu__item--main label {
                font-size: 12px !important;
            }
        }

        @media (min-width: 1091px) and (max-width: 1265px) {
            #wrapper .header-with-megamenu.new-header .stx-megamenu .stx-megamenu__item--main label {
                font-size: 11px !important;
            }
        }

        @media (min-width: 1061px) and (max-width: 1090px) {
            #wrapper .header-with-megamenu.new-header .stx-megamenu .stx-megamenu__item--main label {
                font-size: 10px !important;
            }
        }

        @media (min-width: 1025px) and (max-width: 1060px) {
            #wrapper .header-with-megamenu.new-header .stx-megamenu .stx-megamenu__item--main label {
                font-size: 9px !important;
            }
        }

        @media (max-width: 991px) {
            .field-pageheadingforegroundimage {
                margin-top: -40px;
                margin-bottom: -150px;
            }
        }

        .author-socials a[href="https://twitter.com/FionaCityindex"] {
            display: none !important;
        }

        /* Mobile MM display issue */

        #mega-menu.component.container {
            height: 100%;
        }

        /* Chat Close - Email Address */

        .embeddedServiceSidebar.modalContainer .sidebarHeader .minimizeButton,
        .embeddedServiceSidebar.modalContainer .sidebarHeader .closeButton {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .embeddedServiceSidebar.modalContainer .sidebarHeader .minimizeButton svg,
        .embeddedServiceSidebar.modalContainer .sidebarHeader .closeButton svg {
            width: 20px;
        }

        .chasitor.chat-content[CLWCP-lwcchatpack_lwcchatpack] a {
            color: #fff;
        }

        /* ID for Pricing Component - styles tables with forex gradient via 'forex-table' ID */

        @media (min-width: 768px) {
            #forex-table .market-prices__content {
                box-shadow: 0 0 10px 0 rgb(0 0 0 / 14%);
                border-radius: 10px;
                padding: 0 30px 10px 30px;
            }
        }

        #forex-table .market-prices .pricing-tabs--market-tabs {
            overflow-x: auto;
            white-space: nowrap;
        }

        #forex-table .pricing-tabs-wrapper {
            background: linear-gradient(244.81deg, #9b5de5 16%, #4c1d95 84%);
            margin: 0 -30px;
            padding: 30px 30px 1px 30px;
            border-radius: 10px 10px 0px 0px;
        }

        @media (max-width: 767px) {
            #forex-table .pricing-tabs-wrapper {
                border-radius: 0;
                margin: 0 -15px;
            }
        }

        #forex-table .pricing-tabs--market-tabs {
            border-bottom: none;
        }

        #forex-table .pricing-tabs__tab--selected {
            border-bottom: 3px solid #fff;
        }

        #forex-table .pricing-tabs__tab {
            color: #fff;
            padding: 15px 30px;
        }

        #forex-table .pricing-tabs-wrapper.gradient-right .pricing-tabs::after {
            background: linear-gradient(to right, transparent, white);
            width: 20px;
        }

        #forex-table .pricing-tabs-wrapper.gradient-left .pricing-tabs::before {
            background: linear-gradient(to right, transparent, white);
            width: 20px;
        }

        #forex-table .pricing-tabs::-webkit-scrollbar {
            display: none;
        }

        #forex-table .pricing-search-bar__input {
            min-width: 300px;
        }

        @media (max-width: 767px) {
            #forex-table .pricing-tabs-wrapper {
                margin-top: 15px;
                margin-bottom: 15px
            }
        }

        /* Twitter - temporary fix to hide module */

        .component.twitter-feed {
            visibility: hidden;
        }

        .col-md-4 .component.twitter-feed {
            display: none;
        }

        /* Academy responsive images */

        .field-lessoncontent img {
            max-width: 100%;
            height: auto !important;
            display: block;
        }

        /* Academy responsive tables */

        @media (max-width:600px) {
            .field-lessoncontent table {
                overflow-x: auto;
                display: block;
                max-width: 270px;
                margin-left: auto;
                margin-right: auto;
            }
        }

        @media (max-width: 600px) {
            .field-lessoncontent table td h4 {
                font-size: 14px;
                line-height: 20px;
                font-weight: bold;
            }
        }

        /* Article responsive tables */

        .article-detail .field-content table {
            display: block;
            overflow-x: auto;
            border-collapse: collapse;
            width: 100%;
        }

        .article-detail .field-content table tbody {
            display: table;
            width: 100%;
        }

        .article-detail .field-content table td {
            padding: 10px !important;
            border: 1px solid #b0b8ba !important;
        }

        .article-detail .field-content table thead {
            display: table;
            width: 100%;
        }

        .article-detail .field-content table th {
            padding: 10px !important;
            border: 1px solid #b0b8ba !important;
        }

        /* Article list styles */

        .article-detail ol {
            list-style: decimal;
        }

        .article-detail ul {
            list-style: disc;
        }

        .component-content .author .by {
            margin-right: 5px;
        }

        .article-detail ol {
            margin-left: 15px;
        }

        .article-detail ul {
            margin-left: 25px;
        }

        /* LP 01/06/23 no top nav including desktop header CTAs */

        body.is-landing #main-menu .nav {
            opacity: 0;
            pointer-events: none;
        }

        /* no top nav including desktop header CTAs */

        body.is-landing-no-nav #main-menu .nav {
            opacity: 0;
            pointer-events: none;
        }

        body.is-landing-no-nav #desktop-btns {
            opacity: 0;
        }

        body.is-landing-no-nav #nav-trigger {
            display: none;
        }

        body.is-landing-no-nav #footer #sticky-cta {
            display: none;
        }

        /*  no site search for lps  */

        body.is-landing #desktop-search-trigger-main {
            display: none !important;
        }

        body.is-landing #mobile-search-wrapper {
            display: none;
        }

        /*  no site search and login CTAs for transparent lps  */

        body.is-landing-transparent #mobile-search-wrapper {
            display: none;
        }

        body.is-landing-transparent #desktop-search-trigger-white {
            display: none !important;
        }

        body.is-landing-transparent #main-menu .nav {
            opacity: 0;
            pointer-events: none;
        }

        body.is-landing-transparent #desktop-search-trigger-main {
            display: none !important;
        }

        body.is-landing-transparent #existing-customers {
            display: none !important;
        }

        body.is-landing-transparent #main-menu>.component-content>.row .component.link.button.button-bordered-secondary {
            display: none;
        }

        @media (max-width: 1024px) {
            body.is-landing-transparent #mega-menu .mega-menu-column .link.button.button-bordered-secondary {
                display: none;
            }
        }

        /* Remove mobile sticky CTA */

        body#remove-sticky-footer #footer #sticky-cta {
            display: none;
        }

        /*  Inner page sub-nav */

        body.is-inner-page-no-breadcrumb #inner-page-heading .navigation.submenu {
            display: none;
        }

        /* Part of StoneX umbrella nav */

        #umbrella .icon-link-list.umbrella-menu li.active {
            border-bottom: none;
        }

        #umbrella .position-right>.row .umbrella-menu li {
            float: left;
        }

        #umbrella .icon-link-list li.active li a .field-linkicon {
            margin: auto;
        }

        /* Part of StoneX footer */

        #footer .centered-flex-content img {
            max-width: 220px;
        }

        .centered-flex-content>.component-content>.row>div.image {
            margin-bottom: 0;
        }

        @media (min-width: 992px) {
            #footer .icon-link-list.spacing-m-t-20 {
                margin-top: 20px !important;
            }
        }

        /* Manual Mobile Language Switcher Link */

        @media (max-width: 1024px) {
            #mega-menu .mega-menu-column #language-switcher-link .field-link {
                padding: 12px 0 !important;
            }
            #mega-menu .mega-menu-column #language-switcher-link a:hover,
            #mega-menu .mega-menu-column #language-switcher-link a {
                color: #000 !important;
            }
        }

        .live-chat-button {
            display: none !important;
        }

        .embeddedMessagingFrame {
            z-index: 9999 !important;
        }
    </style>
    <script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>
    <!-- Begin Monetate ExpressTag Sync v8.1. Place at start of document head. DO NOT ALTER. -->
    <script type="text/javascript">
        window.monetateQ = window.monetateQ || [];
        window.monetateQ.push(["setPageType", "mainsite"]);
        window.monetateQ.push(["trackData"]);
    </script>
    <script type="text/javascript">
        var monetateT = new Date().getTime();
    </script>
    <script type="text/javascript"src="https://www.forex.com//se.monetate.net/js/2/a-7f76b3d0/p/en-us.forex.com/entry.js"></script>
    <!-- End Monetate tag. -->



    <title>Forex Trading Online - No. 1 Forex Broker in the US* - FX Markets - FOREX.com US</title>




    <link rel="apple-touch-icon" sizes="180x180" href="https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/icons/favicon/forex-favicon-96px.png?h=96&amp;w=96&amp;extension=webp&amp;hash=73CEAEC46089146FADF17319C273A5A3">
    <link rel="icon" type="image/png" sizes="96x96" href="https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/icons/favicon/forex-favicon-96px.png?h=96&amp;w=96&amp;extension=webp&amp;hash=73CEAEC46089146FADF17319C273A5A3">
    <link rel="icon" type="image/png" sizes="32x32" href="https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/icons/favicon/forex-favicon-32px.png?h=32&amp;w=32&amp;extension=webp&amp;hash=9C8045AA28562A7DF6EEEF5F68CE8F9B">
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/icons/favicon/forex-favicon-16px.png?h=16&amp;w=16&amp;extension=webp&amp;hash=D253770B30508C6AECC8D760260222D3">



    <meta name="description" content="Start trading with the #1 forex broker in the US*. Our award-winning online forex trading platforms and apps are available on web, desktop and mobile." />

    <meta name="viewport" content="width=device-width, initial-scale=1 " />
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-54HXRWV');
    </script>
    <!-- End Google Tag Manager -->

    <style>
        @media (max-width: 575px) {
            #empoweringclients .cta-with-cards>.component-content {
                padding: 25px 15px 50px 15px !important;
            }
        }

        .page-heading .button-primary a,
        #vip .button-bordered-primary a {
            border: 2px solid #1b1035;
            color: white;
            background: linear-gradient(90deg, #49247E 0%, #7748BC 100%) !important;
            transition: background-color .5s ease, color .5s ease, border .5s ease, box-shadow .5s ease;
        }

        .page-heading .button-primary a:hover,
        #vip .button-bordered-primary a:hover {
            border: 2px solid #1b1035;
            background: linear-gradient(90deg, #412974 0%, #5B45A3 100%) !important;
        }

        #vip .callout-body,
        #vip .callout-title {
            color: #fff;
        }

        /* Media Queries */

        @media (min-width: 100px) and (max-width: 440px) {
            .page-heading-content {
                margin-bottom: -20px;
            }
            .field-pageheadingclarifyingtext {
                margin-top: 0px !important;
            }
            .field-pageheadingforegroundimage {
                margin-top: -20px !important;
                margin-bottom: -230px !important;
                padding-left: 30px;
            }
            .field-pageheadingforegroundimage img {
                max-width: 200% !important;
                width: 100% !important;
                margin-top: -30px !important;
                margin-bottom: 25px !important;
                margin-left: -20px !important;
            }
        }

        @media (min-width: 441px) and (max-width: 659px) {
            .field-pageheadingclarifyingtext {
                margin-top: 0px !important;
            }
            .field-pageheadingforegroundimage {
                margin-top: -20px !important;
                margin-bottom: -230px !important;
                padding-left: 30px;
            }
            .field-pageheadingforegroundimage img {
                max-width: 200% !important;
                width: 110% !important;
                margin-top: -25px !important;
                margin-bottom: 25px !important;
                margin-left: -20px !important;
            }
        }

        @media (min-width: 660px) and (max-width: 767px) {
            .field-pageheadingclarifyingtext {
                margin-top: 0px !important;
            }
            .field-pageheadingforegroundimage {
                margin-top: -20px !important;
                margin-bottom: -230px !important;
                padding-right: 20px;
            }
            .field-pageheadingforegroundimage img {
                max-width: 200% !important;
                width: 115% !important;
                margin-top: -20px !important;
                margin-bottom: 25px !important;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            .field-pageheadingclarifyingtext {
                margin-top: 15px !important;
            }
            .page-heading-content {
                margin-top: -40px;
            }
            .field-pageheadingforegroundimage {
                margin-top: -40px !important;
                margin-bottom: -225px !important;
                padding-left: 50px !important;
            }
        }

        @media (min-width: 992px) and (max-width: 1440px) {
            .field-pageheadingtitle {
                width: 125%;
            }
        }

        /* Specific media query for min-width 992px to max-width 1024px */

        @media (min-width: 992px) and (max-width: 1024px) {
            .page-heading-content {
                margin-top: -80px;
                margin-bottom: -140px;
            }
            .field-pageheadingforegroundimage img {
                max-width: 200% !important;
                width: 122% !important;
                margin-left: -65px;
                margin-top: 100px;
            }
        }

        @media (min-width: 1025px) and (max-width: 1060px) {
            .page-heading-content {
                margin-top: -90px;
                margin-bottom: -180px;
            }
            .field-pageheadingforegroundimage img {
                max-width: 200% !important;
                width: 122% !important;
                margin-left: -65px;
                margin-top: 100px;
            }
        }

        @media (min-width: 1061px) and (max-width: 1199px) {
            .page-heading-content {
                margin-top: -90px;
                margin-bottom: -180px;
            }
            .field-pageheadingforegroundimage img {
                max-width: 200% !important;
                width: 125% !important;
                margin-left: -65px;
                margin-top: 100px;
            }
        }

        @media (min-width: 1200px) and (max-width: 1319px) {
            .page-heading-content {
                margin-top: -90px;
                margin-bottom: -190px;
            }
            .field-pageheadingforegroundimage img {
                max-width: 200% !important;
                width: 110% !important;
                margin-left: -25px;
                margin-top: 70px;
            }
        }

        @media (min-width: 1440px) and (max-width: 1440px) {
            .page-heading-content {
                margin-top: -90px;
                margin-bottom: -250px;
            }
            .field-pageheadingforegroundimage img {
                max-width: 200% !important;
                width: 120% !important;
                margin-left: -15px;
                margin-top: 60px;
            }
        }

        @media (min-width: 1320px) and (max-width: 1439px) {
            .page-heading-content {
                margin-top: -90px;
                margin-bottom: -210px;
            }
            .field-pageheadingforegroundimage img {
                max-width: 200% !important;
                width: 120% !important;
                margin-left: -15px;
                margin-top: 60px;
            }
        }

        @media (min-width: 1441px) and (max-width: 1650px) {
            .page-heading-content {
                margin-top: -90px;
                margin-bottom: -240px;
            }
            .field-pageheadingforegroundimage img {
                max-width: 200% !important;
                width: 130% !important;
                margin-left: -50px;
                margin-top: 15px;
            }
        }

        @media (min-width: 1651px) and (max-width: 2399px) {
            .page-heading-content {
                margin-top: -90px;
                margin-bottom: -260px;
            }
            .field-pageheadingforegroundimage img {
                max-width: 200% !important;
                width: 140% !important;
                margin-left: -15px;
                margin-top: 0px;
            }
        }

        @media (min-width: 2400px) and (max-width: 4000px) {
            .page-heading-content {
                margin-top: -80px;
                margin-bottom: -300px;
            }
            .field-pageheadingforegroundimage img {
                max-width: 200% !important;
                width: 125% !important;
                margin-left: -15px;
                margin-top: -20px;
            }
        }

        /* Media Queries */

        /* Media query for screens at 992px to 2399px width */

        @media (min-width: 992px) and (max-width: 2399px) {
            .page-heading.half-width-content .page-heading-content>div {
                flex: .6;
            }
        }

        /* Media query for screens at max 991px width */

        @media (max-width: 991px) {
            #spreads img {
                margin-top: -30px;
                margin-bottom: -20px;
            }
            .markets-list .component-content .field-marketcardtext {
                display: block !important;
            }
            .page-heading .background-image {
                object-position: left !important;
            }
            .dropdown .dropdown-composite-text .dropdown-composite-selected::after {
                margin-top: 9px;
            }
            .dropdown .field-dropdownvalue {
                margin-top: 1px;
            }
            .dropdown .dropdown-composite-text .dropdown-composite-selected {
                margin-bottom: 3px;
                margin-top: -3px;
            }
            #promoctabar .cta-bar-image {
                margin-bottom: -50px !important;
                margin-top: 25px !important;
            }
            #promoctabar {
                padding-bottom: 50px !important;
            }
            #vip img {
                padding: 10px 30px;
            }
            #financialstrength img {
                margin-top: -70px !important;
                margin-bottom: -40px;
            }
            .field-pageheadingsubtitle {
                margin-bottom: -15px !important;
            }
            .field-pageheadingtitle {
                margin-top: -15px !important;
                margin-bottom: 15px !important;
            }
        }

        /* Media query for screens at 768px to 1199px width */

        @media (min-width: 768px) and (max-width: 1199px) {
            #spreads.two-column-callout .additional-content>.row .component.image img {
                max-width: 600px;
            }
        }

        /* Media query for screens at min-width 992px */

        @media (min-width: 992px) {
            #promoctabar .field-ctabartitle {
                margin-top: -15px;
            }
            #promoctabar .field-ctabarsubtitle {
                margin-bottom: -30px;
            }
            #promoctabar .cta-bar-image {
                margin-top: -5px !important;
                margin-bottom: -35px !important;
            }
            #vip .callout-body {
                padding-left: 50px !important;
            }
            body {
                overscroll-behavior-y: none;
            }
        }

        .marketcardtextarrow a:after {
            vertical-align: middle !important;
            top: -1px !important;
        }

        .dropdown .dropdown-composite-text .dropdown-composite-selected {
            border: 2px solid #2e1065 !important;
            border-radius: 20px;
            margin: 0px 5px;
        }

        .field-promolink1 {
            margin-top: 30px;
        }

        a.home-hide {
            display: none;
        }

        .live-chat-button {
            display: none;
        }

        /* Spreads Two Column Callout (use ID spreads on the TCC) */

        #spreads.two-column-callout .additional-content>.row .component.image img {
            margin-left: auto;
            margin-right: auto;
            max-width: 400px;
        }

        #stonex img {
            margin-bottom: 35px;
        }

        #financialstrength img {
            margin-top: -30px;
        }

        #topcta h2 {
            text-align: center;
            font-size: 24px !important;
        }

        /* Only remove the extra line added on hover */

        .button-primary a:hover:before {
            content: none !important;
            display: none !important;
        }
    </style>

    <head>
        <!-- TrustBox script -->
        <script type="text/javascript"src="https://www.forex.com//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
        <!-- End TrustBox script -->
        <link rel="stylesheet" href="/en/site-theme.css?v=1" />
        <script>document.documentElement.setAttribute("data-theme", localStorage.getItem("theme") || "dark");</script>
        <link rel="stylesheet" href="/en/landing-modern.css?v=5" />


<style id="cfxm-purple-theme">
:root{--cfxm-purple-950:#1b1035;--cfxm-purple-900:#2e1065;--cfxm-purple-800:#4c1d95;--cfxm-purple-700:#6d28d9;--cfxm-purple-600:#7c3aed;--cfxm-purple-500:#9b5de5;--cfxm-lavender:#f3e8ff;--cfxm-ink:#211638}
/* Harmonise remaining landing-page accents without changing status colours or market data. */
a:focus-visible,button:focus-visible,[role=button]:focus-visible{outline:3px solid #c4b5fd!important;outline-offset:3px}
.stx-megamenu__item.stx-megamenu__item--main.level-0:hover,.stx-megamenu__item.stx-megamenu__item--main.level-0:focus{background-color:#6d28d9!important;color:#fff!important}
.stx-megamenu__item.stx-megamenu__item--main.level-0{accent-color:#7c3aed}
</style>
</head>


    <link rel="canonical" href="https://www.cfxm-pro.com/en/" />


    <meta name="robots" content="index,follow">


    <meta property="twitter:title" content="Forex Trading Online - No. 1 Forex Broker in the US* - FX Markets - FOREX.com US" />
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:description" content="Start trading with the #1 forex broker in the US*. Our award-winning online forex trading platforms and apps are available on web, desktop and mobile." />
    <meta property="twitter:image" content="https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/feature-images/about-us/twitter-facebook-sharing-images/forexcom-fb-image-02.jpg?extension=webp&hash=C40C81F44F3DB25918DC44EB64F0E43E&w=1024&h=512"
    />
    <meta property="twitter:site" content="@FOREXcom" />
    <meta property="twitter:creator" content="@FOREXcom" />


    <meta property="og:title" content="Forex Trading Online - No. 1 Forex Broker in the US* - " />
    <meta property="og:description" content="Start trading with the #1 forex broker in the US*. Our award-winning online forex trading platforms and apps are available on web, desktop and mobile." />
    <meta property="og:image" content="https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/feature-images/about-us/twitter-facebook-sharing-images/forexcom-fb-image-01.jpg?extension=webp&hash=10163BB6894016592AA1B7CCB99BCBD9&w=1200&h=630" />
    <meta property="og:url" content="https://www.cfxm-pro.com/en/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />

    <style>
        /* Moves Geo banner up */

        @media (max-width: 600px) {
            .modal-panel {
                top: 35% !important;
            }
        }

        @media (min-width: 601px) and (max-width: 991px) {
            .modal-panel {
                top: 45% !important;
            }
        }

        /* Cookie banner styling overrides */

        @media (max-width: 767px) {
            .cc-message-container {
                padding-right: 32px !important;
            }
            .cc-compliance.cc-highlight.cc-regular {
                padding-left: 32px !important;
            }
        }

        .cc-window.cc-banner.cc-bottom {
            padding: 0 !important;
        }

        .cc-message-container {
            background-color: rgb(239, 239, 239) !important;
            padding-left: 32px !important;
            z-index: 2;
        }

        .cc-compliance.cc-highlight.cc-regular {
            background-color: rgb(239, 239, 239) !important;
            padding-right: 32px !important;
            z-index: 2;
        }

        .cc-window.cc-banner.cc-bottom::after {
            content: "";
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgb(0, 0, 0, 0.4);
            position: fixed;
            z-index: 1;
        }

        /* Delays Geo banner */

        .geo-ip-modal.modal-panel {
            opacity: 0;
            animation: fadeIn 1s ease-in forwards;
            animation-delay: 2s;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
    </style>
    <meta name="robots" content="max-image-preview:large, max-video-preview:-1" />



    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/main-split-pre-optimized-min.css?v=5.41.10" rel="stylesheet" />
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/geoipmodal/geoipmodal-pre-optimized-min.css?v=5.41.10" rel="stylesheet" />
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/headerwithmegamenu/headerwithmegamenu-pre-optimized-min.css?v=5.41.10" rel="stylesheet" />
    <noscript><link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/bulletedlist/bulletedlist-pre-optimized-min.css?v=5.41.10" rel="stylesheet" /></noscript>
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/bulletedlist/bulletedlist-pre-optimized-min.css?v=5.41.10"
        rel="preload" as="style" onload="this.onload = null; this.rel = 'stylesheet'" />
  
  
    <noscript><link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/ctabar/ctabar-pre-optimized-min.css?v=5.41.10" rel="stylesheet" /></noscript>
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/ctabar/ctabar-pre-optimized-min.css?v=5.41.10"
        rel="preload" as="style" onload="this.onload = null; this.rel = 'stylesheet'" />
    <noscript><link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/ctawithcards/ctawithcards-pre-optimized-min.css?v=5.41.10" rel="stylesheet" /></noscript>
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/ctawithcards/ctawithcards-pre-optimized-min.css?v=5.41.10"
        rel="preload" as="style" onload="this.onload = null; this.rel = 'stylesheet'" />
    <noscript><link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/dropdown/dropdown-pre-optimized-min.css?v=5.41.10" rel="stylesheet" /></noscript>
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/dropdown/dropdown-pre-optimized-min.css?v=5.41.10"
        rel="preload" as="style" onload="this.onload = null; this.rel = 'stylesheet'" />
    <noscript><link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/forexpromo/forexpromo-pre-optimized-min.css?v=5.41.10" rel="stylesheet" /></noscript>
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/forexpromo/forexpromo-pre-optimized-min.css?v=5.41.10"
        rel="preload" as="style" onload="this.onload = null; this.rel = 'stylesheet'" />
    <noscript><link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/forms/forms-pre-optimized-min.css?v=5.41.10" rel="stylesheet" /></noscript>
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/forms/forms-pre-optimized-min.css?v=5.41.10"
        rel="preload" as="style" onload="this.onload = null; this.rel = 'stylesheet'" />
    <noscript><link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/iconlinklist/iconlinklist-pre-optimized-min.css?v=5.41.10" rel="stylesheet" /></noscript>
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/iconlinklist/iconlinklist-pre-optimized-min.css?v=5.41.10"
        rel="preload" as="style" onload="this.onload = null; this.rel = 'stylesheet'" />
    <noscript><link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/image/image-pre-optimized-min.css?v=5.41.10" rel="stylesheet" /></noscript>
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/image/image-pre-optimized-min.css?v=5.41.10"
        rel="preload" as="style" onload="this.onload = null; this.rel = 'stylesheet'" />
    <noscript><link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/linklist/linklist-pre-optimized-min.css?v=5.41.10" rel="stylesheet" /></noscript>
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/linklist/linklist-pre-optimized-min.css?v=5.41.10"
        rel="preload" as="style" onload="this.onload = null; this.rel = 'stylesheet'" />
    <noscript><link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/livechat/livechat-pre-optimized-min.css?v=5.41.10" rel="stylesheet" /></noscript>
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/livechat/livechat-pre-optimized-min.css?v=5.41.10"
        rel="preload" as="style" onload="this.onload = null; this.rel = 'stylesheet'" />
    <noscript><link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/overlappingcontainer/overlappingcontainer-pre-optimized-min.css?v=5.41.10" rel="stylesheet" /></noscript>
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/overlappingcontainer/overlappingcontainer-pre-optimized-min.css?v=5.41.10"
        rel="preload" as="style" onload="this.onload = null; this.rel = 'stylesheet'" />
    <noscript><link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/personalizationtabs/personalizationtabs-pre-optimized-min.css?v=5.41.10" rel="stylesheet" /></noscript>
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/personalizationtabs/personalizationtabs-pre-optimized-min.css?v=5.41.10"
        rel="preload" as="style" onload="this.onload = null; this.rel = 'stylesheet'" />
    <noscript><link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/pricingcomponent/pricingcomponent-pre-optimized-min.css?v=5.41.10" rel="stylesheet" /></noscript>
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/pricingcomponent/pricingcomponent-pre-optimized-min.css?v=5.41.10"
        rel="preload" as="style" onload="this.onload = null; this.rel = 'stylesheet'" />
    <noscript><link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/relatedarticles/relatedarticles-pre-optimized-min.css?v=5.41.10" rel="stylesheet" /></noscript>
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/relatedarticles/relatedarticles-pre-optimized-min.css?v=5.41.10"
        rel="preload" as="style" onload="this.onload = null; this.rel = 'stylesheet'" />
    <noscript><link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/sectiontitle/sectiontitle-pre-optimized-min.css?v=5.41.10" rel="stylesheet" /></noscript>
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/sectiontitle/sectiontitle-pre-optimized-min.css?v=5.41.10"
        rel="preload" as="style" onload="this.onload = null; this.rel = 'stylesheet'" />
    <noscript><link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/twocolumncallout/twocolumncallout-pre-optimized-min.css?v=5.41.10" rel="stylesheet" /></noscript>
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/twocolumncallout/twocolumncallout-pre-optimized-min.css?v=5.41.10"
        rel="preload" as="style" onload="this.onload = null; this.rel = 'stylesheet'" />
    <noscript><link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/verticaltabs/verticaltabs-pre-optimized-min.css?v=5.41.10" rel="stylesheet" /></noscript>
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/verticaltabs/verticaltabs-pre-optimized-min.css?v=5.41.10"
        rel="preload" as="style" onload="this.onload = null; this.rel = 'stylesheet'" />
    <noscript><link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/viewcounts/viewcounts-pre-optimized-min.css?v=5.41.10" rel="stylesheet" /></noscript>
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/viewcounts/viewcounts-pre-optimized-min.css?v=5.41.10"
        rel="preload" as="style" onload="this.onload = null; this.rel = 'stylesheet'" />
    <noscript><link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/whitepaper/whitepaper-pre-optimized-min.css?v=5.41.10" rel="stylesheet" /></noscript>
    <link href="https://www.forex.com/-/media/themes/gain-capital/forex/forex/styles/components-split/whitepaper/whitepaper-pre-optimized-min.css?v=5.41.10"
        rel="preload" as="style" onload="this.onload = null; this.rel = 'stylesheet'" />


<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'ef6f82415710cac56d41d1feaba4bdb8661afea3';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript>Powered by <a href="https://www.smartsupp.com" target="_blank">Smartsupp</a></noscript>

</head>

<body class="mobile-device bodyclass" data-site-id="{753454D7-4EEA-4D0D-9A56-528127813A34}" data-stream-url="https://rates-live.efxnow.com" data-is-streaming-enabled="true">

    <!-- Google Tag Manager (noscript) -->
    <noscript>
                <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-54HXRWV" height="0" width="0" style="display:none;visibility:hidden"></iframe>
            </noscript>
    <!-- End Google Tag Manager (noscript) -->


<style>
   #preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #211638; /* match your theme */
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
}

#preloader img {
  width: 120px;
  animation: blink 1.2s infinite ease-in-out;
}

@keyframes blink {
  0%   { opacity: 1; transform: scale(1); }
  50%  { opacity: 0.3; transform: scale(0.95); }
  100% { opacity: 1; transform: scale(1); }
}
</style>


<script>
  window.addEventListener("load", function () {
    const preloader = document.getElementById("preloader");

    preloader.style.opacity = "0";
    preloader.style.transition = "opacity 0.5s ease";

    setTimeout(() => {
      preloader.style.display = "none";
    }, 5000);
  });
</script>

<div id="preloader">
  <img src="https://png.pngtree.com/png-vector/20250306/ourmid/pngtree-green-red-trading-candlestick-logo-clipart-for-stock-forex-and-crypto-vector-png-image_15455728.png" alt="Loading..." />
</div>


    <!-- #wrapper -->
    <div id="wrapper">

        <!-- #header -->
        <header>
            <div id="header" class="container-fluid">
                <div class="row">

                    <div class="component container col-12 full-width">
                        <div class="component-content">
                            <div class="row">
                            </div>
                        </div>
                    </div>

                    <div class="component container col-12 full-width">
                        <div class="component-content">
                            <div class="row">



                                <div class="component header-with-megamenu new-header">

                                    <nav class="stx-top-bar">


                                        <div class="stx-umbrella ">
                                            <a gtmLinkName="Trading" href="/en/Index.php" class="stx-umbrella__link-icon active internal" gtmLinkContext="header">Trading</a><a gtmLinkName="VIP" href="/en/InfoPage.php?page=about" class="stx-umbrella__link-icon  internal"
                                                gtmLinkContext="header">VIP</a><a gtmLinkName="Institutional" href="https://www.stonex.com/en/stonex-pro/" rel="noopener noreferrer" class="stx-umbrella__link-icon  external" gtmLinkContext="header" target="_blank">Institutional</a>                                            </div>

                                        <div class="stx-umbrella right">
                                            <div class="iconLinks ">

                                                <a href="/en/InfoPage.php?page=support" class="stx-umbrella__link-icon internal">
        <imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/core/umbrella/support-black.svg?iar=0&amp;extension=webp&amp;hash=2ED7B7D86822BB7CA990FC2A92A9FDE2" class="stx-umbrella__link internal" alt="Support" />
        Support
      </a>
                                            </div>
                                            <div class="iconLinks desktop-hidden">

                                                
        <imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/city-index/icons/mega-menu/search.svg?h=39&amp;iar=0&amp;w=51&amp;extension=webp&amp;hash=EAB222CF1B02B7FC04CB537D831B35B2" class="stx-umbrella__link internal" alt="Search" width="51" height="39" />
        Search
      
                                            </div>
                                        </div>



                                        <div class="stx-regional-switcher">
                                            <button class="stx-regional-switcher__trigger" type="button">

      
      <label>English</label>
    </button>

                                            <div class="stx-regional-switcher__list">
                                                <button class="stx-back-button stx-back-button--regional" type="button">Back</button>

                                                <span class="stx-regional-switcher__label"></span>

                                                <span class="stx-regional-switcher__title">Choose your language</span>

                                                <span class="stx-regional-switcher__Description">Select your language to display the most appropriate content.</span>

                                                <a gtmlinkname="English" href="/en/Index.php" class="stx-regional-switcher__link active" gtmlinkcontext="header">English</a>
                                                <a gtmlinkname="Espa&#241;ol" href="https://www.forex.com/es-us/" class="stx-regional-switcher__link" gtmlinkcontext="header">Espa&#241;ol</a>
                                                <a gtmlinkname="中文" href="https://www.forex.com/zh-us/" class="stx-regional-switcher__link" gtmlinkcontext="header">中文</a>
                                            </div>
                                        </div>

                                    </nav>

                                    <div class="stx-main-bar">



                                        <a href="/en/Index.php" title="Home" class="stx-logo">
    <img src="../cfxm_logo_single.png" class="" alt="FX by SX logo-Dark-200" style="width:70px; height: 150px" />
    
</a>



                                        <div class="navTrigger stx-hamburger">
                                            <i></i>
                                            <i></i>
                                            <i></i>
                                            <span>Menu</span>
                                        </div>

                                        <nav class="stx-navigation">
                                            <div class="stx-megamenu__umbrella">


                                                <div class="stx-umbrella ">
                                                    <a gtmLinkName="Trading" href="/en/Index.php" class="stx-umbrella__link-icon active internal" gtmLinkContext="header">Trading</a><a gtmLinkName="VIP" href="/en/InfoPage.php?page=about" class="stx-umbrella__link-icon  internal"
                                                        gtmLinkContext="header">VIP</a><a gtmLinkName="Institutional" href="https://www.stonex.com/en/stonex-pro/" rel="noopener noreferrer" class="stx-umbrella__link-icon  external" gtmLinkContext="header"
                                                        target="_blank">Institutional</a> </div>
                                            </div>



                                            <div class="stx-megamenu ">

                                                <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--main  level-0">


                                                    <label>Markets</label>



                                                    <div class="stx-megamenu__inner stx-main--megamenu__inner">
                                                        <div class="stx-megamenu__container">




                                                            <div class="stx-main--megamenu__inner_iconlinks">

                                                                <a gtmLinkName="Trade Markets" href="/en/InfoPage.php?page=markets" class="button-with-image-gradient" gtmLinkContext="header">Trade Markets<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/nav/fxall-meganav-markets-range-of-markets-barchart-wh.svg?iar=0&amp;extension=webp&amp;hash=3DAACA11196112124F6C80C3892BEC2D" alt="A white bar chart to represent trading menu options on FOREX.com" /></a>
                                                                <a
                                                                    gtmLinkName="Trade Prices" href="/en/InfoPage.php?page=plans" class="button-with-image-gradient" gtmLinkContext="header">Trade Prices<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/nav/fxall-meganav-markets-pricing-and-charges-wh.svg?iar=0&amp;extension=webp&amp;hash=6528A0FD77F83D80829ADD1AB861BAD6"
                                                                        alt="Icon of stacked coins in white" /></a><a gtmLinkName="Our Account Types" href="/en/InfoPage.php?page=plans" class="button-with-image-gradient" gtmLinkContext="header">Our Account Types<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/nav/fxall-meganav-markets-account-types-wh.svg?iar=0&amp;extension=webp&amp;hash=E6A287541ACFC6257EACB58F0B05F732" alt="Account Types" /></a>
                                                            </div>

                                                            <button class="stx-back-button" type="button">Back</button>

                                                            <div class="stx-megamenu__submenu-container">


                                                                <div grp-tag="1" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                    <span class="stx-megamenu__inner-title">
<a href="/en/InfoPage.php?page=markets" gtmLinkContext="header" gtmLinkName="Trade Markets">Trade Markets</a>      </span>

                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        <a gtmLinkName="Forex" href="/en/InfoPage.php?page=markets" class="stx-megamenu__link stx-nested--megamenu__link " gtmLinkContext="header">Forex</a>
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        <a gtmLinkName="Futures and Futures Options" href="/en/InfoPage.php?page=markets" class="stx-megamenu__link stx-nested--megamenu__link " gtmLinkContext="header">Futures and Futures Options</a>
                                                                    </div>

                                                                    <div grp-tag="1" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                        <span class="stx-megamenu__inner-title">
Investment Choices      </span>

                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            <a gtmLinkName="Wealth Management" href="/en/InfoPage.php?page=about" class="stx-megamenu__link stx-nested--megamenu__link " gtmLinkContext="header">Wealth Management</a>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div grp-tag="2" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                    <span class="stx-megamenu__inner-title">
Popular Markets      </span>

                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        EUR/USD
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        USD/CAD
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        GBP/USD
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        AUD/USD
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        USD/JPY
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        NZD/USD
                                                                    </div>

                                                                </div>
                                                                <div grp-tag="3" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                    <span class="stx-megamenu__inner-title">
Exotic Markets      </span>

                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        USD/THB
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        USD/TRY
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        USD/MXN
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        USD/SGD
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        USD/HKD
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        USD/ILS
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--main  level-0">


                                                    <label>Accounts</label>



                                                    <div class="stx-megamenu__inner stx-main--megamenu__inner">
                                                        <div class="stx-megamenu__container">




                                                            <div class="stx-main--megamenu__inner_iconlinks">

                                                                <a gtmLinkName="Our Accounts" href="/en/InfoPage.php?page=plans" class="button-with-image-gradient" gtmLinkContext="header">Our Accounts<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/nav/fxall-meganav-markets-account-types-wh.svg?iar=0&amp;extension=webp&amp;hash=E6A287541ACFC6257EACB58F0B05F732" alt="Account Types" /></a>
                                                                Compare Accounts<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/accounts/account-types/icon-accounttypes-compareaccounts-white.svg?iar=0&amp;extension=webp&amp;hash=CF65D12AB741474A8B4C9CD1142E88C9"
                                                                        alt="Compare Accounts" /><a gtmLinkName="Current Promotions" href="/en/InfoPage.php?page=plans" class="button-with-image-gradient" gtmLinkContext="header">Current Promotions<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/about/icon-aboutus-priceimprovement-white.svg?iar=0&amp;extension=webp&amp;hash=3556035C1F0A1697B833FC95F3C70C88" alt="TIck" /></a>
                                                                    <a
                                                                        gtmLinkName="FOREXcom VIP" href="/en/InfoPage.php?page=about" class="button-with-image-gradient" gtmLinkContext="header">FOREX.com VIP<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/professional/fxus-active-trader/fxus-active-trader-wh.svg?iar=0&amp;extension=webp&amp;hash=40EBAF520C333C7A4BF7F4369E35837A"
                                                                            alt="White Active Trader Icon" /></a>
                                                            </div>

                                                            <button class="stx-back-button" type="button">Back</button>

                                                            <div class="stx-megamenu__submenu-container">


                                                                <div grp-tag="1" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                    <span class="stx-megamenu__inner-title">
<a href="/en/InfoPage.php?page=plans" gtmLinkContext="header" gtmLinkName="Account Types">Account Types</a>      </span>

                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Spread-Only Account
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        RAW Pricing Account
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        MT5 Account
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        MT4 Account
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Corporate Account
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        IRA Account
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Compare Accounts
                                                                    </div>

                                                                </div>
                                                                <div grp-tag="2" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                    <span class="stx-megamenu__inner-title">
Financial Transparency      </span>

                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Execution
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Margin Requirements
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Rollover Rates
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        <a gtmLinkName="Trade Prices" href="/en/InfoPage.php?page=plans" class="stx-megamenu__link stx-nested--megamenu__link " gtmLinkContext="header">Trade Prices</a>
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Trading Costs
                                                                    </div>

                                                                </div>
                                                                <div grp-tag="3" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                    <span class="stx-megamenu__inner-title">
<a href="/en/InfoPage.php?page=about" gtmLinkContext="header" gtmLinkName="FOREX.com VIP">FOREX.com VIP</a>      </span>

                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Cash Rebates
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Relationship Manager
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Exclusive Events
                                                                    </div>

                                                                    <div grp-tag="3" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                        <span class="stx-megamenu__inner-title">
Get Started      </span>

                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            <a gtmLinkName="Free Demo Account" href="../Dashboard/LoginContainer.php" class="stx-megamenu__link stx-nested--megamenu__link " gtmLinkContext="header">Free Demo Account</a>
                                                                        </div>
                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            Demo Raw Pricing
                                                                        </div>
                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            Demo MT5 Account
                                                                        </div>
                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            Demo MT4 Account
                                                                        </div>
                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            Create Live Account
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/feature-images/promotions/4-0pct-main-nav-image.jpg?h=307&amp;iar=0&amp;w=576&amp;extension=webp&amp;hash=B281996F051859A1273BDC07B2981761" alt="4-0pct Main Nav Image" width="576" height="307" />                                                            </div>
                                                    </div>
                                                </div>
                                                <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--main  level-0">


                                                    <label>Platforms and Tools</label>



                                                    <div class="stx-megamenu__inner stx-main--megamenu__inner">
                                                        <div class="stx-megamenu__container">




                                                            <div class="stx-main--megamenu__inner_iconlinks">

                                                                <a gtmLinkName="Our Trading Platforms" href="/en/InfoPage.php?page=platforms" class="button-with-image-gradient" gtmLinkContext="header">Our Trading Platforms<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/home/fxall-why-forex-platforms-wh.svg?iar=0&amp;extension=webp&amp;hash=78D2A90EDF9476AB0A2602EA5A3B0DE9" alt="White Icon of a computer screen with a mobile phone in the foreground" /></a>
                                                                Platform Comparison<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/platforms/icon-platforms-compare-white.svg?iar=0&amp;extension=webp&amp;hash=CD1B1D16098176E4DDB9613438A25485"
                                                                        alt="Icon of two stacked screens in white" /><a gtmLinkName="Our Trading Tools" href="/en/InfoPage.php?page=platforms" class="button-with-image-gradient" gtmLinkContext="header">Our Trading Tools<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/nav/fxall-meganav-platform-trading-tools-wh.svg?iar=0&amp;extension=webp&amp;hash=0BD62EB7DB5AD7874E4C5DADCDC0CBA0" alt="Spanner and pencil icon in white" /></a>
                                                                    Simulated Trading<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/home/fxall-what-is-forex-pound-dollar-wh.svg?iar=0&amp;extension=webp&amp;hash=AF564BAE3A35A567E9A2BD722BE69076"
                                                                            alt="White icon of $ and £ symbols" />
                                                            </div>

                                                            <button class="stx-back-button" type="button">Back</button>

                                                            <div class="stx-megamenu__submenu-container">


                                                                <div grp-tag="1" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                    <span class="stx-megamenu__inner-title">
<a href="/en/InfoPage.php?page=platforms" gtmLinkContext="header" gtmLinkName="FOREX.com Platforms">FOREX.com Platforms</a>      </span>

                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Mobile App
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Web Trader
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Platform Comparison
                                                                    </div>

                                                                    <div grp-tag="1" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                        <span class="stx-megamenu__inner-title">
MetaTrader      </span>

                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            MetaTrader 5
                                                                        </div>
                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            Expert Advisors
                                                                        </div>
                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            MT5 VPS Hosting
                                                                        </div>
                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            MetaTrader 4
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div grp-tag="2" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                    <span class="stx-megamenu__inner-title">
TradingView      </span>

                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Advanced Charts
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        How to Connect
                                                                    </div>

                                                                    <div grp-tag="2" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                        <span class="stx-megamenu__inner-title">
Other ways to trade      </span>

                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            NinjaTrader
                                                                        </div>
                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            API Trading
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div grp-tag="3" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                    <span class="stx-megamenu__inner-title">
<a href="/en/InfoPage.php?page=platforms" gtmLinkContext="header" gtmLinkName="Trading Tools">Trading Tools</a>      </span>

                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Performance Analytics
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Trader Sentiment
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Trading Central
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Pivot Points
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Currency Converter
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Margin and Pip Calculator
                                                                    </div>

                                                                    <div grp-tag="3" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                        <span class="stx-megamenu__inner-title">
Get Started      </span>

                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            Download Platforms
                                                                        </div>
                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            Video Tutorials
                                                                        </div>
                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            Simulated Trading
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--main  level-0">


                                                    <label>News and Analysis</label>



                                                    <div class="stx-megamenu__inner stx-main--megamenu__inner">
                                                        <div class="stx-megamenu__container">




                                                            <div class="stx-main--megamenu__inner_iconlinks">

                                                                <a gtmLinkName="Latest Research" href="/en/InfoPage.php?page=insights" class="button-with-image-gradient" gtmLinkContext="header">Latest Research<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/nav/fxall-meganav-news-and-analysis-wh.svg?iar=0&amp;extension=webp&amp;hash=0F1C3D61707380BC3F8EB7D1167D435C" alt="Newspaper icon for main navigation - white transparent" /></a>
                                                                Trade Ideas<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/nav/fxall-meganav-news-and-analysis-trade-ideas-wh.svg?iar=0&amp;extension=webp&amp;hash=EE86FA8838BDC15CD80C38AA1725D4C1"
                                                                        alt="White icon of a lightblulb" />Our Research Experts<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/platforms/performance-analytics-hub-icons/fx-trading-plan-icon-white.svg?iar=0&amp;extension=webp&amp;hash=1BAD42BD1B26E49F5F55149EDDC94DE5" alt="FX Trading Plan Icon-White" />
                                                                    Interactive Livestreams<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/education-and-trading-academy/icon-academy-webinars-white.svg?iar=0&amp;extension=webp&amp;hash=619689FCF72DAF964D7AC5ADD3AFF5ED"
                                                                            alt="Navigate to webinars" />
                                                            </div>

                                                            <button class="stx-back-button" type="button">Back</button>

                                                            <div class="stx-megamenu__submenu-container">


                                                                <div grp-tag="1" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                    <span class="stx-megamenu__inner-title">
<a href="/en/InfoPage.php?page=insights" gtmLinkContext="header" gtmLinkName="News & Analysis">News &amp; Analysis</a>      </span>

                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Forex Market
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Our Research Experts
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Economic Calendar
                                                                    </div>

                                                                </div>
                                                                <div grp-tag="2" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                    <span class="stx-megamenu__inner-title">
Interactive Livestreams      </span>

                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Forex Price Action
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Forex Technical Focus
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Daily Squawk
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Live NFP Coverage
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Daily Market Update
                                                                    </div>

                                                                </div>
                                                                <div grp-tag="3" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                    <span class="stx-megamenu__inner-title">
Popular Topics      </span>

                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Middle East Conflict
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Trump Tariffs
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        China
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--main  level-0">


                                                    <label>Learn</label>



                                                    <div class="stx-megamenu__inner stx-main--megamenu__inner">
                                                        <div class="stx-megamenu__container">




                                                            <div class="stx-main--megamenu__inner_iconlinks">

                                                                <a gtmLinkName="Trading Academy" href="/en/InfoPage.php?page=education" class="button-with-image-gradient" gtmLinkContext="header">Trading Academy<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/nav/fxall-meganav-academy-education-wh.svg?iar=0&amp;extension=webp&amp;hash=E4D59996773BBAE8C7FDED09CD085768" alt="Mortarboard icon in white" /></a>
                                                                Interactive Livestreams<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/education-and-trading-academy/icon-academy-webinars-white.svg?iar=0&amp;extension=webp&amp;hash=619689FCF72DAF964D7AC5ADD3AFF5ED"
                                                                        alt="Navigate to webinars" />Video Tutorials<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/platforms/icon-academy-platformtutorials-white.svg?iar=0&amp;extension=webp&amp;hash=539E10B082FBAE9785EFB4B03619D097" alt="Navigate to platform tutorials" />
                                                                    The Trader&#39;s Course<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/education-and-trading-academy/icon-academy-lessons-white.svg?iar=0&amp;extension=webp&amp;hash=70015534313069D1C48DEBC2B20DC325"
                                                                            alt="White icon of crypto-currency book" />Glossary<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/education-and-trading-academy/icon-academy-glossary-white.svg?iar=0&amp;extension=webp&amp;hash=8188F1FB47555E80E657B94AEED8EF2A" alt="Glossary icon" />
                                                            </div>

                                                            <button class="stx-back-button" type="button">Back</button>

                                                            <div class="stx-megamenu__submenu-container">


                                                                <div grp-tag="1" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                    <span class="stx-megamenu__inner-title">
<a href="/en/InfoPage.php?page=education" gtmLinkContext="header" gtmLinkName="Academy">Academy</a>      </span>

                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Courses
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Lessons
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Self-Assessment Quiz
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        The Trader&#39;s Course
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Glossary
                                                                    </div>

                                                                    <div grp-tag="1" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                        <span class="stx-megamenu__inner-title">
Tutorials      </span>

                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            MetaTrader
                                                                        </div>
                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            Mobile Apps
                                                                        </div>
                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            Web Trader
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div grp-tag="2" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                    <span class="stx-megamenu__inner-title">
<a href="/en/InfoPage.php?page=education" gtmLinkContext="header" gtmLinkName="Trading Guides (NEW)">Trading Guides (NEW)</a>      </span>

                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Market Sentiment in Forex
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        11 Chart Patterns You Should Know
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Bullish and Bearish Flags
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Doji Candles
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Hammer Candlesticks
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Liquidity and Volatility
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        What Is Options Trading?
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Triangle Chart Patterns
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        What is a Pip?
                                                                    </div>

                                                                </div>
                                                                <div grp-tag="3" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                    <span class="stx-megamenu__inner-title">
Other Guides      </span>

                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        5-3-1 Trading Strategy
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Forex Regulations
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Symmetrical Triangles
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Expert Advisor Installation Guide
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Wide Ranging Bars
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Central Banks
                                                                    </div>

                                                                    <div grp-tag="3" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                        <span class="stx-megamenu__inner-title">
Interactive Livestreams      </span>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--main  level-0">


                                                    <label>About Us</label>



                                                    <div class="stx-megamenu__inner stx-main--megamenu__inner">
                                                        <div class="stx-megamenu__container">




                                                            <div class="stx-main--megamenu__inner_iconlinks">

                                                                Why FOREX.com?<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/nav/fxall-meganav-about-forexcom-wh.svg?iar=0&amp;extension=webp&amp;hash=7E750F208F0757268058B9135B57856D" alt="About us icon of 3 towers in white" />
                                                                <a
                                                                    gtmLinkName="Help and Support" href="/en/InfoPage.php?page=support" class="button-with-image-gradient" gtmLinkContext="header">Help &amp; Support<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/nav/fxall-meganav-academy-support-wh.svg?iar=0&amp;extension=webp&amp;hash=67B8DACA0CA8380B61E8816F06125B4E" alt="White chat icon of 2 people and a speech bubble"
                                                                    /></a><a gtmLinkName="StoneX Corp" href="https://www.stonex.com/en/" class="button-with-image-gradient" gtmLinkContext="header">StoneX Group Inc.<imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/about/icon-stonex-white.svg?iar=0&amp;extension=webp&amp;hash=0149F28E6AACC10FD612A1E69FA092FB" alt="StoneX" /></a>
                                                            </div>

                                                            <button class="stx-back-button" type="button">Back</button>

                                                            <div class="stx-megamenu__submenu-container">


                                                                <div grp-tag="1" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                    <span class="stx-megamenu__inner-title">
<a href="/en/InfoPage.php?page=about" gtmLinkContext="header" gtmLinkName="About FOREX.com">About FOREX.com</a>      </span>

                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Careers
                                                                    </div>

                                                                    <div grp-tag="1" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                        <span class="stx-megamenu__inner-title">
Get Started      </span>

                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            <a gtmLinkName="Demo Account" href="../Dashboard/LoginContainer.php" class="stx-megamenu__link stx-nested--megamenu__link " gtmLinkContext="header">Demo Account</a>
                                                                        </div>
                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            Live Account
                                                                        </div>
                                                                        <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                            <a gtmLinkName="Current Promotions" href="/en/InfoPage.php?page=plans" class="stx-megamenu__link stx-nested--megamenu__link " gtmLinkContext="header">Current Promotions</a>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div grp-tag="2" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                    <span class="stx-megamenu__inner-title">
Why Trade with Us?      </span>

                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Costs &amp; Charges
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Execution
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Strength &amp; Security
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Regulation
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        <a gtmLinkName="Pricing" href="/en/InfoPage.php?page=plans" class="stx-megamenu__link stx-nested--megamenu__link " gtmLinkContext="header">Pricing</a>
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Trading Support
                                                                    </div>

                                                                </div>
                                                                <div grp-tag="3" class="stx-megamenu__submenu stx-megamenu__submenu--nested">
                                                                    <span class="stx-megamenu__inner-title">
<a href="/en/InfoPage.php?page=support" gtmLinkContext="header" gtmLinkName="Help & Support">Help &amp; Support</a>      </span>

                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        FAQs
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Account Forms
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Service Updates
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Market Hours
                                                                    </div>
                                                                    <div tabindex="0" class="stx-megamenu__item stx-megamenu__item--nested  level-1">
                                                                        Security Fraud
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>




                                            </div>

                                            <div class="stx-ctas">
                                                <div class="stx-site-search">
                                                    
            <imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/city-index/icons/mega-menu/search.svg?h=39&amp;iar=0&amp;w=51&amp;extension=webp&amp;hash=EAB222CF1B02B7FC04CB537D831B35B2" class="search-icon" alt="Search" width="51" height="39" />
          
                                                </div>

                                                <div class="button button-bordered-primary">
                                                    <a gtmLinkContext="header" href="/Dashboard/LoginContainer.php" gtmLinkName="Log In">Log In</a>
                                                </div>

                                                <div class="button button-solid button-primary">
                                                    <a gtmLinkContext="header" href="../Dashboard/SignupContainer.php" gtmLinkName="Open an account" target="_blank">Open an account</a>
                                                </div>
                                            </div>

                                            <div class="stx-bottom-buttons">



                                                <div class="stx-umbrella right">
                                                    <div class="iconLinks ">

                                                        <a href="/en/InfoPage.php?page=support" class="stx-umbrella__link-icon internal">
        <imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/core/umbrella/support-black.svg?iar=0&amp;extension=webp&amp;hash=2ED7B7D86822BB7CA990FC2A92A9FDE2" class="stx-umbrella__link internal" alt="Support" />
        Support
      </a>
                                                    </div>
                                                    <div class="iconLinks desktop-hidden">

                                                        
        <imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/city-index/icons/mega-menu/search.svg?h=39&amp;iar=0&amp;w=51&amp;extension=webp&amp;hash=EAB222CF1B02B7FC04CB537D831B35B2" class="stx-umbrella__link internal" alt="Search" width="51" height="39" />
        Search
      
                                                    </div>
                                                </div>



                                                <div class="stx-regional-switcher">
                                                    <button class="stx-regional-switcher__trigger" type="button">

      
      <label>English</label>
    </button>

                                                    <div class="stx-regional-switcher__list">
                                                        <button class="stx-back-button stx-back-button--regional" type="button">Back</button>

                                                        <span class="stx-regional-switcher__label"></span>

                                                        <span class="stx-regional-switcher__title">Choose your language</span>

                                                        <span class="stx-regional-switcher__Description">Select your language to display the most appropriate content.</span>

                                                        <a gtmlinkname="English" href="/en/Index.php" class="stx-regional-switcher__link active" gtmlinkcontext="header">English</a>
                                                        <a gtmlinkname="Espa&#241;ol" href="https://www.forex.com/es-us/" class="stx-regional-switcher__link" gtmlinkcontext="header">Espa&#241;ol</a>
                                                        <a gtmlinkname="中文" href="https://www.forex.com/zh-us/" class="stx-regional-switcher__link" gtmlinkcontext="header">中文</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                                <div class="component plain-html">
                                    <div class="component-content">
                                        <style>
                                            img.crpb {
                                                width: 1px;
                                            }
                                        </style>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- #content -->
        <main>
            <div id="content" class="container-fluid">
                <div class="row">




                    <div class="component container col-12 full-width" id="alertbar">
                        <div class="component-content">
                            <div class="row">
                                <div class="component plain-html col-12">
                                    <div class="component-content">
                                        <style>
                                            @media (min-width: 991px) and (max-width: 1025px) {
                                                .yellow-box-alert {
                                                    margin-top: -43px !important;
                                                }
                                            }

                                            /* Responsive styles for screen sizes up to 991px */

                                            @media (max-width: 991px) {
                                                .yellow-box-alert {
                                                    padding: 20px 40px 20px 20px !important;
                                                }
                                                #alertbar {
                                                    margin-bottom: 74px;
                                                }
                                                #alertbar .plain-html {
                                                    top: 48px !important;
                                                }
                                            }

                                            /* Responsive styles for screen sizes up to 600px */

                                            @media (max-width: 600px) {
                                                .yellow-box-alert {
                                                    padding: 15px 40px 15px 20px !important;
                                                }
                                                .close-btn {
                                                    top: 25px !important;
                                                    right: 10px !important;
                                                }
                                                .yellow-box-alert p {
                                                    font-size: 11px !important;
                                                }
                                            }

                                            /* Responsive styles for screen sizes up to 1024px */

                                            @media (max-width: 1024px) {
                                                .yellow-box-alert p {
                                                    font-size: 12px !important;
                                                }
                                            }

                                            /* Responsive styles for screen sizes 992px and above */

                                            @media (min-width: 992px) {
                                                #alertbar {
                                                    margin-bottom: 72px;
                                                }
                                            }

                                            /* Styles for alert bar */

                                            #alertbar .plain-html {
                                                position: fixed;
                                                top: 90px;
                                                /* Adjust this value according to the height of your navigation menu */
                                                width: 100%;
                                                /* Adjust the width as necessary */
                                                z-index: 1000;
                                                /* Ensure it stays above other content */
                                            }

                                            #alertbar .col-12 {
                                                padding-left: 0px !important;
                                                padding-right: 0px !important;
                                            }

                                            /* Styles for yellow box */

                                            .yellow-box-alert {
                                                background-color: #ffd816;
                                                box-sizing: border-box;
                                                padding: 25px;
                                                /* Adjust the padding as needed */
                                                margin: 0 auto;
                                                /* Center the box horizontally */
                                                position: relative;
                                                /* Ensure the close button is positioned correctly */
                                            }

                                            /* Styles for close button */

                                            .close-btn {
                                                position: absolute;
                                                top: 25px;
                                                right: 15px;
                                                background: none;
                                                border: none;
                                                font-size: 25px;
                                                font-weight: 500;
                                                cursor: pointer;
                                            }

                                            /* General body styles */

                                            body {
                                                overscroll-behavior-y: none;
                                            }
                                        </style>

                                   

                                    
                                        
                                        
                                        <script type="module" src="https://widgets.tradingview-widget.com/w/en/tv-ticker-tape.js"></script>

<tv-ticker-tape symbols="FOREXCOM:SPXUSD,FOREXCOM:NSXUSD,FOREXCOM:DJI,FX:EURUSD,BITSTAMP:BTCUSD,BITSTAMP:ETHUSD,CMCMARKETS:GOLD" hide-chart></tv-ticker-tape>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="component container col-12 full-width" id="forex-empty">
                        <div class="component-content">
                            <div class="row">



                                <div class="component container col-12 container-dark-background full-width" id="hpheader" style="background-image: url('https://www.forex.com/en-us/-/media/project/gain-capital/forex/heroes/home/fxus-ca-hp-banner-refresh-feb-2026-v2.jpg?extension=webp'); background-position: calc(50% + 0px) calc(50% + 0px); background-repeat: no-repeat; background-size: cover;">
                                    <div class="component-content">
                                        <div class="row">



                                            <div class="component container col-12 px-0">
                                                <div class="component-content">
                                                    <div class="row">
                                                        <div class="component two-column-callout col-12 dark mobile-reverse-cols reverse-cols">
                                                            <div class="component-content">
                                                                <div class="additional-content">
                                                                    <div class="row">
                                                                        <div class="component image file-type-icon-media-link col-12 mobile-only">
                                                                            <div class="component-content">
                                                                                <img loading="lazy" src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/heroes/home/fxus-ca-hp-banner-rotation-feb-2025-mobile_v3.jpg?h=960&iar=0&w=1800&extension=webp" alt="FXUS-CA HP Banner Rotation Feb 2025-Mobile_v3" width="1800" height="960"
                                                                                    data-variantitemid="{5DFD16C6-452F-4CCA-8663-5070032EDEE2}" data-variantfieldname="Image" />
                                                                                <span
                                                                                    class="image-caption field-imagecaption"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="callout-body">
                                                                    <div class="callout-desc field-callouttext">
                                                                        <h1 style="color: #fff;">CFXM-PRO - built to empower
                                                                        </h1>
                                                                        <p style="font-size: 18px; color: #fff; margin-top: 15px; max-width: 80%;">When pricing and reliability matter most, choose the #1 broker in the U.S.* and benefit from super-fast execution and spreads as low as 0.0** on major pairs, commissions apply.
                                                                        </p>
                                                                        <div class="hpherobuttons" style="margin-bottom: 20px; margin-top: 10px;">
                                                                            <div style="margin-right: 10px;" class="button button-solid button-primary">
                                                                                <a href="../Dashboard/SignupContainer.php">Start Trading</a>&nbsp;</div>
                                                                            <div class="button button-bordered-secondary">
                                                                                <a href="../Dashboard/LoginContainer.php">Login</a>&nbsp;</div>
                                                                        </div>
                                                                        <p class="p-sm" style="color: #fff; margin-top: 15px; letter-spacing: -0.9px;">*Based on client assets per the 2025 monthly Retail Forex Obligation reports published by the CFTC.<span style="color: #131313;">&nbsp;</span></p>
                                                                        <style>
                                                                            #hpheader .two-column-callout {
                                                                                background-color: transparent !important;
                                                                            }

                                                                            @media (max-width: 419px) {
                                                                                .hpherobuttons .button-bordered-secondary {
                                                                                    margin-top: 15px;
                                                                                }
                                                                            }

                                                                            @media (min-width: 420px) {
                                                                                .hpherobuttons {
                                                                                    display: flex;
                                                                                }
                                                                            }

                                                                            @media (max-width: 768px) {
                                                                                .stonex100years img {
                                                                                    margin-top: 15px;
                                                                                }
                                                                            }

                                                                            @media (max-width: 991px) {
                                                                                #hpheader {
                                                                                    background-image: none !important;
                                                                                }
                                                                                #hpheader .two-column-callout {
                                                                                    margin-bottom: -28px;
                                                                                    margin-top: 20px;
                                                                                }
                                                                                #hpheader .additional-content img {
                                                                                    margin-top: -30px;
                                                                                    margin-bottom: 30px;
                                                                                }
                                                                            }

                                                                            @media (min-width: 992px) {
                                                                                #hpheader .callout-body {
                                                                                    width: 50%;
                                                                                }
                                                                                #hpheader {
                                                                                    background-position: calc(70% - 0px) calc(50% + 0px) !important;
                                                                                }
                                                                            }

                                                                            @media (min-width: 992px) {
                                                                                #hpheader h1 {
                                                                                    font-size: 48px !important;
                                                                                    line-height: 60px !important;
                                                                                }
                                                                            }

                                                                            @media (min-width: 992px) and (max-width: 1949px) {
                                                                                #hpheader .two-column-callout {
                                                                                    margin-bottom: 75px;
                                                                                }
                                                                            }

                                                                            @media (min-width: 1950px) and (max-width: 2399px) {
                                                                                #hpheader .two-column-callout {
                                                                                    margin-bottom: 85px;
                                                                                    margin-top: 85px;
                                                                                }
                                                                            }

                                                                            @media (min-width: 2400px) {
                                                                                #hpheader .two-column-callout {
                                                                                    margin-bottom: 200px;
                                                                                    margin-top: 60px;
                                                                                }
                                                                                #hpheader h1 {
                                                                                    width: 110%;
                                                                                }
                                                                            }

                                                                            #hpheader h1 {
                                                                                font-weight: 300;
                                                                            }

                                                                            #hppromocontainer {
                                                                                margin-top: 140px;
                                                                            }

                                                                            /* CTA arrows primary FXCAHP */

                                                                            @media (min-width: 1025px) {
                                                                                #hpheader .button-primary a {
                                                                                    transition: background-color .3s !important;
                                                                                }
                                                                                #hpheader .button-primary a:after {
                                                                                    content: '';
                                                                                    display: inline-block;
                                                                                    position: relative;
                                                                                    width: 10px;
                                                                                    height: 10px;
                                                                                    border-top: 2px solid #fff;
                                                                                    border-right: 2px solid #fff;
                                                                                    transform: rotate(45deg);
                                                                                    margin-left: 10px;
                                                                                    top: 1px;
                                                                                    transition: .3s
                                                                                }
                                                                                #hpheader .button-primary a:hover {
                                                                                    background: #0e6937 !important;
                                                                                    color: #fff !important;
                                                                                    border: none !important;
                                                                                    padding: 13px 19px !important;
                                                                                }
                                                                                #hpheader .button-primary a:hover::after {
                                                                                    content: '';
                                                                                    display: inline-block;
                                                                                    position: relative;
                                                                                    width: 10px;
                                                                                    height: 10px;
                                                                                    border-top: 2px solid #fff;
                                                                                    border-right: 2px solid #fff;
                                                                                    transform: rotate(45deg);
                                                                                    margin-left: 10px;
                                                                                    top: 1px;
                                                                                    transition: .3s
                                                                                }
                                                                                #hpheader .button-primary a:hover::before {
                                                                                    content: '';
                                                                                    display: inline-block;
                                                                                    position: relative;
                                                                                    width: 12px;
                                                                                    height: 10px;
                                                                                    border-top: 2px solid #fff;
                                                                                    top: 5px;
                                                                                    right: -127px;
                                                                                    margin-left: -10px;
                                                                                    transition: .3s;
                                                                                }
                                                                            }

                                                                            /* CTA arrows bordered FXCAHP */

                                                                            @media (min-width: 1025px) {
                                                                                #hpheader .button-bordered-secondary a {
                                                                                    transition: background-color .3s !important;
                                                                                }
                                                                                #hpheader .button-bordered-secondary a:after {
                                                                                    content: '';
                                                                                    display: inline-block;
                                                                                    position: relative;
                                                                                    width: 10px;
                                                                                    height: 10px;
                                                                                    border-top: 2px solid #fff;
                                                                                    border-right: 2px solid #fff;
                                                                                    transform: rotate(45deg);
                                                                                    margin-left: 10px;
                                                                                    top: 1px;
                                                                                    transition: .3s
                                                                                }
                                                                                #hpheader .button-bordered-secondary a:hover {
                                                                                    background: #fff !important;
                                                                                    color: #2e1065 !important;
                                                                                    padding: 11px 20px !important;
                                                                                }
                                                                                #hpheader .button-bordered-secondary a:hover::after {
                                                                                    content: '';
                                                                                    display: inline-block;
                                                                                    position: relative;
                                                                                    width: 10px;
                                                                                    height: 10px;
                                                                                    border-top: 2px solid #2e1065;
                                                                                    border-right: 2px solid #000;
                                                                                    transform: rotate(45deg);
                                                                                    margin-left: 10px;
                                                                                    top: 1px;
                                                                                    transition: .3s
                                                                                }
                                                                            }
                                                                        </style>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="component container col-12 container-dark-background full-width">
                                    <div class="component-content">
                                        <div class="row">
                                         



                                            <div class="component container col-12 px-0">
                                                <div class="component-content">
                                                    <div class="row">

                                                        <div class="component rich-text col-12 spacing-m-t-20 spacing-m-b-10">
                                                            <div class="component-content">
                                                                <!-- TrustBox widget - Horizontal -->
                                                                <div class="trustpilot-widget-container">
                                                                    <div class="trustpilot-widget" data-businessunit-id="56cf59600000ff000589666a" data-font-family="Poppins" data-locale="en-US" data-style-height="28px" data-style-width="100%" data-template-id="5406e65db0d04a09e042d5fc" data-theme="dark" style="position: relative">
                                                                        <iframe title="Customer reviews powered by Trustpilot" loading="auto" src="https://widget.trustpilot.com/trustboxes/5406e65db0d04a09e042d5fc/index.html?businessunitId=56cf59600000ff000589666a&amp;templateId=5406e65db0d04a09e042d5fc#fontFamily=Poppins&amp;locale=en-US&amp;styleHeight=28px&amp;styleWidth=100%25&amp;theme=dark"
                                                                            style="
        position: relative;
        height: 28px;
        width: 100%;
        border-style: none;
        display: block;
        overflow: hidden;
      "></iframe>
                                                                    </div>
                                                                    <p style="
      font-size: 12px;
      line-height: 20px;
      text-align: center;
      letter-spacing: -0.5px;
    ">
                                                                        Trustpilot score based on global ratings of FOREX.com
                                                                    </p>
                                                                </div>
                                                                <!-- End TrustBox widget -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="component container col-12 d-none d-sm-none d-md-none d-lg-none d-xl-none full-width" style="background-image: url('https://www.forex.com/en-us/-/media/project/gain-capital/forex/feature-images/log-in/fxus-login-bg.jpg?extension=webp'); background-position: calc(50% + 0px) calc(50% + 0px); background-repeat: no-repeat; background-size: cover;">
                                    <div class="component-content">
                                        <div class="row">



                                            <div class="component container col-12 spacing-m-t-50 spacing-m-b-50">
                                                <div class="component-content">
                                                    <div class="row"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

<section style="overflow: hidden">
    <div class="container component col-12 full-width" style="width: 100%; max-width: 1200px; height: 520px; margin: 0 auto; box-sizing: border-box;">
        <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
 
  
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
  {
  "allow_symbol_change": true,
  "calendar": false,
  "details": false,
  "hide_side_toolbar": true,
  "hide_top_toolbar": false,
  "hide_legend": false,
  "hide_volume": false,
  "hotlist": false,
  "interval": "D",
  "locale": "en",
  "save_image": true,
  "style": "1",
  "symbol": "BITSTAMP:BTCUSD",
  "theme": "dark",
  "timezone": "Etc/UTC",
  "backgroundColor": "#121f27",
  "gridColor": "rgba(223, 208, 184, 0.08)",
  "watchlist": [],
  "withdateranges": false,
  "compareSymbols": [],
  "studies": [],
  "autosize": true
}
  </script>
</div>
<!-- TradingView Widget END -->
    </div>
</section>

                                <div class="component container col-12 full-width">
                                    <div class="component-content">
                                        <div class="row">
                                            <div class="component cta-with-cards default light col-12 sc-background-image-stretch">
                                                <div class="component-content">
                                                    <div class="cta-body">

                                                        <div class="cta-title field-title">
                                                            Empowering clients since 2001
                                                        </div>
                                                        <div class="cta-description field-text">
                                                            <p>We live and breathe the markets. Since the turn of the century, we've educated traders on what, how, and why to trade to help them realize their ambitions.</p>
                                                            <div class="button button-solid button-primary">
                                                                <a gtmlinkname="Open an account" href="../Dashboard/SignupContainer.php" gtmlinkcontext="main" target="_blank">Open an account</a>
                                                            </div>
                                                            <div style="margin-top: 15px;" class="button button-bordered-primary my-sm">
                                                                <a gtmlinkname="Demo Account" href="../Dashboard/LoginContainer.php" gtmlinkcontext="main" target="_blank">Login</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="cta-cards ">
                                                        <div class="card-simple card-simple-light">
                                                            <div class="card-icon field-darkicon"><img loading="lazy" src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/platforms/compare-platforms/icon-compareplatform-rangeofmarkets-colour.svg?iar=0&extension=webp" alt="Blue icon of a combined bar chart with a line graph"
                                                                    data-variantitemid="{B9BCDE0A-EE7F-4D2F-ADFF-08C2FC406130}" data-variantfieldname="DarkIcon" /></div>

                                                            <div class="card-title field-title">
                                                                Elite products, value, and execution
                                                            </div>
                                                            <div class="card-desc field-text">
                                                                <p>Choose from <a href="/en/InfoPage.php?page=markets"><span style="text-decoration: underline;">80 products</span></a> and selected <a href="/en/InfoPage.php?page=markets"><span style="text-decoration: underline;">futures</span></a>                                                                    through our affiliate.</p>
                                                                <p>Enjoy consistently low trading costs and fast, quality execution.</p>
                                                            </div>
                                                            <div class="arrow-link">
                                                                <a gtmLinkName="Trade markets" href="/en/InfoPage.php?page=markets" gtmLinkContext="main">Trade markets</a>
                                                            </div>
                                                        </div>
                                                        <div class="card-simple card-simple-light">
                                                            <div class="card-icon field-darkicon"><img loading="lazy" src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/landing-page/openfxaccount/icon-openfxaccount-wellprovideyoutools-colour.svg?iar=0&extension=webp" alt="" data-variantitemid="{B596D4BD-3C07-48E1-86EC-E3031FE6131B}"
                                                                    data-variantfieldname="DarkIcon" /></div>

                                                            <div class="card-title field-title">
                                                                Tools designed for your edge
                                                            </div>
                                                            <div class="card-desc field-text">
                                                                <p>Refine your trading with exclusive data tools like <span style="text-decoration: underline;">Performance Analytics</span>. And take full command
                                                                    of your analysis with industry-leading <span style="text-decoration: underline;">TradingView charts</span>.</p>
                                                            </div>
                                                            <div class="arrow-link">
                                                                <a gtmLinkName="Get trading tools" href="/en/InfoPage.php?page=platforms" gtmLinkContext="main">Get trading tools</a>
                                                            </div>
                                                        </div>
                                                        <div class="card-simple card-simple-light">
                                                            <div class="card-icon field-darkicon"><img loading="lazy" src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/nav/fxall-meganav-academy-support-bl.svg?iar=0&extension=webp" alt="Blue chat icon of 2 people and a speech bubble"
                                                                    data-variantitemid="{3D698A3E-3104-41B7-89EB-BB2B1D1DAE15}" data-variantfieldname="DarkIcon" /></div>

                                                            <div class="card-title field-title">
                                                                A superior customer experience
                                                            </div>
                                                            <div class="card-desc field-text">
                                                                <p>Access knowledgeable customer support by phone, email or chat, enjoy convenient online account management tools, and experience a personalized service (selected offerings only).</p>
                                                            </div>
                                                            <div class="arrow-link">
                                                                <a gtmLinkName="Customer support" href="/en/InfoPage.php?page=support" gtmLinkContext="main">Customer support</a>
                                                            </div>
                                                        </div>
                                                        <div class="card-simple card-simple-light">
                                                            <div class="card-icon field-darkicon"><img loading="lazy" src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/markets/icon-market-globalmarketleader-colour.svg?iar=0&extension=webp" alt="Global Market Leader" data-variantitemid="{129B6498-BF0B-4C99-AFB8-4303AE92CA5D}"
                                                                    data-variantfieldname="DarkIcon" /></div>
                                                            <div class="card-title field-title">
                                                                A trusted global leader
                                                            </div>
                                                            <div class="card-desc field-text">
                                                                <p>We're a wholly-owned subsidiary of StoneX Group Inc., a Fortune 50 financial giant.</p>
                                                                <p>As the number 1 broker in the US*, we're regulated, financially stable, and have provided our clients with trading services since 2001.</p>
                                                            </div>
                                                            <div class="arrow-link">
                                                                Financial security
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="component container col-12 container-clean-background px-0 py-xs dark-theme" id="empoweringclients">
                                                <div class="component-content">
                                                    <div class="row">
                                                        <div class="component cta-with-cards default dark col-12 mobile-only full-width sc-background-image-stretch">
                                                            <div class="component-content">
                                                                <div class="cta-body">

                                                                    <div class="cta-title field-title">
                                                                        Empowering clients since 2001
                                                                    </div>
                                                                    <div class="cta-description field-text">
                                                                        <p>We live and breathe the markets. Since the turn of the century, we've educated traders on what, how, and why to trade to help them realize their ambitions.</p>
                                                                        <div class="button button-solid button-primary">
                                                                            <a gtmlinkname="Open an account" href="../Dashboard/SignupContainer.php" gtmlinkcontext="main" target="_blank">Open an account</a>
                                                                        </div>
                                                                        <div style="margin-bottom: -25px; margin-top: 15px;" class="button button-bordered-secondary">
                                                                            <a gtmlinkname="Demo Account" href="../Dashboard/LoginContainer.php" gtmlinkcontext="main" target="_blank">Login</a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <!-- Duplicate trading-value cards removed; the primary cards section above remains available. -->
                                                            </div>
                                                        </div>


                                                        <div class="component rich-text col-12 py-0">
                                                            <div class="component-content">
                                                                <style>
                                                                    @media (min-width: 1440px) {
                                                                        .rich-text .cta-with-cards {
                                                                            padding-right: 0 !important;
                                                                        }
                                                                    }
                                                                </style>

                                                                <div class="cta-with-cards component-content">

                                                                    <p class="desktop-only" style="text-align: right; font-size:14px; margin-top:-15px;">*Based on client assets per the 2025 monthly Retail Forex Obligation reports published by the CFTC</p>

                                                                    <p class="desktop-only" style="text-align: right; font-size:14px;">**0.0 spreads are not available for all products at all times. $7 USD commission per $100k USD traded</p>

                                                                    <p class="mobile-only" style="font-size:14px; padding-left:15px; margin-top:-30px;">*Based on client assets per the 2025 monthly Retail Forex Obligation reports published by the CFTC</p>

                                                                    <p class="mobile-only" style="font-size:14px; padding-left:15px; padding-bottom: 30px;">**0.0 spreads are not available for all products at all times. $7 USD commission per $100k USD traded</p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <!-- Featured Tesla investment carousel -->
<section class="cfxm-tesla-section" aria-labelledby="cfxmTeslaHeading">
  <div class="cfxm-tesla-inner">
    <div class="cfxm-tesla-heading">
      <div>
        <span class="cfxm-tesla-eyebrow">FEATURED OPPORTUNITY</span>
        <h2 id="cfxmTeslaHeading">Explore Tesla</h2>
        <p>Discover Tesla Inc. shares and explore the vehicles behind the brand.</p>
      </div>
      <div class="cfxm-tesla-controls" aria-label="Tesla investment carousel controls">
        <button type="button" class="cfxm-tesla-arrow" id="cfxmTeslaPrev" aria-label="Scroll investments left"><i class="fas fa-chevron-left" aria-hidden="true"></i></button>
        <button type="button" class="cfxm-tesla-arrow" id="cfxmTeslaNext" aria-label="Scroll investments right"><i class="fas fa-chevron-right" aria-hidden="true"></i></button>
      </div>
    </div>
    <div class="cfxm-tesla-track" id="cfxmTeslaTrack" tabindex="0" role="region" aria-label="Featured Tesla investments. Scroll horizontally to view more">
      <article class="cfxm-tesla-card">
        <div class="cfxm-tesla-company-art" aria-hidden="true"><span class="cfxm-tesla-mark">T</span><span class="cfxm-tesla-orbit"></span><span class="cfxm-tesla-art-label">MARKET OPPORTUNITY</span></div>
        <div class="cfxm-tesla-card-body">
          <div class="cfxm-tesla-meta"><span class="cfxm-tesla-pill">EQUITY</span><span class="cfxm-tesla-symbol">TSLA</span></div>
          <h3>Tesla, Inc.</h3>
          <p>Explore an investment linked to Tesla Inc. shares.</p>
          <a class="cfxm-tesla-cta" href="../Dashboard/Stock_Market.php?Symbol=TSLA&amp;Vehicle=company">Invest now <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
        </div>
      </article>
      <article class="cfxm-tesla-card">
        <div class="cfxm-tesla-image"><img src="https://images.unsplash.com/photo-1617788138017-80ad40651399?auto=format&amp;fit=crop&amp;w=900&amp;q=85" alt="Modern electric sedan on the road" loading="lazy"><span class="cfxm-tesla-image-shade"></span><span class="cfxm-tesla-image-label">TESLA COLLECTION</span></div>
        <div class="cfxm-tesla-card-body"><div class="cfxm-tesla-meta"><span class="cfxm-tesla-symbol">TSLA · TESLA INC.</span></div><h3>Model S</h3><p>Electric luxury sedan.</p><a class="cfxm-tesla-cta" href="../Dashboard/Stock_Market.php?Symbol=TSLA&amp;Vehicle=Model%20S">Invest in Tesla <i class="fas fa-arrow-right" aria-hidden="true"></i></a></div>
      </article>
      <article class="cfxm-tesla-card">
        <div class="cfxm-tesla-image"><img src="https://images.unsplash.com/photo-1560958089-b8a1929cea89?auto=format&amp;fit=crop&amp;w=900&amp;q=85" alt="Electric sedan viewed from the front" loading="lazy"><span class="cfxm-tesla-image-shade"></span><span class="cfxm-tesla-image-label">TESLA COLLECTION</span></div>
        <div class="cfxm-tesla-card-body"><div class="cfxm-tesla-meta"><span class="cfxm-tesla-symbol">TSLA · TESLA INC.</span></div><h3>Model 3</h3><p>Electric sport sedan.</p><a class="cfxm-tesla-cta" href="../Dashboard/Stock_Market.php?Symbol=TSLA&amp;Vehicle=Model%203">Invest in Tesla <i class="fas fa-arrow-right" aria-hidden="true"></i></a></div>
      </article>
      <article class="cfxm-tesla-card">
        <div class="cfxm-tesla-image"><img src="https://images.unsplash.com/photo-1568844293986-8d0400bd4745?auto=format&amp;fit=crop&amp;w=900&amp;q=85" alt="Premium electric vehicle exterior" loading="lazy"><span class="cfxm-tesla-image-shade"></span><span class="cfxm-tesla-image-label">TESLA COLLECTION</span></div>
        <div class="cfxm-tesla-card-body"><div class="cfxm-tesla-meta"><span class="cfxm-tesla-symbol">TSLA · TESLA INC.</span></div><h3>Model X</h3><p>Electric performance SUV.</p><a class="cfxm-tesla-cta" href="../Dashboard/Stock_Market.php?Symbol=TSLA&amp;Vehicle=Model%20X">Invest in Tesla <i class="fas fa-arrow-right" aria-hidden="true"></i></a></div>
      </article>
      <article class="cfxm-tesla-card">
        <div class="cfxm-tesla-image"><img src="https://images.unsplash.com/photo-1593941707882-a5bba14938c7?auto=format&amp;fit=crop&amp;w=900&amp;q=85" alt="Electric vehicle in a clean studio setting" loading="lazy"><span class="cfxm-tesla-image-shade"></span><span class="cfxm-tesla-image-label">TESLA COLLECTION</span></div>
        <div class="cfxm-tesla-card-body"><div class="cfxm-tesla-meta"><span class="cfxm-tesla-symbol">TSLA · TESLA INC.</span></div><h3>Model Y</h3><p>Electric crossover.</p><a class="cfxm-tesla-cta" href="../Dashboard/Stock_Market.php?Symbol=TSLA&amp;Vehicle=Model%20Y">Invest in Tesla <i class="fas fa-arrow-right" aria-hidden="true"></i></a></div>
      </article>
    </div>
    <p class="cfxm-tesla-disclaimer"><i class="fas fa-info-circle" aria-hidden="true"></i> Vehicle cards are visual entry points to Tesla Inc. shares, not investments in or ownership of physical cars. Availability depends on the stock catalogue configured on the platform.</p>
  </div>
</section>
<script>
(function () {
  var track = document.getElementById('cfxmTeslaTrack');
  if (!track || track.dataset.ready) return;
  track.dataset.ready = '1';
  function scrollCards(direction) {
    var card = track.querySelector('.cfxm-tesla-card');
    track.scrollBy({left: direction * ((card ? card.getBoundingClientRect().width : 280) + 16), behavior: 'smooth'});
  }
  document.getElementById('cfxmTeslaPrev').addEventListener('click', function () { scrollCards(-1); });
  document.getElementById('cfxmTeslaNext').addEventListener('click', function () { scrollCards(1); });
})();
</script>
<!-- End featured Tesla investment carousel -->

<div class="component container col-12 container-dark-background full-width">
                                    <div class="component-content">
                                        <div class="row">



                                            <div class="component container col-12 px-0 py-lg">
                                                <div class="component-content">
                                                    <div class="row">
                                                        <div class="component two-column-callout col-12 primary-blue-background mobile-reverse-cols reverse-cols">
                                                            <div class="component-content">
                                                                <div class="additional-content">
                                                                    <div class="row">
                                                                        <div class="component plain-html col-12">
                                                                            <div class="component-content">
                                                                                <style>
                                                                                    .custom-video-container {
                                                                                        position: relative;
                                                                                        padding-bottom: 56.25%;
                                                                                        /* 16:9 aspect ratio */
                                                                                        height: 0;
                                                                                        overflow: hidden;
                                                                                        max-width: 100%;
                                                                                        background: #000;
                                                                                    }

                                                                                    .custom-video-container iframe {
                                                                                        position: absolute;
                                                                                        top: 0;
                                                                                        left: 0;
                                                                                        width: 100%;
                                                                                        height: 100%;
                                                                                        border: 0;
                                                                                    }

                                                                                    @media (max-width: 991px) {
                                                                                        .custom-video-container {
                                                                                            padding-bottom: 56.25%;
                                                                                            /* Maintain the aspect ratio */
                                                                                            height: 0;
                                                                                            max-width: 100%;
                                                                                        }
                                                                                    }
                                                                                </style>
                                                                                <div class="custom-video-container">
                                                                                    <iframe src="https://www.youtube.com/embed/videoseries?si=XtS2pI-rg8ljs1P3&amp;list=PLn5J4Y4zB8S633GGFQug0uWVqW8KpFpaX&amp;rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="callout-body">

                                                                    <div class="callout-title field-callouttitle">
                                                                        <span class="follow-social" style="color: #ffffff;">Follow us for the latest analysis, views and breaking news</span>
                                                                    </div>
                                                                    <div class="callout-desc field-callouttext">
                                                                        <style>
                                                                            /* Flexbox for icon containers */

                                                                            #containersocials {
                                                                                display: flex;
                                                                            }

                                                                            /* Style for icon boxes */

                                                                            #containersocials .icon-box-b {
                                                                                width: 50px;
                                                                                height: 50px;
                                                                                background-color: #fff;
                                                                                border-radius: 10px;
                                                                                margin: 5px 25px 5px 5px;
                                                                                overflow: hidden;
                                                                                display: flex;
                                                                                justify-content: center;
                                                                                align-items: center;
                                                                                transition: background-color 0.3s ease;
                                                                            }

                                                                            #containersocials .icon-box-b img {
                                                                                width: 55%;
                                                                                height: auto;
                                                                                display: block;
                                                                                margin: auto;
                                                                            }
                                                                        </style>
                                                                        <div style="margin-left: -5px">
                                                                            <h3 style="margin-left: 5px; font-size: 16px; font-weight: 600; color: #fff">
                                                                                CONNECT
                                                                            </h3>
                                                                            <div id="containersocials">
                                                                                <a href="https://www.youtube.com/c/forexcom" class="icon-box-b youtube">
                                                                                    <div>
                                                                                        <imgsrc="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/core/footer-icons/social/youtube-icon-12225c.svg?extension=webp&amp;hash=3618AA193C5EBF0C0BA8D4893367376D" alt="YouTube Icon" data-zoomable-image="true" class="prevent-zoom" />
                                                                                    </div>
                                                                                </a>
                                                                                <a href="https://www.tradingview.com/broker/FOREXcom/" class="icon-box-b tradingview">
                                                                                    <div>
                                                                                        <img style="width: 70%"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/core/footer-icons/social/tradingview-icon-12225c.svg?extension=webp&amp;hash=D01517B1F6173C33600B8DD5CD133693" alt="TradingView Icon" data-zoomable-image="true" class="prevent-zoom"
                                                                                        />
                                                                                    </div>
                                                                                </a>
                                                                                <a href="https://x.com/forexcom" class="icon-box-b x">
                                                                                    <div>
                                                                                        <img style="width: 45%"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/core/footer-icons/social/x-icon-1222c.svg?extension=webp&amp;hash=A1E1DE9AF40879D85C0D17C16FFE41A5" alt="X Icon" data-zoomable-image="true" class="prevent-zoom" />
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="button button-bordered-secondary my-sm" style="padding-top: 10px">
                                                                                
      View All Interactive Livestreams
    
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="component container col-12">
                                                <div class="component-content">
                                                    <div class="row"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="component container col-12 full-width container-white-background">
                                    <div class="component-content">
                                        <div class="row">



                                            <div class="component container col-12 spacing-m-t-15 spacing-m-b-15 px-0">
                                                <div class="component-content">
                                                    <div class="row">
                                                        <div class="component two-column-callout col-12 spacing-m-t-15 spacing-m-b-15 mobile-reverse-cols" id="financialstrength">
                                                            <div class="component-content">
                                                                <div class="additional-content">
                                                                    <div class="row">
                                                                        <div class="component image file-type-icon-media-link col-12">
                                                                            <div class="component-content">
                                                                                <img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/vectors-logos-and-graphics/logos/about-us/stonex-logo-bl-new.svg?iar=0&amp;extension=webp" alt="StoneX Logo" data-variantitemid="{5B9D7D33-1FF6-425E-83A3-518C05964030}" data-variantfieldname="Image"
                                                                                /><span class="image-caption field-imagecaption"></span> </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="callout-body">

                                                                    <div class="callout-title field-callouttitle">
                                                                        Financial strength you can depend on
                                                                    </div>
                                                                    <div class="callout-desc field-callouttext">
                                                                        <p>We are a wholly-owned subsidiary of StoneX Group Inc. (NASDAQ: SNEX), a publicly traded company. We hold ourselves to the highest standards of corporate governance, financial reporting
                                                                            and disclosure.</p>

                                                                        <div class="button button-bordered-primary">
                                                                            <a href="https://www.stonex.com/about/" rel="noopener noreferrer" target="_blank">About StoneX</a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="component container col-12 desktop-only container-dark-background full-width" style="background-image: url('https://www.forex.com/en-us/-/media/project/gain-capital/forex/feature-images/home/fxus/fxus-raw-pricing-module-background.jpg?extension=webp'); background-position: calc(50% + 0px) calc(50% + 0px); background-repeat: no-repeat; background-size: cover;">
                                    <div class="component-content">
                                        <div class="row">



                                            <div class="component container col-12 spacing-m-t-15 spacing-m-b-15 px-0">
                                                <div class="component-content">
                                                    <div class="row">
                                                        <div class="component two-column-callout col-12 spacing-m-t-15 spacing-m-b-15 mobile-reverse-cols reverse-cols" id="spreads">
                                                            <div class="component-content">
                                                                <div class="additional-content">
                                                                    <div class="row">
                                                                        <div class="component image file-type-icon-media-link col-12">
                                                                            <div class="component-content">
                                                                                <img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/feature-images/home/fxca/raw-pricing-module-text-desktop-v3.svg?iar=0&amp;extension=webp" alt="RAW Pricing Module Text Desktop v3" data-variantitemid="{43C3EB86-7B25-456D-8A20-BD42580B451A}"
                                                                                    data-variantfieldname="Image" /><span class="image-caption field-imagecaption"></span> </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="callout-body">
                                                                    <div class="callout-desc field-callouttext">
                                                                        <!-- -- H tags removed from the desktop version so as not to have duplicated heading tags ---->
                                                                        <div class="desktop-only">
                                                                            <span style="color: #fff!important;">
<p class="custom" style="font-size:36px; margin-bottom: 0.5em;">Pushing Your Trading Forward</p>
<br />
<p class="custom" style="font-size:28px; margin-bottom: 0.5em;">Next-Gen Pricing Model</p>
<br />
<p>Take control of your trading needs with super-tight spreads as low as 0.0 for major pairs with a $7 USD commission per $100k USD traded.</p>
<p>Explore the advantages of our RAW Spread pricing.</p>
</span>
                                                                        </div>
                                                                        <div class="mobile-only">
                                                                            <span style="color: #fff!important;">
<h2>Pushing Your Trading Forward</h2>
<br />
<h3>Next-Gen Pricing Model</h3>
<br />
<p>Take control of your trading needs with super-tight spreads as low as 0.0 for major pairs with a $7 USD commission per $100k USD traded.</p>
<p>Explore the advantages of our RAW Spread pricing.</p>
</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="button button-solid button-primary">
                                                                        <a gtmLinkName="Open a RAW Pricing Account" href="/en/InfoPage.php?page=plans" title="open an account" gtmLinkContext="main" target="_blank">Open a RAW Pricing Account</a>
                                                                    </div>



                                                                    <div class="py-xs button button-bordered-secondary">
                                                                        Learn about RAW Pricing
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="component container col-12 full-width">
                                    <div class="component-content">
                                        <div class="row">



                                            <div class="component container mobile-center-align full-width px-0 py-lg surface-one-background">
                                                <div class="component-content">
                                                    <div class="row">



                                                        <div class="component container col-12 mobile-center-align px-0 py-lg">
                                                            <div class="component-content">
                                                                <div class="row">

                                                                    <div class="component reusable-title col-12 position-center mobile-center-align">
                                                                        <div class="component-content">
                                                                            <h2 class="field-title">Tight spreads backed by quality execution</h2>
                                                                        </div>
                                                                    </div>




                                                                    <div class="component container col-12 py-sm">
                                                                        <div class="component-content">
                                                                            <div class="row"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="component pricing-component default col-12" id="forex-table">
                                                                        <div class="component-content">


                                                                            <div class="market-prices" data-widget="rates-table" data-settings='{"Fields":[{"Name":"Product","Label":"Name","Style":0},{"Name":"Bid","Label":"Sell","Style":0},{"Name":"Offer","Label":"Buy","Style":0},{"Name":"MedianSpread","Label":"Spread","Style":0}],"Tabs":[{"Code":"Commission","ProductType":"CFD","DisplayName":"Forex"}],"Watchlists":[],"DisableStreaming":false,"IsCondensed":false,"DesktopNumberOfItems":5,"MobileNumberOfItems":5,"MarketType":{"Code":null,"DisplayName":null},"ProductType":{"Code":"CFD","DisplayName":"CFD"},"IsGlobalInstrumentsSearch":false,"Urls":{"FX":"/en-us/forex-trading/","INDEX":null,"EquityCommonStock":null,"CRYPTOCURRENCY":null,"Metals":null,"Commission":"/en-us/forex-trading/"},"ChartsUrl":" https://standalonecharts.svc.cityindex.com/?&username=forexusbackendtestaccount@test.com&session=bd363f14-3bda-433e-a737-bb15f360b9b0","SiteId":"{753454D7-4EEA-4D0D-9A56-528127813A34}","StreamUrl":"https://rates-live.efxnow.com","UseNumericPagination":false,"DefaultProducts":["EUR USD","USD JPY","GBP USD","AUD USD","EUR GBP","GBP CAD","GBP AUD","EUR CNH","XAG USD","XAU USD"],"ShowOnlyDefaultProducts":false,"LanguageCode":"en","SearchBoxOptions":{"SearchCluster":"{5039C6FD-784C-4A94-B5A7-C13BF6114765}","SuggestionsCount":7,"SiteSearchPath":"","SearchResultsPageUrl":"/en-us/search-results/","SiteName":"FOREX US CD"}}'
                                                                                data-desktop-number-of-items="5" data-mobile-number-of-items="5" data-condensed="" data-product-type="CFD" data-initial-market="" data-stream-url="https://rates-live.efxnow.com"
                                                                                data-enable-stream="true" data-locales='{"SEARCH_PLACEHOLDER":"Search the instruments" ,"SHOW_MORE":"Show more","SORT_BY":"Sort by", "Live (indicative) updated:":"Indicative Pricing updated","No results found":"No Results Found","No search results":"No search results"}'></div>

                                                                            <div class="rich-text my-lg field-disclaimer"></div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="component rich-text col-12">
                                                                        <div class="component-content">
                                                                            <p style="text-align: center; font-size: 12px;">During times of high volatility and/or low liquidity, spreads may be higher than the typical and as low as spreads published on the website. This can include, but is not limited
                                                                                to the market open and around 5 pm EST during trading hours. Typical spreads may not be available for Managed Accounts and accounts referred by an Introducing Broker.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="component container col-12 full-width" id="vipcontainer" style="background-image: url('https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/professional/fxus-active-trader-refresh/fx-vip-dark-texture-hp.webp'); background-position: calc(50% + 0px) calc(50% + 0px); background-repeat: no-repeat; background-size: cover;">
                                                <div class="component-content">
                                                    <div class="row">



                                                        <div class="component container col-12 px-0">
                                                            <div class="component-content">
                                                                <div class="row">



                                                                    <div class="component container col-12 desktop-only spacing-m-t-15 spacing-m-b-15">
                                                                        <div class="component-content">
                                                                            <div class="row"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="component two-column-callout col-12 spacing-m-t-20 spacing-m-b-20" id="vip">
                                                                        <div class="component-content">
                                                                            <div class="additional-content">
                                                                                <div class="row">
                                                                                    <div class="component plain-html col-12">
                                                                                        <div class="component-content">
                                                                                            <style>
                                                                                                .custom-video-container {
                                                                                                    position: relative;
                                                                                                    padding-bottom: 56.25%;
                                                                                                    /* 16:9 aspect ratio */
                                                                                                    height: 0;
                                                                                                    overflow: hidden;
                                                                                                    max-width: 100%;
                                                                                                    background: #000;
                                                                                                }

                                                                                                .custom-video-container iframe {
                                                                                                    position: absolute;
                                                                                                    top: 0;
                                                                                                    left: 0;
                                                                                                    width: 100%;
                                                                                                    height: 100%;
                                                                                                    border: 0;
                                                                                                }

                                                                                                @media (max-width: 991px) {
                                                                                                    .custom-video-container {
                                                                                                        padding-bottom: 56.25%;
                                                                                                        /* Maintain the aspect ratio */
                                                                                                        height: 0;
                                                                                                        max-width: 100%;
                                                                                                    }
                                                                                                }
                                                                                            </style>
                                                                                            <div class="custom-video-container">
                                                                                                <iframe width="560" height="315" src="https://www.youtube.com/embed/xO6qLmlLQZk?autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
</iframe>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="callout-body">

                                                                                <div class="callout-title field-callouttitle">
                                                                                    Trade with us to unlock a refined trading experience
                                                                                </div>
                                                                                <div class="callout-desc field-callouttext">
                                                                                    <ul style="font-weight: 500;">
                                                                                        <li>Up to 4% APY interest on your average available margin*</li>
                                                                                        <li>Monthly cash rewards for trading volume</li>
                                                                                        <li>White-glove service</li>
                                                                                        <li>One-to-one relationship management</li>
                                                                                        <li>Exclusive event access</li>
                                                                                        <li>TradingView subscription plan reimbursement</li>
                                                                                    </ul>
                                                                                    <p class="p-sm">
                                                                                        Trade with us to unlock a refined trading experience<br /> *T&amp;C apply
                                                                                    </p>
                                                                                </div>
                                                                                <div class="button button-bordered-primary">
                                                                                    <a gtmLinkName="VIP" href="/en/InfoPage.php?page=about" title="FOREX.com VIP" gtmLinkContext="main">FOREX.com VIP</a>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>




                                                                    <div class="component container col-12 desktop-only spacing-m-t-15 spacing-m-b-15">
                                                                        <div class="component-content">
                                                                            <div class="row"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="component container col-12 mobile-only container-dark-background full-width">
                                                <div class="component-content">
                                                    <div class="row">



                                                        <div class="component container col-12 spacing-m-t-15 px-0">
                                                            <div class="component-content">
                                                                <div class="row">
                                                                    <div class="component two-column-callout col-12 spacing-m-t-15 mobile-reverse-cols reverse-cols" id="spreads">
                                                                        <div class="component-content">
                                                                            <div class="additional-content">
                                                                                <div class="row">
                                                                                    <div class="component image file-type-icon-media-link col-12">
                                                                                        <div class="component-content">
                                                                                            <img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/feature-images/home/fxca/raw-pricing-module-text-desktop.svg?iar=0&amp;extension=webp" alt="RAW Pricing Module Text Desktop" data-variantitemid="{A794613C-04EB-4882-903B-39D41803E7C5}"
                                                                                                data-variantfieldname="Image" /><span class="image-caption field-imagecaption"></span>                                                                                            </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="callout-body">
                                                                                <div class="callout-desc field-callouttext">
                                                                                    <!-- -- H tags removed from the desktop version so as not to have duplicated heading tags ---->
                                                                                    <div class="desktop-only">
                                                                                        <span style="color: #fff!important;">
<p class="custom" style="font-size:36px; margin-bottom: 0.5em;">Pushing Your Trading Forward</p>
<br />
<p class="custom" style="font-size:28px; margin-bottom: 0.5em;">Next-Gen Pricing Model</p>
<br />
<p>Take control of your trading needs with super-tight spreads as low as 0.0 for major pairs with a $7 USD commission per $100k USD traded.</p>
<p>Explore the advantages of our RAW Spread pricing.</p>
</span>
                                                                                    </div>
                                                                                    <div class="mobile-only">
                                                                                        <span style="color: #fff!important;">
<h2>Pushing Your Trading Forward</h2>
<br />
<h3>Next-Gen Pricing Model</h3>
<br />
<p>Take control of your trading needs with super-tight spreads as low as 0.0 for major pairs with a $7 USD commission per $100k USD traded.</p>
<p>Explore the advantages of our RAW Spread pricing.</p>
</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="button button-solid button-primary">
                                                                                    <a gtmLinkName="Open a RAW Pricing Account" href="/en/InfoPage.php?page=plans" title="open an account" gtmLinkContext="main" target="_blank">Open a RAW Pricing Account</a>
                                                                                </div>



                                                                                <div class="py-xs button button-bordered-secondary">
                                                                                    Learn about RAW Pricing
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="component container col-12 full-width container-gray-background">
                                    <div class="component-content">
                                        <div class="row">



                                            <div class="component container col-12 sm-px-0">
                                                <div class="component-content">
                                                    <div class="row">



                                                        <div class="component container col-12 desktop-only spacing-m-t-10 spacing-m-b-10">
                                                            <div class="component-content">
                                                                <div class="row"></div>
                                                            </div>
                                                        </div>
                                                        <div class="component section-title col-12 spacing-m-t-50">
                                                            <div class="component-content">
                                                                <div class="field-subtitle">
                                                                    <h2 style="text-align: center;"><a style="color: #2e1065; text-decoration: none" href="/en/InfoPage.php?page=platforms">Control, power, and speed. Our app and platforms give you every possible edge.</a></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="component forex-promo title-top col-12 mobile-img-first small-titles py-lg">
                                                            <div class="promo-row">
                                                                <div class="col-text">
                                                                    <div class="component bulleted-list col-12">
                                                                        <div class="component-content">

                                                                            <ul class="link-list-wrapper">
                                                                                <li class="item0 odd first">
                                                                                    <div class="bullet-icon field-icon"><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/platforms/icon-platforms-mobileapp-colour.svg?iar=0&amp;extension=webp" alt="Blue icon of a mobile phone with an arrow "
                                                                                            data-variantitemid="{11A790A2-AD65-4ABF-ADC8-34DE967057FE}" data-variantfieldname="Icon" /></div>
                                                                                    <h3 class="bullet-title field-title">
                                                                                        Mobile app
                                                                                    </h3>

                                                                                    <div class="bullet-desc field-description">Intuitive and packed with tools and features, trade on the go with quick-trading, TradingView charts and tools like Performance Analytics.</div>
                                                                                </li>
                                                                                <li class="item1 even">
                                                                                    <div class="bullet-icon field-icon"><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/icon-webtraderplatform-colour.svg?iar=0&amp;extension=webp" alt="Computer monitor icon in blue"
                                                                                            data-variantitemid="{C3740B38-83D7-408E-983C-78AAB12563EC}" data-variantfieldname="Icon" /></div>
                                                                                    <h3 class="bullet-title field-title">
                                                                                        Web trading
                                                                                    </h3>

                                                                                    <div class="bullet-desc field-description">Trade without compromise. Access TradingView charts with over 80 indicators, Reuters news feeds, behavioral science technology and much more with our web trading platform.</div>
                                                                                </li>
                                                                                <li class="item2 odd last">
                                                                                    <div class="bullet-icon field-icon"><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/platforms/icon-platforms-metatrader-colour.svg?iar=0&amp;extension=webp" alt="Blue MetaTrader icon"
                                                                                            data-variantitemid="{E8F24756-DA38-4D03-9AA7-3F5B00327316}" data-variantfieldname="Icon" /></div>
                                                                                    <h3 class="bullet-title field-title">
                                                                                        MetaTrader
                                                                                    </h3>

                                                                                    <div class="bullet-desc field-description">The popular and powerful MetaTrader platform&nbsp;comes with superior tools, features, and execution - with access to integrated Reuters news as standard.</div>
                                                                                </li>


                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="button button-bordered-primary field-promolink1"><a gtmLinkName="Choose your trading platform" href="/en/InfoPage.php?page=platforms" data-variantitemid="{D7B6B42F-8859-44A8-BD30-8174064EC726}" gtmLinkContext="main" data-variantfieldname="PromoLink1">Choose your trading platform</a></div>
                                                                </div>
                                                                <div class="col-img">
                                                                    <div class="field-promoimage1"><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/feature-images/home/fxall-platforms-laptop-control-power-speed.png?h=1178&amp;iar=0&amp;w=1427&amp;extension=webp" alt="FXUS-Laptop-and-Phones-Platform"
                                                                            width="1427" height="1178" data-variantitemid="{D7B6B42F-8859-44A8-BD30-8174064EC726}" data-variantfieldname="PromoImage1" /></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="component container col-12 mobile-only full-width py-lg" style="background-image: url('https://www.forex.com/en-us/-/media/project/gain-capital/forex/heroes/platforms/tradingview/tradingview-mobile-background-banner-v3.png?extension=webp'); background-position: calc(50% + 0px) calc(50% + 0px); background-repeat: no-repeat; background-size: cover;">
                                    <div class="component-content">
                                        <div class="row">



                                            <div class="component container col-12">
                                                <div class="component-content">
                                                    <div class="row">
                                                        <div class="component two-column-callout col-12 mobile-reverse-cols">
                                                            <div class="component-content">
                                                                <div class="additional-content">
                                                                    <div class="row">
                                                                        <div class="component image file-type-icon-media-link col-12">
                                                                            <div class="component-content">
                                                                                <img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/heroes/platforms/tradingview/tradingview-hp-module-hero-mobile.png?h=643&amp;iar=0&amp;w=690&amp;extension=webp" alt="TradingView HP Module Hero Mobile" width="690" height="643" data-variantitemid="{CDAB91DE-0373-4A11-B8DE-3DB108A8BE16}"
                                                                                    data-variantfieldname="Image" /><span class="image-caption field-imagecaption"></span> </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="callout-body">
                                                                    <div class="callout-desc field-callouttext"><span style="color: #ffffff;">
    <div class="desktop-only"><img style="width: 25%; height: 25%; margin-bottom: 20px;" alt="TV Logo"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/heroes/platforms/tradingview/tv-logo.svg?h=25%25&amp;w=25%25&amp;extension=webp&amp;hash=A19C06E09A832111C7A1285A1C402AE4" /></div>
    <div class="mobile-only"><br /><br /><br /><img style="margin-top: -40px; margin-bottom: 20px; width: 35%; height: 35%;" alt="TV Logo"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/heroes/platforms/tradingview/tv-logo.svg?h=35%25&amp;w=35%25&amp;extension=webp&amp;hash=138F5B27271C4F9DB9D3952AA4873406" /></div>
<h2 style="color: #ffffff;">See your TradingView through our lens</h2>
<br />
<p style="font-size: 18px; color: #ffffff;">Access your FOREX.com account on TradingView.com to unlock a more complete trading experience. Utilize their popular charts, dynamic trade management, and trade ideas from the TradingView user community to inspire your own trading.</p>
</span></div>
                                                                    <div class="button button-bordered-secondary">
                                                                        Explore TradingView
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="component container col-12 desktop-only full-width py-lg" style="background-image: url('https://www.forex.com/en-us/-/media/project/gain-capital/forex/heroes/platforms/tradingview/tradingview-hp-module-hero-desktop-background.png?extension=webp'); background-position: calc(50% + 0px) calc(50% + 0px); background-repeat: no-repeat; background-size: cover;">
                                    <div class="component-content">
                                        <div class="row">



                                            <div class="component container col-12">
                                                <div class="component-content">
                                                    <div class="row">
                                                        <div class="component two-column-callout col-12 mobile-reverse-cols">
                                                            <div class="component-content">
                                                                <div class="additional-content">
                                                                    <div class="row">
                                                                        <div class="component image file-type-icon-media-link col-12">
                                                                            <div class="component-content">
                                                                                <img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/heroes/platforms/tradingview/tradingview-hp-module-hero-mobile.png?h=643&amp;iar=0&amp;w=690&amp;extension=webp" alt="TradingView HP Module Hero Mobile" width="690" height="643" data-variantitemid="{E44634A7-2615-424C-A411-AEB2C553280C}"
                                                                                    data-variantfieldname="Image" /><span class="image-caption field-imagecaption"></span> </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="callout-body">
                                                                    <div class="callout-desc field-callouttext"><span style="color: #ffffff;">
    <div class="desktop-only"><img style="width: 25%; height: 25%; margin-bottom: 20px;" alt="TV Logo"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/heroes/platforms/tradingview/tv-logo.svg?h=25%25&amp;w=25%25&amp;extension=webp&amp;hash=A19C06E09A832111C7A1285A1C402AE4" /></div>
    <div class="mobile-only"><br /><br /><br /><img style="margin-top: -40px; margin-bottom: 20px; width: 35%; height: 35%;" alt="TV Logo"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/heroes/platforms/tradingview/tv-logo.svg?h=35%25&amp;w=35%25&amp;extension=webp&amp;hash=138F5B27271C4F9DB9D3952AA4873406" /></div>
<h2 style="color: #ffffff;">See your TradingView through our lens</h2>
<br />
<p style="font-size: 18px; color: #ffffff;">Access your FOREX.com account on TradingView.com to unlock a more complete trading experience. Utilize their popular charts, dynamic trade management, and trade ideas from the TradingView user community to inspire your own trading.</p>
</span></div>
                                                                    <div class="button button-bordered-secondary">
                                                                        Explore TradingView
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="component container col-12 container-gray-background full-width py-lg">
                                    <div class="component-content">
                                        <div class="row">



                                            <div class="component container col-12 sm-px-0 py-lg">
                                                <div class="component-content">
                                                    <div class="row">

                                                        <div class="component rich-text col-12">
                                                            <div class="component-content">
                                                                <h2 style="margin-bottom: 15px; color: #2e1065;">Curate your FOREX.com experience</h2>
                                                                <p class="desktop-only" style="font-size: 24px; margin-top: 5px; margin-bottom: -10px; color: #2e1065;">What is your experience in trading?</p>
                                                                <p>
                                                                </p>
                                                                <p class="mobile-only" style="margin-bottom: 0px; color: #2e1065;">What is your experience in trading?</p>
                                                                <p> </p>
                                                            </div>
                                                        </div>

                                                        <div class="component dropdown col-12">
                                                            <div class="component-content">
                                                                <div class="dropdown-composite">
                                                                    <div class="dropdown-wrapper">
                                                                        <div>
                                                                            <h2></h2>
                                                                            <div class="dropdown-composite-text">
                                                                                <div class="dropdown-prefix">I&#39;m</div>
                                                                                <div class="dropdown-composite-selected">
                                                                                    <div class="row">
                                                                                        <div class="component content col-12">
                                                                                            <div class="component-content">
                                                                                                <div class="field-dropdownvalue">new to trading</div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <ul class="dropdown-list">



                                                                                        <li tabindex="-1">
                                                                                            <div class="row">
                                                                                                <div class="component content col-12">
                                                                                                    <div class="component-content">
                                                                                                        <div class="field-dropdownvalue">new to trading</div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
                                                                                        <li tabindex="-1">
                                                                                            <div class="row">
                                                                                                <div class="component content col-12">
                                                                                                    <div class="component-content">
                                                                                                        <div class="field-dropdownvalue">an experienced trader</div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </li>

                                                                                    </ul>
                                                                                </div>
                                                                                <div class="dropdown-sufix">and looking for information on:</div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <div class="button button-solid button-primary">

                                                                            </div>
                                                                            <p></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown-composite-content">



                                                                        <div class="dropdown-content">
                                                                            <div class="row">
                                                                                <div class="component personalization-tabs col-12" id="forex-tabs" data-widget="personalization-tabs" data-component-key="{17DA36AF-31C0-43A6-8D9F-D85D3620242F}" data-settings="{&quot;isEdit&quot;:false,&quot;backgroundImage&quot;:null,&quot;tabs&quot;:[{&quot;key&quot;:&quot;756586ae-112e-4d1e-a057-d522b283e8da&quot;,&quot;icon&quot;:{&quot;src&quot;:&quot;https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/icons/platforms/icon-platformoverview-analysethemarket-colour.svg?h=16&amp;w=16&amp;extension=webp&amp;hash=9087739E64F4D77B81A0129C0614E316&quot;,&quot;alt&quot;:&quot;Analyse the market&quot;,&quot;height&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;},&quot;iconActive&quot;:null,&quot;tabTitle&quot;:&quot;Introduction to the financial markets&quot;,&quot;contentTitle&quot;:&quot;Introduction to the financial markets&quot;,&quot;contentText&quot;:&quot;&lt;p&gt;Financial markets are how people and companies buy and sell assets: futures, options, shares, indices, currencies, commodities, and much more.&lt;/p&gt;\n&lt;p&gt;People have traded financial markets for hundreds of years. They grew out of a practical need: to help people buy and sell things more efficiently, and to help companies that need money to raise it quickly.&lt;br /&gt;\n&lt;br /&gt;\n&lt;/p&gt;&quot;,&quot;contentImage&quot;:{&quot;src&quot;:&quot;https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/feature-images/home/fxus/tabs/new/fxus-intro-to-forex-markets.jpg?h=410&amp;w=600&amp;extension=webp&amp;hash=62D0924F9DE1CD97BE234B349CAA420B&quot;,&quot;alt&quot;:&quot;Smartphone user with financial figures in the background&quot;,&quot;height&quot;:&quot;410&quot;,&quot;width&quot;:&quot;600&quot;},&quot;flipImageRight&quot;:&quot;1&quot;,&quot;link&quot;:{&quot;text&quot;:&quot;Discover financial markets&quot;,&quot;target&quot;:&quot;_blank&quot;,&quot;url&quot;:&quot;/en-us/trading-academy/courses/introduction-to-financial-markets/financial-markets-basics/&quot;},&quot;buttonClass&quot;:&quot;button button-bordered-primary&quot;,&quot;HeadingTag&quot;:&quot;div&quot;},{&quot;key&quot;:&quot;bef4febd-280a-4119-8521-97bcae7e3e37&quot;,&quot;icon&quot;:{&quot;src&quot;:&quot;https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/icons/home/fxall-what-is-forex-pound-dollar-bl.svg?h=410&amp;w=600&amp;extension=webp&amp;hash=D0DCCF6406E9EE85AE031E85082CF881&quot;,&quot;alt&quot;:&quot;White icon of $ and &#7c3aed; symbols&quot;,&quot;height&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;},&quot;iconActive&quot;:null,&quot;tabTitle&quot;:&quot;What is forex? &quot;,&quot;contentTitle&quot;:&quot;What is forex? &quot;,&quot;contentText&quot;:&quot;&lt;p&gt;Forex trading is the buying and selling of global currencies. It’s how individuals, businesses, central banks and governments pay for goods and services in other economies.&lt;/p&gt;\n&lt;p&gt;However, the vast majority of forex trades aren’t for practical purposes. Speculative FX traders seek to profit from fluctuations in the exchange rates between currencies, speculating on whether one will go up or down in value compared to another.&lt;br /&gt;\n&lt;br /&gt;\n&lt;/p&gt;&quot;,&quot;contentImage&quot;:{&quot;src&quot;:&quot;https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/education/lessons/introduction-to-financial-markets/what-is-forex/forex-vs-stock-graphic-2023-new.jpg?h=754&amp;w=1280&amp;extension=webp&amp;hash=34D5F11AF541E5E367A82AB77172A07C&quot;,&quot;alt&quot;:&quot;Forex vs Stock Graphic 2023 new&quot;,&quot;height&quot;:&quot;754&quot;,&quot;width&quot;:&quot;1280&quot;},&quot;flipImageRight&quot;:&quot;1&quot;,&quot;link&quot;:{&quot;text&quot;:&quot;Intro to forex&quot;,&quot;target&quot;:&quot;_blank&quot;,&quot;url&quot;:&quot;/en-us/trading-academy/courses/introduction-to-financial-markets/what-is-forex/&quot;},&quot;buttonClass&quot;:&quot;button button-bordered-primary&quot;,&quot;HeadingTag&quot;:&quot;div&quot;},{&quot;key&quot;:&quot;c0a7afdf-be99-48e4-82c2-99f88e4a7f77&quot;,&quot;icon&quot;:{&quot;src&quot;:&quot;https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/icons/nav/fxall-meganav-platform-trading-tools-bl.svg?h=754&amp;w=1280&amp;extension=webp&amp;hash=91E4BD61CB4D4559EF442EAD4FCBEA4C&quot;,&quot;alt&quot;:&quot;Spanner and pencil icon in blue&quot;,&quot;height&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;},&quot;iconActive&quot;:null,&quot;tabTitle&quot;:&quot;Tools overview&quot;,&quot;contentTitle&quot;:&quot;Tools overview&quot;,&quot;contentText&quot;:&quot;&lt;p&gt;Check out our advanced trading tools such as Performance Analytics and useful charting features.&lt;br /&gt;&lt;br /&gt;&lt;/p&gt;&quot;,&quot;contentImage&quot;:{&quot;src&quot;:&quot;https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/feature-images/home/fxus/tabs/new/fxus-tools-overview.jpg?h=400&amp;w=600&amp;extension=webp&amp;hash=A441F745E9CD9B3BCD0FC0C14BE13B99&quot;,&quot;alt&quot;:&quot;Market chart Day trader by FOREX.com&quot;,&quot;height&quot;:&quot;400&quot;,&quot;width&quot;:&quot;600&quot;},&quot;flipImageRight&quot;:&quot;1&quot;,&quot;link&quot;:{&quot;text&quot;:&quot;Trading tools&quot;,&quot;target&quot;:&quot;_blank&quot;,&quot;url&quot;:&quot;/en-us/trading-tools/&quot;},&quot;buttonClass&quot;:&quot;button button-bordered-primary&quot;,&quot;HeadingTag&quot;:&quot;div&quot;},{&quot;key&quot;:&quot;ead5b8ba-a0a0-40a8-aad6-28fe57f16863&quot;,&quot;icon&quot;:{&quot;src&quot;:&quot;https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/icons/platforms/icon-platforms-compare-colour.svg?h=400&amp;w=600&amp;extension=webp&amp;hash=DFA90AC95D4BAA58E7164751E8B1B797&quot;,&quot;alt&quot;:&quot;Icon of two stacked screens in blue&quot;,&quot;height&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;},&quot;iconActive&quot;:null,&quot;tabTitle&quot;:&quot;Platform comparison&quot;,&quot;contentTitle&quot;:&quot;Platform comparison&quot;,&quot;contentText&quot;:&quot;&lt;p&gt;Not sure which is the right FOREX.com platform for you? Check out our handy platform comparison table which will show you all the differences.&lt;br /&gt;&lt;br /&gt;&lt;/p&gt;&quot;,&quot;contentImage&quot;:{&quot;src&quot;:&quot;https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/feature-images/home/fxus/tabs/new/fxus-platform-comparison.png?h=776&amp;w=1200&amp;extension=webp&amp;hash=C4542DC9572A6A285C265CEA2F52948B&quot;,&quot;alt&quot;:&quot;App screenshot of the FOREX.com platform on Web and mobile by FOREX.com&quot;,&quot;height&quot;:&quot;776&quot;,&quot;width&quot;:&quot;1200&quot;},&quot;flipImageRight&quot;:&quot;1&quot;,&quot;link&quot;:{&quot;text&quot;:&quot;See platform comparison table&quot;,&quot;target&quot;:&quot;_blank&quot;,&quot;url&quot;:&quot;/en-us/trading-platforms/compare-trading-platforms/&quot;},&quot;buttonClass&quot;:&quot;button button-bordered-primary&quot;,&quot;HeadingTag&quot;:&quot;div&quot;}]}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="dropdown-content">
                                                                            <div class="row">
                                                                                <div class="component personalization-tabs col-12" data-widget="personalization-tabs" data-component-key="{B86064C6-CD1A-45A7-BA0C-98F0AF6AE67C}" data-settings="{&quot;isEdit&quot;:false,&quot;backgroundImage&quot;:null,&quot;tabs&quot;:[{&quot;key&quot;:&quot;1a4e4921-2bc3-45ad-8b00-aea5e419f92a&quot;,&quot;icon&quot;:{&quot;src&quot;:&quot;https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/icons/landing-page/icon-landing-competitivepricing-colour.svg?h=776&amp;w=1200&amp;extension=webp&amp;hash=B1DD91C041A63559DF7AEFEC75C454DF&quot;,&quot;alt&quot;:&quot;$ price tag icon in blue&quot;,&quot;height&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;},&quot;iconActive&quot;:null,&quot;tabTitle&quot;:&quot;Our costs&quot;,&quot;contentTitle&quot;:&quot;Our Costs&quot;,&quot;contentText&quot;:&quot;&lt;p&gt;Trust is at the heart of our business. That’s why we’re committed to complete transparency about the costs you may incur. Spreads, commissions, and rollovers are all detailed on our dedicated page.&lt;br /&gt;\n&lt;br /&gt;\n&lt;/p&gt;&quot;,&quot;contentImage&quot;:{&quot;src&quot;:&quot;https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/feature-images/home/fxus/tabs/experienced/fxus-our-costs.jpg?h=400&amp;w=600&amp;extension=webp&amp;hash=D86E0CEF9A9469AA45BED58852258AC9&quot;,&quot;alt&quot;:&quot;Close-up of US Dollar to show one of the currencies traded by FOREX.com&quot;,&quot;height&quot;:&quot;400&quot;,&quot;width&quot;:&quot;600&quot;},&quot;flipImageRight&quot;:&quot;1&quot;,&quot;link&quot;:{&quot;text&quot;:&quot;Trading costs&quot;,&quot;target&quot;:&quot;&quot;,&quot;url&quot;:&quot;/en-us/about-us/financial-transparency/trading-costs/&quot;},&quot;buttonClass&quot;:&quot;button button-bordered-primary&quot;,&quot;HeadingTag&quot;:&quot;div&quot;},{&quot;key&quot;:&quot;e0b42a44-b73e-43da-98f5-3e7fb62743c6&quot;,&quot;icon&quot;:{&quot;src&quot;:&quot;https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/icons/education-and-trading-academy/icon-academy-webinars-colour.svg?h=400&amp;w=600&amp;extension=webp&amp;hash=690F030DBF3083BB833E7A1AAE445097&quot;,&quot;alt&quot;:&quot;Blue icon of user avatar and monitor&quot;,&quot;height&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;},&quot;iconActive&quot;:null,&quot;tabTitle&quot;:&quot;Live NFP Coverage&quot;,&quot;contentTitle&quot;:&quot;Live NFP Coverage&quot;,&quot;contentText&quot;:&quot;&lt;p style=\&quot;padding-bottom: 25px;\&quot;&gt;Join our analysts for a 60-minute interactive livestream during the release of the Non-Farm Payroll report for instant analysis of the numbers and what they may mean for the markets.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;/p&gt;&quot;,&quot;contentImage&quot;:{&quot;src&quot;:&quot;https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/feature-images/home/fxus/tabs/experienced/fxus-non-farm-payroll.jpg?h=342&amp;w=600&amp;extension=webp&amp;hash=F5904246F1669F0A7BB375BDF65E56FD&quot;,&quot;alt&quot;:&quot;American flag to highlight content related to US markets traded on FOREX.com&quot;,&quot;height&quot;:&quot;342&quot;,&quot;width&quot;:&quot;600&quot;},&quot;flipImageRight&quot;:&quot;1&quot;,&quot;link&quot;:{&quot;text&quot;:&quot;Live NFP Coverage&quot;,&quot;target&quot;:&quot;&quot;,&quot;url&quot;:&quot;/en-us/trading-academy/webinars/series/nfp-webinar/&quot;},&quot;buttonClass&quot;:&quot;button button-bordered-primary&quot;,&quot;HeadingTag&quot;:&quot;div&quot;},{&quot;key&quot;:&quot;13dcc1dc-027e-455f-a71f-d247c43c9aa1&quot;,&quot;icon&quot;:{&quot;src&quot;:&quot;https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/icons/landing-page/icon-landing-nearinstantexecution-colour.svg?h=342&amp;w=600&amp;extension=webp&amp;hash=2A043B0066F0A4DC9961E8F05153D8E2&quot;,&quot;alt&quot;:&quot;Blue lightning bolt icon&quot;,&quot;height&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;},&quot;iconActive&quot;:null,&quot;tabTitle&quot;:&quot;Pivot Points&quot;,&quot;contentTitle&quot;:&quot;Pivot Points&quot;,&quot;contentText&quot;:&quot;&lt;p style=\&quot;padding-bottom: 25px;\&quot;&gt;Pivot points are a technical indicator that traders use to predict upcoming areas of technical significance, such as support and resistance. They&#39;re calculated by averaging the high, low, and closing prices of a previous period. That could be a day, a week, or a month. &lt;/p&gt;&quot;,&quot;contentImage&quot;:{&quot;src&quot;:&quot;https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/education/lessons/advanced/pivot-points/pivot_points_temp_1.webp?h=342&amp;w=600&amp;hash=4E0F8D5E55C56498CD20125A4FFB1093&quot;,&quot;alt&quot;:&quot;Chart showing Pivot points on a trading academy lessons page by FOREX.com&quot;,&quot;height&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;},&quot;flipImageRight&quot;:&quot;1&quot;,&quot;link&quot;:{&quot;text&quot;:&quot;Pivot Points&quot;,&quot;target&quot;:&quot;_blank&quot;,&quot;url&quot;:&quot;/en-us/trading-academy/courses/advanced-technical-analysis/pivot-points/&quot;},&quot;buttonClass&quot;:&quot;button button-bordered-primary&quot;,&quot;HeadingTag&quot;:&quot;div&quot;},{&quot;key&quot;:&quot;bf99a72e-4c20-40fd-bba3-fdd1e2d82396&quot;,&quot;icon&quot;:{&quot;src&quot;:&quot;https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/icons/platforms/icon-platformoverview-analysethemarket-colour.svg?h=342&amp;w=600&amp;extension=webp&amp;hash=D035E07018CAB132CA657BD4341AA465&quot;,&quot;alt&quot;:&quot;Analyse the market&quot;,&quot;height&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;},&quot;iconActive&quot;:null,&quot;tabTitle&quot;:&quot;Performance Analytics&quot;,&quot;contentTitle&quot;:&quot;Performance Analytics&quot;,&quot;contentText&quot;:&quot;&lt;p style=\&quot;padding-bottom: 25px;\&quot;&gt;Do you know if you do better with long or short trades? Do winning streaks affect your decisions? Identify your strengths and weakness as a trader with our exclusive cutting-edge behavioral science technology &amp;ndash; powered by Chasing Returns.&lt;br /&gt;\n&lt;br /&gt;\n&lt;/p&gt;&quot;,&quot;contentImage&quot;:{&quot;src&quot;:&quot;https://www.cfxm-pro.com/en/-/media/project/gain-capital/forex/feature-images/landing-pages/performance-analytics/fxus-playmaker/fxall-platforms-pa-heroimg.png?h=423&amp;w=600&amp;extension=webp&amp;hash=976272226697E942C14A83BB5A9D9768&quot;,&quot;alt&quot;:&quot;Dashboard of the platforms analytics feature by FOREX.com&quot;,&quot;height&quot;:&quot;423&quot;,&quot;width&quot;:&quot;600&quot;},&quot;flipImageRight&quot;:&quot;1&quot;,&quot;link&quot;:{&quot;text&quot;:&quot;Performance Analytics&quot;,&quot;target&quot;:&quot;&quot;,&quot;url&quot;:&quot;/en-us/performance-analytics-hub/&quot;},&quot;buttonClass&quot;:&quot;button button-bordered-primary&quot;,&quot;HeadingTag&quot;:&quot;div&quot;}]}">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="component container col-12 full-width">
                                    <div class="component-content">
                                        <div class="row">



                                            <div class="component container col-12 px-0">
                                                <div class="component-content">
                                                    <div class="row">
                                                        <div class="component forex-promo mobile-img-first wide-text-col large-image small-titles py-xlg">
                                                            <div class="promo-row">
                                                                <div class="col-text">

                                                                    <div class="promo-title field-promotext">
                                                                        <h2>Use MT5? Get exclusive tools with FOREX.com</h2>
                                                                    </div>

                                                                    <div class="component bulleted-list col-12">
                                                                        <div class="component-content">

                                                                            <ul class="link-list-wrapper">
                                                                                <li class="item0 odd first">
                                                                                    <div class="bullet-icon field-icon"><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/platforms/icon-platforms-personaliseyourplatform-colour.svg?iar=0&amp;extension=webp" alt="" data-variantitemid="{DA07303D-BCD4-4A3E-9AA6-695A5E9C7662}"
                                                                                            data-variantfieldname="Icon" /></div>
                                                                                    <h3 class="bullet-title field-title">
                                                                                        FX Blue
                                                                                    </h3>

                                                                                    <div class="bullet-desc field-description">Get a suite of over 20 apps including custom indicators and nine expert advisors, such as the Sentiment Trader.</div>
                                                                                </li>
                                                                                <li class="item1 even">
                                                                                    <div class="bullet-icon field-icon"><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/nav/fxall-meganav-news-and-analysis-bl.svg?iar=0&amp;extension=webp" alt="Newspaper icon for main navigation - blue transparent"
                                                                                            data-variantitemid="{624F348C-0371-46C8-B54F-651FE184B370}" data-variantfieldname="Icon" /></div>
                                                                                    <h3 class="bullet-title field-title">
                                                                                        Integrated Reuters news
                                                                                    </h3>

                                                                                    <div class="bullet-desc field-description">Unlike most MetaTrader platforms, you&rsquo;ll have free access to integrated Reuters news.</div>
                                                                                </li>
                                                                                <li class="item2 odd last">
                                                                                    <div class="bullet-icon field-icon"><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/landing-page/icon-landing-trigertradesandordersautomatically-colour.svg?iar=0&amp;extension=webp"
                                                                                            alt="Blue icon of finger pressing a button" data-variantitemid="{AFC6457A-ACDE-4539-B465-1029F619C213}" data-variantfieldname="Icon" /></div>
                                                                                    <h3 class="bullet-title field-title">
                                                                                        Seamless experience
                                                                                    </h3>

                                                                                    <div class="bullet-desc field-description">Tap into the platform’s features in real-time and with no third-party bridges.</div>
                                                                                </li>


                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="button button-bordered-primary field-promolink1">MetaTrader</div>
                                                                </div>
                                                                <div class="col-img">
                                                                    <div class="field-promoimage1"><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/feature-images/platforms/metatrader/fxall-metatrader-xx-for-desktop.png?h=716&amp;iar=0&amp;w=1000&amp;extension=webp"
                                                                            alt="Screen with the FOREX.com MetaTrader 5 dashboard" width="1000" height="716" data-variantitemid="{742ED40B-9405-4107-BE06-10BFE19E5BCE}" data-variantfieldname="PromoImage1" /></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="component container col-12 full-width px-0">
                                    <div class="component-content">
                                        <div class="row">



                                            <style>
                                                .overlapping-container--5cb37410-a276-4d2a-a99f-d0d024af6b38::before,
                                                .overlapping-container--5cb37410-a276-4d2a-a99f-d0d024af6b38::after {
                                                    content: '';
                                                    position: relative;
                                                    display: block;
                                                    width: 100%;
                                                }

                                                .overlapping-container--5cb37410-a276-4d2a-a99f-d0d024af6b38::before {
                                                    height: 0px;
                                                }

                                                .overlapping-container--5cb37410-a276-4d2a-a99f-d0d024af6b38::after {
                                                    height: 0px;
                                                }

                                                @media (min-width: 576px) {
                                                    .overlapping-container--5cb37410-a276-4d2a-a99f-d0d024af6b38::before {
                                                        height: 0px;
                                                    }
                                                    .overlapping-container--5cb37410-a276-4d2a-a99f-d0d024af6b38::after {
                                                        height: 0px;
                                                    }
                                                }

                                                @media (min-width: 768px) {
                                                    .overlapping-container--5cb37410-a276-4d2a-a99f-d0d024af6b38::before {
                                                        height: 0px;
                                                    }
                                                    .overlapping-container--5cb37410-a276-4d2a-a99f-d0d024af6b38::after {
                                                        height: 0px;
                                                    }
                                                }

                                                @media (min-width: 992px) {
                                                    .overlapping-container--5cb37410-a276-4d2a-a99f-d0d024af6b38::before {
                                                        height: 50px;
                                                    }
                                                    .overlapping-container--5cb37410-a276-4d2a-a99f-d0d024af6b38::after {
                                                        height: 60px;
                                                    }
                                                }

                                                @media (min-width: 1200px) {
                                                    .overlapping-container--5cb37410-a276-4d2a-a99f-d0d024af6b38::before {
                                                        height: 0px;
                                                    }
                                                    .overlapping-container--5cb37410-a276-4d2a-a99f-d0d024af6b38::after {
                                                        height: 60px;
                                                    }
                                                }
                                            </style>

                                            <div class="component overlapping-container overlapping-container--5cb37410-a276-4d2a-a99f-d0d024af6b38 container-dark-background--after col-12">
                                                <div class="row">



                                                    <div class="component container col-12 sm-px-0">
                                                        <div class="component-content">
                                                            <div class="row">
                                                                <div class="component cta-bar cta-bar-image col-12">
                                                                    <div class="component-content">
                                                                        <div>

                                                                            <div class="field-ctabartitle">
                                                                                Stay one step ahead
                                                                            </div>
                                                                            <div class="field-ctabarsubtitle">The markets are always moving. Get the latest news and analysis.</div>
                                                                        </div>
                                                                        <div class="button button-solid button-teritary">
                                                                            <a gtmLinkName="News and analysis" href="/en/InfoPage.php?page=insights" gtmLinkContext="main">News and analysis</a>
                                                                        </div><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/shared/academy/shutterstock-1118101037-candle-bg2x.png?h=342&amp;iar=0&amp;w=2460&amp;extension=webp" alt="candle background"
                                                                            width="2460" height="342" data-variantitemid="{C6BE57E2-A534-40A0-9CD6-12EDB211B382}" data-variantfieldname="CTABarBackgroundImage" /> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="component container col-12 container-dark-background full-width py-lg dark-theme">
                                    <div class="component-content">
                                        <div class="row">



                                            <div class="component container col-12 offset-lg-12 px-0">
                                                <div class="component-content">
                                                    <div class="row">
                                                        <div class="component container mi-related-articles">
                                                            <div class="component-content">
                                                                <h2>
                                                                    Latest articles
                                                                </h2>
                                                                <div class="mi-related-articles__tiles">
                                                                    <div class="mi-related-articles__tile">
                                                                        <div class="mi-related-article">
                                                                            
                                    <img class="mi-related-article__thumbnail" src="https://micms.stonex.com/cdn-cgi/image/width=500,quality=90/sites/default/files/2024-12/mexico_07.jpg" alt="USD/MXN Outlook: Is appetite for the Mexican peso finally returning?" />
                                <h4 class="mi-related-article__title">
                                    USD/MXN Outlook: Is appetite for the Mexican peso finally returning?
                                </h4>
                            

                                                                            <div class="mi-related-article__footer">
                                                                                <div class="mi-related-article__author">By Julian Pineda</div>
                                                                                <div class="mi-related-article__date">April 01, 2026 03:06 PM</div>
                                                                            </div>
                                                                            <div class="mi-related-article__tags card-tags card-tags_with-hidden-list">
                                                                                <ul class="default-tags">
                                                                                    <li>
                                                                                        
                                                Mexican peso
                                            
                                                                                    </li>
                                                                                    <li>
                                                                                        
                                                Peso
                                            
                                                                                    </li>
                                                                                    <li>
                                                                                        
                                                MXN
                                            
                                                                                    </li>
                                                                                    <li>
                                                                                        
                                                USD MXN
                                            
                                                                                    </li>
                                                                                    <li>
                                                                                        
                                                Forex
                                            
                                                                                    </li>
                                                                                    <li>
                                                                                        
                                                Middle East
                                            
                                                                                    </li>
                                                                                    <li>
                                                                                        
                                                Central banks
                                            
                                                                                    </li>
                                                                                    <li>
                                                                                        
                                                Dollar index
                                            
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mi-related-articles__tile">
                                                                        <div class="mi-related-article">
                                                                            
                                    <img class="mi-related-article__thumbnail" src="https://micms.stonex.com/cdn-cgi/image/width=500,quality=90/sites/default/files/2024-12/NandA_Banner_USD_GBP_EUR.jpg" alt="US Dollar Outlook: Bearish April Seasonality Meets Middle East Wildcard" />
                                <h4 class="mi-related-article__title">
                                    US Dollar Outlook: Bearish April Seasonality Meets Middle East Wildcard
                                </h4>
                            

                                                                            <div class="mi-related-article__footer">
                                                                                <div class="mi-related-article__author">By Matt Simpson</div>
                                                                                <div class="mi-related-article__date">April 01, 2026 04:23 AM</div>
                                                                            </div>
                                                                            <div class="mi-related-article__tags card-tags card-tags_with-hidden-list">
                                                                                <ul class="default-tags">
                                                                                    <li>
                                                                                        
                                                Forex
                                            
                                                                                    </li>
                                                                                    <li>
                                                                                        
                                                DXY
                                            
                                                                                    </li>
                                                                                    <li>
                                                                                        
                                                APAC Session
                                            
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mi-related-articles__tile">
                                                                        <div class="mi-related-article">
                                                                            
                                    <img class="mi-related-article__thumbnail" src="https://micms.stonex.com/cdn-cgi/image/width=500,quality=90/sites/default/files/2026-03/Middle%20East%202_0.jpg" alt="AUD/USD rallies as Trump signals exit without Hormuz fix" />
                                <h4 class="mi-related-article__title">
                                    AUD/USD rallies as Trump signals exit without Hormuz fix
                                </h4>
                            

                                                                            <div class="mi-related-article__footer">
                                                                                <div class="mi-related-article__author">By David Scutt</div>
                                                                                <div class="mi-related-article__date">March 31, 2026 11:41 PM</div>
                                                                            </div>
                                                                            <div class="mi-related-article__tags card-tags card-tags_with-hidden-list">
                                                                                <ul class="default-tags">
                                                                                    <li>
                                                                                        
                                                AUD USD
                                            
                                                                                    </li>
                                                                                    <li>
                                                                                        
                                                Forex
                                            
                                                                                    </li>
                                                                                    <li>
                                                                                        
                                                Trade Ideas
                                            
                                                                                    </li>
                                                                                    <li>
                                                                                        
                                                Technical Analysis
                                            
                                                                                    </li>
                                                                                    <li>
                                                                                        
                                                Fundamental Analysis
                                            
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- /#content -->
        <!-- #footer -->
        <footer>
            <div id="footer" class="container-fluid">
                <div class="row">


                    <div class="component link button button-solid button-primary col-12 show-on-scroll" id="sticky-cta">
                        <div class="component-content">

                            Download the App </div>
                    </div>



                    <div class="component container col-12 container-dark-background full-width">
                        <div class="component-content">
                            <div class="row">



                                <div class="component container col-12 full-width py-sm">
                                    <div class="component-content">
                                        <div class="row">

                                            <div class="row component column-splitter">
                                                <div class="col-12 col-lg-6">
                                                    <div class="row">

                                                        <div class="component rich-text col-12">
                                                            <div class="component-content">
                                                                <p class="custom" style="font-size:24px; margin-top: 0.3em; margin-bottom: 0.3em; line-height: 30px;">It's your world. Trade it.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6 d-none d-lg-flex">
                                                    <div class="row">

                                                        <div class="component link button button-bordered-secondary col-12">
                                                            <div class="component-content">

                                                                <a gtmLinkName="Footer Bar Login Button" href="/Dashboard/LoginContainer.php" data-variantitemid="{E2BD0F66-513C-4451-A8DA-2A7C1654A051}" gtmLinkContext="footer" data-variantfieldname="Link">Log in</a>                                                                </div>
                                                        </div>

                                                        <div class="component link button button-solid button-primary col-12">
                                                            <div class="component-content">

                                                                <a gtmLinkName="Footer Bar Open Account Button" href="../Dashboard/SignupContainer.php" target="_blank" data-variantitemid="{205287E8-6D80-431F-9397-F9DD15F70141}" gtmLinkContext="footer" data-variantfieldname="Link">Open an Account</a>                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="component container spacing-m-t-10">
                        <div class="component-content">
                            <div class="row">



                                <div class="component container col-12 d-block d-sm-block d-md-block d-lg-none d-xl-none centered-flex-content">
                                    <div class="component-content">
                                        <div class="row">
                                            <div class="component image file-type-icon-media-link col-12">
                                                <div class="component-content">
                                                    <img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/shared/logos/part-of-stonex-group-inc/partofstonex-dark---no-side-padding-new.svg?h=56&amp;iar=0&amp;w=263&amp;extension=webp" alt="PartofStoneX dark - No Side Padding new" width="263" height="56"
                                                        data-variantitemid="{539584FA-45A3-4933-A048-20E9CE31CDFF}" data-variantfieldname="Image" /><span class="image-caption field-imagecaption"></span>                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="component container col-12">
                                    <div class="component-content">
                                        <div class="row">

                                            <div class="row component column-splitter">
                                                <div class="col-12 col-lg-4 my-md">
                                                    <div class="row">


                                                        <div class="component icon-link-list simple-image col-12">
                                                            <div class="component-content">
                                                                <div data-as="h2">We accept</div>


                                                                <ul class="">
                                                                    <li class="item0 odd first   cta-with-modal__trigger">
                                                                        <div><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/vectors-logos-and-graphics/logos/credit-cards/fxus-footer-ach.svg?iar=0&amp;extension=webp" alt="ACH logo" data-variantitemid="{3231C6EE-303B-4649-925B-0C3F084BF66D}"
                                                                                data-variantfieldname="LinkIcon" /></div>
                                                                    </li>
                                                                    <li class="item1 even   cta-with-modal__trigger">
                                                                        <div><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/vectors-logos-and-graphics/logos/credit-cards/fxus-footer-mastercard-debit.svg?iar=0&amp;extension=webp" alt="Mastercard debit logo"
                                                                                data-variantitemid="{30C21EA3-1B28-4E49-B0FF-9FB1E0CF0B85}" data-variantfieldname="LinkIcon" /></div>
                                                                    </li>
                                                                    <li class="item2 odd   cta-with-modal__trigger">
                                                                        <div><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/vectors-logos-and-graphics/logos/credit-cards/fxall-footer-visa-debit.svg?iar=0&amp;extension=webp" alt="VISA debit logo"
                                                                                data-variantitemid="{4F083B4E-A1A9-460C-BC59-0EB5E49C2320}" data-variantfieldname="LinkIcon" /></div>
                                                                    </li>
                                                                    <li class="item3 even last   cta-with-modal__trigger">
                                                                        <div><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/vectors-logos-and-graphics/logos/credit-cards/fxus-footer-wire-transfer.svg?iar=0&amp;extension=webp" alt="Wire Transfer logo"
                                                                                data-variantitemid="{9C053F17-3ABF-4488-A8A5-FCCBEF639E8C}" data-variantfieldname="LinkIcon" /></div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3 my-md">
                                                    <div class="row">


                                                        <div class="component icon-link-list col-12 spacing-m-t-20">
                                                            <div class="component-content">
                                                                <div data-as="h3">Connect</div>


                                                                <ul class="">
                                                                    <li class="item0 odd first   cta-with-modal__trigger">
                                                                        <div class="field-linkicon"><a href="https://www.facebook.com/FOREXcom/" gtmLinkContext="footer" rel="noopener noreferrer" gtmLinkName="Facebook" target="_blank"><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/core/footer-icons/social/icon-footer-facebook-white.svg?h=60&amp;iar=0&amp;w=60&amp;extension=webp" alt="White Facebook icon" width="60" height="60" data-variantitemid="{73EB6831-ACE6-474F-9F58-D96552C5EE92}" data-variantfieldname="LinkIcon" /></a></div>
                                                                    </li>
                                                                    <li class="item1 even   cta-with-modal__trigger">
                                                                        <div class="field-linkicon"><a href="https://twitter.com/forexcom" gtmLinkContext="footer" rel="noopener noreferrer" gtmLinkName="X" target="_blank"><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/core/footer-icons/social/icon-footer-x-white.svg?h=60&amp;iar=0&amp;w=60&amp;extension=webp" alt="Icon-Footer-X-White" width="60" height="60" data-variantitemid="{0E2EF217-CD30-4EB4-B59D-3D7C9EA4F939}" data-variantfieldname="LinkIcon" /></a></div>
                                                                    </li>
                                                                    <li class="item2 odd   cta-with-modal__trigger">
                                                                        <div class="field-linkicon"><a href="https://www.instagram.com/forexcomglobal/" gtmLinkContext="footer" rel="noopener noreferrer" gtmLinkName="Instagram" target="_blank"><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/core/footer-icons/social/icon-footer-instagram-white.svg?h=150&amp;iar=0&amp;w=150&amp;extension=webp" alt="Icon-Footer-Instagram-white" width="150" height="150" data-variantitemid="{2A25FA5A-DA1D-44B6-A05F-E5F445FEFB25}" data-variantfieldname="LinkIcon" /></a></div>
                                                                    </li>
                                                                    <li class="item3 even last   cta-with-modal__trigger">
                                                                        <div class="field-linkicon"><a href="https://www.youtube.com/c/forexcom" gtmLinkContext="footer" rel="noopener noreferrer" gtmLinkName="YouTube" target="_blank"><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/core/footer-icons/social/icon-footer-youtube-white.svg?h=60&amp;iar=0&amp;w=60&amp;extension=webp" alt="White YouTube play button icon" width="60" height="60" data-variantitemid="{AC28F71C-1682-497E-9944-2D6138E35E5E}" data-variantfieldname="LinkIcon" /></a></div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-5 my-md">
                                                    <div class="row">


                                                        <div class="component icon-link-list simple-image col-12">
                                                            <div class="component-content">
                                                                <div data-as="h2">Download now</div>


                                                                <ul class="">
                                                                    <li class="item0 odd first   cta-with-modal__trigger">
                                                                        <a href="https://apps.apple.com/us/app/id1506581586" gtmLinkContext="footer" rel="noopener noreferrer" gtmLinkName="Apple" target="_blank">
                                                                            <div><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/core/footer-icons/fxall-landing-pages-app-store.png?h=85&amp;iar=0&amp;w=300&amp;extension=webp" alt="Download on the app store"
                                                                                    width="300" height="85" data-variantitemid="{ECE8C584-A1F8-4DEB-82BD-919BFE398A66}" data-variantfieldname="LinkIcon" /></div>
                                                                        </a>
                                                                    </li>
                                                                    <li class="item1 even   cta-with-modal__trigger">
                                                                        <a href="https://play.google.com/store/apps/details?id=com.gaincapital.forex" gtmLinkContext="footer" rel="noopener noreferrer" gtmLinkName="Google" target="_blank">
                                                                            <div><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/core/footer-icons/fxall-landing-pages-google-store.png?h=85&amp;iar=0&amp;w=300&amp;extension=webp" alt="Get it on Google Play"
                                                                                    width="300" height="85" data-variantitemid="{9B828E9B-F31B-4D29-9264-C05B67F1FBBF}" data-variantfieldname="LinkIcon" /></div>
                                                                        </a>
                                                                    </li>
                                                                    <li class="item2 odd last   cta-with-modal__trigger">
                                                                        
                                                                            <div><img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/forex/icons/core/footer-icons/trade-on-tradingview-button-dark.png?h=512&amp;iar=0&amp;w=1830&amp;extension=webp"
                                                                                    alt="Trade On TradingView Button Dark" width="1830" height="512" data-variantitemid="{FF3A3C8A-47A8-44B0-A3B8-DF2CD4DB7D33}" data-variantfieldname="LinkIcon" /></div>
                                                                        
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row component column-splitter">
                                    <div class="col-12 col-lg-3">
                                        <div class="row">



                                            <div class="component link-list vertical col-12">
                                                <div class="component-content">
                                                    <div data-as="h3">Tell me more about</div>
                                                    <ul class="link-list-wrapper">
                                                        <li class="item0 odd first cta-with-modal__trigger">
                                                            <div class="field-link"><a gtmLinkName="Range of Markets" href="/en/InfoPage.php?page=markets" data-variantitemid="{E86C4EA3-99FB-465A-80A5-CF8DFB620B56}" gtmLinkContext="footer" data-variantfieldname="Link">Range of Markets</a></div>
                                                        </li>
                                                        <li class="item1 even cta-with-modal__trigger">
                                                            <div class="field-link"><a gtmLinkName="Trading Platforms" href="/en/InfoPage.php?page=platforms" data-variantitemid="{D08E76CE-C430-402F-A70C-5EE5804025C2}" gtmLinkContext="footer" data-variantfieldname="Link">Trading Platforms</a></div>
                                                        </li>
                                                        <li class="item2 odd cta-with-modal__trigger">
                                                            <div class="field-link">Trading Costs</div>
                                                        </li>
                                                        <li class="item3 even last cta-with-modal__trigger">
                                                            <div class="field-link">Margin Requirements</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="row">



                                            <div class="component link-list vertical col-12">
                                                <div class="component-content">
                                                    <div data-as="h3">I would like to</div>
                                                    <ul class="link-list-wrapper">
                                                        <li class="item0 odd first cta-with-modal__trigger">
                                                            <div class="field-link">Fund My Account</div>
                                                        </li>
                                                        <li class="item1 even cta-with-modal__trigger">
                                                            <div class="field-link">Withdraw Funds</div>
                                                        </li>
                                                        <li class="item2 odd cta-with-modal__trigger">
                                                            <div class="field-link">Download FOREX.com Platforms</div>
                                                        </li>
                                                        <li class="item3 even cta-with-modal__trigger">
                                                            <div class="field-link">Download TradingView</div>
                                                        </li>
                                                        <li class="item4 odd last cta-with-modal__trigger">
                                                            <div class="field-link">Download MT5</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="row">



                                            <div class="component link-list vertical col-12">
                                                <div class="component-content">
                                                    <div data-as="h3">I would like to learn about</div>
                                                    <ul class="link-list-wrapper">
                                                        <li class="item0 odd first cta-with-modal__trigger">
                                                            <div class="field-link">Trading Forex</div>
                                                        </li>
                                                        <li class="item1 even cta-with-modal__trigger">
                                                            <div class="field-link">Managing Risk</div>
                                                        </li>
                                                        <li class="item2 odd cta-with-modal__trigger">
                                                            <div class="field-link">Technical Analysis</div>
                                                        </li>
                                                        <li class="item3 even last cta-with-modal__trigger">
                                                            <div class="field-link">Trading Volatility</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 spacing-m-t-25 spacing-m-b-25">
                                        <div class="row">

                                            <div class="component rich-text col-12 spacing-m-t-10">
                                                <div class="component-content">
                                                    <p class="p-lg" style="margin-bottom: -10px;">Need help? <a href="/en/InfoPage.php?page=support">Contact us</a></p>
                                                </div>
                                            </div>


                                            <div class="component rich-text col-12 d-block d-lg-none py-sm">
                                                <div class="component-content">
                                                    <p class="p-lg" style="margin-top: 20px; margin-bottom: 10px;">Or visit our social channels:</p>
                                                </div>
                                            </div>

                                            <div class="component image file-type-icon-media-link col-12 d-none d-sm-none d-md-none d-lg-block d-xl-block">
                                                <div class="component-content">
                                                    <img loading="lazy"src="https://www.forex.com/en-us/-/media/project/gain-capital/shared/logos/part-of-stonex-group-inc/partofstonex-dark---no-side-padding-new.svg?h=56&amp;iar=0&amp;w=263&amp;extension=webp" alt="PartofStoneX dark - No Side Padding new" width="263" height="56"
                                                        data-variantitemid="{539584FA-45A3-4933-A048-20E9CE31CDFF}" data-variantfieldname="Image" /><span class="image-caption field-imagecaption"></span>                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="component divider col-12">
                                    <div class="component-content">
                                        <hr />
                                    </div>
                                </div>




                                <div class="component link-list horizontal col-12">
                                    <div class="component-content">
                                        <div data-as="h3"></div>
                                        <ul class="link-list-wrapper">
                                            <li class="item0 odd first cta-with-modal__trigger">
                                                <div class="field-link">Disclosures and Risk Warning</div>
                                            </li>
                                            <li class="item1 even cta-with-modal__trigger">
                                                <div class="field-link"><a gtmLinkName="Customer Agreement" href="https://www.filesandimages.com/Brand/forex/pdf/FXUS-Customer-Agreement-November-2025.pdf" target="_blank" rel="noopener noreferrer" data-variantitemid="{BCD5952F-A60F-4C40-A4B0-B3B1DC2F1BE3}"
                                                        gtmLinkContext="footer" data-variantfieldname="Link">Customer Agreement</a></div>
                                            </li>
                                            <li class="item2 odd cta-with-modal__trigger">
                                                <div class="field-link"><a gtmLinkName="Partnerships" href="https://stonexpro.stonex.com/" target="_blank" rel="noopener noreferrer" data-variantitemid="{B9D7AAF4-0B55-4C66-9985-4D85217BAE00}" gtmLinkContext="footer" data-variantfieldname="Link">Partnerships</a></div>
                                            </li>
                                            <li class="item3 even cta-with-modal__trigger">
                                                <div class="field-link"><a gtmLinkName="Investor Relations" href="https://ir.stonex.com/" target="_blank" rel="noopener noreferrer" data-variantitemid="{BD5228A4-5CFB-42F6-BD0A-2DE554A68537}" gtmLinkContext="footer" data-variantfieldname="Link">Investor Relations</a></div>
                                            </li>
                                            <li class="item4 odd last cta-with-modal__trigger">
                                                <div class="field-link"><a gtmLinkName="Press Releases" href="https://www.stonex.com/media-room/" target="_blank" rel="noopener noreferrer" data-variantitemid="{443EBF63-CA82-4268-8312-2CD70A9F32A9}" gtmLinkContext="footer" data-variantfieldname="Link">Press Releases</a></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="component divider col-12">
                                    <div class="component-content">
                                        <hr />
                                    </div>
                                </div>


                                <div class="component rich-text col-12 spacing-m-t-25 spacing-m-b-25">
                                    <div class="component-content">
                                        <p>cfxm-pro.com is a registered EMC and TVASSETS with the CFTC and member of the National Futures Association (NFA # 905285). CFXM PRO trading involves significant risk of loss and is not suitable for all investors. Full Disclosures and Risk Warning.
                                            <strong>Increased leverage increases risk.</strong></p>
                                        <p>GAIN Capital Group LLC (dba cfxm-pro.com) 30 Delaware, USA. Transcient Capital Group LLC </p>
                                       
                                    </div>
                                </div>


                                <div class="row component column-splitter">
                                    <div class="col-12 col-lg-6 order-last order-lg-first spacing-m-b-50">
                                        <div class="row">

                                            <div class="component rich-text col-12">
                                                <div class="component-content">
                                                    <p>&copy; CFXM-PRO.COM 2026</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 order-first order-lg-last">
                                        <div class="row">



                                            <div class="component link-list default col-12">
                                                <div class="component-content">
                                                    <div data-as="h3"></div>
                                                    <ul class="link-list-wrapper">
                                                        <li class="item0 odd first cta-with-modal__trigger">
                                                            <div class="field-link"><a gtmLinkName="Terms and Policies" href="/en/InfoPage.php?page=terms" data-variantitemid="{CEF7E63E-AA00-47F7-99D4-58D28263C9D0}" gtmLinkContext="footer" data-variantfieldname="Link">Terms and Policies</a></div>
                                                        </li>
                                                        <li class="item1 even cta-with-modal__trigger">
                                                            <div class="field-link">Sitemap</div>
                                                        </li>
                                                        <li class="item2 odd last cta-with-modal__trigger">
                                                            <div class="field-link"><a gtmLinkName="StoneX" href="https://www.stonex.com/" target="_blank" rel="noopener noreferrer" data-variantitemid="{938E8B63-B7F5-4A7B-ADCB-54B2BE67A6B4}" gtmLinkContext="footer" data-variantfieldname="Link">StoneX</a></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /#footer -->
    </div>
    <!-- /#wrapper -->





    <script type='text/javascript' defer>
        var initESW = function(gslbBaseURL) {
            embedded_svc.settings.chatbotAvatarImgURL = 'https://www.filesandimages.com/Brand/TradeResource/Images/ChatBotImage-fx.jpg';
            embedded_svc.settings.displayHelpButton = false;

            embedded_svc.settings.enabledFeatures = ['LiveAgent'];
            embedded_svc.settings.entryFeature = 'LiveAgent';
            embedded_svc.settings.autoOpenPostChat = true;
            embedded_svc.settings.language = '';
            embedded_svc.settings.extraPrechatFormDetails = [{
                "label": "Language",
                "value": "",
                "transcriptFields": ["Language__c"]
            }];


            embedded_svc.addEventHandler('afterDestroy', function() {
                document.querySelector('.live-chat-button').classList.remove('chat-opened');
                document.querySelector('.live-chat-button').classList.remove('chat-loading');
            });

            embedded_svc.addEventHandler('onQueueUpdate', function() {
                document.querySelector('.live-chat-button').classList.remove('chat-loading');
                document.querySelector('.live-chat-button').classList.add('chat-opened');
            });

            embedded_svc.init('https://gaincapital.my.salesforce.com',
                'https://gaincapital.my.salesforce-sites.com/G2NMI',
                gslbBaseURL,
                '00D300000000CHg',
                'Forex_com_US', {
                    baseLiveAgentContentURL: 'https://c.la3-core1.sfdc-yfeipo.salesforceliveagent.com/content',
                    deploymentId: '5727V00000000fg',
                    buttonId: '5737V00000000r8',
                    baseLiveAgentURL: 'https://d.la3-core1.sfdc-yfeipo.salesforceliveagent.com/chat',
                    eswLiveAgentDevName: 'EmbeddedServiceLiveAgent_Parent04I7V000000CaTEUA0_179f07aea2c',
                    isOfflineSupportEnabled: false
                });
        };

        if (!window.embedded_svc) {
            var s = document.createElement('script');
            s.setAttribute('src', 'https://gaincapital.my.salesforce.com/embeddedservice/5.0/esw.min.js');
            s.onload = function() {
                initESW(null);
            };
            document.body.appendChild(s);
        } else {
            initESW('https://service.force.com');
        };
    </script>

    <script type='text/javascript'>
        function bootstrapChat() {
            embedded_svc.bootstrapEmbeddedService();
            document.querySelector('.live-chat-button').classList.add('chat-loading');
        }
    </script>



    <button type="button" class="live-chat-button" onclick="bootstrapChat()">
    LET US HELP
</button>


    <style>
        @media (min-width: 992px) {
            #empoweringclients .cta-with-cards {
                margin-top: -30px;
            }
        }

        @media (min-width: 1025px) {
            /* Primary Buttons excluding .page-heading and #spreads */
            .button-primary a:not(.page-heading .button-primary a):not(#spreads .button-primary a) {
                transition: background-color .3s !important;
            }
            .button-primary a:not(.page-heading .button-primary a):not(#spreads .button-primary a):after {
                content: '';
                display: inline-block;
                position: relative;
                width: 10px;
                height: 10px;
                border-top: 2px solid #fff;
                border-right: 2px solid #fff;
                transform: rotate(45deg);
                margin-left: 10px;
                top: 1px;
                transition: .3s;
            }
            .button-primary a:not(.page-heading .button-primary a):not(#spreads .button-primary a):hover:after {
                top: 1px;
            }
            .button-primary a:not(.page-heading .button-primary a):not(#spreads .button-primary a):hover:before {
                content: '';
                display: inline-block;
                position: relative;
                width: 10px;
                height: 10px;
                border-top: 2px solid #fff;
                top: 5px;
                right: -154px;
                margin-left: -10px;
                transition: .3s;
            }
            /* Button styles for cta-with-cards */
            #hpheader .button-bordered-secondary a,
            .cta-with-cards .button-bordered-secondary a {
                transition: background-color .3s !important;
            }
            #hpheader .button-bordered-secondary a:after,
            .cta-with-cards .button-bordered-secondary a:after {
                content: '';
                display: inline-block;
                position: relative;
                width: 10px;
                height: 10px;
                border-top: 2px solid #fff;
                border-right: 2px solid #fff;
                transform: rotate(45deg);
                margin-left: 10px;
                top: 1px;
                transition: .3s;
            }
            #hpheader .button-bordered-secondary a:hover,
            .cta-with-cards .button-bordered-secondary a:hover {
                background: #fff !important;
                color: #2e1065 !important;
                padding: 11px 20px !important;
            }
            #hpheader .button-bordered-secondary a:hover:after,
            .cta-with-cards .button-bordered-secondary a:hover:after {
                border-top: 2px solid #2e1065;
                border-right: 2px solid #000;
                top: 1px;
            }
        }
    </style>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "WebSite",
            "url": "https://www.cfxm-pro.com/en/",
            "name": "FOREX.com",
            "image": {
                "@type": "ImageObject",
                "url": "https://www.forex.com/-/media/project/gain-capital/forex/heroes/landing-pages/interest-promotion/five-percent-promo/fx-5pct-interest-rate-nav-graphic.png",
                "caption": "Financial instrument trading using Forex.com online web trading and mobile app trading software."
            },
            "inLanguage": "en-US",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://www.cfxm-pro.com/en/search-results/?q={search_term_string}",
                "query-input": "required name=search_term_string"
            },
            "publisher": {
                "@type": "Corporation",
                "name": "FOREX.com",
                "slogan": "Start trading with No. 1 forex broker in the US*. Our award-winning online forex trading platforms and apps are available on web, desktop and mobile.",
                "description": "Trade on award-winning platforms with the company that has thousands of global offerings, and enjoy the peace of mind that we’re part of StoneX Group – a  NASDAQ-listed financial giant that gives us access to price feeds unavailable to other brokers.",
                "logo": {
                    "@type": "ImageObject",
                    "url": "https://www.forex.com/~/media/forex/images/global/header/forexcom-logo.svg",
                    "caption": "FOREX.com logo"
                },
                "image": "https://www.forex.com/-/media/project/gain-capital/forex/heroes/landing-pages/interest-promotion/five-percent-promo/fx-5pct-interest-rate-nav-graphic.png",
                "knowsAbout": ["Forex", "FX", "Futures", "Gold & Silver"],
                "awards": [
                    "Best FX Provider 2020 - Online Personal Wealth Awards",
                    "Best Trading Analysis Provider 2020 -  Online Personal Wealth Awards",
                    "Best Forex Trading Platform and Best Forex Provider 2020 - London Trader Show",
                    "Best Forex Service Provider 2019 - by Shares Awards"
                ],
                "foundingDate": "1999",
                "foundingLocation": {
                    "@type": "Country",
                    "name": "United States"
                },
                "legalName": "GAIN Global Markets Inc",
                "naics": "5239",
                "duns": "828889019",
                "makesOffer": {
                    "@type": "Offer",
                    "name": "Online Trading",
                    "areaServed": "United States",
                    "eligibleRegion": {
                        "@type": "Country",
                        "name": "United States"
                    },
                    "ineligibleRegion": {
                        "@type": "Continent",
                        "name": "Europe"
                    },
                    "itemOffered": {
                        "@type": "FinancialProduct",
                        "feesAndCommissionsSpecification": "https://www.cfxm-pro.com/en/about-us/financial-transparency/trade-prices/",
                        "name": ["Forex Trading", "Gold Trading", "Silver Trading", "Futures Trading"]
                    }
                },
                "telephone": "+1 (908) 315-0653",
                "address": {
                    "@type": "PostalAddress",
                    "postalCode": "NJ 07059",
                    "streetAddress": "30 Independence Blvd",
                    "addressLocality": "Warren, New York",
                    "addressRegion": "NY",
                    "addressCountry": "United States"
                },
                "contactPoint": [{
                        "@type": "ContactPoint",
                        "contactType": "International Customer Support",
                        "telephone": "+1 (908) 315-0653",
                        "email": "global.support@forex.com",
                        "hoursAvailable": {
                            "@type": "OpeningHoursSpecification",
                            "opens": "00:00:00",
                            "closes": "23:59:59",
                            "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"]
                        },
                        "availableLanguage": "English",
                        "areaServed": "International"
                    },
                    {
                        "@type": "ContactPoint",
                        "contactType": "Toll Free Customer Support",
                        "contactOption": "TollFree",
                        "telephone": "1 (877) 367-3946",
                        "email": "support@forex.com",
                        "hoursAvailable": {
                            "@type": "OpeningHoursSpecification",
                            "opens": "00:00:00",
                            "closes": "23:59:59",
                            "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"]
                        },
                        "availableLanguage": "English",
                        "areaServed": "United States"
                    }
                ],
                "sameAs": [
                    "https://en.wikipedia.org/wiki/GAIN_Capital",
                    "https://www.wikidata.org/wiki/Q5517210",
                    "https://www.crunchbase.com/organization/gain-capital",
                    "https://twitter.com/FOREXcom",
                    "https://www.youtube.com/forex",
                    "https://www.facebook.com/FOREXcom"
                ],
                "parentOrganization": {
                    "@type": "Corporation",
                    "name": "StoneX",
                    "tickerSymbol": "NASDAQ:SNEX",
                    "url": "https://www.stonex.com/",
                    "logo": "https://www.stonex.com/Content/Images/StoneXRTM_edge.svg",
                    "image": "https://www.stonex.com/globalassets/new-homepage-blocks/800x380_homepage_04.21.2020.jpg",
                    "sameAs": [
                        "https://www.nasdaq.com/market-activity/stocks/snex",
                        "https://en.wikipedia.org/wiki/StoneX_Group_Inc.",
                        "https://www.wikidata.org/wiki/Q1666331",
                        "https://www.linkedin.com/company/stonex-group-inc/",
                        "https://www.facebook.com/StoneXGroupInc/",
                        "https://twitter.com/StoneX_Official",
                        "https://www.youtube.com/channel/UC5a8rKMaVmaViwJvmCMl-1Q/"
                    ]
                }
            }
        }
    </script>

    <!-- Usabilla Combicode for FXUS-->
    <!-- Begin Usabilla for Websites embed code -->
    <script type="text/javascript">
        /*{literal}<![CDATA[*/
        window.lightningjs || function(c) {
            function g(b, d) {
                d && (d += (/\?/.test(d) ? "&" : "?") + "lv=1");
                c[b] || function() {
                    var i = window,
                        h = document,
                        j = b,
                        g = h.location.protocol,
                        l = "load",
                        k = 0;
                    (function() {
                        function b() {
                            a.P(l);
                            a.w = 1;
                            c[j]("_load")
                        }
                        c[j] = function() {
                            function m() {
                                m.id = e;
                                return c[j].apply(m, arguments)
                            }
                            var b, e = ++k;
                            b = this && this != i ? this.id || 0 : 0;
                            (a.s = a.s || []).push([e, b, arguments]);
                            m.then = function(b, c, h) {
                                var d = a.fh[e] = a.fh[e] || [],
                                    j = a.eh[e] = a.eh[e] || [],
                                    f = a.ph[e] = a.ph[e] || [];
                                b && d.push(b);
                                c && j.push(c);
                                h && f.push(h);
                                return m
                            };
                            return m
                        };
                        var a = c[j]._ = {};
                        a.fh = {};
                        a.eh = {};
                        a.ph = {};
                        a.l = d ? d.replace(/^\/\//, (g == "https:" ? g : "http:") + "//") : d;
                        a.p = {
                            0: +new Date
                        };
                        a.P = function(b) {
                            a.p[b] = new Date - a.p[0]
                        };
                        a.w && b();
                        i.addEventListener ? i.addEventListener(l, b, !1) : i.attachEvent("on" + l, b);
                        var q = function() {
                            function b() {
                                return ["<head></head><", c, ' onload="var d=', n, ";d.getElementsByTagName('head')[0].", d, "(d.", g, "('script')).", i, "='", a.l, "'\"></", c, ">"].join("")
                            }
                            var c = "body",
                                e = h[c];
                            if (!e) return setTimeout(q, 100);
                            a.P(1);
                            var d = "appendChild",
                                g = "createElement",
                                i = "src",
                                k = h[g]("div"),
                                l = k[d](h[g]("div")),
                                f = h[g]("iframe"),
                                n = "document",
                                p;
                            k.style.display = "none";
                            e.insertBefore(k, e.firstChild).id = o + "-" + j;
                            f.frameBorder = "0";
                            f.id = o + "-frame-" + j;
                            /MSIE[ ]+6/.test(navigator.userAgent) && (f[i] = "javascript:false");
                            f.allowTransparency = "true";
                            l[d](f);
                            try {
                                f.contentWindow[n].open()
                            } catch (s) {
                                a.domain = h.domain, p = "javascript:var d=" + n + ".open();d.domain='" + h.domain + "';", f[i] = p + "void(0);"
                            }
                            try {
                                var r = f.contentWindow[n];
                                r.write(b());
                                r.close()
                            } catch (t) {
                                f[i] = p + 'd.write("' + b().replace(/"/g, String.fromCharCode(92) + '"') + '");d.close();'
                            }
                            a.P(2)
                        };
                        a.l && setTimeout(q, 0)
                    })()
                }();
                c[b].lv = "1";
                return c[b]
            }
            var o = "lightningjs",
                k = window[o] = g(o);
            k.require = g;
            k.modules = c
        }({});
        if (!navigator.userAgent.match(/Android|BlackBerry|BB10|iPhone|iPad|iPod|Opera Mini|IEMobile/i)) {
            window.usabilla_live = lightningjs.require("usabilla_live", "//w.usabilla.com/b366ee2c41cd.js");
        } else {
            window.usabilla_live = lightningjs.require("usabilla_live", "//w.usabilla.com/8a4fc2a91624.js");
        } /*]]>{/literal}*/
    </script>
    <!-- end usabilla live embed code -->
    </div>



    <script fetchpriority="high"src="https://www.forex.com/en-us/-/media/base-themes/global/scripts/pre-optimized-min.js?t=20240612T212919Z"></script>
    <scriptsrc="https://www.forex.com/en-us/-/media/themes/gain-capital/forex/forex/scripts/main-pre-optimized-min.js?v=5.41.10"></script>

    <!-- /#wrapper -->
    <input type="hidden" id="DebugInfo" value="[5.41.10]-[f4583bb0d2c7cc23812026548a6f58464a83b13148950b7c6aa4a298f8f42223]-[NG - 102/90/99/102/]" />
</body>

</html>