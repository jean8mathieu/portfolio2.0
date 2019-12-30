<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UpdateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jmdev:update-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the password on a user base on the email';

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
        $email = $this->ask("What is the email of the user?");

        if ($user = User::query()->where('email', $email)->first()) {
            do {
                $password = $this->ask("What password do you want?");
                $confirmPassword = $this->ask("Confirm the password");

                $match = $password === $confirmPassword;
                if (!$match) {
                    $this->error("Your password doesn't match...");
                }
            } while (!$match);

            if ($user->update([
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ])) {
                $this->info("Your account have been created!");
            } else {
                $this->error("We could not create your account... Please try again...");
            }
        } else {
            $this->error("There is not account that exist with this email...");
        }
    }
}
