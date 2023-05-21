<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use App\Models\Rent;
use Illuminate\Console\Command;

class RentCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rent:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        \Log::info("Cron is working fine!");
     
        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */
      


        $rents =  Rent::where('for_month', '=', date('m-y'))->count();
        \Log::info($rents);
        if($rents == 0)
        {
            $tenants =  Tenant::where('is_active', '=', 1)->get();
            foreach ($tenants as $tenant) {
            // $tag = Rent::firstOrCreate(['name' => $tagName]);
                $rents = Rent::create([
                    'for_month' => date('m-y'),
                    'rent_paid' => 0,
                    'rent_description' => 'Test Description',
                    'due_date' => now(),
                // 'user_id' => $tenant->user_id,
                    'tenant_id' => $tenant->id
                ]);
            }
        }
        return 0;
    }
}
