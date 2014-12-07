<?php
class Task extends Eloquent {

    public function list() {
        # Task belongs to a List (Many:1 Relationship)
        return $this->belongsTo('List');
    }


    public function categories() {
        # Tasks belongs to many Categories     
        return $this->belongsToMany('Category');
    }

}