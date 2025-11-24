<div class="col-md-4">
    <div class="card shadow-sm border-0 p-4 h-100">
        <h6 class="fw-semibold mb-3">Verified vs Unverified Listers</h6>
        <div class="position-relative">
            <canvas id="verificationChart" 
                    data-verified="{{ $verified }}" 
                    data-unverified="{{ $unverified }}" 
                    height="230"></canvas>
            <div id="verificationCenterText"
                 class="position-absolute top-50 start-50 translate-middle text-center"
                 style="font-weight: 600; font-size: 1.2rem; color:#374151;">
                {{ $verified + $unverified }}
                <div style="font-size: 0.8rem; color:#6b7280;">Total Listers</div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('script/admin/chart/verification-chart.js')}}"></script>