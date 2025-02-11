<?php
/*
Template Name: Search Page
*/

get_header();
?>

<div id="app-search"></div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize the search component
        if (typeof React !== 'undefined' && typeof ReactDOM !== 'undefined') {
            const searchContainer = document.getElementById('app-search');
            if (searchContainer) {
                ReactDOM.render(React.createElement(SearchBar), searchContainer);
            }
        }
    });
</script>

<?php
get_footer();
?>