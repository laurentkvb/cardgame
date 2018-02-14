@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

            <!-- Current Cards -->
            @if (count($cards) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Card Collection
                    </div>

                    <div class="panel-body">
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
                                    <p><b>Power</b><br/> {{$card->value}}</p>
                                    <p><b>Description</b><br/>{{$card->description}} </p>
                                </div>
                            @endforeach
                            </tbody>
                        </div>
                    </div>


                </div>
            @endif
        </div>
    </div>
@endsection
