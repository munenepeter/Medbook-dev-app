<?php

class Validator
{
    public $data;
    public $errors = [];
    private static $inputs = ['nameofpatient', 'date', 'gender', 'typeofservice', 'comments'];


    public function __construct($formData)
    {
        $this->data = $formData;
    }
    public  function validateform()
    {
        foreach (self::$inputs as $input) {
            if (!array_key_exists($input, $this->data)) {
                trigger_error("$input is empty, please fill in");
                return;
            }
        }
        $this->validatePatientName();
        $this->validateDob();
        $this->validateGender();
        $this->validateService();
        $this->validateComments();
        return $this->errors;
    }
    private function validatePatientName()
    {
        $val = trim($this->data['nameofpatient']);
        if (empty($val)) {
            $this->addError('NameofPatient', 'Patient\'s Name Cannot be Empty');
        }
    }
    private function validateDob()
    {
        $val = trim($this->data['date']);
        if (empty($val)) {
            $this->addError('DateofBirth', 'Please enter the Date of birth');
        }
    }
    private function validateGender()
    {
        foreach ($this->data['gender'] as $val) {
            $val = trim($val); // Displaying Selected Value
        }
        if (empty($val)) {
            $this->addError('Gender', 'Gender Cannot be Empty');
        }
    }

    private function validateService()
    {
        foreach ($this->data['typeofservice'] as $val) {
            $val = trim($val); // Displaying Selected Value
        }
        if (empty($val)) {
            $this->addError('TypeofService', 'Type of Service Cannot be Empty');
        }
    }

    private function validateComments()
    {
        $val = trim($this->data['comments']);
        if (empty($val)) {
            $this->addError('GeneralComments', 'Comments Cannot be Empty');
        }
    }
    private function addError($key, $value)
    {
        $this->errors[$key] = $value;
    }
}
