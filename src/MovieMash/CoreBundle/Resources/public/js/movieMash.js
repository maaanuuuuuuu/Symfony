$(document).ready(function(){

    function searchImage(title, $destinationDiv) {
        google.load('search', '1');
        
        var imageSearch;

        google.setOnLoadCallback(function() {
            // Create an Image Search instance.
            imageSearch = new google.search.ImageSearch();

            // Set searchComplete as the callback function when a search is complete.  
            // The imageSearch object will have results in it.
            imageSearch.setSearchCompleteCallback(
                this,
                function() {
                    console.log(imageSearch.results[0].tbUrl);
                    $destinationDiv.css('background', 'url(' + imageSearch.results[0].tbUrl + ') no-repeat scroll 0 0 / cover  rgba(0, 0, 0, 0)');
                }, 
                null
            );

            // Find me a beautiful car.
            imageSearch.execute(title);
            // Include the required Google branding
            google.search.Search.getBranding('branding');
        });
    }
});


