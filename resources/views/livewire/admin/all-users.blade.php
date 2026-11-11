@php
    $initials = strtoupper(substr($user->first_name ?? '', 0, 1) . substr($user->last_name ?? '', 0, 1));
@endphp

<tr>
    <td class="text-center rg-muted">{{ $counter }}</td>
    <td>
        <div class="rg-table-user">
            <span class="rg-avatar">
                @if ($user->profile_pic)
                    <img src="{{ asset('storage/' . $user->profile_pic) }}" alt="{{ $user->first_name }}">
                @else
                    {{ $initials ?: 'U' }}
                @endif
            </span>
            <div>
                <p class="rg-table-user__name">{{ $user->first_name . ' ' . $user->last_name }}</p>
                <span class="rg-table-user__email">{{ $user->email }}</span>
            </div>
        </div>
    </td>
    <td>{{ $user->country ?: '—' }}</td>
    <td>{{ date('M d, Y', strtotime($user->created_at)) }}</td>
    <td><span class="rg-table-amount">${{ number_format((float) $user->balance, 2) }}</span></td>
    <td><span class="rg-table-amount">${{ number_format((float) $user->sub_balance, 2) }}</span></td>
    <td>
        <a href="{{ route('admin_ai_trade', [$user->id]) }}" target="_blank" class="btn btn-secondary btn-sm">
            <i class="fe fe-cpu"></i> Open
        </a>
    </td>
    <td>
        <div class="rg-table-actions">
            <a class="btn btn-secondary btn-sm" href="{{ route('edit_user', [$user->id]) }}">
                <i class="fe fe-edit-3"></i> Manage
            </a>
            <form method="POST" action="{{ route('delete_user', [$user->id]) }}" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm btn-icon confirm" aria-label="Delete customer" title="Delete customer">
                    <i class="fe fe-trash-2"></i>
                </button>
            </form>
        </div>
    </td>
</tr>
