<div class="col-md-8">
    <div class="card shadow-sm border-0 p-4" style="height: 400px;">
        <h6 class="fw-semibold mb-3">Verification Trend Per Month</h6>
        <canvas id="verificationTrendChart"
                data-months='@json($months)'
                data-verified-trend='@json($verifiedTrend)'
                data-unverified-trend='@json($unverifiedTrend)'>
        </canvas>
    </div>
</div>
<script src="{{ asset('script/admin/chart/trends.js')}}"></script>
