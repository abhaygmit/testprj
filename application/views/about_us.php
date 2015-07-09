
<?php //$this->load->view('head_banner');?>
<div class="clear"></div>

<section id="wrapper">
 <div class="logContainer">

  <div class="home2_whtbg_colL">
    <div class="home2_whtbg_colL_mid">
      <div class="getStart_pg">
 
			
	<div class="innerWarp">
	
	<?php 
	$about=$this->uri->rsegment(3);
	//echo 'about ='.$about.'=<pre>';print_r($this->uri);echo '</pre>';
	$res=$this->common_model->getAboutPage($about);
	//print_r($res);
	?>
	<div><?php echo $res[0]['page_content']; ?></div>
	
	
	
	<div class="clear"></div>
	</div>
	</div></div></div>
</section>


<div class="clear"></div>
