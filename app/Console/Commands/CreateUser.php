<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jmdev:create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a User so you can log in to the website';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $username = $this->ask("What is your name?");

        do {
            $email = $this->ask("What is your email?");

            if ($exist = User::query()->where('email', $email)->exists()) {
                $this->error("This email exist... Please enter another one...");
            }
        } while ($exist);

        do {
            $password = $this->ask("What password do you want?");
            $confirmPassword = $this->ask("Confirm the password");

            $match = $password === $confirmPassword;
            if (!$match) {
                $this->error("Your password doesn't match...");
            }
        } while (!$match);

        $user = User::create([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'email' => $email,
            'email_verified_at' => Carbon::now()
        ]);

        if ($user) {
            $this->info("Your account have been created!");
        } else {
            $this->error("We could not create your account... Please try again...");
        }
    }
}
