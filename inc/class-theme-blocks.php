<?php
class DrstThemeBlocks {

	public function __construct() {
        add_theme_support( 'editor-styles' );
        add_editor_style( '/assets/css/vv-block-editor-styles.css' );
    }
    
    public function register_styles() {

        // Group.
    	register_block_style(
            'core/group', [
                'name' => 'drst-group-align-content-left',
                'label' => 'Align content to left',
            ]
        );

         // Group padding
    	register_block_style(
            'core/group', [
                'name' => 'vv-group-padding',
                'label' => 'Padding top and bottom',
            ]
        );

        // Group padding top large
    	register_block_style(
            'core/group', [
                'name' => 'vv-group-padding-top-large',
                'label' => 'Padding top large',
            ]
        );

        // Group padding bottom
    	register_block_style(
            'core/group', [
                'name' => 'vv-group-padding-bottom',
                'label' => 'Padding bottom',
            ]
        );

         // Group margin-bottom min
         register_block_style(
            'core/group', [
                'name' => 'vv-group-min-margin-bottom',
                'label' => 'Margin bottom minus',
            ]
        );

           // Group shadow
           register_block_style(
            'core/group', [
                'name' => 'vv-group-buttons',
                'label' => 'Buttons group smaller width desktop',
            ]
        );

            // Group shadow
          register_block_style(
            'core/group', [
                'name' => 'vv-shadow-outline',
                'label' => 'Shadow outline',
            ]
        );

        // Hero title block for home page
        register_block_style(
            'core/group', [
                'name' => 'vv-hero-block',
                'label' => 'Hero with page title and image',
            ]
        );

        // Hero title block for sub pages
        register_block_style(
            'core/group', [
                'name' => 'vv-hero-pages-block',
                'label' => 'Hero for pages',
            ]
        );

         // Pages title spacing top
         register_block_style(
            'core/group', [
                'name' => 'vv-hero-pages-title',
                'label' => 'Title spacing top',
            ]
        );

        // Sticky first column
        register_block_style(
            'core/group', [
                'name' => 'vv-sticky-column',
                'label' => 'First column is sticky',
            ]
        );

        // FAQ
        register_block_style(
            'core/group', [
                'name' => 'vv-faq',
                'label' => 'Faq',
            ]
        );

        // Group shadow
        register_block_style(
            'core/group', [
                'name' => 'vv-shadow-outline',
                'label' => 'Shadow outline',
            ]
        );

        // Hero title block for home page
        register_block_style(
            'core/group', [
                'name' => 'vv-hero-block',
                'label' => 'Hero with page title and image',
            ]
        );

        // Hero title block for sub pages
        register_block_style(
            'core/group', [
                'name' => 'vv-hero-pages-block',
                'label' => 'Hero for pages',
            ]
        );

        // Sticky first column
        register_block_style(
            'core/group', [
                'name' => 'vv-sticky-column',
                'label' => 'First column is sticky',
            ]
        );

        // FAQ
        register_block_style(
            'core/group', [
                'name' => 'vv-faq',
                'label' => 'Faq',
            ]
        );

        // Underline heading
        register_block_style(
            'core/heading', [
                'name' => 'vv-heading-underline',
                'label' => 'Underline',
            ]
        );

        // Heading in frame
        register_block_style(
            'core/heading', [
                'name' => 'vv-heading-in-frame',
                'label' => 'Heading in frame',
            ]
        );

        // CTA columns with white triangle cut-out
        register_block_style(
            'core/columns', [
                'name' => 'vv-cta-columns',
                'label' => 'columns CTA with triangle cut-out',
            ]
        );

        // CTA paragraph with triangle cut-out
        register_block_style(
            'core/paragraph', [
                'name' => 'vv-cta-paragraph',
                'label' => 'Paragraph CTA with triangle cut-out',
            ]
        );

        // CTA paragraph with triangle cut-out 20% width
        register_block_style(
            'core/paragraph', [
                'name' => 'vv-cta-paragraph-smaller',
                'label' => 'Paragraph CTA with triangle cut-out 20% width',
            ]
        );

        // Paragraph link color
        register_block_style(
            'core/paragraph', [
                'name' => 'vv-link-color',
                'label' => 'Paragraph Link color',
            ]
        );

        // Intro paragraph width
        register_block_style(
            'core/paragraph', [
                'name' => 'vv-paragraph-intro',
                'label' => 'Intro paragraph width 75%',
            ]
        );

        // Column shadow
        register_block_style(
            'core/column', [
                'name' => 'vv-shadow-outline',
                'label' => 'Shadow outline',
            ]
        );

        // Column shadow
        register_block_style(
            'core/quote', [
                'name' => 'vv-quote-block',
                'label' => 'Block quote smaller text normal font weight',
            ]
        );

    }

    public function register_block_categories() {
        register_block_pattern_category(
            'dchi',
            array( 'label' => __( 'DCHI', 'dchi' ) )
        );
    }

    public function register_patterns() {
        register_block_pattern(
            'dchi/layout-img-left',
            array(
                'title'       => __( 'Layout image left', 'dchi' ),
                'description' => __( 'Text with image on the left.', 'dchi' ),
                'content'     => "<!-- wp:columns {\"align\":\"wide\"} -->\n<div class=\"wp-block-columns alignwide\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":228,\"sizeSlug\":\"large\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"http://dchinl.hosting-cluster.nl/wp-content/uploads/2020/10/placeholder.png\" alt=\"\" class=\"wp-image-228\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"is-style-dchi-text-column\"} -->\n<div class=\"wp-block-column is-style-dchi-text-column\"><!-- wp:heading {\"level\":3,\"className\":\"is-style-dchi-heading-soehne\"} -->\n<h3 class=\"is-style-dchi-heading-soehne\">Lorem ipsum</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit ratione veniam, vel nobis magni autem numquam, hic maxime, facere minus consequuntur. Culpa eveniet ea natus, sapiente reprehenderit incidunt cupiditate deleniti?</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Voluptate neque cumque dicta ad soluta repudiandae autem dolorum sapiente cupiditate nihil consectetur voluptas repellat, possimus quas, aperiam perspiciatis minus praesentium enim commodi est animi iure? Quas pariatur omnis aliquid!</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
                'categories'  => array( 'dchi' ),
                'keywords'    => array( 'dchi' ),
            )
        );
    }
}
