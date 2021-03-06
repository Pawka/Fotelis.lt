<?php
namespace Armchair;

class PostEntity
{
    protected $slug;
    protected $name;
    protected $date;
    protected $author;
    protected $category;
    protected $contentPath;
    protected $content;
    protected $shortText;
    protected $path;

    public function __construct($slug, $metadata)
    {
        $this->slug = $slug;
        $this->load($metadata);
    }

    public function load($metadata)
    {
        $this->name = $metadata['name'];
        $this->date = $metadata['date'];
        $this->author = $metadata['author'];
        $this->category = $metadata['category'];
        $this->contentPath = $metadata['contentPath'];
        $this->path = $metadata['path'];
        $this->shortText = $metadata['shortText'];
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getShortText()
    {
        return $this->shortText;
    }

    public function getContent()
    {
        ob_start();
        
        include($this->contentPath);
        $return = ob_get_contents();

        ob_end_clean();

        return $return;
    }
}