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
// Translator: MeltingMedia 
$_lang['importx_sedav_edition'] = 'ImportXSedavEdition';
$_lang['importx_sedav_edition.description'] = 'Importer vos données CSV et transformez-les en ressources';
$_lang['importx_sedav_edition.desc'] = 'Ce composant peut être utilisé pour importer des ressources MODX depuis un fichier CSV. Spécifiez une ressource parente et entrez le contenu de votre fichier CSV. Le délimiteur par défaut est un point-virgule.';
$_lang['importx_sedav_edition.form.basic'] = 'Import classique';
$_lang['importx_sedav_edition.startbutton'] = 'Démarrer l\'import';
$_lang['importx_sedav_edition.importsuccess'] = 'Vos ressources ont été importées avec succès dans MODX.';
$_lang['importx_sedav_edition.importfailure'] = 'Oops, une erreur est survenue lors de l\'import de vos ressources.';
$_lang['importx_sedav_edition.tab.input'] = 'Entrée CSV';
$_lang['importx_sedav_edition.tab.input.desc'] = 'Collez ou importez votre fichier CSV ici. Chaque entrée doit être sur une ligne et les champs doivent être délimités par un point-virgule (;), ou tout autre délimiteur spécifié dans le champ « séparateur » ci-dessous.';
$_lang['importx_sedav_edition.tab.input.sep'] = 'Indiquez ici si votre fichier CSV utilise un délimiteur particulier. Laissez vide pour utiliser le point-virgule comme délimiteur par défaut.';
$_lang['importx_sedav_edition.csv'] = 'CSV brut';
$_lang['importx_sedav_edition.parent'] = 'Parent:'; // Not parent resource, as this can also be a context!
$_lang['importx_sedav_edition.csvfile'] = 'Fichier CSV';
$_lang['importx_sedav_edition.separator'] = 'Séparateur';
$_lang['importx_sedav_edition.tab.settings'] = 'Paramètres par défaut';
$_lang['importx_sedav_edition.tab.settings.desc'] = 'Veuillez indiquer les paramètres à utiliser par défaut. Vous pourrez outrepasser ces paramètres en indiquant le nom des champs dans vos données CSV.';
$_lang['importx_sedav_edition.err.noparent'] = 'Veuillez indiquer le parent cible de l\'import. Indiquez 0 pour importer vos ressources à la racine de votre site.';
$_lang['importx_sedav_edition.err.parentnotnumeric'] = 'ID de ressource parente non numérique ou clé de contexte invalide.';
$_lang['importx_sedav_edition.err.parentlessthanzero'] = 'Le parent doit être un entier positif.';
$_lang['importx_sedav_edition.err.nocsv'] = 'Veuillez ajouter les valeurs de votre CSV dans l\'ordre dans lesquelles elles doivent être éxécutées.';
$_lang['importx_sedav_edition.err.fileuploadfailed'] = 'Erreur lors de la lecture du fichier.';
$_lang['importx_sedav_edition.err.invalidcsv'] = 'Valeur de CSV invalide.';
$_lang['importx_sedav_edition.err.notenoughdata'] = 'Pas assez d\'informations fournies. Veuillez indiquer au minimum une ligne d\'entête ainsi qu\'une ligne de données.';
$_lang['importx_sedav_edition.err.elementmismatch'] = 'Le nombre d\élément ne correspond pas. Veuillez vérifier la syntaxe de la ligne [[+line]].';
$_lang['importx_sedav_edition.err.savefailed'] = 'Une erreur est survenue lors de la sauvegarde de la ressource.';
$_lang['importx_sedav_edition.err.invalidheader'] = 'Votre entête contient au moins un nom éronné. Le(s) nom(s) est(sont): [[+fields]].';
$_lang['importx_sedav_edition.err.intexpected'] = '[[+field]] ([[+int]] doit être un entier)';
$_lang['importx_sedav_edition.err.tvdoesnotexist'] = '[[+field]] (aucune variable de modèle ayant pour ID [[+id]])';
$_lang['importx_sedav_edition.log.runningpreimport'] = 'Tests de pré-importation des données…';
$_lang['importx_sedav_edition.log.fileuploadfound'] = 'L\'envoi de fichier et l\'entrée manuelle de données ne fonctionnent pas simultanément. Nom du fichier: [[+filename]]';
$_lang['importx_sedav_edition.log.preimportclean'] = 'Aucune erreur trouvée lors de la pré-importation. Préparation de l\'import des valeurs…';
$_lang['importx_sedav_edition.log.importvaluesclean'] = 'Aucune erreur trouvée lors de la vérification des données: [[+count]] éléments trouvés. Import en cours…';
$_lang['importx_sedav_edition.log.complete'] = 'Import terminé. [[+count]] ressources ont été importées.';
?>
