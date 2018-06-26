﻿<?php
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
 * Defines the mobile output class for mod_leganto.
 *﻿
 * @package    mod_leganto﻿
 * @copyright  2018 Juan Leyva﻿
 * @copyright  2018 Lancaster University {@link http://www.lancaster.ac.uk/}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Tony Butler <a.butler4@lancaster.ac.uk>
 */

namespace mod_leganto\output;

defined('MOODLE_INTERNAL') || die();

use context_module;

/**
 * Mobile output class for mod_leganto.
 *
 * @package	   ﻿mod_leganto
 * @copyright  2018 Juan Leyva﻿
 * @copyright  2018 Lancaster University {@link http://www.lancaster.ac.uk/}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Tony Butler <a.butler4@lancaster.ac.uk>
 */
class mobile {

    /**
     * Returns the leganto course view for the mobile app.
     *
     * @param array $args Arguments from tool_mobile_get_content WS.
     * @return array HTML, javascript and otherdata.
     */
    public static function mobile_course_view($args) {
        global $OUTPUT, $DB;

        $args = (object) $args;
        $cm = get_coursemodule_from_id('leganto', $args->cmid);
        $context = context_module::instance($cm->id);

        // Capabilities check.
        require_login($args->courseid, false , $cm, true, true);
        require_capability('mod/leganto:view', $context);
        $leganto = $DB->get_record('leganto', array('id' => $cm->instance));

        $leganto->name = format_string($leganto->name);
        list($leganto->intro, $leganto->introformat) = external_format_text($leganto->intro, $leganto->introformat,
                $context->id, 'mod_leganto', 'intro');
        $data = array(
            'leganto' => $leganto,
            'cmid' => $cm->id,
            'courseid' => $args->courseid
        );

        return array(
            'templates' => array(
                array(
                    'id' => 'main',
                    'html' => $OUTPUT->render_from_template('mod_leganto/mobile_view_page', $data),
                ),
            ),
            'javascript' => '',
            'otherdata' => ''
        );
    }
}