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


namespace availability_coursecatrole;

defined('MOODLE_INTERNAL') || die();

class frontend extends \core_availability\frontend {

    /**
     * Get the initial parameters needed for JavaScript.
     *
     * @param \stdClass          $course
     * @param \cm_info|null      $cm
     * @param \section_info|null $section
     *
     * @return array
     */
    protected function get_javascript_init_params($course, \cm_info $cm = null, \section_info $section = null) {
        global $DB;
        // Change to JS array format and return.
        $jsarray = array();

        $roles = explode(',', get_config('availability_coursecatrole', 'coursecatroles'));
        foreach ($roles as $rec) {
            $rec = $DB->get_record('role', array('id' => $rec));
            $jsarray[] = (object)array(
                'id' => $rec->id,
                'name' => (!empty($rec->name) ? $rec->name : $rec->shortname),
            );
        }

        return array($jsarray);
    }

    /**
     * Decides whether this plugin should be available in a given course. The plugin can do this depending on course or
     * system settings. Default returns true.
     *
     * @param \stdClass          $course
     * @param \cm_info|null      $cm
     * @param \section_info|null $section
     *
     * @return bool
     */
    protected function allow_add($course, \cm_info $cm = null, \section_info $section = null) {
        $roles = get_config('availability_coursecatrole', 'coursecatroles');
        return !empty($roles);
    }
}
