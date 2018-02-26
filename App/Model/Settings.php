<?php

namespace App\Model;

use Stateless\DatabaseColumn;

class Settings extends \Stateless\Model {

    /**
     * Create the table in the database
     */
    public function install($db) {

        $fields["settingId"] = new DatabaseColumn("settingId", "int", true);

        $fields["settingKey"] = new DatabaseColumn("settingKey", "varchar");
        $fields["settingKey"]->size = 32;
        $fields["settingKey"]->require = true;
        $fields["settingKey"]->unique = true;

        $fields["settingValue"] = new DatabaseColumn("settingValue", "text");
        $fields["settingValue"]->require = true;    

        $db->createTable("Settings", $fields);

    }

};
