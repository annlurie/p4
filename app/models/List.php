<?php
class List extends Eloquent {

    public function task() {
        # List has many Tasks (1:Many Relationship)
        return $this->hasMany('Task');

}