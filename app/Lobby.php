<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;

class Lobby extends Model
{
    //

	protected $fillable = [ // Also check getters below
		'title',
		'description',
		'game_slug',
		'featured',
		'scheduled_time',
		'end_time',
		'slots_available',
		'security',
		'password'
	];

    protected $hidden = [
        'password'
    ];

    protected $hoursBeforeAutoFinish	= 6; // Number of hours after the lobby opens before it is automatically considered "finished"
   	protected $minutesAfterSoon			= 35; // Number of minutes (before the lobby opens) that a lobby is considered to be starting soon 


    public function setScheduledTimeAttribute($scheduled_time)
    {
        $this->attributes['scheduled_time'] = $scheduled_time;
        $this->attributes['end_time'] = Carbon::parse($scheduled_time)->addHours($this->hoursBeforeAutoFinish);
    }

    public function game()
    {
    	return $this->belongsTo('App\Game', 'game_slug', 'slug');
    }

    public function host()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function players()
    {
    	return $this->belongsToMany('App\User')->withTimestamps()->orderBy('lobby_user.created_at', 'asc');
    }




/**
 * Checks to see if the lobby is owned (hosted) by the given user
 *
 * @returns boolean
 */
    public function isOwnedBy(User $user)
    {
    	if($user->id == $this->host->id)
    	{
    		return true;
    	}else{
    		return false;
    	}
    }






    public function addPlayer(User $user)
    {
        if($user->id != $this->host->id)
        {
            $this->players()->attach($user->id);
        }
    }

    public function removePlayer(User $user)
    {
        if($user->id != $this->host->id)
        {
            $this->players()->detach($user->id);
        }
    }




    public function hasEnded()
    {
        if(Carbon::parse($this->end_time)->isFuture())
        {
            return false;
        }else{
            return true;
        }
    }
    public function hasFinished()
    {
        return $this->hasEnded();
    }







    public function getDateAttribute()
    {
    	return Carbon::parse($this->attributes['scheduled_time'])->toDateString(); // returns the Date listed in "scheduled_time"
    }


    public function getTimeAttribute()
    {
    	return Carbon::parse($this->attributes['scheduled_time'])->toTimeString(); // returns the Time listed in "scheduled_time
    }


    /*
	*	
	*	Human readable dates and times...
	*
    */

    public function getDayDateTimeStringAttribute()
    {
    	return Carbon::parse($this->attributes['scheduled_time'])->toDayDateTimeString(); // Thu, Dec 25, 1975 2:15 PM
    }


    public function getTimeHumanAttribute()
    {
    	return Carbon::parse($this->attributes['scheduled_time'])->format('g:i A'); // 2:15 PM
    }


    public function getDayOfWeekTimeHumanAttribute()
    {
    	return Carbon::parse($this->attributes['scheduled_time'])->format('l \@ g:i A'); // Thu @ 2:15 PM
    }


    public function getFromNowHumanAttribute()
    {
    	return Carbon::parse($this->attributes['scheduled_time'])->diffForHumans(); // 4 minutes ago
    }


    // public function getMinutesFromNowAttribute()
    // {
    // 	return Carbon::now()->diffInMinutes(Carbon::parse($this->attributes['scheduled_time']), false); // -3
    // }





    


    public function getIsFinishedAttribute()
    {
        return $this->hasEnded();
    	// $workingDate				= Carbon::parse($this->attributes['scheduled_time']);


    	// if(Carbon::now()->diffInSeconds($workingDate, false) < ($this->hoursBeforeAutoFinish * 60 * 60 * -1))
    	// {
    		
    	// 	return true;

    	// }else{

    	// 	return false;
    	// }
    }


    public function getIsLiveAttribute()
    {
    	$workingDate				= Carbon::parse($this->attributes['scheduled_time']);


    	if((Carbon::now()->diffInSeconds($workingDate, false) <= 0) && (Carbon::now()->diffInSeconds($workingDate) >= ($this->hoursBeforeAutoFinish * 60 * 60 * -1)))
    	{
    		
    		return true;

    	}else{

    		return false;
    	}
    }


    public function getIsSoonAttribute()
    {
    	$workingDate				= Carbon::parse($this->attributes['scheduled_time']);


    	if((Carbon::now()->diffInSeconds($workingDate, false) > 0) && (Carbon::now()->diffInSeconds($workingDate) <= ($this->minutesAfterSoon * 60)))
    	{
    		
    		return true;

    	}else{

    		return false;
    	}
    }


    public function getIsTodayAttribute()
    {
    	$workingDate = Carbon::parse($this->attributes['scheduled_time']);

    	if($workingDate->toDateString() == Carbon::now()->toDateString())
    	{

    		return true;

    	}else{

    		return false;
    	}
    }


    public function getIsTomorrowAttribute()
    {
    	$workingDate = Carbon::parse($this->attributes['scheduled_time']);

    	if($workingDate->toDateString() == Carbon::now()->addDay()->toDateString())
    	{
    		
    		return true;

    	}else{

    		return false;
    	}
    }


    public function getIsThisWeekAttribute()
    {
    	$workingDate = Carbon::parse($this->attributes['scheduled_time']);

    	if($workingDate->diffInDays(Carbon::now()->addWeek()) <= 7)
    	{
    		
    		return true;

    	}else{

    		return false;
    	}
    }



}
