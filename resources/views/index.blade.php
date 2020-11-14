@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">

                @include('flashes.success')
                @include('flashes.errors')

                <form action="{{route('store')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="link" class="form-control" placeholder="link">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success">Сократить ссылку</button>
                        </div>
                    </div>
                </form>

                <table class="table">
                    <thead>
                    <tr>
                        <th>Short link</th>
                        <th>Original link</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($shortLinks as $shortLink)
                        <tr>
                            <td><a href="{{route('getShortLinkRedirect', $shortLink->token)}}" class="btn btn-primary"
                                   target="_blank">{{route('getShortLinkRedirect', $shortLink->token)}}</a>
                            </td>
                            <td>
                                <p>{{$shortLink->link}}</p>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">
                            <p>No links found.</p>
                        </div>
                    @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
