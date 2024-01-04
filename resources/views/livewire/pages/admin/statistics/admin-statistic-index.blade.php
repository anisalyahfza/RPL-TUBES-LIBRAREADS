<div>
    @section('page-title', $page_title)
    @section('page-name', $page_name)
    @section('breadcrumb')
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('admin.dashboard.index') }}" class="text-muted">Dashboard</a>
            </li>
            <li class="breadcrumb-item text-muted">
                <span class="text-muted">{{ $page_name }}</span>
            </li>
        </ul>
    @endsection
    @livewire('components.statistics.component-statistic-index')
</div>
