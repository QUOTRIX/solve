<?php
/**
 * Template Name: Homepage with Search
 * Template Post Type: page
 */

get_header(); ?>

<div class="homepage-wrapper">
    <!-- Hero Section -->
    <div class="hero-section" style="min-height: 80vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg') center/cover;">
        <div class="hero-content" style="text-align: center; color: white; padding: 20px;">
            <h1 style="font-size: 3em; margin-bottom: 20px;">Find Your Perfect App</h1>
            <p style="font-size: 1.2em; margin-bottom: 30px;">Discover thousands of apps to enhance your workflow</p>
            <div id="app-search"></div>
        </div>
    </div>

    <!-- Featured Categories -->
    <div class="categories-section" style="padding: 60px 20px; background: #f5f5f5;">
        <div class="container" style="max-width: 1200px; margin: 0 auto;">
            <h2 style="text-align: center; margin-bottom: 40px;">Featured Categories</h2>
            <div class="category-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
                
                <!-- Category Card -->
                <div class="category-card" style="background: white; padding: 30px; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <h3>Productivity</h3>
                </div>

                <!-- Category Card -->
                <div class="category-card" style="background: white; padding: 30px; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <h3>Design</h3>
                </div>

                <!-- Category Card -->
                <div class="category-card" style="background: white; padding: 30px; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <h3>Development</h3>
                </div>

            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>