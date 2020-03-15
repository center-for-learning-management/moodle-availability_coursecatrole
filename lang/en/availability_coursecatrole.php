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

$string['description'] = 'Check availability based on coursecategory roles.';
$string['error_selectrole'] = 'You must select a role';
$string['missing'] = '[Missing role]';

$string['pluginname'] = 'Restriction by coursecategory role';
$string['privacy:metadata'] = 'The restriction by coursecategory role plugin does not store any personal data.';

$string['requires_role'] = 'You are a(n) <em>{$a}</em>';
$string['requires_notrole'] = 'You are not a(n) <em>{$a}</em>';
$string['setting:roles'] = 'Supported roles';
$string['setting:roles:description'] = 'Specify which courecategory roles are selectable by users to restrict access.';
$string['title'] = 'Coursecategory role';
