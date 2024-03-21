<form wire:submit.prevent="submit">
    <div class="card">
        <div class="card-header">
            Form Permission
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" wire:model="form.name" id="name"
                            class="form-control @error('name') is-invalid @enderror" placeholder="fullname">
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
                            class="form-control @error('guard_name') is-invalid @enderror" placeholder="guard name">
                        @error('form.guard_name')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table-sm table">
                        @foreach ($attributeData as $k => $v)
                            <thead>
                                <tr>
                                    @foreach ($v['thead'] as $key => $val)
                                        <th>{{ $val }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($v['tbody'] as $key => $val)
                                        <td>
                                            <input type="checkbox" id="{{ $val }}"
                                                data-switch="{{ $val }}" value="{{ $val }}"
                                                {{ in_array($val, $form->actions) ? 'checked' : '' }}
                                                wire:model="form.actions"
                                                class=" @error('form.actions') is-invalid @enderror" />
                                            <label for="{{ $val }}" data-on-label="On"
                                                data-off-label="Off"></label>
                                            @error('form.actions')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        @canany(['permission-create', 'permission-update'])
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
