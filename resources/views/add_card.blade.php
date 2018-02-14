@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Card
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New Card Form -->
                    <form action="{{ url('card')}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Card Name -->
                        <div class="form-group">

                            <label for="card-name" class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-6">
                                <input type="text" name="title" id="card-title" class="form-control"
                                       value="{{ old('card') }}">
                            </div>


                        </div>
                        <div class="form-group">

                            <label for="card-name" class="col-sm-3 control-label">Color</label>
                            <div class="col-sm-6">
                                <input type="color" name="color" id="card-color" class="form-control"
                                       value="{{ old('card') }}">
                            </div>


                        </div>
                        <div class="form-group">

                            <label for="card-name" class="col-sm-3 control-label">Value</label>
                            <div class="col-sm-6">
                                <input type="number" name="value" id="card-number" class="form-control"
                                       value="{{ old('card') }}">
                            </div>


                        </div>
                        <div class="form-group">

                            <label for="card-name" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-6">
                                {{--<input type="text" name="description" id="card-description" class="form-control"--}}
                                {{--value="{{ old('card') }}">--}}
                                <textarea  class="form-control" rows="4" cols="50" name="description" value="{{ old('card') }}"></textarea>

                            </div>


                        </div>
                        <div class="form-group">

                            <label for="card-name" class="col-sm-3 control-label">Type</label>
                            <div class="col-sm-6">
                                {{----}}
                                {{--<input type="text" name="type" id="card-type" class="form-control"--}}
                                       {{--value="{{ old('card') }}">--}}

                                <select class="form-control" name="type" id="type" value="{{ old('card') }}">
                                    <option value="Attacker">Attacker</option>
                                    <option value="Defender">Defender</option>
                                    <option value="Medic">Medic</option>
                                    <option value="King">King</option>
                                </select>

                            </div>


                        </div>

                        <!-- Add Card Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Card
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
