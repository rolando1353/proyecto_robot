<?php

namespace App\Listeners;

use App\Events\UserReferred;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request; 

use App\Models\ReferralLink;
use App\Models\ReferralRelationship;

class RewardUser
{
    use SerializesModels;

    /**
     * Handle the event.
     *
     * @param  UserReferred  $event
     * @return void
     */
    public function handle(UserReferred $event)
    {        
        $referralParent = ReferralLink::find($event->referralId);
        if (!is_null($referralParent)) {
            ReferralRelationship::create(['referral_link_id' => $referralParent->id, 'user_id' => $event->user->id]);

            //Todo Create the Code and Tree
            $child = new ReferralLink();
            $child->user_id = $event->user->id;
            $child->referral_program_id = $referralParent->referral_program_id;
            $child->appendToNode($referralParent)->save();
        }
                
    }


    public function broadcastOn()
    {
        return [];
    }    
}
