<?php
/*
* @version 0.1 (wizard)
*/
 global $session;
  if ($this->owner->name=='panel') {
   $out['CONTROLPANEL']=1;
  }
  $qry="1";
  // search filters
  // QUERY READY
  global $save_qry;
  if ($save_qry) {
   $qry=$session->data['mpt_qry'];
  } else {
   $session->data['mpt_qry']=$qry;
  }
  if (!$qry) $qry="1";
  $sortby_mpt="ID DESC";
  $out['SORTBY']=$sortby_mpt;
  // SEARCH RESULTS
  //$res=SQLSelect("SELECT * FROM mpt WHERE $qry ORDER BY ".$sortby_mpt);
  $res=SQLSelect("SELECT mpt.ID, terminals.TITLE,terminals.NAME, terminals.HOST FROM `mpt` inner join terminals on mpt.ID_TERMINAL = terminals.ID WHERE $qry ORDER BY ".$sortby_mpt);
  if ($res[0]['ID']) {
   //paging($res, 100, $out); // search result paging
   $total=count($res);
   for($i=0;$i<$total;$i++) {
    // some action for every record if required
   }
   $out['RESULT']=$res;
  }
