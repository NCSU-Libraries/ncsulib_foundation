Modernizr.load([
    // Input placeholder test (IE 8,9 polyfill)
    {
        test: Modernizr.input.placeholder,
        nope: ['/sites/all/themes/ncsulib_foundation/scripts/vendor/jquery.placeholder.js']
    },

    // Touch events
    {
        test: Modernizr.touch,
        yep: '/sites/all/themes/ncsulib_foundation/scripts/touch.js',
    }
]);
