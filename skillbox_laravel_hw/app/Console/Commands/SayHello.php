<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SayHello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:say_hello
        {users* : Пользователи}
        {--subject=Hello : Заголовок письма}
        {--c|class : преобразовать в имя класса}
      ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Отправить Привет пользователю';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = \App\Models\User::findOrFail($this->argument('users'));


        $subject = $this->option('subject');

        if ($this->option('class')) {
            $subject = Str::studly($subject);
        }

        $users->map->notify(new \App\Notifications\SayHello($subject));

        $this->info('Уведомление отправлена!');
    }
}
