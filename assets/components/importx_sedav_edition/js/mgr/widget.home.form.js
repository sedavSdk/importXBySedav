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
var topic = '/importx_sedav_edition/';
var register = 'mgr';
importX_sedav_edition.page.createImport = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        formpanel: 'importx_sedav_edition-form-create-import'
        ,buttons: [{
            process: 'import',
            text: _('importx_sedav_edition.startbutton'), 
            handler: function() {
                // Destroy any previously loaded console, so we can load a fresh one without errors.
                if (typeof this.console !== 'undefined') {
                    this.console.destroy();
                }

                this.console = MODx.load({
                   xtype: 'modx-console'
                   ,register: register
                   ,topic: topic
                   ,show_filename: 0
                   ,listeners: {
                     'shutdown': {fn:function() {
                         Ext.getCmp('modx-layout').refreshTrees();
                     },scope:this}
                   }
                });

                this.console.show(Ext.getBody());
                Ext.getCmp('importx_sedav_edition-panel-import').form.submit({
                    success:{fn:function() {
                        this.console.fireEvent('complete');
                    },scope:this},
                    failure: function(f, a) {
                        //alert(_('importx_sedav_edition.importfailure')+' '+a.result.message);
                        //console.fireEvent('complete');
                    }
                });
            }
        },'-',{
            text: _('help_ex'),
            handler: MODx.loadHelpPane
        }]
        ,components: [{
            xtype: 'importx_sedav_edition-form-create-import'
        }]
    });
    importX_sedav_edition.page.createImport.superclass.constructor.call(this,config);
};
Ext.extend(importX_sedav_edition.page.createImport,MODx.Component);
Ext.reg('importx_sedav_edition-page-import',importX_sedav_edition.page.createImport);



importX_sedav_edition.panel.createImport = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        url: importX_sedav_edition.config.connectorUrl
        ,baseParams: {
            action: 'startimport',
            register: register,
            topic: topic
        }
        ,layout: 'fit'
        ,id: 'importx_sedav_edition-panel-import'
        ,buttonAlign: 'center'
        ,fileUpload: true
        ,width: '98%'
        ,items: [{
            border: true
            ,labelWidth: 150
            ,autoHeight: true
            ,buttonAlign: 'center'
            ,items: [{
                html: '<div class="importx_sedav_edition-page-desc"><p>'+_('importx_sedav_edition.desc')+'</p></div>',
            },{
                xtype: 'modx-tabs',
                deferredRender: false,
                forceLayout: true,
                defaults: {
                    layout: 'form',
                    autoHeight: true,
                    hideMode: 'offsets',
                    padding: 15
                },
                items: [{
                    xtype: 'modx-panel',
                    title: _('importx_sedav_edition.tab.input'),
                    items: [{
                        html: '<p>'+_('importx_sedav_edition.tab.input.desc')+'</p>',
                        border: false
                    },{
                        xtype: 'textarea',
                        fieldLabel: _('importx_sedav_edition.csv'), 
                        name: 'csv',
                        id: 'importx_sedav_edition-import-csv',
                        labelSeparator: '',
                        anchor: '100%',
                        height: 150,
                        allowBlank: false,
                        blankText: _('importx_sedav_edition.nocsv')
                    },{
                        xtype: 'textfield',
                        fieldLabel: _('importx_sedav_edition.csvfile'),
                        name: 'csv-file',
                        id: 'csv-file',
                        inputType: 'file'
                    },{
                        html: '<p>'+_('importx_sedav_edition.tab.input.sep')+'</p>',
                        border: false
                    },{
                        xtype: 'textfield',
                        fieldLabel: _('importx_sedav_edition.separator'),
                        name:  'separator',
                        id: 'importx_sedav_edition-import-sep',
                        anchor: '100%',
                        allowBlank: true
                    },{
                        xtype: 'textfield'
                        ,fieldLabel: _('importx_sedav_edition.parent')
                        ,name: 'parent'
                        ,id: 'importx_sedav_edition-import-parent'
                        ,labelSeparator: ''
                        ,anchor: '100%'
                        ,value: 0
                        ,allowBlank: false
                        , blankText: _('importx_sedav_edition.noparent'),
                        disabled: true 
                    },{
                        xtype: 'checkbox',
                        fieldLabel: _('importx_sedav_edition.lock_parent'),
                        name: 'lock_parent',
                        id: 'importx_sedav_edition-lock-parent',
                        anchor: '100%',
                        checked: importX_sedav_edition.defaults['lock_parent'],
                        listeners: {
                            check: {
                                fn: function(cb, checked) {
                                    var parentField = Ext.getCmp('importx_sedav_edition-import-parent');
                                    if (parentField) {
                                        parentField.setDisabled(checked);
                                    }
                                }
                            }
                        }
                    },{
                        xtype: 'checkbox',
                        fieldLabel: _('resource_published'),
                        name: 'published',
                        id: 'importx_sedav_edition-import-published',
                        anchor: '100%',
                        checked: importX_sedav_edition.defaults['published']
                    },{
                        xtype: 'checkbox',
                        fieldLabel: _('resource_searchable'),
                        name: 'searchable',
                        id: 'importx_sedav_edition-import-searchable',
                        anchor: '100%',
                        checked: importX_sedav_edition.defaults['searchable']
                    },{
                        xtype: 'checkbox',
                        fieldLabel: _('resource_hide_from_menus'),
                        name: 'hidemenu',
                        id: 'importx_sedav_edition-import-hidemenu',
                        anchor: '100%',
                        checked: importX_sedav_edition.defaults['hidemenu']
                    }]
                }]
            }]
        }]
    });
    Ext.Ajax.timeout = 0;
    importX_sedav_edition.panel.createImport.superclass.constructor.call(this,config);
};
Ext.extend(importX_sedav_edition.panel.createImport,MODx.FormPanel);
Ext.reg('importx_sedav_edition-form-create-import',importX_sedav_edition.panel.createImport);
