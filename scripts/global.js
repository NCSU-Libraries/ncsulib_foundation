jQuery(document).ready(function ($) {
  $("#mega").dcMegaMenu();

  // polyfill for IE<10, this is used anywhere we have an input element with
  // placeholder text, for example, the search in the header
  $("input, textarea").placeholder();
});
