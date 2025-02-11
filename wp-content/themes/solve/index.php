<?php
/**
 * The main template file
 */

get_header(); ?>

<div class="search-wrapper" style="
    min-height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f5f5f5;
    padding: 20px;
">
    <div style="
        width: 100%;
        max-width: 600px;
        text-align: center;
    ">
        <h1 style="
            font-size: 2.5em;
            margin-bottom: 30px;
            color: #333;
        ">Find Your Apps</h1>
        
        <div id="app-search"></div>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                console.log('Content loaded, checking React...');
                if (typeof React !== 'undefined' && typeof ReactDOM !== 'undefined') {
                    console.log('React is loaded');
                } else {
                    console.log('React is not loaded');
                }
            });
        </script>
    </div>
</div>

<?php get_footer(); ?>