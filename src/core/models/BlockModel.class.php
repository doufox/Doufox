<?php
if (!defined('IN_CRONLITE')) {
    exit();
}

class BlockModel extends Model
{

    public function get_primary_key()
    {
        return $this->primary_key = 'id';
    }

    public function get_fields()
    {
        return $this->get_table_fields();
    }
}
