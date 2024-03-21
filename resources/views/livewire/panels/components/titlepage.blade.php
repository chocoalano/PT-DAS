<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @foreach (Request::segments() as $segment)
                        @if (!$loop->last)
                            <li class="breadcrumb-item"><a
                                    href="#">{{ ucwords(str_replace('-', ' ', $segment)) }}</a>
                            </li>
                        @else
                            <li class="breadcrumb-item active">{{ ucwords(str_replace('-', ' ', $segment)) }}</li>
                        @endif
                    @endforeach
                </ol>
            </div>
            <h4 class="page-title">{{ ucwords(str_replace('-', ' ', $segment)) }}</h4>
        </div>
    </div>
</div>
<!-- end page title -->
