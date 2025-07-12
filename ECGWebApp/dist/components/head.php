<noscript>
    Your browser is not supported javascript.
    Please allowed for javascript.
</noscript>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="Pakornkaed Kuaisakun">
<meta name="description" content="">
<meta name="theme-color" content="#FFFFFF">
<meta http-equiv="defualt-style" content="light-theme">

<title>ECG - <?php echo $webHeader; ?></title>

<link rel="manifest" href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/FutureLife/manifest.json">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
    rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.1/dist/full.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style type="text/css">
* {
    line-height: 1.15;
    font-family: 'Poppins', 'Roboto', 'Ubuntu', 'Prompt', sans-serif;
}

html {
    scroll-behavior: smooth;
    overflow-x: hidden;
}

body {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    min-height: 725px;
    background: url('<?php echo getPathImage('background.webp') ?>') no-repeat fixed center;
        background-size: 1600px;
        backdrop-filter: blur(1px);
        -webkit-backdrop-filter: blur(1px);
    }

    a:link {
        text-decoration: none;
    }

    a:visited {
        text-decoration: none;
    }

    a:hover {
        text-decoration: none;
    }

    a:active {
        text-decoration: none;
    }

    ::-webkit-scrollbar {
        width: 6px;
        height: 4px;
        background-color: #f5f5f5;
        border-radius: 12px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #403838;
        border-radius: 12px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: #211d1d;
        border-radius: 12px;
    }
