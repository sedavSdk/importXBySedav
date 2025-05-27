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
// Last update: 16/5/2011
// Translator: Mark Hamstra
$_lang['importx_sedav_edition'] = 'ImportXSedavEdition';
$_lang['importx_sedav_edition.description'] = 'Importeer CSV gegevens als nieuwe resources.';
$_lang['importx_sedav_edition.desc'] = 'Deze addon kan gebruikt worden om CSV gegevens te importeren naar nieuwe MODX resources. Kies een bovenliggende resource, en voer je CSV gegevens in. Het standaard scheidingsteken is een puntkomma.';
$_lang['importx_sedav_edition.form.basic'] = 'Basis import';
$_lang['importx_sedav_edition.startbutton'] = 'Begin import';
$_lang['importx_sedav_edition.importsuccess'] = 'Het importeren van resources is gelukt.';
$_lang['importx_sedav_edition.importfailure'] = 'Oeps, er is iets fout gegaan tijdens het importeren.';
$_lang['importx_sedav_edition.tab.input'] = 'CSV Invoer';
$_lang['importx_sedav_edition.tab.input.desc'] = 'Plak of upload hier je invoer, waarbij aparte resources gescheiden zijn door een enter en de verschillende velden met een puntkomma (;) of het scheidingsteken wat je beneden aangegeven hebt.';
$_lang['importx_sedav_edition.tab.input.sep'] = 'Wanneer je CSV invoer een ander scheidingsteken gebruikt, kan je dat hier aangeven. Als je dit leeg laat wordt er een puntkomma gebruikt.';
$_lang['importx_sedav_edition.csv'] = 'CSV';
$_lang['importx_sedav_edition.parent'] = 'Bovenliggend:'; 
$_lang['importx_sedav_edition.csvfile'] = 'CSV bestand upload';
$_lang['importx_sedav_edition.separator'] = 'Scheidingsteken';
$_lang['importx_sedav_edition.tab.settings'] = 'Standaard instellingen';
$_lang['importx_sedav_edition.tab.settings.desc'] = 'Geef de standaard instellingen aan. Deze kunnen eventueel per regel worden aangegeven door het veld te benoemen in de eerste regel.';
$_lang['importx_sedav_edition.err.noparent'] = 'Geef een bovenliggend resource ID op, of geef 0 aan om naar de root van de site te importeren.';
$_lang['importx_sedav_edition.err.parentnotnumeric'] = 'Bovenliggend resource moet een cijfer zijn of een context key.';
$_lang['importx_sedav_edition.err.parentlessthanzero'] = 'Bovenliggend resource moet een positief cijfer zijn.';
$_lang['importx_sedav_edition.err.nocsv'] = 'Vul je CSV gegevens in om deze te kunnen verwerken.';
$_lang['importx_sedav_edition.err.fileuploadfailed'] = 'Fout tijdens het lezen van het geuploade bestand.';
$_lang['importx_sedav_edition.err.invalidcsv'] = 'Foutieve CSV gegevens ontvangen.';
$_lang['importx_sedav_edition.err.notenoughdata'] = 'Niet genoeg gegevens ontvangen. Er wordt tenminste een rij met veldnamen en een rij met waardes verwacht.';
$_lang['importx_sedav_edition.err.elementmismatch'] = 'Element velden kloppen niet. Check en corrigeer de syntax op regel [[+line]].';
$_lang['importx_sedav_edition.err.savefailed'] = 'Er heeft een onverwachte fout plaatsgevonden tijdens het opslaan van de resource.';
$_lang['importx_sedav_edition.err.invalidheader'] = 'Je veldnamenrij heeft een of meerdere ongeldige velden. De ongeldig(e) veld(en) zijn: [[+fields]].';
$_lang['importx_sedav_edition.err.intexpected'] = '[[+field]] ([[+int]] zou een cijfer moeten zijn)';
$_lang['importx_sedav_edition.err.tvdoesnotexist'] = '[[+field]] (er bestaat geen TV met ID [[+id]])';
$_lang['importx_sedav_edition.log.runningpreimport'] = 'Pre-import controles worden uitgevoerd op de gegevens...';
$_lang['importx_sedav_edition.log.fileuploadfound'] = 'CSV bestand upload overschrijft handmatige invoer. Bestandsnaam: [[+filename]]';
$_lang['importx_sedav_edition.log.preimportclean'] = 'Geen fouten gevonden in pre-import controles. Import waardes voorbereiden...';
$_lang['importx_sedav_edition.log.importvaluesclean'] = 'Geen fouten in import waardes gevonden. [[+count]] resources gevonden. Importeren...';
$_lang['importx_sedav_edition.log.complete'] = 'Importeren is voltooid. Er zijn [[+count]] resources geimporteerd.';
?>
