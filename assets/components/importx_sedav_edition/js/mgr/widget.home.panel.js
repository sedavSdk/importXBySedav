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
importX_sedav_edition.panel.Tabs = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false,
        baseCls: 'x-panel',
        items: []
    });
    importX_sedav_edition.panel.Tabs.superclass.constructor.call(this,config);
};
Ext.extend(importX_sedav_edition.panel.Tabs,MODx.Panel);
Ext.reg('importx_sedav_edition-panel-tabs',importX_sedav_edition.panel.Tabs);

