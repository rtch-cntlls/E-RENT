<div class="col-md-6">
    <div class="card shadow-sm border-0 mt-4">
        <div class="card-body">
            <h6 class="fw-bold mb-4">Top Property Types Uploaded</h6>
            <div class="position-relative" style="height: 300px;">
                <canvas id="propertyTypesChart"
                        data-labels='@json($propertyTypes)'
                        data-values='@json($propertyTypeCounts)'></canvas>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('script/admin/chart/propertyType.js')}}"></script>
