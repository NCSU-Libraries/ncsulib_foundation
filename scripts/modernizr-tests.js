Modernizr.load([
    // Input placeholder test (IE 8,9 polyfill)
    {
        test: Modernizr.input.placeholder,
        nope: '//www.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/scripts/vendor/jquery.placeholder.js'
    },

    // Touch events
    {
        test: Modernizr.touch,
        yep: '//www.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/scripts/touch.js',
    }
]);
