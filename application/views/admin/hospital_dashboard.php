<?php
$dec=$jan=$feb=$mar=$apr=$may=$jun=$jul=$aug=$sep=$oct=$nov=0;
$dec_qty=$jan_qty=$feb_qty=$mar_qty=$apr_qty=$may_qty=$jun_qty=$jul_qty=$aug_qty=$sep_qty=$oct_qty=$nov_qty=0;
if(isset($graph_gen_waste_in_Kg) && count($graph_gen_waste_in_Kg)>0){
	//echo '<pre>';print_r($graph_gen_waste_in_Kg);exit;
foreach ($graph_gen_waste_in_Kg as $cri){
$dat = explode("-", $cri['create_at']);
	if($dat[1] == 12)
	{
	 $dec += $cri['genaral_waste_kgs'];
	}
	if($dat[1] == 11)
	{
		 $nov += $cri['genaral_waste_kgs'];
	}
	if($dat[1] == 10)
	{
		 $oct += $cri['genaral_waste_kgs'];
	}
	if($dat[1] == '09')
	{
		 $sep += $cri['genaral_waste_kgs'];
	}if($dat[1] == '08')
	{
		 $aug += $cri['genaral_waste_kgs'];
	}if($dat[1] == '07')
	{
		 $jul += $cri['genaral_waste_kgs'];
	}if($dat[1] == '06')
	{
		 $jun += $cri['genaral_waste_kgs'];
	}if($dat[1] == '05')
	{
		 $may += $cri['genaral_waste_kgs'];
		
	}if($dat[1] == 04)
	{
		 $apr += $cri['genaral_waste_kgs'];
	}if($dat[1] == 03)
	{
		 $mar += $cri['genaral_waste_kgs'];
	}if($dat[1] == 02)
	{
		 $feb += $cri['genaral_waste_kgs'];
	}if($dat[1] == 01)
	{
		 $jan += $cri['genaral_waste_kgs'];
	}
}	
} 

