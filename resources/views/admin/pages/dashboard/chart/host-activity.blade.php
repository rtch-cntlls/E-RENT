<div class="col-md-12">
    <div class="card shadow-sm border-0 px-4 py-5" style="height: 400px;">
        <h6 class="fw-semibold mb-3">Host Activity (Joined Per Month)</h6>
        <canvas id="hostActivityChart"
                data-months='@json($months)'
                data-joined-trend='@json($joinedTrend)'></canvas>
    </div>
</div>
<script>
    window.hostChartData = {
        months: @json($months ?? []),
        joinedTrend: @json($joinedTrend ?? [])
    };
</script>
<script src="{{ asset('script/admin/chart/activity.js') }}"></script>
