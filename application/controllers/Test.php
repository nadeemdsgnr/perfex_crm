<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
    public function table_data($table)
    {
     
        $data = $this->db->get(db_prefix().$table)->result_array();

        echo "<pre>";print_r($data);
        var_dump(@$data[0]);
       
    }

    public function delete_row($table, $value, $key="id")
    {
     
        $this->db->where($key, $value);
        $data = $this->db->delete(db_prefix().$table)->result_array();

        var_dump( $data);
    }

    public function update(){

        // $this->db->query('ALTER TABLE `' . db_prefix() . 'modules` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`id`)');
        // $this->db->query('ALTER TABLE `' . db_prefix() . 'modules` DROP COLUMN `id`,DROP PRIMARY KEY;');
        // $this->db->query('ALTER TABLE `' . db_prefix() . 'options` DROP COLUMN `id`,DROP PRIMARY KEY;');
        // $this->db->query('ALTER TABLE `' . db_prefix() . 'options`
        // ADD `id` INT(11) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`)');
        // $this->db->query('ALTER TABLE `' . db_prefix() . 'modules`
        // ADD `id` INT(11) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`)');

        // $this->db->query('ALTER TABLE `' . db_prefix() . 'modules`
        // ADD `id` INT(11) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`)');

        if (!$this->db->field_exists('name' ,db_prefix() . 'clients')) { 
            $this->db->query('ALTER TABLE `' . db_prefix() . "clients`
              ADD `name` VARCHAR(245) NULL DEFAULT NULL AFTER `userid`;");
          }

        echo $this->db->last_query();
    }


}
