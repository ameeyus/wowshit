<?php
namespace Photos;

class Photo {
    private $image;
    private $text;

    public function  __construct($image, $text)
    {
        $this->image = $image;
        $this->text = $text;
    }
    public function get_html()
    {
        return "<div class = 'photo'>" .
            "<img src='$this->image' alt=''>" .
            "<p> $this->text</p>" .
            "</div>";

    }
}