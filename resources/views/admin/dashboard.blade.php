@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 welcome_part">
        <p><span>Welcome Mr.</span> {{ Auth::user()->name }}</p>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div>
                <canvas id="myPieChart"></canvas>
            </div>
        </div>
    </div>
</div>

    @php
        $all_cate = App\Models\IncomeCategory::where('status',1)->orderBy('id','ASC')->get();
        $all_expcate = App\Models\ExpenseCategory::where('status',1)->orderBy('id','ASC')->get();
    @endphp
<script>
    const ctx = document.getElementById('myChart');
    const ctx_pie = document.getElementById('myPieChart');


    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [
            @php
                foreach($all_cate as $cate){
                    echo "'".$cate->incate_name."' ,";
                }
            @endphp
        ],
        datasets: [{
          label: '# Income Source',
          data: [
            @php
                foreach($all_cate as $cate){
                    $cateID = $cate->id;
                    $totalincome = App\Models\Income::where('status',1)->where('incate_id', $cateID)->sum('ammount');
                    echo $totalincome.',';
                }
            @endphp
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    // expense
        new Chart(ctx_pie, {
        type: 'bar',
        data: {
            labels: [
                @php
                    foreach($all_expcate as $cate){
                        echo "'".$cate->expcate_name."' ,";
                    }
                @endphp
            ],
            datasets: [{
            label: '# Total Expense',
            data: [
                @php
                    foreach($all_expcate as $cate){
                        $cateID = $cate->id;
                        $totalincome = App\Models\Expense::where('status',1)->where('expcate_id', $cateID)->sum('ammount');
                        echo $totalincome.',';
                    }
                @endphp
            ],
            borderWidth: 1
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
});
  </script>


@endsection
