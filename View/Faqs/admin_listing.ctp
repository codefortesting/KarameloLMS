<?php
#die(debug($data));
if ( isset($this->Js) ):
    echo $this->Html->script(array('ckeditor/ckeditor', 'jquery.form', 'jquery.CKEditor', 'ckeditor/adapters/jquery'));
endif;

$this->Html->addCrumb('Control Panel', '/admin/entries/start');
$this->Html->addCrumb('FAQs', '/admin/catfaqs/listing');
echo $this->Html->getCrumbs(' > '); 

echo $this->Html->div('title_section', __('Questions & answers'). ' - ' .$catfaq['Catfaq']['title']);
    
echo $this->Gags->imgLoad('loading');
	
echo  $this->Js->link($this->Html->image('actions/new.png', array('alt'=>__('Add new'), 'title'=>__('Add new'))),
                 '/admin/faqs/add/'.$catfaq['Catfaq']['id'], 
	                             array('update'      => '#updater',
                                       'evalScripts' => True,
                                       'before'      => $this->Gags->ajaxBefore('updater'),
                                       'complete'    => $this->Gags->ajaxComplete('updater'),
                                       'escape'=>False));
  
echo $this->Gags->ajaxDiv('updater') . $this->Gags->divEnd('updater');

$order_show = (int) 0;
$num        = (int) count($data);
$msg   = __('Are you sure to want to delete this?');

foreach ($data as $val):
    $order_show++;
    if ($val['Faq']['status'] == 1):
        $img   = 'static/status_1_icon.png';
        $st    = __('Published');
        $order = $order_show;
    else:
        $img   = 'static/status_0_icon.png';
        $st    = __('Draft');
        $order = $order_show .' ('.$st.')';
    endif;

    echo $this->Html->div('grayblock');
    echo $this->Html->para(null,  $order.'.- '.$val['Faq']['question'], array('style'=>'font-weight:bold;'));
    echo $this->Html->div('dvtop');      
    echo $this->Html->link($this->Html->image('static/edit_icon.gif', array('width'=>'14px', 'alt'=>__('Edit'), 'title'=>__('Edit'))), 
                           '/admin/faqs/edit/'.$val['Faq']['id'], array('escape'=>False)) . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    echo $this->Html->link($this->Html->image($img, array('width'=>'14px', 'alt'=>$st, 'title'=>$st)), 
                 '/admin/faqs/change/'.$val['Faq']['id'].'/'.$val['Faq']['catfaq_id'].'/'.$val['Faq']['status'],  array('escape'=>False)) . 
                 ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    echo $this->Html->link($this->Html->image('static/delete_icon.png', array('width'=>'16px', 'alt'=>__('Delete'), 'title'=>__('Delete'))), 
                              '/admin/faqs/delete/'.$val['Faq']['id'].'/'.$val['Faq']['catfaq_id'], 
                              array('onclick'=>"return confirm('".$msg."')", 'escape'=>False)). '   &nbsp;&nbsp;&nbsp;';
    if ($order_show != 1 && $num > 1):
        echo $this->Html->link(
                   $this->Html->image('static/arrow_up_icon.png', array('width'=>'11px', 'alt'=>__('Up'), 'title'=>__('Up'))), 
                   '/admin/faqs/order/up/'.$val['Faq']['id'].'/'. $val['Faq']['display'].'/'.$val['Faq']['catfaq_id'], array('escape'=>False)) . ' ';
    endif;
    # only if not is the last row
    if ($order_show != $num && $num >1 ):
        echo $this->Html->link(
                  $this->Html->image('static/arrow_down_icon.png', 
                   array('width'=>'11px', 'alt'=>__('Down'), 'title'=>__('Down'))), 
                  '/admin/faqs/order/down/'.$val['Faq']['id'].'/'. $val['Faq']['display'].'/'.$val['Faq']['catfaq_id'], array('escape'=>False));
    endif; 
    echo '</div>';  

    echo $this->Html->div(null, $val['Faq']['answer']);
    echo '</div>';
endforeach;
# ? > EOF