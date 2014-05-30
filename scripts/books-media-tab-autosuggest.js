jQuery(function($){

    $("#Ntt").autosuggest({
        source: "ncsu",
        indexInput: "#Ntk",
        queryForm: "#search",
        querySubmit: "#searchbookssubmit",
        hiddenOnDefaultIndex: "",
        autocompleteOptions: {
            // width: ntt_width
        }
    });
});
