<?php

/*   http://jqueryvalidation.org/
http://getbootstrap.com/2.3.2/base-css.html#buttons
http://localhost/test/jQuery-Autocomplete-master/
Funciones espcíficas de TemaTres Term Builder
Datos de definición del vocabulario   */

//function to create drop down from values of NT
function HTMLdoSelect($URL_BASE,$term_id) {

    $vocabData=getURLdata($URL_BASE.'?task=fetchVocabularyData');

    $term_id=(int) $term_id;

    $rows='<div class="input-group input-group-lg">';

    $dataTerm=getURLdata($URL_BASE.'?task=fetchTerm&arg='.$term_id);

    $rows.='<label style="font-weight: bold;" for="tag_'.$term_id.'" title="'.(string) $vocabData->result->title.' : '.(string) $dataTerm->result->term->string.'">';
    $rows.='<p><a href="'.$vocabData->result->uri.'index.php?tema='.$term_id.'" title="'.(string) $vocabData->result->title.' : '.(string) $dataTerm->result->term->string.'">'.(string) $dataTerm->result->term->string.':</a>&nbsp;</p></label>';


    $rows.='<select id="tag_'.$term_id.'">';
    $rows.='<option value="">Escolha um valor</option>';
    $data=getURLdata($URL_BASE.'?task=fetchDown&arg='.$term_id);

    if($data->resume->cant_result > 0)	{
            foreach ($data->result->term as $value){
            $rows.= '<option value="'.$value->term_id.'">'.$value->string.'</option>';
            }
    }

    $rows.='</select>';
    $rows.='<p> </p>';
    $rows.='</div><!-- /input-group -->	   ';

return $rows;
}
