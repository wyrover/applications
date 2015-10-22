@extends('partials/layout')
@section('meta_title')
    Settings
@endsection
@section('title')
    Settings
@endsection
@section('content')
<p>You have the option to add up to 10 custom fields for your application &amp; reference forms.</p><br />

<h4>Application Settings</h4>
{!! Form::model($setting, ['method' => 'PUT', 'url' => ['settings', $setting->id], 'class' => 'form-horizontal']) !!}

    <input type="hidden" name="company_id" value="{!! Auth::user()->company_id !!}">
    <input type="hidden" name="application_id" value="{!! $setting->id !!}">

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Label</th>
                <th>Hide Field?</th>
                <th>Mandatory</th>
                <th>Type</th>
                <th>Options (separate with a comma ,)</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td><input type="text" name="label" class="form-control" value="{!! $setting->label !!}"></td>
                <td>
                    {!!  Form::hidden('hide', false)  !!}
                    {!! Form::checkbox('hide', true)  !!}
                </td>
                <td>{!! Form::checkbox('mandatory', $setting->mandatory , $setting->mandatory, null) !!}</td>
                <td>{!! Form::select('type', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $setting->type, ['class' => 'form-control']) !!}</td>
                <td><input type="text" name="options" class="form-control" value="{!! $setting->options !!}"></td>
            </tr>

            <tr>
                <td><input type="text" name="label2" class="form-control" value="{!! $setting->label2 !!}"></td>
                <td>
                    {!!  Form::hidden('hide2', false)  !!}
                    {!! Form::checkbox('hide2', true)  !!}
                </td>
                <td>{!! Form::checkbox('mandatory2', $setting->mandatory2 , $setting->mandatory2, null) !!}</td>
                <td>{!! Form::select('type2', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $setting->type2, ['class' => 'form-control']) !!}</td>
                <td><input type="text" name="options2" class="form-control" value="{!! $setting->options2 !!}"></td>
            </tr>

            <tr>
                <td><input type="text" name="label3" class="form-control" value="{!! $setting->label3 !!}"></td>
                <td>{!!  Form::hidden('hide3', false)  !!}
                   {!! Form::checkbox('hide3', true)  !!}
                </td>
                <td> {!! Form::checkbox('mandatory3', $setting->mandatory3 , $setting->mandatory3, null) !!}</td>
                <td>{!! Form::select('type3', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $setting->type3, ['class' => 'form-control']) !!}</td>
                <td><input type="text" name="options3" class="form-control" value="{!! $setting->options3 !!}"></td>
            </tr>

            <tr>
                <td><input type="text" name="label4" class="form-control" value="{!! $setting->label4 !!}"></td>
                <td>
                    {!!  Form::hidden('hide4', false)  !!}
                    {!! Form::checkbox('hide4', true)  !!}
                </td>
                <td>{!! Form::checkbox('mandatory4', $setting->mandatory4 , $setting->mandatory4, null) !!}</td>
                <td>{!! Form::select('type4', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $setting->type4, ['class' => 'form-control']) !!}</td>
                <td><input type="text" name="options4" class="form-control" value="{!! $setting->options4 !!}"></td>
            </tr>

            <tr>
                <td><input type="text" name="label5" class="form-control" value="{!! $setting->label5 !!}"></td>
                <td>{!!  Form::hidden('hide5', false)  !!}
                {!! Form::checkbox('hide5', true)  !!}
                </td>
                <td>{!! Form::checkbox('mandatory5', $setting->mandatory5 , $setting->mandatory5, null) !!}</td>
                <td>{!! Form::select('type5', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $setting->type5, ['class' => 'form-control']) !!}</td>
                <td><input type="text" name="options5" class="form-control" value="{!! $setting->options5 !!}"></td>
            </tr>

            <tr>
                <td><input type="text" name="label6" class="form-control" value="{!! $setting->label6 !!}"></td>
                <td>
                    {!!  Form::hidden('hide6', false)  !!}
                    {!! Form::checkbox('hide6', true)  !!}
                </td>
                <td>{!! Form::checkbox('mandatory6', $setting->mandatory6 , $setting->mandatory6, null) !!}</td>
                <td>{!! Form::select('type6', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $setting->type6, ['class' => 'form-control']) !!}</td>
                <td><input type="text" name="options6" class="form-control" value="{!! $setting->options6 !!}"></td>
            </tr>

            <tr>
                <td><input type="text" name="label7" class="form-control" value="{!! $setting->label7 !!}"></td>
                <td>
                    {!!  Form::hidden('hide7', false)  !!}
                    {!! Form::checkbox('hide7', true)  !!}
                </td>
                <td>{!! Form::checkbox('mandatory7', $setting->mandatory7 , $setting->mandatory7, null) !!}</td>
                <td>{!! Form::select('type7', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $setting->type7, ['class' => 'form-control']) !!}</td>
                <td><input type="text" name="options7" class="form-control" value="{!! $setting->options7 !!}"></td>
            </tr>

            <tr>
                <td><input type="text" name="label8" class="form-control" value="{!! $setting->label8 !!}"></td>
                <td>
                    {!!  Form::hidden('hide8', false)  !!}
                    {!! Form::checkbox('hide8', true)  !!}
                </td>
                <td>{!! Form::checkbox('mandatory8', $setting->mandatory8 , $setting->mandatory8, null) !!}</td>
                <td>{!! Form::select('type8', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $setting->type8, ['class' => 'form-control']) !!}</td>
                <td><input type="text" name="options8" class="form-control" value="{!! $setting->options8 !!}"></td>
            </tr>

            <tr>
                <td><input type="text" name="label9" class="form-control" value="{!! $setting->label9 !!}"></td>
                <td>
                    {!!  Form::hidden('hide9', false)  !!}
                    {!! Form::checkbox('hide9', true)  !!}
                </td>
                <td>{!! Form::checkbox('mandatory9', $setting->mandatory9 , $setting->mandatory9, null) !!}</td>
                <td>{!! Form::select('type9', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $setting->type9, ['class' => 'form-control']) !!}</td>
                <td><input type="text" name="options9" class="form-control" value="{!! $setting->options9 !!}"></td>
            </tr>

            <tr>
                <td><input type="text" name="label10" class="form-control" value="{!! $setting->label10 !!}"></td>
                <td>
                    {!!  Form::hidden('hide10', false)  !!}
                    {!! Form::checkbox('hide10', true)  !!}
                </td>
                <td>{!! Form::checkbox('mandatory10', $setting->mandatory10 , $setting->mandatory10, null) !!}</td>
                <td>{!! Form::select('type10', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $setting->type10, ['class' => 'form-control']) !!}</td>
                <td><input type="text" name="options10" class="form-control" value="{!! $setting->options10 !!}"></td>
            </tr>

        </tbody>

    </table>
    <div class="form-group">
      <div class="col-lg-3">
         <button class="btn btn-success btn-lg">Submit</button>
      </div>
    </div>
{!! Form::close() !!}

    @include('settings.reference')

@endsection