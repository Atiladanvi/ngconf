<?php

namespace App\Forms;

use App\Models\User;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class UserEditForm extends Form
{
    public function buildForm()
    {
        $this->add('name', Field::TEXT, [
            'rules' => 'required|min:5|max:150',
            'attr' => ['class' => 'form-control']
        ])
        ->add('role', Field::TEXT, [
            'attr' => ['class' => 'form-control', 'disabled' => true],
            'default_value' => User::$CUSTOMER
        ])
        ->add('email', Field::EMAIL, [
            'rules' => 'required|email|unique:users',
            'attr' => ['class' => 'form-control']
        ])
        ->add('Perform', Field::BUTTON_SUBMIT, [
            'attr' => ['class' => 'btn-primary btn']
        ]);
    }

}
