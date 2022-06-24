@extends('app')

@section('content')

 @include('common.leftmenu')
 <style>

.highcharts-container > svg > text {display: none;}


 </style>
 <script src="https://code.highcharts.com/highcharts.js"></script>




 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>Revenue Collection</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px"></sup></h3>

                <p>Outstanding Receivale</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>Outstanding payable</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$productcount[0]->totalproduct}}</h3>

                <p>Reordered Item</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route('products')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
           
          <div id="container"></div>
          
          <div class="chart has-fixed-height" id="pie_basic"></div>
           
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
        
         
   
          <canvas id="barChart" width="400" height="400"></canvas>


          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    var saleschart =  <?php echo json_encode($saleschart) ?>;
    var salesmonth =  <?php echo json_encode($salesmonth) ?>;
   // console.log(salesmonth);
    Highcharts.chart('container', {
        title: {
            text: 'Sales Growth, 2021'
        },
        subtitle: {
            text: 'ERP'
        },
         xAxis: {
            categories: salesmonth
        },
        yAxis: {
            title: {
                text: 'Total Sales'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Total Sales',
            data: saleschart
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});
</script>

<script>
        var pieData = [
            {
            
                value: 20,
                color:'#878BB6',
                label :'zx'
            },
            {
            
                value : 40,
                color : '#4ACAB4',
                label :'zxc'
            },
            {
              
                value : 10,
                color : '#FF8153',
                label :'cxc'
            },
            {
              
                value : 30,
                color :'#FFEA88',
                label :'zx'
            },

    
     
        ];


        
        // Get the context of the canvas element we want to select
       

        var options = {
  responsive: true,
  title: {
    display: true,
    position: "top",
    text: "Pie Chart",
    fontSize: 18,
    fontColor: "#111"
  },
  legend: {
    display: true,
    position: "bottom",
    labels: {
      fontColor: "#333",
      fontSize: 16
    }
  }
};

datas: [{
		type: "pie",
		innerRadius: "50%",
		showInLegend: false,
		legendText: "{label}",
		indexLabel: "{label}: #percent",
		dataPoints: [
			{ label: "Total Sale", y: 6492917 },
			{ label: "Total Purchase", y: 7380554 },
			{ label: "Total Sale Return", y: 1610846 },
			{ label: "Total Purchase Return", y: 950875 }
			
		]
	}];

var salesdata= document.getElementById("salesdata").getContext("2d");
new Chart(salesdata).Pie(pieData);


    </script>


<script>

jQuery(document).ready(function() {
var chartDiv = $("#barChart");
var myChart = new Chart(chartDiv, {
    type: 'pie',
    data: {
        labels: ["Total Sale", "Total Purchase", "Sales Return", "Purchase Return"],
        datasets: [
        {
            data: [{{$totalsales}},{{$totalpurchases}}, {{$totalsalesr}}, {{$totalpurchaser}}],
            backgroundColor: [
            "#17a2b8",
            "#28a745",
            "#ffc107",
            "#dc3545"
            ]
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Sales Chart'
        },
		responsive: true,
maintainAspectRatio: false,
    }
});
    });

</script>


 @include('common.footer')
 @endsection