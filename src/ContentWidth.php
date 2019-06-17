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
        add_action('admin_print_styles-post.php', [$this, 'setCssContentWidth']);
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
    public function setCssContentWidth(): void
    {
        printf('<style>.editor-block-list__layout .wp-block {--content-width: %dpx;max-width: var(--content-width);}</style>', $this->contentWidth);
    }
}
