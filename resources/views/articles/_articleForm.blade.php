

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

                            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                {{ Form::label('body', 'Body', ['class' => 'col-md-2 control-label']) }}

                                <div class="col-md-9">
                                    {{ Form::textarea('body', old('body'), ['class' => 'form-control', 'rows' => '10']) }}

                                    @if ($errors->has('body'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('body') }}</strong>
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