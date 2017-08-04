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
 * Leganto module renderer.
 *
 * @package    mod_leganto
 * @copyright  2017 Lancaster University {@link http://www.lancaster.ac.uk/}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Tony Butler <a.butler4@lancaster.ac.uk>
 */
defined('MOODLE_INTERNAL') || die();

class mod_leganto_renderer extends plugin_renderer_base {

    /**
     * Returns html to display the content of mod_leganto.
     *
     * @param stdClass $leganto Record from 'leganto' table.
     * @return string
     */
    public function display_leganto(stdClass $leganto) {
        $output = '';
        $legantoinstances = get_fast_modinfo($leganto->course)->get_instances_of('leganto');
        if (!isset($legantoinstances[$leganto->id]) ||
                !($cm = $legantoinstances[$leganto->id]) ||
                !($context = context_module::instance($cm->id))) {
            // Some error in parameters.
            // Don't throw any errors in renderer, just return empty string.
            // Capability to view module must be checked before calling renderer.
            return $output;
        }

        if (trim($leganto->intro)) {
            if ($leganto->display != LEGANTO_DISPLAY_INLINE) {
                $output .= $this->output->box(format_module_intro('leganto', $leganto, $cm->id),
                        'generalbox', 'intro');
            } else if ($cm->showdescription) {
                // For 'display inline' do not filter, filters run at display time.
                $output .= format_module_intro('leganto', $leganto, $cm->id, false);
            }
        }

        $legantolist = new leganto_list($leganto, $cm);
        if ($leganto->display == LEGANTO_DISPLAY_INLINE) {
            $viewlink = (string) $cm->url;
            $listid = $cm->modname . '-' . $cm->id;

            // YUI function to hide inline resource list until user clicks 'view' link.
            $this->page->requires->js_init_call('M.mod_leganto.init_list', array($cm->id, $viewlink));
            $output .= $this->output->box($this->render($legantolist), 'generalbox legantobox', $listid);
        } else {
            $output .= $this->output->box($this->render($legantolist), 'generalbox', 'leganto');
        }

        return $output;
    }

    public function render_leganto_list(leganto_list $list) {
        global $CFG;

        require_once($CFG->dirroot . '/mod/leganto/locallib.php');

        $leganto = new leganto($list->context, $list->cm, null);
        $output = $leganto->get_list_html($list->leganto->citations);

        return $output;
    }
}

class leganto_list implements renderable {
    public $context;
    public $leganto;
    public $cm;

    public function __construct($leganto, $cm) {
        $this->leganto = $leganto;
        $this->cm = $cm;
        $this->context = context_module::instance($cm->id);
    }
}
