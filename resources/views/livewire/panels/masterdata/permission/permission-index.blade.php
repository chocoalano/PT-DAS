<div>
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">List of permissions data</h4>
                </div>
                <div class="card-body">
                    <livewire:panels.components.tables.permission-tables />
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <livewire:panels.masterdata.permission.permissions-form :id="request()->route('id')" />
        </div>
    </div>
</div>
