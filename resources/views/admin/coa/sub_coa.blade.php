@foreach ($subcoa as $item)
    <tr>
        <td style="width: 2%"></td>
        <td colspan="2">
            <span class="text-info">{{ $item->code }} - {{ $item->name }}</span>
        </td>
        <th scope="row">
            <span class="text-danger">{{ formatAmount($item->beginning_balance) }}</span>
        </th>
        <td>
            <div class="gap-2 hstack fs-15">
                <a href="{{ route('admin.coa.edit', $item) }}"
                    class="btn btn-outline-primary btn-sm btn-wave waves-effect waves-light rounded-pill"
                    data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="{{ __('Perbarui') }}">
                    <i class="ri-edit-line"></i>
                </a>
            </div>
        </td>
    </tr>
    @if (count($item->subcoa))
        @foreach ($item->subcoa as $value)
            <tr>
                <td style="width: 2%"></td>
                <td style="width: 2%"></td>
                <td><span class="text-muted">{{ $value->code }} - {{ $value->name }}</span></td>
                <th scope="row">
                    <span class="text-danger">{{ formatAmount($value->beginning_balance) }}</span>
                </th>
                <td>
                    <div class="gap-2 hstack fs-15">
                        <a href="{{ route('admin.coa.edit', $value) }}"
                            class="btn btn-outline-primary btn-sm btn-wave waves-effect waves-light rounded-pill"
                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                            data-bs-original-title="{{ __('Perbarui') }}">
                            <i class="ri-edit-line"></i>
                        </a>
                        {{-- <a href="{{ route('admin.coa.destroy', $value) }}"
                            class="btn btn-icon btn-sm btn-danger-light rounded-pill delete_item">
                            <i class="ri-delete-bin-line"></i>
                        </a> --}}
                    </div>
                </td>
            </tr>
        @endforeach
    @endif
@endforeach
