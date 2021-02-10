<?php

namespace App\Forms;

use App\Models\User;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class UserCreateForm extends Form
{
    public function buildForm()
    {
        $this->add('name', Field::TEXT, [
            'rules' => 'required|min:5|max:150'
        ])
        ->add('role', Field::TEXT, [
            'attr' => ['class' => 'form-control', 'disabled' => true],
            'default_value' => User::$CUSTOMER
        ])
        ->add('email', Field::EMAIL, [
            'rules' => 'required|email|unique:users'
        ])
        ->add('password', Field::PASSWORD, [
            'rules' => 'required|string|min:6|max:255|confirmed'
        ])
        ->add('password_confirmation', Field::PASSWORD, [
            'rules' => 'required|string|min:6|max:255,confirmation'
        ])
        ->add('Store', Field::BUTTON_SUBMIT, [
            'attr' => ['class' => 'btn-primary btn']
        ]);
    }
}
