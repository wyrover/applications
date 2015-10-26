<hr />

<h4>Reference Settings</h4>
{!! Form::model($ref, ['method' => 'PUT', 'url' => ['settings/refs', $ref->id], 'class' => 'form-horizontal']) !!}

<input type="hidden" name="company_id" value="{!! Auth::user()->company_id !!}">
<input type="hidden" name="reference_id" value="0">

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
        <td><input type="text" name="label" class="form-control" value="{!! $ref->label !!}"></td>
        <td>
            {!!  Form::hidden('hide', false)  !!}
            {!! Form::checkbox('hide', true)  !!}
        </td>
        <td>{!! Form::checkbox('mandatory', $ref->mandatory , $ref->mandatory, null) !!}</td>
        <td>{!! Form::select('type', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $ref->type, ['class' => 'form-control']) !!}</td>
        <td><input type="text" name="options" class="form-control" value="{!! $ref->options !!}"></td>
    </tr>

    <tr>
        <td><input type="text" name="label2" class="form-control" value="{!! $ref->label2 !!}"></td>
        <td>
            {!!  Form::hidden('hide2', false)  !!}
            {!! Form::checkbox('hide2', true)  !!}
        </td>
        <td>{!! Form::checkbox('mandatory2', $ref->mandatory2 , $ref->mandatory2, null) !!}</td>
        <td>{!! Form::select('type2', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $ref->type2, ['class' => 'form-control']) !!}</td>
        <td><input type="text" name="options2" class="form-control" value="{!! $ref->options2 !!}"></td>
    </tr>

    <tr>
        <td><input type="text" name="label3" class="form-control" value="{!! $ref->label3 !!}"></td>
        <td>{!!  Form::hidden('hide3', false)  !!}
            {!! Form::checkbox('hide3', true)  !!}
        </td>
        <td> {!! Form::checkbox('mandatory3', $ref->mandatory3 , $ref->mandatory3, null) !!}</td>
        <td>{!! Form::select('type3', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $ref->type3, ['class' => 'form-control']) !!}</td>
        <td><input type="text" name="options3" class="form-control" value="{!! $ref->options3 !!}"></td>
    </tr>

    <tr>
        <td><input type="text" name="label4" class="form-control" value="{!! $ref->label4 !!}"></td>
        <td>
            {!!  Form::hidden('hide4', false)  !!}
            {!! Form::checkbox('hide4', true)  !!}
        </td>
        <td>{!! Form::checkbox('mandatory4', $ref->mandatory4 , $ref->mandatory4, null) !!}</td>
        <td>{!! Form::select('type4', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $ref->type4, ['class' => 'form-control']) !!}</td>
        <td><input type="text" name="options4" class="form-control" value="{!! $ref->options4 !!}"></td>
    </tr>

    <tr>
        <td><input type="text" name="label5" class="form-control" value="{!! $ref->label5 !!}"></td>
        <td>{!!  Form::hidden('hide5', false)  !!}
            {!! Form::checkbox('hide5', true)  !!}
        </td>
        <td>{!! Form::checkbox('mandatory5', $ref->mandatory5 , $ref->mandatory5, null) !!}</td>
        <td>{!! Form::select('type5', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $ref->type5, ['class' => 'form-control']) !!}</td>
        <td><input type="text" name="options5" class="form-control" value="{!! $ref->options5 !!}"></td>
    </tr>

    <tr>
        <td><input type="text" name="label6" class="form-control" value="{!! $ref->label6 !!}"></td>
        <td>
            {!!  Form::hidden('hide6', false)  !!}
            {!! Form::checkbox('hide6', true)  !!}
        </td>
        <td>{!! Form::checkbox('mandatory6', $ref->mandatory6 , $ref->mandatory6, null) !!}</td>
        <td>{!! Form::select('type6', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $ref->type6, ['class' => 'form-control']) !!}</td>
        <td><input type="text" name="options6" class="form-control" value="{!! $ref->options6 !!}"></td>
    </tr>

    <tr>
        <td><input type="text" name="label7" class="form-control" value="{!! $ref->label7 !!}"></td>
        <td>
            {!!  Form::hidden('hide7', false)  !!}
            {!! Form::checkbox('hide7', true)  !!}
        </td>
        <td>{!! Form::checkbox('mandatory7', $ref->mandatory7 , $ref->mandatory7, null) !!}</td>
        <td>{!! Form::select('type7', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $ref->type7, ['class' => 'form-control']) !!}</td>
        <td><input type="text" name="options7" class="form-control" value="{!! $ref->options7 !!}"></td>
    </tr>

    <tr>
        <td><input type="text" name="label8" class="form-control" value="{!! $ref->label8 !!}"></td>
        <td>
            {!!  Form::hidden('hide8', false)  !!}
            {!! Form::checkbox('hide8', true)  !!}
        </td>
        <td>{!! Form::checkbox('mandatory8', $ref->mandatory8 , $ref->mandatory8, null) !!}</td>
        <td>{!! Form::select('type8', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $ref->type8, ['class' => 'form-control']) !!}</td>
        <td><input type="text" name="options8" class="form-control" value="{!! $ref->options8 !!}"></td>
    </tr>

    <tr>
        <td><input type="text" name="label9" class="form-control" value="{!! $ref->label9 !!}"></td>
        <td>
            {!!  Form::hidden('hide9', false)  !!}
            {!! Form::checkbox('hide9', true)  !!}
        </td>
        <td>{!! Form::checkbox('mandatory9', $ref->mandatory9 , $ref->mandatory9, null) !!}</td>
        <td>{!! Form::select('type9', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $ref->type9, ['class' => 'form-control']) !!}</td>
        <td><input type="text" name="options9" class="form-control" value="{!! $ref->options9 !!}"></td>
    </tr>

    <tr>
        <td><input type="text" name="label10" class="form-control" value="{!! $ref->label10 !!}"></td>
        <td>
            {!!  Form::hidden('hide10', false)  !!}
            {!! Form::checkbox('hide10', true)  !!}
        </td>
        <td>{!! Form::checkbox('mandatory10', $ref->mandatory10 , $ref->mandatory10, null) !!}</td>
        <td>{!! Form::select('type10', ['' => 'Please Select', 'input' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select'], $ref->type10, ['class' => 'form-control']) !!}</td>
        <td><input type="text" name="options10" class="form-control" value="{!! $ref->options10 !!}"></td>
    </tr>

    </tbody>

</table>
<div class="form-group">
    <div class="col-lg-3">
        <button class="btn btn-success btn-lg">Submit</button>
    </div>
</div>
{!! Form::close() !!}
