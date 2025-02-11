<?php
/**
 * Template Name: Page Builder
 * Description: A template that includes common building blocks for the frontend developer
 */

get_header(); ?>

<div class="site-content">
    <!-- Search Hero Section -->
    <section class="hero-section" style="
        min-height: 80vh;
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6));
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 20px;
    ">
        <div class="hero-content">
            <h1 style="color: white; font-size: 3em; margin-bottom: 30px;">
                <?php echo get_theme_mod('hero_title', 'Find Your Perfect App'); ?>
            </h1>
            <div id="app-search"></div>
        </div>
    </section>

    <!-- Customizable Content Section -->
    <section class="content-section" style="padding: 60px 20px;">
        <div class="container" style="max-width: 1200px; margin: 0 auto;">
            <?php
            // This will output any content created with the page builder
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </section>

    <!-- Pre-built Components -->
    <div class="builder-components" style="display: none;">
        <!-- Category Card Template -->
        <div class="category-card" style="
            background: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin: 20px;
        ">
            <h3>[Category Name]</h3>
            <p>[Category Description]</p>
        </div>

        <!-- Feature Box Template -->
        <div class="feature-box" style="
            padding: 40px;
            background: #f5f5f5;
            border-radius: 15px;
            margin: 20px;
        ">
            <h4>[Feature Title]</h4>
            <p>[Feature Description]</p>
        </div>
    </div>
</div>

<?php get_footer(); ?>