<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
<script type="text/javascript">
    $(document).ready(function() {
		//by me
    });
	
	function show_more(num)
	{
		var d = "#detailed_view"+num;
		//var v = "#list_view"+num;
		//$(v).toggle(50)
		$(d).toggle(50)
	}

	function imageChange(element) 
	{
		if(document.getElementById(element).src=='<?php echo base_url()?>images/admin/ico_plus.png')
		{
			document.getElementById(element).src='<?php echo base_url()?>images/admin/ico_minus.png';
		}
		else
		{
			document.getElementById(element).src='<?php echo base_url()?>images/admin/ico_plus.png';
		}
	}
</script>
	<?php 
		$cls = '"border:1px solid #ff0000;margin:0px auto; width:350px; padding:10px; background:#FFECEC; margin-bottom:10px"';
		if($this->session->userdata('msg')!="")
		{
			$message=$this->session->userdata('msg');
			$cls = '"border:1px solid #0000ff;margin:0px auto; width:350px; padding:10px; background:#D9DAFF; margin-bottom:10px"';
		}
	?>
	<div class="rightColm">
        <div class="result_opt">
            <div class="left"><h2>View Pages</h2></div>
        </div>
        <div class="clear"></div>
    <?php if(isset($message)){?><div style=<?=$cls?> ><strong><?php echo $message ;?></strong></div><?php } ?>
            <div class="tablWrap viewPerm">
			 	<table cellspacing="0" cellpadding="0" class="tHeader">
              		<tr>
                		<th class="col_slNo">ID</th>
                		<th class="col_pname1">Page Name</th>
                		<th class="col_pname1">Page Title</th>
                		<th class="col_pname1">Page Status</th>
                		<th class="col_pname1">Created Date</th>
                		<th class="col_pname1">Modified Date</th>
                		<th  class="col_cState no-bgImage">Action</th>
					</tr>
	<?php
			$limit = $this->uri->segment(3);
			if($limit=='')
			{
				$i = 1;
			}
			else
			{
				$i = $limit+1;
			}
			
			if(count($pageDetails)>0)
			{
				foreach($pageDetails as $categoryDetail)
				{
					//echo'<pre>';print_r($categoryDetail);echo'</pre>';
				?>  
                    <tr>
						<td class="col_slNo"><?php echo $i;?></td>
						<td class="col_pname1"><?php if(sizeof($childs)>0){ ?><a href="javascript:void(null);" style="vertical-align:middle;text-decoration:none; " onclick="show_more(<?=($i+1)?>);imageChange('img<?php echo $i;?>');"><img src='images/admin/<?php if($i==1) echo 'ico_minus'; else echo 'ico_plus';?>.png' id="img<?php echo $i;?>"/>&nbsp;<?php echo ucwords($categoryDetail->page_name);?></a> <?php }else{ ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords($categoryDetail->page_name);?> <?php } ?> 
						</td>
						<td class="col_pname1">
							<?php echo ($categoryDetail->page_title);?>
						</td>
						<td class="col_pname1">
							<?php echo ($categoryDetail->status=='0' ? 'In-active': 'Active');?>
						</td>
						<td class="col_pname1">
							<?php echo date('jS F Y',strtotime($categoryDetail->create_date));?>
						</td>
						<td class="col_pname1">
							<?php echo date('jS F Y',strtotime($categoryDetail->modified_date));?>
						</td>
						<td class="col_cState" >
				   			<a href="<?php echo site_url('pages/edit/'.$categoryDetail->id);?>" title="Edit">
                            	<img src="images/admin/edit.png"  />
                            </a>&nbsp;
                <a href="<?php echo site_url('pages/pagestatus/'.$categoryDetail->id.'/'. ($categoryDetail->status==0? '1':'0'));?>" ><?php if($categoryDetail->status==0){echo '<img src="images/admin/red.png" border="0" title="In-active" alt="In-active">';}else{ echo '<img src="images/admin/green.png" border="0" title="Active" alt="Active">'; } ?>
                </a>
                           	<!--<a href="<?php echo site_url('pages/deletepage/'.$categoryDetail->id);?>" onclick="return confirm('Are you want to delete this page?')" title="Delete" alt="Delete">
                            	<img src="<?php echo base_url();?>images/admin/trash.png" />
                            </a>-->
					  	</td>
					</tr>
				<?php $i++;
				}
				?>	
                    </table>
                  </div>
               </td>
            </tr>
            <?php
				//}
				
			}
	?>
			</table>
            <div class="left"><img src="images/admin/tabl_btm.png" width="765" height="6" alt="" /></div>
        </div>
        <div class="paging">
           <ul class="pagination paginationA paginationA01"> <?php  echo $paging ?></ul>
        </div>
      </div>
    </div>
    <div class="left"><img src="images/admin/content_btm.png" width="996" height="7" alt="" /></div>
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