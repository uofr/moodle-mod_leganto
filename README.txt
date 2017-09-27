This file is part of Moodle - http://moodle.org/

Moodle is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Moodle is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

copyright 2017 Lancaster University (http://www.lancaster.ac.uk/)
license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
author    Tony Butler <a.butler4@lancaster.ac.uk>


Leganto reading list module for Moodle
======================================

The Leganto reading list module enables a teacher to include a selection of
citations from associated Leganto reading lists directly within the content
of their course.

The reading list can be displayed either in a separate, linked page, or
embedded in the course page itself (hidden initially, with a link to toggle
visibility).


Changelog
---------

2017-09-27  v3.3.0
  * Initial stable release


Installation
------------

Installing from the Git repository (recommended if you installed Moodle from
Git):

Follow the instructions at
http://docs.moodle.org/33/en/Git_for_Administrators#Installing_a_contributed_extension_from_its_Git_repository,
e.g. for the Moodle 3.3.x code:
$ cd /path/to/your/moodle/
$ cd mod/
$ git clone https://github.com/tonyjbutler/moodle-mod_leganto.git leganto
$ cd leganto/
$ git checkout -b MOODLE_33_STABLE origin/MOODLE_33_STABLE
$ git branch -d master
$ cd /path/to/your/moodle/
$ echo /mod/leganto/ >> .git/info/exclude


Installing from a zip archive downloaded from
https://moodle.org/plugins/pluginversions.php?plugin=mod_leganto:

1. Download and unzip the appropriate release for your version of Moodle.
2. Place the extracted "leganto" folder in your "/mod/" subdirectory.

Whichever method you use to get the module code in place, the final step is to
visit your Site Administration > Notifications page in a browser to invoke the
installation script and make the necessary database changes.


Updating Moodle
---------------
If you installed Moodle and the Leganto reading list module from Git you can
run the following commands to update both (see
http://docs.moodle.org/33/en/Git_for_Administrators#Installing_a_contributed_extension_from_its_Git_repository):
$ cd /path/to/your/moodle/
$ git pull
$ cd mod/leganto/
$ git pull

If you installed from a zip archive you will need to repeat the installation
procedure using the appropriate zip file downloaded from
https://moodle.org/plugins/pluginversions.php?plugin=mod_leganto for your
new Moodle version.
