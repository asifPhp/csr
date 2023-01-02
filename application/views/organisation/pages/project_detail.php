<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
[data-toggle="collapse"] .fa:before {  
  content: "\f139";
}

[data-toggle="collapse"].collapsed .fa:before {
  content: "\f13a";
}
	.fa_plus{float: right;
	font-size: 12px !important;}
.edit_click {
    margin-top: -40px;
    margin-right: 35px;
    z-index: 999999;
    position: relative;
}
</style>

<?php
if($sql_query){
	$project_list = $this->db->query($sql_query)->result_array();
	//var_dump($project_list);
	//var_dump($focal_point);
	
}
if($sql_query1){
	$cycle_list = $this->db->query($sql_query1)->result_array();
	
	$content = '';
	$content1 = '';
	$content2 = '';
	//var_dump($cycle_list);
	if($cycle_list){
		$i = 1;
		foreach ($cycle_list as $value) {
			$content .= '<tr class="darker-on-hover"><td class="text-center">' . $i . '</td>';
			
			$content .= '<td class="text-center">' . $value['cycle_name']. '</td>';
			$content .= '<td class="text-center">' . $value['cycle_status']. '</td>';
			$content .= '<td class="text-center">' . date_formats($value['cycle_start_date1']). '</td>';
			$content .= '<td class="text-center">' . date_formats($value['cycle_end_date2']). '</td>';
			$content .= '<td class="text-center">' . $value['is_payment']. '</td>';
			$content .= '<td class="text-center">' . '<i class="fa fa-inr" aria-hidden="true"></i>'.' '.$value['cycle_donor_amount']. '</td>';
			$content .= '<td class="text-center"><a href="'.base_url().'organisation/project/project_cycle_detail?id='.$value['project_cycle_id'].'" class="label label-info">View Cycle</a></td>';
			$content .= '</tr>';
			$i++;
		}
		$table_type1 = 'dataTables';
	}else{
		$table_type1 = '';
		$content .= '<tr style="color: red;" class="darker-on-hover " >
		<td class="text-center" colspan="6">No data Available</td></tr>';
		
	}
	
	
	if($donor_data){
		
		//var_dump($donor_data);
		foreach ($donor_data as $value1) {
			$content1 .= '<td class="text-center">' . $value1['vendor_code']. '</td>';
			$content1 .= '<td class="text-center">' . '<i class="fa fa-inr" aria-hidden="true"></i>'.' '. $value1['donor_amount']. '</td>';
			$content1 .= '<td class="text-center">' . '<i class="fa fa-inr" aria-hidden="true"></i>'.' '.$value1['cycle_donor_amount']. '</td>';
			$content1 .= '<td class="text-center">' . '<i class="fa fa-inr" aria-hidden="true"></i>'.' '.$value1['cycle_donor_amount_dis']. '</td>';
			$content1 .= '<td class="text-center">' . '<i class="fa fa-inr" aria-hidden="true"></i>'.' '.$value1['pending']. '</td>';
			$content1 .= '<td class="text-center">
							<a href="javascript:void(0);" id="donor_popup" data-toggle="modal" data-target="#browseChangeAssignee" allocated_amt="'.$value1['cycle_donor_amount'].'"  vendor_code="'.$value1['vendor_code'].'"  project_donor_id="'.$value1['project_donor_id'].'" project_id="'.$value1['project_id'].'" ><span class="label label-info">Edit</span></a>';
							//<a href="'.base_url().'organisation/donor/edit_donor?id='.$value1['donor_id'].'" class="label label-info">Edit</a>';
						if(!$value1['vendor_code']){	
			$content1 .= '&nbsp;<a id="'.$value1['donor_id'].'" ngo_id="'.$value1['ngo_id'].'" class="label label-success send_notification_by_vendor_code">Request Vendor Code</a>';
						}
			$content1 .= '</td>';
				//'<td class="text-center"> </td>';
			$content1 .= '</tr>';
			
		}
		$table_type = 'dataTables';
	}else{
		$content1 .= '<tr style="color: red;" class="darker-on-hover " >
		<td class="text-center" colspan="6">No data Available</td></tr>';
		$table_type = '';
	}
	if($prop_data){
		$category_array_data = json_decode($prop_data[0]['category_array']);
		if($category_array_data){
			$i = 1;
			foreach ($category_array_data as $value2) {
				$content2 .= '<tr class="darker-on-hover">';
				if(isset($value2->subcategory_name)){
					$content2 .= '<td class="text-center">' . $value2->subcategory_name. '</td>';
				}
				$content2 .= '<td class="text-center">' . $value2->value. '</td>';
				
				$content2 .= '</tr>';
				$i++;
			}
			$table_type = 'dataTables';
		}
		else{
		$content2 .= '<tr style="color: red;" class="darker-on-hover " >
		<td class="text-center" colspan="6">No data Available</td></tr>';
		$table_type = '';
		}
	}
}

