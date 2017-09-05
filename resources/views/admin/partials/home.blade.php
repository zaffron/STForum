@extends('admin.index')
@section('content')
<div class="row">
	<div class="well well-lg col-md-5 text-center">
		<h1>Total Users</h1>
		<hr class="the-divider">
		<h2>{{$user_count}}</h2>
	</div>
	<div class="well well-lg col-md-5 col-md-offset-1 text-center">
		<h1>Total Posts</h1>
		<hr class="the-divider">
		<h2>{{$posts_count}}</h2>
	</div>	
</div>
<div class="row">
	<div class="well well-lg admin-cards col-md-11 text-center">
		<canvas id="threadChart" width="400" height="100"></canvas>		
	</div>
	<div class="well well-lg admin-cards col-md-11 text-center">
		<canvas id="userChart" width="400" height="100"></canvas>		
	</div>
</div>


@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/.js/2.6.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>

<script>

var ctx1 = document.getElementById("threadChart");
var threadChart = new Chart(ctx1, {
    type: 'line',
    data: {
        labels: ['red','blue','Sulphur','Hydrogen','Bliss', 'Kero'],
        datasets: [{
            label: 'Added Posts',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
// For showing user traffic in line diagram
var ctx2 = document.getElementById("userChart");
var userChart = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: ['user1', 'user2', 'user3', 'user4','user5', 'user6'],
        datasets: [{
            label: 'Users',
            data: [5, 19, 3, 5, 12, 6],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
@endsection