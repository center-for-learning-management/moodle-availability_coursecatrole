<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Availability coursecatrole
 *
 * @package    availability_coursecatrole
 * @copyright  2020 Center for Learningmanagement (www.lernmanagement.at)
 * @author     Robert Schrenk
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $sql = "SELECT r.*
                FROM {role} AS r, {role_context_levels} AS rcl
                WHERE r.id=rcl.roleid
                    AND rcl.contextlevel = ?
                ORDER BY r.name ASC";
    $roles = $DB->get_records_sql($sql, array(CONTEXT_COURSECAT));
    $options = array();
    foreach($roles AS $role) {
        $options[$role->id] = (!empty($role->name) ? $role->name : $role->shortname);
    }

    $settings->add(new admin_setting_configmultiselect('availability_coursecatrole/coursecatroles', get_string('setting:roles', 'availability_coursecatrole'),
                       get_string('setting:roles:description', 'availability_coursecatrole'), get_config('availability_coursecatrole', 'coursecatroles'), $options));
}
