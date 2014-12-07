<?php
class Task extends Eloquent {

    public function tasklist() {
        # Task belongs to a Tasklist (Many:1 Relationship)
        return $this->belongsTo('Tasklist');
    }
/*
    public function categories() {
        # Tasks belongs to many Categories     
        return $this->belongsToMany('Category');
    }
*/
}