@extends('partials/layout')
@section('meta_title')
    New Reference Request
@endsection
@section('title')
    New Reference Request
@endsection
@section('content')

{!! Form::open(['url' => '/references/new', 'class' => 'form-horizontal']) !!}
<div class="col-md-12">
    <h5>Personal Details</h5>

    <div class="form-group">
        <div class="col-sm-3">First Name</div>
        <div class="col-lg-7">
            <input type="text" name="first_name" class="form-control" value="" autocomplete="off">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-3">Middle Names</div>
        <div class="col-lg-7">
            <input type="text" name="middle" class="form-control" value="" autocomplete="off">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-3">Surname</div>
        <div class="col-lg-7">
            <input type="text" name="surname" class="form-control" value="" autocomplete="off">
        </div>
    </div>

</div>

<div class="col-md-12">
    <hr />
    <h5>Reference Details</h5>

    <div class="col-md-6">
        <label>First Referee</label>
        
        <div class="form-group">
            <div class="col-sm-3">Name</div>
            <div class="col-lg-7">
                <input type="text" name="name" class="form-control" value="" autocomplete="off">
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-3">Company Name</div>
            <div class="col-lg-7">
                <input type="text" name="company_name" class="form-control" value="" autocomplete="off">
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-3">Email</div>
            <div class="col-lg-7">
                <input type="text" name="email" class="form-control" value="" autocomplete="off">
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-3">Relationship</div>
            <div class="col-lg-7">
                <input type="text" name="relationship" class="form-control" value="" autocomplete="off">
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-3">Is this your previous /current employer?</div>
            <div class="col-lg-7">
                <select name="employer" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3">Can we contact this reference?</div>
            <div class="col-lg-7">
                <select name="contact" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
        
    </div>

    <div class="col-md-6">
        <label>Second Referee</label>

        <div class="form-group">
            <div class="col-sm-3">Name</div>
            <div class="col-lg-7">
                <input type="text" name="name2" class="form-control" value="" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3">Company Name</div>
            <div class="col-lg-7">
                <input type="text" name="company_name2" class="form-control" value="" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3">Email</div>
            <div class="col-lg-7">
                <input type="text" name="emailtwo" class="form-control" value="" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3">Relationship</div>
            <div class="col-lg-7">
                <input type="text" name="relationship2" class="form-control" value="" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3">Is this your previous /current employer?</div>
            <div class="col-lg-7">
                <select name="employer2" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3">Can we contact this reference?</div>
            <div class="col-lg-7">
                <select name="contact2" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
        
    </div>
    <br />
    <hr />
    <div class="col-md-6" style="min-height: 200px!important; height: auto!important;">

            @foreach($settings as $field)

                <input type="hidden" name="id" value="{!! $field->id !!}">
                <input type="hidden" name="company_id" value="{!! $field->company_id !!}">

                <input type="hidden" name="label" value="{!! $field->label !!}">
                <input type="hidden" name="label2" value="{!! $field->label2 !!}">
                <input type="hidden" name="label3" value="{!! $field->label3 !!}">
                <input type="hidden" name="label4" value="{!! $field->label4 !!}">
                <input type="hidden" name="label5" value="{!! $field->label5 !!}">
                <input type="hidden" name="label6" value="{!! $field->label6 !!}">
                <input type="hidden" name="label7" value="{!! $field->label7 !!}">
                <input type="hidden" name="label8" value="{!! $field->label8 !!}">
                <input type="hidden" name="label9" value="{!! $field->label9 !!}">
                <input type="hidden" name="label10" value="{!! $field->label10 !!}">

                <div class="form-group">
                    <div class="col-sm-4">{!! $field->label !!}</div>
                    <div class="col-lg-7">
                        @if ($field->type == 'input')
                            <input type="{!! $field->type !!}" name="answer" class="form-control" value="">
                        @endif
                        @if($field->type == 'textarea')
                            <textarea name="answer" class="form-control" rows="3"></textarea>
                        @endif
                        @if($field->type == 'select')
                            <?php $custom1 = $field->options; $pieces1 = explode(",", $custom1); ?>
                            <select name="answer" class="form-control">
                                @foreach($pieces1 as $piece1)
                                    <option value="{!! $piece1 !!}">{!! ucwords($piece1) !!}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">{!! $field->label2 !!}</div>
                    <div class="col-lg-7">
                        @if ($field->type2 == 'input')
                            <input type="{!! $field->type2 !!}" name="answer2" class="form-control" value="">
                        @endif
                        @if($field->type2 == 'textarea')
                            <textarea name="answer2" class="form-control" rows="3"></textarea>
                        @endif
                        @if($field->type2 == 'select')
                            <?php $custom2 = $field->options2; $pieces2 = explode(",", $custom2); ?>
                            <select name="answer2" class="form-control">
                                @foreach($pieces2 as $piece2)
                                    <option value="{!! $piece2 !!}">{!! ucwords($piece2) !!}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">{!! $field->label3 !!}</div>
                    <div class="col-lg-7">
                        @if ($field->type3 == 'input')
                            <input type="{!! $field->type3 !!}" name="answer3" class="form-control" value="">
                        @endif
                        @if($field->type3 == 'textarea')
                            <textarea name="answer3" class="form-control" rows="3"></textarea>
                        @endif
                        @if($field->type3 == 'select')
                            <?php $custom = $field->options3; $pieces = explode(",", $custom); ?>
                            <select name="answer3" class="form-control">
                                @foreach($pieces as $piece)
                                    <option value="{!! $piece !!}">{!! ucwords($piece) !!}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">{!! $field->label4 !!}</div>
                    <div class="col-lg-7">
                        @if ($field->type4 == 'input')
                            <input type="{!! $field->type4 !!}" name="answer4" class="form-control" value="">
                        @endif
                        @if($field->type4 == 'textarea')
                            <textarea name="answer4" class="form-control" rows="3"></textarea>
                        @endif
                        @if($field->type4 == 'select')
                            <?php $custom4 = $field->options4; $pieces4 = explode(",", $custom4); ?>
                            <select name="answer4" class="form-control">
                                @foreach($pieces4 as $piece4)
                                    <option value="{!! $piece4 !!}">{!! ucwords($piece4) !!}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">{!! $field->label5 !!}</div>
                    <div class="col-lg-7">
                        @if ($field->type5 == 'input')
                            <input type="{!! $field->type5 !!}" name="answer5" class="form-control" value="">
                        @endif
                        @if($field->type5 == 'textarea')
                            <textarea name="answer5" class="form-control" rows="3"></textarea>
                        @endif
                        @if($field->type5 == 'select')
                            <?php $custom5 = $field->options5; $pieces5 = explode(",", $custom5); ?>
                            <select name="answer5" class="form-control">
                                @foreach($pieces5 as $piece5)
                                    <option value="{!! $piece5 !!}">{!! ucwords($piece5) !!}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">{!! $field->label6 !!}</div>
                    <div class="col-lg-7">
                        @if ($field->type6 == 'input')
                            <input type="{!! $field->type6 !!}" name="answer6" class="form-control" value="">
                        @endif
                        @if($field->type6 == 'textarea')
                            <textarea name="answer6" class="form-control" rows="3"></textarea>
                        @endif
                        @if($field->type6 == 'select')
                            <?php $custom6 = $field->options6; $pieces6 = explode(",", $custom6); ?>
                            <select name="answer6" class="form-control">
                                @foreach($pieces6 as $piece6)
                                    <option value="{!! $piece6 !!}">{!! ucwords($piece6) !!}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">{!! $field->label7 !!}</div>
                    <div class="col-lg-7">
                        @if ($field->type7 == 'input')
                            <input type="{!! $field->type7 !!}" name="answer7" class="form-control" value="">
                        @endif
                        @if($field->type7 == 'textarea')
                            <textarea name="answer7" class="form-control" rows="3"></textarea>
                        @endif
                        @if($field->type7 == 'select')
                            <?php $custom7 = $field->options7; $pieces7 = explode(",", $custom7); ?>
                            <select name="answer7" class="form-control">
                                @foreach($pieces7 as $piece7)
                                    <option value="{!! $piece7 !!}">{!! ucwords($piece7) !!}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">{!! $field->label8 !!}</div>
                    <div class="col-lg-7">
                        @if ($field->type8 == 'input')
                            <input type="{!! $field->type8 !!}" name="answer8" class="form-control" value="">
                        @endif
                        @if($field->type8 == 'textarea')
                            <textarea name="answer8" class="form-control" rows="3"></textarea>
                        @endif
                        @if($field->type8 == 'select')
                            <?php $custom8 = $field->options8; $pieces8 = explode(",", $custom8); ?>
                            <select name="answer8" class="form-control">
                                @foreach($pieces8 as $piece8)
                                    <option value="{!! $piece8 !!}">{!! ucwords($piece8) !!}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">{!! $field->label9 !!}</div>
                    <div class="col-lg-7">
                        @if ($field->type9 == 'input')
                            <input type="{!! $field->type9 !!}" name="answer9" class="form-control" value="">
                        @endif
                        @if($field->type9 == 'textarea')
                            <textarea name="answer9" class="form-control" rows="3"></textarea>
                        @endif
                        @if($field->type9 == 'select')
                            <?php $custom9 = $field->options9; $pieces9 = explode(",", $custom9); ?>
                            <select name="answer9" class="form-control">
                                @foreach($pieces9 as $piece9)
                                    <option value="{!! $piece9 !!}">{!! ucwords($piece9) !!}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">{!! $field->label10 !!}</div>
                    <div class="col-lg-7">
                        @if ($field->type10 == 'input')
                            <input type="{!! $field->type10 !!}" name="answer10" class="form-control" value="">
                        @endif
                        @if($field->type10 == 'textarea')
                            <textarea name="answer10" class="form-control" rows="3"></textarea>
                        @endif
                        @if($field->type10 == 'select')
                            <?php $custom10 = $field->options10; $pieces10 = explode(",", $custom10); ?>
                            <select name="answer10" class="form-control">
                                @foreach($pieces10 as $piece10)
                                    <option value="{!! $piece10 !!}">{!! ucwords($piece10) !!}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>

            @endforeach
    </div>

</div>

<div class="form-group">
  <div class="col-lg-3">
     <button class="btn btn-success btn-lg">Submit Request</button>
      <a href="/references" class="btn btn-danger btn-lg">Cancel</a>

  </div>
</div>

{!! Form::close() !!}
@endsection