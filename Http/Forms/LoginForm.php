<?php 
namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];
    public function validate($email)
    {


        // Check if the email address is in the correct format
        if (!Validator::email($email)) {
            $this->errors['email'] = 'Please provide a valid email address';
        }

       return empty($this->errors);
    }

    public function errors(){
        return $this->errors;
    }
}