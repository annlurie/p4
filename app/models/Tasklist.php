<?php
class Tasklist extends Eloquent {

    public function task() {
        # Tasklist has many Tasks (1:Many Relationship)
        return $this->hasMany('Task');
    }

}



