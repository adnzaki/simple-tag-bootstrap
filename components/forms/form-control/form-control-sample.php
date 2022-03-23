<?php

echo '<h4><strong>Form Control Example</strong></h4>';
echo '<h5>Form Control give you access to create Bootstrap\'s input and textarea seamlessly</h5>';
echo '<hr>';

input('mb-3')->label('Full name')->name('fullname')->placeholder('Your full name')->render();
input('mb-3')->label('Email')->type('email')->name('email')->placeholder('Your valid email')->render();
input('mb-3')->label('Address')->textarea()->name('address')->placeholder('Your full address')->render();

// Add ID to form control
input('mb-3')->label('Postal Code')->name('postal-code')
             ->placeholder('I am a form with a large size, you can set me to small by modifying this code')
             ->size('lg')->id('postal-code')->render();

input('mb-3')->label('Phone number (with disabled state)')->value('087492838763')->disable()->render();
input('mb-3')->label('Office address (with disabled state and readonly input)')
             ->value('Kemayoran')->disable()->readonly()->render();

input('mb-3')->label('City (with readonly input)')->value('Jakarta')->readonly()->render();

echo '<hr>';

// remove readonly() to make <input> editable
input('mb-3 row')->label('Email', 'col-form-label col-sm-2')
                 ->wrap('col-sm-10')->readonly()->value('Click@me')
                 ->setClass('form-control-plaintext')->render();

input('mb-3 row')->label('Password', 'col-form-label col-sm-2')
                 ->type('password')->wrap('col-sm-10')->render();
                 
$email = input('col')->label('Email', 'visually-hidden')
                     ->setClass('form-control-plaintext') // overwrite default form-control class
                     ->value('email@example.com')
                     ->id('staticEmail2')->render(true);

$password = input('col')->label('Password', 'visually-hidden')
                        ->type('password')->id('inputPassword2')->render(true);
                             
st()->elem('form', ['class' => 'row g-3'])
    ->content($email, null)->content($password, null)->render();

echo '<hr>';

input('mb-3')->label('Default file input example')
             ->type('file')
             ->id('formFile')->render();

input('mb-3')->label('Multiple files input example')
             ->type('file')
             ->multiple()->render();             

input('mb-3')->label('Disabled file input example')
             ->type('file')
             ->disable()->render();    

input('mb-3')->label('Small file input example')
             ->type('file')->size('sm')
             ->disable()->render(); 

input('mb-3')->label('Large file input example')
             ->type('file')->size('lg')
             ->disable()->render(); 

input('mb-3')->label('Color picker')
             ->type('color')
             ->value('#563d7c')
             ->title('Choose your color')->render();

input()->label('Datalist example')
       ->list('datalistOptions', [
           'Jakarta', 'Bandung', 'Bekasi',
           'Surabaya', 'Semarang'
       ])
       ->placeholder('Type to search...')
       ->render();

echo '<br><br><br>';