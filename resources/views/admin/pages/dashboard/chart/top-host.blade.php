<div class="col-md-12">
    <div class="card shadow-sm border-0 p-4">
        <h6 class="fw-semibold mb-3">Top Hosts by Property Count</h6>
        <div class="card" style="height: 350px;">
            <canvas id="tophostsChart"
                data-names='@json($tophostNames)'
                data-counts='@json($tophostCounts)'>
            </canvas>
        </div>
    </div>
</div>
<script src="{{ asset('script/admin/chart/top-host.js')}}"></script>
