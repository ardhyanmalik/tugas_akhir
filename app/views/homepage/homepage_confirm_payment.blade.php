<!DOCTYPE html>
<html>
 
<head>
    @include('master.meta')
    {{HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800')}}
    {{HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,500,700,300')}}
    {{HTML::style('templates/theme/vendor/plugins/nestable/nestable.css')}}
    {{HTML::style('templates/theme/assets/skin/default_skin/css/theme.css')}}
    {{HTML::style('templates/theme/assets/admin-tools/admin-forms/css/admin-forms.css')}}


</head>
<body class="bg-light" style="height:auto;">

@include('homepage.homepage_header')
<section id="content" class="animated fadeIn">
    <div class="container">
        <div class="jumbotron">
            <div class="admin-form">
                <div class="smart-widget sm-right smr-50">
                    <label class="field">
                        <input type="text" name="sub" id="sub" class="gui-input" placeholder="Search Product...">
                    </label>
                    <button type="submit" class="button"> <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="admin-form">
                <div class="col-md-3">
 
                </div>
                <div class="col-md-9">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @foreach($errors->all('<ul>:message</ul>') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </div>
                        @endif

                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-check pr10"></i>
                        <strong>{{ Session::get('success') }}!</strong>
                        </div>
                        @endif
                    <div class="admin-form tab-pane" id="order1" role="tabpanel">
                        

                        <div class="panel panel-success heading-border">
                            <div class="panel-heading">
                                <span class="panel-title"><i class="fa fa-truck"></i>Confirm Payment
                                </span>
                            </div>
                        <!-- end .form-header section -->
                        <form method="post" action="{{URL::route('product-transaction-post-confirm')}}" id="form-order1">
                            <div class="panel-body p25">
                                <div class="section-divider mt20 mb40">
                                    <span>You are ordering for</span>
                                </div>
                                <!-- .section-divider -->

                                <div class="section row">
                                    <div class="col-md-12">
                                        <label for="pname" class="field prepend-icon">
                                            <input type="text" name="idtransaction" id="idtransaction" class="gui-input" placeholder="Your ID Transcation">
                                            <b class="tooltip tip-left-top"><em> This is  ID Transaction</em></b>
                                            <label for="pname" class="field-icon"><i class="fa fa-barcode"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
                                <!-- end section row section -->

                                <div class="section row">
                                    <div class="col-md-6">
                                        <label for="mobile" class="field prepend-icon">
                                            <input type="tel" name="bank" id="bank" class="gui-input" placeholder="Your Bank">
                                            <label for="mobile" class="field-icon"><i class="glyphicons glyphicons-credit_card"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="col-md-6">
                                        <label for="firstaddr" class="field prepend-icon">
                                            <input type="text" name="name" id="name" class="gui-input" placeholder="Your Name">
                                            <label for="firstaddr" class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
                                <!-- end section row section -->

                                <div class="section row">
                                    <div class="col-md-6">
                                        <label for="mobile" class="field prepend-icon">
                                            <input type="tel" name="total" id="total" class="gui-input" placeholder="Total Transfer">
                                            <label for="mobile" class="field-icon"><i class="fa fa-money"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="datepicker1" class="field prepend-icon">
                                            <input type="text" id="datepicker1" name="date" class="gui-input" placeholder="Transfer Date">
                                            <label class="field-icon"><i class="fa fa-calendar-o"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>
                                <div class="section row">
                                    <div class="col-md-6">
                                        <label class="field select">
                                            <select id="choosebank" name="choosebank">
                                                <option>Choose Bank</option>
                                                <option value="1">Bank BNI</option>
                                                <option value="2">Bank Mandiri</option>
                                            </select>
                                            <i class="arrow"></i>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                    <div class="col-md-6">
                                        <label for="mobile" class="field prepend-icon">
                                            <input type="tel" name="number" id="number" class="gui-input" placeholder="Nomor Rekening">
                                        </label>
                                    </div>
                                </div>
                                <div class="section row">
                                    <div class="col-md-12">
                                        <div class="section">
                                            <label class="field prepend-icon file">
                                                <span class="button">Choose File</span>
                                                <input type="file" class="gui-file" name="filetransaksi" id="filetransaksi" onChange="document.getElementById('uploader2').value = this.value;">
                                                <input type="text" class="gui-input" id="uploader2" placeholder="Please Select A File">
                                                <label class="field-icon"><i class="fa fa-upload"></i>
                                                </label>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="section mb10">
                                                <span>Product File :</span>
                                                <label class="field prepend-icon file">
                                                    <span class="button">Choose File</span>
                                                    <input type="file" class="gui-file" name="productfile" id="productfile" onChange="document.getElementById('uploader2').value = this.value;">
                                                    <input type="text" class="gui-input" id="uploader2" placeholder="Please Select A File (max size: 25MB)">
                                                    <label class="field-icon"><i class="fa fa-upload"></i>
                                                    </label>
                                                </label>
                                            </div>
                            </div>
                            <!-- end .form-body section -->
                            <div class="panel-footer text-right">
                                <button type="submit" class="button btn-primary">Submit</button>
                            </div>
                            <!-- end .form-footer section -->
                        </form>
                    </div>
                    <!-- end .admin-form section -->
                </div>
                </div>
            </div>
        </div>
    </div>

</section>



{{HTML::script('templates/theme/vendor/jquery/jquery-1.11.1.min.js')}}
{{HTML::script('templates/theme/vendor/jquery/jquery_ui/jquery-ui.min.js')}}
{{HTML::script('templates/theme/assets/js/bootstrap/bootstrap.min.js')}}

{{HTML::script('templates/theme/assets/js/bootstrap/holder.min.js')}}


{{HTML::script('templates/theme/assets/js/utility/utility.js')}}
{{HTML::script('templates/theme/assets/js/main.js')}}
{{HTML::script('templates/theme/assets/js/demo.js')}}
<script type="text/javascript">
    jQuery(document).ready(function() {

        "use strict";

        // Init Theme Core
        Core.init();

        // Init Theme Core
        Demo.init();

        $("#datepicker1").datepicker({
                prevText: '<i class="fa fa-chevron-left"></i>',
                nextText: '<i class="fa fa-chevron-right"></i>',
                showButtonPanel: false
        });



    });
</script>


</body>