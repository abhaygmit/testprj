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
	function resetForm(){
   document.getElementById("cat_name").value='';
   document.getElementById("status").value='';
     window.location.href='<?php echo base_url()?>index.php/category/view_category';
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
            <div class="left"><h2>Manage Category</h2></div>
        </div>
         <div class="clear"></div>
        <form action="<?php echo site_url('category/view_category')?>" id="generate" name="generate" method="post">
            <table cellspacing="3" width="90%" style="border:1px solid #666666;">
            <tr>
           		 <td height="30" colspan="3" style="font-size:14px;"><strong>Search Category Name By</strong></td>
            </tr>
            <tr>
            	
            <td><strong>Category Name:</strong></td>
            <td><input type="text" name="cat_name" id="cat_name" value="<?php echo ($_POST["cat_name"]!=''? trim(htmlentities($_POST["cat_name"])):"");?>" style="border:thin inset" /></td>
            </tr>
            <tr>
            
            <td><strong>Category Status:</strong></td>
            
            <td><div class="input select"><select name="status" style="width:140px;" id="status">
                <option value="">Select Status</option>
               <option value="1" <?php echo $_POST["status"]==1 ? 'selected="selected"': "" ;?>>Active</option>
                <option value="2"<?php echo $_POST["status"]==2 ? 'selected="selected"': "" ;?>>InActive</option></select></div></td>
            </tr>
            <tr>
            <td height="30" colspan="4" align="right"><input type="submit" name="go" value="Generate Report" /> &nbsp; <input type="button" name="reset" value="Reset Filters" onclick="resetForm()" /></td>
            </tr>
            </table>
        </form> 
      <div class="clear"></div> 
    <?php if(isset($message)){?><div style=<?=$cls?> ><strong><?php echo $message ;?></strong></div><?php } ?>
            <div class="tablWrap viewPerm">
			 	<table cellspacing="0" cellpadding="0" class="tHeader">
              		<tr>
                		<th class="col_slNo">ID</th>
                		<th class="col_pname1">Category Name</th>
                		<th class="col_pname1">Category Status</th>
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
			if(count($categoryDetails)>0)
			{
				foreach($categoryDetails as $categoryDetail)
				{
				 	$childs = $this->categorymodel->getCategoryChild($categoryDetail->id);
				?>  
                    <tr>
						<td class="col_slNo"><?php echo $i;?></td>
						<td class="col_pname1"><?php if(sizeof($childs)>0){ ?><a href="javascript:void(null);" style="vertical-align:middle;text-decoration:none; " onclick="show_more(<?=($i+1)?>);imageChange('img<?php echo $i;?>');"><img src='images/admin/<?php if($i==1) echo 'ico_minus'; else echo 'ico_plus';?>.png' id="img<?php echo $i;?>"/>&nbsp;<?php echo ucwords($categoryDetail->category_name);?></a> <?php }else{ ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords($categoryDetail->category_name);?> <?php } ?> 
						</td>
						<td class="col_pname1">
							<?php echo ($categoryDetail->status=='0' ? 'In-active': 'Active');?>
						</td>
						<td class="col_cState" >
				   			<a href="<?php echo site_url('category/edit/'.$categoryDetail->id);?>" title="Edit">
                            	<img src="images/admin/edit.png"  />
                            </a>&nbsp;
                            <?php if(count($childs)==0){?>
                            	<a href="<?php echo site_url('category/deletecategory/'.$categoryDetail->id);?>" onclick="return confirm('Do you want to delete this category?')" title="Delete" alt="Delete">
                           <?php }else{?>
                           		<a href="javascript:void(0);" onclick="alert('Firt delete all the child categories.')" title="Delete" alt="Delete"> 
                           	<?php }?>	
                            	<img src="<?php echo base_url();?>images/admin/trash.png" />
                            </a>
					  	</td>
					</tr>
              <?php 
					if(sizeof($childs)>0) 
					{
						?>
                        <tr>
                        	<td colspan="4" style="padding:0px; margin:0px;">
                            	<div class="detailed_view" id="detailed_view<?=($i+1)?>" style="float:right; padding:0px; margin:0px; display:<?php if($i==1) echo 'block'; else echo 'none';?>;">	
                                	<table cellpadding="0" cellspacing="0" class="tbl632">  
                        <?php
							foreach($childs as $child) { ?>
						 	<tr>
								<td class="col_pname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;<?php echo $child->category_name;?></td>
                                <td class="col_cState1">
									<a href="<?php echo  site_url('category/edit/'.$child->id);?>" title="Edit">
                                    	<img src="images/admin/edit.png"  /></a>&nbsp;
                                    <a href="<?php echo site_url('category/deletecategory/'.$child->id);?>" onclick="return confirm('Do you want to delete this category?')" title="Delete" alt="Delete">
                            			<img src="<?php echo base_url();?>images/admin/trash.png" />
                           			 </a>
					  			</td>
					   		</tr>
					<?php 
					  }
					?>
                    </table>
                  </div>
               </td>
            </tr>
            <?php
				}
				$i++; }} if(count($categoryDetails) <='1'){
				?>
                <tr><td colspan="5">
			<div class="tablRowAlt"><div class="noRecord"><?php  echo "<b>No record found.</b>";?></div></div>
            </td></tr>
			<?php } ?>
			
	
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