</style>
<style>
    /* ! tailwindcss v3.4.3 | MIT License | https://tailwindcss.com */
    *,
    ::after,
    ::before {
        box-sizing: border-box;
        border-width: 0;
        border-style: solid;
        border-color: #e5e7eb
    }

    ::after,
    ::before {
        --tw-content: ''
    }

    :host,
    html {
        line-height: 1.5;
        -webkit-text-size-adjust: 100%;
        -moz-tab-size: 4;
        tab-size: 4;
        font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-feature-settings: normal;
        font-variation-settings: normal;
        -webkit-tap-highlight-color: transparent
    }

    body {
        margin: 0;
        line-height: inherit
    }

    hr {
        height: 0;
        color: inherit;
        border-top-width: 1px
    }

    abbr:where([title]) {
        -webkit-text-decoration: underline dotted;
        text-decoration: underline dotted
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-size: inherit;
        font-weight: inherit
    }

    a {
        color: inherit;
        text-decoration: inherit
    }

    b,
    strong {
        font-weight: bolder
    }

    code,
    kbd,
    pre,
    samp {
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        font-feature-settings: normal;
        font-variation-settings: normal;
        font-size: 1em
    }

    small {
        font-size: 80%
    }

    sub,
    sup {
        font-size: 75%;
        line-height: 0;
        position: relative;
        vertical-align: baseline
    }

    sub {
        bottom: -.25em
    }

    sup {
        top: -.5em
    }

    table {
        text-indent: 0;
        border-color: inherit;
        border-collapse: collapse
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        font-family: inherit;
        font-feature-settings: inherit;
        font-variation-settings: inherit;
        font-size: 100%;
        font-weight: inherit;
        line-height: inherit;
        letter-spacing: inherit;
        color: inherit;
        margin: 0;
        padding: 0
    }

    button,
    select {
        text-transform: none
    }

    button,
    input:where([type=button]),
    input:where([type=reset]),
    input:where([type=submit]) {
        -webkit-appearance: button;
        background-color: transparent;
        background-image: none
    }

    :-moz-focusring {
        outline: auto
    }

    :-moz-ui-invalid {
        box-shadow: none
    }

    progress {
        vertical-align: baseline
    }

    ::-webkit-inner-spin-button,
    ::-webkit-outer-spin-button {
        height: auto
    }

    [type=search] {
        -webkit-appearance: textfield;
        outline-offset: -2px
    }

    ::-webkit-search-decoration {
        -webkit-appearance: none
    }

    ::-webkit-file-upload-button {
        -webkit-appearance: button;
        font: inherit
    }

    summary {
        display: list-item
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
        margin: 0
    }

    fieldset {
        margin: 0;
        padding: 0
    }

    legend {
        padding: 0
    }

    menu,
    ol,
    ul {
        list-style: none;
        margin: 0;
        padding: 0
    }

    dialog {
        padding: 0
    }

    textarea {
        resize: vertical
    }

    input::placeholder,
    textarea::placeholder {
        opacity: 1;
        color: #9ca3af
    }

    [role=button],
    button {
        cursor: pointer
    }

    :disabled {
        cursor: default
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

    img,
    video {
        max-width: 100%;
        height: auto
    }

    [hidden] {
        display: none
    }

    *,
    ::before,
    ::after {
        --tw-border-spacing-x: 0;
        --tw-border-spacing-y: 0;
        --tw-translate-x: 0;
        --tw-translate-y: 0;
        --tw-rotate: 0;
        --tw-skew-x: 0;
        --tw-skew-y: 0;
        --tw-scale-x: 1;
        --tw-scale-y: 1;
        --tw-pan-x: ;
        --tw-pan-y: ;
        --tw-pinch-zoom: ;
        --tw-scroll-snap-strictness: proximity;
        --tw-gradient-from-position: ;
        --tw-gradient-via-position: ;
        --tw-gradient-to-position: ;
        --tw-ordinal: ;
        --tw-slashed-zero: ;
        --tw-numeric-figure: ;
        --tw-numeric-spacing: ;
        --tw-numeric-fraction: ;
        --tw-ring-inset: ;
        --tw-ring-offset-width: 0px;
        --tw-ring-offset-color: #fff;
        --tw-ring-color: rgb(59 130 246 / 0.5);
        --tw-ring-offset-shadow: 0 0 #0000;
        --tw-ring-shadow: 0 0 #0000;
        --tw-shadow: 0 0 #0000;
        --tw-shadow-colored: 0 0 #0000;
        --tw-blur: ;
        --tw-brightness: ;
        --tw-contrast: ;
        --tw-grayscale: ;
        --tw-hue-rotate: ;
        --tw-invert: ;
        --tw-saturate: ;
        --tw-sepia: ;
        --tw-drop-shadow: ;
        --tw-backdrop-blur: ;
        --tw-backdrop-brightness: ;
        --tw-backdrop-contrast: ;
        --tw-backdrop-grayscale: ;
        --tw-backdrop-hue-rotate: ;
        --tw-backdrop-invert: ;
        --tw-backdrop-opacity: ;
        --tw-backdrop-saturate: ;
        --tw-backdrop-sepia: ;
        --tw-contain-size: ;
        --tw-contain-layout: ;
        --tw-contain-paint: ;
        --tw-contain-style:
    }

    ::backdrop {
        --tw-border-spacing-x: 0;
        --tw-border-spacing-y: 0;
        --tw-translate-x: 0;
        --tw-translate-y: 0;
        --tw-rotate: 0;
        --tw-skew-x: 0;
        --tw-skew-y: 0;
        --tw-scale-x: 1;
        --tw-scale-y: 1;
        --tw-pan-x: ;
        --tw-pan-y: ;
        --tw-pinch-zoom: ;
        --tw-scroll-snap-strictness: proximity;
        --tw-gradient-from-position: ;
        --tw-gradient-via-position: ;
        --tw-gradient-to-position: ;
        --tw-ordinal: ;
        --tw-slashed-zero: ;
        --tw-numeric-figure: ;
        --tw-numeric-spacing: ;
        --tw-numeric-fraction: ;
        --tw-ring-inset: ;
        --tw-ring-offset-width: 0px;
        --tw-ring-offset-color: #fff;
        --tw-ring-color: rgb(59 130 246 / 0.5);
        --tw-ring-offset-shadow: 0 0 #0000;
        --tw-ring-shadow: 0 0 #0000;
        --tw-shadow: 0 0 #0000;
        --tw-shadow-colored: 0 0 #0000;
        --tw-blur: ;
        --tw-brightness: ;
        --tw-contrast: ;
        --tw-grayscale: ;
        --tw-hue-rotate: ;
        --tw-invert: ;
        --tw-saturate: ;
        --tw-sepia: ;
        --tw-drop-shadow: ;
        --tw-backdrop-blur: ;
        --tw-backdrop-brightness: ;
        --tw-backdrop-contrast: ;
        --tw-backdrop-grayscale: ;
        --tw-backdrop-hue-rotate: ;
        --tw-backdrop-invert: ;
        --tw-backdrop-opacity: ;
        --tw-backdrop-saturate: ;
        --tw-backdrop-sepia: ;
        --tw-contain-size: ;
        --tw-contain-layout: ;
        --tw-contain-paint: ;
        --tw-contain-style:
    }

    .container {
        width: 100%
    }

    @media (min-width: 640px) {
        .container {
            max-width: 640px
        }
    }

    @media (min-width: 768px) {
        .container {
            max-width: 768px
        }
    }

    @media (min-width: 1024px) {
        .container {
            max-width: 1024px
        }
    }

    @media (min-width: 1280px) {
        .container {
            max-width: 1280px
        }
    }

    @media (min-width: 1536px) {
        .container {
            max-width: 1536px
        }
    }

    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border-width: 0
    }

    .fixed {
        position: fixed
    }

    .bottom-0 {
        bottom: 0px
    }

    .left-0 {
        left: 0px
    }

    .top-0 {
        top: 0px
    }

    .z-50 {
        z-index: 50
    }

    .mx-auto {
        margin-left: auto;
        margin-right: auto
    }

    .mb-2 {
        margin-bottom: 0.5rem
    }

    .mb-4 {
        margin-bottom: 1rem
    }

    .me-2 {
        margin-inline-end: 0.5rem
    }

    .mr-4 {
        margin-right: 1rem
    }

    .mt-16 {
        margin-top: 4rem
    }

    .mt-24 {
        margin-top: 6rem
    }

    .mt-3 {
        margin-top: 0.75rem
    }

    .mt-4 {
        margin-top: 1rem
    }

    .flex {
        display: flex
    }

    .inline-flex {
        display: inline-flex
    }

    .hidden {
        display: none
    }

    .h-10 {
        height: 2.5rem
    }

    .h-5 {
        height: 1.25rem
    }

    .w-10 {
        width: 2.5rem
    }

    .w-5 {
        width: 1.25rem
    }

    .w-full {
        width: 100%
    }

    .max-w-\[100rem\] {
        max-width: 100rem
    }

    .max-w-screen-xl {
        max-width: 1280px
    }

    .flex-col {
        flex-direction: column
    }

    .flex-wrap {
        flex-wrap: wrap
    }

    .items-center {
        align-items: center
    }

    .justify-center {
        justify-content: center
    }

    .justify-between {
        justify-content: space-between
    }

    .justify-items-center {
        justify-items: center
    }

    .space-y-4> :not([hidden])~ :not([hidden]) {
        --tw-space-y-reverse: 0;
        margin-top: calc(1rem * calc(1 - var(--tw-space-y-reverse)));
        margin-bottom: calc(1rem * var(--tw-space-y-reverse))
    }

    .self-center {
        align-self: center
    }

    .whitespace-nowrap {
        white-space: nowrap
    }

    .rounded-lg {
        border-radius: 0.5rem
    }

    .border {
        border-width: 1px
    }

    .border-gray-200 {
        --tw-border-opacity: 1;
        border-color: rgb(229 231 235 / var(--tw-border-opacity))
    }

    .bg-white {
        --tw-bg-opacity: 1;
        background-color: rgb(255 255 255 / var(--tw-bg-opacity))
    }

    .bg-\[\#214397\] {
        --tw-bg-opacity: 1;
        background-color: rgb(33 67 151 / var(--tw-bg-opacity))
    }

    .p-2 {
        padding: 0.5rem
    }

    .p-4 {
        padding: 1rem
    }

    .px-4 {
        padding-left: 1rem;
        padding-right: 1rem
    }

    .px-8 {
        padding-left: 2rem;
        padding-right: 2rem
    }

    .py-0 {
        padding-top: 0px;
        padding-bottom: 0px
    }

    .py-1 {
        padding-top: 0.25rem;
        padding-bottom: 0.25rem
    }

    .py-2 {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem
    }

    .py-2\.5 {
        padding-top: 0.625rem;
        padding-bottom: 0.625rem
    }

    .py-4 {
        padding-top: 1rem;
        padding-bottom: 1rem
    }

    .pt-5 {
        padding-top: 1.25rem
    }

    .pt-6 {
        padding-top: 1.5rem
    }

    .text-center {
        text-align: center
    }

    .text-2xl {
        font-size: 1.5rem;
        line-height: 2rem
    }

    .text-3xl {
        font-size: 1.875rem;
        line-height: 2.25rem
    }

    .text-sm {
        font-size: 0.875rem;
        line-height: 1.25rem
    }

    .text-xs {
        font-size: 0.75rem;
        line-height: 1rem
    }

    .font-medium {
        font-weight: 500
    }

    .font-semibold {
        font-weight: 600
    }

    .text-black {
        --tw-text-opacity: 1;
        color: rgb(0 0 0 / var(--tw-text-opacity))
    }

    .text-\[\#fec92b\] {
        --tw-text-opacity: 1;
        color: rgb(254 201 43 / var(--tw-text-opacity))
    }

    .text-blue-500 {
        --tw-text-opacity: 1;
        color: rgb(59 130 246 / var(--tw-text-opacity))
    }

    .text-gray-400 {
        --tw-text-opacity: 1;
        color: rgb(156 163 175 / var(--tw-text-opacity))
    }

    .text-gray-900 {
        --tw-text-opacity: 1;
        color: rgb(17 24 39 / var(--tw-text-opacity))
    }

    .text-red-500 {
        --tw-text-opacity: 1;
        color: rgb(239 68 68 / var(--tw-text-opacity))
    }

    .text-sky-500 {
        --tw-text-opacity: 1;
        color: rgb(14 165 233 / var(--tw-text-opacity))
    }

    .text-sky-800 {
        --tw-text-opacity: 1;
        color: rgb(7 89 133 / var(--tw-text-opacity))
    }

    .shadow {
        --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
        --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
    }

    .shadow-md {
        --tw-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
    }

    .backdrop-blur-lg {
        --tw-backdrop-blur: blur(16px);
        -webkit-backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
        backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia)
    }

    .transition {
        transition-property: color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;
        transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
        transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 150ms
    }

    .duration-300 {
        transition-duration: 300ms
    }

    .hover\:bg-blue-600:hover {
        --tw-bg-opacity: 1;
        background-color: rgb(37 99 235 / var(--tw-bg-opacity))
    }

    .hover\:bg-gray-100:hover {
        --tw-bg-opacity: 1;
        background-color: rgb(243 244 246 / var(--tw-bg-opacity))
    }

    .hover\:text-red-800:hover {
        --tw-text-opacity: 1;
        color: rgb(153 27 27 / var(--tw-text-opacity))
    }

    .hover\:text-sky-800:hover {
        --tw-text-opacity: 1;
        color: rgb(7 89 133 / var(--tw-text-opacity))
    }

    .hover\:underline:hover {
        -webkit-text-decoration-line: underline;
        text-decoration-line: underline
    }

    .focus\:outline-none:focus {
        outline: 2px solid transparent;
        outline-offset: 2px
    }

    .focus\:ring-2:focus {
        --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
        --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
        box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
    }

    .focus\:ring-4:focus {
        --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
        --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(4px + var(--tw-ring-offset-width)) var(--tw-ring-color);
        box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
    }

    .focus\:ring-gray-100:focus {
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(243 244 246 / var(--tw-ring-opacity))
    }

    .focus\:ring-gray-200:focus {
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(229 231 235 / var(--tw-ring-opacity))
    }

    @media (min-width: 640px) {
        .sm\:mt-0 {
            margin-top: 0px
        }

        .sm\:w-\[380px\] {
            width: 380px
        }

        .sm\:text-left {
            text-align: left
        }
    }

    @media (min-width: 768px) {
        .md\:mr-6 {
            margin-right: 1.5rem
        }

        .md\:mt-0 {
            margin-top: 0px
        }

        .md\:block {
            display: block
        }

        .md\:flex {
            display: flex
        }

        .md\:hidden {
            display: none
        }

        .md\:w-auto {
            width: auto
        }

        .md\:max-w-\[100rem\] {
            max-width: 100rem
        }

        .md\:flex-row {
            flex-direction: row
        }

        .md\:items-center {
            align-items: center
        }

        .md\:justify-between {
            justify-content: space-between
        }

        .md\:space-x-8> :not([hidden])~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(2rem * var(--tw-space-x-reverse));
            margin-left: calc(2rem * calc(1 - var(--tw-space-x-reverse)))
        }

        .md\:border-0 {
            border-width: 0px
        }

        .md\:p-0 {
            padding: 0px
        }

        .md\:px-24 {
            padding-left: 6rem;
            padding-right: 6rem
        }
    }

    @media (min-width: 1024px) {
        .lg\:max-w-\[100rem\] {
            max-width: 100rem
        }

        .lg\:px-36 {
            padding-left: 9rem;
            padding-right: 9rem
        }

        .lg\:text-lg {
            font-size: 1.125rem;
            line-height: 1.75rem
        }

        .lg\:text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem
        }
    }

    @media (prefers-color-scheme: dark) {
        .dark\:border-gray-700 {
            --tw-border-opacity: 1;
            border-color: rgb(55 65 81 / var(--tw-border-opacity))
        }

        .dark\:bg-gray-800 {
            --tw-bg-opacity: 1;
            background-color: rgb(31 41 55 / var(--tw-bg-opacity))
        }

        .dark\:text-white {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .dark\:hover\:bg-gray-700:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(55 65 81 / var(--tw-bg-opacity))
        }

        .dark\:focus\:ring-gray-600:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(75 85 99 / var(--tw-ring-opacity))
        }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>