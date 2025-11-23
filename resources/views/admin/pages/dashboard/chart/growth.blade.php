<div class="card mt-4 shadow-sm border-0">
    <div class="card-body">
        <h6 class="card-title fw-semibold">Monthly User Growth</h6>
        <canvas id="userGrowthChart" height="100"></canvas>
    </div>
</div>
<script>
    window.userGrowthData = {
        months: {!! json_encode($months) !!},
        counts: {!! json_encode($userCounts) !!}
    };
</script>
<script src="{{ asset('script/admin/chart/growth-chart.js')}}"></script>