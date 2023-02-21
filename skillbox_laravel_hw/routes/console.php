<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('test', function () {
    /** @var $this \Illuminate\Console\Command */
//    $name = $this->ask('Как Вас зовут?');
//////    $this->line('Some text');
////    $password = $this->secret('Введи свой пароль');
////
////    $this->info($name);
////    $this->info($password);

//    $this->info('Some text', 'vvv');
//    $this->comment('Some text');
//    $this->question('Some text');
//    $this->error('Some text');

//   $name = $this->choice('Какая ваша любимая еда?', ['Картошка', 'Samsa na tandire', 'Самса на тандыре']);
//   $this->info($name);

    $subject = $this->ask('Введи тему письма: ');

    Artisan::call('app:say_hello', [
        'users' => [1, 2],
        '--subject' => $subject,
        '--class' => true,
    ]);

});