@extends('avored-ecommerce::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('avored-subscribe::subscribe.create') }}</div>
                    <div class="card-body">

                        <form action="{{ route('admin.subscribe.store') }}" method="post">
                            {{ csrf_field() }}

                            @include('avored-subscribe::subscribe._fields')

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">{{ __('avored-subscribe::subscribe.create') }}</button>
                                <a href="{{ route('admin.subscribe.index') }}" class="btn">{{ __('avored-ecommerce::lang.cancel') }}</a>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection