jQuery(function($){
    $("#Ntt").autosuggest({
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
