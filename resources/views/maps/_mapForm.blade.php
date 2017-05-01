

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

                            <hr />

                            <div class="form-group{{ $errors->has('brief') ? ' has-error' : '' }}">
                                {{ Form::label('brief', 'Brief', ['class' => 'col-md-2 control-label']) }}

                                <div class="col-md-9">
                                    {{ Form::textarea('brief', old('brief'), ['class' => 'form-control', 'rows' => '3']) }}

                                    @if ($errors->has('brief'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('brief') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {{ Form::label('description', 'Description', ['class' => 'col-md-2 control-label']) }}

                                <div class="col-md-9">
                                    {{ Form::textarea('description', old('description'), ['class' => 'form-control', 'rows' => '10']) }}

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <hr />

                            <div class="form-group{{ $errors->has('download_url') ? ' has-error' : '' }}">
                                {{ Form::label('download_url', 'Download', ['class' => 'col-md-2 control-label']) }}

                                <div class="col-md-9">
                                    {{ Form::text('download_url', old('download_url'), ['class' => 'form-control']) }}

                                    @if ($errors->has('download_url'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('download_url') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            @if (isSet($edit) && $edit)
                            <hr />

                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                {{ Form::label('status', 'Publishing Status', ['class' => 'col-md-2 control-label']) }}
                                
                                <div class="col-md-9">
                                    <div class="col-md-3">
                                        {{ Form::radio('status', 'hidden', (old('status') == 'hidden')) }}
                                        <h6>Hidden</h6>
                                    </div>
                                    <div class="col-md-3">
                                        {{ Form::radio('status', 'published', (old('status') == 'published')) }}
                                        <h6>Published</h6>
                                    </div>

                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            @endif

                            <hr />

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-5">
                                    <button type="submit" class="btn btn-primary pull-right">
                                        {{ $buttonText }}
                                    </button>
                                </div>
                            </div>