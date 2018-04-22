@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')
<div class="container-fluid">
        <div class="row" align-items-center>
            <div class="card col-md-10 offset-md-1">
                <div class="card-body">

                {{ Form::open(array('url' => 'job_agreement/store_applicant', 'method' => 'POST')) }}
                {{ csrf_field() }}
                {{ Form::hidden('job_id', $job_master_model->job_id, array('id' => 'job_id')) }}
                {{ Form::hidden('counter_detail_milestone', '0', array('id' => 'counter_detail_milestone')) }}
                <div class="form-group">
                    <h3>Profile</h3>
                </div>
                <div class="form-group row">
                    {{ Form::label('username', 'Username', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('username',  $job_finder_model->username , array('class' => 'form-control', 'readonly' => 'true')) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('email_address', 'Email Address', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::email('email_address', $job_finder_model->email_address, array('class' => 'form-control', 'readonly' => 'true', 'id' => 'email')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('address', 'Address', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::textarea('address', $job_finder_model->address, array('class' => 'form-control', 'rows' => '3', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('phone', 'Phone', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('phone', $job_finder_model->phone, array('class' => 'form-control', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="table-responsive">
                        <h3>Skill Lists</h3>
                        <table class="table table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Skill Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($skill_list as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->skill_type }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
                <div class="form-group row">
                    {{ Form::label('currency', 'Currency', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('currency', $job_master_model->currency_name, array('class' => 'form-control', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                {{ Form::label('payment_type', 'Payment Type', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::select('payment_type', $payment_type, null, array('class' => 'form-control', 'id' => 'ddl_payment_type')) }}
                    </div>                 
                </div>
                <div class="form-group row fulldiv">
                    {{ Form::label('total_price', 'Total Full Price', array('class' => 'col-sm-3 col-form-label', 'id' => 'total_milestone_price')) }}
                    <div class="form-inline col-sm-7">
                        {{ Form::label('total_price_label', $job_master_model->price_list, array('class' => 'col-sm-5 col-form-label', 'id' => 'total_price_label')) }}
                    </div>                 
                </div>

                <div class="form-group row milestonediv">
                    <input type='button' value='Add Milestone' id='add_milestone' class='btn btn-outline-primary col-md-3 my-1'>
                    &nbsp;&nbsp;
                    <input type='button' value='Remove Milestone' id='remove_milestone' class='btn btn-outline-danger col-md-3 my-1'>
                </div>
                <div id="TextBoxesGroup" class="milestonediv">
                    <div id="milestone_detail_1" class="form-group row">
                        {{ Form::label('milestone_detail', 'Milestone Detail #1', array('class' => 'col-sm-2 col-form-label')) }}
                        <div class="form-inline col-sm-10">
                            {{ Form::text('milestone_detail_1', '', array('class' => 'form-control col-sm-7')) }}
                                &nbsp;&nbsp;Price:&nbsp;&nbsp;
                            {{ Form::text('milestone_price_1', '0', array('class' => 'form-control milestone_price_list numeric', 'id' => 'milestone_price_1')) }}
                        </div>
                    </div>
                </div>
                <div class="form-group row milestonediv">
                {{ Form::label('total_milestone_price', 'Total Milestone Price', array('class' => 'col-sm-3 col-form-label', 'id' => 'total_milestone_price')) }}
                    <div class="form-inline col-sm-7">
                    
                    {{ Form::label('total_milestone_price_label', '0', array('class' => 'col-sm-5 col-form-label', 'id' => 'total_milestone_price_label')) }}
                    </div>                 
                </div>
                {{ Form::submit('Hire', array('class' => 'btn btn-outline-primary col-md-3 my-1')) }}
                {{ Form::close() }}
                   
                </div>
            </div>
        </div>
    </div>
    <script>
    $( document ).ready(function() {
        $('.numeric').on('input', function (event) { 
            this.value = this.value.replace(/[^0-9]/g, '');
        }); 
        $(document).on('keyup','.milestone_price_list', function() {
            var msg = '';
            var totalprice = 0;
            var detailprice = 0;
            var error = '';
            for(i=1; i<counter; i++){
                
                detailprice = $('#milestone_price_' + i).val();
                error = String(parseFloat($('#milestone_price_' + i).val()));
                if (error == 'NaN'){
                    $('#milestone_price_' + i).val('0');
                }
                detailprice = parseFloat($('#milestone_price_' + i).val());
                totalprice += detailprice;
                $('#total_milestone_price_label').text(parseFloat(totalprice));
            }
        });
    });
    $(".milestonediv").hide();
    $('#ddl_payment_type').change(function(){
            if($(this).val() == '1'){
                $(".milestonediv").hide();
                $(".fulldiv").show();
                
            }else{
                $(".milestonediv").show();
                $(".fulldiv").hide();
            }
        })
        $('#counter_detail_milestone').val('1');
        var counter = 2;
		
    $("#add_milestone").click(function () {		
        if(counter>10){
                alert("Only 10 textboxes allow");
                return false;
        }   
            
        var newLabelDiv = $(document.createElement('div'))
            .attr({
                id:'milestone_detail_' + counter, 
                class:"form-group row"
            });
                    
        newLabelDiv.after().html('<label class="col-sm-2 col-form-label">Milestone Detail #'+ counter + '</label>');
        
        var newTextBoxDiv = $(document.createElement('div'))
            .attr({
                id:'milestone_detail_' + counter, 
                class:"form-inline col-sm-10"
            });
            
        newTextBoxDiv.after().html('<input type="text" name="milestone_detail_' + counter + 
            '" id="milestone_detail_' + counter + '" class="form-control col-sm-7 milestone_price_list" value="" > &nbsp;&nbsp;Price:&nbsp;&nbsp;' +
            '<input type="text" name="milestone_price_' + counter + 
            '" id="milestone_price_' + counter + '" class="form-control numeric milestone_price_list " value="0" >');
                
                
        newLabelDiv.appendTo("#TextBoxesGroup");
        newTextBoxDiv.appendTo("#milestone_detail_" + counter);

        // newTextBoxDiv.appendTo("#TextBoxesGroup");

        $('#counter_detail_milestone').val(counter);            
        counter++;
        
        $('.numeric').on('input', function (event) { 
            this.value = this.value.replace(/[^0-9]/g, '');
        }); 
    });

    $("#remove_milestone").click(function () {
        if(counter==1){
            alert("No more textbox to remove");
            return false;
        }   
        
        counter--;
        $('#counter_detail_milestone').val(counter-1);        
            $("#milestone_detail_" + counter).remove();
                
        }); 
    
    $('#add_job_type').click(function(){
        
        var job_type_chosen = $("#ddl_job_type").val();
        var job_id = $('#txt_job_id').val();

        jQuery.post('{{ url("/job_market_regis/add_job_type") }}', {"job_type_id": job_type_chosen, "job_id": job_id})
        .then(function(response){
            if(response.message == 'OK') {
                alert('New job type has been added.');
                window.location.reload();
            }
            else {
                alert(response.message);
                window.location.reload();
            }
        });
    });

</script>
@stop