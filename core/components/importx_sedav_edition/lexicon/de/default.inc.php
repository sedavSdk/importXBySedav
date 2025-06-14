<?php
/*
 * importX_sedav_edition
 *
 * Copyright 2011-2014 by Mark Hamstra (https://www.markhamstra.com)
 * Development funded by Working Party, a Sydney based digital agency.
 *
 * All rights reserved.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 */
// Last update: 11/5/2011
// Translator: spackko [http://modxcms.com/forums/index.php/topic,63812.msg361212.html#msg361212]
// Translator: smooth-graphics
$_lang['importx_sedav_edition'] = 'ImportXSedavEdition';
$_lang['importx_sedav_edition.description'] = 'Import von CSV formatierten Daten in neue Ressourcen';
$_lang['importx_sedav_edition.desc'] = 'Dieses Plugin kann aus CSV formatierte Daten neue MODX Ressourcen erstellen. Einfach die Eltern-Ressource wählen und die CSV formatierten Daten wählen. Standardmäßig ist das Semikolon als Trennzeichen defininiert.';
$_lang['importx_sedav_edition.form.basic'] = 'Einfacher Import';
$_lang['importx_sedav_edition.startbutton'] = 'Starte den Import';
$_lang['importx_sedav_edition.importsuccess'] = 'Daten erfolgreich in MODX importiert.';
$_lang['importx_sedav_edition.importfailure'] = 'Autsch, während des Imports ist ein Fehler aufgetreten.';
$_lang['importx_sedav_edition.tab.input'] = 'CSV Eingabe';
$_lang['importx_sedav_edition.tab.input.desc'] = 'Daten in das vorgesehene Feld kopieren. Datensätze werden durch eine Zeilenschaltung getrennt. Datenfelder werden standardmäßig mit einem Semikolon (;) getrennt. Andere Trennzeichen können im folgenden Feld angegeben werden.';
$_lang['importx_sedav_edition.tab.input.sep'] = 'Bitte das Trennzeichen angeben, das in den Daten verwendet wird. Wird ein Semikolon verwendet, bitte dieses Feld leer lassen.';
$_lang['importx_sedav_edition.csv'] = 'Raw CSV';
$_lang['importx_sedav_edition.parent'] = 'Elternelement:';
$_lang['importx_sedav_edition.csvfile'] = 'CSV Dateiupload';
$_lang['importx_sedav_edition.separator'] = 'Trennzeichen';
$_lang['importx_sedav_edition.tab.settings'] = 'Standard Vorgaben';
$_lang['importx_sedav_edition.tab.settings.desc'] = 'Bitte die Standard-Angaben definieren. Diese können als Datensatz bei Nennung des Feldnamens in den CSV-Daten geändert werden.';
$_lang['importx_sedav_edition.err.noparent'] = 'Bitte die Eltern-Ressource angeben, unter der die Daten importiert werden. Sollen die Daten im Root-Verzeichnis der Site erstellt werden, bitte 0 als Eltern-Ressource angeben.';
$_lang['importx_sedav_edition.err.parentnotnumeric'] = 'Die Eltern-Ressource ist kein numerischer Wert.';
$_lang['importx_sedav_edition.err.parentlessthanzero'] = 'Die Eltern-Ressource muss eine positive Zahl.';
$_lang['importx_sedav_edition.err.nocsv'] = 'Bitte CSV Daten in der Reihenfolge eingeben, in der sie importiert werden sollen.';
$_lang['importx_sedav_edition.err.fileuploadfailed'] = 'Fehler beim Lesen der hochgeladenen Datei.';
$_lang['importx_sedav_edition.err.invalidcsv'] = 'Ungültige CSV Werte eingegeben.';
$_lang['importx_sedav_edition.err.notenoughdata'] = 'Nicht genug Daten. Die eingegebenen Daten müssen aus einer Zeile Header und und mindestens einer Zeile zu importierenden Daten bestehen.';
$_lang['importx_sedav_edition.err.elementmismatch'] = 'Anzahl der angegebenen Elemente stimmt nicht. Bitte korrekte Syntax in Zeile [[+line]] überprüfen.';
$_lang['importx_sedav_edition.err.savefailed'] = 'Ein unerwarteter Fehler ist beim Speichern der Ressource aufgetreten.';
$_lang['importx_sedav_edition.err.invalidheader'] = 'Der Header der Daten hat einen oder mehrere ungültige Feldnamen. Ungültige Feldnamen sind: [[+fields]].';
$_lang['importx_sedav_edition.err.intexpected'] = '[[+field]] ([[+int]] hier wird eine ganzzahlige Zahl erwartet)';
$_lang['importx_sedav_edition.err.tvdoesnotexist'] = '[[+field]] (keine TV mit der ID [[+id]] gefunden)';
$_lang['importx_sedav_edition.log.runningpreimport'] = 'Starte die Vor-Überprüfung der eingegebenen Daten...';
$_lang['importx_sedav_edition.log.fileuploadfound'] = 'CSV Dateiupload überschreibt alle manuellen Eingaben. Dateiname: [[+filename]]';
$_lang['importx_sedav_edition.log.preimportclean'] = 'Keine Fehler im Pre-Import gefunden. Bereite die Import-Daten vor....';
$_lang['importx_sedav_edition.log.importvaluesclean'] = 'Es wurden keine Fehler bei der Überprüfung der Daten gefunden. Starte den Import...';
$_lang['importx_sedav_edition.log.complete'] = 'Import beendet. [[+count]] Ressourcen wurden importiert.';
?>
