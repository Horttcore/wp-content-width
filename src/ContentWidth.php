<?php

namespace RalfHortt\ContentWidth;

class ContentWidth
{

    /**
     * Content width
     *
     * @param int $contentWidth Content width
     **/
    public function __construct(int $contentWidth)
    {
        $this->contentWidth = $contentWidth;
    }

    /**
     * Register size
     *
     * @return void
     **/
    public function register(): void
    {
        add_action('init', [$this, 'setWidth']);
        add_action('wp_head', [$this, 'setContentWidth']);
        add_action('admin_print_styles-post.php', [$this, 'setContentWidth']);
        add_action('admin_print_styles-post-new.php', [$this, 'setContentWidth']);
        add_action('admin_print_styles-post.php', [$this, 'setBlockWidth']);
        add_action('admin_print_styles-post-new.php', [$this, 'setBlockWidth']);
    }
    
    /**
     * Set global $content_width variable
     *
     * @return void
     **/
    public function setWidth(): void
    {
        global $content_width;
        $content_width = $this->contentWidth;
    }

    /**
     * Set CSS content width
     *
     * @return void
     **/
    public function setContentWidth(): void
    {
        printf('<style>:root{ --content-width: %spx;}</style>', $this->contentWidth);
    }

    /**
     * Set CSS content width
     *
     * @return void
     **/
    public function setBlockWidth(): void
    {
        ?>
        <style>.editor-styles-wrapper .wp-block, .editor-post-title .wp-block {max-width: calc(30px + var(--content-width));}</style>
        <?php
    }
}
