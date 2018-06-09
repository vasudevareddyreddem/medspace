<?php
$dec=$jan=$feb=$mar=$apr=$may=$jun=$jul=$aug=$sep=$oct=$nov=0;
if(isset($graph_total_hospital) && count($graph_total_hospital)>0){
foreach ($graph_total_hospital as $cri){
$dat = explode("-", $cri['create_at']);
	if($dat[1] == 12)
	{
	$dec++;
	}
	if($dat[1] == 11)
	{
		$nov++;
	}
	if($dat[1] == 10)
	{
		$oct++;
	}
	if($dat[1] == '09')
	{
		$sep++;
	}if($dat[1] == '08')
	{
		$aug++;
	}if($dat[1] == '07')
	{
		$jul++;
	}if($dat[1] == '06')
	{
		$jun++;
	}if($dat[1] == '05')
	{
		$may++;
	}if($dat[1] == 04)
	{
		$apr++;
	}if($dat[1] == 03)
	{
		$mar++;
	}if($dat[1] == 02)
	{
		$feb++;
	}if($dat[1] == 01)
	{
		$jan++;
	}
}	
} 
$dec1=$jan1=$feb1=$mar1=$apr1=$may1=$jun1=$jul1=$aug1=$sep1=$oct1=$nov1=0;
if(isset($graph_total_plants) && count($graph_total_plants)>0){
foreach ($graph_total_plants as $cri){
$dat = explode("-", $cri['create_at']);
	if($dat[1] == 12)
	{
	$dec1++;
	}
	if($dat[1] == 11)
	{
		$nov1++;
	}
	if($dat[1] == 10)
	{
		$oct1++;
	}
	if($dat[1] == '09')
	{
		$sep1++;
	}if($dat[1] == '08')
	{
		$aug1++;
	}if($dat[1] == '07')
	{
		$jul1++;
	}if($dat[1] == '06')
	{
		$jun1++;
	}if($dat[1] == '05')
	{
		$may1++;
	}if($dat[1] == 04)
	{
		$apr1++;
	}if($dat[1] == 03)
	{
		$mar1++;
	}if($dat[1] == 02)
	{
		$feb1++;
	}if($dat[1] == 01)
	{
		$jan1++;
	}
}	
} 
$dec2=$jan2=$feb2=$mar2=$apr2=$may2=$jun2=$jul2=$aug2=$sep2=$oct2=$nov2=0;
if(isset($graph_total_truck) && count($graph_total_truck)>0){
foreach ($graph_total_truck as $cri){
$dat = explode("-", $cri['create_at']);
	if($dat[1] == 12)
	{
	$dec2++;
	}
	if($dat[1] == 11)
	{
		$nov2++;
	}
	if($dat[1] == 10)
	{
		$oct2++;
	}
	if($dat[1] == '09')
	{
		$sep2++;
	}if($dat[1] == '08')
	{
		$aug2++;
	}if($dat[1] == '07')
	{
		$jul2++;
	}if($dat[1] == '06')
	{
		$jun2++;
	}if($dat[1] == '05')
	{
		$may2++;
	}if($dat[1] == 04)
	{
		$apr2++;
	}if($dat[1] == 03)
	{
		$mar2++;
	}if($dat[1] == 02)
	{
		$feb2++;
	}if($dat[1] == 01)
	{
		$jan2++;
	}
}	
} 
$dec3=$jan3=$feb3=$mar3=$apr3=$may3=$jun3=$jul3=$aug3=$sep3=$oct3=$nov3=0;
if(isset($graph_total_waste) && count($graph_total_waste)>0){
	//echo '<pre>';print_r($graph_total_waste);exit;
foreach ($graph_total_waste as $cri){
$dat = explode("-", $cri['create_at']);
	if($dat[1] == 12)
	{
	$dec3 += $cri['total_waste'];
	}
	if($dat[1] == 11)
	{
		$nov3 += $cri['total_waste'];
	}
	if($dat[1] == 10)
	{
		$oct3 += $cri['total_waste'];
	}
	if($dat[1] == '09')
	{
		$sep3 += $cri['total_waste'];
	}if($dat[1] == '08')
	{
		$aug3 += $cri['total_waste'];
	}if($dat[1] == '07')
	{
		$jul3 += $cri['total_waste'];
	}if($dat[1] == '06')
	{
		$jun3 += $cri['total_waste'];
	}if($dat[1] == '05')
	{
		$may3 += $cri['total_waste'];
	}if($dat[1] == 04)
	{
		$apr3 += $cri['total_waste'];
	}if($dat[1] == 03)
	{
		$mar3 += $cri['total_waste'];
	}if($dat[1] == 02)
	{
		$feb3 += $cri['total_waste'];
	}if($dat[1] == 01)
	{
		$jan3 += $cri['total_waste'];
	}
}	
} 
    $hospital_list = array(
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
	  $total_plants_list = array(
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
	$total_truck_list= array(
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
	$total_waste_list = array(
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
    		text: "Month wise List"
    	},
    	axisY: {
    		title: " count range"
    	},
		legend:{
		cursor:"pointer",
		dockInsidePlotArea: true,
		itemclick: toogleDataSeries
		},
    	data: [{
    		type: "spline",
			showInLegend: true,
			name: "Health Care Facility List",
			lineDashType: "solid", 
			color: "#E91E63",
    		dataPoints: <?php echo json_encode($hospital_list, JSON_NUMERIC_CHECK); ?>
    	},
		{
    		type: "spline",
			showInLegend: true,
			name: "Total CBWTF (Kgs)",
			lineDashType: "solid",
			color: "#00BCD4",			
    		dataPoints: <?php echo json_encode($total_waste_list, JSON_NUMERIC_CHECK); ?>
    	},{
    		type: "spline",
			showInLegend: true,
			name: "BMW vehicle List",
			lineDashType: "solid",
			color: "#8BC34A",			
    		dataPoints: <?php echo json_encode($total_truck_list, JSON_NUMERIC_CHECK); ?>
    	},
		{
    		type: "spline",
			showInLegend: true,
			name: "Total CBWTF",
			lineDashType: "solid",
			color: "#FF9800",			
    		dataPoints: <?php echo json_encode($total_plants_list, JSON_NUMERIC_CHECK); ?>
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
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hospital</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Health Care Facility</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo isset($total_hospital['total_hos'])?$total_hospital['total_hos']:''; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">Total CBWTF (Kgs)</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo isset($total_waste)?$total_waste:''; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_shipping</i>
                        </div>
                        <div class="content">
                            <div class="text">Total BMW vehicle </div>
                            <div class="number count-to" data-from="0" data-to="<?php echo isset($total_trucks['total_trucks'])?$total_trucks['total_trucks']:''; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">payment</i>
                        </div>
                        <div class="content">
                            <div class="text">Total CBWTF</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo isset($total_plants['total_plants'])?$total_plants['total_plants']:''; ?>" data-speed="1000" data-fresh-interval="20"></div>
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
    </section>
    	  <script src="<?php echo base_url(); ?>assets/vendor/plugins/canvasjs.min.js" ></script>
