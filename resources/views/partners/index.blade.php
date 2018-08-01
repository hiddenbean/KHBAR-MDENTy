@extends('layouts.staff.app') 
@section('css') 
@stop 

@section('content')
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner" style="transform: translateY(0px); opacity: 1;">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Partenaires</a>
                </li>
                <li class="breadcrumb-item active">List des partenaires</li>
            </ol>
            <!-- END BREADCRUMB -->
        </div>
    </div>
</div>
<!-- START CONTAINER FLUID -->
<div class=" container-fluid   container-fixed-lg bg-white">
    <!-- START card -->
    <div class="card card-transparent">
        <div class="card-header">
            <div class="card-title">List des partenaires
            </div>  
        </div> 
        <div class="card-body">
            <table class="table table-striped" id="tableWithExportOptions">
                <thead>
                    <tr>
                        <td>#</td>
                        <td width='35'>Id visuel</td>
                        <td>Nom de la compagnie</td>
                        <td>Addresse</td> 
                        <td>Nom et prénom</td> 
                        <td>Email</td> 
                        <td>Date de demande</td> 
                        <td>Etat</td>  
                    </tr>
                </thead>
                <tbody> 
                    @foreach($partners as $partner)
                   
                    <tr class="odd gradeX">
                        <td>{{$partner->id}}</td>  

                        <td><img src="{{ asset('img/profiles/avatar_small.jpg') }}" width="32" height="32" class="rounded"/></td>
                        <td>
                            <a href="{{url('partners/'.$partner->id.'/status')}}">{{$partner->company_name}}</a>
                        </td>
                        <td>{{ $partner->address->address }} {{ $partner->address->address_two }}, {{ $partner->address->country }}, {{ $partner->address->city }}</td>
                        <td>
                            @foreach($partner->partnerAccounts as $partner_accounts)
                                {{ $partner_accounts->first_name }},
                                {{ $partner_accounts->last_name }} <br>
                            @endforeach
                        </td>   
                        <td>
                            @foreach($partner->partnerAccounts as $partner_accounts) 
                                {{ $partner_accounts->email }} <br>
                            @endforeach
                        </td>   
                        <td>{{$partner->created_at}}</td>
                        <td> 
                            @if($partner->statues->last()!=null && $partner->statues->last()->is_approved ==1)
                                 <span class="label label-success">Approuvé</span>  
                            @else 
                                 <span class="label label-danger">Rejeter</span>  
                            @endif
                        </td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END card -->
</div>
<!-- END CONTAINER FLUID -->
 

@stop 

@section('script') 
    <script src="{{ asset('plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/jquery-datatable/media/js/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables-responsive/js/datatables.responsive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables-responsive/js/lodash.min.js') }}"></script>

    <script>
    (function($) {

        'use strict';

        var responsiveHelper = undefined;
        var breakpointDefinition = {
            tablet: 1024,
            phone: 480
        };

        // Initialize datatable showing a search box at the top right corner
        var initTableWithSearch = function() {
            var table = $('#tableWithSearch');

            var settings = {
                "sDom": "<t><'row'<p i>>",
                "destroy": true,
                "scrollCollapse": true,
                "oLanguage": {
                    "sLengthMenu": "_MENU_ ",
                    "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
                },
                "iDisplayLength": 5
            };

            table.dataTable(settings);

            // search box for table
            $('#search-table').keyup(function() {
                table.fnFilter($(this).val());
            });
        }

        // Initialize datatable with ability to add rows dynamically
        var initTableWithDynamicRows = function() {
            var table = $('#tableWithDynamicRows');


            var settings = {
                "sDom": "<t><'row'<p i>>",
                "destroy": true,
                "scrollCollapse": true,
                "oLanguage": {
                    "sLengthMenu": "_MENU_ ",
                    "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
                },
                "iDisplayLength": 5
            };


            table.dataTable(settings);

            $('#show-modal').click(function() {
                $('#addNewAppModal').modal('show');
            });

            $('#add-app').click(function() {
                table.dataTable().fnAddData([
                    $("#appName").val(),
                    $("#appDescription").val(),
                    $("#appPrice").val(),
                    $("#appNotes").val()
                ]);
                $('#addNewAppModal').modal('hide');

            });
        }

        // Initialize datatable showing export options
        var initTableWithExportOptions = function() {
            var table = $('#tableWithExportOptions');


            var settings = {
                "sDom": "<'exportOptions'T><'table-responsive sm-m-b-15't><'row'<p i>>",
                "destroy": true,
                "scrollCollapse": true,
                "oLanguage": {
                    "sLengthMenu": "_MENU_ ",
                    "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
                },
                "iDisplayLength": 5,
                "oTableTools": {
                    "sSwfPath": "assets/plugins/jquery-datatable/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                    "aButtons": [{
                        "sExtends": "csv",
                        "sButtonText": "<i class='pg-grid'></i>",
                    }, {
                        "sExtends": "xls",
                        "sButtonText": "<i class='fa fa-file-excel-o'></i>",
                    }, {
                        "sExtends": "pdf",
                        "sButtonText": "<i class='fa fa-file-pdf-o'></i>",
                    }, {
                        "sExtends": "copy",
                        "sButtonText": "<i class='fa fa-copy'></i>",
                    }]
                },
                fnDrawCallback: function(oSettings) {
                    $('.export-options-container').append($('.exportOptions'));

                    $('#ToolTables_tableWithExportOptions_0').tooltip({
                        title: 'Export as CSV',
                        container: 'body'
                    });

                    $('#ToolTables_tableWithExportOptions_1').tooltip({
                        title: 'Export as Excel',
                        container: 'body'
                    });

                    $('#ToolTables_tableWithExportOptions_2').tooltip({
                        title: 'Export as PDF',
                        container: 'body'
                    });

                    $('#ToolTables_tableWithExportOptions_3').tooltip({
                        title: 'Copy data',
                        container: 'body'
                    });
                }
            };


            table.dataTable(settings);

        }

        initTableWithSearch();
        initTableWithDynamicRows();
        initTableWithExportOptions();

        })(window.jQuery);
    </script>
@stop
