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
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';
 
$corePath = $modx->getOption('importx_sedav_edition.core_path',null,$modx->getOption('core_path').'components/importx_sedav_edition/');
require_once $corePath.'model/importx_sedav_edition/importx_sedav_edition.class.php';
$modx->importx_sedav_edition = new importX_sedav_edition($modx);
 
$modx->lexicon->load('importx_sedav_edition:default,resource');
 
/* handle request */
$path = $modx->getOption('processorsPath',$modx->importx_sedav_edition->config,$corePath.'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));

?>