$dec1=$jan1=$feb1=$mar1=$apr1=$may1=$jun1=$jul1=$aug1=$sep1=$oct1=$nov1=0;
$dec1_qty=$jan1_qty=$feb1_qty=$mar1_qty=$apr1_qty=$may1_qty=$jun1_qty=$jul1_qty=$aug1_qty=$sep1_qty=$oct1_qty=$nov1_qty=0;
if(isset($graph_inf_pla_waste_in_Kg) && count($graph_inf_pla_waste_in_Kg)>0){
	//echo '<pre>';print_r($graph_inf_pla_waste_in_Kg);exit;
foreach ($graph_inf_pla_waste_in_Kg as $cri){
$dat = explode("-", $cri['create_at']);
	if($dat[1] == 12)
	{
	$dec1 += $cri['infected_plastics_kgs'];
	}
	if($dat[1] == 11)
	{
		$nov1 += $cri['infected_plastics_kgs'];
	}
	if($dat[1] == 10)
	{
		$oct1 += $cri['infected_plastics_kgs'];
	}
	if($dat[1] == '09')
	{
		$sep1 += $cri['infected_plastics_kgs'];
	}if($dat[1] == '08')
	{
		$aug1 += $cri['infected_plastics_kgs'];
	}if($dat[1] == '07')
	{
		$jul1 += $cri['infected_plastics_kgs'];
	}if($dat[1] == '06')
	{
		$jun1 += $cri['infected_plastics_kgs'];
	}if($dat[1] == '05')
	{
		$may1 += $cri['infected_plastics_kgs'];
	}if($dat[1] == 04)
	{
		$apr1 += $cri['infected_plastics_kgs'];
	}if($dat[1] == 03)
	{
		$mar1 += $cri['infected_plastics_kgs'];
	}if($dat[1] == 02)
	{
		$feb1 += $cri['infected_plastics_kgs'];
	}if($dat[1] == 01)
	{
		$jan1 += $cri['infected_plastics_kgs'];
	}
}	
} 
$dec2=$jan2=$feb2=$mar2=$apr2=$may2=$jun2=$jul2=$aug2=$sep2=$oct2=$nov2=0;
$dec2_qty=$jan2_qty=$feb2_qty=$mar2_qty=$apr2_qty=$may2_qty=$jun2_qty=$jul2_qty=$aug2_qty=$sep2_qty=$oct2_qty=$nov2_qty=0;
if(isset($graph_inf_waste_in_Kg) && count($graph_inf_waste_in_Kg)>0){
foreach ($graph_inf_waste_in_Kg as $cri){
$dat = explode("-", $cri['create_at']);
	if($dat[1] == 12)
	{
	$dec2 += $cri['infected_waste_kgs'];
	}
	if($dat[1] == 11)
	{
		$nov2 += $cri['infected_waste_kgs'];
	}
	if($dat[1] == 10)
	{
		$oct2 += $cri['infected_waste_kgs'];
	}
	if($dat[1] == '09')
	{
		$sep2 += $cri['infected_waste_kgs'];
	}if($dat[1] == '08')
	{
		$aug2 += $cri['infected_waste_kgs'];
	}if($dat[1] == '07')
	{
		$jul2 += $cri['infected_waste_kgs'];
	}if($dat[1] == '06')
	{
		$jun2 += $cri['infected_waste_kgs'];
	}if($dat[1] == '05')
	{
		$may2 += $cri['infected_waste_kgs'];
	}if($dat[1] == 04)
	{
		$apr2 += $cri['infected_waste_kgs'];
	}if($dat[1] == 03)
	{
		$mar2 += $cri['infected_waste_kgs'];
	}if($dat[1] == 02)
	{
		$feb2 += $cri['infected_waste_kgs'];
	}if($dat[1] == 01)
	{
		$jan2 += $cri['infected_waste_kgs'];
	}
}	
}
$dec3=$jan3=$feb3=$mar3=$apr3=$may3=$jun3=$jul3=$aug3=$sep3=$oct3=$nov3=0;
$dec3_qty=$jan3_qty=$feb3_qty=$mar3_qty=$apr3_qty=$may3_qty=$jun3_qty=$jul3_qty=$aug3_qty=$sep3_qty=$oct3_qty=$nov3_qty=0;
if(isset($graph_glassware_waste_in_kg) && count($graph_glassware_waste_in_kg)>0){
foreach ($graph_glassware_waste_in_kg as $cri){
$dat = explode("-", $cri['create_at']);
	if($dat[1] == 12)
	{
	$dec3 += $cri['glassware_watse_kgs'];
	}
	if($dat[1] == 11)
	{
		$nov3 += $cri['glassware_watse_kgs'];
	}
	if($dat[1] == 10)
	{
		$oct3 += $cri['glassware_watse_kgs'];
	}
	if($dat[1] == '09')
	{
		$sep3 += $cri['glassware_watse_kgs'];
	}if($dat[1] == '08')
	{
		$aug3 += $cri['glassware_watse_kgs'];
	}if($dat[1] == '07')
	{
		$jul3 += $cri['glassware_watse_kgs'];
	}if($dat[1] == '06')
	{
		$jun3 += $cri['glassware_watse_kgs'];
	}if($dat[1] == '05')
	{
		$may3 += $cri['glassware_watse_kgs'];
	}if($dat[1] == 04)
	{
		$apr3 += $cri['glassware_watse_kgs'];
	}if($dat[1] == 03)
	{
		$mar3 += $cri['glassware_watse_kgs'];
	}if($dat[1] == 02)
	{
		$feb3 += $cri['glassware_watse_kgs'];
	}if($dat[1] == 01)
	{
		$jan3 += $cri['glassware_watse_kgs'];
	}
}	
} 
    $gen_waste_in_Kg = array(
    	array("y" => isset($jan)?$jan:'', "label" => "January"),
    	array("y" => isset($feb)?$feb:'', "label" => "February"),
    	array("y" => isset($mar)?$mar:'', "label" => "March"),
    	array("y" => isset($apr)?$apr:'', "label" => "April "),
    	array("y" => isset($may)?$may:'', "label" => "May"),
    	array("y" => isset($jun)?$jun:'', "label" => "June"),
    	array("y" => isset($jul)?$jul:'', "label" => "July"),
    	array("y" => isset($aug)?$aug:'', "label" => "August"),
    	array("y" => isset($sep)?$sep:'', "label" => "September"),
    	array("y" => isset($oct)?$oct:'', "label" => "October"),
    	array("y" => isset($nov)?$nov:'', "label" => "November"),
    	array("y" => isset($dec)?$dec:'', "label" => "December"),
    );  
	  $inf_pla_waste_in_Kg = array(
    	array("y" => isset($jan1)?$jan1:'', "label" => "January"),
    	array("y" => isset($feb1)?$feb1:'', "label" => "February"),
    	array("y" => isset($mar1)?$mar1:'', "label" => "March"),
    	array("y" => isset($apr1)?$apr1:'', "label" => "April "),
    	array("y" => isset($may1)?$may1:'', "label" => "May"),
    	array("y" => isset($jun1)?$jun1:'', "label" => "June"),
    	array("y" => isset($jul1)?$jul1:'', "label" => "July"),
    	array("y" => isset($aug1)?$aug1:'', "label" => "August"),
    	array("y" => isset($sep1)?$sep1:'', "label" => "September"),
    	array("y" => isset($oct1)?$oct1:'', "label" => "October"),
    	array("y" => isset($nov1)?$nov1:'', "label" => "November"),
    	array("y" => isset($dec1)?$dec1:'', "label" => "December"),
    );
	$inf_waste_in_Kg = array(
    	array("y" => isset($jan2)?$jan2:'', "label" => "January"),
    	array("y" => isset($feb2)?$feb2:'', "label" => "February"),
    	array("y" => isset($mar2)?$mar2:'', "label" => "March"),
    	array("y" => isset($apr2)?$apr2:'', "label" => "April "),
    	array("y" => isset($may2)?$may2:'', "label" => "May"),
    	array("y" => isset($jun2)?$jun2:'', "label" => "June"),
    	array("y" => isset($jul2)?$jul2:'', "label" => "July"),
    	array("y" => isset($aug2)?$aug2:'', "label" => "August"),
    	array("y" => isset($sep2)?$sep2:'', "label" => "September"),
    	array("y" => isset($oct2)?$oct2:'', "label" => "October"),
    	array("y" => isset($nov2)?$nov2:'', "label" => "November"),
    	array("y" => isset($dec2)?$dec2:'', "label" => "December"),
    );
	$glassware_waste_in_kg = array(
    	array("y" => isset($jan3)?$jan3:'', "label" => "January"),
    	array("y" => isset($feb3)?$feb3:'', "label" => "February"),
    	array("y" => isset($mar3)?$mar3:'', "label" => "March"),
    	array("y" => isset($apr3)?$apr3:'', "label" => "April "),
    	array("y" => isset($may3)?$may3:'', "label" => "May"),
    	array("y" => isset($jun3)?$jun3:'', "label" => "June"),
    	array("y" => isset($jul3)?$jul3:'', "label" => "July"),
    	array("y" => isset($aug3)?$aug3:'', "label" => "August"),
    	array("y" => isset($sep3)?$sep3:'', "label" => "September"),
    	array("y" => isset($oct3)?$oct3:'', "label" => "October"),
    	array("y" => isset($nov3)?$nov3:'', "label" => "November"),
    	array("y" => isset($dec3)?$dec3:'', "label" => "December"),
    ); 
     
    ?>