?>
<div class="content-wrapper animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-content" style="padding-top: 0px;">
				<section class="content-header" style="padding-bottom: 15px;">
					<a href="<?php echo base_url();?>organisation/project/listing" class="btn btn-default pull-right">Back to Project List</a>
					<h1><?php if($project_list){ echo $project_list[0]['new_project_id'].' - '.$project_list[0]['title'] .
						' <span class="label" style=" font-size: 10.5px;text-transform: capitalize;background-color: '.constant('STATUS_'.ucfirst($project_list[0]['project_status'])).' !important;">' . $project_list[0]['project_status']. '</span>' ; }?>
					</h1>
					
					<input type="hidden" class="form-control" id="project_id" name="project_id" value="<?php echo $project_id; ?>">
				</section>
		
					<div class="row">
						<div class="col-lg-6">
							<?php 
								if($sql_query!=''){
									$this->load->view('organisation/pages/viw_project_detail_page/view_project_detail'); 
								}
								
								if($prop_data){
									$this->load->view('organisation/pages/viw_project_detail_page/view_project_proposal_detail');
								}
								if($project_ngo_data){
									$this->load->view('organisation/pages/viw_project_detail_page/view_project_ngo_detail'); 
								}
								
							?>
						</div>
						
						<div class="col-lg-6">
							<?php if($current_task_data){?>
								<div class="callout callout-info">
									<?php //var_dump($current_task_data)?>
									<h4><?php echo $current_task_data[0]['org_task_label'];?></h4><hr>
									<h4>Assigned To: <?php echo $current_task_data[0]['first_name'].' '.$current_task_data[0]['last_name'];?></h4> 
									<h4>Due Date: <?php if($current_task_data[0]['due_date']){ echo date_formats($current_task_data[0]['due_date']);}else{}?></h4> 
									<h4>Status: <span class="is_edit_hide label " style="background-color: <?php echo constant('STATUS_'.$current_task_data[0]['status']);?> !important;"><?php echo $current_task_data[0]['status']; ?></span></h4><hr>
									<input type="hidden" name="task_id" id="task_id" value="<?php echo $current_task_data[0]['org_task_id'];?>">
									<button type="button"  class="btn btn-default  goto_task"><b>Go to Task</b></button>
								</div>
							<?php }?>
						
						
						
						
						
							<?php 
								
								
								/*if($sql_query){
									$this->load->view('organisation/pages/viw_project_detail_page/view_project_detail'); 
								}*/
								if($donor_data){
									$this->load->view('organisation/pages/viw_project_detail_page/view_project_donor_detail'); 
								}
								
								if($sql_query1!=''){
									$this->load->view('organisation/pages/viw_project_detail_page/view_project_cycle_payment_detail'); 
								}
								
								
								$this->load->view('organisation/pages/viw_project_detail_page/view_project_additional_detail'); 
								
							?>
						</div>	
					</div>	
				</div>	
			</div>	
		</div>	
	</div>	
</div>	
	
	

