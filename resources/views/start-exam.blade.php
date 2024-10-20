
@extends('layouts.main')

@section('content')

<div class="row">
              <div class="col-12">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3 col-12">
                        <div class="mb-3">
                          <label class="form-label" for="time-formatting">Time Format</label>
                          <input type="text" class="form-control" placeholder="HH-MM-SS" id="time-formatting">
                        </div>
                      </div>
                      <div class="col-sm-3 col-12">
                        <div class="mb-3">
                          <label class="form-label" for="time-formatting2">Time Format 2</label>
                          <input type="text" class="form-control" placeholder="HH-MM" id="time-formatting2">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection
