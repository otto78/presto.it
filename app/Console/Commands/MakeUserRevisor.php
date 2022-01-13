<?php

namespace App\Console\Commands;


use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command
{
    
    protected $signature = 'presto:makeUserRevisor';

    protected $description = 'Rendi un utente revisore';

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
     * @return int
     */
    public function handle()
    {
        $email = $this->ask("Inserisci l'email dell'utente che vuoi rendere revisore");

        $user = User::where('email', $email)->first();

        if(!$user){
            $this->error("Utente non trovato");
            return;
        }

        $user->is_revisor = true;
        $user->save();
        $this->info("L'utente {$user->name} è ora un revisore.");
        
    }
}
