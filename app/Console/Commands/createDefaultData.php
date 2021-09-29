<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\User;
use App\Models\ReferralProgram;
use App\Models\ReferralLink;

class createDefaultData extends Command
{
    const PROGRAM_NAME = "Las Aventuras de Bot y Fer";
    /**
     * The name and signature of the console command.
     *
     * @var string
     */ 
    protected $signature = 'setup:install {admin_name} {admin_email} {admin_password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command creates the structure necesary to start to use the projetc (Admin User, Referral Program, Root of Three)';

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
        $this->info("Starting the process...");             

        DB::beginTransaction();

        try {
            $user  = User::where("email", $this->argument("admin_email"))->first();

            if(!empty($user)) {
                $this->info("The information is already created");
                return null; 
            }



            $user = new User();
            $user->name = $this->argument("admin_name");
            $user->email = $this->argument("admin_email");
            $user->password = bcrypt($this->argument("admin_password"));
            $user->save();
    
    
            //create the First Program
            $referralProgram = new ReferralProgram();
            $referralProgram->name = static::PROGRAM_NAME;
            $referralProgram->uri = "register";
            $referralProgram->save();
    
    
            //create the root tree
            $referralLink = new ReferralLink();
            $referralLink->user_id = $user->id;
            $referralLink->referral_program_id = $referralProgram->id;
            $referralLink->makeRoot()->save();
    
            DB::commit();
            $this->info("Finished"); 
        } catch(ValidationException $e) {
            // Rollback and then redirect
            // back to form with errors
            DB::rollback();
            Log::error("Processing Error:".$e->getMessage());
            $this->error("Processing Error:".$e->getMessage()); 
        } catch(Illuminate\Database\QueryException $e) {
            DB::rollback();
            Log::error("Processing Error:".$e->getMessage());

        }
        catch(\Exception $e){
            DB::rollback();
            Log::error("Processing Error:".$e->getMessage());
            $this->error("Processing Error:".$e->getMessage());             
        }
                
        
    }
}