<script>
    window.onload = function () {
     
    var chart = new CanvasJS.Chart("chartContainer", {
    	title: {
    		text: "Month wise waste List"
    	},
    	axisY: {
    		title: "kgs count range"
    	},
		legend:{
		cursor:"pointer",
		dockInsidePlotArea: true,
		itemclick: toogleDataSeries
		},
    	data: [
		
		{
    		type: "spline",
			showInLegend: true,
			name: "Yellow",
			lineDashType: "solid",
			color: "#ffe821",			
    		dataPoints: <?php echo json_encode($inf_waste_in_Kg, JSON_NUMERIC_CHECK); ?>
    	},
		{
    		type: "spline",
			showInLegend: true,
			name: "Red",
			lineDashType: "solid",
			color: "#F44336",			
    		dataPoints: <?php echo json_encode($inf_pla_waste_in_Kg, JSON_NUMERIC_CHECK); ?>
    	},{
    		type: "spline",
			showInLegend: true,
			name: "Blue",
			lineDashType: "solid",
			color: "#2196F3",			
    		dataPoints: <?php echo json_encode($glassware_waste_in_kg, JSON_NUMERIC_CHECK); ?>
    	},
		{
    		type: "spline",
			showInLegend: true,
			name: "White",
			lineDashType: "solid", 
			color: "#ddd",
    		dataPoints: <?php echo json_encode($gen_waste_in_Kg, JSON_NUMERIC_CHECK); ?>
    	}
		]
    });
    chart.render();
     function toogleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
    }
    </script>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-yellow hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hospital</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Yellow </div>
                            <div class="number count-to" data-from="0" data-to="<?php echo isset($inf_waste_in_Kgs['inf_waste'])?$inf_waste_in_Kgs['inf_waste']:'0'; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hospital</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Red</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo isset($inf_pla_waste_in_Kgs['inf_pla_waste'])?$inf_pla_waste_in_Kgs['inf_pla_waste']:'0'; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
               
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hospital</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Blue</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo isset($glassware_waste_in_kgs['glassware_waste'])?$glassware_waste_in_kgs['glassware_waste']:'0'; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-default hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hospital</i>
                        </div>
                        <div class="content">
                            <div class="text">Total White</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo isset($gen_waste_in_Kgs['gen_waste'])?$gen_waste_in_Kgs['gen_waste']:'0'; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <div class="row clearfix">
               	 <div class="row clearfix">
                <div style="padding:5px;">
                    <div class="card">
                      
                        <div class="">
                            <div id="chartContainer" class="dashboard-flot-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
							
            </div>
          

            <div class="row clearfix">
                
            </div>
        </div>
    </section>
    	  <script src="<?php echo base_url(); ?>assets/vendor/plugins/canvasjs.min.js" ></script>
