<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
<script type="text/javascript">
    $(document).ready(function() {
		//by me
    });
	
	function show_more(num){
		var d = "#detailed_view"+num;
		//var v = "#list_view"+num;
		//$(v).toggle(50)
		$(d).toggle(50)
	}

function imageChange(element) 
{
	if(document.getElementById(element).src=='<?php echo base_url()?>images/ico_plus.png')
	{
		document.getElementById(element).src='<?php echo base_url()?>images/ico_minus.png';
	}
	else
	{
		document.getElementById(element).src='<?php echo base_url()?>images/ico_plus.png';
	}
}

function txtChange(element) 
{
	if(document.getElementById(element).title=='Collapse')
	{
		document.getElementById(element).title='Expand';
	}
	else
	{
		document.getElementById(element).title='Collapse';
	}
}
</script>
<?php 

$page_nos = $this->uri->segment(3);

			$cls='"border:1px solid #ff0000;margin:0px auto; width:350px; padding:10px; background:#FFECEC; margin-bottom:10px"';
			if($this->session->userdata('msg')!="")
			{
				$message=$this->session->userdata('msg');
				$cls='"border:1px solid #0000ff;margin:0px auto; width:350px; padding:10px; background:#D9DAFF; margin-bottom:10px"';
			}
			?>
<div class="rightColm">
            <div class="result_opt">
                <div class="left"><h2>View Pages</h2></div>
            </div>
            <div class="clear"></div>
             <?php if(isset($message)){?><div style=<?php echo $cls?>><strong><?php echo $message ;?></strong></div><?php }?>
            <div class="tablWrap viewPerm">
			 <table cellspacing="0" cellpadding="0" class="tHeader">
              <tr>
                <th class="col_slNo">Sl No.</th>
                <th class="col_pname1">Title</th>
				<th class="col_slNo">Sort Order</th>
                <th  class="col_cState no-bgImage">Action</th>
			</tr>
			</table>
			<table cellspacing="0" cellpadding="0">
<?php
				$limit = $this->uri->segment(3);
				if($limit=='')
					{
						$i=1;
					}
				else
					{
						$i=$limit+1;
					}
				if(count($cmsdata)>0)
				{
					//echo "<pre>";
					//print_r($cmsdata);

				foreach($cmsdata as $cms_detail)
				{
				 $childs = $this->cmsmodel->getPageChild($cms_detail->id);
				
				?>  
				 	
                    <tr>
				
						<td class="col_slNo"><?php echo $i;?></td>
						<td class="col_pname1"><?php if(sizeof($childs)>0){ ?><a href="javascript:void(null);" style="vertical-align:middle;text-decoration:none; " title="Expand" id="txt<?php echo $i;?>" onclick="show_more(<?=($i+1)?>);imageChange('img<?php echo $i;?>');txtChange('txt<?php echo $i;?>');"><img  src='images/<?php if($cat_id_no!=$cms_detail->id){ echo 'ico_plus'; } else{ echo 'ico_minus'; }?>.png' id="img<?php echo $i;?>"/>&nbsp;<?php echo ucwords($cms_detail->title);?></a> <?php }else{ ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords($cms_detail->title);?> <?php } ?> 
						<?php //echo $desc_data =  stripslashes(html_entity_decode($cms_detail->description));?>
						
						</td>
						<td class="col_slNo"><?php echo $cms_detail->sort_order;?></td>
						<td class="col_cState" >
				   		<a href="cms/edit_page/<?php echo $cms_detail->id; ?>/<?php if($page_nos!=''){echo $page_nos;}?>" title="Edit"><img src="images/user_edit.png"  /></a>
						<?php if($cms_detail->id!=1 && $cms_detail->id!=2 && $cms_detail->id!=3) { ?>
						<a href="javascript:void(null)" onclick="return checkPage('<?php echo $cms_detail->id;?>','<?php echo base_url();?>')" title="Delete">
						<img src="<?php echo base_url();?>images/trash.png" /></a> <?php } ?>
					  </td>
					</tr>
				
				
              <?php 
					//$totalChild = $this->chaptermodel->getTotalChild($chapterDetail->id);
				   
					if(sizeof($childs)>0) 
					{
						?>
                        <tr><td colspan="4" style="padding:0px; margin:0px;">
                                    <div class="detailed_view" id="detailed_view<?php echo ($i+1)?>" style="float:right; padding:0px; margin:0px; <?php if($cat_id_no==$cms_detail->id){ echo 'display:block;'; }else{ echo 'display:none;';} ?>">	
                                    <table cellpadding="0" cellspacing="0" class="tbl632">  
                        <?php
					foreach($childs as $child) { ?>
						 <tr>

							<td class="col_pname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--<?php echo $child->title;?></td>
							<td class="col_cState1">


<a href="cms/edit_page/<?php echo $child->id; ?>/<?php if($page_nos!=''){echo $page_nos;}?>" title="Edit"><img src="images/user_edit.png"  /></a> <a href="cms/delete_page/<?php echo $child->id; ?>/<?php if($page_nos!=''){echo $page_nos;}?>" onclick="return confirm('Are you sure to delete this page?')" title="Delete"><img src="<?php echo base_url('images/trash.png');?>" /></a>

					  </td>
						  
					   </tr>
					  
					  
					<?php 
					  }
					  ?>
                      </table>
                      
                      
                      
                      
                      </div>
                      
                      
                      
                      
                      
                           </td></tr>
                      <?php
					  }
					$i++;}}
				?>
			</table>
                <div class="left"><img src="images/tabl_btm.png" width="678" height="6" alt="" /></div>
            </div>
            

            
            
            <div class="paging">
            
                <ul class="pagination paginationA paginationA01">
                <?php  echo $paging ?>
                </ul>
               
            </div>
            
          
            
      </div>
    </div>
    <div class="left"><img src="images/content_btm.png" width="966" height="7" alt="" /></div>
    <div class="clear"></div>
    
  </div>
  <!-- END CONTENT -->
  
  <div class="clear"></div>
</div>
<?php include('admin_footer.php');?>
<script language="javascript">
function checkValid()
{
   if(confirm("Are you sure to do this?"))
   {
     return true;
   }
   else
   {
     return false;
   }
}
</script>