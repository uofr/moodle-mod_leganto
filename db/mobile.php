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
 * Defines mobile handlers.
 *﻿
 * @package    mod_leganto﻿
 * @copyright  2018 Juan Leyva﻿
 * @copyright  2018 Lancaster University {@link http://www.lancaster.ac.uk/}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Tony Butler <a.butler4@lancaster.ac.uk>
 */

defined('MOODLE_INTERNAL') || die();

$addons = array(
    'mod_leganto' => array( // Plugin identifier.
        'handlers' => array( // Different places where the plugin will display content.
            'legantoview' => array( // Handler unique name.
                'displaydata' => array(
                    'icon' => $CFG->wwwroot . '/mod/leganto/pix/icon.png',
                    'class' => ''
                ),
                'delegate' => 'CoreCourseModuleDelegate', // Delegate (where to display the link to the plugin).
                'method' => 'mobile_view_activity' // Main function in \mod_leganto\output\mobile.
            )
        ),
        'lang' => array( // Language strings that are used in all the handlers.
            array('citationchapter', 'leganto'),
            array('citationcount', 'leganto'),
            array('citationcountplural', 'leganto'),
            array('citationnote', 'leganto'),
            array('pluginname', 'leganto'),
            array('sectionheading', 'leganto'),
            array('viewcitation', 'leganto'),
            array('viewonline', 'leganto')
        )
    )
);
