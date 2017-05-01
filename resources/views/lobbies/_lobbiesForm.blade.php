
                            <div class="row">
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    {{ Form::label('title', 'Title', ['class' => 'col-md-2 control-label']) }}

                                    <div class="col-md-6">
                                        {{ Form::text('title', old('title'), ['class' => 'form-control']) }}

                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group{{ $errors->has('game_slug') ? ' has-error' : '' }}">
                                    {{ Form::label('game_slug', 'Game', ['class' => 'col-md-2 control-label']) }}

                                    <div class="col-md-4">

                                    {{ Form::select('game_slug', $options, old('game_slug'), ['class' => 'form-control']) }}

                                        @if ($errors->has('game_slug'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('game_slug') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="form-group{{ $errors->has('scheduled_time') ? ' has-error' : '' }}">
                                    {{ Form::label('scheduled_time', 'Schedule', ['class' => 'col-md-2 control-label']) }}

                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group date" id="datepicker">
                                                    {{ Form::text('date', old('date'), ['class' => 'form-control', 'placeholder' => 'yyyy-mm-dd']) }}<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                </div>
                                                {{ Form::hidden('scheduled_time', old('scheduled_time'), ['id' => 'scheduled_time']) }}
                                            </div>
                                        </div>
                                        <br />
                                        <div class="row">
                                            <div class="col-md-1">
                                                <span class="h3">@</span>
                                            </div>
                                            <div class="col-md-4">
                                                {{ Form::select('time', [
                                                "00:00:00"=>"12:00 am (midnight)",
                                                "00:15:00"=>"12:15 am",
                                                "00:30:00"=>"12:30 am",
                                                "00:45:00"=>"12:45 am",
                                                "01:00:00"=>"1:00 am",
                                                "01:15:00"=>"1:15 am",
                                                "01:30:00"=>"1:30 am",
                                                "01:45:00"=>"1:45 am",
                                                "02:00:00"=>"2:00 am",
                                                "02:15:00"=>"2:15 am",
                                                "02:30:00"=>"2:30 am",
                                                "02:45:00"=>"2:45 am",
                                                "03:00:00"=>"3:00 am",
                                                "03:15:00"=>"3:15 am",
                                                "03:30:00"=>"3:30 am",
                                                "03:45:00"=>"3:45 am",
                                                "04:00:00"=>"4:00 am",
                                                "04:15:00"=>"4:15 am",
                                                "04:30:00"=>"4:30 am",
                                                "04:45:00"=>"4:45 am",
                                                "05:00:00"=>"5:00 am",
                                                "05:15:00"=>"5:15 am",
                                                "05:30:00"=>"5:30 am",
                                                "05:45:00"=>"5:45 am",
                                                "06:00:00"=>"6:00 am",
                                                "06:15:00"=>"6:15 am",
                                                "06:30:00"=>"6:30 am",
                                                "06:45:00"=>"6:45 am",
                                                "07:00:00"=>"7:00 am",
                                                "07:15:00"=>"7:15 am",
                                                "07:30:00"=>"7:30 am",
                                                "07:45:00"=>"7:45 am",
                                                "08:00:00"=>"8:00 am",
                                                "08:15:00"=>"8:15 am",
                                                "08:30:00"=>"8:30 am",
                                                "08:45:00"=>"8:45 am",
                                                "09:00:00"=>"9:00 am",
                                                "09:15:00"=>"9:15 am",
                                                "09:30:00"=>"9:30 am",
                                                "09:45:00"=>"9:45 am",
                                                "10:00:00"=>"10:00 am",
                                                "10:15:00"=>"10:15 am",
                                                "10:30:00"=>"10:30 am",
                                                "10:45:00"=>"10:45 am",
                                                "11:00:00"=>"11:00 am",
                                                "11:15:00"=>"11:15 am",
                                                "11:30:00"=>"11:30 am",
                                                "11:45:00"=>"11:45 am",
                                                "12:00:00"=>"12:00 pm (noon)",
                                                "12:15:00"=>"12:15 pm",
                                                "12:30:00"=>"12:30 pm",
                                                "12:45:00"=>"12:45 pm",
                                                "13:00:00"=>"1:00 pm",
                                                "13:15:00"=>"1:15 pm",
                                                "13:30:00"=>"1:30 pm",
                                                "13:45:00"=>"1:45 pm",
                                                "14:00:00"=>"2:00 pm",
                                                "14:15:00"=>"2:15 pm",
                                                "14:30:00"=>"2:30 pm",
                                                "14:45:00"=>"2:45 pm",
                                                "15:00:00"=>"3:00 pm",
                                                "15:15:00"=>"3:15 pm",
                                                "15:30:00"=>"3:30 pm",
                                                "15:45:00"=>"3:45 pm",
                                                "16:00:00"=>"4:00 pm",
                                                "16:15:00"=>"4:15 pm",
                                                "16:30:00"=>"4:30 pm",
                                                "16:45:00"=>"4:45 pm",
                                                "17:00:00"=>"5:00 pm",
                                                "17:15:00"=>"5:15 pm",
                                                "17:30:00"=>"5:30 pm",
                                                "17:45:00"=>"5:45 pm",
                                                "18:00:00"=>"6:00 pm",
                                                "18:15:00"=>"6:15 pm",
                                                "18:30:00"=>"6:30 pm",
                                                "18:45:00"=>"6:45 pm",
                                                "19:00:00"=>"7:00 pm",
                                                "19:15:00"=>"7:15 pm",
                                                "19:30:00"=>"7:30 pm",
                                                "19:45:00"=>"7:45 pm",
                                                "20:00:00"=>"8:00 pm",
                                                "20:15:00"=>"8:15 pm",
                                                "20:30:00"=>"8:30 pm",
                                                "20:45:00"=>"8:45 pm",
                                                "21:00:00"=>"9:00 pm",
                                                "21:15:00"=>"9:15 pm",
                                                "21:30:00"=>"9:30 pm",
                                                "21:45:00"=>"9:45 pm",
                                                "22:00:00"=>"10:00 pm",
                                                "22:15:00"=>"10:15 pm",
                                                "22:30:00"=>"10:30 pm",
                                                "22:45:00"=>"10:45 pm",
                                                "23:00:00"=>"11:00 pm",
                                                "23:15:00"=>"11:15 pm",
                                                "23:30:00"=>"11:30 pm",
                                                "23:45:00"=>"11:45 pm"
                                                ], old('time'), ['class' => 'form-control', 'id' => 'time']) }}
                                            </div>
                                        </div>
                                        @if ($errors->has('scheduled_time'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('scheduled_time') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="form-group{{ $errors->has('slots_available') ? ' has-error' : '' }}">
                                    {{ Form::label('slots_available', 'Open Slots', ['class' => 'col-md-2 control-label']) }}

                                    <div class="col-md-2">
                                        {{ Form::select('slots_available', [
                                        1=>1,
                                        2=>2,
                                        3=>3,
                                        4=>4,
                                        5=>5,
                                        6=>6,
                                        7=>7,
                                        8=>8,
                                        9=>9,
                                        10=>10,
                                        11=>11,
                                        12=>12,
                                        13=>13,
                                        14=>14,
                                        15=>15
                                        ], old('slots_available'), ['class' => 'form-control']) }}
                                        
                                        @if ($errors->has('slots_available'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('slots_available') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    {{ Form::label('description', 'Description', ['class' => 'col-md-2 control-label']) }}

                                    <div class="col-md-9">
                                        {{ Form::textarea('description', old('description'), ['class' => 'form-control', 'rows' => '4', 'placeholder' => 'Describe what your lobby is about...']) }}

                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="form-group{{ $errors->has('security') ? ' has-error' : '' }}">
                                    {{ Form::label('security', 'Security', ['class' => 'col-md-2 control-label']) }}
                                    
                                    <div class="col-md-9">
                                        <div class="col-md-3">
                                            {{ Form::radio('security', 'open', (!isSet(old('security')) || old('security') == 'open')) }}
                                            <h6>Anyone can join</h6>
                                        </div>
                                        <div class="col-md-3">
                                            {{ Form::radio('security', 'request', (old('security') == 'request')) }}
                                            <h6>Request to join</h6>
                                        </div>
                                        <div class="col-md-3">
                                            {{ Form::radio('security', 'password', (old('security') == 'password')) }}
                                            <h6>Password protected</h6>
                                        </div>

                                        @if ($errors->has('security'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('security') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    {{ Form::label('password', 'Password', ['class' => 'col-md-2 control-label']) }}

                                    <div class="col-md-4">
                                        {{ Form::text('password', old('password'), ['class' => 'form-control', 'placeholder' => 'Enter a password for the lobby']) }}

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-5">
                                        <button type="submit" class="btn btn-primary pull-right">
                                            {{ $buttonText }}
                                        </button>
                                    </div>
                                </div>
                            </div>