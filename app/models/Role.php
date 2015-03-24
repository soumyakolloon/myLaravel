<?php
class Role extends Eloquent
{
    public function permissions() {
        return $this->hasMany('Permission');
    }
}

?>
