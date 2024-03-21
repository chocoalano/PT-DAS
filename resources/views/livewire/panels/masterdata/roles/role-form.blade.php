<form wire:submit.prevent="submit">
    <div class="card">
        <div class="card-header">
            Form Roles
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" wire:model="form.name" id="name"
                            class="form-control @error('form.name') is-invalid @enderror" placeholder="Role name">
                        @error('form.name')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label for="guard_name" class="form-label">Guard Name</label>
                        <input type="text" wire:model="form.guard_name" id="guard_name"
                            class="form-control @error('form.guard_name') is-invalid @enderror" placeholder="Guard Name"
                            value="web" readonly>
                        @error('form.guard_name')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <table class="table-sm table">
                    <thead>
                        <tr>
                            <th>Permissions</th>
                            <th>Access</th>
                            <th>Read & Write</th>
                            <th>List</th>
                            <th>Create</th>
                            <th>Update</th>
                            <th>Delete</th>
                            <th>Export</th>
                            <th>Import</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissionData as $k => $v)
                            <tr>
                                <td><strong>{{ ucfirst($v->name) }}</strong></td>
                                @foreach ($v->permission as $k => $val)
                                    <td>
                                        <input type="checkbox" id="switch-{{ $val->id }}"
                                            {{ in_array($val->id, $permission) ? 'checked' : '' }}
                                            data-switch="{{ $val->id }}" value="{{ $val->id }}"
                                            class=" @error('form.permission') is-invalid @enderror"
                                            wire:model="form.permission" />
                                        <label for="switch-{{ $val->id }}" data-on-label="On"
                                            data-off-label="Off"></label>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @error('permission')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @canany(['role-create', 'role-update'])
                <div class="card-footer text-muted">
                    <button type="submit" class="btn btn-primary">
                        Submit
                        <div wire:loading wire:target="submit">
                            Proccess...
                        </div>
                    </button>
                </div>
            @endcanany
        </div>
</form>
