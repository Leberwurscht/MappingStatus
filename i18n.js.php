<?php
/*
 * MappingStatusMap is a Mediawiki extention that allows one to insert maps into
 * a wiki page, mark areas and set flags for how well that area is mapped in
 * Openstreetmap.
 *
 * Copyright 2010 Maximilian Hoegner <pbmaxi@hoegners.de>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Maximilian Hoegner <pbmaxi@hoegners.de>
 * @addtogroup Extensions
 */

require_once(dirname(__FILE__)."/MappingStatus.i18n.php");

header('Content-Type: application/javascript; charset=UTF-8');

echo "MappingStatusMapMessages = {\n";

$lang = $_REQUEST['lang'];

$dict=$messages['en'];

if (array_key_exists($lang,$messages))	
	foreach ($messages[$lang] as $key=>$value)
		$dict[$key] = $value;

foreach ($dict as $key=>$value)
{
	echo "\t'".addslashes(substr($key,14))."':'".addslashes($value)."',\n";
}

echo "}";

?>
