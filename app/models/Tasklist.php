<?php
class Tasklist extends Eloquent {

    public function task() 
    {
        # Tasklist has many Tasks (1:Many Relationship)
        return $this->hasMany('Task');
    }

	/**
	* This method will generate a key=>value pair of tasklist id => tasklist title
	*
	* @return Array
	*/
	/*public static function getIdNamePair() 
	{
		$tasklists = Array();
		$collection = Tasklist::all();
		foreach($collection as $tasklists) 
		{
			$tasklists[$tasklists->id] = $tasklist->title;
		}
		return $tasklists;
	}*/

}



