<?php
class AuthorValidator extends FormValidator
{
    public function __construct($data = [])
    {
        parent::__construct($data);
    }

    public function validate()
    {
        if (!$this->minLength("first_name", 6)) {
            $this->errors["name"] = "Please enter a name with at least 6 characters";
        }

        if (!$this->isPresent("last_name")) {
            $this->errors["ppsn"] = "Please enter your ppsn";
        }

        $departments = Department::findAll();

        echo "<pre>";

        print_r($departments);
        print_r($this->data);

        echo "</pre>";

        $valid = false;
        foreach ($departments as $department) {
            if ($department->id == $this->data["department_id"]) {
                $valid = true;
            }
        }

        if ($valid == false) {
            $this->errors["department_id"] = "Please enter a department_id";
        }

        return count($this->errors) === 0;
    }
}
?>