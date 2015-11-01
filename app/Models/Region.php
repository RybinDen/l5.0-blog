<?php
class Region extends Eloquent{
protected $table = 'regions';
public $timestamps= false;
public function settlements(){
return $this->hasMany('Settlement');
}

}