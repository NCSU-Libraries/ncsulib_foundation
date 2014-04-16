jQuery(function($){
    $("#books-media-search").autosuggest({
        source: "ncsu",
        indexInput: "#books-more-options-drop",
        queryForm: "#searchbooksform",
        querySubmit: "#searchbookssubmit",
        hiddenOnDefaultIndex: "",
        autocompleteOptions: {
            // width: 400
        }
    });
});
