<?php
class StoryValidator
{
    protected $data;
    protected $errors = [];

    public function __construct($data)
    {
        $this->data = $data;
    }


    public function isPresent($field)
    {
        return !empty($this->data[$field]);
    }


    public function minLength($field, $min)
    {
        return strlen($this->data[$field]) >= $min;
    }


    public function validate()
    {

        if (!$this->minLength("headline", 10)) {
            $this->errors["headline"] = "Please enter a headline";
        }

        if (!$this->isPresent("short_headline")) {
            $this->errors["short_headline"] = "Please enter a sub heading";
        }

        if (!$this->isPresent("article")) {
            $this->errors["article"] = "Please enter an article";
        }
        if (!$this->isPresent("img_url")) {
            $this->errors["img_url"] = "Please enter an image url";
        }
        if (!$this->isPresent("author_id")) {
            $this->errors["author_id"] = "Please enter an author ID";
        }
        if (!$this->isPresent("category_id")) {
            $this->errors["category_id"] = "Please enter a category ID";
        }
        if (!$this->isPresent("location_id")) {
            $this->errors["location_id"] = "Please enter a location ID";
        }
        if (!$this->isPresent("created_at")) {
            $this->errors["created_at"] = "Please enter a created date";
        }
        if (!$this->isPresent("updated_at")) {
            $this->errors["updated_at"] = "Please enter an updated date";
        }


        return count($this->errors) === 0;
    }

    public function errors()
    {
        return $this->errors;
    }
}
?>