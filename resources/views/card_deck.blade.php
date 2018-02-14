@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

            <!-- Current Cards -->
            @if (count($cards) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        My Deck
                    </div>

                    <div class="panel-body">
                        @include('common.notification')

                        <div class="row" align="center">
                            <tbody>
                            @foreach ($cards as $card)
                                <div class="column" style="background-color:{{$card->color}};">
                                    <img src={{ asset($card->image_path) }} alt=""
                                         style="
                                        display:block;
                                        width:100%;
                                        height:150px;
                                        background-color:#475;
                                        overflow:scroll;">
                                    <h3><b>{{$card->title}}</b></h3>
                                    <p><b>ID</b><br/> {{$card->id}}</p>
{{--                                    <p><b>Power</b><br/> {{$card->value}}</p>--}}
                                    <p><b>Description</b><br/>{{$card->description}} </p>
                                    <td> <!-- Card Delete Button -->
                                        {{--In the app user with id 1, their cards are displayed and in the application--}}
                                        {{--we use his account as example, in which we delete cards with--}}
                                        <form action="{{ url('card/1/'.$card->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete Card From Deck
                                            </button>
                                        </form>
                                    </td>
                                </div>
                            @endforeach
                            </tbody>
                        </div>
                        <div class="text-center">
                            {!! $cards->links() !!}
                        </div>
                    </div>


                </div>
            @endif
        </div>
    </div>
@endsection
