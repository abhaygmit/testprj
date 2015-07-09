<?php include('admin_header.php'); ?>
<?php include('admin_left.php'); ?>
<script type="text/javascript">
    function checkstatus(id)
    {
        var answer = confirm("Are you sure you want to activate/deactivate?")
        if (answer)
        {
            window.location = "<?php echo base_url(); ?>users/Deleteuser/?id=" + id;
        }
        else
        {
            return false;

        }

    }
</script>
<?php
$cls = '"border:1px solid #ff0000;margin:0px auto; width:350px; padding:10px; background:#FFECEC; margin-bottom:10px"';
if ($this->session->userdata('msg') != "") {
    $message = $this->session->userdata('msg');
    $cls = '"border:1px solid;margin:0px auto; width:350px; padding:10px; color: #4F8A10;background-color: #DFF2BF; margin-bottom:10px"';
}
?>
<div class="rightColm">
    <div class="result_opt">
        <div class="left"><h2>Manage Users</h2></div>
    </div>
    <div class="clear"></div>
    <?php if (isset($message)) { ?><div  style=<?php echo $cls ?>><strong><?php echo $message; ?></strong></div><?php } ?>
    <div class="p10">
        <form name="search_user" id="search_user" action="" method="GET">

            <center><table width="70%"><tr><td style="width:70px">
                            Search:</td><td style="width:200px"> <div class="adminInptTxt"><input type="text" name="keyword" id="keyword" maxlength="150"  value="<?php echo @$_GET['keyword']; ?>"/> </div></td><td><input type="image" src="images/btn_search.png" name="search">
                        </td><td style="width:200px; margin-left:20px;"><a href="<?php echo base_url(); ?>users/Viewusers"><img src="images/show_all.png"  /></a></td>
                    </tr></table>
            </center>
        </form>
    </div>

    <div class="tablWrap viewPerm">
        <table cellspacing="0" cellpadding="0" class="tHeader" width="100%">
            <tr>

                <th class="col13" width="22%">Name</th>
                <th class="col13">Email</th>
                <th class="col13">Practice ID</th>
                <th class="col13" >Account Type</th>
                <th class="col13">Inventory</th>
                <th class="action no-bgImage">Action</th>
            </tr>

            <?php
            $limit = $this->uri->segment(3);
            if ($limit == '') {
                $i = 1;
            } else {
                $i = $limit + 1;
            }
            if (count($userslist) > 0) {
                foreach ($userslist as $userlist) {
                    ?>
                    <tr class="<?php echo ($i%2==0)?'zebracss':'' ?>">
                        <td class="col13"><?php echo $userlist->full_name; ?></td>
                        <td class="col13"><?php echo $userlist->email; ?></td>
                        <td class="col13"><?php echo $userlist->practice_id; ?></td>
                        <td class="col131">Trail</td>
                        <td class="col13"><center><a href="#" title="View Inventory"  alt="View Inventory">View</a></center></td>
                    <td class="action">
                        <img src="images/<?php if ($userlist->active_status == 0) echo 'red'; if ($userlist->active_status == 1) echo 'green'; ?>.png" title="<?php if ($userlist->status == 0) echo 'Inactive'; if ($userlist->status == 1) echo 'Active'; if ($userlist->status == 2) echo 'Pause'; ?>" /> &nbsp;
                        <a href="users/EdituserProfile/<?php echo toPublicId($userlist->id); ?>" title="Edit"><img src="images/user_edit.png"  /></a> &nbsp;
                    </td>
                    </tr>

        <?php $i++;
    }
}else { ?>

                <div class="tablRowAlt"><div class="noRecord"><?php echo "No record found "; ?></div></div>

            <?php } ?>
        </table>
        <div class="left"><img src="images/purpl_tabl_btm.png" width="678" height="6" alt="" /></div>
    </div>

    <div class="paging">

        <ul class="pagination paginationA paginationA01">
<?php echo $paging ?>
        </ul>


    </div>
</div>

<div class="clear"></div>

</div></div>
<!-- END CONTENT -->

<div class="clear"></div>
</div>
<?php include('admin_footer.php'); ?>
<script language="javascript">
    function checkValid()
    {
        if (confirm("Are you sure to do this?"))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
</script>


