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
// Last update: 2/5/2011
// Translator: Mark Hamstra
$_lang['importx_sedav_edition'] = 'ImportXSedavEdition';
$_lang['importx_sedav_edition.description'] = 'Import your CSV formatted data into new Resources';
$_lang['importx_sedav_edition.desc'] = 'This component can be used to import CSV formatted files into new MODX Resources. Simply choose a parent to use and enter your CSV formatted information. The default separator is a semi-colon.';
$_lang['importx_sedav_edition.menu_desc'] = 'Create MODX resources from CSV files';
$_lang['importx_sedav_edition.form.basic'] = 'Basic import';
$_lang['importx_sedav_edition.startbutton'] = 'Start import';
$_lang['importx_sedav_edition.importsuccess'] = 'Succesfully imported resources into MODX.';
$_lang['importx_sedav_edition.importfailure'] = 'Oops, an error occurred while importing your resources.';
$_lang['importx_sedav_edition.tab.input'] = 'Data Input';
// Modified 2/5/2011
$_lang['importx_sedav_edition.tab.input.desc'] = 'Paste or upload your data, separating records with a newline and fields with a semi-colon (;) or the separator of your choice specified in the field below.';
$_lang['importx_sedav_edition.tab.input.sep'] = 'When your CSV formatted entry uses a different separator, you can declare it here. Leave empty to use a semi-colon.';
$_lang['importx_sedav_edition.csv'] = 'Raw Data:';
// Added 2/5/2011: (2 items)
$_lang['importx_sedav_edition.parent'] = 'Parent:'; // Not parent resource, as this can also be a context!
$_lang['importx_sedav_edition.csvfile'] = 'Data file upload';
$_lang['importx_sedav_edition.separator'] = 'Separator';
$_lang['importx_sedav_edition.tab.settings'] = 'Default Settings';
$_lang['importx_sedav_edition.tab.settings.desc'] = 'Specify the default settings to be used. You may override these per record by referencing the fieldname in your CSV formatted values.';
$_lang['importx_sedav_edition.err.noparent'] = 'Please choose a Parent to import to. Specify 0 to put new resources in the root of the site.';
// Modified 2/5/2011:
$_lang['importx_sedav_edition.err.parentnotnumeric'] = 'Parent not numeric or valid context key.';
$_lang['importx_sedav_edition.err.parentlessthanzero'] = 'Parent needs to be a positive integer.';
$_lang['importx_sedav_edition.err.nocsv'] = 'Please add your data in order for them to be processed.';
// Added 2/5/2011:
$_lang['importx_sedav_edition.err.fileuploadfailed'] = 'Error reading the uploaded file.';
$_lang['importx_sedav_edition.err.invalidcsv'] = 'Invalid data posted.';
$_lang['importx_sedav_edition.err.notenoughdata'] = 'Not enough data given. Expecting at least one header row, and one data row.';
$_lang['importx_sedav_edition.err.elementmismatch'] = 'Element count do not match. Please check for correct syntax on line [[+line]].';
$_lang['importx_sedav_edition.err.savefailed'] = 'An unexpected error occurred saving the resource.';
$_lang['importx_sedav_edition.err.invalidheader'] = 'Your header has one or more invalid fieldnames. The invalid fieldname(s) is (are): [[+fields]].';
$_lang['importx_sedav_edition.log.runningpreimport'] = 'Running pre-import tests on submitted data...';
// Added 2/5/2011:
$_lang['importx_sedav_edition.log.fileuploadfound'] = 'Data file upload overriding any manual input. Filename: [[+filename]]';
$_lang['importx_sedav_edition.log.preimportclean'] = 'No errors in pre-import found. Preparing import values...';
// Modified 2/5/2011:
$_lang['importx_sedav_edition.log.importvaluesclean'] = 'No errors found while checking the import values: [[+count]] items found. Running import...';
$_lang['importx_sedav_edition.log.complete'] = 'Importing completed. [[+count]] resources have been imported.';

// Added or modified 15/12/20111
$_lang['importx_sedav_edition.log.safemodeon'] = 'It seems like safe_mode is enabled on your server. This means ImportXSedavEdition cannot change the max execution time and it is possible the script will timeout in roughly 30 seconds. ';
$_lang['importx_sedav_edition.log.timelimit'] = 'Attempted to set execution time to infinite. Max execution time currently: [[+limit]].';
$_lang['importx_sedav_edition.infinite'] = 'infinite';
$_lang['importx_sedav_edition.log.classnf'] = 'The requested import class [[+type]] could not be found.';
$_lang['importx_sedav_edition.err.invalidfield'] = 'Invalid field: [[+field]]';
$_lang['importx_sedav_edition.err.intexpected'] = 'Invalid field: [[+field]] ([[+int]] is expected to be an integer)';
$_lang['importx_sedav_edition.err.tvdoesnotexist'] = 'Invalid field: [[+field]] (no TV with an ID of [[+id]])';
?>
