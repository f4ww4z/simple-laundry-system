<!--
   Copyright 2018 Maharaj Fawwaz A. Yusran

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
-->
@extends('layouts.app')

@section('title', 'New Laundry')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Laundry</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/laundries/new-laundry-1') }}">
                            @csrf

                            {{-- Email --}}
                            <div class="form-group row">
                                <label for="service"
                                       class="col-md-4 col-form-label text-md-right">Choose a
                                    service:</label>

                                <div class="col-md-6">
                                    <select name="service" id="service" type="service"
                                            class="form-control">
                                        <option value="">Select Service</option>

                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach

                                    </select>

                                    @if ($errors->has('service'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('service') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Weight --}}
                            <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }} row">
                                <label for="weight" class="col-md-4 col-form-label text-md-right">
                                    Laundry weight (kg):
                                </label>

                                <div class="col-md-6">
                                    <input id="weight"
                                           class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}"
                                           name="weight" value="{{ old('weight') }}" required
                                           autofocus>

                                    @if ($errors->has('weight'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('weight') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-secondary" href="/home">
                                        Discard
                                    </button>
                                    <button type="submit" class="btn btn-primary"
                                            onclick="location.href='/laundries/new-laundry-2'">
                                        Next
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection