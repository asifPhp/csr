<style>
.marBot20{
	margin-bottom:20px;
}
.checkbox{margin-left: 15px;}

.fa_plus{
	float: right;
	font-size: 12px !important;
}
.edit_click{
	margin-top: -40px;
    margin-right: 35px;
    z-index: 999;
    position: relative;
}

	
</style>

<?php

if($sql_query){
	$proposal_list = $this->db->query($sql_query)->result_array();
	$data['prop_data'] = $this->db->query($sql_query)->result_array();
	//var_dump($proposal_list);
	
}
?>

<div class="content-wrapper animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-content" style="padding-top: 0px;">
				<section class="content-header" style="padding-bottom: 15px;">
					<a href="<?php echo base_url();?>organisation/proposals/index" class="btn btn-default pull-right">List All</a>
					<h1 class="ngo_heading"><?php echo $proposal_list[0]['new_prop_id'].' - '.$proposal_list[0]['proposal_title_org'].' '.'&nbsp;'.
							'<span class="is_edit_hide font_size11 label" style=" font-size: 10.5px;text-transform: capitalize;background-color: '.constant('STATUS_'.ucfirst($proposal_list[0]['proposal_status'])).' !important;">' . $proposal_list[0]['proposal_status']. '</span>' ;?><h1>
					
				</section>
	<div class="row">
		<div class="col-lg-6">
		<?php 
		
			$this->load->view('ngo/pages/proposals/edit_proposals');
		
		?>
		</div>
		<div class="col-lg-6">
			<?php if($current_task_data){?>
				<div class="callout callout-info">
					<?php //var_dump($current_task_data)?>
					<h4><?php echo $current_task_data[0]['org_task_label'];?></h4><hr>
					<h4>Assigned To: <?php echo $current_task_data[0]['first_name'].' '.$current_task_data[0]['last_name'];?></h4> 
					<h4>Due Date: <?php echo date_formats($current_task_data[0]['due_date']);?></h4> 
					<h4>Status: <span class="is_edit_hide label " style="background-color: <?php echo constant('STATUS_'.$current_task_data[0]['status']);?> !important;"><?php echo $current_task_data[0]['status']; ?></span></h4><hr>
					<input type="hidden" name="task_id" id="task_id" value="<?php echo $current_task_data[0]['org_task_id'];?>">
					<button type="button"  class="btn btn-default  goto_task"><b>Go to Task</b></button>
				</div>
			<?php }?>
			
			<?php 
				if($data['prop_data']!=''){
				    $this->load->view('organisation/pages/view_proposal_detail_page/view_proposal_right_1',$data);
				}
			?>
			
			
			
			<?php
			//var_dump($prop_task_data);
				if(isset($prop_task_data)){
					foreach($prop_task_data as $task_row){
						//var_dump($task_row);
						$task_label=$task_row['org_task_label'];
						if($task_label=='Board Review & Final Approval'){
							$data['board_review_data']=$task_row['additional_json'];
							if($data['board_review_data']){
								$this->load->view('organisation/pages/task/1/view_board_review',$data);
							}
						}if($task_label=='SC Review'){
							$data['sc_review']=$task_row['additional_json'];
							if($data['sc_review']!=''){
								$this->load->view('organisation/pages/task/1/view_sc_review',$data);
							}
						}if($task_label=='Leadership Engagement'){
							$data['leadership_data']=$task_row['additional_json'];
							if($data['leadership_data']!=''){
								$this->load->view('organisation/pages/task/1/view_leadership',$data);
							}
						}if($task_label=='Field Visit Approval'){
							$data['file_visit_approval_data']=$task_row['additional_json'];
							//var_dump($data['file_visit_approval_data']);
							if($data['file_visit_approval_data']!=''){
								$this->load->view('organisation/pages/task/1/view_file_visit_approval',$data);
							}
						}if($task_label=='Field Visit Report'){
							$data['file_visit_data']=$task_row['additional_json'];
							if($data['file_visit_data']!=''){
								$this->load->view('organisation/pages/task/1/view_file_visit',$data);
							}
						}if($task_label=='Begin Proposal Processing'){
							$data['begin_proposal_data']=$task_row['additional_json'];
							if($data['begin_proposal_data']!=''){
								$this->load->view('organisation/pages/task/1/view_beging_proposal',$data);
							}
						}if($task_label=='Proposal Desk Review'){
							$data['proposal_desk_review_data']=$task_row['additional_json'];
							if($data['proposal_desk_review_data']!=''){
								$this->load->view('organisation/pages/task/1/view_proposal_desk_review',$data);
							}
						}
						
					}
					//$this->load->view('ngo/pages/proposals/'); 
				}
				/*if($ngo_desk_review_task_data){
					//var_dump($ngo_desk_review_task_data);
						$data['ngo_desk_review_data']=$ngo_desk_review_task_data[0]['additional_json'];
							if($data['ngo_desk_review_data']!=''){
								$this->load->view('organisation/pages/task/1/view_desk_review',$data);
							}
						
				}*/
			?>
			
		</div>
		
		
		
	</div>
</div>
</div>
</div>
</div>
</div>
		
	

			
		
	
	


<script>
$('document').ready(function(){
	$('.proposal_content').removeClass('content');
	$('.proposals').removeClass('content-wrapper');
	$('.entity_content_wrapper').removeClass('content-wrapper');
	$('.entity_content').removeClass('content');
	$('.proposal_content').removeClass('content');
//$('.proposals').removeClass('content-wrapper');
	//------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit category
     */
    $('body').on('click', '.goto_task', function (e) {
		var task_id = $('#task_id').val();
		console.log(task_id);
		var url = APP_URL+"organisation/tasks/detail?id="+task_id+'&sourse=tasks';
		console.log(url);
		window.location.href=url;
	});
});
</script>

