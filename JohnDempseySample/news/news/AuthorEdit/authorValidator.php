<?php
class AuthorValidator
{
    protected $data;
    protected $errors = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    // Check if the field is present
    public function isPresent($field)
    {
        return !empty($this->data[$field]);
    }

    // Check if the field meets the minimum length
    public function minLength($field, $min)
    {
        return strlen($this->data[$field]) >= $min;
    }

    // Validate the form
    public function validate()
    {
        // Example of validation logic
        if (!$this->minLength("first_name", 6)) {
            $this->errors["first_name"] = "Please enter a first name with at least 6 characters";
        }

        if (!$this->isPresent("last_name")) {
            $this->errors["last_name"] = "Please enter your last name";
        }

        // If any errors were added, return false
        return count($this->errors) === 0;
    }

    // Get all validation errors
    public function errors()
    {
        return $this->errors;
    }
}
?>
