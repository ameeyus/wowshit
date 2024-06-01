<?php
namespace Photos;

class Photo {
    private $image;
    private $text;
    private $id;

    public function  __construct($image, $text, $id)
    {
        $this->id= $id;
        $this->image = $image;
        $this->text = $text;
    }
    public function get_html()
    {
        return "<a href='image.php?id=$this->id' class='photo'>".
            "<img src='$this->image' alt=''>" .
            "<p> $this->text</p>" .
            "</a>";

    }
}