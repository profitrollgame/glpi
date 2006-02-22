<?php
/*
 * @version $Id$
 ----------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2006 by the INDEPNET Development Team.
 
 http://indepnet.net/   http://glpi.indepnet.org
 ----------------------------------------------------------------------

 LICENSE

	This file is part of GLPI.

    GLPI is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    GLPI is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with GLPI; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 ------------------------------------------------------------------------
*/

// ----------------------------------------------------------------------
// Original Author of file: Julien Dombre
// Purpose of file:
// ----------------------------------------------------------------------


include ("_relpos.php");
include ($phproot."/glpi/includes.php");
header("Content-Type: text/html; charset=UTF-8");
header_nocache();

checkAuthentication("admin");

if (isset($_POST["device_type"])&&isset($_POST["id_field"])&&$_POST["id_field"]){
	include ($phproot."/glpi/includes_search.php");
	echo "<input type='hidden' name='field' value='".$SEARCH_OPTION[$_POST["device_type"]][$_POST["id_field"]]["linkfield"]."'>";
	if ($SEARCH_OPTION[$_POST["device_type"]][$_POST["id_field"]]["table"]==$LINK_ID_TABLE[$_POST["device_type"]]){ // field type
		autocompletionTextField($SEARCH_OPTION[$_POST["device_type"]][$_POST["id_field"]]["linkfield"],$SEARCH_OPTION[$_POST["device_type"]][$_POST["id_field"]]["table"],$SEARCH_OPTION[$_POST["device_type"]][$_POST["id_field"]]["field"]);
	} else { // dropdown case
		dropdown($SEARCH_OPTION[$_POST["device_type"]][$_POST["id_field"]]["table"],$SEARCH_OPTION[$_POST["device_type"]][$_POST["id_field"]]["linkfield"]);
	}
	echo "<input type=\"submit\" name=\"massiveaction\" class=\"submit\" value=\"".$lang["buttons"][2]."\" >";
}

?>