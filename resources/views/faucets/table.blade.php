<p><strong>*</strong> Payout amounts are in Satoshis</p>

<div id="faucetsTable-progressbar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
<div></div>

@if(Route::currentRouteName() != 'faucets.index')
    @if(!empty(Auth::user() && Auth::user()->isAnAdmin()))

        {!! Form::button(
            '<i class="fa fa-2x fa-plus" style="vertical-align: middle; margin-right:0.25em;"></i>Add New Faucet',
            [
                'type' => 'button',
                'onClick' => "location.href='" . route('faucets.create') . "'",
                'class' => 'btn btn-success col-lg-2 col-md-2 col-sm-2 col-xs-12',
                'style' => 'margin:0.25em 0 0.25em 0; color: white; min-width:12em;'
            ])
        !!}
    @endif
@endif
<div class="chart">

    <table id="faucetsTable"
           class="row-border hover order-column {{ !Auth::check() ? 'faucetsTable_guest' : 'faucetsTable_auth' }}"
           cellspacing="0"
           width="100%">
        <thead>
        <tr>
            @if(Auth::user() != null)
                @if(Auth::user()->isAnAdmin())
                    <th>Id</th>
                @endif
            @endif
            <th>Name</th>
            <th>Interval Minutes</th>
            <th>Min. Payout*</th>
            <th>Max. Payout*</th>
            <th>Payment Processors</th>
            @if(Auth::user() != null)
                @if(Auth::user()->isAnAdmin())
                    <th>Deleted?</th>
                    <th>Action</th>
                @endif
            @endif
        </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
        <tr>
            @if(Auth::user() != null)
                @if(Auth::user()->isAnAdmin())
                    <th>Id</th>
                @endif
            @endif
            <th>Name</th>
            <th>Interval Minutes</th>
            <th>Min. Payout*</th>
            <th>Max. Payout*</th>
            <th>Payment Processors</th>
            @if(Auth::user() != null)
                @if(Auth::user()->isAnAdmin())
                    <th>Deleted?</th>
                    <th>Action</th>
                @endif
            @endif
        </tr>
        </tfoot>
    </table>
</div>

@push('scripts')
<script src="{{ asset("/assets/js/datatables.net/datatables.min.js?" . rand()) }}"></script>
<script src="{{ asset("/assets/js/faucet-scripts/faucetDatatables.min.js?" . rand()) }}"></script>
<script>
    $(function () {
        $.fn.dataTable.ext.errMode = 'none';

        //--------------------------------
        //- DATATABLES SHOWING FAUCETS -
        //--------------------------------
        var dataTablesName = 'faucets datatable';
        var route = laroute.route('faucets');
        var faucetsData = getFaucetsDataAjax(route);
        var faucetsTableProgressBar = generateProgressBar("#faucetsTable-progressbar",dataTablesName);
        renderFaucetsDataTable(faucetsData, '#faucetsTable', faucetsTableProgressBar);


        $("#tabs").tabs( {
            "activate": function(event, ui) {
                var table = $.fn.dataTable.fnTables(true);
                if ( table.length > 0 ) {
                    $(table).dataTable().fnAdjustColumnSizing();
                }
            }
        } );
    });
</script>
@endpush