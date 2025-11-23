<div class="col-md-6">
    <div class="card shadow-sm border-0 mt-4">
        <div class="card-body">
            <h6 class="fw-bold">Verified vs Unverified Listers</h6>
            <div class="position-relative" style="height: 316px;">
                <canvas id="listerVerificationChart"></canvas>
                <div class="position-absolute top-50 start-50 translate-middle text-center">
                    <h5 class="mb-0 fw-bold" id="totalListers">{{ $verifiedListers + $unverifiedListers }}</h5>
                    <small class="text-muted">Total Listers</small>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('script/admin/chart/verification.js')}}"></script>