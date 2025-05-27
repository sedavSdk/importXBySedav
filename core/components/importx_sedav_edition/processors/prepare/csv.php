<?php

require_once ('prepare.class.php');

class prepareCsv extends prepareImport {

    function process() {
        $lines = explode("\n",$this->data);
        if (count($lines) <= 1) {
            $this->importx_sedav_edition->errors[] = $this->modx->lexicon('importx_sedav_edition.err.notenoughdata');
            return false;
        }
        
        $headingline = trim($lines[0]);
        if (substr($headingline,-strlen($this->importx_sedav_edition->config['separator'])) == $this->importx_sedav_edition->config['separator']) {
            $headingline = substr($headingline,0,-strlen($this->importx_sedav_edition->config['separator']));
        }
        $headings = explode($this->importx_sedav_edition->config['separator'],$headingline);
        $headingcount = count($headings);
        $tvInHeadings = false;
        
        // Validate the headers...
        $fields = ['id', 'type', 'contentType', 'pagetitle', 'longtitle',  'alias', 'description', 'link_attributes', 'published', 'pub_date', 'unpub_date', 'parent', 'isfolder', 'introtext', 'content', 'richtext', 'template', 'menuindex', 'searchable', 'cacheable', 'createdby', 'createdon', 'editedby', 'editedon', 'deleted', 'deletedon', 'deletedby', 'publishedon', 'publishedby', 'menutitle', 'donthit', 'haskeywords', 'hasmetatags', 'privateweb', 'privatemgr', 'content_dispo', 'hidemenu', 'class_key', 'context_key', 'content_type', 'uri', 'uri_override', 'lock_parent'];
        foreach ($headings as $h) {
            $h = trim($h);
            if (!in_array($h,$fields)) {
                if (substr($h,0,2) != 'tv') {
                    $this->importx_sedav_edition->errors[] = $this->modx->lexicon('importx_sedav_edition.err.invalidfield', ['field' => $h]);
                }
                else {
                	$tvInHeadings = true;
                    if (intval(substr($h,2)) <= 0) {
                        $this->importx_sedav_edition->errors[] = $this->modx->lexicon('importx_sedav_edition.err.intexpected', ['field' => $h, 'int' => substr($h,2)]);
                    }
                    else {
                        $tvo = $this->modx->getObject('modTemplateVar',substr($h,2));
                        if (!$tvo) {
                            $this->importx_sedav_edition->errors[] = $this->modx->lexicon('importx_sedav_edition.err.tvdoesnotexist', ['field' => $h, 'id' => substr($h,2)]);
                        }
                    }
                }
            }
        }
        
        if (count($this->importx_sedav_edition->errors) > 0) { 
            return false;
        }
        
        unset($lines[0]);
        $this->importx_sedav_edition->log('info', $this->modx->lexicon('importx_sedav_edition.log.preimportclean'));
        sleep(1);
        
        $err = [];
        foreach ($lines as $line => $lineval) {
            $lineval = trim($lineval);
            if (substr($lineval,-strlen($this->importx_sedav_edition->config['separator'])) == $this->importx_sedav_edition->config['separator']) {
                $lineval = substr($lineval,0,-strlen($this->importx_sedav_edition->config['separator']));
            }
            
            $curline = explode($this->importx_sedav_edition->config['separator'],$lineval);
            if ($headingcount != count($curline)) {
                $err[] = $line + 1; // add one, because array reference is zero based, line reference in csv data is not
            }
            else {
                $lines[$line] = array_combine($headings,$curline);
                if (!isset($lines[$line]['context_key'])) {
                    $lines[$line]['context_key'] = $this->importx_sedav_edition->defaults['context_key'];
                }

                if (!isset($lines[$line]['parent'])) {
                    $lines[$line]['parent'] = $this->importx_sedav_edition->defaults['parent'];
                }

                if (!isset($lines[$line]['lock_parent'])) {
                    $lines[$line]['lock_parent'] = $this->importx_sedav_edition->defaults['lock_parent'];
                }

                if (!isset($lines[$line]['published'])) {
                    $lines[$line]['published'] = $this->importx_sedav_edition->defaults['published'];
                }

                if (!isset($lines[$line]['searchable'])) { $lines[$line]['searchable'] = $this->importx_sedav_edition->defaults['searchable'];
                }

                if (!isset($lines[$line]['hidemenu'])) {
                    $lines[$line]['hidemenu'] = $this->importx_sedav_edition->defaults['hidemenu'];
                }

                if($tvInHeadings) {
                    $lines[$line]['tvs'] = true; // makes tvs save on update
                }
            }
        }
        if (count($err) > 0) {
            $this->importx_sedav_edition->errors[] = $this->modx->lexicon('importx_sedav_edition.err.elementmismatch', ['line' => implode(', ', $err)]);
            return false;
        }
        return $lines;
    }
}

/* Return the class name */
return 'prepareCsv';
